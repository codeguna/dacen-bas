<div class="box box-info padding-1">
    <div class="box-body">

        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Kegiatan</label>
                    <input class="form-control" name="event_name" type="text"
                        value="{{ $employeeDevelopment->event_name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nama Pemateri</label>
                    <input class="form-control" name="speaker" type="text"
                        value="{{ $employeeDevelopment->speaker }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Kegiatan</label>
                    <input class="form-control" name="" type="text" value="{{ $employeeDevelopment->place }}"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Penyelenggara Acara</label>
                    <input class="form-control" name="event_organizer"
                        value="{{ $employeeDevelopment->event_organizer }}" type="text" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Biaya Kegiatan</label>
                    <input type="text" name="price" class="form-control" min="0"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"
                        value="{{ $employeeDevelopment->price }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jenis Kegiatan</label>
                    <select class="form-control" name="event_type_id" required>
                        @foreach ($eventTypes as $value => $key)
                            <option value="{{ $key }}"
                                {{ $employeeDevelopment->event_type_id == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Mulai</label>
                    <input class="form-control" type="date" name="start_date"
                        value="{{ $employeeDevelopment->start_date }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Selesai</label>
                    <input class="form-control" type="date" name="end_date"
                        value="{{ $employeeDevelopment->end_date }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>File Sertifikat</label>
                    <input type="file" class="form-control-file" name="certificate_attachment">
                    <small class="form-text text-danger">
                        <a
                            href="{{ url('/data_pengembangan/' . $employeeDevelopment->employeeDevelopmentMembers->certificate_attachment) }}">
                        <i class="fa fa-paperclip" aria-hidden="true"></i> {{ $employeeDevelopment->employeeDevelopmentMembers->certificate_attachment }}
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="box-footer mt20">
    <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
</div>
