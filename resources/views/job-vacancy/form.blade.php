<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Judul Lowongan</label>
                    <input type="text" name="title" required value="{{ $jobVacancy->title }}"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                    <div class="invalid-feedback">{{ $errors->first('title') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Departemen</label>
                    <select class="form-control" name="department_id" required>
                        @foreach ($departments as $value => $key)
                            <option value="{{ $key }}" {{ $jobVacancy->department_id == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jumlah Kebutuhan</label>
                    <input type="number" min="0" name="amount_needed" required
                        value="{{ $jobVacancy->amount_needed }}"
                        class="form-control{{ $errors->has('amount_needed') ? ' is-invalid' : '' }}">
                    <div class="invalid-feedback">{{ $errors->first('amount_needed') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="gender" required
                        class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                        <option value="1" {{ $jobVacancy->gender == 1 ? 'selected' : '' }}>Laki-laki</option>
                        <option value="2" {{ $jobVacancy->gender == 2 ? 'selected' : '' }}>Perempuan</option>
                        <option value="3" {{ $jobVacancy->gender == 3 ? 'selected' : '' }}>Laki-laki/Perempuan
                        </option>
                    </select>
                    <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
            <div class="col-md-6">
                <div class="form-group"> <label for="min_age">Minimal Umur</label> <input type="text" id="min_age"
                        name="min_age" required value="{{ $jobVacancy->min_age }}"
                        class="form-control{{ $errors->has('min_age') ? ' is-invalid' : '' }}" min="0"
                        max="99"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2); validateAges()">
                    <div class="invalid-feedback">{{ $errors->first('min_age') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"> <label for="max_age">Maksimal Umur</label> <input type="text"
                        id="max_age" name="max_age" required value="{{ $jobVacancy->max_age }}"
                        class="form-control{{ $errors->has('max_age') ? ' is-invalid' : '' }}" min="0"
                        max="99"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2); validateAges()">
                    <div class="invalid-feedback">{{ $errors->first('max_age') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"> <label for="date_start">Tanggal Mulai</label> <input type="date"
                        id="date_start" name="date_start" required value="{{ $jobVacancy->date_start }}"
                        class="form-control{{ $errors->has('date_start') ? ' is-invalid' : '' }}"
                        placeholder="Date Start" oninput="validateDates()">
                    <div class="invalid-feedback">{{ $errors->first('date_start') }}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group"> <label for="deadline">Tanggal Terakhir</label> <input type="date"
                        id="deadline" name="deadline" required value="{{ $jobVacancy->deadline }}"
                        class="form-control{{ $errors->has('deadline') ? ' is-invalid' : '' }}" placeholder="Deadline"
                        oninput="validateDates()">
                    <div class="invalid-feedback">{{ $errors->first('deadline') }}</div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i>
            Submit</button>
    </div>
</div>
