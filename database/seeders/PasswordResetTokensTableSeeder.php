<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetTokensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('password_reset_tokens')->insert([
            [
                'email' => 'john@example.com', // Pastikan email ini sesuai dengan data di users
                'token' => 'sampletoken',
                'created_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
