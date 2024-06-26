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
                'email' => 'daffa@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'password',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 2,
                'name' => 'Cashier 2',
                'email' => 'ekoginanjar@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'echoginanj',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 3,
                'name' => 'Cashier 3',
                'email' => 'zidan@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'fireflymywife',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 4,
                'name' => 'Cashier 4',
                'email' => 'irfan@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'irfanadipa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 5,
                'name' => 'Cashier 5',
                'email' => 'hajid@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'hidayanto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 6,
                'name' => 'Cashier 6',
                'email' => 'fathin@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'wongsolo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 7,
                'name' => 'Cashier 7',
                'email' => 'cahyo@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'codingismylife',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 8,
                'name' => 'Cashier 8',
                'email' => 'maharani@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'ilikewhatilike',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 9,
                'name' => 'Cashier 9',
                'email' => 'affani@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'danaaffani',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 10,
                'name' => 'Cashier 10',
                'email' => 'achmad@gmail.com',
                'password' => Hash::make('12345678'),
                'visible_password' => 'porsche',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}