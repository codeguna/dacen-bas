<?php

namespace App\Http\Controllers;

use App\Models\ScanLogsExtra;
use Illuminate\Http\Request;

/**
 * Class ScanLogsExtraController
 * @package App\Http\Controllers
 */
class ScanLogsExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scanLogsExtras = ScanLogsExtra::orderBy('scan','ASC')->get();

        return view('scan-logs-extra.index', compact('scanLogsExtras'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scanLogsExtra = new ScanLogsExtra();
        return view('scan-logs-extra.create', compact('scanLogsExtra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ScanLogsExtra::$rules);

        $scanLogsExtra = ScanLogsExtra::create($request->all());

        return redirect()->route('admin.scan-logs-extras.index')
            ->with('success', 'ScanLogsExtra created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scanLogsExtra = ScanLogsExtra::find($id);

        return view('scan-logs-extra.show', compact('scanLogsExtra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scanLogsExtra = ScanLogsExtra::find($id);

        return view('scan-logs-extra.edit', compact('scanLogsExtra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ScanLogsExtra $scanLogsExtra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScanLogsExtra $scanLogsExtra)
    {
        request()->validate(ScanLogsExtra::$rules);

        $scanLogsExtra->update($request->all());

        return redirect()->route('admin.scan-logs-extras.index')
            ->with('success', 'ScanLogsExtra updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $scanLogsExtra = ScanLogsExtra::find($id)->delete();

        return redirect()->route('admin.scan-logs-extras.index')
            ->with('success', 'ScanLogsExtra deleted successfully');
    }

    public function filter(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $scanLogsExtras = ScanLogsExtra::whereDate('created_at', '>=', $start_date)
        ->whereDate('created_at', '<=', $end_date)
        ->orderBy('scan','ASC')
        ->get();

        return view('scan-logs-extra.index', compact('scanLogsExtras'))
            ->with('i');
    }
}