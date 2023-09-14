<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

/**
 * Class StudyProgramController
 * @package App\Http\Controllers
 */
class StudyProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studyPrograms = StudyProgram::orderBy('name','ASC')->paginate();

        return view('study-program.index', compact('studyPrograms'))
            ->with('i', (request()->input('page', 1) - 1) * $studyPrograms->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studyProgram = new StudyProgram();
        return view('study-program.create', compact('studyProgram'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(StudyProgram::$rules);

        $studyProgram = StudyProgram::create($request->all());

        return redirect()->route('admin.study-programs.index')
            ->with('success', 'StudyProgram created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studyProgram = StudyProgram::find($id);

        return view('study-program.show', compact('studyProgram'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $studyProgram = StudyProgram::find($id);

        return view('study-program.edit', compact('studyProgram'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  StudyProgram $studyProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudyProgram $studyProgram)
    {
        request()->validate(StudyProgram::$rules);

        $studyProgram->update($request->all());

        return redirect()->route('admin.study-programs.index')
            ->with('success', 'StudyProgram updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $studyProgram = StudyProgram::find($id)->delete();

        return redirect()->route('admin.study-programs.index')
            ->with('success', 'StudyProgram deleted successfully');
    }
}