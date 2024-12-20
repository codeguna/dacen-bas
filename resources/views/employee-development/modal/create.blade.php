<div class="modal fade" id="createCertificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.employee-developments.store') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-check-circle text-primary"
                            aria-hidden="true"></i>
                        Tambah Pengembangan Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kegiatan</label>
                                <input class="form-control" name="event_name" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pemateri</label>
                                <input class="form-control" name="speaker" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tempat Kegiatan</label>
                                <input class="form-control" name="place" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Penyelenggara Acara</label>
                                <input class="form-control" name="event_organizer" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Biaya Kegiatan</label>
                                <input type="text" name="price" class="form-control" min="0"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"
                                     required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Kegiatan</label>
                                <select class="form-control" name="event_type_id" required>
                                    <option disabled selected>== Pilih Jenis Kegiatan ==</option>
                                    @foreach ($eventTypes as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Mulai</label>
                                <input class="form-control" type="date" name="start_date" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input class="form-control" type="date" name="end_date" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Sertifikat</label>
                                <input type="file" class="form-control-file" name="certificate_attachment" required>
                                <small class="form-text text-danger">*file .jpg/.pdf</small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-times"></i>
                            Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
