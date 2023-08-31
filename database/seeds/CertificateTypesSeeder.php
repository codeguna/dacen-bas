<?php

namespace Database\Seeders;

use App\Models\CertificateType;
use Illuminate\Database\Seeder;

class CertificateTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $certificateTypes = [
            ['name' => 'Kompetensi'],
            ['name' => 'Kualifikasi'],           
        ];

        CertificateType::insert($certificateTypes);
    }
}