@extends('layouts.dashboard')

@section('template_title')
    Pilih Tanggal Scan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-calendar-alt"></i> Pilih Tanggal Presensi
                        </h3>
                        <div class="alert alert-info" role="alert">
                            <strong><i class="fas fa-info-circle"></i> Pilih 1 tanggal</strong> untuk memuat ulang presensi
                            karyawan yang hilang !
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.proceed-missing-date') }}" method="POST">
                            <div class="row">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input class="form-control" type="date" name="date" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary w-100" type="submit">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
