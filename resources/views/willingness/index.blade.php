@extends('layouts.dashboard')

@section('template_title')
    Willingness
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Willingness') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.willingnesses.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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

                                        <th>Pin</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Day Code</th>
                                        <th>Time Of Entry</th>
                                        <th>Time Of Return</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($willingnesses as $willingness)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $willingness->pin }}</td>
                                            <td>{{ $willingness->start_date }}</td>
                                            <td>{{ $willingness->end_date }}</td>
                                            <td>{{ $willingness->day_code }}</td>
                                            <td>{{ $willingness->time_of_entry }}</td>
                                            <td>{{ $willingness->time_of_return }}</td>

                                            <td>
                                                <form action="{{ route('admin.willingnesses.destroy', $willingness->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.willingnesses.show', $willingness->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.willingnesses.edit', $willingness->id) }}"><i
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
                {!! $willingnesses->links() !!}
            </div>
        </div>
    </div>
@endsection
