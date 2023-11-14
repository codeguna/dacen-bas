<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $willingness->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valid_start') }}
            {{ Form::text('valid_start', $willingness->valid_start, ['class' => 'form-control' . ($errors->has('valid_start') ? ' is-invalid' : ''), 'placeholder' => 'Valid Start']) }}
            {!! $errors->first('valid_start', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valid_end') }}
            {{ Form::text('valid_end', $willingness->valid_end, ['class' => 'form-control' . ($errors->has('valid_end') ? ' is-invalid' : ''), 'placeholder' => 'Valid End']) }}
            {!! $errors->first('valid_end', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type') }}
            {{ Form::text('type', $willingness->type, ['class' => 'form-control' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => 'Type']) }}
            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('monday') }}
            {{ Form::text('monday', $willingness->monday, ['class' => 'form-control' . ($errors->has('monday') ? ' is-invalid' : ''), 'placeholder' => 'Monday']) }}
            {!! $errors->first('monday', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tuesday') }}
            {{ Form::text('tuesday', $willingness->tuesday, ['class' => 'form-control' . ($errors->has('tuesday') ? ' is-invalid' : ''), 'placeholder' => 'Tuesday']) }}
            {!! $errors->first('tuesday', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('wednesday') }}
            {{ Form::text('wednesday', $willingness->wednesday, ['class' => 'form-control' . ($errors->has('wednesday') ? ' is-invalid' : ''), 'placeholder' => 'Wednesday']) }}
            {!! $errors->first('wednesday', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('thursday') }}
            {{ Form::text('thursday', $willingness->thursday, ['class' => 'form-control' . ($errors->has('thursday') ? ' is-invalid' : ''), 'placeholder' => 'Thursday']) }}
            {!! $errors->first('thursday', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('friday') }}
            {{ Form::text('friday', $willingness->friday, ['class' => 'form-control' . ($errors->has('friday') ? ' is-invalid' : ''), 'placeholder' => 'Friday']) }}
            {!! $errors->first('friday', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('saturday') }}
            {{ Form::text('saturday', $willingness->saturday, ['class' => 'form-control' . ($errors->has('saturday') ? ' is-invalid' : ''), 'placeholder' => 'Saturday']) }}
            {!! $errors->first('saturday', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>