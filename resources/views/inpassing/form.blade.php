<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('lecturer_id') }}
            {{ Form::text('lecturer_id', $inpassing->lecturer_id, ['class' => 'form-control' . ($errors->has('lecturer_id') ? ' is-invalid' : ''), 'placeholder' => 'Lecturer Id']) }}
            {!! $errors->first('lecturer_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('rank_id') }}
            {{ Form::text('rank_id', $inpassing->rank_id, ['class' => 'form-control' . ($errors->has('rank_id') ? ' is-invalid' : ''), 'placeholder' => 'Rank Id']) }}
            {!! $errors->first('rank_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('determination_date') }}
            {{ Form::text('determination_date', $inpassing->determination_date, ['class' => 'form-control' . ($errors->has('determination_date') ? ' is-invalid' : ''), 'placeholder' => 'Determination Date']) }}
            {!! $errors->first('determination_date', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tmt') }}
            {{ Form::text('tmt', $inpassing->tmt, ['class' => 'form-control' . ($errors->has('tmt') ? ' is-invalid' : ''), 'placeholder' => 'Tmt']) }}
            {!! $errors->first('tmt', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('inpassing_attachment') }}
            {{ Form::text('inpassing_attachment', $inpassing->inpassing_attachment, ['class' => 'form-control' . ($errors->has('inpassing_attachment') ? ' is-invalid' : ''), 'placeholder' => 'Inpassing Attachment']) }}
            {!! $errors->first('inpassing_attachment', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>