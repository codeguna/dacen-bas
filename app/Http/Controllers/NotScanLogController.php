<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use App\Models\EmployeeLeave;
use App\Models\NotScanLog;
use App\Models\Reason;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class NotScanLogController
 * @package App\Http\Controllers
 */
class NotScanLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        if ($start_date && $end_date) {
            $notScanLogs = NotScanLog::whereDate('date', '>=', $start_date)
                ->whereDate('date', '<=', $end_date)
                ->orderBy('date', 'ASC')
                ->get();
        } else {
            $notScanLogs = NotScanLog::orderBy('date', 'ASC')->get();
        }

        $reasons    = Reason::orderBy('name', 'ASC')->pluck('id', 'name');
        $users      = User::where('pin', '<>', null)->orderBy('name', 'ASC')->pluck('pin', 'name');

        return view('not-scan-log.index', compact('notScanLogs', 'reasons', 'users'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $notScanLog = new NotScanLog();
        return view('not-scan-log.create', compact('notScanLog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(NotScanLog::$rules);
        $pin            = $request->pin;
        $reason_id      = $request->reason_id;
        $note           = $request->note;
        $date           = $request->date;
        $year           = date('Y');

        $currentLeave   = EmployeeLeave::select('amount')
            ->where('pin', '=', $pin)
            ->where('year', '=', $year)
            ->sum('amount');
        if ($currentLeave < 1) {
            return redirect()->back()->with('warning', 'Jatah cuti karyawan ini sudah habis!');
        }
        if ($currentLeave > 0) {
            $notScanLog = NotScanLog::create([
                'pin'           => $pin,
                'reason_id'     => $reason_id,
                'note'          => $note,
                'date'          => $date,
                'created_at'    => now(),
            ]);
        }


        $checkLeave     = EmployeeLeave::where('pin', '=', $pin)
            ->where('year', '=', $year)
            ->exists();


        if ($checkLeave) {
            $employeeLeaves = EmployeeLeave::select('pin')
                ->where('pin', '=', $pin)
                ->where('year', '=', $year)
                ->first();

            EmployeeLeave::where('pin', '=', $pin)
                ->where('year', '=', $year)
                ->update([
                    'amount' => $currentLeave - 1
                ]);
        } else {
            return redirect()->back()->with('warning', 'Tidak ditemukan data Cuti Karyawan Ini!');
        }
        return redirect()->route('admin.not-scan-logs.index')
            ->with('success', 'Berhasil menambahkan data ketidakhadiran.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notScanLog = NotScanLog::find($id);

        return view('not-scan-log.show', compact('notScanLog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notScanLog = NotScanLog::find($id);
        $reasons    = Reason::orderBy('name', 'ASC')->pluck('id', 'name');
        return view('not-scan-log.edit', compact('notScanLog', 'reasons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  NotScanLog $notScanLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotScanLog $notScanLog)
    {
        request()->validate(NotScanLog::$rules);

        $notScanLog->update($request->all());

        return redirect()->route('admin.not-scan-logs.index')
            ->with('success', 'NotScanLog updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id, Request $request)
    {
        $cuti = $request->reason;
        $pin = $request->pin;
        $year = date('Y');

        $notScanLog = NotScanLog::where('pin', '=', $pin)->first();

        //mengembalikan jumlah cuti +1
        if ($cuti == 1 && $notScanLog) {
            $employeeLeave = EmployeeLeave::where('pin', '=', $pin)
                ->where('year', '=', $year)
                ->first();

            if ($employeeLeave) {
                $currentLeave = $employeeLeave->amount;

                // Ensure that we update the 'amount' field properly
                $employeeLeave->update([
                    'amount' => $currentLeave + 1
                ]);
            }
        }

        // Delete the NotScanLog record
        if ($notScanLog) {
            $notScanLog->delete();
        }

        return redirect()->route('admin.not-scan-logs.index')
            ->with('success', 'NotScanLog deleted successfully');
    }


    public function getNotScan(Request $request)
    {
        $year       = date('Y');
        $pin        = $request->pin;
        $date       = $request->date;
        $name       = User::select('name')->where('pin', $pin)->first();
        $reasons    = Reason::orderBy('name', 'ASC')->pluck('id', 'name');
        $currentLeave   = EmployeeLeave::select('amount')
            ->where('pin', '=', $pin)
            ->where('year', '=', $year)
            ->sum('amount');

        return view('not-scan-log.create', compact('pin', 'date', 'reasons', 'name', 'currentLeave'));
    }

    public function selectRecapNotPresent()
    {
        $users          = User::where('pin', '<>', null)->orderBy('name', 'ASC')->pluck('pin', 'name');
        $departments    = Departmen::orderBy('name', 'ASC')->pluck('id', 'name');

        return view('recap.not-precense-period', compact('users', 'departments'));
    }

    public function resultRecapAllNotPresences(Request $request)
    {

        // $total_hour     = $request->total_hour;
        // $total_day      = $request->total_day;
        $start_date     = $request->start_date;
        $end_date       = $request->end_date;
        $type           = 'Semua Departemen';

        $users = User::whereHas('notScanLogs', function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [Carbon::parse($start_date)->format('Y-m-d'), Carbon::parse($end_date)->format('Y-m-d')]);
        })->orderBy('name', 'ASC')->get();

        return view(
            'recap.report.not-present-all',
            compact(
                'users',
                // 'total_hour',
                // 'total_day',
                'start_date',
                'end_date',
                'type'
            )
        )->with('i');
    }
    public function resultNotPresencesIndividual(Request $request)
    {

        // $total_hour     = $request->total_hour;
        // $total_day      = $request->total_day;
        $start_date     = $request->start_date;
        $end_date       = $request->end_date;
        $pin            = $request->pin;
        $type           = User::select('name')->where('pin', $pin)->first();
        $type           = $type->name;

        $users = User::where('pin', $pin)->whereHas('notScanLogs', function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [Carbon::parse($start_date)->format('Y-m-d'), Carbon::parse($end_date)->format('Y-m-d')]);
        })->orderBy('name', 'ASC')->get();


        return view(
            'recap.report.not-present-all',
            compact(
                'users',
                // 'total_hour',
                // 'total_day',
                'start_date',
                'end_date',
                'type'
            )
        )->with('i');
    }
    public function resultNotPresencesDepartment(Request $request)
    {

        // $total_hour     = $request->total_hour;
        // $total_day      = $request->total_day;
        $start_date     = $request->start_date;
        $end_date       = $request->end_date;
        $department  = $request->department_id;
        $department     = $request->department_id;
        $type           = Departmen::select('name')->where('id', $department)->first();
        $type           = $type->name;

        $users = User::where('department_id', $department)->whereHas('notScanLogs', function ($query) use ($start_date, $end_date) {
            $query->whereBetween('date', [Carbon::parse($start_date)->format('Y-m-d'), Carbon::parse($end_date)->format('Y-m-d')]);
        })->orderBy('name', 'ASC')->get();

        return view(
            'recap.report.not-present-all',
            compact(
                'users',
                // 'total_hour',
                // 'total_day',
                'start_date',
                'end_date',
                'type'
            )
        )->with('i');
    }
}
