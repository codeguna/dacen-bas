<?php

namespace App\Http\Controllers;

use App\Models\TypeLetter;
use Illuminate\Http\Request;

/**
 * Class TypeLetterController
 * @package App\Http\Controllers
 */
class TypeLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeLetters = TypeLetter::orderBy('name','ASC')->paginate();

        return view('type-letter.index', compact('typeLetters'))
            ->with('i', (request()->input('page', 1) - 1) * $typeLetters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeLetter = new TypeLetter();
        return view('type-letter.create', compact('typeLetter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeLetter::$rules);

        $typeLetter = TypeLetter::create($request->all());

        return redirect()->route('admin.type-letters.index')
            ->with('success', 'Tipe Surat Berhasil ditambahkan!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeLetter = TypeLetter::find($id);

        return view('type-letter.show', compact('typeLetter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeLetter = TypeLetter::find($id);

        return view('type-letter.edit', compact('typeLetter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeLetter $typeLetter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeLetter $typeLetter)
    {
        request()->validate(TypeLetter::$rules);

        $typeLetter->update($request->all());

        return redirect()->route('admin.type-letters.index')
            ->with('success', 'TypeLetter updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeLetter = TypeLetter::find($id)->delete();

        return redirect()->route('admin.type-letters.index')
            ->with('success', 'TypeLetter deleted successfully');
    }
}
