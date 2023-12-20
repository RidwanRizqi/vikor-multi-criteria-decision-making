<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            [
                'name' => 'Biaya Pengembangan',
                'type' => 'cost',
                'weight' => 0.1492,
            ],
            [
                'name' => 'Biaya Pemeliharaan',
                'type' => 'cost',
                'weight' => 0.1008,
            ],
            [
                'name' => 'Waktu Pengerjaan',
                'type' => 'cost',
                'weight' => 0.1008,
            ],
            [
                'name' => 'Keamanan',
                'type' => 'benefit',
                'weight' => 0.1996,
            ],
            [
                'name' => 'Kualitas Produk dan Layanan',
                'type' => 'benefit',
                'weight' => 0.1996,
            ],
            [
                'name' => 'Kompetensi Teknis dan Pengalaman',
                'type' => 'benefit',
                'weight' => 0.1492,
            ],
            [
                'name' => 'Fleksibilitas',
                'type' => 'benefit',
                'weight' => 0.1008,
            ],
        ];

        foreach ($criterias as $criteria) {
            Criteria::create($criteria);
        }
    }
}
