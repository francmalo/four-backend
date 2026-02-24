<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'id'    => $this->id,
                'name'  => $this->name,
                'email' => $this->email,
            ],
            'wallets' => WalletResource::collection($this->whenLoaded('wallets')),
            'total_balance' => $this->total_balance,
        ];
    }
}
