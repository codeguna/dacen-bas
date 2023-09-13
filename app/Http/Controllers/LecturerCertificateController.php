<?php

namespace App\Http\Controllers;

use App\Models\LecturerCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), LecturerCertificate::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }
        
        $certificate_attachment_file    = $request->file('certificate_attachment');
        
        $lecturer_id                    = $request->lecturer_id;
        $certificate_types_id           = $request->certificate_types_id;
        $certificate_date               = $request->certificate_date;
        $note                           = $request->note;
        

        $name_file = time() . "_" . $certificate_attachment_file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_sertifikat_dosen';
        $certificate_attachment_file->move($tujuan_upload, $name_file);

        $lecturerCertificate            = LecturerCertificate::create([
            'lecturer_id'               => $lecturer_id,
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

        return redirect()->route('admin.lecturer-certificates.index')
            ->with('success', 'LecturerCertificate updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lecturerCertificate = LecturerCertificate::select('certificate_attachment')->where('id', $id)->first();
        
        $file                   = public_path('data_sertifikat_dosen/' . $lecturerCertificate->certificate_attachment);

     $img                            = File::delete($file);

        $lecturerCertificate    = LecturerCertificate::find($id)->delete();

        return redirect()->back()->with('warning', 'Berhasil menghapus data Sertifikat.');
    }
}