@extends('layouts.app')

@section('template_title')
    Lecturer Functional Position
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lecturer Functional Position') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.lecturer-functional-positions.create') }}"
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

                                        <th>Lecturer Id</th>
                                        <th>Functional Position Id</th>
                                        <th>Determination Date</th>
                                        <th>Tmt</th>
                                        <th>Credit Score</th>
                                        <th>Functional Position Attachment</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturerFunctionalPositions as $lecturerFunctionalPosition)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $lecturerFunctionalPosition->lecturer_id }}</td>
                                            <td>{{ $lecturerFunctionalPosition->functional_position_id }}</td>
                                            <td>{{ $lecturerFunctionalPosition->determination_date }}</td>
                                            <td>{{ $lecturerFunctionalPosition->tmt }}</td>
                                            <td>{{ $lecturerFunctionalPosition->credit_score }}</td>
                                            <td>{{ $lecturerFunctionalPosition->functional_position_attachment }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.lecturer-functional-positions.destroy', $lecturerFunctionalPosition->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.lecturer-functional-positions.show', $lecturerFunctionalPosition->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.lecturer-functional-positions.edit', $lecturerFunctionalPosition->id) }}"><i
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
                {!! $lecturerFunctionalPositions->links() !!}
            </div>
        </div>
    </div>
@endsection
