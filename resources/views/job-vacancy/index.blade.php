@extends('layouts.app')

@section('template_title')
    Job Vacancy
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Job Vacancy') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('job-vacancies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Title</th>
										<th>Department Id</th>
										<th>Gender</th>
										<th>Min Age</th>
										<th>Max Age</th>
										<th>Amount Needed</th>
										<th>Date Start</th>
										<th>Deadline</th>
										<th>Level</th>
										<th>University</th>
										<th>Major</th>
										<th>University Base</th>
										<th>Graduation Year</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jobVacancies as $jobVacancy)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $jobVacancy->title }}</td>
											<td>{{ $jobVacancy->department_id }}</td>
											<td>{{ $jobVacancy->gender }}</td>
											<td>{{ $jobVacancy->min_age }}</td>
											<td>{{ $jobVacancy->max_age }}</td>
											<td>{{ $jobVacancy->amount_needed }}</td>
											<td>{{ $jobVacancy->date_start }}</td>
											<td>{{ $jobVacancy->deadline }}</td>
											<td>{{ $jobVacancy->level }}</td>
											<td>{{ $jobVacancy->university }}</td>
											<td>{{ $jobVacancy->major }}</td>
											<td>{{ $jobVacancy->university_base }}</td>
											<td>{{ $jobVacancy->graduation_year }}</td>
											<td>{{ $jobVacancy->user_id }}</td>

                                            <td>
                                                <form action="{{ route('job-vacancies.destroy',$jobVacancy->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('job-vacancies.show',$jobVacancy->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('job-vacancies.edit',$jobVacancy->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $jobVacancies->links() !!}
            </div>
        </div>
    </div>
@endsection
