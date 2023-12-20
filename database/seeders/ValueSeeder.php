<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [2, 1, 2, 2, 3, 2, 2],
            [3, 2, 3, 2, 2, 2, 1],
            [2, 3, 3, 1, 2, 2, 2],
            [3, 3, 1, 1, 2, 2, 2],
            [2, 2, 3, 1, 2, 2, 1],
            [2, 1, 3, 1, 2, 2, 1],
            [1, 1, 3, 1, 1, 2, 2],
            [3, 2, 1, 2, 1, 2, 1],
            [2, 1, 2, 1, 1, 2, 1],
            [3, 2, 2, 2, 1, 2, 2],
            [3, 2, 3, 1, 2, 2, 1],
            [1, 1, 1, 2, 3, 2, 1],
            [2, 1, 1, 2, 2, 2, 2],
            [3, 2, 3, 2, 2, 2, 2],
            [2, 2, 1, 2, 2, 2, 2],
            [2, 1, 3, 2, 1, 2, 1],
            [3, 3, 3, 1, 2, 2, 2],
            [2, 2, 1, 2, 2, 1, 2],
            [3, 3, 2, 2, 2, 2, 1],
            [2, 3, 2, 2, 3, 2, 1],
            [1, 1, 1, 3, 1, 2, 2],
            [2, 3, 2, 2, 2, 2, 2],
            [2, 2, 3, 1, 1, 2, 2],
            [2, 1, 1, 2, 1, 2, 1],
            [2, 2, 1, 2, 3, 2, 2],
            [3, 3, 2, 1, 2, 2, 1],
            [2, 2, 3, 1, 2, 2, 2],
            [2, 2, 2, 2, 3, 2, 2],
            [3, 1, 2, 2, 1, 2, 3],
            [2, 1, 2, 1, 3, 2, 1],
        ];

        foreach ($values as $i => $row) {
            foreach ($row as $j => $score) {
                DB::table('values')->insert([
                    'alternative_id' => $i + 1,
                    'criteria_id' => $j + 1,
                    'score' => $score,
                ]);
            }
        }
    }
}
