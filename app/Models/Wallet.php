<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'wallet_type_id', 'balance'];

    public function users()
    {
        return $this->belongsTo(Users::class, "user_id");
    }

    public function walletType()
    {
        return $this->belongsTo(WalletType::class);
    }

    public function sentTransactions()
    {
        return $this->hasMany(Transaction::class, 'sender_wallet_id');
    }

    public function receivedTransactions()
    {
        return $this->hasMany(Transaction::class, 'receiver_wallet_id');
    }
}
