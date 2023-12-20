<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatives = [
            ['name' => 'A01'],
            ['name' => 'A02'],
            ['name' => 'A03'],
            ['name' => 'A04'],
            ['name' => 'A05'],
            ['name' => 'A06'],
            ['name' => 'A07'],
            ['name' => 'A08'],
            ['name' => 'A09'],
            ['name' => 'A10'],
            ['name' => 'A11'],
            ['name' => 'A12'],
            ['name' => 'A13'],
            ['name' => 'A14'],
            ['name' => 'A15'],
            ['name' => 'A16'],
            ['name' => 'A17'],
            ['name' => 'A18'],
            ['name' => 'A19'],
            ['name' => 'A20'],
            ['name' => 'A21'],
            ['name' => 'A22'],
            ['name' => 'A23'],
            ['name' => 'A24'],
            ['name' => 'A25'],
            ['name' => 'A26'],
            ['name' => 'A27'],
            ['name' => 'A28'],
            ['name' => 'A29'],
            ['name' => 'A30'],
        ];


        DB::table('alternatives')->insert($alternatives);
    }
}
