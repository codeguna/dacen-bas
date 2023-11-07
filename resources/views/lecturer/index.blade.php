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
                            <table id="dataTable1" class="table table-striped table-hover">
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
                                            <td>{{ $lecturer->homebases->name }}</td>
                                            <td>{{ $lecturer->appointment_date }}</td>
                                            <td>
                                                @if ($lecturer->status == 1)
                                                    <i class="fa fa-check-circle text-success"></i>
                                                    Aktif
                                                @else
                                                    <i class="fa fa-check-circle text-muted"></i>
                                                    Non Aktif
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.lecturers.destroy', $lecturer->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.lecturers.show', $lecturer->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.lecturers.edit', $lecturer->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Hapus data dosen {{ $lecturer->name }}?')"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#dataTable1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
