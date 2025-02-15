<div class="modal fade" id="createReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report Data Cuti</h5>
            </div>
            <div class="modal-body">

                <form method="GET" action="{{ route('admin.employee-leaves.report-person') }}">
                    <div class="row">
                        @csrf
                        <div class="col-md-12">
                            <h3 class="text-center">Individu</h3>
                            <hr>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Karyawan</label>
                                <select class="form-control" name="pin" required>
                                    <option disabled selected>== Pilih Karyawan ==</option>
                                    @foreach ($users as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Pilih Tahun</label>
                            <select class="form-control" name="years" required>
                                <option disabled>== Pilih Tahun ==</option>
                                @foreach ($year as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-check"></i>
                                Submit</button>
                        </div>
                    </div>
                </form>
                <hr>
                <form method="GET" action="{{ route('admin.employee-leaves.report-person') }}">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="text-center">Semua Karyawan</h3>
                            <hr>
                            <label>Pilih Tahun</label>
                            <select class="form-control" name="years" required>
                                <option disabled>== Pilih Tahun ==</option>
                                @foreach ($year as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-check"></i>
                                Submit</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                    Close</button>
            </div>
        </div>

    </div>
</div>
