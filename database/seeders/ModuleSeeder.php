<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'name' => "Dashboard",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        DB::table('modules')->insert([
            'name' => "User",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        DB::table('modules')->insert([
            'name' => "Role",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        DB::table('modules')->insert([
            'name' => "Permission",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        DB::table('modules')->insert([
            'name' => "SideMenu",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        DB::table('modules')->insert([
            'name' => "School",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        DB::table('modules')->insert([
            'name' => "Branch",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        //8
        DB::table('modules')->insert([
            'name' => "Country",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
        //9
        DB::table('modules')->insert([
            'name' => "Religion",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
         //10
         DB::table('modules')->insert([
            'name' => "Language",
            'status'=> 1,
            'is_main'=> 1,
            'have_workflow'=> 0,
            'created_by'=>1,
        ]);
    }
}
