<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'wallet' => [
                'id'      => $this->id,
                'user_id' => $this->user_id,
                'name'    => $this->name,
            ],
            'balance' => $this->balance,
            'transactions' => TransactionResource::collection(
                $this->whenLoaded('transactions')
            ),
        ];
    }
}
