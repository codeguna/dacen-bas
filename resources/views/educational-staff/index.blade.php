@extends('layouts.dashboard')

@section('template_title')
    Tenaga Kependidikan - Aktif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Tenaga Kependidikan
                            </span>
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

                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Departemen</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Status</th>
                                        <th>KTP</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($educationalStaffs as $educationalStaff)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $educationalStaff->nip }}</td>
                                            <td>{{ $educationalStaff->name }}</td>
                                            <td>{{ $educationalStaff->departmens->short_name }}</td>
                                            <td>{{ $educationalStaff->date_of_entry }}</td>
                                            <td>
                                                @if ($educationalStaff->status == 1)
                                                    <i class="fa fa-check-circle text-success"></i> Aktif
                                                @else
                                                    <i class="fa fa-times-circle text-danger"></i> Tidak Aktif
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/data_ktp_tendik/' . $educationalStaff->id_card) }}"
                                                    target="_blank">
                                                    <i class="fa fa-paperclip"></i>
                                                </a>
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.educational-staffs.destroy', $educationalStaff->id) }}"
                                                    method="POST">
                                                    @can('show_tendik')
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('admin.educational-staffs.show', $educationalStaff->id) }}">
                                                            <i class="fa fa-fw fa-eye"></i>
                                                        </a>
                                                    @endcan
                                                    @can('update_tendik')
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.educational-staffs.edit', $educationalStaff->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i>
                                                        </a>
                                                    @endcan

                                                    @can('delete_tendik')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $educationalStaffs->links() !!}
            </div>
        </div>
    </div>
@endsection
