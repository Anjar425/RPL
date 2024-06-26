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
            [
                'admin_cashiers_id' => 1,
                'name' => 'Ibuprofen',
                'desc' => 'Nonsteroidal anti-inflammatory drug',
                'expire' => '2025-01-15',
                'purchase_price' => 1200,
                'selling_price' => 1800,
                'image' => 'ibuprofen.jpg',
                'stock' => 80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 1,
                'name' => 'Aspirin',
                'desc' => 'Pain reliever, fever reducer, and anti-inflammatory',
                'expire' => '2024-11-30',
                'purchase_price' => 900,
                'selling_price' => 1400,
                'image' => 'aspirin.jpg',
                'stock' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 1,
                'name' => 'Amoxicillin',
                'desc' => 'Antibiotic for bacterial infections',
                'expire' => '2025-03-20',
                'purchase_price' => 1500,
                'selling_price' => 2000,
                'image' => 'amoxicillin.jpg',
                'stock' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 1,
                'name' => 'Cetirizine',
                'desc' => 'Antihistamine for allergy relief',
                'expire' => '2024-10-05',
                'purchase_price' => 800,
                'selling_price' => 1200,
                'image' => 'cetirizine.jpg',
                'stock' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'admin_cashiers_id' => 2,
                'name' => 'Loratadine',
                'desc' => 'Antihistamine for allergy relief',
                'expire' => '2024-09-15',
                'purchase_price' => 850,
                'selling_price' => 1300,
                'image' => 'loratadine.jpg',
                'stock' => 90,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Anda bisa menambahkan data lain di sini
        ]);
    }
}
