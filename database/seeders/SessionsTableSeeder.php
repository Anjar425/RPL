<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sessions')->insert([
            [
                'id' => 'session1',
                'user_id' => 1, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
