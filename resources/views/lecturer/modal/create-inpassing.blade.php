<div class="modal fade" id="createInpassing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.inpassings.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Inpassing Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="lecturer_id" value="{{ $lecturer->id }}">
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pangkat/Golongan</label>
                                <select class="form-control" name="rank_id" required>
                                    <option selected disabled>== Pilih Jenis Golongan ==</option>
                                    @foreach ($functionalRanks as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.functional-ranks.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Jenis Golongan
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
                                <label>File Inpassing</label>
                                <input type="file" class="form-control-file" name="inpassing_attachment" required>
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
