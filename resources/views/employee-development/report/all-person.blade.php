    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="alert alert-warning" role="alert">
                <strong><i class="fas fa-info-circle"></i> Silahkan pilih Bulan dan Tahun</strong> untuk memulai pencarian data PA!
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input class="form-control" type="date" name="start_date" value="{{ request('start_date') }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Tanggal Akhir</label>
                <input class="form-control" type="date" name="end_date" value="{{ request('end_date') }}" required>
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="implementation_year" name="year" class="form-control" min="0"
                    max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                    placeholder="Input 4-digit tahun" value="{{ request('year') }}" required>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-success w-100">
                <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
            </button>
        </div>
    </div>
<hr>
@if ($employeeDevelopmentAll)
    @include('employee-development.table.all-person')
@endif
