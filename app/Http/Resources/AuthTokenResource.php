<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthTokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'message' => $this->additional['message'] ?? 'Authentication successful',
            'data' => [
                'user' => new UserResource($this->resource['user']),
                'token' => [
                    'access_token' => $this->resource['token'],
                    'token_type' => 'Bearer',
                    'expires_at' => $this->resource['expires_at'] ?? null,
                ]
            ]
        ];
    }

    /**
     * Create a new resource instance with custom message.
     */
    public function withMessage(string $message): self
    {
        return $this->additional(['message' => $message]);
    }
}
