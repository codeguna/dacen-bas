<div class="modal fade" id="createEmployeeLeave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('admin.employee-leaves.store') }}">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Cuti</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="year" value="{{ date('Y') }}">
                    <div class="row">                       
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
                            <div class="form-group">
                                <label>Jumlah Cuti</label>
                                <input class="form-control" type="number" name="amount" min="0" value="6" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
