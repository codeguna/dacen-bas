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
                        <h2><i class="fas fa-user-clock"></i> Presensi Saya</h2>
                    </div>
                    <div class="card-body">
                        <div class="responsive-table">
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
                                                {{ $scan1->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan2)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan2->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan3)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan3->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            @if ($scan4)
                                                <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                {{ $scan4->scan }}
                                            @else
                                                <i class="fa fa-times-circle text-danger" aria-hidden="true"></i> Belum
                                                Presensi
                                            @endif
                                        </td>
                                        <td>
                                            <i class="fas fa-clock text-warning"></i>
                                            @php
                                                $total_hour = 0;
                                                $scans = [$scan1, $scan2, $scan3, $scan4];

                                                // Menggunakan timestamp scan pertama sebagai jam awal
                                                $start_time = $scan1 ? strtotime($scan1->scan) : null;
                                                $end_time = null;

                                                // Menyimpan selisih waktu dalam jam
                                                foreach ($scans as $scan) {
                                                    if ($scan) {
                                                        $end_time = strtotime($scan->scan);
                                                        $hour_diff = ($end_time - $start_time) / 3600;
                                                        $total_hour += $hour_diff;
                                                        $start_time = $end_time;
                                                    }
                                                }

                                                echo number_format($total_hour, 1) . ' jam';
                                            @endphp
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
