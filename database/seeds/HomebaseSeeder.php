<?php

namespace Database\Seeders;

use App\Models\Homebase;
use Illuminate\Database\Seeder;

class HomebaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $homebases = [
            ['name' => 'Administrasi Bisnis - D3'],
            ['name' => 'Administrasi Bisnis - S1'],
            ['name' => 'Komputerisasi Akuntansi – D3'],
            ['name' => 'Akuntansi - S1'],
            ['name' => 'Teknik Informatika – S1'],
            ['name' => 'Sistem Informasi – S1'],
        ];

        Homebase::insert($homebases);
    }
}