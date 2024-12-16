@extends('layouts.app')

@section('template_title')
    Employee Development
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Employee Development') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('employee-developments.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Event Name</th>
										<th>Speaker</th>
										<th>Event Organizer</th>
										<th>Place</th>
										<th>Price</th>
										<th>Event Type</th>
										<th>Start Date</th>
										<th>End Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeeDevelopments as $employeeDevelopment)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $employeeDevelopment->event_name }}</td>
											<td>{{ $employeeDevelopment->speaker }}</td>
											<td>{{ $employeeDevelopment->event_organizer }}</td>
											<td>{{ $employeeDevelopment->place }}</td>
											<td>{{ $employeeDevelopment->price }}</td>
											<td>{{ $employeeDevelopment->event_type }}</td>
											<td>{{ $employeeDevelopment->start_date }}</td>
											<td>{{ $employeeDevelopment->end_date }}</td>

                                            <td>
                                                <form action="{{ route('employee-developments.destroy',$employeeDevelopment->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employee-developments.show',$employeeDevelopment->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('employee-developments.edit',$employeeDevelopment->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $employeeDevelopments->links() !!}
            </div>
        </div>
    </div>
@endsection
