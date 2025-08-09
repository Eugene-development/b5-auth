<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class PublicProjectController extends Controller
{
    /**
     * Store a newly created project publicly using a user's secret key.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'secret_key' => [
                'required',
                'string',
                'size:26',
                'regex:/^[0-9A-HJKMNP-TV-Z]{26}$/',
            ],
            'client_name' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'interest' => ['nullable', 'string'],
        ]);

        $user = User::where('key', $validated['secret_key'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Пользователь с таким ключом не найден.'
            ], 404);
        }

        $project = $user->projects()->create([
            'name' => $validated['client_name'],
            'description' => $validated['interest'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'city' => $validated['city'] ?? null,
            'status' => 'active',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Успешно отправлено',
            'project' => $project,
        ], 201);
    }
}
