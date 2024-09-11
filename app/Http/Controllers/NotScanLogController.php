<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
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
    public function index()
    {
        $notScanLogs = NotScanLog::orderBy('date', 'ASC')->paginate();
        $reasons    = Reason::orderBy('name', 'ASC')->pluck('id', 'name');
        $users      = User::where('pin', '<>', null)->orderBy('name', 'ASC')->pluck('pin', 'name');

        return view('not-scan-log.index', compact('notScanLogs', 'reasons', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * $notScanLogs->perPage());
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

        $notScanLog = NotScanLog::create($request->all());

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
    public function destroy($id)
    {
        $notScanLog = NotScanLog::find($id)->delete();

        return redirect()->route('admin.not-scan-logs.index')
            ->with('success', 'NotScanLog deleted successfully');
    }

    public function getNotScan(Request $request)
    {
        $pin        = $request->pin;
        $date       = $request->date;
        $name       = User::select('name')->where('pin', $pin)->first();
        $reasons    = Reason::orderBy('name', 'ASC')->pluck('id', 'name');

        return view('not-scan-log.create', compact('pin', 'date', 'reasons', 'name'));
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

        $users = User::where('pin',$pin)->whereHas('notScanLogs', function ($query) use ($start_date, $end_date) {
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
            )
        )->with('i');
    }
    public function resultNotPresencesDepartment(Request $request)
    {

        // $total_hour     = $request->total_hour;
        // $total_day      = $request->total_day;
        $start_date     = $request->start_date;
        $end_date       = $request->end_date;
        $department_id  = $request->department_id;

        $users = User::where('pin',$department_id)->whereHas('notScanLogs', function ($query) use ($start_date, $end_date) {
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
            )
        )->with('i');
    }
}
