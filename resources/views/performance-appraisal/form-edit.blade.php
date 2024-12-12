<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Bulan</label>
            <select class="form-control" name="period" required>
                <option value="01" {{ $performanceAppraisal->period == '01' ? 'selected' : '' }}>Januari</option>
                <option value="02" {{ $performanceAppraisal->period == '02' ? 'selected' : '' }}>Februari</option>
                <option value="03" {{ $performanceAppraisal->period == '03' ? 'selected' : '' }}>Maret</option>
                <option value="04" {{ $performanceAppraisal->period == '04' ? 'selected' : '' }}>April</option>
                <option value="05" {{ $performanceAppraisal->period == '05' ? 'selected' : '' }}>Mei</option>
                <option value="06" {{ $performanceAppraisal->period == '06' ? 'selected' : '' }}>Juni</option>
                <option value="07" {{ $performanceAppraisal->period == '07' ? 'selected' : '' }}>Juli</option>
                <option value="08" {{ $performanceAppraisal->period == '08' ? 'selected' : '' }}>Agustus</option>
                <option value="09" {{ $performanceAppraisal->period == '09' ? 'selected' : '' }}>September</option>
                <option value="10" {{ $performanceAppraisal->period == '10' ? 'selected' : '' }}>Oktober</option>
                <option value="11" {{ $performanceAppraisal->period == '11' ? 'selected' : '' }}>November</option>
                <option value="12" {{ $performanceAppraisal->period == '12' ? 'selected' : '' }}>Desember</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" id="implementation_year" name="year" class="form-control" min="0"
                max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                placeholder="Input 4-digit tahun" value="{{ $performanceAppraisal->year }}" required>
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
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>
                            <input class="form-control" type="text" value="{{ $performanceAppraisal->user->name }}" readonly>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="late_total" value="{{ $performanceAppraisal->late_total }}" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="pure_pa" value="{{ $performanceAppraisal->pure_pa }}" required>
                        </td>
                        <td>
                            <input class="form-control" type="number" min="0" name="contribution" value="{{ $performanceAppraisal->contribution }}"  required>
                        </td>
                        <td>
                            <input class="form-control" type="text" name="note" value="{{ $performanceAppraisal->note }}" required>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-check-circle"></i> Submit
                            </button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
