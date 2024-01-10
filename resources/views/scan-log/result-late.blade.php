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
                        <form action="{{ route('admin.scan-log.resultLate') }}" method="GET" id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h3 class="text-center">
                                        <i class="fas fa-calendar-check"></i> Pilih Periode {{ $start_date }} |
                                        {{ $end_date }}
                                    </h3>
                                    <h4>
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" required>
                                        <input class="form-control" type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" required>
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
                        <table id="dataTable1" class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama - NIP/NIDN</th>
                                    <th>Departemen</th>
                                    <th>Waktu Terlambat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }} - {{ $user->nomor_induk ?? '' }}</td>
                                        <td>
                                            @switch($user->position)
                                                @case('Tendik')
                                                    @php
                                                        $departmentCode = \App\Models\EducationalStaff::select('department_id')
                                                            ->where('nip', $user->nomor_induk)
                                                            ->first();
                                                        $departmentName = \App\Models\Departmen::select('name')
                                                            ->where('id', $departmentCode->department_id)
                                                            ->first();
                                                    @endphp
                                                    {{ $departmentName->name }}
                                                @break

                                                @default
                                                    Dosen
                                            @endswitch
                                        </td>
                                        <td>
                                            @php
                                                $pin = $user->pin;
                                                $scanlogs = \App\Models\ScanLog::selectRaw('DATE(scan) as date')
                                                    ->where('pin', $pin)
                                                    ->where(function ($query) use ($start_date, $end_date) {
                                                        $query->whereDate('scan', '>=', $start_date)->whereDate('scan', '<=', $end_date);
                                                    })
                                                    ->groupBy('date')
                                                    ->get();
                                            @endphp
                                            @foreach ($scanlogs as $log)
                                                @php
                                                    $date = $log->date;
                                                    $firstScan = \App\Models\ScanLog::where('pin', $user->pin)
                                                        ->where(function ($query) use ($date) {
                                                            $query->whereDate('scan', '=', $date);
                                                        })
                                                        ->orderBy('scan', 'ASC')
                                                        ->first();
                                                    $times = \Carbon\Carbon::parse($firstScan->scan)->format('H:i:s');
                                                    $days = \Carbon\Carbon::parse($firstScan->scan)->format('l');
                                                    if ($days == 'Monday') {
                                                        $dayCode = 1;
                                                    } elseif ($days == 'Tuesday') {
                                                        $dayCode = 2;
                                                    } elseif ($days == 'Wednesday') {
                                                        $dayCode = 3;
                                                    } elseif ($days == 'Thursday') {
                                                        $dayCode = 4;
                                                    } elseif ($days == 'Friday') {
                                                        $dayCode = 5;
                                                    } elseif ($days == 'Saturday') {
                                                        $dayCode = 6;
                                                    }
                                                    $now = \Carbon\Carbon::parse($firstScan->scan)->format('Y-m-d');
                                                    $lateTime = \App\Models\Willingness::where('pin', $pin)
                                                        ->where('day_code', $dayCode)
                                                        ->where(function ($query) use ($now) {
                                                            $query->whereDate('start_date', '<=', $now)->whereDate('end_date', '>=', $now);
                                                        })
                                                        ->first();
                                                    if (!empty($lateTime)) {
                                                        $resultLateTime = \Carbon\Carbon::createFromFormat('H:i:s', $lateTime->time_of_entry)
                                                            ->addMinutes(10)
                                                            ->format('H:i:s');
                                                    } else {
                                                        $resultLateTime = null;
                                                    }
                                                @endphp

                                                @if ($times >= $resultLateTime)
                                                    {{ $days }} | {{ $log->date }} | {{ $times }}<br>
                                                @else
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                    <th>Waktu Terlambat</th>
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

            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);

            if (startDate > endDate) {
                alert("Tanggal Akhir tidak bisa lebih kecil dari Tanggal Awal.");
            } else {
                document.getElementById('date_error').textContent = "";
                this.submit(); // Kirim formulir jika valid
            }
        });
    </script>
@endsection
