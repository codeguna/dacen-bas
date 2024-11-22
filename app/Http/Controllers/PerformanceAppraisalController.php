<?php

namespace App\Http\Controllers;

use App\Models\PerformanceAppraisal;
use App\User;
use Illuminate\Http\Request;

/**
 * Class PerformanceAppraisalController
 * @package App\Http\Controllers
 */
class PerformanceAppraisalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $performanceAppraisals = PerformanceAppraisal::paginate();

        return view('performance-appraisal.index', compact('performanceAppraisals'))
            ->with('i', (request()->input('page', 1) - 1) * $performanceAppraisals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $performanceAppraisal = new PerformanceAppraisal();
        $users = User::whereNotIn('department_id',['23','21'])->orderBy('name','ASC')->pluck('pin','name');
        return $users;
        return view('performance-appraisal.create', compact('performanceAppraisal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PerformanceAppraisal::$rules);

        $performanceAppraisal = PerformanceAppraisal::create($request->all());

        return redirect()->route('admin.performance-appraisals.index')
            ->with('success', 'PerformanceAppraisal created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $performanceAppraisal = PerformanceAppraisal::find($id);

        return view('performance-appraisal.show', compact('performanceAppraisal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $performanceAppraisal = PerformanceAppraisal::find($id);

        return view('performance-appraisal.edit', compact('performanceAppraisal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PerformanceAppraisal $performanceAppraisal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PerformanceAppraisal $performanceAppraisal)
    {
        request()->validate(PerformanceAppraisal::$rules);

        $performanceAppraisal->update($request->all());

        return redirect()->route('admin.performance-appraisals.index')
            ->with('success', 'PerformanceAppraisal updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $performanceAppraisal = PerformanceAppraisal::find($id)->delete();

        return redirect()->route('admin.performance-appraisals.index')
            ->with('success', 'PerformanceAppraisal deleted successfully');
    }
}
