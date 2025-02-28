<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap 4 Basic</title>
        <!-- Bootstrap 4 CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- FontAwesome 4 CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <div class="container mt-4">
            <!-- Kop Surat -->
            <div class="row align-items-center border-bottom pb-3">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('images/logo-lpkia.png') }}" style="height: 50px" alt="Logo LPKIA" class="img-fluid">
                    <h4 class="font-weight-bold mb-1">Institut Digital Ekonomi LPKIA</h4>
                    <p class="mb-0">Jl. Soekarno Hatta No. 456, Bandung 40266, Jawa Barat</p>
                    <p class="mb-0">Telp: 022-7564283 / 7564284</p>
                </div>
            </div>
            <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama - NIP/NIDN</th>
                                            <th>Departemen</th>
                                            <th>Waktu Terlambat</th>
                                            <th>Pulang Cepat</th>
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
                                                                $departmentCode = \App\Models\EducationalStaff::select(
                                                                    'department_id',
                                                                )
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
                                                                $query
                                                                    ->whereDate('scan', '>=', $start_date)
                                                                    ->whereDate('scan', '<=', $end_date);
                                                            })
                                                            ->groupBy('date')
                                                            ->get();
                                                        $increments = 0;
                                                        $incrementsB = 0;
                                                    @endphp
                                                    @foreach ($scanlogs as $log)
                                                        @php
                                                            $date = $log->date;
                                                            $firstScan = \App\Models\ScanLog::select('scan', 'pin')
                                                                ->where('pin', $user->pin)
                                                                ->where(function ($query) use ($date) {
                                                                    $query->whereDate('scan', '=', $date);
                                                                })
                                                                ->orderBy('scan', 'ASC')
                                                                ->first();
                                                            $times = \Carbon\Carbon::parse($firstScan->scan)->format(
                                                                'H:i:s',
                                                            );
                                                            $days = \Carbon\Carbon::parse($firstScan->scan)->format(
                                                                'l',
                                                            );
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
                                                            $now = \Carbon\Carbon::parse($firstScan->scan)->format(
                                                                'Y-m-d',
                                                            );
                                                            $lateTime = \App\Models\Willingness::where('pin', $pin)
                                                                ->where('day_code', $dayCode)
                                                                ->where(function ($query) use ($now) {
                                                                    $query
                                                                        ->whereDate('start_date', '<=', $now)
                                                                        ->whereDate('end_date', '>=', $now);
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

                                                        @if ($times >= $resultLateTime)
                                                            @php
                                                                $increments++;
                                                            @endphp

                                                            <span>{{ $increments }}. {{ $days }} -
                                                                {{ $log->date }}
                                                                |
                                                                {{ $times }}</span> <br>
                                                        @else
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($scanlogs as $cepat)
                                                        @php
                                                            $date = $cepat->date;
                                                            $firstScan = \App\Models\ScanLog::select('scan')
                                                                ->where('pin', $user->pin)
                                                                ->whereDate('scan', '=', $date)
                                                                ->orderBy('scan', 'DESC')
                                                                ->first();
                                                            $times = \Carbon\Carbon::parse($firstScan->scan)->format(
                                                                'H:i:s',
                                                            );
                                                            $days = \Carbon\Carbon::parse($firstScan->scan)->format(
                                                                'l',
                                                            );
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
                                                            $now = \Carbon\Carbon::parse($firstScan->scan)->format(
                                                                'Y-m-d',
                                                            );
                                                            $lateTime = \App\Models\Willingness::where('pin', $pin)
                                                                ->where('day_code', $dayCode)
                                                                ->where(function ($query) use ($now) {
                                                                    $query
                                                                        ->whereDate('start_date', '<=', $now)
                                                                        ->whereDate('end_date', '>=', $now);
                                                                })
                                                                ->first();
                                                            if (!empty($lateTime)) {
                                                                $resultLateTime = \Carbon\Carbon::createFromFormat(
                                                                    'H:i:s',
                                                                    $lateTime->time_of_return,
                                                                )->format('H:i:s');
                                                            } else {
                                                                $resultLateTime = null;
                                                            }
                                                        @endphp

                                                        @if ($times < $resultLateTime)
                                                            @php
                                                                $incrementsB++;
                                                            @endphp

                                                            <span>{{ $incrementsB }}. {{ $days }} -
                                                                {{ $cepat->date }}
                                                                |
                                                                {{ $times }}</span> <br>
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
                                            <th>Pulang Cepat</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- Bootstrap 4 JS dan jQuery (opsional) -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>
