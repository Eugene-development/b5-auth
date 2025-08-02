<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Get all projects for the authenticated user.
     */
    public function index(Request $request): JsonResponse
    {
        $projects = $request->user()->projects()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'projects' => $projects
        ]);
    }

    /**
     * Store a newly created project.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:active,completed,paused'
        ]);

        $project = $request->user()->projects()->create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'] ?? 'active'
        ]);

        return response()->json([
            'project' => $project
        ], 201);
    }

    /**
     * Get the specified project.
     */
    public function show(Request $request, Project $project): JsonResponse
    {
        // Ensure the project belongs to the authenticated user
        if ($project->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        return response()->json([
            'project' => $project
        ]);
    }

    /**
     * Update the specified project.
     */
    public function update(Request $request, Project $project): JsonResponse
    {
        // Ensure the project belongs to the authenticated user
        if ($project->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|in:active,completed,paused'
        ]);

        $project->update($validated);

        return response()->json([
            'project' => $project
        ]);
    }

    /**
     * Remove the specified project.
     */
    public function destroy(Request $request, Project $project): JsonResponse
    {
        // Ensure the project belongs to the authenticated user
        if ($project->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Project not found'], 404);
        }

        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully'
        ]);
    }
}
