<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $canCreate = $request->user()->tokenCan('user:create');
        $canUpdate = $request->user()->tokenCan('user:update');
        $canDelete = $request->user()->tokenCan('user:delete');

        // return response()->json(['user' => $request->user()], 200);
        return response()->json(['user' => $request->user(), 'canCreate' => $canCreate, 'canUpdate' => $canUpdate, 'canDelete' => $canDelete], 200);
    }
}
