<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('event_name') }}
            {{ Form::text('event_name', $employeeDevelopment->event_name, ['class' => 'form-control' . ($errors->has('event_name') ? ' is-invalid' : ''), 'placeholder' => 'Event Name']) }}
            {!! $errors->first('event_name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('speaker') }}
            {{ Form::text('speaker', $employeeDevelopment->speaker, ['class' => 'form-control' . ($errors->has('speaker') ? ' is-invalid' : ''), 'placeholder' => 'Speaker']) }}
            {!! $errors->first('speaker', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('event_organizer') }}
            {{ Form::text('event_organizer', $employeeDevelopment->event_organizer, ['class' => 'form-control' . ($errors->has('event_organizer') ? ' is-invalid' : ''), 'placeholder' => 'Event Organizer']) }}
            {!! $errors->first('event_organizer', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('place') }}
            {{ Form::text('place', $employeeDevelopment->place, ['class' => 'form-control' . ($errors->has('place') ? ' is-invalid' : ''), 'placeholder' => 'Place']) }}
            {!! $errors->first('place', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $employeeDevelopment->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('event_type') }}
            {{ Form::text('event_type', $employeeDevelopment->event_type, ['class' => 'form-control' . ($errors->has('event_type') ? ' is-invalid' : ''), 'placeholder' => 'Event Type']) }}
            {!! $errors->first('event_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('start_date') }}
            {{ Form::text('start_date', $employeeDevelopment->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date']) }}
            {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('end_date') }}
            {{ Form::text('end_date', $employeeDevelopment->end_date, ['class' => 'form-control' . ($errors->has('end_date') ? ' is-invalid' : ''), 'placeholder' => 'End Date']) }}
            {!! $errors->first('end_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>