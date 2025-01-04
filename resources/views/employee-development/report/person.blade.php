<form action="{{ route('admin.employee-developments.report') }}" method="GET">
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="alert alert-warning" role="alert">
                <strong><i class="fas fa-info-circle"></i> Silahkan pilih Nama Pengguna dan Tahun</strong> untuk memulai
                pencarian data PA!
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Pengguna</label>
                <select class="form-control" name="user_id" required>
                    <option disabled selected>== Pilih Nama ==</option>
                    @foreach ($usersDepartment as $value => $key)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="implementation_year" name="year" class="form-control" min="0"
                    max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                    placeholder="Input 4-digit tahun" value="{{ request('year') }}" required>
            </div>
        </div>
        <div class="col-md-12">
            <button class="btn btn-success w-100" type="submit">
                <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
            </button>
        </div>
    </div>
</form>
<hr>
@if ($employeeDevelopmentPersons)
    @include('employee-development.table.person')
@endif
