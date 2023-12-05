<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pin') }}
            {{ Form::text('pin', $willingness->pin, ['class' => 'form-control' . ($errors->has('pin') ? ' is-invalid' : ''), 'placeholder' => 'Pin']) }}
            {!! $errors->first('pin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_date') }}
            {{ Form::text('start_date', $willingness->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end_date') }}
            {{ Form::text('end_date', $willingness->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
            {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('day_code') }}
            {{ Form::text('day_code', $willingness->day_code, ['class' => 'form-control' . ($errors->has('day_code') ? ' is-invalid' : ''), 'placeholder' => 'Day Code']) }}
            {!! $errors->first('day_code', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('time_of_entry') }}
            {{ Form::text('time_of_entry', $willingness->time_of_entry, ['class' => 'form-control' . ($errors->has('time_of_entry') ? ' is-invalid' : ''), 'placeholder' => 'Time Of Entry']) }}
            {!! $errors->first('time_of_entry', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('time_of_return') }}
            {{ Form::text('time_of_return', $willingness->time_of_return, ['class' => 'form-control' . ($errors->has('time_of_return') ? ' is-invalid' : ''), 'placeholder' => 'Time Of Return']) }}
            {!! $errors->first('time_of_return', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>