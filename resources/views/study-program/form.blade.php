<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $studyProgram->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('short_name') }}
            {{ Form::text('short_name', $studyProgram->short_name, ['class' => 'form-control' . ($errors->has('short_name') ? ' is-invalid' : ''), 'placeholder' => 'Short Name']) }}
            {!! $errors->first('short_name', '<div class="invalid-feedback">:message</div>') !!}
            <small class="text-danger">
                *singkatan dari Name
            </small>
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
