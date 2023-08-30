<?php

namespace Database\Seeders;

use App\Models\Departmen;
use Illuminate\Database\Seeder;

class DepartmensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmens = [
            ['name'         => 'Satuan Penjaminan Mutu',
            'short_name'    =>  'SPM'],
            ['name'         => 'Sistem Informasi Manajemen',
            'short_name'    =>  'SIM'],
            ['name'         => 'REKTOR',
            'short_name'    =>  'REKTOR'],
            ['name'         => 'Badan Perencana',
            'short_name'    =>  'BP'],
            ['name'         => 'Marketting Communication',
            'short_name'    =>  'MARCOMM'],
            ['name'         => 'Bursa Tenaga Kerja',
            'short_name'    =>  'BTK'],
            ['name'         => 'Biro Administrasi Umum',
            'short_name'    =>  'BAU'],
            ['name'         => 'Wakil Rektor Bidang Sumber Daya',
            'short_name'    =>  'WAREK SUMBER DAYA'],
            ['name'         => 'Biro Administrasi Sumber Daya',
            'short_name'    =>  'BAS'],
            ['name'         => 'Umum',
            'short_name'    =>  'UMUM'],
            ['name'         => 'Keuangan & Akuntansi',
            'short_name'    =>  'KEUANGAN'],
            ['name'         => 'Personalia',
            'short_name'    =>  'PERSONALIA'],
            ['name'         => 'Wakil Rektor Bidang Akademik & Kemahasiswaaan',
            'short_name'    =>  'WAREK AKADEMIK'],
            ['name'         => 'Biro Administrasi Akademik',
            'short_name'    =>  'BAA'],
            ['name'         => 'Lembaga Penelitian dan Pengabdian Masyarakat',
            'short_name'    =>  'LPPM'],
            ['name'         => 'Program Studi SI',
            'short_name'    =>  'SI'],
            ['name'         => 'Program Studi IF',
            'short_name'    =>  'IF'],
            ['name'         => 'Program Studi KA',
            'short_name'    =>  'KA'],
            ['name'         => 'Program Studi AB',
            'short_name'    =>  'AB'],
            ['name'         => 'Koordinator Bidang Studi',
            'short_name'    =>  'KBS'],
        ];

        Departmen::insert($departmens);
    }
}