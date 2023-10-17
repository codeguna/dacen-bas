<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Models\CertificateType;
use App\Models\EducationalStaff;
use App\Models\FunctionalPosition;
use App\Models\FunctionalRank;
use App\Models\Knowledge;
use App\Models\Lecturer;
use App\Models\Level;
use App\Models\StudyProgram;
use App\Models\University;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        if (Gate::allows('view_profile')) {
            return abort(403);
        }
        $countActiveDosen       = Lecturer::where('status',1)->count();
        $countInActiveDosen     = Lecturer::where('status',0)->count();
        $countActiveTendik      = EducationalStaff::where('status',1)->count();
        $countInActiveTendik    = EducationalStaff::where('status',0)->count();
        $totalDosen             = Lecturer::count();
        $totalTendik            = EducationalStaff::count();
        $tendik                 = EducationalStaff::orderBy('name','ASC')->get();
        $dosen                  = Lecturer::orderBy('name','ASC')->get();
        $j                      = 0;

        return view('homeLTE',compact(
            'countActiveDosen',
            'countInActiveDosen',
            'countActiveTendik',
            'countInActiveTendik',
            'totalDosen',
            'totalTendik',
            'tendik',
            'dosen',
            'j'
        ))->with('i');
    }

    public function myProfile(){
        if (! Gate::allows('view_profile')) {
            return abort(401);
        }
        $user = Auth::user(); // Assuming you are using Laravel's built-in authentication
        $id = $user->nomor_induk;

        if ($user->nomor_induk === null) {
            return redirect()->route('admin.updateprofile');
        }
        if ($user->position === 'Tendik'){
            $educationalStaff   = EducationalStaff::where('nip',$id)->first();
            if (!$educationalStaff) {
                abort(403,'NIP anda tidak cocok dengan Database kami, silahkan hubungi BAS'); // Show error 403
            }
            $universities       = University::orderBy('name','ASC')->pluck('id','name');   
            $levels             = Level::orderBy('name','ASC')->pluck('id','name');   
            $studyPrograms      = StudyProgram::orderBy('name','ASC')->pluck('id','name');   
            $knowledges         = Knowledge::orderBy('name','ASC')->pluck('id','name');   
            $certificateTypes   = CertificateType::orderBy('name','ASC')->pluck('id','name');  

        return view('educational-staff.show', 
        compact(
            'educationalStaff',
            'universities',
            'levels',
            'studyPrograms',
            'knowledges',
            'certificateTypes'
        ));
        }
        else{
            $lecturer = Lecturer::where('nidn',$id)->first();
            if (!$lecturer) {
                abort(403,'NIDN anda tidak cocok dengan Database kami, silahkan hubungi BAS'); // Show error 403
            }
            $universities           = University::orderBy('name','ASC')->pluck('id','name');   
            $levels                 = Level::orderBy('name','ASC')->pluck('id','name');   
            $studyPrograms          = StudyProgram::orderBy('name','ASC')->pluck('id','name');   
            $knowledges             = Knowledge::orderBy('name','ASC')->pluck('id','name');   
            $certificateTypes       = CertificateType::orderBy('name','ASC')->pluck('id','name');  
            $functionalRanks        = FunctionalRank::orderBy('name','ASC')->pluck('id','name'); 
            $functionalPositions    = FunctionalPosition::orderBy('name','ASC')->pluck('id','name'); 
    
            return view('lecturer.show', 
            compact(
                'lecturer',
                'universities',
                'levels',
                'studyPrograms',
                'knowledges',
                'certificateTypes',
                'functionalRanks',
                'functionalPositions'
            ));
        }
    }
    public function updateProfile() {
        $user = Auth::user();
        
        if (!empty($user->nomor_induk)) {
            return redirect('admin/myprofile');
        } else {
            return view('profile.update');
        }
    }

    public function saveProfile(Request $request){

        $position           = $request->position;
        $nomor_induk        = $request->nomor_induk;

        $id                 = Auth::user()->id;

        $users              = User::find($id);
        $users->update([
            'nomor_induk'           => $nomor_induk,
            'position'              => $position,

        ]);
        
        return redirect()->route('admin.myprofile')->with('success', 'Berhasil memperbarui Profil.');
    }
}