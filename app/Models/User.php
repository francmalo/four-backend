<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email'];

    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }

    // Total balance across all wallets 
    public function getTotalBalanceAttribute(): string
    {

        $total = $this->wallets->sum(fn (Wallet $w) => (float) $w->balance);
        return number_format($total, 2, '.', '');
    }
}
