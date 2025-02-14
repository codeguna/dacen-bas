<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="pin">Nama</label>
            <input class="form-control" type="text" value="{{ $employeeLeave->user->name }}" readonly>
            <input type="hidden" name="pin" class="form-control {{ $errors->has('pin') ? 'is-invalid' : '' }}"
                placeholder="Pin" value="{{ $employeeLeave->pin }}">
            <div class="invalid-feedback">{{ $errors->first('pin') }}</div>
            <input type="hidden" name="year" value="{{ date('Y') }}">
        </div>
        <div class="form-group">
            <label for="amount">Jumlah Cuti</label>
            <input type="text" name="amount" class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}"
                placeholder="Amount" value="{{ $employeeLeave->amount }}">
            <div class="invalid-feedback">{{ $errors->first('amount') }}</div>
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
