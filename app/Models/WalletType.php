<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'min_balance', 'monthly_interest_rate'];

    public function wallets()
    {
        return $this->hasMany(Wallet::class, "wallet_type_id");
    }
}
