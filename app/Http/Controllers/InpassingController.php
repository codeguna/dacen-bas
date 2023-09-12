<?php

namespace App\Http\Controllers;

use App\Models\Inpassing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class InpassingController
 * @package App\Http\Controllers
 */
class InpassingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inpassings = Inpassing::paginate();

        return view('inpassing.index', compact('inpassings'))
            ->with('i', (request()->input('page', 1) - 1) * $inpassings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inpassing = new Inpassing();
        return view('inpassing.create', compact('inpassing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inpassing::$rules);

        $inpassing_attachment_file  = $request->file('inpassing_attachment');
        $lecturer_id                = $request->lecturer_id;
        $rank_id                    = $request->rank_id;
        $determination_date         = $request->determination_date;
        $tmt                        = $request->tmt;
        

        $name_file                  = time() . "_" . $inpassing_attachment_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload              = 'data_inpassing_dosen';
        $inpassing_attachment_file->move($tujuan_upload, $name_file);

        $inpassing  = Inpassing::create([
            'lecturer_id'           => $lecturer_id,
            'rank_id'               => $rank_id,
            'determination_date'    => $determination_date,
            'tmt'                   => $tmt,
            'inpassing_attachment'  => $name_file,
            'created_at'            => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Inpassing Dosen.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inpassing = Inpassing::find($id);

        return view('inpassing.show', compact('inpassing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inpassing = Inpassing::find($id);

        return view('inpassing.edit', compact('inpassing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inpassing $inpassing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inpassing $inpassing)
    {
        request()->validate(Inpassing::$rules);

        $inpassing->update($request->all());

        return redirect()->route('admin.inpassings.index')
            ->with('success', 'Inpassing updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inpassing  = Inpassing::select('inpassing_attachment')->where('id', $id)->first();

        $file       = public_path('data_inpassing_dosen/' . $inpassing->inpassing_attachment);
        $img        = File::delete($file);
        $inpassing  = Inpassing::find($id)->delete();

        return redirect()->back()->with('warning', 'Berhasil menghapus data Inpassing.');
    }
}