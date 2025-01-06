<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $jobVacancy->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('department_id') }}
            {{ Form::text('department_id', $jobVacancy->department_id, ['class' => 'form-control' . ($errors->has('department_id') ? ' is-invalid' : ''), 'placeholder' => 'Department Id']) }}
            {!! $errors->first('department_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('gender') }}
            {{ Form::text('gender', $jobVacancy->gender, ['class' => 'form-control' . ($errors->has('gender') ? ' is-invalid' : ''), 'placeholder' => 'Gender']) }}
            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('min_age') }}
            {{ Form::text('min_age', $jobVacancy->min_age, ['class' => 'form-control' . ($errors->has('min_age') ? ' is-invalid' : ''), 'placeholder' => 'Min Age']) }}
            {!! $errors->first('min_age', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('max_age') }}
            {{ Form::text('max_age', $jobVacancy->max_age, ['class' => 'form-control' . ($errors->has('max_age') ? ' is-invalid' : ''), 'placeholder' => 'Max Age']) }}
            {!! $errors->first('max_age', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('amount_needed') }}
            {{ Form::text('amount_needed', $jobVacancy->amount_needed, ['class' => 'form-control' . ($errors->has('amount_needed') ? ' is-invalid' : ''), 'placeholder' => 'Amount Needed']) }}
            {!! $errors->first('amount_needed', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date_start') }}
            {{ Form::text('date_start', $jobVacancy->date_start, ['class' => 'form-control' . ($errors->has('date_start') ? ' is-invalid' : ''), 'placeholder' => 'Date Start']) }}
            {!! $errors->first('date_start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('deadline') }}
            {{ Form::text('deadline', $jobVacancy->deadline, ['class' => 'form-control' . ($errors->has('deadline') ? ' is-invalid' : ''), 'placeholder' => 'Deadline']) }}
            {!! $errors->first('deadline', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('level') }}
            {{ Form::text('level', $jobVacancy->level, ['class' => 'form-control' . ($errors->has('level') ? ' is-invalid' : ''), 'placeholder' => 'Level']) }}
            {!! $errors->first('level', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('university') }}
            {{ Form::text('university', $jobVacancy->university, ['class' => 'form-control' . ($errors->has('university') ? ' is-invalid' : ''), 'placeholder' => 'University']) }}
            {!! $errors->first('university', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('major') }}
            {{ Form::text('major', $jobVacancy->major, ['class' => 'form-control' . ($errors->has('major') ? ' is-invalid' : ''), 'placeholder' => 'Major']) }}
            {!! $errors->first('major', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('university_base') }}
            {{ Form::text('university_base', $jobVacancy->university_base, ['class' => 'form-control' . ($errors->has('university_base') ? ' is-invalid' : ''), 'placeholder' => 'University Base']) }}
            {!! $errors->first('university_base', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('graduation_year') }}
            {{ Form::text('graduation_year', $jobVacancy->graduation_year, ['class' => 'form-control' . ($errors->has('graduation_year') ? ' is-invalid' : ''), 'placeholder' => 'Graduation Year']) }}
            {!! $errors->first('graduation_year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $jobVacancy->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>