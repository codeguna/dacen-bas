<?php

namespace App\Http\Controllers;

use App\Models\Homebase;
use Illuminate\Http\Request;

/**
 * Class HomebaseController
 * @package App\Http\Controllers
 */
class HomebaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homebases = Homebase::orderBy('name','ASC')->paginate();

        return view('homebase.index', compact('homebases'))
            ->with('i', (request()->input('page', 1) - 1) * $homebases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $homebase = new Homebase();
        return view('homebase.create', compact('homebase'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Homebase::$rules);

        $homebase = Homebase::create($request->all());

        return redirect()->route('admin.homebases.index')
            ->with('success', 'Homebase created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homebase = Homebase::find($id);

        return view('homebase.show', compact('homebase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $homebase = Homebase::find($id);

        return view('homebase.edit', compact('homebase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Homebase $homebase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Homebase $homebase)
    {
        request()->validate(Homebase::$rules);

        $homebase->update($request->all());

        return redirect()->route('admin.homebases.index')
            ->with('success', 'Homebase updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $homebase = Homebase::find($id)->delete();

        return redirect()->route('admin.homebases.index')
            ->with('success', 'Homebase deleted successfully');
    }
}