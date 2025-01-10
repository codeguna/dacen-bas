<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="full_name">Nama Lengkap</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="front_title">Gelar Depan</label>
            <input type="text" class="form-control" id="front_title" name="front_title"
                placeholder="kosongkan jika tidak ada">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="back_title">Gelar Belakang</label>
            <input type="text" class="form-control" id="back_title" name="back_title" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Jenis Kelamin</label>
            <select name="gender" required class="form-control">
                <option value="1">Laki-laki</option>
                <option value="2">Perempuan</option>
            </select>
            <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="born_place">Tempat Lahir</label>
            <input type="text" class="form-control" id="born_place" name="born_place" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="born_date">Tanggal Lahir</label>
            <input type="date" class="form-control" id="born_date" name="born_date" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="date_of_application">Tanggal Melamar</label>
            <input type="date" class="form-control" name="date_of_application" required>
        </div>
        <hr>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="university">Nama Kampus</label>
            <input type="text" class="form-control" id="university" name="university" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Jenjang</label>
            <select class="form-control" name="level" required>
                <option value="1">SMA/SMK</option>
                <option value="2">D1</option>
                <option value="3">D3</option>
                <option value="4">D4</option>
                <option value="5">S1</option>
                <option value="6">S2</option>
                <option value="7">S3</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="major">Jurusan</label>
            <input type="text" class="form-control" id="major" name="major" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="university_base">Kota Asal Kampus</label>
            <input type="text" class="form-control" id="university_base" name="university_base" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Tahun Lulus</label>
            <input type="text" id="implementation_year" name="graduation_year" class="form-control" min="0"
                max="9999" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                placeholder="Input 4-digit tahun" value="{{ request('year') }}" required>
        </div>
    </div>
</div>
