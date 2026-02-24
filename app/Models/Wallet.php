<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'balance',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
    ];

    /**
     * Get the user that owns this wallet
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all transactions for this wallet
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Update wallet balance based on transaction
     */
    public function addTransaction($type, $amount)
    {
        if ($type === 'income') {
            $this->balance += $amount;
        } elseif ($type === 'expense') {
            $this->balance -= $amount;
        }
        $this->save();
    }
}