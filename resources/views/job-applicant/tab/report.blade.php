<div class="col-md-12 mt-2">
    <hr>

</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">Periode atau Departemen</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Awal</label>
                        <input class="form-control" type="date" name="start_date" value="{{ request('start_date') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input class="form-control" type="date" name="end_date" {{ request('end_date') }}>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Departemen</label>
                        <select class="form-control" name="department">
                            <option disabled selected>== Pilih Departemen ==</option>
                            @foreach ($departments as $value => $key)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-outline-primary w-100" type="submit">
                        <i class="fas fa-search"></i> Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
