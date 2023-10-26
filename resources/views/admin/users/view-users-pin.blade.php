@extends('layouts.dashboard')

@section('template_title')
    Set PIN Pengguna
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fa fa-calculator" aria-hidden="true"></i> PIN Pengguna
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>PIN</th>
                                    <th>NIDN/NIP</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            @if ($user->position == null)
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> Posisi belum di set!
                                            @else
                                                {{ $user->position }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->pin == null)
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> PIN belum di set!
                                            @else
                                                {{ $user->pin }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->nomor_induk == null)
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> NIP belum di set!
                                            @else
                                                {{ $user->nomor_induk }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-warning w-100 text-bold"
                                                href="{{ route('admin.user.set-pin', $user->id) }}">
                                                <i class="fa fa-cogs" aria-hidden="true"></i> Atur PIN
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>PIN</th>
                                    <th>NIDN/NIP</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $('#example1').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection
