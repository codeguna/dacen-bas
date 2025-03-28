<?php

namespace Database\Seeders;

use App\Models\EventType;
use Illuminate\Database\Seeder;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventTypes = [
            ['name' => 'Kegiatan Internal'],
            ['name' => 'Kegiatan External'],           
        ];

        EventType::insert($eventTypes);
    }
}
