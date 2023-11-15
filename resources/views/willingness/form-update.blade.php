<div class="row">
    <input type="hidden" name="willingness_id[0]" value="{{ $willingnessIn->id }}">
    <input type="hidden" name="willingness_id[1]" value="{{ $willingnessOut->id }}">
    <div class="col-md-12">
        <h5><i class="fas fa-arrow-down"></i> Jam Masuk</h5>
        <input type="hidden" name="type[0]" value="0">
    </div>
    <div class="col-md-2">
        <label>Senin</label>
        <input class="form-control" type="time" name="monday[0]" value="{{ $willingnessIn->monday }}" required>
    </div>
    <div class="col-md-2">
        <label>Selasa</label>
        <input class="form-control" type="time" name="tuesday[0]" value="{{ $willingnessIn->tuesday }}" required>
    </div>
    <div class="col-md-2">
        <label>Rabu</label>
        <input class="form-control" type="time" name="wednesday[0]" value="{{ $willingnessIn->wednesday }}" required>
    </div>
    <div class="col-md-2">
        <label>Kamis</label>
        <input class="form-control" type="time" name="thursday[0]" value="{{ $willingnessIn->thursday }}" required>
    </div>
    <div class="col-md-2">
        <label>Jumat</label>
        <input class="form-control" type="time" name="friday[0]" value="{{ $willingnessIn->friday }}" required>
    </div>
    <div class="col-md-2">
        <label>Sabtu</label>
        <input class="form-control" type="time" name="saturday[0]" value="{{ $willingnessIn->saturday }}" required>
    </div>
    <hr>
    <div class="col-md-12 mt-3">
        <h5><i class="fas fa-arrow-up"></i> Jam Keluar</h5>
        <input type="hidden" name="type[1]" value="1">
    </div>
    <div class="col-md-2">
        <label>Senin</label>
        <input class="form-control" type="time" name="monday[1]" value="{{ $willingnessOut->monday }}" required>
    </div>
    <div class="col-md-2">
        <label>Selasa</label>
        <input class="form-control" type="time" name="tuesday[1]" value="{{ $willingnessOut->tuesday }}" required>
    </div>
    <div class="col-md-2">
        <label>Rabu</label>
        <input class="form-control" type="time" name="wednesday[1]" value="{{ $willingnessOut->wednesday }}"
            required>
    </div>
    <div class="col-md-2">
        <label>Kamis</label>
        <input class="form-control" type="time" name="thursday[1]" value="{{ $willingnessOut->thursday }}" required>
    </div>
    <div class="col-md-2">
        <label>Jumat</label>
        <input class="form-control" type="time" name="friday[1]" value="{{ $willingnessOut->friday }}" required>
    </div>
    <div class="col-md-2">
        <label>Sabtu</label>
        <input class="form-control" type="time" name="saturday[1]" value="{{ $willingnessOut->saturday }}" required>
    </div>
    <div class="col-md-12 mt-3">
        <h5><i class="fas fa-calendar-check"></i> Kesediaan Berlaku</h5>
    </div>
    <div class="col-md-6">
        <label>Dari Tanggal</label>
        <input class="form-control" type="date" name="valid_start" value="{{ $willingnessIn->valid_start }}"
            required>
    </div>
    <div class="col-md-6">
        <label>Hingga Tanggal</label>
        <input class="form-control" type="date" name="valid_end" value="{{ $willingnessIn->valid_end }}" required>
    </div>
</div>
