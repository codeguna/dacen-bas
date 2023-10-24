@extends('layouts.dashboard')

@section('template_title')
    Scan Logs
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Scan Logs
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <form id="searchForm" action="{{ route('admin.scanlogs.search') }}" method="GET">
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
                                    <h5 class="text-center">{{ request('start_date') }} | {{ request('end_date') }}</h5>
                                    <div class="input-group">
                                        <input type="date" name="start_date" id="start_date" class="form-control"
                                            required>
                                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary rounded">
                                                <button type="submit" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                                <a href="{{ route('admin.scan-logs.index') }}"
                                                    class="btn btn-success btn-xs">
                                                    <i class="fas fa-sync"></i>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <div class="table-responsive">
                        <table id="dataTable1" class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>PIN</th>
                                    <th>Scan</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scanLogs as $scanLog)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $scanLog->pin }}</td>
                                        <td>{{ $scanLog->scan }}</td>
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
