<?php

namespace App\Models;

use App\Enums\Currency;
use App\Enums\BlockchainDepositStatus;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlockchainDeposit extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wallet_id',
        'currency',
        'address',
        'tx_hash',
        'amount',
        'confirmations',
        'required_confirmations',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'currency' => Currency::class,
            'amount' => 'decimal:18',
            'status' => BlockchainDepositStatus::class,
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
