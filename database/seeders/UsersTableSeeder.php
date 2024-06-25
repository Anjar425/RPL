<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'daffa',
                'email' => 'daffa@gmail.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'eko',
                'email' => 'ekoginanjar@gmail.com',
                'password' => Hash::make('echoginanj'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'zidan',
                'email' => 'zidan@gmail.com',
                'password' => Hash::make('fireflymywife'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'irfan',
                'email' => 'irfan@gmail.com',
                'password' => Hash::make('irfanadipa'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'hajid',
                'email' => 'hajid@gmail.com',
                'password' => Hash::make('hidayanto'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'fathin',
                'email' => 'fathin@gmail.com',
                'password' => Hash::make('wongsolo'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'cahyo',
                'email' => 'cahyo@gmail.com',
                'password' => Hash::make('codingismylife'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'maharani',
                'email' => 'maharani@gmail.com',
                'password' => Hash::make('ilikewhatilike'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'affani',
                'email' => 'affani@gmail.com',
                'password' => Hash::make('danaaffani'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'achmad',
                'email' => 'achmad@gmail.com',
                'password' => Hash::make('porsche'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
