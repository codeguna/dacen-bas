<?php

namespace Database\Seeders;

use App\Models\FunctionalPosition;
use Illuminate\Database\Seeder;

class FunctionalPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $functionalPositions = [
            ['name' => 'Asisten Ahli'],
            ['name' => 'Lektor'],
            ['name' => 'Lektor Kepala'],
            ['name' => 'Guru Besar'],            
        ];

        FunctionalPosition::insert($functionalPositions);
    }
}