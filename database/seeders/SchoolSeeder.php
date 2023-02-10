<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name_en' => 'Westline',
                'name_kh' => 'សាលារៀនវ៉េស្ទឡាញន៍ ',
                'code' => 'WEG',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Northline',
                'name_kh' => "សាលារៀនណត្សឡាញន៍ ",
                'code' => 'NTH',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Foresthill international school',
                'name_kh' => 'សាលាអន្តរជាតិ ហ្វររ៉េសហៀល',
                'code' => 'FHIS',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Leaderland English Academy',
                'name_kh' => 'សាលាភាសាអង់គ្លេសលីដឺលែន',
                'code' => 'LED',
                'created_at' => now(),
                'updated_at' => now()
            ],
         ];
         DB::table('schools')->insert($data);
    }
}
