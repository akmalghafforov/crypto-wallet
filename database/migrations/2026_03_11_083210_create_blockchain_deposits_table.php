<?php

use App\Enums\BlockchainDepositStatus;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blockchain_deposits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('wallet_id')->constrained();
            $table->string('currency');
            $table->string('address');
            $table->string('tx_hash');
            $table->decimal('amount', 36, 18);
            $table->unsignedInteger('confirmations')->default(0);
            $table->unsignedInteger('required_confirmations');
            $table->enum('status', array_column(BlockchainDepositStatus::cases(), 'value'))
                ->default(BlockchainDepositStatus::Detected->value);
            $table->timestamps();
            $table->unique(['tx_hash', 'user_id', 'currency']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blockchain_deposits');
    }
};
