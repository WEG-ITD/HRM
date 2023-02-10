<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class BranchSeeder extends Seeder
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
                'name_en' => 'Westline Santhormok',
                'name_kh' => 'សាលារៀនវ៉េស្ទឡាញន៍សន្ធរមុខ',
                'code' => 'STM',
                'school_id'=>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Northline',
                'name_kh' => "សាលារៀនណត្សឡាញន៍ ",
                'code' => 'NTH',
                'school_id'=>2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Foresthill international school',
                'name_kh' => 'សាលាអន្តរជាតិ ហ្វររ៉េសហៀល',
                'code' => 'FHIS',
                'school_id'=>3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Leaderland English Academy',
                'name_kh' => 'សាលាភាសាអង់គ្លេសលីដឺលែន',
                'code' => 'LED',
                'school_id'=>4,
                'created_at' => now(),
                'updated_at' => now()
            ],
         ];
         DB::table('branches')->insert($data);
    }
}
