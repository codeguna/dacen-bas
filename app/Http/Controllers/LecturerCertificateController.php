<?php

namespace App\Http\Controllers;

use App\Models\LecturerCertificate;
use Illuminate\Http\Request;

/**
 * Class LecturerCertificateController
 * @package App\Http\Controllers
 */
class LecturerCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturerCertificates = LecturerCertificate::paginate();

        return view('lecturer-certificate.index', compact('lecturerCertificates'))
            ->with('i', (request()->input('page', 1) - 1) * $lecturerCertificates->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lecturerCertificate = new LecturerCertificate();
        return view('lecturer-certificate.create', compact('lecturerCertificate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LecturerCertificate::$rules);

        $lecturerCertificate = LecturerCertificate::create($request->all());

        return redirect()->route('lecturer-certificates.index')
            ->with('success', 'LecturerCertificate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lecturerCertificate = LecturerCertificate::find($id);

        return view('lecturer-certificate.show', compact('lecturerCertificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecturerCertificate = LecturerCertificate::find($id);

        return view('lecturer-certificate.edit', compact('lecturerCertificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LecturerCertificate $lecturerCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LecturerCertificate $lecturerCertificate)
    {
        request()->validate(LecturerCertificate::$rules);

        $lecturerCertificate->update($request->all());

        return redirect()->route('lecturer-certificates.index')
            ->with('success', 'LecturerCertificate updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lecturerCertificate = LecturerCertificate::find($id)->delete();

        return redirect()->route('lecturer-certificates.index')
            ->with('success', 'LecturerCertificate deleted successfully');
    }
}
