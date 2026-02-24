<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserProfileResource;
use App\Models\User;

class UserController extends Controller
{
    // POST /api/users
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'User created successfully',
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ]
        ], 201);
    }

    // GET /api/users/{id}  (profile)
    public function show(User $user)
    {
        $user->load(['wallets']); // WalletResource will compute wallet balance

        return new UserProfileResource($user);
    }
}
