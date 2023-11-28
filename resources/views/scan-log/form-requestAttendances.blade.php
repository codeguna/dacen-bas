<div class="col-md-12">
    <a class="btn btn-outline-primary w-100" data-toggle="collapse" href="#form" aria-expanded="false"
        aria-controls="form">
        <i class="fa fa-eye" aria-hidden="true"></i> Klik di sini
    </a>
    </p>
    <div class="collapse" id="form">
        <div class="form-group">
            <label>Aktivitas</label>
            <select class="form-control" name="activity_id" required>
                <option disabled selected>== Pilih Aktivitas ==</option>
                @foreach ($activities as $value => $key)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control-file" name="photo" required>
            <small class="text-danger">
                Maksimal ukuran photo adalah 2MB, disarankan resize dahulu sebelum upload!
            </small>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" name="keterangan" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-success w-100" type="submit">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                Submit
            </button>
        </div>
    </div>
</div>
