                    <div class="row">
                        <input type="hidden" name="letter_type"
                            @if ($letter->letter_type == 1) value="1"
                        @elseif ($letter->letter_type == 0)
                        value="0" @endif>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Surat
                                    @if ($letter->letter_type == 1)
                                        Masuk
                                    @elseif ($letter->letter_type == 0)
                                        Keluar
                                    @endif
                                </label>
                                <input type="text" class="form-control" name="letter_number"
                                    value="{{ $letter->letter_number }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Surat
                                    @if ($letter->letter_type == 1)
                                        Masuk
                                    @elseif ($letter->letter_type == 0)
                                        Keluar
                                    @endif
                                </label>
                                <input type="date" class="form-control" name="date" value="{{ $letter->date }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Surat Dari</label>
                                <input type="text" class="form-control" name="from" value="{{ $letter->from }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Perihal</label>
                                <input type="text" class="form-control" name="title" value="{{ $letter->title }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Surat</label>
                                <select class="form-control" name="type_letter_id" required>
                                    <option value="{{ $letter->type_letter_id }}" selected>
                                        {{ $letter->typeLetter->name }}</option>
                                    @foreach ($typeLetters as $value => $key)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>File Surat</label>
                                <input type="file" class="form-control-file" name="file">
                                <small class="badge bg-info">*{{ $letter->file }}</small><br>
                                <small class="text-danger">*Jenis file *jpeg/jpg/pdf maks. 2MB</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success">
                                <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                            </button>
                        </div>
                    </div>
