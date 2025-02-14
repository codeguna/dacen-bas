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
        $employeeLeaves = EmployeeLeave::where('year','=', date('Y'))->latest()->get();
        $users = User::select('pin','name')->orderBy('name','ASC')->whereNotNull('pin')->pluck('pin','name');

        return view('employee-leave.index', compact('employeeLeaves','users'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeLeave = new EmployeeLeave();
        return view('employee-leave.create', compact('employeeLeave'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pin = $request->pin;
        $year = date('Y');

        $checkDuplicate = EmployeeLeave::where('pin','=',$pin)->where('year','=',$year)->exists();
        if($checkDuplicate)
        {
            return redirect()->back()->with('warning','Data Karyawan Sudah ada di tahun ini!');
        }
        request()->validate(EmployeeLeave::$rules);

        $EmployeeLeave = EmployeeLeave::create($request->all());

        return redirect()->route('admin.employee-leaves.index')
            ->with('success', 'Berhasil menambahkan data karyawan!');
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
    public function edit($pin)
    {
        $employeeLeave = EmployeeLeave::where('pin','=',$pin)->first();

        return view('employee-leave.edit', compact('employeeLeave'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EmployeeLeave $EmployeeLeave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pin)
    {
        request()->validate(EmployeeLeave::$rules);
        $amount         = $request->amount;
        $EmployeeLeave  = EmployeeLeave::where('pin','=',$pin)->first();

        $EmployeeLeave->update([
            'amount'    => $amount
        ]);

        return redirect()->route('admin.employee-leaves.index')
            ->with('success', 'Berhasil perbarui data Cuti!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($pin, Request $request)
    {
        $year          = $request->year;
        $EmployeeLeave = EmployeeLeave::where('pin','=',$pin)->where('year','=',$year)->first();
        $EmployeeLeave->delete();

        return redirect()->back()
            ->with('success', 'Berhasil hapus data karyawan!');
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
