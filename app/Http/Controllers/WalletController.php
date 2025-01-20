<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getAllWallets()
    {
        $wallets = Wallet::with('users', 'wallettype')->get();
        return response()->json($wallets);
    }

    public function getWalletDetails($id)
    {
        $wallet = Wallet::with('users', 'wallettype')->findOrFail($id);
        return response()->json($wallet);
    }

    public function transferMoney(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'sender_wallet_id' => 'required|exists:wallets,id',
            'receiver_wallet_id' => 'required|exists:wallets,id',
            'amount' => 'required|numeric|min:100.00',
        ]);
        $userId = $request->user_id;
        $sender = Wallet::where('id', $request->sender_wallet_id)->first();
        $receiver = Wallet::where('id', $request->receiver_wallet_id)->first();
        $amount = $request->amount;

        // Check if the sender is the owner of the sender wallet
        if ($sender->user_id !== $userId) {
            return response()->json(['error' => 'Sender is not the owner of the wallet'], 403);
        }

        // Check if the receiver is the owner of the receiver wallet
        if ($receiver->user_id !== $userId) {
            return response()->json(['error' => 'Receiver is not the owner of the wallet'], 403);
        }

        // Check if sender has sufficient balance
        if ($sender->balance < $amount) {
            return response()->json(['error' => 'Insufficient balance'], 400);
        }

        // Deduct the amount from sender's wallet
        $sender->balance -= $amount;

        // Add the amount to receiver's wallet
        $receiver->balance += $amount;

        // Save both wallet balances
        $sender->save();
        $receiver->save();

        // Record the transaction
        Transaction::create([
            'sender_wallet_id' => $sender->id,
            'receiver_wallet_id' => $receiver->id,
            'amount' => $amount,
            'transaction_date' => now(),
        ]);

        return response()->json(['message' => 'Transfer successful']);
    }
}
