<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('job_applicant_id') }}
            {{ Form::text('job_applicant_id', $jobApplicantAddress->job_applicant_id, ['class' => 'form-control' . ($errors->has('job_applicant_id') ? ' is-invalid' : ''), 'placeholder' => 'Job Applicant Id']) }}
            {!! $errors->first('job_applicant_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $jobApplicantAddress->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('village') }}
            {{ Form::text('village', $jobApplicantAddress->village, ['class' => 'form-control' . ($errors->has('village') ? ' is-invalid' : ''), 'placeholder' => 'Village']) }}
            {!! $errors->first('village', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('district') }}
            {{ Form::text('district', $jobApplicantAddress->district, ['class' => 'form-control' . ($errors->has('district') ? ' is-invalid' : ''), 'placeholder' => 'District']) }}
            {!! $errors->first('district', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('province') }}
            {{ Form::text('province', $jobApplicantAddress->province, ['class' => 'form-control' . ($errors->has('province') ? ' is-invalid' : ''), 'placeholder' => 'Province']) }}
            {!! $errors->first('province', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('city') }}
            {{ Form::text('city', $jobApplicantAddress->city, ['class' => 'form-control' . ($errors->has('city') ? ' is-invalid' : ''), 'placeholder' => 'City']) }}
            {!! $errors->first('city', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('postal_code') }}
            {{ Form::text('postal_code', $jobApplicantAddress->postal_code, ['class' => 'form-control' . ($errors->has('postal_code') ? ' is-invalid' : ''), 'placeholder' => 'Postal Code']) }}
            {!! $errors->first('postal_code', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>