<div class="modal fade" id="createJabfung" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lecturer-functional-positions.store') }}"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan Fungsional Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="lecturer_id" value="{{ $lecturer->id }}">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Jabatan Fungsional</label>
                                <select class="form-control" name="functional_position_id" required>
                                    <option selected disabled>== Pilih Nama JabFung ==</option>
                                    @foreach ($functionalPositions as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.functional-positions.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Nama JabFung baru
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Penetapan</label>
                                <input type="date" class="form-control" name="determination_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>TMT</label>
                                <input type="date" class="form-control" name="tmt" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Angka Kredit</label>
                                <input type="number" class="form-control" name="credit_score" min="0" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Inpassing</label>
                                <input type="file" class="form-control-file" name="functional_position_attachment"
                                    required>
                                <small class="form-text text-danger">*Jenis file .pdf, .jpg
                                    maksimal 2MB</small>
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
