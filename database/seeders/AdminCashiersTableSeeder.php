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
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
