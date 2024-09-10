@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode Ketidakhadiran Karyawan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.select-period-not-present') }}" method="GET"
                            id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h3 class="text-center">
                                        <i class="fas fa-calendar-check"></i> Pilih Periode
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
                                            <a href="{{ route('admin.scan-log.select-period-not-present') }}"
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fa fa-plus-circle text-success" aria-hidden="true"></i> Daftar Nama Karyawan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @php
                                                // Ambil tanggal mulai dan akhir dari request
                                                $startDate = Carbon\Carbon::parse($start_date);
                                                $endDate = Carbon\Carbon::parse($end_date);

                                                // Buat periode dari tanggal mulai sampai akhir
                                                $period = Carbon\CarbonPeriod::create($startDate, $endDate);

                                                // Ambil hari libur dari tabel holidays
                                                $holidays = DB::table('holidays')
                                                    ->whereBetween('date', [$startDate, $endDate])
                                                    ->pluck('date')
                                                    ->map(function ($date) {
                                                        return Carbon\Carbon::parse($date)->format('Y-m-d');
                                                    });

                                                // Ambil semua hari dalam periode tersebut, kecualikan hari Minggu dan hari libur
                                                $allDays = collect($period)->filter(function ($date) use ($holidays) {
                                                    return $date->isWeekday() &&
                                                        !$holidays->contains($date->format('Y-m-d'));
                                                });

                                                // Ambil hari yang sudah di-scan
                                                $scannedDays = \DB::table('scan_logs')
                                                    ->where('pin', $user->pin)
                                                    ->whereBetween(\DB::raw('DATE(scan)'), [$start_date, $end_date])
                                                    ->whereNotIn(\DB::raw('DAYOFWEEK(scan)'), [1]) // Kecualikan hari Minggu
                                                    ->pluck('scan')
                                                    ->map(function ($date) {
                                                        return Carbon\Carbon::parse($date)->format('Y-m-d');
                                                    });

                                                // Cari hari yang tidak di-scan
                                                $daysNotScanned = $allDays->filter(function ($date) use ($scannedDays) {
                                                    return !$scannedDays->contains($date->format('Y-m-d'));
                                                });

                                                // Format hasil menjadi Y-m-d
                                                $daysNotScannedFormatted = $daysNotScanned->map(function ($date) {
                                                    return $date->format('Y-m-d');
                                                });
                                            @endphp

                                            @if ($daysNotScannedFormatted->isEmpty())
                                                <p>Tidak ada hari yang terlewat.</p>
                                            @else
                                                @foreach ($daysNotScannedFormatted as $day)
                                                    <div class="btn-group" role="group" aria-label="">
                                                        <a class="btn btn-xs btn-primary"
                                                            href="{{ route('admin.not-scan-logs.getDate', ['pin' => $user->pin, 'date' => $day]) }}"
                                                            target="_blank">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-xs btn-outline-primary"
                                                            disabled>{{ $day }}</a>
                                                    </div> <br>
                                                @endforeach
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
@endsection
@section('scripts')
    <script>
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
