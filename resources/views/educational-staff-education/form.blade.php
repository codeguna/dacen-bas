<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('educational_staff_id') }}
            {{ Form::text('educational_staff_id', $educationalStaffEducation->educational_staff_id, ['class' => 'form-control' . ($errors->has('educational_staff_id') ? ' is-invalid' : ''), 'placeholder' => 'Educational Staff Id']) }}
            {!! $errors->first('educational_staff_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('level_id') }}
            {{ Form::text('level_id', $educationalStaffEducation->level_id, ['class' => 'form-control' . ($errors->has('level_id') ? ' is-invalid' : ''), 'placeholder' => 'Level Id']) }}
            {!! $errors->first('level_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('study_program_id') }}
            {{ Form::text('study_program_id', $educationalStaffEducation->study_program_id, ['class' => 'form-control' . ($errors->has('study_program_id') ? ' is-invalid' : ''), 'placeholder' => 'Study Program Id']) }}
            {!! $errors->first('study_program_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('university_id') }}
            {{ Form::text('university_id', $educationalStaffEducation->university_id, ['class' => 'form-control' . ($errors->has('university_id') ? ' is-invalid' : ''), 'placeholder' => 'University Id']) }}
            {!! $errors->first('university_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('knowledge_id') }}
            {{ Form::text('knowledge_id', $educationalStaffEducation->knowledge_id, ['class' => 'form-control' . ($errors->has('knowledge_id') ? ' is-invalid' : ''), 'placeholder' => 'Knowledge Id']) }}
            {!! $errors->first('knowledge_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('certificate') }}
            {{ Form::text('certificate', $educationalStaffEducation->certificate, ['class' => 'form-control' . ($errors->has('certificate') ? ' is-invalid' : ''), 'placeholder' => 'Certificate']) }}
            {!! $errors->first('certificate', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>