<?php

namespace App\Http\Controllers;

use App\Models\Willingness;
use Illuminate\Http\Request;

/**
 * Class WillingnessController
 * @package App\Http\Controllers
 */
class WillingnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $willingnesses = Willingness::paginate();

        return view('willingness.index', compact('willingnesses'))
            ->with('i', (request()->input('page', 1) - 1) * $willingnesses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $willingness = new Willingness();
        return view('willingness.create', compact('willingness'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Willingness::$rules);

        $willingness = Willingness::create($request->all());

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $willingness = Willingness::find($id);

        return view('willingness.show', compact('willingness'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $willingness = Willingness::find($id);

        return view('willingness.edit', compact('willingness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Willingness $willingness
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Willingness $willingness)
    {
        request()->validate(Willingness::$rules);

        $willingness->update($request->all());

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $willingness = Willingness::find($id)->delete();

        return redirect()->route('admin.willingnesses.index')
            ->with('success', 'Willingness deleted successfully');
    }
}