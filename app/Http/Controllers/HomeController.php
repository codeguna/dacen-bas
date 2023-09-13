<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\EducationalStaff;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countActiveDosen       = Lecturer::where('status',1)->count();
        $countInActiveDosen     = Lecturer::where('status',0)->count();
        $countActiveTendik      = EducationalStaff::where('status',1)->count();
        $countInActiveTendik    = EducationalStaff::where('status',0)->count();
        $totalDosen             = Lecturer::count();
        $totalTendik            = EducationalStaff::count();

        return view('homeLTE',compact(
            'countActiveDosen',
            'countInActiveDosen',
            'countActiveTendik',
            'countInActiveTendik',
            'totalDosen',
            'totalTendik'
        ));
    }
}