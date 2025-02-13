<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeave;
use App\User;
use Illuminate\Http\Request;

/**
 * Class EmployeeLeaveController
 * @package App\Http\Controllers
 */
class EmployeeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeLeaves = EmployeeLeave::latest()->get();

        return view('employee-leave.index', compact('employeeLeaves'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $EmployeeLeave = new EmployeeLeave();
        return view('employee-leave.create', compact('EmployeeLeave'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EmployeeLeave::$rules);

        $EmployeeLeave = EmployeeLeave::create($request->all());

        return redirect()->route('employee-leaves.index')
            ->with('success', 'EmployeeLeave created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $EmployeeLeave = EmployeeLeave::find($id);

        return view('employee-leave.show', compact('EmployeeLeave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $EmployeeLeave = EmployeeLeave::find($id);

        return view('employee-leave.edit', compact('EmployeeLeave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeeLeave $EmployeeLeave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeLeave $EmployeeLeave)
    {
        request()->validate(EmployeeLeave::$rules);

        $EmployeeLeave->update($request->all());

        return redirect()->route('employee-leaves.index')
            ->with('success', 'EmployeeLeave updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $EmployeeLeave = EmployeeLeave::find($id)->delete();

        return redirect()->route('employee-leaves.index')
            ->with('success', 'EmployeeLeave deleted successfully');
    }

    public function generateEmployee(Request $request)
    {
        $year = $request->year;
        $checkData = EmployeeLeave::select('year')->where('year', '=', $year)->exists();

        if ($checkData) {
            return redirect()->back()->with('success', 'Data cuti karyawan sudah di generate untuk tahun ' . $year);
        }
        $users = User::select('pin','name')->orderBy('name','ASC')->whereNotNull('pin')->get();

        $dataToInsert = [];


        foreach ($users as $user) {
            $dataToInsert[] = [
                'pin' => $user->pin,
                'amount' => 6,
                'year' => $year,
                'created_at' => now(), // Tambahkan timestamp created_at
            ];
        }

        EmployeeLeave::insert($dataToInsert);

        return redirect()->back()->with('success', 'Data cuti karyawan berhasil digenerate untuk tahun ' . $year);
    }
}
