<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lecturer_id') }}
            {{ Form::text('lecturer_id', $lecturerCertificate->lecturer_id, ['class' => 'form-control' . ($errors->has('lecturer_id') ? ' is-invalid' : ''), 'placeholder' => 'Lecturer Id']) }}
            {!! $errors->first('lecturer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('certificate_types_id') }}
            {{ Form::text('certificate_types_id', $lecturerCertificate->certificate_types_id, ['class' => 'form-control' . ($errors->has('certificate_types_id') ? ' is-invalid' : ''), 'placeholder' => 'Certificate Types Id']) }}
            {!! $errors->first('certificate_types_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('certificate_date') }}
            {{ Form::text('certificate_date', $lecturerCertificate->certificate_date, ['class' => 'form-control' . ($errors->has('certificate_date') ? ' is-invalid' : ''), 'placeholder' => 'Certificate Date']) }}
            {!! $errors->first('certificate_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $lecturerCertificate->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('certificate_attachment') }}
            {{ Form::text('certificate_attachment', $lecturerCertificate->certificate_attachment, ['class' => 'form-control' . ($errors->has('certificate_attachment') ? ' is-invalid' : ''), 'placeholder' => 'Certificate Attachment']) }}
            {!! $errors->first('certificate_attachment', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>