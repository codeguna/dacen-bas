<?php

use Database\Seeders\DepartmensSeeder;
use Database\Seeders\FunctionalPositionSeeder;
use Database\Seeders\FunctionalRankSeeder;
use Database\Seeders\HomebaseSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(HomebaseSeeder::class);
        $this->call(DepartmensSeeder::class);
        $this->call(FunctionalPositionSeeder::class);
        $this->call(FunctionalRankSeeder::class);
    }
}