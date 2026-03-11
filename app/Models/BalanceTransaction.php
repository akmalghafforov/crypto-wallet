<?php

namespace App\Models;

use App\Enums\BalanceTransactionType;
use App\Enums\BalanceTransactionStatus;
use App\Enums\BalanceTransactionDirection;
use App\Enums\BalanceTransactionReferenceType;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BalanceTransaction extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'wallet_id',
        'type',
        'direction',
        'amount',
        'balance_before',
        'balance_after',
        'status',
        'reference_type',
        'reference_id',
        'tx_hash',
        'idempotency_key',
        'meta',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => BalanceTransactionType::class,
            'direction' => BalanceTransactionDirection::class,
            'amount' => 'decimal:18',
            'balance_before' => 'decimal:18',
            'balance_after' => 'decimal:18',
            'status' => BalanceTransactionStatus::class,
            'reference_type' => BalanceTransactionReferenceType::class,
            'meta' => 'array',
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
