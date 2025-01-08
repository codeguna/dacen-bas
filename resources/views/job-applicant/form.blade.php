<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('job_vacancies_id') }}
            {{ Form::text('job_vacancies_id', $jobApplicant->job_vacancies_id, ['class' => 'form-control' . ($errors->has('job_vacancies_id') ? ' is-invalid' : ''), 'placeholder' => 'Job Vacancies Id']) }}
            {!! $errors->first('job_vacancies_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('full_name') }}
            {{ Form::text('full_name', $jobApplicant->full_name, ['class' => 'form-control' . ($errors->has('full_name') ? ' is-invalid' : ''), 'placeholder' => 'Full Name']) }}
            {!! $errors->first('full_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('front_title') }}
            {{ Form::text('front_title', $jobApplicant->front_title, ['class' => 'form-control' . ($errors->has('front_title') ? ' is-invalid' : ''), 'placeholder' => 'Front Title']) }}
            {!! $errors->first('front_title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('back_title') }}
            {{ Form::text('back_title', $jobApplicant->back_title, ['class' => 'form-control' . ($errors->has('back_title') ? ' is-invalid' : ''), 'placeholder' => 'Back Title']) }}
            {!! $errors->first('back_title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gender') }}
            {{ Form::text('gender', $jobApplicant->gender, ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'Gender']) }}
            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('born_place') }}
            {{ Form::text('born_place', $jobApplicant->born_place, ['class' => 'form-control' . ($errors->has('born_place') ? ' is-invalid' : ''), 'placeholder' => 'Born Place']) }}
            {!! $errors->first('born_place', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('born_date') }}
            {{ Form::text('born_date', $jobApplicant->born_date, ['class' => 'form-control' . ($errors->has('born_date') ? ' is-invalid' : ''), 'placeholder' => 'Born Date']) }}
            {!! $errors->first('born_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_of _application') }}
            {{ Form::text('date_of _application', $jobApplicant->date_of _application, ['class' => 'form-control' . ($errors->has('date_of _application') ? ' is-invalid' : ''), 'placeholder' => 'Date Of  Application']) }}
            {!! $errors->first('date_of _application', '<div class="invalid-feedback">:message</div>') !!}
        </div>
{{-- <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="level">Jenjang</label>
            <select name="level" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" required>
                <option value="1" {{ $jobVacancy->level == 'D1' ? 'selected' : '' }}>D1</option>
                <option value="2" {{ $jobVacancy->level == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="3" {{ $jobVacancy->level == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                <option value="4" {{ $jobVacancy->level == 'S1' ? 'selected' : '' }}>S1</option>
                <option value="5" {{ $jobVacancy->level == 'S2' ? 'selected' : '' }}>S2</option>
                <option value="6" {{ $jobVacancy->level == 'S3' ? 'selected' : '' }}>S3</option>
            </select>
            <div class="invalid-feedback">{{ $errors->first('level') }}</div>
        </div>
        
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="university">Nama Universitas</label>
            <input type="text" name="university" required value="{{ $jobVacancy->university }}"
                class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}"
                placeholder="University">
            <div class="invalid-feedback">{{ $errors->first('university') }}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="major">Jurusan</label>
            <input type="text" name="major" required value="{{ $jobVacancy->major }}"
                class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}">
            <div class="invalid-feedback">{{ $errors->first('major') }}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="university_base">Kota Universitas</label>
            <input type="text" name="university_base" required value="{{ $jobVacancy->university_base }}"
                class="form-control{{ $errors->has('university_base') ? ' is-invalid' : '' }}">
            <div class="invalid-feedback">{{ $errors->first('university_base') }}</div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="graduation_year">Lulus Tahun</label>
            <input type="text" name="graduation_year" required value="{{ $jobVacancy->graduation_year }}"
                class="form-control{{ $errors->has('graduation_year') ? ' is-invalid' : '' }}" min="0"
                max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                placeholder="Input 4-digit tahun">
            <div class="invalid-feedback">{{ $errors->first('graduation_year') }}</div>
        </div>
    </div>
</div> --}}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>