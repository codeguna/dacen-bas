<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('letter_type') }}
            {{ Form::text('letter_type', $letter->letter_type, ['class' => 'form-control' . ($errors->has('letter_type') ? ' is-invalid' : ''), 'placeholder' => 'Letter Type']) }}
            {!! $errors->first('letter_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('letter_number') }}
            {{ Form::text('letter_number', $letter->letter_number, ['class' => 'form-control' . ($errors->has('letter_number') ? ' is-invalid' : ''), 'placeholder' => 'Letter Number']) }}
            {!! $errors->first('letter_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::text('date', $letter->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('from') }}
            {{ Form::text('from', $letter->from, ['class' => 'form-control' . ($errors->has('from') ? ' is-invalid' : ''), 'placeholder' => 'From']) }}
            {!! $errors->first('from', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('title') }}
            {{ Form::text('title', $letter->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('file') }}
            {{ Form::text('file', $letter->file, ['class' => 'form-control' . ($errors->has('file') ? ' is-invalid' : ''), 'placeholder' => 'File']) }}
            {!! $errors->first('file', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('type_letter_id') }}
            {{ Form::text('type_letter_id', $letter->type_letter_id, ['class' => 'form-control' . ($errors->has('type_letter_id') ? ' is-invalid' : ''), 'placeholder' => 'Type Letter Id']) }}
            {!! $errors->first('type_letter_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>