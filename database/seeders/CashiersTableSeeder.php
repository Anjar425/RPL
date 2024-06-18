<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CashiersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cashiers')->insert([
            [
                'admin_cashiers_id' => 1, // Pastikan id ini sesuai dengan data di admin_cashiers
                'name' => 'Cashier 1',
                'email' => 'daffakasir@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'password',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
