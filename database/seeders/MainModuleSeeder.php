<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class MainModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_modules')->insert([
            'name' => "School",
        ]);
        DB::table('main_modules')->insert([
            'name' => "Student",
        ]);
        DB::table('main_modules')->insert([
            'name' => "Setting",
        ]);
    }
}
