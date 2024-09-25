<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\TypeLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

/**
 * Class LetterController
 * @package App\Http\Controllers
 */
class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letter::paginate();


        return view('letter.index', compact('letters'))
            ->with('i', (request()->input('page', 1) - 1) * $letters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $letter = new Letter();
        return view('letter.create', compact('letter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Letter::$rules);
        if ($validator->fails()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }

        $file           = $request->file('file');
        $letter_type    = $request->letter_type;
        $letter_number  = $request->letter_number;
        $date           = $request->date;
        $from           = $request->from;
        $title          = $request->title;
        $type_letter_id = $request->type_letter_id;

        $name_file = time() . "_" . $file->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        if ($letter_type == 1) {
            $tujuan_upload = 'data_surat_masuk';
            $route = 'admin.letters.inbox';
        }
        if ($letter_type == 0) {
            $tujuan_upload = 'data_surat_keluar';
            $route = 'admin.letters.outbox';
        }

        $file->move($tujuan_upload, $name_file);

        $letters  = Letter::create([
            'letter_type'       => $letter_type,
            'letter_number'     => $letter_number,
            'date'              => $date,
            'from'              => $from,
            'title'             => $title,
            'file'              => $name_file,
            'type_letter_id'    => $type_letter_id,
            'created_at'        => now()
        ]);

        return redirect()->route($route)
            ->with('success', 'Berhasil Menambahkan Surat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $letter = Letter::find($id);

        return view('letter.show', compact('letter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $letter = Letter::find($id);
        $typeLetters = TypeLetter::orderBy('name', 'ASC')->pluck('id', 'name');

        return view('letter.edit', compact('letter', 'typeLetters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Letter $letter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letter $letter)
    {
        $validator = Validator::make($request->all(), Letter::$rules);
        if ($validator->fails()) {
            // If validation fails, redirect back with error messages
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Periksa kembali inputan anda dan pastikan file tidak melebihi 2MB');
        }

        $letter_type    = $request->letter_type;
        $letter_number  = $request->letter_number;
        $date           = $request->date;
        $from           = $request->from;
        $title          = $request->title;
        $type_letter_id = $request->type_letter_id;

        $updateData = [
            'letter_type'       => $letter_type,
            'letter_number'     => $letter_number,
            'date'              => $date,
            'from'              => $from,
            'title'             => $title,
            'type_letter_id'    => $type_letter_id,
            'created_at'        => now()
        ];

        $id_card_file = $request->file('file');
        if ($letter_type == 1) {
            $tujuan_upload = 'data_surat_masuk';
            $route = 'admin.letters.inbox';
        }
        if ($letter_type == 0) {
            $tujuan_upload = 'data_surat_keluar';
            $route = 'admin.letters.outbox';
        }
        if ($id_card_file) {
            $name_file = time() . "_" . $id_card_file->getClientOriginalName();
            // Directory for uploading the file            
            $id_card_file->move($tujuan_upload, $name_file);

            $updateData['file'] = $name_file;
        }

        if ($letter) {
            $letter->update($updateData);

            return redirect()->route($route)
                ->with('success', 'Surat berhasil diperbarui!');
        }

        return redirect()->route($route)
            ->with('success', 'Surat berhasil diperbarui!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $letter = Letter::find($id);
        if (!$letter) {
            return redirect()->back()
                ->with('error', 'Surat tidak ditemukan!');
        }

        $letter_type = $letter->letter_type;

        if ($letter->letter_type == 1) {
            $file = public_path('data_surat_masuk/' . $letter->file);
        } elseif ($letter->letter_type == 0) {
            $file = public_path('data_surat_keluar/' . $letter->file);
        }

        if (File::exists($file)) {
            File::delete($file);
        }

        $letter->delete();

        return redirect()->back()
            ->with('success', 'Surat berhasil dihapus!');
    }

    public function inbox()
    {
        $letters = Letter::where('letter_type', '=', 1)->latest()->get();
        $type_letter = 1;
        $typeLetters = TypeLetter::orderBy('name', 'ASC')->pluck('id', 'name');

        return view('letter.index', compact('letters', 'type_letter', 'typeLetters'))
            ->with('i');
    }
    public function outbox()
    {
        $letters = Letter::where('letter_type', 0)->latest()->get();
        $type_letter = 0;
        $typeLetters = TypeLetter::orderBy('name', 'ASC')->pluck('id', 'name');

        return view('letter.index', compact('letters', 'type_letter', 'typeLetters'))
            ->with('i');
    }
}
