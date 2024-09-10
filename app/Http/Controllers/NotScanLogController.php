<?php

namespace App\Http\Controllers;

use App\Models\NotScanLog;
use App\Models\Reason;
use App\User;
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
        $notScanLogs = NotScanLog::paginate();

        return view('not-scan-log.index', compact('notScanLogs'))
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
            ->with('success', 'NotScanLog created successfully.');
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

        return view('not-scan-log.edit', compact('notScanLog'));
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
        $name       = User::select('name')->where('pin',$pin)->first();
        $reasons    = Reason::orderBy('name','ASC')->pluck('id','name');

        return view('not-scan-log.create', compact('pin', 'date','reasons','name'));
    }
}
