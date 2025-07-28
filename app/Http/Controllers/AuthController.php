<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\AuthTokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Register a new user and issue API token.
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'city' => $request->validated('city'),
            'password' => Hash::make($request->validated('password')),
        ]);

        // Create API token with expiration
        $expiresAt = now()->addDays(30); // Token expires in 30 days
        $token = $user->createToken(
            $request->getDeviceName(),
            ['*'], // Full access abilities
            $expiresAt
        )->plainTextToken;

        // Send email verification notification
        $user->sendEmailVerificationNotification();

        $tokenData = [
            'user' => $user,
            'token' => $token,
            'expires_at' => $expiresAt->toISOString()
        ];

        return (new AuthTokenResource($tokenData))
            ->withMessage('Регистрация прошла успешно. Проверьте вашу почту для подтверждения email.')
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Authenticate user and issue API token.
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Неверный email или пароль.'],
            ]);
        }

        $user = User::where('email', $request->validated('email'))->firstOrFail();

        // Revoke all existing tokens if not remembering
        if (!$request->shouldRemember()) {
            $user->tokens()->delete();
        }

        // Create API token with appropriate expiration
        $expiresAt = $request->shouldRemember()
            ? now()->addDays(30)
            : now()->addDay();

        $token = $user->createToken(
            $request->getDeviceName(),
            ['*'], // Full access abilities
            $expiresAt
        )->plainTextToken;

        $tokenData = [
            'user' => $user,
            'token' => $token,
            'expires_at' => $expiresAt->toISOString()
        ];

        return (new AuthTokenResource($tokenData))
            ->withMessage('Успешный вход в систему.')
            ->response();
    }

    /**
     * Revoke the user's current API token (logout).
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Вы успешно вышли из системы.'
        ]);
    }

    /**
     * Revoke all user's API tokens.
     */
    public function logoutAll(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Вы вышли из системы на всех устройствах.'
        ]);
    }

    /**
     * Get authenticated user information.
     */
    public function user(Request $request): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'user' => new UserResource($request->user())
            ]
        ]);
    }

    /**
     * Send email verification notification.
     */
    public function sendEmailVerification(Request $request): JsonResponse
    {
        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'message' => 'Email уже подтвержден.'
            ], 400);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'success' => true,
            'message' => 'Письмо с подтверждением отправлено.'
        ]);
    }

    /**
     * Verify email address.
     */
    public function verifyEmail(Request $request, $id, $hash): JsonResponse
    {
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json([
                'success' => false,
                'message' => 'Недействительная ссылка для подтверждения.'
            ], 403);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'success' => true,
                'message' => 'Email уже был подтвержден ранее.',
                'data' => [
                    'user' => new UserResource($user)
                ]
            ]);
        }

        if ($user->markEmailAsVerified()) {
            event(new \Illuminate\Auth\Events\Verified($user));
        }

        return response()->json([
            'success' => true,
            'message' => 'Email успешно подтвержден.',
            'data' => [
                'user' => new UserResource($user)
            ]
        ]);
    }
}
