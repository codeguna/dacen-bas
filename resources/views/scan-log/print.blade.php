@extends('layouts.dashboard')

@section('template_title')
    Export
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fa fa-check-circle text-primary" aria-hidden="true"></i> Scan Logs
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form id="searchForm" action="{{ route('admin.scanlogs.print.result') }}" method="GET">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        Filter Tanggal
                                    </h4>
                                    <hr style="width:100%;text-align:left;margin-left:0">
                                </div>

                                <div class="col-md-12">
                                    <h3 class="text-center">Tanggal Awal/Tanggal Akhir</h3>
                                    <div class="input-group">
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            value="{{ request('start_date') }}" required>
                                        <input type="date" name="end_date" id="end_date" class="form-control"
                                            value="{{ request('end_date') }}" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light rounded">
                                                <button type="submit" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                                <a href="{{ route('admin.scanlogs.print') }}"
                                                    class="btn btn-warning btn-xs">
                                                    <i class="fas fa-sync"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <hr>
                    <div class="table-responsive">
                        <table id="dataTable1" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>Tanggal Scan</th>
                                    <th>Tanggal</th>
                                    <th>Jam Scan</th>
                                    <th>PIN</th>
                                    <th>NIP</th>
                                    <th>Nama Karyawan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scanLogs as $scanLog)
                                    <tr>
                                        <td>{{ $scanLog->scan }}</td>
                                        <td>{{ \Carbon\Carbon::parse($scanLog->scan)->format('Y-m-d') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($scanLog->scan)->format('H:i') }}</td>
                                        <td>{{ $scanLog->pin }}</td>
                                        <td>{{ $scanLog->user->nomor_induk ?? '' }}</td>
                                        <td>{{ $scanLog->user->name ?? '' }}</td>
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
                "buttons": ["csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#dataTable1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        document.getElementById('searchForm').addEventListener('submit', function(event) {
            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);

            if (startDate > endDate) {
                alert('Tanggal Akhir tidak bisa lebih kecil daripada Tanggal Mulai!');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endsection
