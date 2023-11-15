<div class="row">
    <input type="hidden" name="user_id" value="{{ $user_id }}">
    <div class="col-md-12">
        <h5><i class="fas fa-arrow-down"></i> Jam Masuk</h5>
        <input type="hidden" name="type[0]" value="0">
    </div>
    <div class="col-md-2">
        <label>Senin</label>
        <input class="form-control" type="time" name="monday[0]" value="08:00" required>
    </div>
    <div class="col-md-2">
        <label>Selasa</label>
        <input class="form-control" type="time" name="tuesday[0]" value="08:00" required>
    </div>
    <div class="col-md-2">
        <label>Rabu</label>
        <input class="form-control" type="time" name="wednesday[0]" value="08:00" required>
    </div>
    <div class="col-md-2">
        <label>Kamis</label>
        <input class="form-control" type="time" name="thursday[0]" value="08:00" required>
    </div>
    <div class="col-md-2">
        <label>Jumat</label>
        <input class="form-control" type="time" name="friday[0]" value="08:00" required>
    </div>
    <div class="col-md-2">
        <label>Sabtu</label>
        <input class="form-control" type="time" name="saturday[0]" value="08:00" required>
    </div>
    <hr>
    <div class="col-md-12 mt-3">
        <h5><i class="fas fa-arrow-up"></i> Jam Keluar</h5>
        <input type="hidden" name="type[1]" value="1">
    </div>
    <div class="col-md-2">
        <label>Senin</label>
        <input class="form-control" type="time" name="monday[1]" value="16:00" required>
    </div>
    <div class="col-md-2">
        <label>Selasa</label>
        <input class="form-control" type="time" name="tuesday[1]" value="16:00" required>
    </div>
    <div class="col-md-2">
        <label>Rabu</label>
        <input class="form-control" type="time" name="wednesday[1]" value="16:00" required>
    </div>
    <div class="col-md-2">
        <label>Kamis</label>
        <input class="form-control" type="time" name="thursday[1]" value="16:00" required>
    </div>
    <div class="col-md-2">
        <label>Jumat</label>
        <input class="form-control" type="time" name="friday[1]" value="16:00" required>
    </div>
    <div class="col-md-2">
        <label>Sabtu</label>
        <input class="form-control" type="time" name="saturday[1]" value="14:00" required>
    </div>
    <div class="col-md-12 mt-3">
        <h5><i class="fas fa-calendar-check"></i> Kesediaan Berlaku</h5>
    </div>
    <div class="col-md-6">
        <label>Dari Tanggal</label>
        <input class="form-control" type="date" name="valid_start" required>
    </div>
    <div class="col-md-6">
        <label>Hingga Tanggal</label>
        <input class="form-control" type="date" name="valid_end" required>
    </div>
</div>
