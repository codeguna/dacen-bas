@extends('layouts.app')

@section('template_title')
    Educational Staff Certificate
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Educational Staff Certificate') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.educational-staff-certificates.create') }}"
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

                                        <th>Educational Staff Id</th>
                                        <th>Certificate Types Id</th>
                                        <th>Certificate Date</th>
                                        <th>Note</th>
                                        <th>Certificate Attachment</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($educationalStaffCertificates as $educationalStaffCertificate)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $educationalStaffCertificate->educational_staff_id }}</td>
                                            <td>{{ $educationalStaffCertificate->certificate_types_id }}</td>
                                            <td>{{ $educationalStaffCertificate->certificate_date }}</td>
                                            <td>{{ $educationalStaffCertificate->note }}</td>
                                            <td>{{ $educationalStaffCertificate->certificate_attachment }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.educational-staff-certificates.destroy', $educationalStaffCertificate->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.educational-staff-certificates.show', $educationalStaffCertificate->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.educational-staff-certificates.edit', $educationalStaffCertificate->id) }}"><i
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
                {!! $educationalStaffCertificates->links() !!}
            </div>
        </div>
    </div>
@endsection
