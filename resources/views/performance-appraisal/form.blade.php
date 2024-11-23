{{-- <div class="box box-info padding-1">
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
</div> --}}

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Bulan</label>
            <select class="form-control" name="period" required>
                <option disabled selected>== Pilih Bulan ==</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" id="implementation_year" name="implementation_year" class="form-control"
                min="0" max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                placeholder="Input 4-digit tahun" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="paTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jumlah Terlambat</th>
                        <th>PA Murni</th>
                        <th>Kontribusi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            <select class="form-control" name="pin[0]" required>
                                <option disabled selected>== Pilih Nama ==</option>
                                @foreach ($users as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="late_total[0]" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="pure_pa[0]" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="contribution[0]" required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="note[0]" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success" onclick="addRow()">
                                    <i class="fas fa-plus-circle"></i> Tambah Data
                                </button>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-check-circle"></i> Submit
                                </button>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
