<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('histories')->insert([
            [
                'medicine_id' => 1, // Pastikan id ini sesuai dengan data di medicines
                'date' => '2023-01-01',
                'type' => 'In',
                'amount' => 50,
                'price' => 1000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
