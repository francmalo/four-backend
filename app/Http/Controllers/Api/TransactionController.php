<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // POST /api/transactions
    public function store(StoreTransactionRequest $request)
    {
        $tx = Transaction::create($request->validated());

        return response()->json([
            'message' => 'Transaction created successfully',
            'data' => new TransactionResource($tx),
        ], 201);
    }
}
