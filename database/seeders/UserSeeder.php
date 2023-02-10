<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Super Admin",
            'user_name' => "admin",
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by'=>1,
        ]);
        DB::table('users')->insert([
            'name' => "Some Director",
            'user_name' => "director",
            'email' => 'admin1@gmail.com',
            'phone' => '0123456789',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
            'created_by'=>1,
        ]);
    }
}
