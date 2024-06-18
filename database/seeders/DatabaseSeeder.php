<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            AdminCashiersTableSeeder::class,
            CashiersTableSeeder::class,
            MedicinesTableSeeder::class,
            HistoriesTableSeeder::class,
            PasswordResetTokensTableSeeder::class,
            // SessionsTableSeeder::class,
            PersonalAccessTokensTableSeeder::class,
        ]);
    }
}
