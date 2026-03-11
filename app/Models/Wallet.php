<?php

namespace App\Models;

use App\Enums\Currency;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'currency',
        'balance',
        'locked_balance',
    ];

    protected function casts(): array
    {
        return [
            'currency' => Currency::class,
            'balance' => 'decimal:18',
            'locked_balance' => 'decimal:18',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function balanceTransactions(): HasMany
    {
        return $this->hasMany(BalanceTransaction::class);
    }

    public function withdrawalRequests(): HasMany
    {
        return $this->hasMany(WithdrawalRequest::class);
    }

    public function blockchainDeposits(): HasMany
    {
        return $this->hasMany(BlockchainDeposit::class);
    }
}
