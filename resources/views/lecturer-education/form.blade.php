<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lecturer_id') }}
            {{ Form::text('lecturer_id', $lecturerEducation->lecturer_id, ['class' => 'form-control' . ($errors->has('lecturer_id') ? ' is-invalid' : ''), 'placeholder' => 'Lecturer Id']) }}
            {!! $errors->first('lecturer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('level_id') }}
            {{ Form::text('level_id', $lecturerEducation->level_id, ['class' => 'form-control' . ($errors->has('level_id') ? ' is-invalid' : ''), 'placeholder' => 'Level Id']) }}
            {!! $errors->first('level_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('study_program_id') }}
            {{ Form::text('study_program_id', $lecturerEducation->study_program_id, ['class' => 'form-control' . ($errors->has('study_program_id') ? ' is-invalid' : ''), 'placeholder' => 'Study Program Id']) }}
            {!! $errors->first('study_program_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('university_id') }}
            {{ Form::text('university_id', $lecturerEducation->university_id, ['class' => 'form-control' . ($errors->has('university_id') ? ' is-invalid' : ''), 'placeholder' => 'University Id']) }}
            {!! $errors->first('university_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('knowledge_id') }}
            {{ Form::text('knowledge_id', $lecturerEducation->knowledge_id, ['class' => 'form-control' . ($errors->has('knowledge_id') ? ' is-invalid' : ''), 'placeholder' => 'Knowledge Id']) }}
            {!! $errors->first('knowledge_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('certificate') }}
            {{ Form::text('certificate', $lecturerEducation->certificate, ['class' => 'form-control' . ($errors->has('certificate') ? ' is-invalid' : ''), 'placeholder' => 'Certificate']) }}
            {!! $errors->first('certificate', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>