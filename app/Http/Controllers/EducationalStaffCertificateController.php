<?php

namespace App\Http\Controllers;

use App\Models\EducationalStaffCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/**
 * Class EducationalStaffCertificateController
 * @package App\Http\Controllers
 */
class EducationalStaffCertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educationalStaffCertificates = EducationalStaffCertificate::paginate();

        return view('educational-staff-certificate.index', compact('educationalStaffCertificates'))
            ->with('i', (request()->input('page', 1) - 1) * $educationalStaffCertificates->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educationalStaffCertificate = new EducationalStaffCertificate();
        return view('educational-staff-certificate.create', compact('educationalStaffCertificate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EducationalStaffCertificate::$rules);
        $certificate_attachment_file    = $request->file('certificate_attachment');
        
        $educational_staff_id           = $request->educational_staff_id;
        $certificate_types_id           = $request->certificate_types_id;
        $certificate_date               = $request->certificate_date;
        $note                           = $request->note;
        

        $name_file = time() . "_" . $certificate_attachment_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_sertifikat_tendik';
        $certificate_attachment_file->move($tujuan_upload, $name_file);

        $educationalStaffCertificate  = EducationalStaffCertificate::create([
            'educational_staff_id'      => $educational_staff_id,
            'certificate_types_id'      => $certificate_types_id,
            'certificate_date'          => $certificate_date,
            'note'                      => $note,
            'certificate_attachment'    => $name_file,
            'created_at'                => now()
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Sertifikat baru.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $educationalStaffCertificate = EducationalStaffCertificate::find($id);

        return view('educational-staff-certificate.show', compact('educationalStaffCertificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educationalStaffCertificate = EducationalStaffCertificate::find($id);

        return view('educational-staff-certificate.edit', compact('educationalStaffCertificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EducationalStaffCertificate $educationalStaffCertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationalStaffCertificate $educationalStaffCertificate)
    {
        request()->validate(EducationalStaffCertificate::$rules);

        $educationalStaffCertificate->update($request->all());

        return redirect()->route('admin.educational-staff-certificates.index')
            ->with('success', 'EducationalStaffCertificate updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $educationalStaffCertificate      = EducationalStaffCertificate::select('certificate_attachment')->where('id', $id)->first();

        $file = public_path('data_sertifikat_tendik/' . $educationalStaffCertificate->certificate_attachment);
        $img = File::delete($file);

            $educationalStaffCertificate = EducationalStaffCertificate::find($id)->delete();

        return redirect()->back()->with('warning', 'Berhasil menghapus data Sertifikat.');
    }
}