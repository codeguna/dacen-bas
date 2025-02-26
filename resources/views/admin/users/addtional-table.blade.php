<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="terlambat-tab" data-toggle="tab" data-target="#terlambat"
                                type="button" role="tab">
                                <small><i class="fa fa-times text-danger"></i> Datang Terlambat</small>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pulang-cepat-tab" data-toggle="tab" data-target="#pulang-cepat"
                                type="button" role="tab">
                                <small><i class="fa fa-bolt text-warning"></i> Pulang Cepat</small>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="hari-libur-tab" data-toggle="tab" data-target="#hari-libur"
                                type="button" role="tab">
                                <small><i class="fas fa-star text-success"></i> Hari Libur</small>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tidak-hadir-tab" data-toggle="tab" data-target="#tidak-hadir"
                                type="button" role="tab">
                                <small><i class="fa fa-calendar-times text-primary" aria-hidden="true"></i> Ketidakhadiran</small>
                            </button>
                        </li>
                    </ul>
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="terlambat" role="tabpanel">
                        <div class="alert alert-warning" role="alert">
                            <strong>
                                <i class="fas fa-clock"></i> Toleransi terlambat 10 menit
                            </strong>
                        </div>
                        <div class="table-responsive">
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
                                                ->orderBy('scan', 'ASC')
                                                ->first();
                                            $times = \Carbon\Carbon::parse($firstScan->scan)->format('H:i:s');
                                            $days = date('l', strtotime($firstScan->scan));
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
                                            $now = \Carbon\Carbon::parse($firstScan->scan)->format('Y-m-d');
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
                                        <tr>
                                            @if ($resultLateTime == null)
                                            @elseif ($times >= $resultLateTime)
                                                <td>
                                                    {{ $days }} | {{ $late->date }}
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
                    <div class="tab-pane fade" id="pulang-cepat" role="tabpanel">
                        <div class="alert alert-info" role="alert">
                            <strong>
                                <i class="fas fa-clock"></i> Pulang sebelum dari waktu kesediaan
                            </strong>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" id="fast">
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
                                                ->orderBy('scan', 'DESC')
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
                                        <tr>
                                            @if ($resultLateTime == null)
                                            @elseif ($times < $resultLateTime)
                                                @if ($now == date('Y-m-d'))
                                                @else
                                                    <td>
                                                        {{ $days }} | {{ $late->date }}
                                                    </td>
                                                    <td>
                                                        <span><i class="fa fa-info-circle text-warning"
                                                                aria-hidden="true"></i>
                                                            {{ $times }}</span>
                                                    </td>
                                                @endif
                                            @else
                                            @endif
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <th><i class="fas fa-calendar"></i> Tanggal</th>
                                    <th><i class="fas fa-clock"></i> Jam</th>
                                </tfoot>
                            </table>
                            <hr>
                            <strong>
                                <p id="countfast"></p>
                            </strong>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="hari-libur" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card bg-gradient-dark h-100">
                                    <div class="card-header">
                                        <h2><i class="fas fa-calendar"></i> {{ date('j F Y') }}</h2>
                                    </div>
                                    <div class="card-body">
                                        <h5><i class="fas fa-check-circle text-success"></i> Libur Bulan ini:</h5>
                                        <small>
                                            <ol>
                                                @forelse ($holidays as $holiday)
                                                    <li>{{ \Carbon\Carbon::parse($holiday->date)->format('j F') }} -
                                                        {{ $holiday->name }}</li>
                                                @empty
                                                    <i class="fas fa-info-circle"></i> Tidak ada libur bulan ini
                                                @endforelse
                                            </ol>
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tidak-hadir" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card bg-gradient-light h-100">
                                    <div class="card-header">
                                        <h2><i class="fa fa-calendar-minus" aria-hidden="true"></i> Daftar Tidak Hadir:</h2>
                                    </div>
                                    <div class="card-body">
                                        <small>
                                            <ol>
                                                @forelse ($notScans as $notscan)
                                                    <li>{{ \Carbon\Carbon::parse($notscan->date)->format('j F') }} -
                                                        {{ $notscan->reason->name }}</li>
                                                @empty
                                                    <i class="fas fa-info-circle"></i> Tidak ada data ketidakhadiran
                                                @endforelse
                                            </ol>
                                        </small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
