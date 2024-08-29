@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode Terlambat
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.scan-log.resultLate') }}" method="GET" id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h3>
                                        <i class="fa fa-th-list text-primary" aria-hidden="true"></i> Kehadiran Semua Departemen
                                    </h3>
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
                        <form action="{{ route('admin.scan-log.resultLate') }}" method="GET" id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h3>
                                        <i class="fa fa-building text-success" aria-hidden="true"></i> Kehadiran Per Departemen
                                    </h3>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <select class="form-control" name="department_id" required>
                                            <option disabled selected>== Pilih Departemen ==</option>
                                        </select>
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
                        <form action="{{ route('admin.scan-log.resultLate') }}" method="GET" id="attendanceForm">
                            <div class="row">
                                <div class="col md-12">
                                    <h3>
                                        <i class="fa fa-user-circle text-warning" aria-hidden="true"></i> Kehadiran Per Orang
                                    </h3>
                                    <div class="form-group">
                                        <label for=""></label>
                                        <select class="form-control" name="pin" required>
                                            <option disabled selected>== Pilih Nama ==</option>
                                        </select>
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
        </div>
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
    </script>
@endsection
