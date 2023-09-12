@extends('layouts.dashboard')

@section('template_title')
    Lecturer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fa fa-check-circle"></i> Dosen
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.lecturers.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="fa fa-plus-circle"></i>
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
                                        <th>NIDN/NIDK</th>
                                        <th>Nama</th>
                                        <th>Homebase</th>
                                        <th>Tanggal Pengangkatan</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturers as $lecturer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $lecturer->nidn }}</td>
                                            <td>{{ $lecturer->name }}</td>
                                            <td>{{ $lecturer->homebase_id }}</td>
                                            <td>{{ $lecturer->appointment_date }}</td>
                                            <td>{{ $lecturer->status }}</td>
                                            <td>
                                                <form action="{{ route('admin.lecturers.destroy', $lecturer->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.lecturers.show', $lecturer->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.lecturers.edit', $lecturer->id) }}"><i
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
                {!! $lecturers->links() !!}
            </div>
        </div>
    </div>
@endsection