<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'wallet_id'  => $this->wallet_id,
            'type'       => $this->type,
            'amount'     => number_format((float)$this->amount, 2, '.', ''),
            'description'=> $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
