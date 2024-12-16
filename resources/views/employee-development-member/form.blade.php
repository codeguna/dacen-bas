<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('employee_developments_id') }}
            {{ Form::text('employee_developments_id', $employeeDevelopmentMember->employee_developments_id, ['class' => 'form-control' . ($errors->has('employee_developments_id') ? ' is-invalid' : ''), 'placeholder' => 'Employee Developments Id']) }}
            {!! $errors->first('employee_developments_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $employeeDevelopmentMember->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('certificate_attachment') }}
            {{ Form::text('certificate_attachment', $employeeDevelopmentMember->certificate_attachment, ['class' => 'form-control' . ($errors->has('certificate_attachment') ? ' is-invalid' : ''), 'placeholder' => 'Certificate Attachment']) }}
            {!! $errors->first('certificate_attachment', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>