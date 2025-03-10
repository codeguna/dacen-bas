@extends('layouts.dashboard')
@section('template_title')
    Welcome
@endsection
@section('content')
    <div class="container-primary">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-chart-area text-primary"></i> Dashboard</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <center>
                            <h2>
                                Karyawan Presensi
                            </h2>
                        </center>
                    </div>
                    <div class="col-lg-12">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ $todayScanLogs->count() }} / {{ $users }}</h3>

                                <p>Karyawan Masuk</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                            <a href="{{ route('admin.scanlogs.detail') }}" class="small-box-footer">*Presensi dengan mesin
                                finger & karyawan aktif menggunakan Hera <i class="fas fa-arrow-circle-right"></i></a>
                        </div <div class="col-md-12">
                        <center>
                            <h2>
                                Pengajuan Presensi Luar
                            </h2>
                        </center>
                    </div>
                    <div class="col-lg-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $pendingAttendanceRequest }}</h3>

                                <p>Butuh Persetujuan</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            <a href="{{ route('admin.scan-log.view-request-attendances') }}" class="small-box-footer">Detail
                                Data <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $acceptedAttendanceRequest }}</h3>

                                <p>Sudah Disetujui</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <a href="{{ route('admin.scan-log.view-request-attendances') }}" class="small-box-footer">Detail
                                Data <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <center>
                            <h2>
                                Data Dosen/TenDik
                            </h2>
                        </center>
                    </div>
                    <div class="col-lg-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $totalDosen }}</h3>

                                <p>Jumlah Dosen</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('admin.lecturers.index') }}" class="small-box-footer">Detail Data <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalTendik }}</h3>

                                <p>Jumlah TenDik</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('admin.educational-staffs.index') }}" class="small-box-footer">Detail Data <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Dosen Aktif</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChartDosen"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-widthv>: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">TenDik Aktif</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="donutChartTendik"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-widthv>: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-cyan collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Dosen Summary</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Inpassing</th>
                                                <th>JabFung</th>
                                                <th>Sertifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dosen as $ds)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>
                                                        <a class="link-primary"
                                                            href="{{ route('admin.lecturers.show', $ds->id) }}">
                                                            {{ $ds->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $ds->inpassings->count() }}</td>
                                                    <td>{{ $ds->lecturerFunctionalPositions->count() }}</td>
                                                    <td>{{ $ds->lecturerCertificates->count() }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card-teal collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">TenDik Summary</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Sertifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tendik as $td)
                                                <tr>
                                                    <td>{{ ++$j }}</td>
                                                    <td>
                                                        <a class="link-primary"
                                                            href="{{ route('admin.educational-staffs.show', $td->id) }}">
                                                            {{ $td->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $td->educationalStaffCertificates->count() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        var donutChartCanvas = $('#donutChartDosen').get(0).getContext('2d')
        var activeCountDosen = {{ $countActiveDosen }}
        var InActiveCountDosen = {{ $countInActiveDosen }}
        var donutData = {
            labels: [
                'Active',
                'In Active',
            ],
            datasets: [{
                data: [activeCountDosen, InActiveCountDosen],
                backgroundColor: ['#0099ff', '#3d3e42'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        var donutChartCanvas = $('#donutChartTendik').get(0).getContext('2d')
        var activeCountTendik = {{ $countActiveTendik }}
        var InActiveCountTendik = {{ $countInActiveTendik }}
        var donutData = {
            labels: [
                'Active',
                'In Active',
            ],
            datasets: [{
                data: [activeCountTendik, InActiveCountTendik],
                backgroundColor: ['#0099ff', '#3d3e42'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    </script>
@endsection
