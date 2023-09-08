<?php

namespace App\Http\Controllers;

use App\Models\EducationalStaffEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
/**
 * Class EducationalStaffEducationController
 * @package App\Http\Controllers
 */
class EducationalStaffEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationalStaffEducations = EducationalStaffEducation::paginate();

        return view('educational-staff-education.index', compact('educationalStaffEducations'))
            ->with('i', (request()->input('page', 1) - 1) * $educationalStaffEducations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationalStaffEducation = new EducationalStaffEducation();
        return view('educational-staff-education.create', compact('educationalStaffEducation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EducationalStaffEducation::$rules);
        $certificate_file       = $request->file('certificate');
        $educational_staff_id   = $request->educational_staff_id;
        $level_id               = $request->level_id;
        $study_program_id       = $request->study_program_id;
        $university_id          = $request->university_id;
        $knowledge_id           = $request->knowledge_id;
        

        $name_file = time() . "_" . $certificate_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ijazah_tendik';
        $certificate_file->move($tujuan_upload, $name_file);

        $educationalStaffEducation  = EducationalStaffEducation::create([
            'educational_staff_id'  => $educational_staff_id,
            'level_id'              => $level_id,
            'study_program_id'      => $study_program_id,
            'university_id'         => $university_id,
            'knowledge_id'          => $knowledge_id,
            'certificate'           => $name_file,
            'created_at'            => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data TenDik baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $educationalStaffEducation = EducationalStaffEducation::find($id);

        return view('educational-staff-education.show', compact('educationalStaffEducation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educationalStaffEducation = EducationalStaffEducation::find($id);

        return view('educational-staff-education.edit', compact('educationalStaffEducation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EducationalStaffEducation $educationalStaffEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationalStaffEducation $educationalStaffEducation)
    {
        request()->validate(EducationalStaffEducation::$rules);

        $educationalStaffEducation->update($request->all());

        return redirect()->route('admin.educational-staff-educations.index')
            ->with('success', 'EducationalStaffEducation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {        
        $educationalStaffEducation      = EducationalStaffEducation::select('certificate')->where('id', $id)->first();

        $file = public_path('data_ijazah_tendik/' . $educationalStaffEducation->certificate);
        $img = File::delete($file);

        $educationalStaffEducation = EducationalStaffEducation::find($id)->delete();

        return redirect()->back()->with('warning', 'Berhasil menghapus data Pendidikan.');
    }    
    
}