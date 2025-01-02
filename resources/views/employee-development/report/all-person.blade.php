<form action="{{ route('admin.employee-developments.report') }}" method="GET">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="alert alert-warning" role="alert">
                <strong><i class="fas fa-info-circle"></i> Silahkan pilih Bulan dan Tahun</strong> untuk memulai pencarian data PA!
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Bulan</label>
                <select class="form-control" name="period" required>
                    <option disabled selected>== Pilih Bulan ==</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="implementation_year" name="year" class="form-control" min="0"
                    max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                    placeholder="Input 4-digit tahun" required>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-success w-100">
                <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
            </button>
        </div>
    </div>
</form>
<hr>
@if ($employeeDevelopmentDepartments)
    @include('employee-development.table.all-person')
@endif
