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
                            <h2>Rekapitulasi Kehadiran untuk Semua Departemen</h2>
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
                                @forelse ($users as $user)
                                    @php
                                        // Retrieve scan timestamps
                                        $scanlog = \App\Models\ScanLog::where('pin', $user->pin)
                                            ->whereBetween(\DB::raw('DATE(scan)'), [$start_date, $end_date])
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
                                                // Calculate the difference
                                                $totalSeconds += $currentScan->diffInSeconds($previousScan);
                                            }

                                            // Update current date and previous scan
                                            $currentDate = $scanDate;
                                            $previousScan = $currentScan;
                                        }

                                        // Convert total seconds to hours, minutes, and seconds
                                        $hours = floor($totalSeconds / 3600);
                                        $minutes = floor(($totalSeconds % 3600) / 60);
                                        $seconds = $totalSeconds % 60;

                                        // Calculate total hours as a single number
                                        $totalHours = $totalSeconds / 3600;
                                        $roundedHours = round($totalHours, 2);

                                        // Calculate total late count
                                        $totalLate = App\Models\ScanLog::selectRaw('DATE(scan) as date')
                                            ->where('pin', $user->pin)
                                            ->whereBetween('scan', [$start_date, $end_date])
                                            ->groupBy('date')
                                            ->orderBy('date', 'ASC')
                                            ->get()
                                            ->filter(function ($late) use ($user) {
                                                $pin = $user->pin;
                                                $dates = \Carbon\Carbon::parse($late->date);
                                                $firstScan = \App\Models\ScanLog::where('pin', $pin)
                                                    ->whereDate('scan', '=', $dates)
                                                    ->orderBy('scan', 'ASC')
                                                    ->first();

                                                $times = \Carbon\Carbon::parse($firstScan->scan)->format('H:i:s');
                                                $days = \Carbon\Carbon::parse($firstScan->scan)->format('l');
                                                $dayCode =
                                                    [
                                                        'Monday' => 1,
                                                        'Tuesday' => 2,
                                                        'Wednesday' => 3,
                                                        'Thursday' => 4,
                                                        'Friday' => 5,
                                                        'Saturday' => 6,
                                                    ][$days] ?? null;

                                                $now = \Carbon\Carbon::parse($firstScan->scan)->format('Y-m-d');

                                                $lateTime = \App\Models\Willingness::where('pin', $pin)
                                                    ->where('day_code', $dayCode)
                                                    ->whereDate('start_date', '<=', $now)
                                                    ->whereDate('end_date', '>=', $now)
                                                    ->first();

                                                if ($lateTime) {
                                                    $resultLateTime = \Carbon\Carbon::createFromFormat(
                                                        'H:i:s',
                                                        $lateTime->time_of_entry,
                                                    )
                                                        ->addMinutes(10)
                                                        ->addSeconds(1)
                                                        ->format('H:i:s');

                                                    return $times >= $resultLateTime;
                                                }

                                                return false;
                                            })
                                            ->count();
                                    @endphp
                                    @if ($scannedDates >= 0)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $user->nomor_induk ?? 'NIP/NIDN not found!' }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $scannedDates }}</td>
                                            <td>{{ number_format(($scannedDates / $total_day) * 100, 2) }}%</td>
                                            <td>{{ $hours }}:{{ $minutes }}:{{ $seconds }}</td>
                                            <td>{{ number_format(($roundedHours / $total_hour) * 100, 2) }}%</td>
                                            <td>{{ $totalLate }}</td>
                                        </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <td colspan="8">== Tidak Ada Data ==</td>
                                    </tr>
                                @endforelse
                            </tbody>
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
