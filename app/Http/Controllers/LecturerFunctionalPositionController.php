<?php

namespace App\Http\Controllers;

use App\Models\LecturerFunctionalPosition;
use Illuminate\Http\Request;

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

        $lecturerFunctionalPosition = LecturerFunctionalPosition::create($request->all());

        return redirect()->route('lecturer-functional-positions.index')
            ->with('success', 'LecturerFunctionalPosition created successfully.');
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

        return redirect()->route('lecturer-functional-positions.index')
            ->with('success', 'LecturerFunctionalPosition updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lecturerFunctionalPosition = LecturerFunctionalPosition::find($id)->delete();

        return redirect()->route('lecturer-functional-positions.index')
            ->with('success', 'LecturerFunctionalPosition deleted successfully');
    }
}
