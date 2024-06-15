<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dosenProdi()
    {
        $d3Adbis = 1;
        $s1Adbis = 2;
        $d3Akuntansi = 3;
        $s1Akuntansi = 4;
        $s1TeknikInformatika = 5;
        $s1SistemInformasi = 6;

        $d3AdbisLecture = Lecturer::select('name')->where('homebase_id', $d3Adbis)->orderBy('name', 'ASC')->get();
        $s1AdbisLecture = Lecturer::select('name')->where('homebase_id', $s1Adbis)->orderBy('name', 'ASC')->get();
        $d3AkuntansiLecture = Lecturer::select('name')->where('homebase_id', $d3Akuntansi)->orderBy('name', 'ASC')->get();
        $s1AkuntansiLecture = Lecturer::select('name')->where('homebase_id', $s1Akuntansi)->orderBy('name', 'ASC')->get();
        $s1TeknikInformatikaLecture = Lecturer::select('name')->where('homebase_id', $s1TeknikInformatika)->orderBy('name', 'ASC')->get();
        $s1SistemInformasiLecture = Lecturer::select('name')->where('homebase_id', $s1SistemInformasi)->orderBy('name', 'ASC')->get();

        return view(
            'dashboard.dosen-prodi',
            compact(
                'd3AdbisLecture',
                's1AdbisLecture',
                'd3AkuntansiLecture',
                's1AkuntansiLecture',
                's1TeknikInformatikaLecture',
                's1SistemInformasiLecture'
            )
        );
    }
    public function viewDosenProdi()
    {
        return view(
            'dashboard.dosen-prodi'
        );
    }
}
