<form action="{{ route('admin.job-applicants.result-all-applicant') }}" method="GET">
    @csrf
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Semua Pegawai</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Awal</label>
                            <input class="form-control" type="date" name="start_date" value="{{ request('start_date') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input class="form-control" type="date" name="end_date" {{ request('end_date') }} required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-sm-12">
                    <div class="form-group">
                        <button class="btn btn-primary w-100" type="submit">
                            <i class="fas fa-search"></i> Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
