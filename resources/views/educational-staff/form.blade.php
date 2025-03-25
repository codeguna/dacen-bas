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
                    <input class="form-control" type="number" min="0" name="nip" value="{{ $educationalStaff->nip?? '' }}"
                        {{ $errors->has('nip') ? ' is-invalid' : '' }} required>
                    {!! $errors->first('nip', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>            
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('Nama Lengkap') }}
                    <input type="text" name="name" class="form-control" value="{{ $educationalStaff->name??'' }}"
                        required>
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            {{-- <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('NUPTK') }}
                    <input class="form-control" type="number" name="nuptk" value="{{ $educationalStaff->nuptk }}"
                        {{ $errors->has('nuptk') ? ' is-invalid' : '' }} placeholder="Kosongkan jika tidak ada .">
                    {!! $errors->first('nuptk', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('Departemen') }}
                    <select class="form-control" name="department_id" {{ $errors->has('department_id') ? ' is-invalid' : '' }} required>
                        @if (request()->is('admin/educational-staffs/create'))
                            <option disabled selected> == Pilih Departemen == </option>
                        @else
                            @php
                                $selectedDepartmentId = $educationalStaff->department_id ?? $DeptID; // Gunakan $DeptID jika $educationalStaff->department_id null
                            @endphp
                            <option value="{{ $selectedDepartmentId }}" selected>
                                {{ $educationalStaff->departmens->short_name ?? '' }}
                            </option>
                        @endif
                    
                        @foreach ($getDepartmensId as $value => $key)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
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
                        {{ $errors->has('id_card') ? ' is-id_card' : '' }}>
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
