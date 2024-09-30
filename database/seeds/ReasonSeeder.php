<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reasons = [
            ['name' => 'Cuti'],
            ['name' => 'Izin'],           
            ['name' => 'Izin Khusus'],  
            ['name' => 'Izin Waktu Kerja'],            
            ['name' => 'Sakit'],           
            ['name' => 'Tanpa Pemberitahuan'],          
            ['name' => 'Piket'],          
            ['name' => 'Pulang Cepat'],          
            ['name' => 'Tidak Absen Masuk'],          
            ['name' => 'Penggantian (Jaga Lebaran/Tahun Baru, dll)'],          
            ['name' => 'Izin Khusus (Anak Menikah)'],          
            ['name' => 'Izin Menikah'],          
            ['name' => 'Cuti Melahirkan'],          
            ['name' => 'Penelitian'],          
            ['name' => 'PKM (Pengabdian Kepada Masyarakat) Anggaran Pribadi dan IDI Pangandaran'],          
            ['name' => 'Abdimas'],          
                    
        ];

        Reason::insert($reasons);
    }
}
