@extends('layouts.dashboard')

@section('template_title')
    Import Presensi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fa fa-database text-primary" aria-hidden="true"></i> Import Presensi
                        </h3>                        
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <strong><i class="fa fa-info-circle" aria-hidden="true"></i> Perhatian</strong> <br>
                            <p>Sebelum submit silahkan double check data, karena tidak bisa dibatalkan setelah proses ini dilakukan! <hr>
                                Klik tombol dibawah ini untuk memulai
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <a class="btn btn-outline-success w-100" data-toggle="modal" data-target="#presensiModal"><i class="fas fa-plus"></i>
                                    Presensi
                                </a>
                                @include('scan-log.modal.presensi')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection