<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWalletRequest;
use App\Http\Resources\WalletDetailResource;
use App\Http\Resources\WalletResource;
use App\Models\Wallet;

class WalletController extends Controller
{
    // POST /api/wallets
    public function store(StoreWalletRequest $request)
    {
        $wallet = Wallet::create($request->validated());

        return response()->json([
            'message' => 'Wallet created successfully',
            'data' => new WalletResource($wallet),
        ], 201);
    }

    // GET /api/wallets/{id}
    public function show(Wallet $wallet)
    {
        $wallet->load(['transactions' => function ($q) {
            $q->latest();
        }]);

        return new WalletDetailResource($wallet);
    }
}
