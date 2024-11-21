<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('pin') }}
            {{ Form::text('pin', $performanceAppraisal->pin, ['class' => 'form-control' . ($errors->has('pin') ? ' is-invalid' : ''), 'placeholder' => 'Pin']) }}
            {!! $errors->first('pin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('period') }}
            {{ Form::text('period', $performanceAppraisal->period, ['class' => 'form-control' . ($errors->has('period') ? ' is-invalid' : ''), 'placeholder' => 'Period']) }}
            {!! $errors->first('period', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('year') }}
            {{ Form::text('year', $performanceAppraisal->year, ['class' => 'form-control' . ($errors->has('year') ? ' is-invalid' : ''), 'placeholder' => 'Year']) }}
            {!! $errors->first('year', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('late_total') }}
            {{ Form::text('late_total', $performanceAppraisal->late_total, ['class' => 'form-control' . ($errors->has('late_total') ? ' is-invalid' : ''), 'placeholder' => 'Late Total']) }}
            {!! $errors->first('late_total', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('pure_pa') }}
            {{ Form::text('pure_pa', $performanceAppraisal->pure_pa, ['class' => 'form-control' . ($errors->has('pure_pa') ? ' is-invalid' : ''), 'placeholder' => 'Pure Pa']) }}
            {!! $errors->first('pure_pa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('contribution') }}
            {{ Form::text('contribution', $performanceAppraisal->contribution, ['class' => 'form-control' . ($errors->has('contribution') ? ' is-invalid' : ''), 'placeholder' => 'Contribution']) }}
            {!! $errors->first('contribution', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('note') }}
            {{ Form::text('note', $performanceAppraisal->note, ['class' => 'form-control' . ($errors->has('note') ? ' is-invalid' : ''), 'placeholder' => 'Note']) }}
            {!! $errors->first('note', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>