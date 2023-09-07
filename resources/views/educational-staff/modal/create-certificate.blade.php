<div class="modal fade" id="createCertificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perguruan Tinggi</label>
                                <input type="text" class="form-control" name="university_id">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenjang</label>
                                <input type="text" class="form-control" name="level_id">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <input type="text" class="form-control" name="study_program_id">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bidang Ilmu</label>
                                <input type="text" class="form-control" name="knowledge_id">
                                <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Ijazah</label>
                                <input type="file" class="form-control-file" name="" id=""
                                    placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-muted">Help text</small>
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
