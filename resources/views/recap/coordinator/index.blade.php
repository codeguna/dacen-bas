@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode Kehadiran
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-toggle="tab" data-target="#kehadiran" type="button"
                            role="tab" aria-controls="home" aria-selected="true">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> Kehadiran
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-toggle="tab" data-target="#ketidakhadiran" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fa fa-user-times" aria-hidden="true"></i> Ketidakhadiran
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="kehadiran" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            @if (Auth::user()->email != 'abang@lpkia.ac.id')
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.scan-log.recap-department-presences') }}"
                                            method="GET">
                                            <div class="row">
                                                <div class="col md-12">
                                                    <h3>
                                                        <i class="fa fa-building text-success" aria-hidden="true"></i>
                                                        Per
                                                        Departemen
                                                    </h3>
                                                    <div class="form-group">
                                                        <label>Departemen</label>
                                                        <select class="form-control" name="department_id" required>                                                            
                                                            <option value="{{ $department }}" selected>
                                                                {{ Auth::User()->department->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Jumlah Hari Kerja</label>
                                                                <input type="number" class="form-control" name="total_day"
                                                                    required>
                                                                <small class="form-text text-info">Total Hari Kerja dalam 1
                                                                    periode</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Jumlah Jam Kerja</label>
                                                                <input type="number" class="form-control" name="total_hour"
                                                                    required>
                                                                <small class="form-text text-info">Total Jumlah Kerja dalam
                                                                    1
                                                                    periode</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <h4>
                                                        Tanggal Awal / Tanggal Akhir
                                                    </h4>
                                                    <div class="input-group">
                                                        <input class="form-control" type="date" name="start_date"
                                                            id="start_date" value="{{ request('start_date') }}" required>
                                                        <input class="form-control" type="date" name="end_date"
                                                            id="end_date" value="{{ request('end_date') }}" required>
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
                            @endif                            
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.scan-log.recap-individual-presences') }}"
                                            method="GET">
                                            <div class="row">
                                                <div class="col md-12">
                                                    <h3>
                                                        <i class="fa fa-user-circle text-warning" aria-hidden="true"></i>
                                                        Per
                                                        Orang
                                                    </h3>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <select class="form-control" name="pin">
                                                            <option disabled selected>== Pilih Nama ==</option>
                                                            @foreach ($users as $value => $key)
                                                                <option value="{{ $key }}">{{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <h4>
                                                        Tanggal Awal / Tanggal Akhir
                                                    </h4>
                                                    <div class="input-group">
                                                        <input class="form-control" type="date" name="start_date"
                                                            id="start_date" value="{{ request('start_date') }}" required>
                                                        <input class="form-control" type="date" name="end_date"
                                                            id="end_date" value="{{ request('end_date') }}" required>
                                                        <p id="date_error" style="color: red;"></p>
                                                        <button type="submit" class="ml-1 btn btn-warning"
                                                            type="button" id="submit_button">
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
                    <div class="tab-pane" id="ketidakhadiran" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            @if (Auth::user()->email != 'abang@lpkia.ac.id')
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.not-scan-log.recap-department-not-presences') }}"
                                            method="GET">
                                            <div class="row">
                                                <div class="col md-12">
                                                    <h3>
                                                        <i class="fa fa-building text-success" aria-hidden="true"></i>
                                                        Per
                                                        Departemen
                                                    </h3>
                                                    <div class="form-group">
                                                        <label>Departemen</label>
                                                        <select class="form-control" name="department_id" required>
                                                            <option value="{{ $department }}" selected>
                                                                {{ Auth::User()->department->name }}
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                    </div>
                                                    <h4>
                                                        Tanggal Awal / Tanggal Akhir
                                                    </h4>
                                                    <div class="input-group">
                                                        <input class="form-control" type="date" name="start_date"
                                                            id="start_date" value="{{ request('start_date') }}" required>
                                                        <input class="form-control" type="date" name="end_date"
                                                            id="end_date" value="{{ request('end_date') }}" required>
                                                        <p id="date_error" style="color: red;"></p>
                                                        <button type="submit" class="ml-1 btn btn-warning"
                                                            type="button" id="submit_button">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif                            
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admin.not-scan-log.recap-individual-not-presences') }}"
                                            method="GET">
                                            <div class="row">
                                                <div class="col md-12">
                                                    <h3>
                                                        <i class="fa fa-user-circle text-warning" aria-hidden="true"></i>
                                                        Per
                                                        Orang
                                                    </h3>
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <select class="form-control" name="pin" required>
                                                            <option disabled selected>== Pilih Nama ==</option>
                                                            @foreach ($users as $value => $key)
                                                                <option value="{{ $key }}">{{ $value }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                    </div>
                                                    <h4>
                                                        Tanggal Awal / Tanggal Akhir
                                                    </h4>
                                                    <div class="input-group">
                                                        <input class="form-control" type="date" name="start_date"
                                                            id="start_date" value="{{ request('start_date') }}" required>
                                                        <input class="form-control" type="date" name="end_date"
                                                            id="end_date" value="{{ request('end_date') }}" required>
                                                        <p id="date_error" style="color: red;"></p>
                                                        <button type="submit" class="ml-1 btn btn-warning"
                                                            type="button" id="submit_button">
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
                </div>
            </div>
        </div>
    </div>
@endsection
