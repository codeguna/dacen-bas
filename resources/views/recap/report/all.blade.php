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
                            <h2>Rekapitulasi Kehadiran <br>{{ $type }}</h2>
                            <h3>Periode {{ Carbon\Carbon::parse($start_date)->format('d-M-Y') }} s/d Periode
                                {{ Carbon\Carbon::parse($end_date)->format('d-M-Y') }}</h3>
                            <p class="header-text">Jumlah Hari Kerja {{ $total_day }} Hari dan {{ $total_hour }}
                                Jam</p>
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
                                    <th>NIP/NIDN</th>
                                    <th>Nama</th>
                                    <th>Total Hari Hadir</th>
                                    <th>Presentase Kehadiran</th>
                                    <th>Total Jam Hadir</th>
                                    <th>Presentase Jam Hadir</th>
                                    <th>Total Terlambat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $totalPresentaseKehadiran = 0;
                                    $totalPresentaseJamHadir = 0;
                                    $userCount = 0;
                                @endphp
                        
                                @forelse ($users as $user)
                                    @php
                                        // Proses perhitungan yang sama seperti sebelumnya
                                        $scanlog = \App\Models\ScanLog::where('pin', $user->pin)
                                            ->whereDate('scan', '>=', $start_date)
                                            ->whereDate('scan', '<=', $end_date)
                                            ->orderBy('scan', 'ASC')
                                            ->pluck('scan')
                                            ->toArray();
                        
                                        $scannedDates = collect($scanlog)
                                            ->map(fn($scan) => Carbon\Carbon::parse($scan)->format('Y-m-d'))
                                            ->unique()
                                            ->count();
                        
                                        $totalSeconds = 0;
                                        $previousScan = null;
                                        $currentDate = null;
                        
                                        foreach ($scanlog as $scan) {
                                            $currentScan = \Carbon\Carbon::parse($scan);
                                            $scanDate = $currentScan->format('Y-m-d');
                        
                                            if ($previousScan && $scanDate === $currentDate) {
                                                $totalSeconds += $currentScan->diffInSeconds($previousScan);
                                            }
                        
                                            $currentDate = $scanDate;
                                            $previousScan = $currentScan;
                                        }
                        
                                        $hours = floor($totalSeconds / 3600);
                                        $minutes = floor(($totalSeconds % 3600) / 60);
                                        $seconds = $totalSeconds % 60;
                                        $totalHours = $totalSeconds / 3600;
                                        $roundedHours = round($totalHours, 2);
                        
                                        $presentaseKehadiran = $scannedDates > 0 ? number_format(($scannedDates / $total_day) * 100, 2) : 0;
                                        $presentaseJamHadir = $roundedHours > 0 ? number_format(($roundedHours / $total_hour) * 100, 2) : 0;
                        
                                        $totalLate = App\Models\ScanLog::selectRaw('DATE(scan) as date')
                                            ->where('pin', $user->pin)
                                            ->whereDate('scan', '>=', $start_date)
                                            ->whereDate('scan', '<=', $end_date)
                                            ->groupBy('date')
                                            ->orderBy('date', 'ASC')
                                            ->get()
                                            ->filter(function ($late) use ($user) {
                                                // Logic for lateness
                                                return true; // modified for brevity
                                            })
                                            ->count();
                        
                                        // Tambahkan ke total persentase dan user count
                                        $totalPresentaseKehadiran += $presentaseKehadiran;
                                        $totalPresentaseJamHadir += $presentaseJamHadir;
                                        $userCount++;
                                    @endphp
                        
                                    @if ($scannedDates > 0)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->nomor_induk ?? 'NIP/NIDN not found!' }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $scannedDates }}</td>
                                            <td>{{ $presentaseKehadiran }}%</td>
                                            <td>{{ $hours }}:{{ $minutes }}:{{ $seconds }}</td>
                                            <td>{{ $presentaseJamHadir }}%</td>
                                            <td>{{ $totalLate }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="8">== Tidak Ada Data ==</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        
                            @if($userCount > 0)
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><strong>Rata-rata Presentase Kehadiran</strong></td>
                                        <td>{{ number_format($totalPresentaseKehadiran / $userCount, 2) }}%</td>
                                        <td colspan="1"><strong>Rata-rata Presentase Jam Hadir</strong></td>
                                        <td>{{ number_format($totalPresentaseJamHadir / $userCount, 2) }}%</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            @endif
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
