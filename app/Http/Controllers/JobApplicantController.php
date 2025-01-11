<?php

namespace App\Http\Controllers;

use App\Models\JobApplicant;
use App\Models\JobApplicantAddress;
use App\Models\JobApplicantAttachment;
use App\Models\JobApplicantContact;
use App\Models\JobVacancy;
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
        $jobApplicants = JobApplicant::orderBy('created_at','DESC')->get();

        return view('job-applicant.index', compact('jobApplicants'))
            ->with('i');
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

        return redirect()->route('admin.job-applicants.index')
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

        return redirect()->route('admin.job-applicants.index')
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

        return redirect()->route('admin.job-applicants.index')
            ->with('success', 'JobApplicant deleted successfully');
    }

    public function addApplicant($id)
    {
        $jobapplicant_id    = JobVacancy::find($id);
        $job_name           = $jobapplicant_id->title;
        $job_applicants_id  = $id;

        return view('job-applicant.create', compact('jobapplicant_id', 'job_name', 'job_applicants_id'));
    }

    public function saveApplicant(Request $request)
    {
        $job_vacancies_id        = $request->job_applicants_id;
        $full_name              = $request->full_name;
        $front_title            = $request->front_title;
        $back_title             = $request->back_title;
        $gender                 = $request->gender;
        $born_place             = $request->born_place;
        $born_date              = $request->born_date;
        $date_of_application    = $request->date_of_application;
        $university             = $request->university;
        $level                  = $request->level;
        $major                  = $request->major;
        $university_base        = $request->university_base;
        $graduation_year        = $request->graduation_year;

        $jobApplicants          = JobApplicant::create([
            'job_vacancies_id'      => $job_vacancies_id,
            'full_name'             => $full_name,
            'front_title'           => $front_title,
            'back_title'            => $back_title,
            'gender'                => $gender,
            'born_place'            => $born_place,
            'born_date'             => $born_date,
            'date_of_application'   => $date_of_application,
            'university'            => $university,
            'level'                 => $level,
            'major'                 => $major,
            'university_base'       => $university_base,
            'graduation_year'       => $graduation_year,

        ]);

        $address        = $request->address;
        $province       = $request->province;
        $city           = $request->city;
        $village        = $request->village;
        $district       = $request->district;
        $postal_code    = $request->postal_code;

        $jobApplicantAddress    = JobApplicantAddress::create([
            'job_applicant_id'  => $jobApplicants->id,
            'address'           => $address,
            'province'          => $province,
            'city'              => $city,
            'village'           => $village,
            'district'          => $district,
            'postal_code'       => $postal_code,
        ]);

        $type   = $request->type;
        $number = $request->number;
        $email = $request->email;

        $jobApplicantContacts   = JobApplicantContact::create([
            'job_applicant_id'  => $jobApplicants->id,
            'type'      => $type,
            'number'    => $number,
            'email'     => $email,
        ]);

        $file_applicant       = $request->file('files');
        $name_file = time() . "_" . $file_applicant->getClientOriginalName();
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_lampiran_pelamar';
        $file_applicant->move($tujuan_upload, $name_file);

        $jobApplicantFiles   = JobApplicantAttachment::create([
            'job_applicant_id'  => $jobApplicants->id,
            'files'             => $name_file,
        ]);

        return redirect()->route('admin.job-vacancies.index')->with('success', 'Berhasil menambahkan data pelamar!');
    }
}
