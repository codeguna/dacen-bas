<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDevelopment;
use Illuminate\Http\Request;

/**
 * Class EmployeeDevelopmentController
 * @package App\Http\Controllers
 */
class EmployeeDevelopmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeDevelopments = EmployeeDevelopment::paginate();

        return view('employee-development.index', compact('employeeDevelopments'))
            ->with('i', (request()->input('page', 1) - 1) * $employeeDevelopments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeDevelopment = new EmployeeDevelopment();
        return view('employee-development.create', compact('employeeDevelopment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmployeeDevelopment::$rules);

        $employeeDevelopment = EmployeeDevelopment::create($request->all());

        return redirect()->route('admin.employee-developments.index')
            ->with('success', 'EmployeeDevelopment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeDevelopment = EmployeeDevelopment::find($id);

        return view('employee-development.show', compact('employeeDevelopment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDevelopment = EmployeeDevelopment::find($id);

        return view('employee-development.edit', compact('employeeDevelopment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeeDevelopment $employeeDevelopment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeDevelopment $employeeDevelopment)
    {
        request()->validate(EmployeeDevelopment::$rules);

        $employeeDevelopment->update($request->all());

        return redirect()->route('admin.employee-developments.index')
            ->with('success', 'EmployeeDevelopment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeDevelopment = EmployeeDevelopment::find($id)->delete();

        return redirect()->route('admin.employee-developments.index')
            ->with('success', 'EmployeeDevelopment deleted successfully');
    }
}
