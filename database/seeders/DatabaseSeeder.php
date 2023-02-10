<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            PermissionSeeder::class,
            RoleUserSeeder::class,
            ModuleSeeder::class,
            MainModuleSeeder::class,
            SidemenuSeeder::class,
            SchoolSeeder::class,
            BranchSeeder::class,
            CountrySeeder::class,
            ReligionSeeder::class,
            LanguageSeeder::class,
        ]);
    }
}
