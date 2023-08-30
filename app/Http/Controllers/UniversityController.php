<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

/**
 * Class UniversityController
 * @package App\Http\Controllers
 */
class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::orderBy('name','ASC')->paginate();

        return view('university.index', compact('universities'))
            ->with('i', (request()->input('page', 1) - 1) * $universities->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $university = new University();
        return view('university.create', compact('university'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(University::$rules);

        $university = University::create($request->all());

        return redirect()->route('admin.universities.index')
            ->with('success', 'University created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $university = University::find($id);

        return view('university.show', compact('university'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::find($id);

        return view('university.edit', compact('university'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  University $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {
        request()->validate(University::$rules);

        $university->update($request->all());

        return redirect()->route('admin.universities.index')
            ->with('success', 'University updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $university = University::find($id)->delete();

        return redirect()->route('admin.universities.index')
            ->with('success', 'University deleted successfully');
    }
}