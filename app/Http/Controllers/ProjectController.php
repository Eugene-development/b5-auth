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
            'value' => 'required|string|max:255',
            'description' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'contract_name' => 'nullable|string|max:255',
            'contract_date' => 'nullable|date',
            'contract_amount' => 'nullable|numeric',
            'agent_percentage' => 'nullable|numeric',
            'planned_completion_date' => 'nullable|date'
        ]);

        $project = $request->user()->projects()->create([
            'value' => $validated['value'],
            'description' => $validated['description'] ?? null,
            'city' => $validated['city'] ?? null,
            'is_active' => $validated['is_active'] ?? true,
            'contract_name' => $validated['contract_name'] ?? null,
            'contract_date' => $validated['contract_date'] ?? null,
            'contract_amount' => $validated['contract_amount'] ?? null,
            'agent_percentage' => $validated['agent_percentage'] ?? null,
            'planned_completion_date' => $validated['planned_completion_date'] ?? null,
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
            'value' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'contract_name' => 'nullable|string|max:255',
            'contract_date' => 'nullable|date',
            'contract_amount' => 'nullable|numeric',
            'agent_percentage' => 'nullable|numeric',
            'planned_completion_date' => 'nullable|date'
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
