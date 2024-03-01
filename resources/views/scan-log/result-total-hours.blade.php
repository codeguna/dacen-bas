@extends('layouts.dashboard')

@section('template_title')
    Hasil Data Terlambat
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.result-total-hours') }}" method="GET" id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h3 class="text-center">
                                        <i class="fas fa-calendar-check"></i> Pilih Periode {{ request('startDate') }} |
                                        {{ request('endDate') }}
                                    </h3>
                                    <h4>
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="startDate" id="startDate"
                                            value="{{ request('startDate') }}" required>
                                        <input class="form-control" type="date" name="endDate" id="endDate"
                                            value="{{ request('endDate') }}" required>
                                        <p id="date_error" style="color: red;"></p>
                                        <span class="input-group-btn">
                                            <a href="{{ route('admin.scan-log.my-attendances') }}"
                                                class="btn btn-success ml-1">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                            <button type="submit" class="btn btn-warning" type="button"
                                                id="submit_button">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Penting!</strong> Jika terdapat
                            data yang tidak lazim/lengkap. Kemungkinan yang bersangkutan terlewatkan presensinya.
                        </div>
                        <table id="dataTable1" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIP/NIDN</th>
                                    <th>Jam Kerja</th>
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
                                           {{ $user->nomor_induk }}
                                        </td>
                                        <td>
                                            @php
                                                $pin = $user->pin;
                                                $startDate = request('startDate');
                                                $endDate = request('endDate');
                                                $scan_logs = \App\Models\ScanLog::selectRaw('DATE(scan) as date')
                                                    ->where('pin', $pin)
                                                    ->whereBetween('scan', [$startDate, $endDate])
                                                    ->groupBy('date')
                                                    ->orderBy('date', 'ASC')
                                                    ->get();
                                            @endphp
                                           @php
                                           $totalHours = 0;
                                           $totalMinutes = 0;
                                           @endphp
                                           
                                           @foreach ($scan_logs as $time)
                                               @php
                                               $dates = $time->date;
                                               $firstScan = \App\Models\ScanLog::where('pin', $pin)
                                                   ->whereDate('scan', '=', $dates)
                                                   ->first();
                                               $firstTime = \Carbon\Carbon::parse($firstScan->scan)->format('H:i:s');
                                           
                                               $lastScan = \App\Models\ScanLog::where('pin', $pin)
                                                   ->whereDate('scan', '=', $dates)
                                                   ->orderBy('scan', 'DESC')
                                                   ->first();
                                               $lastTime = \Carbon\Carbon::parse($lastScan->scan)->format('H:i:s');
                                           
                                               $start = \Carbon\Carbon::createFromFormat('H:i:s', $firstTime);
                                               $end = \Carbon\Carbon::createFromFormat('H:i:s', $lastTime);
                                           
                                               $diffInHours = $start->diffInHours($end);
                                               $diffInMinutes = $start->diffInMinutes($end) - $diffInHours * 60;
                                           
                                               $totalHours += $diffInHours;
                                               $totalMinutes += $diffInMinutes;
                                               @endphp
                                           @endforeach
                                           
                                           @php
                                           $totalHours += floor($totalMinutes / 60);
                                           $totalMinutes = $totalMinutes % 60;
                                           $totalTime = $totalHours . ' jam ' . $totalMinutes . ' menit';
                                           @endphp
                                           
                                           <i class="fas fa-clock text-primary"></i> {{ $totalTime }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIP/NIDN</th>
                                    <th>Total Jam Kerja</th>
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
            $("#dataTable1").DataTable({
                "responsive": true,
                "lengthChange": true,
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

        document.getElementById('attendanceForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah pengiriman formulir secara otomatis

            var startDate = new Date(document.getElementById('startDate').value);
            var endDate = new Date(document.getElementById('endDate').value);

            if (startDate > endDate) {
                alert("Tanggal Akhir tidak bisa lebih kecil dari Tanggal Awal.");
            } else {
                document.getElementById('date_error').textContent = "";
                this.submit(); // Kirim formulir jika valid
            }
        });
    </script>
@endsection
