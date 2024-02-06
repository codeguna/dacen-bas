@extends('layouts.dashboard')

@section('template_title')
Presensi Saya
@endsection
@section('content')
<div class="container-fluid">
    @include('admin.users.willingness')
    <a href="#" class="float btn-primary" data-toggle="modal" data-target="#kesediaanModal"
        title="Jam Kesediaan Bekerja">
        <i class="fas fa-calendar-check my-float"></i>
    </a>
    <div class="row">        
        <div class="col-md-4">
            <div class="card bg-gradient-dark h-100">
                <div class="card-header">
                    <h2><i class="fas fa-calendar"></i> {{ date('j F Y') }}</h2>
                </div>
                <div class="card-body">
                    <h5><i class="fas fa-check-circle text-success"></i> Libur Bulan ini:</h5>
                    <small>
                        <ol>
                            @forelse ($holidays as $holiday)
                            <li>{{ \Carbon\Carbon::parse($holiday->date)->format('j F') }} - {{ $holiday->name }}</li>
                            @empty
                            <i class="fas fa-info-circle"></i> Tidak ada libur bulan ini
                            @endforelse
                        </ol>
                    </small>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-widget widget-user h-100">
                <div class="widget-user-header text-white"
                    style="background: url('https://images.pexels.com/photos/8250880/pexels-photo-8250880.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') center center;">
                    <h2 class="widget-user-desc text-right">
                        <i class="fas fa-user-clock"></i> Presensi Hari Ini
                    </h2>
                    <h3 class="widget-user-username text-right">{{ Auth::User()->name }}</h3>
                    <h5 class="widget-user-desc text-right">{{ Auth::User()->nomor_induk??'' }}</h5>
                </div>
                <div class="card-footer bg-white">
                    <div class="row">
                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Scan #1</h5>
                                <span class="description-text">@if ($scan1)
                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                    {{ \Carbon\Carbon::parse($scan1->scan)->format('H:i:s') }}
                                    @else
                                    <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                    Presensi
                                    @endif</span>
                            </div>

                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Scan #2</h5>
                                <span class="description-text">@if ($scan2)
                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                    {{ \Carbon\Carbon::parse($scan2->scan)->format('H:i:s') }}
                                    @else
                                    <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                    Presensi
                                    @endif</span>
                            </div>

                        </div>

                        <div class="col-sm-3 border-right">
                            <div class="description-block">
                                <h5 class="description-header">Scan #3</h5>
                                <span class="description-text">@if ($scan3)
                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                    {{ \Carbon\Carbon::parse($scan3->scan)->format('H:i:s') }}
                                    @else
                                    <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                    Presensi
                                    @endif</span>
                            </div>

                        </div>
                        <div class="col-sm-3">
                            <div class="description-block">
                                <h5 class="description-header">Scan #4</h5>
                                <span class="description-text">@if ($scan4)
                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                    {{ \Carbon\Carbon::parse($scan4->scan)->format('H:i:s') }}
                                    @else
                                    <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                    Presensi
                                    @endif</span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>
                        <i class="fas fa-calendar-check text-primary"></i> Akumulasi Kehadiran
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.scan-log.my-attendances-filter') }}" method="GET" id="attendanceForm">
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
                                        <button type="submit" class="btn btn-warning" type="button" id="submit_button">
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
                                                <th>
                                                    Total Hours
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $y = 1; // Inisialisasi nomor dengan 1
                                            $previousDate = null; // Inisialisasi tanggal sebelumnya
                                            $scanTimes = []; // Inisialisasi array untuk menyimpan waktu scan pada
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
                                                echo '<td>' .
                                                    formatTotalTimeInSeconds(calculateTotalHoursInSeconds($scanTimes)) .
                                                    '</td>';

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
                                                <td>{{
                                                    formatTotalTimeInSeconds(calculateTotalHoursInSeconds($scanTimes))
                                                    }}</td>
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
                                            <th>
                                                Total Hours
                                            </th>
                                            {{-- <th>Notes</th> --}}
                                        </tfoot>
                                    </table>
                                    @php
                                    // Fungsi untuk menghitung total jam kerja dari array waktu scan dalam detik
                                    function calculateTotalHoursInSeconds($times)
                                    {
                                    if (count($times) < 2) { return 0; } $firstTime=strtotime($times[0]);
                                        $lastTime=strtotime(end($times)); return $lastTime - $firstTime; } function
                                        formatTotalHours($totalSeconds) { $totalHours=$totalSeconds / 3600;
                                        $hours=floor($totalHours); $minutes=round(($totalHours - $hours) * 60); return
                                        sprintf('%02d:%02d', $hours, $minutes); } @endphp @php function
                                        calculateTotalHours($times) { if (count($times) < 2) { return '0' ; }
                                        $firstTime=strtotime($times[0]); $lastTime=strtotime(end($times));
                                        $totalSeconds=$lastTime - $firstTime; $totalHours=$totalSeconds /
                                        3600;$hours=floor($totalHours); $minutes=round(($totalHours - $hours) * 60);
                                        return sprintf('%02d:%02d', $hours, $minutes); } function
                                        formatTotalTimeInSeconds($totalSeconds) { $totalMinutes=$totalSeconds / 60;
                                        $hours=floor($totalMinutes / 60); $minutes=round($totalMinutes % 60); return
                                        sprintf('%02d:%02d', $hours, $minutes); } @endphp </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="small-box bg-primary">
                <div class="inner">
                    <p>Total jam kerja</p>
                    <h3>{{ formatTotalHours($totalHours) }}</h3>
                </div>
                <div class="icon">
                    <i class="fas fa-clock    "></i>
                </div>
                <a href="#" class="small-box-footer">Detail data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    @include('admin.users.addtional-table')
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
        const fastTable = document.getElementById('fast');
        const span = lateTable.getElementsByTagName('span');
        const spanFast = fastTable.getElementsByTagName('span');

        // Hitung jumlah elemen <i>
        const iconCount = span.length;
        const iconCountFast = spanFast.length;

        // Tampilkan jumlahnya dalam sebuah paragraf HTML
        const countParagraph = document.getElementById('count');
        const countParagraphFast = document.getElementById('countfast');
        countParagraph.textContent = `Jumlah Terlambat: ${iconCount}`;
        countParagraphFast.textContent = `Jumlah Pulang Cepat: ${iconCountFast}`;
       
</script>
@endsection