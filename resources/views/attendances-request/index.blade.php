@extends('layouts.app')

@section('template_title')
    Attendances Request
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Attendances Request') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('attendances-requests.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                        <th>User Id</th>
                                        <th>Photo</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendancesRequests as $attendancesRequest)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $attendancesRequest->user_id }}</td>
                                            <td>{{ $attendancesRequest->photo }}</td>
                                            <td>{{ $attendancesRequest->keterangan }}</td>
                                            <td>{{ $attendancesRequest->status }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('attendances-requests.destroy', $attendancesRequest->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('attendances-requests.show', $attendancesRequest->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('attendances-requests.edit', $attendancesRequest->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $attendancesRequests->links() !!}
            </div>
        </div>
    </div>
@endsection
