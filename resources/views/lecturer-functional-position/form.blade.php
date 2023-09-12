<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lecturer_id') }}
            {{ Form::text('lecturer_id', $lecturerFunctionalPosition->lecturer_id, ['class' => 'form-control' . ($errors->has('lecturer_id') ? ' is-invalid' : ''), 'placeholder' => 'Lecturer Id']) }}
            {!! $errors->first('lecturer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('functional_position_id') }}
            {{ Form::text('functional_position_id', $lecturerFunctionalPosition->functional_position_id, ['class' => 'form-control' . ($errors->has('functional_position_id') ? ' is-invalid' : ''), 'placeholder' => 'Functional Position Id']) }}
            {!! $errors->first('functional_position_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('determination_date') }}
            {{ Form::text('determination_date', $lecturerFunctionalPosition->determination_date, ['class' => 'form-control' . ($errors->has('determination_date') ? ' is-invalid' : ''), 'placeholder' => 'Determination Date']) }}
            {!! $errors->first('determination_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tmt') }}
            {{ Form::text('tmt', $lecturerFunctionalPosition->tmt, ['class' => 'form-control' . ($errors->has('tmt') ? ' is-invalid' : ''), 'placeholder' => 'Tmt']) }}
            {!! $errors->first('tmt', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('credit_score') }}
            {{ Form::text('credit_score', $lecturerFunctionalPosition->credit_score, ['class' => 'form-control' . ($errors->has('credit_score') ? ' is-invalid' : ''), 'placeholder' => 'Credit Score']) }}
            {!! $errors->first('credit_score', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('functional_position_attachment') }}
            {{ Form::text('functional_position_attachment', $lecturerFunctionalPosition->functional_position_attachment, ['class' => 'form-control' . ($errors->has('functional_position_attachment') ? ' is-invalid' : ''), 'placeholder' => 'Functional Position Attachment']) }}
            {!! $errors->first('functional_position_attachment', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>