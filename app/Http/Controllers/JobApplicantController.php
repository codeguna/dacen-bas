<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use Illuminate\Http\Request;

/**
 * Class JobApplicantController
 * @package App\Http\Controllers
 */
class JobApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobApplicants = JobApplicant::paginate();

        return view('job-applicant.index', compact('jobApplicants'))
            ->with('i', (request()->input('page', 1) - 1) * $jobApplicants->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobApplicant = new JobApplicant();
        return view('job-applicant.create', compact('jobApplicant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JobApplicant::$rules);

        $jobApplicant = JobApplicant::create($request->all());

        return redirect()->route('job-applicants.index')
            ->with('success', 'JobApplicant created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobApplicant = JobApplicant::find($id);

        return view('job-applicant.show', compact('jobApplicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobApplicant = JobApplicant::find($id);

        return view('job-applicant.edit', compact('jobApplicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobApplicant $jobApplicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplicant $jobApplicant)
    {
        request()->validate(JobApplicant::$rules);

        $jobApplicant->update($request->all());

        return redirect()->route('job-applicants.index')
            ->with('success', 'JobApplicant updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jobApplicant = JobApplicant::find($id)->delete();

        return redirect()->route('job-applicants.index')
            ->with('success', 'JobApplicant deleted successfully');
    }
}
