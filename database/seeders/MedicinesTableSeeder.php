<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('medicines')->insert([
            [
                'admin_cashiers_id' => 1, // Pastikan id ini sesuai dengan data di admin_cashiers
                'name' => 'Paracetamol',
                'desc' => 'Pain reliever and fever reducer',
                'expire' => '2024-12-31',
                'purchase_price' => 1000,
                'selling_price' => 1500,
                'image' => 'paracetamol.jpg',
                'stock' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
