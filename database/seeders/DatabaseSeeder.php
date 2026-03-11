<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use App\Enums\Currency;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Alice Johnson', 'email' => 'alice@example.com'],
            ['name' => 'Bob Smith', 'email' => 'bob@example.com'],
            ['name' => 'Charlie Brown', 'email' => 'charlie@example.com'],
        ];

        foreach ($users as $index => $data) {
            $user = User::factory()->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => 'password' . ($index + 1),
            ]);

            foreach (Currency::cases() as $currency) {
                Wallet::create([
                    'user_id' => $user->id,
                    'currency' => $currency,
                    'balance' => 0,
                    'locked_balance' => 0,
                ]);
            }
        }
    }
}
