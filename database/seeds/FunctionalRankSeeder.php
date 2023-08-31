<?php

namespace Database\Seeders;

use App\Models\FunctionalRank;
use Illuminate\Database\Seeder;

class FunctionalRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $functionalRanks = [
            ['name' => 'III/a'],
            ['name' => 'III/b'],
            ['name' => 'III/c'],
            ['name' => 'III/d'],
            ['name' => 'IV/a'],
            ['name' => 'IV/b'],
            ['name' => 'IV/c'],
            ['name' => 'IV/d'],
            ['name' => 'IV/e'],
        ];

        FunctionalRank::insert($functionalRanks);
    }
}