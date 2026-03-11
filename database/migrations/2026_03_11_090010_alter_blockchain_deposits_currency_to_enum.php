<?php

use App\Enums\Currency;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $values = implode("', '", array_column(Currency::cases(), 'value'));
        DB::statement('ALTER TABLE blockchain_deposits DROP CONSTRAINT IF EXISTS blockchain_deposits_currency_check');
        DB::statement("ALTER TABLE blockchain_deposits ADD CONSTRAINT blockchain_deposits_currency_check CHECK (currency IN ('{$values}'))");
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE blockchain_deposits DROP CONSTRAINT IF EXISTS blockchain_deposits_currency_check');
    }
};
