<?php

namespace Database\Seeders;

use App\Models\TypeLetter;
use Illuminate\Database\Seeder;

class TypeLetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeLetters = [
            ['name' => 'Surat Undangan'],
            ['name' => 'Surat Keputusan'],
            ['name' => 'Surat Permohonan'],
            ['name' => 'Surat keterangan'],
            ['name' => 'Surat Peraturan'],
            ['name' => 'Surat Tugas'],
            ['name' => 'Surat Edaran'],
            ['name' => 'Berita Acara'],
            ['name' => 'Surat Perjanjian'],
            ['name' => 'Surat Pernyataan'],
            ['name' => 'Surat Tugas Belajar'],
            ['name' => 'Surat Pemberitahuan'],
            ['name' => 'Evaluasi Karyawan'],
            ['name' => 'Daftar Hadir'],
            ['name' => 'Surat Kesepakatan Bersama'],
            ['name' => 'Evaluasi Jabatan'],
            ['name' => 'Formulir Personalia'],
        ];

        TypeLetter::insert($typeLetters);
    }
}
