<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class ReligionSeeder extends Seeder
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
                'name_en' => 'Agnosticism',
                'name_kh' => 'Agnosticism ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Atheism',
                'name_kh' => "Atheism ",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Baha'i",
                'name_kh' => "Baha'i",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Buddhism',
                'name_kh' => 'ពុទ្ធសាសនា ',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Atheism',
                'name_kh' => "Atheism ",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Christianity",
                'name_kh' => "គ្រឹះសាសនា",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Humanism',
                'name_kh' => "Humanism",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Hinduism",
                'name_kh' => "Hinduism",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => 'Islam',
                'name_kh' => "សាសនាអ៊ីស្លាម",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Jainism",
                'name_kh' => "Jainism",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Judaism",
                'name_kh' => "Judaism",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Sikhism",
                'name_kh' => "Sikhism",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name_en' => "Zoroastrianism",
                'name_kh' => "Zoroastrianism",
                'created_at' => now(),
                'updated_at' => now()
            ],
         ];
         DB::table('religions')->insert($data);
    }
}
