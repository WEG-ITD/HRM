<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
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
                'name_en' => 'Khmer',
                'name_kh' => 'ខ្មែរ ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'English',
                'name_kh' => "អង់គ្រេស ",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Chinese",
                'name_kh' => "ចិន",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Korean',
                'name_kh' => 'កូរ៉េ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Japan',
                'name_kh' => 'ជប៉ុន',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Frenh',
                'name_kh' => 'បារាំង',
                'created_at' => now(),
                'updated_at' => now()
            ],
      
         ];
         DB::table('languages')->insert($data);
    }
}
