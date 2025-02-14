<div class="modal fade" id="createNotScan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.not-scan-logs.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Ketidakhadiran Baru</h5>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <select class="form-control" name="pin" required>
                                    <option disabled selected>== Pilih Nama ==</option>
                                    @foreach ($users as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal</label>
                            <input class="form-control" type="date" name="date" required>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alasan Tidak Hadir</label>
                                <select class="form-control" name="reason_id" required>
                                    <option disabled selected>== Pilih Alasan ==</option>
                                    @foreach ($reasons as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Note</label>
                            <textarea class="form-control" name="note" cols="30" rows="5" required></textarea>
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
