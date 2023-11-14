@extends('layouts.dashboard')

@section('template_title')
    Kesediaan Karyawan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">

                                <h3><i class="fas fa-check-double text-primary"></i> Kesediaan Karyawan</h3>
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
                            <table id="dataTable1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kesediaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                @if ($user->willingness->count() == 0)
                                                    <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->willingness->count() == 0)
                                                    <a href="{{ route('admin.willingnesses.create', $user->id) }}"
                                                        class="btn btn-primary btn-xs">
                                                        <i class="fas fa-clock"></i> Set Kesediaan
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.willingnesses.edit', $user->id) }}"
                                                        class="btn btn-warning btn-xs">
                                                        <i class="fas fa-pencil-alt"></i> Update Kesediaan
                                                    </a>
                                                @endif
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
