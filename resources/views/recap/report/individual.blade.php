<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <title>{{ env('APP_NAME') }} | Rekapitulasi Kehadiran Periode - {{ $start_date }}/ {{ $end_date }}</title>
        <style>
            .header {
                padding: 10px;
                text-align: center;
            }

            .logo {
                width: auto;
                height: 50px;
                margin: 10px;
                background-image: url('logo.png');
                /* ganti dengan nama file logo Anda */
                background-size: cover;
                background-position: center;
                border-radius: 1px;
            }

            .header-text {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <img src="{{ asset('images/logo-lpkia.png') }}" alt="Logo" class="logo">
                            <h2>Rekapitulasi Kehadiran</h2>
                            <h3>{{ $type }}</h3>
                            <h3>Periode {{ Carbon\Carbon::parse($start_date)->format('d-M-Y') }} s/d Periode
                                {{ Carbon\Carbon::parse($end_date)->format('d-M-Y') }}</h3>
                            {{-- <p class="header-text">Jumlah Hari Kerja {{ $total_day }} Hari dan {{ $total_hour }}
                                Jam</p> --}}
                        </div>
                        <div
                            style="border-bottom: 2px solid #000; border-bottom-width: 1px 1px 0.5px 0.5px; padding-bottom: 10px;">
                        </div>
                        <div style="border-bottom: 1px solid #000; padding-bottom: 10px; margin-bottom: 20px;"></div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Hari</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Jam Kerja</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    // Variabel untuk menghitung total jam kerja
                                    $totalSeconds = 0;
                                    $late = 0;
                                @endphp
                                @forelse ($scans as $scan)
                                    @php
                                        $days = \Carbon\Carbon::parse($scan)->format('l');
                                        $dates = \Carbon\Carbon::parse($scan)->format('d-m-Y');
                        
                                        $getFirstScan = \App\Models\ScanLog::select('scan')
                                            ->where('pin', $pin)
                                            ->where('ip_scan', '3.1.174.198')
                                            ->whereDate('scan', $scan)
                                            ->orderBy('scan', 'ASC')
                                            ->first();
                                    @endphp
                        
                                    @if ($getFirstScan)
                                        @php
                                            $firstTime = \Carbon\Carbon::parse($getFirstScan->scan)->format('H:i:s');
                        
                                            $getLastScan = \App\Models\ScanLog::select('scan')
                                                ->where('pin', $pin)
                                                ->whereDate('scan', $scan)
                                                ->orderBy('scan', 'DESC')
                                                ->first();
                                            $lastTime = \Carbon\Carbon::parse($getLastScan->scan)->format('H:i:s');
                        
                                            // Menghitung selisih waktu
                                            $firstTimeInSeconds = strtotime($firstTime);
                                            $lastTimeInSeconds = strtotime($lastTime);
                                            $timeDifferenceInSeconds = $lastTimeInSeconds - $firstTimeInSeconds;
                        
                                            // Mengonversi selisih waktu kembali ke jam, menit, dan detik
                                            $hours = floor($timeDifferenceInSeconds / 3600);
                                            $minutes = floor(($timeDifferenceInSeconds % 3600) / 60);
                                            $seconds = $timeDifferenceInSeconds % 60;
                        
                                            // Menambahkan waktu kerja pada hari tersebut ke total
                                            $totalSeconds += $timeDifferenceInSeconds;
                        
                                            // Kalkulasi jam telat
                                            $dayCode = null;
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
                        
                                            // Cek Kesediaan
                                            $lateTime = \App\Models\Willingness::where('pin', $pin)
                                                ->where('day_code', $dayCode)
                                                ->where(function ($query) use ($start_date, $end_date) {
                                                    $query
                                                        ->whereDate('start_date', '<=', $start_date)
                                                        ->whereDate('end_date', '>=', $end_date);
                                                })
                                                ->first();
                        
                                            if (!empty($lateTime)) {
                                                $resultLateTime = \Carbon\Carbon::createFromFormat(
                                                    'H:i:s',
                                                    $lateTime->time_of_entry,
                                                )
                                                    ->addMinutes(10)
                                                    ->addSeconds(01)
                                                    ->format('H:i:s');
                                            } else {
                                                $resultLateTime = null;
                                            }
                                        @endphp
                        
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $days }}</td>
                                            <td>{{ $dates }}</td>
                                            <td>{{ $firstTime }}</td>
                                            <td>{{ $lastTime }}</td>
                                            <td>{{ $hours }}:{{ $minutes }}:{{ $seconds }}</td>
                                            <td>
                                                @if ($resultLateTime == null)
                                                @elseif ($firstTime >= $resultLateTime)
                                                    Terlambat
                                                    @php
                                                        ++$late;
                                                    @endphp
                                                @else
                                                @endif
                                                @if ($seconds < 1)
                                                    {{-- Absen tidak lengkap --}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="7">== Tidak Ada Data ==</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                @php
                                    // Mengonversi total detik ke jam, menit, dan detik
                                    $totalHours = floor($totalSeconds / 3600);
                                    $totalMinutes = floor(($totalSeconds % 3600) / 60);
                                    $totalRemainingSeconds = $totalSeconds % 60;
                                @endphp
                                <tr>
                                    <th colspan="5"></th>
                                    <th>{{ $totalHours }}:{{ $totalMinutes }}:{{ $totalRemainingSeconds }}</th>
                                    <th>Terlambat: {{ $late }}</th>
                                </tr>
                            </tfoot>
                        </table>
                        
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <small>
                            <em>Dicetak pada: {{ now() }}</em>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
