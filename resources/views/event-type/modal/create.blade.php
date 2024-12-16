<div class="modal fade" id="createEvent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.event-types.store') }}"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Kegiatan Baru</h5>
                </div>
                <div class="modal-body">

                   @csrf
                   <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Kegiatan</label>
                            <input class="form-control" type="text" name="name" placeholder="Input nama kegiatan ..." required>
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
