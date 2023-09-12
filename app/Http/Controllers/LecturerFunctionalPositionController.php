<?php

namespace App\Http\Controllers;

use App\Models\LecturerFunctionalPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class LecturerFunctionalPositionController
 * @package App\Http\Controllers
 */
class LecturerFunctionalPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturerFunctionalPositions = LecturerFunctionalPosition::paginate();

        return view('lecturer-functional-position.index', compact('lecturerFunctionalPositions'))
            ->with('i', (request()->input('page', 1) - 1) * $lecturerFunctionalPositions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturerFunctionalPosition = new LecturerFunctionalPosition();
        return view('lecturer-functional-position.create', compact('lecturerFunctionalPosition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LecturerFunctionalPosition::$rules);
        $functional_position_attachment_file        = $request->file('functional_position_attachment');
        $lecturer_id                                = $request->lecturer_id;
        $functional_position_id                     = $request->functional_position_id;
        $determination_date                         = $request->determination_date;
        $tmt                                        = $request->tmt;
        $credit_score                               = $request->credit_score;
        
        $name_file = time() . "_" . $functional_position_attachment_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_jabfung_dosen';
        $functional_position_attachment_file->move($tujuan_upload, $name_file);

        $lecturerFunctionalPosition                 =  LecturerFunctionalPosition::create([
            'lecturer_id'                           => $lecturer_id,
            'functional_position_id'                => $functional_position_id,
            'determination_date'                    => $determination_date,
            'tmt'                                   => $tmt,
            'credit_score'                          => $credit_score,
            'functional_position_attachment'        => $name_file,
            'created_at'                            => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Jabatan Fungsional Dosen.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturerFunctionalPosition = LecturerFunctionalPosition::find($id);

        return view('lecturer-functional-position.show', compact('lecturerFunctionalPosition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturerFunctionalPosition = LecturerFunctionalPosition::find($id);

        return view('lecturer-functional-position.edit', compact('lecturerFunctionalPosition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LecturerFunctionalPosition $lecturerFunctionalPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LecturerFunctionalPosition $lecturerFunctionalPosition)
    {
        request()->validate(LecturerFunctionalPosition::$rules);

        $lecturerFunctionalPosition->update($request->all());

        return redirect()->route('admin.lecturer-functional-positions.index')
            ->with('success', 'LecturerFunctionalPosition updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {        

        $lecturerFunctionalPosition = LecturerFunctionalPosition::select('functional_position_attachment')->where('id', $id)->first();

        $file                       = public_path('data_jabfung_dosen/' . $lecturerFunctionalPosition->functional_position_attachment);
        $img                        = File::delete($file);
        $lecturerFunctionalPosition = LecturerFunctionalPosition::find($id)->delete();

        return redirect()->back()->with('warning', 'Berhasil menghapus data Jabatan Fungsional.');
    }
}