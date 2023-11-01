<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pin') }}
            {{ Form::text('pin', $scanLogsExtra->pin, ['class' => 'form-control' . ($errors->has('pin') ? ' is-invalid' : ''), 'placeholder' => 'Pin']) }}
            {!! $errors->first('pin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('scan') }}
            {{ Form::text('scan', $scanLogsExtra->scan, ['class' => 'form-control' . ($errors->has('scan') ? ' is-invalid' : ''), 'placeholder' => 'Scan']) }}
            {!! $errors->first('scan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('verify') }}
            {{ Form::text('verify', $scanLogsExtra->verify, ['class' => 'form-control' . ($errors->has('verify') ? ' is-invalid' : ''), 'placeholder' => 'Verify']) }}
            {!! $errors->first('verify', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('status_scan') }}
            {{ Form::text('status_scan', $scanLogsExtra->status_scan, ['class' => 'form-control' . ($errors->has('status_scan') ? ' is-invalid' : ''), 'placeholder' => 'Status Scan']) }}
            {!! $errors->first('status_scan', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ip_scan') }}
            {{ Form::text('ip_scan', $scanLogsExtra->ip_scan, ['class' => 'form-control' . ($errors->has('ip_scan') ? ' is-invalid' : ''), 'placeholder' => 'Ip Scan']) }}
            {!! $errors->first('ip_scan', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>