<?php

namespace App\Http\Controllers;

use App\Models\LecturerEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class LecturerEducationController
 * @package App\Http\Controllers
 */
class LecturerEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturerEducations = LecturerEducation::paginate();

        return view('lecturer-education.index', compact('lecturerEducations'))
            ->with('i', (request()->input('page', 1) - 1) * $lecturerEducations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturerEducation = new LecturerEducation();
        return view('lecturer-education.create', compact('lecturerEducation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validator = Validator::make($request->all(), LecturerEducation::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }
        
        $certificate_file       = $request->file('certificate');
        $lecturer_id            = $request->lecturer_id;
        $level_id               = $request->level_id;
        $study_program_id       = $request->study_program_id;
        $university_id          = $request->university_id;
        $knowledge_id           = $request->knowledge_id;
        

        $name_file = time() . "_" . $certificate_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ijazah_dosen';
        $certificate_file->move($tujuan_upload, $name_file);

        $LecturerEducation  = LecturerEducation::create([
            'lecturer_id'           => $lecturer_id,
            'level_id'              => $level_id,
            'study_program_id'      => $study_program_id,
            'university_id'         => $university_id,
            'knowledge_id'          => $knowledge_id,
            'certificate'           => $name_file,
            'created_at'            => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Pendidikan Dosen.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturerEducation = LecturerEducation::find($id);

        return view('lecturer-education.show', compact('lecturerEducation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturerEducation = LecturerEducation::find($id);

        return view('lecturer-education.edit', compact('lecturerEducation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LecturerEducation $lecturerEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LecturerEducation $lecturerEducation)
    {
        request()->validate(LecturerEducation::$rules);

        $lecturerEducation->update($request->all());

        return redirect()->route('admin.lecturer-educations.index')
            ->with('success', 'LecturerEducation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lecturerEducation      = LecturerEducation::select('certificate')->where('id', $id)->first();

        $file = public_path('data_ijazah_dosen/' . $lecturerEducation->certificate);
        $img = File::delete($file);
        $lecturerEducation = LecturerEducation::find($id)->delete();

        return redirect()->back()->with('warning', 'Berhasil menghapus data Pendidikan.');
    }
}