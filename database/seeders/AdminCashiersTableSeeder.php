<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminCashiersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_cashiers')->insert([
            [
                'name' => 'Admin 1',
                'email' => 'daffa@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'ekoginanjar@gmail.com',
                'password' => Hash::make('echoginanj'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 3',
                'email' => 'zidan@gmail.com',
                'password' => Hash::make('fireflymywife'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 4',
                'email' => 'irfan@gmail.com',
                'password' => Hash::make('irfanadipa'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 5',
                'email' => 'hajid@gmail.com',
                'password' => Hash::make('hidayanto'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 6',
                'email' => 'fathin@gmail.com',
                'password' => Hash::make('wongsolo'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 7',
                'email' => 'cahyo@gmail.com',
                'password' => Hash::make('codingismylife'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 8',
                'email' => 'maharani@gmail.com',
                'password' => Hash::make('ilikewhatilike'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 9',
                'email' => 'affani@gmail.com',
                'password' => Hash::make('danaaffani'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin 10',
                'email' => 'achmad@gmail.com',
                'password' => Hash::make('porsche'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
