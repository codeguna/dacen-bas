<?php

namespace App\Http\Controllers;

use App\Models\Homebase;
use App\Models\Lecturer;
use Illuminate\Http\Request;

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
        request()->validate(Lecturer::$rules);
        $id_card_file   = $request->file('id_card');
        $nip            = $request->nip;
        $name           = $request->name;
        $department_id  = $request->department_id;
        $date_of_entry  = $request->date_of_entry;
        $status         = $request->status;

        $name_file = time() . "_" . $id_card_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_ktp_dosen';
        $id_card_file->move($tujuan_upload, $name_file);

        $educationalStaffs  = Lecturer::create([
            'nip'           => $nip,
            'name'          => $name,
            'department_id' => $department_id,
            'date_of_entry' => $date_of_entry,
            'status'        => $status,
            'id_card'       => $name_file,
            'created_at'    => now()
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

        return view('lecturer.show', compact('lecturer'));
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

        return view('lecturer.edit', compact('lecturer'));
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
        request()->validate(Lecturer::$rules);

        $lecturer->update($request->all());

        return redirect()->route('admin.lecturers.index')
            ->with('success', 'Lecturer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
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