<?php

namespace App\Http\Controllers;

use App\Models\FunctionalPosition;
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
    public function jabatanAkademik()
    {
        $asistenAhli    = 1;
        $lektor         = 2;
        $lektorKepala   = 3;
        $guruBesar      = 4;

        $d3AB   = 1;
        $s1AB   = 2;
        $d3KA   = 3;
        $s1KA   = 4;
        $s1SI   = 5;
        $s1TI   = 6;

        $jabatan = [
            'asistenAhli' => 1,
            'lektor' => 2,
            'lektorKepala' => 3,
            'guruBesar' => 4,
        ];

        //Count Jabatan Fungsional
        $lecturer_AsistenAhli   = Lecturer::whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $lecturer_lektor        = Lecturer::whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $lecturer_lektorKepala  = Lecturer::whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $lecturer_guruBesar     = Lecturer::whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Fungsional

        //Count Jabatan Funsional Per Prodi D3 ADBIS
        $d3AB_lecturer_AsistenAhli   = Lecturer::where('homebase_id', $d3AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $d3AB_lecturer_lektor        = Lecturer::where('homebase_id', $d3AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $d3AB_lecturer_lektorKepala  = Lecturer::where('homebase_id', $d3AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $d3AB_lecturer_guruBesar     = Lecturer::where('homebase_id', $d3AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Funsional Per Prodi D3 ADBIS
        //Count Jabatan Funsional Per Prodi S1 ADBIS
        $s1AB_lecturer_AsistenAhli   = Lecturer::where('homebase_id', $s1AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $s1AB_lecturer_lektor        = Lecturer::where('homebase_id', $s1AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $s1AB_lecturer_lektorKepala  = Lecturer::where('homebase_id', $s1AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $s1AB_lecturer_guruBesar     = Lecturer::where('homebase_id', $s1AB)->whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Funsional Per Prodi S1 ADBIS
        //Count Jabatan Funsional Per Prodi D3 KOMPAK
        $d3KA_lecturer_AsistenAhli   = Lecturer::where('homebase_id', $d3KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $d3KA_lecturer_lektor        = Lecturer::where('homebase_id', $d3KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $d3KA_lecturer_lektorKepala  = Lecturer::where('homebase_id', $d3KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $d3KA_lecturer_guruBesar     = Lecturer::where('homebase_id', $d3KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Funsional Per Prodi D3 KOMPAK
        //Count Jabatan Funsional Per Prodi S1 KOMPAK
        $s1KA_lecturer_AsistenAhli   = Lecturer::where('homebase_id', $s1KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $s1KA_lecturer_lektor        = Lecturer::where('homebase_id', $s1KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $s1KA_lecturer_lektorKepala  = Lecturer::where('homebase_id', $s1KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $s1KA_lecturer_guruBesar     = Lecturer::where('homebase_id', $s1KA)->whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Funsional Per Prodi S1 KOMPAK
        //Count Jabatan Funsional Per Prodi S1 SI
        $s1SI_lecturer_AsistenAhli   = Lecturer::where('homebase_id', $s1SI)->whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $s1SI_lecturer_lektor        = Lecturer::where('homebase_id', $s1SI)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $s1SI_lecturer_lektorKepala  = Lecturer::where('homebase_id', $s1SI)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $s1SI_lecturer_guruBesar     = Lecturer::where('homebase_id', $s1SI)->whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Funsional Per Prodi S1 SI
        //Count Jabatan Funsional Per Prodi S1 TI
        $s1TI_lecturer_AsistenAhli   = Lecturer::where('homebase_id', $s1TI)->whereHas('lecturerFunctionalPositions', function ($query) use ($asistenAhli) {
            $query->where('functional_position_id', $asistenAhli);
        })->count();
        $s1TI_lecturer_lektor        = Lecturer::where('homebase_id', $s1TI)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektor) {
            $query->where('functional_position_id', $lektor);
        })->count();
        $s1TI_lecturer_lektorKepala  = Lecturer::where('homebase_id', $s1TI)->whereHas('lecturerFunctionalPositions', function ($query) use ($lektorKepala) {
            $query->where('functional_position_id', $lektorKepala);
        })->count();
        $s1TI_lecturer_guruBesar     = Lecturer::where('homebase_id', $s1TI)->whereHas('lecturerFunctionalPositions', function ($query) use ($guruBesar) {
            $query->where('functional_position_id', $guruBesar);
        })->count();
        //Count Jabatan Funsional Per Prodi S1 TI

        return view(
            'dashboard.jabatan-akademik',
            compact(
                'jabatan',
                'asistenAhli',
                'lektor',
                'lektorKepala',
                'guruBesar',
                'lecturer_AsistenAhli',
                'lecturer_lektor',
                'lecturer_lektorKepala',
                'lecturer_guruBesar',
                'd3AB_lecturer_AsistenAhli',
                'd3AB_lecturer_lektor',
                'd3AB_lecturer_lektorKepala',
                'd3AB_lecturer_guruBesar',
                's1AB_lecturer_AsistenAhli',
                's1AB_lecturer_lektor',
                's1AB_lecturer_lektorKepala',
                's1AB_lecturer_guruBesar',
                'd3KA_lecturer_AsistenAhli',
                'd3KA_lecturer_lektor',
                'd3KA_lecturer_lektorKepala',
                'd3KA_lecturer_guruBesar',
                's1KA_lecturer_AsistenAhli',
                's1KA_lecturer_lektor',
                's1KA_lecturer_lektorKepala',
                's1KA_lecturer_guruBesar',
                's1SI_lecturer_AsistenAhli',
                's1SI_lecturer_lektor',
                's1SI_lecturer_lektorKepala',
                's1SI_lecturer_guruBesar',
                's1TI_lecturer_AsistenAhli',
                's1TI_lecturer_lektor',
                's1TI_lecturer_lektorKepala',
                's1TI_lecturer_guruBesar'
            )
        );
    }

    public function getJabatanAkademik($jabatan)
    {
        $jabatanID  = $jabatan;
        $title      = FunctionalPosition::find($jabatan);

        $lecturers  = Lecturer::whereHas('lecturerFunctionalPositions', function ($query) use ($jabatanID) {
            $query->where('functional_position_id', $jabatanID);
        })->orderBy('name', 'ASC')->get();

        return view(
            'dashboard.view-dosen-jabatan-akademik',
            compact(
                'lecturers',
                'title'
            )
        )->with('i');
    }
}
