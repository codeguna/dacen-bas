@extends('layouts.dashboard')

@section('template_title')
    Dashboard Jabatan Akademik
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-th-list"></i> Jabatan Akademik
                        </h3>
                    </div>
                    <img class="card-img-top" src="holder.js/100x180/" alt="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Keseluruhan</h4>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>0</h3>
                                        <p>Tenaga Pengajar</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Detail data <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3>{{ $lecturer_AsistenAhli }}</h3>
                                        <p>Asisten Ahli</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tag"></i>
                                    </div>
                                    <a href="{{ route('admin.dashboard.get-jabatan-akademik', $jabatan['asistenAhli']) }}"
                                        class="small-box-footer">
                                        Detail data <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6">
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3>{{ $lecturer_lektor }}</h3>
                                        <p>Lektor</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tag"></i>
                                    </div>
                                    <a href="{{ route('admin.dashboard.get-jabatan-akademik',$jabatan['lektor']) }}" class="small-box-footer">
                                        Detail data <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="small-box bg-lightblue">
                                    <div class="inner">
                                        <h3>{{ $lecturer_lektorKepala }}</h3>
                                        <p>Lektor Kepala</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tag"></i>
                                    </div>
                                    <a href="{{ route('admin.dashboard.get-jabatan-akademik',$jabatan['lektorKepala']) }}" class="small-box-footer">
                                        Detail data <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="small-box bg-navy">
                                    <div class="inner">
                                        <h3>{{ $lecturer_guruBesar }}</h3>
                                        <p>Guru Besar</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tag text-white"></i>
                                    </div>
                                    <a href="{{ route('admin.dashboard.get-jabatan-akademik',$jabatan['guruBesar']) }}" class="small-box-footer">
                                        Detail data <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Per Prodi</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-olive">
                                        <h4 class="widget-user-username">Jabatan Akademik</h4>
                                        <h5 class="widget-user-desc">Administrasi Bisnis (D3)</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Tenaga Pengajar <span class="float-right badge bg-danger">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Asisten Ahli <span
                                                        class="float-right badge bg-warning">{{ $d3AB_lecturer_AsistenAhli }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor <span
                                                        class="float-right badge bg-teal">{{ $d3AB_lecturer_lektor }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor Kepala <span
                                                        class="float-right badge bg-lightblue">{{ $d3AB_lecturer_lektorKepala }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Guru Besar <span
                                                        class="float-right badge bg-navy">{{ $d3AB_lecturer_guruBesar }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-teal">
                                        <h4 class="widget-user-username">Jabatan Akademik</h4>
                                        <h5 class="widget-user-desc">Administrasi Bisnis (S1)</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Tenaga Pengajar <span class="float-right badge bg-danger">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Asisten Ahli <span
                                                        class="float-right badge bg-warning">{{ $s1AB_lecturer_AsistenAhli }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor <span
                                                        class="float-right badge bg-teal">{{ $s1AB_lecturer_lektor }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor Kepala <span
                                                        class="float-right badge bg-lightblue">{{ $s1AB_lecturer_lektorKepala }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Guru Besar <span
                                                        class="float-right badge bg-navy">{{ $s1AB_lecturer_guruBesar }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <h4 class="widget-user-username">Jabatan Akademik</h4>
                                        <h5 class="widget-user-desc">Komputerisasi Akuntansi (D3)</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Tenaga Pengajar <span class="float-right badge bg-danger">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Asisten Ahli <span
                                                        class="float-right badge bg-warning">{{ $d3KA_lecturer_AsistenAhli }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor <span
                                                        class="float-right badge bg-teal">{{ $d3KA_lecturer_lektor }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor Kepala <span
                                                        class="float-right badge bg-lightblue">{{ $d3KA_lecturer_lektorKepala }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Guru Besar <span
                                                        class="float-right badge bg-navy">{{ $d3KA_lecturer_guruBesar }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-orange">
                                        <h4 class="widget-user-username">Jabatan Akademik</h4>
                                        <h5 class="widget-user-desc">Akuntansi (S1)</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Tenaga Pengajar <span class="float-right badge bg-danger">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Asisten Ahli <span
                                                        class="float-right badge bg-warning">{{ $s1KA_lecturer_AsistenAhli }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor <span
                                                        class="float-right badge bg-teal">{{ $s1KA_lecturer_lektor }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor Kepala <span
                                                        class="float-right badge bg-lightblue">{{ $s1KA_lecturer_lektorKepala }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Guru Besar <span
                                                        class="float-right badge bg-navy">{{ $s1KA_lecturer_guruBesar }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-lightblue">
                                        <h4 class="widget-user-username">Jabatan Akademik</h4>
                                        <h5 class="widget-user-desc">Sistem Informasi (S1)</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Tenaga Pengajar <span class="float-right badge bg-danger">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Asisten Ahli <span
                                                        class="float-right badge bg-warning">{{ $s1SI_lecturer_AsistenAhli }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor <span
                                                        class="float-right badge bg-teal">{{ $s1SI_lecturer_lektor }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor Kepala <span
                                                        class="float-right badge bg-lightblue">{{ $s1SI_lecturer_lektorKepala }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Guru Besar <span
                                                        class="float-right badge bg-navy">{{ $s1SI_lecturer_guruBesar }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h4 class="widget-user-username">Jabatan Akademik</h4>
                                        <h5 class="widget-user-desc">Teknik Informatika (S1)</h5>
                                    </div>
                                    <div class="card-footer p-0">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Tenaga Pengajar <span class="float-right badge bg-danger">0</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Asisten Ahli <span
                                                        class="float-right badge bg-warning">{{ $s1TI_lecturer_AsistenAhli }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor <span
                                                        class="float-right badge bg-teal">{{ $s1TI_lecturer_lektor }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Lektor Kepala <span
                                                        class="float-right badge bg-lightblue">{{ $s1TI_lecturer_lektorKepala }}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    Guru Besar <span
                                                        class="float-right badge bg-navy">{{ $s1TI_lecturer_guruBesar }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
