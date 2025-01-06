<?php

namespace App\Http\Controllers;

use App\Models\JobApplicantAddress;
use Illuminate\Http\Request;

/**
 * Class JobApplicantAddressController
 * @package App\Http\Controllers
 */
class JobApplicantAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobApplicantAddresses = JobApplicantAddress::paginate();

        return view('job-applicant-address.index', compact('jobApplicantAddresses'))
            ->with('i', (request()->input('page', 1) - 1) * $jobApplicantAddresses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobApplicantAddress = new JobApplicantAddress();
        return view('job-applicant-address.create', compact('jobApplicantAddress'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JobApplicantAddress::$rules);

        $jobApplicantAddress = JobApplicantAddress::create($request->all());

        return redirect()->route('job-applicant-addresses.index')
            ->with('success', 'JobApplicantAddress created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobApplicantAddress = JobApplicantAddress::find($id);

        return view('job-applicant-address.show', compact('jobApplicantAddress'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobApplicantAddress = JobApplicantAddress::find($id);

        return view('job-applicant-address.edit', compact('jobApplicantAddress'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobApplicantAddress $jobApplicantAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplicantAddress $jobApplicantAddress)
    {
        request()->validate(JobApplicantAddress::$rules);

        $jobApplicantAddress->update($request->all());

        return redirect()->route('job-applicant-addresses.index')
            ->with('success', 'JobApplicantAddress updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jobApplicantAddress = JobApplicantAddress::find($id)->delete();

        return redirect()->route('job-applicant-addresses.index')
            ->with('success', 'JobApplicantAddress deleted successfully');
    }
}
