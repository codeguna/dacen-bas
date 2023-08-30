<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use Illuminate\Http\Request;

/**
 * Class DepartmenController
 * @package App\Http\Controllers
 */
class DepartmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departmens = Departmen::orderBy('name','ASC')->paginate();

        return view('departmen.index', compact('departmens'))
            ->with('i', (request()->input('page', 1) - 1) * $departmens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departmen = new Departmen();
        return view('departmen.create', compact('departmen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Departmen::$rules);

        $departmen = Departmen::create($request->all());

        return redirect()->route('admin.departmens.index')
            ->with('success', 'Departmen created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departmen = Departmen::find($id);

        return view('departmen.show', compact('departmen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departmen = Departmen::find($id);

        return view('departmen.edit', compact('departmen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departmen $departmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departmen $departmen)
    {
        request()->validate(Departmen::$rules);

        $departmen->update($request->all());

        return redirect()->route('admin.departmens.index')
            ->with('success', 'Departmen updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $departmen = Departmen::find($id)->delete();

        return redirect()->route('admin.departmens.index')
            ->with('success', 'Departmen deleted successfully');
    }
}