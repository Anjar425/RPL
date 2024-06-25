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
            [
                'id' => 'session2',
                'user_id' => 2, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session3',
                'user_id' => 3, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session4',
                'user_id' => 4, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session5',
                'user_id' => 5, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session6',
                'user_id' => 6, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session7',
                'user_id' => 7, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session8',
                'user_id' => 8, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session9',
                'user_id' => 9, // Pastikan id ini sesuai dengan data di users
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0',
                'payload' => 'sample payload',
                'last_activity' => time(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 'session10',
                'user_id' => 10, // Pastikan id ini sesuai dengan data di users
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
