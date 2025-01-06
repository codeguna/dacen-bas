<?php

namespace App\Http\Controllers;

use App\Models\JobVacancy;
use Illuminate\Http\Request;

/**
 * Class JobVacancyController
 * @package App\Http\Controllers
 */
class JobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobVacancies = JobVacancy::paginate();

        return view('job-vacancy.index', compact('jobVacancies'))
            ->with('i', (request()->input('page', 1) - 1) * $jobVacancies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobVacancy = new JobVacancy();
        return view('job-vacancy.create', compact('jobVacancy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JobVacancy::$rules);

        $jobVacancy = JobVacancy::create($request->all());

        return redirect()->route('admin.job-vacancies.index')
            ->with('success', 'JobVacancy created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobVacancy = JobVacancy::find($id);

        return view('job-vacancy.show', compact('jobVacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobVacancy = JobVacancy::find($id);

        return view('job-vacancy.edit', compact('jobVacancy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobVacancy $jobVacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVacancy $jobVacancy)
    {
        request()->validate(JobVacancy::$rules);

        $jobVacancy->update($request->all());

        return redirect()->route('admin.job-vacancies.index')
            ->with('success', 'JobVacancy updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jobVacancy = JobVacancy::find($id)->delete();

        return redirect()->route('admin.job-vacancies.index')
            ->with('success', 'JobVacancy deleted successfully');
    }
}
