<?php

namespace App\Http\Controllers;

use App\Models\Departmen;
use App\Models\JobApplicant;
use App\Models\JobVacancy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $year = now()->year;
    
        // Ambil semua job vacancies untuk tahun ini
        $jobVacancies = JobVacancy::whereYear('created_at', $year)
            ->orderBy('created_at', 'DESC')
            ->with('jobApplicant') // Load relasi jobApplicant untuk efisiensi
            ->get();
    
        if ($jobVacancies->isEmpty()) {
            // Jika tidak ada lowongan pekerjaan
            $vacancyRequest = 0;
            $applicantCount = 0;
            $accepted = 0;
            $notAccepted = 0;
            $proses = 0;
        } else {
            // Hitung data secara agregat
            $vacancyRequest = $jobVacancies->count();
    
            $accepted = JobApplicant::whereYear('created_at', $year)
                ->where('is_approved', 1)
                ->count();
    
            $notAccepted = JobApplicant::whereYear('created_at', $year)
                ->where('is_approved', 2)
                ->count();
    
            $proses = JobApplicant::whereYear('created_at', $year)
                ->where('is_approved', 0)
                ->count();
    
            // Hitung total pelamar dari semua lowongan
            $applicantCount = $jobVacancies->sum(function ($vacancy) {
                return $vacancy->jobApplicant ? $vacancy->jobApplicant->count() : 0;
            });
        }
    
        // Return data atau render view
        return view('job-vacancy.index', compact(
            'jobVacancies',
            'vacancyRequest',
            'applicantCount',
            'accepted',
            'notAccepted',
            'proses'
        ))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments    = Departmen::orderBy('name', 'ASC')->pluck('id', 'name');
        $jobVacancy     = new JobVacancy();
        return view('job-vacancy.create', compact('jobVacancy', 'departments'));
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

        $jobVacancy = JobVacancy::create(
            [
                'title'            => $request->title,
                'department_id'     => $request->department_id,
                'gender'            => $request->gender,
                'min_age'           => $request->min_age,
                'max_age'           => $request->max_age,
                'amount_needed'     => $request->amount_needed,
                'date_start'        => $request->date_start,
                'deadline'          => $request->deadline,
                'user_id'           => Auth::user()->id,
                'created_at'        => now(),
            ]
        );

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
        $getApplicant = JobApplicant::where('job_vacancies_id', $jobVacancy->id)->orderBy('date_of_application', 'ASC')->get();

        return view('job-vacancy.show', compact('jobVacancy', 'getApplicant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments    = Departmen::orderBy('name', 'ASC')->pluck('id', 'name');
        $jobVacancy     = JobVacancy::find($id);

        return view('job-vacancy.edit', compact('jobVacancy', 'departments'));
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

    public function updateStatus(Request $request)
    {
        $jobID  = $request->jobID;
        $status = $request->status;
        $jobApplicant = JobApplicant::find($jobID);

        $jobApplicant->update([
            'is_approved' => $status
        ]);
        return redirect()->back()->with('success');
    }
}
