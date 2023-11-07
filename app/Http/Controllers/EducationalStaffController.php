<?php

namespace App\Http\Controllers;

use App\Models\CertificateType;
use App\Models\Departmen;
use App\Models\EducationalStaff;
use App\Models\Knowledge;
use App\Models\Level;
use App\Models\StudyProgram;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class EducationalStaffController
 * @package App\Http\Controllers
 */
class EducationalStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationalStaffs = EducationalStaff::where('status',1)->orderBy('name','ASC')->get();

        return view('educational-staff.index', compact('educationalStaffs'))
            ->with('i');
    }
    public function inActive()
    {
        $educationalStaffs = EducationalStaff::where('status',0)->paginate();

        return view('educational-staff.inactive', compact('educationalStaffs'))
            ->with('i', (request()->input('page', 1) - 1) * $educationalStaffs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getDepartmensId    = Departmen::orderBy('name','ASC')->pluck('id','name');
        $educationalStaff   = new EducationalStaff();

        return view('educational-staff.create', 
        compact('educationalStaff'
    ,'getDepartmensId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), EducationalStaff::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }
        
        $id_card_file   = $request->file('id_card');
        $nip            = $request->nip;
        $name           = $request->name;
        $department_id  = $request->department_id;
        $date_of_entry  = $request->date_of_entry;
        $status         = $request->status;

        $name_file = time() . "_" . $id_card_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ktp_tendik';
        $id_card_file->move($tujuan_upload, $name_file);

        $educationalStaffs  = EducationalStaff::create([
            'nip'           => $nip,
            'name'          => $name,
            'department_id' => $department_id,
            'date_of_entry' => $date_of_entry,
            'status'        => $status,
            'id_card'       => $name_file,
            'created_at'    => now()
        ]);

        return redirect()->route('admin.educational-staffs.index')
            ->with('success', 'Berhasil menambahkan data TenDik baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $educationalStaff   = EducationalStaff::find($id);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educationalStaff = EducationalStaff::find($id);
        $getDepartmensId    = Departmen::orderBy('name','ASC')->pluck('id','name');
        return view('educational-staff.edit', compact('educationalStaff','getDepartmensId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EducationalStaff $educationalStaff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationalStaff $educationalStaff)
    {        
        $validator = Validator::make($request->all(), EducationalStaff::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }

        $id_card_file   = $request->file('id_card');
        $nip            = $request->nip;
        $name           = $request->name;
        $department_id  = $request->department_id;
        $date_of_entry  = $request->date_of_entry;
        $status         = $request->status;

        $name_file = time() . "_" . $id_card_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ktp_tendik';
        $id_card_file->move($tujuan_upload, $name_file);

        if ($educationalStaff) {
        $educationalStaff->update([
            'nip'           => $nip,
            'name'          => $name,
            'department_id' => $department_id,
            'date_of_entry' => $date_of_entry,
            'status'        => $status,
            'id_card'       => $name_file,
        ]);

        return redirect()->route('admin.educational-staffs.index')
            ->with('success', 'EducationalStaff updated successfully');
    }
}

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $educationalStaffs     = EducationalStaff::select('id_card')->where('id', $id)->first();

        $file = public_path('data_ktp_tendik/' . $educationalStaffs->id_card);
        $img = File::delete($file);

        $educationalStaffs = EducationalStaff::find($id)->delete();

        return redirect()->route('admin.educational-staffs.index')
            ->with('success', 'Berhasil menghapus data TenDik');
    }

    public function setStatus(Request $request){
        $status = $request->status;
        $id     = $request->id;

        $educationalStaff = EducationalStaff::find($id);
        $educationalStaff->update([
            'status'           => $status,
        ]);
        
        return redirect()->back()->with('warning', 'Berhasil memperbarui Status TenDik.');
    }
}