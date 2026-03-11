<?php

use App\Enums\WithdrawalRequestStatus;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('withdrawal_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('wallet_id')->constrained();
            $table->decimal('amount', 36, 18);
            $table->decimal('fee', 36, 18)->default(0);
            $table->string('address');
            $table->enum('status', array_column(WithdrawalRequestStatus::cases(), 'value'))
                ->default(WithdrawalRequestStatus::Pending->value);
            $table->string('tx_hash')->nullable();
            $table->string('idempotency_key')->unique();
            $table->timestamp('requested_at')->useCurrent();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdrawal_requests');
    }
};
