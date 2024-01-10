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
                        <h3><i class="fas fa-user-clock text-warning"></i> Presensi Hari Ini</h3>
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
                            <i class="fas fa-calendar-check text-primary"></i> Akumulasi Kehadiran
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
                                <div class="col-md-12 mt-3">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Day</th>
                                                    <th>Date</th>
                                                    <th>Scan Times</th>
                                                    <th>Total Hours</th>
                                                    {{-- <th>Notes</th> --}}
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
                                                        $daysOfWeek = date('l', strtotime($previousDate));

                                                        if ($previousDate !== null && $previousDate != $currentDate) {
                                                            // Menampilkan data untuk tanggal sebelumnya
                                                            echo '<tr>';
                                                            echo '<td>' . $y . '</td>';
                                                            echo '<td>' . date('l', strtotime($previousDate)) . '</td>';
                                                            echo '<td>' . $previousDate . '</td>';
                                                            echo '<td>' . implode(' | ', $scanTimes) . '</td>';
                                                            echo '<td>' . intval(calculateTotalHours($scanTimes)) . ' Jam</td>';
                                                            // if ($daysOfWeek == 'Monday') {
                                                            //     if ($scanTimes[0] >= $hasilSenin) {
                                                            //         echo '<td>' . '<i class="fas fa-info-circle text-danger"></i> Terlambat' . '</td>';
                                                            //     } else {
                                                            //         echo '<td>' . '<i class="fas fa-check-circle text-success"></i>' . '</td>';
                                                            //     }
                                                            // } elseif ($daysOfWeek == 'Tuesday') {
                                                            //     if ($scanTimes[0] >= $hasilSelasa) {
                                                            //         echo '<td>' . '<i class="fas fa-info-circle text-danger"></i> Terlambat' . '</td>';
                                                            //     } else {
                                                            //         echo '<td>' . '<i class="fas fa-check-circle text-success"></i>' . '</td>';
                                                            //     }
                                                            // } elseif ($daysOfWeek == 'Wednesday') {
                                                            //     if ($scanTimes[0] >= $hasilRabu) {
                                                            //         echo '<td>' . '<i class="fas fa-info-circle text-danger"></i> Terlambat' . '</td>';
                                                            //     } else {
                                                            //         echo '<td>' . '<i class="fas fa-check-circle text-success"></i>' . '</td>';
                                                            //     }
                                                            // } elseif ($daysOfWeek == 'Thursday') {
                                                            //     if ($scanTimes[0] >= $hasilKamis) {
                                                            //         echo '<td>' . '<i class="fas fa-info-circle text-danger"></i> Terlambat' . '</td>';
                                                            //     } else {
                                                            //         echo '<td>' . '<i class="fas fa-check-circle text-success"></i>' . '</td>';
                                                            //     }
                                                            // } elseif ($daysOfWeek == 'Friday') {
                                                            //     if ($scanTimes[0] >= $hasilJumat) {
                                                            //         echo '<td>' . '<i class="fas fa-info-circle text-danger"></i> Terlambat' . '</td>';
                                                            //     } else {
                                                            //         echo '<td>' . '<i class="fas fa-check-circle text-success"></i>' . '</td>';
                                                            //     }
                                                            // } elseif ($daysOfWeek == 'Saturday') {
                                                            //     if ($scanTimes[0] >= $hasilSabtu) {
                                                            //         echo '<td>' . '<i class="fas fa-info-circle text-danger"></i> Terlambat' . '</td>';
                                                            //     } else {
                                                            //         echo '<td>' . '<i class="fas fa-check-circle text-success"></i>' . '</td>';
                                                            //     }
                                                            // }

                                                            echo '</tr>';
                                                            $y++; // Tambahkan nomor

                                                            // Tambahkan total jam kerja untuk tanggal sebelumnya
                                                            $totalHours += calculateTotalHoursInSeconds($scanTimes);

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
                                                        <td>{{ date('l', strtotime($previousDate)) }}</td>
                                                        <td>{{ $previousDate }}</td>
                                                        <td>{{ implode(' | ', $scanTimes) }}</td>
                                                        <td>{{ intval(calculateTotalHours($scanTimes)) }} Jam</td>
                                                        {{-- @if ($daysOfWeek == 'Monday')
                                                            {
                                                            @if ($scanTimes[0] >= $hasilSenin)
                                                                {
                                                                <td>
                                                                    <i class="fas fa-info-circle text-danger"></i> Terlambat
                                                                </td>
                                                                }
                                                            @else
                                                                <td><i class="fas fa-check-circle text-success"></td>
                                                            @endif
                                                            }
                                                        @elseif ($daysOfWeek == 'Tuesday')
                                                            {
                                                            @if ($scanTimes[0] >= $hasilSelasa)
                                                                {
                                                                <td><i class="fas fa-info-circle text-danger"></i> Terlambat
                                                                </td>
                                                                }
                                                            @else
                                                                <td><i class="fas fa-check-circle text-success"></i></td>
                                                            @endif
                                                            }
                                                        @elseif ($daysOfWeek == 'Wednesday')
                                                            {
                                                            @if ($scanTimes[0] >= $hasilRabu)
                                                                {
                                                                <td><i class="fas fa-info-circle text-danger"></i> Terlambat
                                                                </td>
                                                                }
                                                            @else
                                                                <td><i class="fas fa-check-circle text-success"></i></td>
                                                            @endif
                                                            }
                                                        @elseif ($daysOfWeek == 'Thursday')
                                                            {
                                                            @if ($scanTimes[0] >= $hasilKamis)
                                                                {
                                                                <td><i class="fas fa-info-circle text-danger"></i> Terlambat
                                                                </td>
                                                                }
                                                            @else
                                                                <td><i class="fas fa-check-circle text-success"></i></td>
                                                            @endif
                                                            }
                                                        @elseif ($daysOfWeek == 'Friday')
                                                            {
                                                            @if ($scanTimes[0] >= $hasilJumat)
                                                                {
                                                                <td><i class="fas fa-info-circle text-danger"></i> Terlambat
                                                                </td>
                                                                }
                                                            @else
                                                                <td><i class="fas fa-check-circle text-success"></i></td>
                                                            @endif
                                                            }
                                                        @elseif ($daysOfWeek == 'Saturday')
                                                            {
                                                            @if ($scanTimes[0] >= $hasilSabtu)
                                                                {
                                                                <td><i class="fas fa-info-circle text-danger"></i> Terlambat
                                                                </td>
                                                                }
                                                            @else
                                                                <td><i class="fas fa-check-circle text-success"></i></td>
                                                            @endif
                                                            }
                                                        @endif --}}
                                                    </tr>
                                                    <!-- Tambahkan total jam kerja untuk tanggal terakhir -->
                                                    @php
                                                        $totalHours += calculateTotalHoursInSeconds($scanTimes);
                                                    @endphp
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <th>No.</th>
                                                <th>Day</th>
                                                <th>Date</th>
                                                <th>Scan Times</th>
                                                <th>Total Hours</th>
                                                {{-- <th>Notes</th> --}}
                                            </tfoot>
                                        </table>
                                        <hr>
                                        @php
                                            // Tampilkan total jam kerja di bagian bawah tabel
                                            echo '<p>Total Hours: <strong><i class="fas fa-clock text-primary"></i> ' . formatTotalHours($totalHours) . '</strong></p>';

                                            // Fungsi untuk menghitung total jam kerja dari array waktu scan dalam detik
                                            function calculateTotalHoursInSeconds($times)
                                            {
                                                if (count($times) < 2) {
                                                    return 0;
                                                }
                                                $firstTime = strtotime($times[0]);
                                                $lastTime = strtotime(end($times));
                                                return $lastTime - $firstTime;
                                            }

                                            // Fungsi untuk memformat total jam kerja dari detik menjadi format hh:mm
                                            function formatTotalHours($totalSeconds)
                                            {
                                                $totalHours = $totalSeconds / 3600;
                                                $hours = floor($totalHours);
                                                $minutes = round(($totalHours - $hours) * 60);
                                                return sprintf('%02d:%02d', $hours, $minutes);
                                            }
                                        @endphp

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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-info-circle text-danger"></i> Akumulasi Terlambat
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-sm" id="late">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-calendar"></i> Tanggal</th>
                                    <th><i class="fas fa-clock"></i> Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($scan_logs_late as $late)
                                    @php
                                        $pin = Auth::user()->pin;
                                        $dates = \Carbon\Carbon::parse($late->date);
                                        $firstScan = \App\Models\ScanLog::where('pin', $pin)
                                            ->where(function ($query) use ($dates) {
                                                $query->whereDate('scan', '=', $dates);
                                            })
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
                                                ->addMinutes(11)
                                                ->format('H:i:s');
                                        } else {
                                            $resultLateTime = null;
                                        }
                                    @endphp
                                    <tr>
                                        @if ($resultLateTime == null)
                                        @elseif ($times >= $resultLateTime)
                                            <td>
                                                {{ $late->date }}
                                            </td>
                                            <td>
                                                <span><i class="fa fa-times text-danger" aria-hidden="true"></i>
                                                    {{ $times }}</span>
                                            </td>
                                        @else
                                        @endif
                                    </tr>
                                @endforeach
                            <tfoot>
                                <tr>
                                    <th><i class="fas fa-calendar"></i> Tanggal</th>
                                    <th><i class="fas fa-clock"></i> Jam</th>
                                </tr>
                            </tfoot>
                            </tbody>
                        </table>
                        <hr>
                        <strong>
                            <p id="count"></p>
                        </strong>
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
        const lateTable = document.getElementById('late');
        const span = lateTable.getElementsByTagName('span');

        // Hitung jumlah elemen <i>
        const iconCount = span.length;

        // Tampilkan jumlahnya dalam sebuah paragraf HTML
        const countParagraph = document.getElementById('count');
        countParagraph.textContent = `Jumlah Terlambat: ${iconCount}`;
    </script>
@endsection
