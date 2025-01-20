<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function wallets()
    {
        return $this->hasMany(Wallet::class, "user_id");
    }
}
