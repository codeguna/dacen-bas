<?php

// Get the current year
$currentYear = date('Y');

// Extract the last two digits
$lastTwoDigits = substr($currentYear, -2);

?>
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('NIP') }}
                    <input class="form-control" type="text" name="nip" value="{{ $educationalStaff->nip }}"
                        {{ $errors->has('nip') ? ' is-invalid' : '' }} required>
                    {!! $errors->first('nip', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nama Lengkap') }}
                    <input type="text" name="name" class="form-control" value="{{ $educationalStaff->name }}"
                        required>
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Departemen') }}
                    <select class="form-control" name="department_id"
                        {{ $errors->has('department_id') ? ' is-invalid' : '' }} required>
                        <option disabled selected>{{ $educationalStaff->departmens->short_name }}</option>
                        @foreach ($getDepartmensId as $value => $key)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('department_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Tanggal Masuk') }}
                    <input class="form-control" type="date" name="date_of_entry"
                        value="{{ $educationalStaff->date_of_entry }}"
                        {{ $errors->has('date_of_entry') ? ' is-invalid' : '' }} required>
                    {!! $errors->first('date_of_entry', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <input type="hidden" name="status" value="1">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Upload KTP') }} <br>
                    <input class="form-control-file" type="file" name="id_card"
                        {{ $errors->has('date_of_entry') ? ' is-id_card' : '' }} required>
                    {!! $errors->first('id_card', '<div class="invalid-feedback">:message</div>') !!}
                    <small class="text-danger">
                        *Maksimum ukuran file 2mb, jenis file: *pdf, *jpg, *jpeg
                    </small>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Submit') }}
        </button>
    </div>
</div>
