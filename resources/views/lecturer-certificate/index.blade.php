@extends('layouts.app')

@section('template_title')
    Lecturer Certificate
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lecturer Certificate') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.lecturer-certificates.create') }}"
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
                                        <th>Certificate Types Id</th>
                                        <th>Certificate Date</th>
                                        <th>Note</th>
                                        <th>Certificate Attachment</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturerCertificates as $lecturerCertificate)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $lecturerCertificate->lecturer_id }}</td>
                                            <td>{{ $lecturerCertificate->certificate_types_id }}</td>
                                            <td>{{ $lecturerCertificate->certificate_date }}</td>
                                            <td>{{ $lecturerCertificate->note }}</td>
                                            <td>{{ $lecturerCertificate->certificate_attachment }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.lecturer-certificates.destroy', $lecturerCertificate->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.lecturer-certificates.show', $lecturerCertificate->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.lecturer-certificates.edit', $lecturerCertificate->id) }}"><i
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
                {!! $lecturerCertificates->links() !!}
            </div>
        </div>
    </div>
@endsection
