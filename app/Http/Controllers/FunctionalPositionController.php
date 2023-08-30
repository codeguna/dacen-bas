<?php

namespace App\Http\Controllers;

use App\Models\FunctionalPosition;
use Illuminate\Http\Request;

/**
 * Class FunctionalPositionController
 * @package App\Http\Controllers
 */
class FunctionalPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $functionalPositions = FunctionalPosition::orderBy('name','ASC')->paginate();

        return view('functional-position.index', compact('functionalPositions'))
            ->with('i', (request()->input('page', 1) - 1) * $functionalPositions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $functionalPosition = new FunctionalPosition();
        return view('functional-position.create', compact('functionalPosition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FunctionalPosition::$rules);

        $functionalPosition = FunctionalPosition::create($request->all());

        return redirect()->route('admin.functional-positions.index')
            ->with('success', 'FunctionalPosition created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $functionalPosition = FunctionalPosition::find($id);

        return view('functional-position.show', compact('functionalPosition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $functionalPosition = FunctionalPosition::find($id);

        return view('functional-position.edit', compact('functionalPosition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FunctionalPosition $functionalPosition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FunctionalPosition $functionalPosition)
    {
        request()->validate(FunctionalPosition::$rules);

        $functionalPosition->update($request->all());

        return redirect()->route('admin.functional-positions.index')
            ->with('success', 'FunctionalPosition updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $functionalPosition = FunctionalPosition::find($id)->delete();

        return redirect()->route('admin.functional-positions.index')
            ->with('success', 'FunctionalPosition deleted successfully');
    }
}