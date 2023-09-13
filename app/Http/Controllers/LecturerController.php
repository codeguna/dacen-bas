<?php

namespace App\Http\Controllers;

use App\Models\CertificateType;
use App\Models\FunctionalPosition;
use App\Models\FunctionalRank;
use App\Models\Homebase;
use App\Models\Knowledge;
use App\Models\Lecturer;
use App\Models\Level;
use App\Models\StudyProgram;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class LecturerController
 * @package App\Http\Controllers
 */
class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::paginate();

        return view('lecturer.index', compact('lecturers'))
            ->with('i', (request()->input('page', 1) - 1) * $lecturers->perPage());
    }

    public function inActive()
    {
        $lecturers = Lecturer::where('status',0)->paginate();

        return view('lecturer.inactive', compact('lecturers'))
            ->with('i', (request()->input('page', 1) - 1) * $lecturers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturer   = new Lecturer();
        $homebases  = Homebase::orderBy('name')->pluck('id','name');

        return view('lecturer.create', compact('lecturer','homebases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), Lecturer::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }
        
        $id_card_file       = $request->file('id_card');        
        $nidn               = $request->nidn;        
        $name               = $request->name;        
        $homebase_id        = $request->homebase_id;      
        $appointment_date   = $request->appointment_date;         
        $status             = $request->status;

        $name_file = time() . "_" . $id_card_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ktp_dosen';
        $id_card_file->move($tujuan_upload, $name_file);

        $lecturers  = Lecturer::create([
            'nidn'              => $nidn,
            'name'              => $name,
            'homebase_id'       => $homebase_id,
            'appointment_date'  => $appointment_date,
            'status'            => $status,
            'id_card'           => $name_file,
            'created_at'        => now()
        ]);

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturer = Lecturer::find($id);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturer = Lecturer::find($id);
        $homebases  = Homebase::orderBy('name')->pluck('id','name');

        return view('lecturer.edit', compact('lecturer','homebases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lecturer $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validator = Validator::make($request->all(), Lecturer::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }

        $id_card_file       = $request->file('id_card');
        $nidn               = $request->nidn;
        $name               = $request->name;
        $homebase_id        = $request->homebase_id;
        $appointment_date   = $request->appointment_date;
        $status             = $request->status;

        $name_file = time() . "_" . $id_card_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ktp_dosen';
        $id_card_file->move($tujuan_upload, $name_file);

        if ($lecturer) {
        $lecturer->update([
            'nidn'              => $nidn,
            'name'              => $name,
            'homebase_id'       => $homebase_id,
            'appointment_date'  => $appointment_date,
            'status'            => $status,
            'id_card'           => $name_file,
        ]);

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer updated successfully');
    }
}

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        
        $lecturer    = Lecturer::select('id_card')->where('id', $id)->first();

        $file = public_path('data_ktp_dosen/' . $lecturer->id_card);
        $img = File::delete($file);

        $lecturer = Lecturer::find($id)->delete();
        
        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer deleted successfully');
    }

    public function setStatus(Request $request){
        $status = $request->status;
        $id     = $request->id;

        $Lecturer = Lecturer::find($id);
        $Lecturer->update([
            'status'           => $status,
        ]);
        
        return redirect()->back()->with('warning', 'Berhasil memperbarui Status Dosen.');
    }
}