<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriesTableSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        $dummyData = [
            [
                'medicine_id' => 1,
                'date' => '2023-01-01',
                'type' => 'In',
                'amount' => 50,
                'price' => 1000,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Generate additional 20 dummy records
        for ($i = 1; $i <= 40; $i++) {
            $dummyData[] = [
                'medicine_id' => rand(1, 6), // Assuming you have 10 medicines
                'date' => Carbon::create(2023, rand(1, 12), rand(1, 28))->toDateString(),
                'type' => rand(0, 1) ? 'In' : 'Out',
                'amount' => rand(1, 100),
                'price' => rand(500, 2000) * rand(1, 100),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('histories')->insert($dummyData);
    }
}
