<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $canCreate = $request->user()->tokenCan('user:create');
        $canUpdate = $request->user()->tokenCan('user:update');
        $canDelete = $request->user()->tokenCan('user:delete');

        return response()->json([
            'success' => true,
            'data' => [
                'user' => new UserResource($request->user()),
                'permissions' => [
                    'canCreate' => $canCreate,
                    'canUpdate' => $canUpdate,
                    'canDelete' => $canDelete
                ]
            ]
        ], 200);
    }
}
