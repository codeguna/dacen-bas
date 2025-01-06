@extends('layouts.app')

@section('template_title')
    Job Applicant
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job Applicant') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('job-applicants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Job Vacancies Id</th>
										<th>Full Name</th>
										<th>Front Title</th>
										<th>Back Title</th>
										<th>Gender</th>
										<th>Born Place</th>
										<th>Born Date</th>
										<th>Date Of  Application</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobApplicants as $jobApplicant)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jobApplicant->job_vacancies_id }}</td>
											<td>{{ $jobApplicant->full_name }}</td>
											<td>{{ $jobApplicant->front_title }}</td>
											<td>{{ $jobApplicant->back_title }}</td>
											<td>{{ $jobApplicant->gender }}</td>
											<td>{{ $jobApplicant->born_place }}</td>
											<td>{{ $jobApplicant->born_date }}</td>
											<td>{{ $jobApplicant->date_of _application }}</td>

                                            <td>
                                                <form action="{{ route('job-applicants.destroy',$jobApplicant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('job-applicants.show',$jobApplicant->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('job-applicants.edit',$jobApplicant->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $jobApplicants->links() !!}
            </div>
        </div>
    </div>
@endsection
