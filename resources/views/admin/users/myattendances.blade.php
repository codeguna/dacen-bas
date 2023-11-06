@extends('layouts.dashboard')

@section('template_title')
    Presensi Saya
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user-clock"></i> Presensi Hari Ini</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Scan 1</th>
                                        <th>Scan 2</th>
                                        <th>Scan 3</th>
                                        <th>Scan 4</th>
                                        <th>Total Jam</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            @if ($scan1)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($scan1->scan)->format('H:i:s') }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan2)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($scan2->scan)->format('H:i:s') }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan3)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($scan3->scan)->format('H:i:s') }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan4)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ \Carbon\Carbon::parse($scan4->scan)->format('H:i:s') }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $totalDiff = 0;
                                                if ($scan1 && $scan2) {
                                                    $totalDiff += strtotime($scan2->scan) - strtotime($scan1->scan);
                                                }
                                                if ($scan2 && $scan3) {
                                                    $totalDiff += strtotime($scan3->scan) - strtotime($scan2->scan);
                                                }
                                                if ($scan3 && $scan4) {
                                                    $totalDiff += strtotime($scan4->scan) - strtotime($scan3->scan);
                                                }
                                                $hours = floor($totalDiff / 3600);
                                                $minutes = floor(($totalDiff % 3600) / 60);
                                            @endphp
                                            <i class="fas fa-clock text-warning"></i>
                                            {{ $hours }} jam {{ $minutes }} menit
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-calendar-check    "></i> Akumulasi Kehadiran
                        </h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.my-attendances-filter') }}" method="GET"
                            id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h4 class="text-center">
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" required>
                                        <input class="form-control" type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" required>
                                        <p id="date_error" style="color: red;"></p>
                                        <span class="input-group-btn">
                                            <a href="{{ route('admin.scan-log.my-attendances') }}" class="btn btn-success">
                                                <i class="fas fa-sync"></i>
                                            </a>
                                            <button type="submit" class="btn btn-warning" type="button"
                                                id="submit_button">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Scan Times</th>
                                                    <th>Total Hours</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $y = 1; // Inisialisasi nomor dengan 1
                                                    $previousDate = null; // Inisialisasi tanggal sebelumnya
                                                    $scanTimes = []; // Inisialisasi array untuk menyimpan waktu scan pada tanggal tertentu
                                                    $totalHours = 0; // Inisialisasi total jam kerja
                                                @endphp

                                                @foreach ($scan_logs as $scanlog)
                                                    @php
                                                        $currentDate = date('Y-m-d', strtotime($scanlog->scan));
                                                        $scanTime = date('H:i:s', strtotime($scanlog->scan));

                                                        if ($previousDate !== null && $previousDate != $currentDate) {
                                                            // Menampilkan data untuk tanggal sebelumnya
                                                            echo '<tr>';
                                                            echo '<td>' . $y . '</td>';
                                                            echo '<td>' . $previousDate . '</td>';
                                                            echo '<td>' . implode(' | ', $scanTimes) . '</td>';
                                                            echo '<td>' . calculateTotalHours($scanTimes) . '</td>';
                                                            echo '</tr>';
                                                            $y++; // Tambahkan nomor

                                                            // Reset array waktu scan untuk tanggal baru
                                                            $scanTimes = [];
                                                        }
                                                        $previousDate = $currentDate;
                                                        $scanTimes[] = $scanTime;
                                                    @endphp
                                                @endforeach

                                                @if (!empty($previousDate))
                                                    <!-- Menampilkan data untuk tanggal terakhir -->
                                                    <tr>
                                                        <td>{{ $y }}</td>
                                                        <td>{{ $previousDate }}</td>
                                                        <td>{{ implode(' | ', $scanTimes) }}</td>
                                                        <td>{{ calculateTotalHours($scanTimes) }}</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>

                                        @php
                                            // Fungsi untuk menghitung total jam kerja dari array waktu scan
                                            function calculateTotalHours($times)
                                            {
                                                if (count($times) < 2) {
                                                    return '0';
                                                }
                                                $firstTime = strtotime($times[0]);
                                                $lastTime = strtotime(end($times));
                                                $totalSeconds = $lastTime - $firstTime;
                                                $totalHours = $totalSeconds / 3600;

                                                // Ubah format jam kerja menjadi hh:mm
                                                $hours = floor($totalHours);
                                                $minutes = round(($totalHours - $hours) * 60);
                                                return sprintf('%02d:%02d', $hours, $minutes);
                                            }
                                        @endphp
                                    </div>
                                </div>
                            </div>
                        </form>
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
