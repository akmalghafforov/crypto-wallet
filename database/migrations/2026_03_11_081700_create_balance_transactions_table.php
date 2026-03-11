<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Enums\BalanceTransactionType;
use App\Enums\BalanceTransactionStatus;
use App\Enums\BalanceTransactionDirection;
use App\Enums\BalanceTransactionReferenceType;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('balance_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('wallet_id')->constrained();
            $table->enum('type', array_column(BalanceTransactionType::cases(), 'value'));
            $table->enum('direction', array_column(BalanceTransactionDirection::cases(), 'value'));
            $table->decimal('amount', 36, 18);
            $table->decimal('balance_before', 36, 18);
            $table->decimal('balance_after', 36, 18);
            $table->enum('status', array_column(BalanceTransactionStatus::cases(), 'value'))
                ->default(BalanceTransactionStatus::Pending->value);
            $table->enum('reference_type', array_column(BalanceTransactionReferenceType::cases(), 'value'));
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('tx_hash')->nullable();
            $table->string('idempotency_key')->unique();
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('balance_transactions');
    }
};
