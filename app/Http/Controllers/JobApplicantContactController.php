<?php

namespace App\Http\Controllers;

use App\Models\JobApplicantContact;
use Illuminate\Http\Request;

/**
 * Class JobApplicantContactController
 * @package App\Http\Controllers
 */
class JobApplicantContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobApplicantContacts = JobApplicantContact::paginate();

        return view('job-applicant-contact.index', compact('jobApplicantContacts'))
            ->with('i', (request()->input('page', 1) - 1) * $jobApplicantContacts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobApplicantContact = new JobApplicantContact();
        return view('job-applicant-contact.create', compact('jobApplicantContact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(JobApplicantContact::$rules);

        $jobApplicantContact = JobApplicantContact::create($request->all());

        return redirect()->route('job-applicant-contacts.index')
            ->with('success', 'JobApplicantContact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobApplicantContact = JobApplicantContact::find($id);

        return view('job-applicant-contact.show', compact('jobApplicantContact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobApplicantContact = JobApplicantContact::find($id);

        return view('job-applicant-contact.edit', compact('jobApplicantContact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobApplicantContact $jobApplicantContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobApplicantContact $jobApplicantContact)
    {
        request()->validate(JobApplicantContact::$rules);

        $jobApplicantContact->update($request->all());

        return redirect()->route('job-applicant-contacts.index')
            ->with('success', 'JobApplicantContact updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jobApplicantContact = JobApplicantContact::find($id)->delete();

        return redirect()->route('job-applicant-contacts.index')
            ->with('success', 'JobApplicantContact deleted successfully');
    }
}
