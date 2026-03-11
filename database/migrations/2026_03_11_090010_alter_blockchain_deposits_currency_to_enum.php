<?php

use App\Enums\Currency;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blockchain_deposits', function (Blueprint $table) {
            $table->enum('currency', array_column(Currency::cases(), 'value'))->change();
        });
    }

    public function down(): void
    {
        Schema::table('blockchain_deposits', function (Blueprint $table) {
            $table->string('currency')->change();
        });
    }
};
