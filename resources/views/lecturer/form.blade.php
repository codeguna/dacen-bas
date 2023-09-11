<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <input type="hidden" name="status" value="1">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('NIDN/NIDK') }}
                    <input class="form-control {{ $errors->has('nidn') ? ' is-invalid' : '' }}" type="text"
                        name="nidn" value="{{ $lecturer->nidn }}" required>
                    {!! $errors->first('nidn', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nama Lengkap') }}
                    <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"
                        name="name" value="{{ $lecturer->name }}" required>
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Homebase</label>
                    <select class="form-control {{ $errors->has('homebase_id') ? ' is-invalid' : '' }}"
                        name="homebase_id" required>
                        @if (request()->is('admin/lecturers/create'))
                            <option disabled selected>
                                == Pilih Homebase ==
                            </option>
                        @else
                            <option value="{{ $lecturer->homebase_id }}" selected>
                                {{ $lecturer->homebases->name }}
                            </option>
                        @endif
                        @foreach ($homebases as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Tanggal Masuk') }}
                    <input class="form-control {{ $errors->has('appointment_date') ? ' is-invalid' : '' }}"
                        type="date" name="appointment_date" value="{{ $lecturer->appointment_date }}" required>
                    {!! $errors->first('appointment_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Upload KTP') }} <br>
                    <input class="form-control-file" type="file" name="id_card"
                        {{ $errors->has('id_card') ? ' is-id_card' : '' }} required>
                    {!! $errors->first('id_card', '<div class="invalid-feedback">:message</div>') !!}
                    <small class="text-danger">
                        *Maksimum ukuran file 2mb, jenis file: *pdf, *jpg, *jpeg
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
