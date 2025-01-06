@extends('layouts.app')

@section('template_title')
    Job Applicant Contact
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job Applicant Contact') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('job-applicant-contacts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Job Applicant Id</th>
										<th>Type</th>
										<th>Number</th>
										<th>Email</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobApplicantContacts as $jobApplicantContact)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jobApplicantContact->job_applicant_id }}</td>
											<td>{{ $jobApplicantContact->type }}</td>
											<td>{{ $jobApplicantContact->number }}</td>
											<td>{{ $jobApplicantContact->email }}</td>

                                            <td>
                                                <form action="{{ route('job-applicant-contacts.destroy',$jobApplicantContact->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('job-applicant-contacts.show',$jobApplicantContact->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('job-applicant-contacts.edit',$jobApplicantContact->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $jobApplicantContacts->links() !!}
            </div>
        </div>
    </div>
@endsection
