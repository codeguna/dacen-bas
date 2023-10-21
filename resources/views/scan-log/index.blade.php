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

                    <div class="card-body">

                        <div class="row">

                            <h4>Filter Tanggal</h4>
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="date" name="start_date" class="form-control" required>
                                    <input type="date" name="end_date" class="form-control" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary rounded">
                                            <button type="submit" class="btn btn-primary btn-xs">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
