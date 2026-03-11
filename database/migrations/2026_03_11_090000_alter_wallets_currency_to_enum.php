<?php

use App\Enums\Currency;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        $values = implode("', '", array_column(Currency::cases(), 'value'));
        DB::statement('ALTER TABLE wallets DROP CONSTRAINT IF EXISTS wallets_currency_check');
        DB::statement("ALTER TABLE wallets ADD CONSTRAINT wallets_currency_check CHECK (currency IN ('{$values}'))");
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE wallets DROP CONSTRAINT IF EXISTS wallets_currency_check');
    }
};
