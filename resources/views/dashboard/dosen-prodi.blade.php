@extends('layouts.dashboard')

@section('template_title')
    Departmen
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-chart-area"></i> Dosen Per Prodi
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-purple"><i class="far fa-envelope"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Sistem Informasi (S1)</span>
                                        <span class="info-box-number">
                                            <i class="fas fa-user-graduate"></i> {{ $s1SistemInformasiLecture->count() }}
                                        </span>
                                    </div>
                                </div> 
                                <div class="card card-purple collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Nama Dosen</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                       <ol>
                                        @foreach ( $s1SistemInformasiLecture as $s1SiLecture )
                                           <li>{{ $s1SiLecture->name }}</li> 
                                        @endforeach                                        
                                       </ol>
                                    </div>
                                </div>                                   
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-primary"><i class="far fa-envelope"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Teknik Informatika (S1)</span>
                                        <span class="info-box-number">
                                            <i class="fas fa-user-graduate"></i> {{ $s1TeknikInformatikaLecture->count() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card card-primary collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Nama Dosen</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                       <ol>
                                        @foreach ( $s1TeknikInformatikaLecture as $s1IfLecture )
                                           <li>{{ $s1IfLecture->name }}</li> 
                                        @endforeach                                        
                                       </ol>
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-teal"><i class="far fa-envelope"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Administrasi Bisnis (S1)</span>
                                        <span class="info-box-number">
                                            <i class="fas fa-user-graduate"></i> {{ $s1AdbisLecture->count() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card card-teal collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Nama Dosen</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                       <ol>
                                        @foreach ( $s1AdbisLecture as $s1AbLecture )
                                           <li>{{ $s1AbLecture->name }}</li> 
                                        @endforeach                                        
                                       </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-orange"><i class="far fa-envelope"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Akuntansi (S1)</span>
                                        <span class="info-box-number">
                                            <i class="fas fa-user-graduate"></i> {{ $s1AkuntansiLecture->count() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card card-orange collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Nama Dosen</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                       <ol>
                                        @foreach ( $s1AkuntansiLecture as $s1AkLecture )
                                           <li>{{ $s1AkLecture->name }}</li> 
                                        @endforeach                                        
                                       </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-envelope"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Komputerisasi Akuntansi (D3)</span>
                                        <span class="info-box-number">
                                            <i class="fas fa-user-graduate"></i> {{ $d3AkuntansiLecture->count() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card card-warning collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Nama Dosen</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                       <ol>
                                        @foreach ( $d3AkuntansiLecture as $d3AkLecture )
                                           <li>{{ $d3AkLecture->name }}</li> 
                                        @endforeach                                        
                                       </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-olive"><i class="far fa-envelope"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Administrasi Bisnis (D3)</span>
                                        <span class="info-box-number">
                                            <i class="fas fa-user-graduate"></i> {{ $d3AdbisLecture->count() }}
                                        </span>
                                    </div>
                                </div>
                                <div class="card card-olive collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">Daftar Nama Dosen</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                    class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                       <ol>
                                        @foreach ( $d3AdbisLecture as $d3AbLecture )
                                           <li>{{ $d3AbLecture->name }}</li> 
                                        @endforeach                                        
                                       </ol>
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
