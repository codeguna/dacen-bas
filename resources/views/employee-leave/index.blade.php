@extends('layouts.dashboard')

@section('template_title')
    Cuti Karyawan {{ date('Y') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <h3 id="card_title">
                                <i class="fas fa-briefcase text-primary"></i> Cuti Karyawan Tahun {{ date('Y') }}
                            </h3>
                            @php
                                $tahun = date('Y');
                            @endphp
                            <div class="float-right">
                                <a href="{{ route('admin.employee-leaves.generate', ['year' => $tahun]) }}"
                                    class="btn btn-warning btn-sm float-right" data-placement="left">
                                    <i class="fa fa-magic" aria-hidden="true"></i> Generate
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

                                        <th>Nama</th>
                                        <th>Jumlah Cuti</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employeeLeaves as $employeeLeave)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $employeeLeave->user->name }}</td>
                                            <td>{{ $employeeLeave->amount }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.employee-leaves.destroy', $employeeLeave->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.employee-leaves.show', $employeeLeave->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.employee-leaves.edit', $employeeLeave->id) }}"><i
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
                {!! $employeeLeaves->links() !!}
            </div>
        </div>
    </div>
@endsection
