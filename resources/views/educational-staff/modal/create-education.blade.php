<div class="modal fade" id="createEducation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('admin.educational-staff-educations.store') }}"
            enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pendidikan Baru</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}
                    <input type="hidden" name="educational_staff_id" value="{{ $educationalStaff->id }}">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Perguruan Tinggi</label>
                                <select class="form-control" name="university_id" required>
                                    <option disabled selected>== Pilih PT ==</option>
                                    @foreach ($universities as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.universities.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Universitas
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenjang</label>
                                <select class="form-control" name="level_id" required>
                                    <option disabled selected>== Pilih Jenjang ==</option>
                                    @foreach ($levels as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.levels.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Jenjang
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Program Studi</label>
                                <select class="form-control" name="study_program_id" required>
                                    <option disabled selected>== Pilih Program Studi ==</option>
                                    @foreach ($studyPrograms as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.study-programs.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Program Studi
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bidang Ilmu</label>
                                <select class="form-control" name="knowledge_id" required>
                                    <option disabled selected>== Pilih Bidang Ilmu ==</option>
                                    @foreach ($studyPrograms as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <small class="text-warning">
                                    <a href="{{ route('admin.knowledges.create') }}" target="_blank">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Tambahkan Bidang Ilmu
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Ijazah</label>
                                <input type="file" class="form-control-file" name="certificate" required>
                                <small id="fileHelpId" class="form-text text-muted">*Jenis file .pdf, .jpg
                                    maksimal</small>
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
