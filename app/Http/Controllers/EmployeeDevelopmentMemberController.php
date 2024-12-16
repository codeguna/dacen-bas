<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDevelopmentMember;
use Illuminate\Http\Request;

/**
 * Class EmployeeDevelopmentMemberController
 * @package App\Http\Controllers
 */
class EmployeeDevelopmentMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeDevelopmentMembers = EmployeeDevelopmentMember::paginate();

        return view('employee-development-member.index', compact('employeeDevelopmentMembers'))
            ->with('i', (request()->input('page', 1) - 1) * $employeeDevelopmentMembers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeDevelopmentMember = new EmployeeDevelopmentMember();
        return view('employee-development-member.create', compact('employeeDevelopmentMember'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmployeeDevelopmentMember::$rules);

        $employeeDevelopmentMember = EmployeeDevelopmentMember::create($request->all());

        return redirect()->route('employee-development-members.index')
            ->with('success', 'EmployeeDevelopmentMember created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employeeDevelopmentMember = EmployeeDevelopmentMember::find($id);

        return view('employee-development-member.show', compact('employeeDevelopmentMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeDevelopmentMember = EmployeeDevelopmentMember::find($id);

        return view('employee-development-member.edit', compact('employeeDevelopmentMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeeDevelopmentMember $employeeDevelopmentMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeDevelopmentMember $employeeDevelopmentMember)
    {
        request()->validate(EmployeeDevelopmentMember::$rules);

        $employeeDevelopmentMember->update($request->all());

        return redirect()->route('employee-development-members.index')
            ->with('success', 'EmployeeDevelopmentMember updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employeeDevelopmentMember = EmployeeDevelopmentMember::find($id)->delete();

        return redirect()->route('employee-development-members.index')
            ->with('success', 'EmployeeDevelopmentMember deleted successfully');
    }
}
