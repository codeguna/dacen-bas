@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode Kehadiran
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.recap-all-presences') }}" method="GET">
                            <div class="row">
                                <div class="col md-12">
                                    <h3>
                                        <i class="fa fa-th-list text-primary" aria-hidden="true"></i> Kehadiran Semua
                                        Departemen
                                    </h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Hari Kerja</label>
                                                <input type="number" class="form-control" name="total_day" required>
                                                <small class="form-text text-info">Total Hari Kerja dalam 1
                                                    periode</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Jam Kerja</label>
                                                <input type="number" class="form-control" name="total_hour" required>
                                                <small class="form-text text-info">Total Jumlah Kerja dalam 1
                                                    periode</small>
                                            </div>
                                        </div>
                                    </div>

                                    <h4>
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" required>
                                        <input class="form-control" type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" required>
                                        <p id="date_error" style="color: red;"></p>
                                        <button type="submit" class="ml-1 btn btn-warning" type="button"
                                            id="submit_button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.recap-department-presences') }}" method="GET">
                            <div class="row">
                                <div class="col md-12">
                                    <h3>
                                        <i class="fa fa-building text-success" aria-hidden="true"></i> Kehadiran Per
                                        Departemen
                                    </h3>
                                    <div class="form-group">
                                        <label>Departemen</label>
                                        <select class="form-control" name="department_id" required>
                                            <option disabled selected>== Pilih Departemen ==</option>
                                            @foreach ($departments as $value => $key)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Hari Kerja</label>
                                                <input type="number" class="form-control" name="total_day" required>
                                                <small class="form-text text-info">Total Hari Kerja dalam 1
                                                    periode</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Jam Kerja</label>
                                                <input type="number" class="form-control" name="total_hour" required>
                                                <small class="form-text text-info">Total Jumlah Kerja dalam 1
                                                    periode</small>
                                            </div>
                                        </div>
                                    </div>
                                    <h4>
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" required>
                                        <input class="form-control" type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" required>
                                        <p id="date_error" style="color: red;"></p>
                                        <button type="submit" class="ml-1 btn btn-warning" type="button"
                                            id="submit_button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.recap-individual-presences') }}" method="GET">
                            <div class="row">
                                <div class="col md-12">
                                    <h3>
                                        <i class="fa fa-user-circle text-warning" aria-hidden="true"></i> Kehadiran Per
                                        Orang
                                    </h3>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <select class="form-control" name="pin">
                                            <option disabled selected>== Pilih Nama ==</option>
                                            @foreach ($users as $value => $key)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>Nama Khusus</label>
                                        <select class="form-control" name="pin">
                                            <option disabled selected>== Pilih Nama ==</option>
                                                <option value="61">Rini Ratnaningsih</option>
                                                <option value="600">Hamidah</option>
                                                <option value="50">Tuti Sulastri</option>
                                        </select>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Hari Kerja</label>
                                                <input type="number" class="form-control" name="total_day" required>
                                                <small class="form-text text-info">Total Hari Kerja dalam 1
                                                    periode</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Jam Kerja</label>
                                                <input type="number" class="form-control" name="total_hour" required>
                                                <small class="form-text text-info">Total Jumlah Kerja dalam 1
                                                    periode</small>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <h4>
                                        Tanggal Awal / Tanggal Akhir
                                    </h4>
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start_date" id="start_date"
                                            value="{{ request('start_date') }}" required>
                                        <input class="form-control" type="date" name="end_date" id="end_date"
                                            value="{{ request('end_date') }}" required>
                                        <p id="date_error" style="color: red;"></p>
                                        <button type="submit" class="ml-1 btn btn-warning" type="button"
                                            id="submit_button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
