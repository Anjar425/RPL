<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalAccessTokensTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('personal_access_tokens')->insert([
            [
                'tokenable_type' => 'App\\Models\\User', // Gantilah dengan model yang sesuai
                'tokenable_id' => 1, // Pastikan id ini sesuai dengan data di users
                'name' => 'token_name',
                'token' => hash('sha256', 'sampletoken'),
                'abilities' => json_encode(['*']),
                'last_used_at' => now(),
                'expires_at' => now()->addDays(7),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}

