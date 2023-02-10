<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
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
                'role_id' => 1,
                'module_id' => 1,
                'permission'=>'viewAny',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_id' => 1,
                'module_id' => 2,
                'permission'=>'viewAny',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_id' => 1,
                'module_id' => 3,
                'permission'=>'viewAny',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'role_id' => 2,
                'module_id' => 1,
                'permission'=>'viewAny',
                'created_at' => now(),
                'updated_at' => now()
            ],
         ];
         DB::table('permissions')->insert($data);
    }
}
