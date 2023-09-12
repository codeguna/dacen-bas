<div class="modal fade" id="createCertificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.lecturer-certificates.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Sertifikat Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="lecturer_id" value="{{ $lecturer->id }}">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Sertifikat</label>
                                <select class="form-control" name="certificate_types_id" required>
                                    <option selected disabled>== Pilih Jenis Sertifikat ==</option>
                                    @foreach ($certificateTypes as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.certificate-types.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Jenis Sertifikat
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Sertifikat</label>
                                <input type="date" class="form-control" name="certificate_date" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" class="form-control" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Ijazah</label>
                                <input type="file" class="form-control-file" name="certificate_attachment" required>
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
