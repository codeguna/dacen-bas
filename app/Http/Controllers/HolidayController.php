<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class HolidayController
 * @package App\Http\Controllers
 */
class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::orderBy('date', 'ASC')->whereYear('date','=',now()->year)->get();

        return view('holiday.index', compact('holidays'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $holiday = new Holiday();
        return view('holiday.create', compact('holiday'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Holiday::$rules);

        $holiday = Holiday::create($request->all());

        return redirect()->route('admin.holidays.index')
            ->with('success', 'Holiday created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = Holiday::find($id);

        return view('holiday.show', compact('holiday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::find($id);

        return view('holiday.edit', compact('holiday'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Holiday $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holiday $holiday)
    {
        request()->validate(Holiday::$rules);

        $holiday->update($request->all());

        return redirect()->route('admin.holidays.index')
            ->with('success', 'Holiday updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $holiday = Holiday::find($id)->delete();

        return redirect()->route('admin.holidays.index')
            ->with('success', 'Holiday deleted successfully');
    }
    public function destroyLastYear()
    {
        // Get the current year
        $currentYear = \Carbon\Carbon::now()->year;

        // Calculate the last year
        $lastYear = $currentYear - 1;

        // Find and delete all holidays from the last year
        $holidaysToDelete = Holiday::whereYear('date', $lastYear)->get();

        foreach ($holidaysToDelete as $holiday) {
            $holiday->delete();
        }

        // Redirect with success message
        return redirect()->route('admin.holidays.index')
            ->with('success', 'Holidays from the last year deleted successfully');
    }
    public function destroyCurrentYear()
    {
        // Get the current year
        $currentYear = \Carbon\Carbon::now()->year;

        // Calculate the last year
        $lastYear = $currentYear - 0;

        // Find and delete all holidays from the last year
        $holidaysToDelete = Holiday::whereYear('date', $lastYear)->get();

        foreach ($holidaysToDelete as $holiday) {
            $holiday->delete();
        }

        // Redirect with success message
        return redirect()->route('admin.holidays.index')
            ->with('success', 'Holidays from the last year deleted successfully');
    }
}
