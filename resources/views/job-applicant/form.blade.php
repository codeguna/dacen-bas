<div class="box box-info padding-1">
    <div class="box-body">
        {{-- <input type="hidden" class="form-control" name="job_vacancies_id"
                value="{{ $jobapplicant_id}}">
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name">
        </div>
        <div class="form-group">
            <label for="front_title">Front Title</label>
            <input type="text" class="form-control" id="front_title" name="front_title">
        </div>
        <div class="form-group">
            <label for="back_title">Back Title</label>
            <input type="text" class="form-control" id="back_title" name="back_title">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender">
        </div>
        <div class="form-group">
            <label for="born_place">Born Place</label>
            <input type="text" class="form-control" id="born_place" name="born_place">
        </div>
        <div class="form-group">
            <label for="born_date">Born Date</label>
            <input type="text" class="form-control" id="born_date" name="born_date">
        </div>
        <div class="form-group">
            <label for="date_of_application">Date of Application</label>
            <input type="text" class="form-control" id="date_of_application" name="date_of_application">
        </div>
        <div class="form-group">
            <label for="level">Level</label>
            <input type="text" class="form-control" id="level" name="level">
        </div>
        <div class="form-group">
            <label for="university">University</label>
            <input type="text" class="form-control" id="university" name="university">
        </div>
        <div class="form-group">
            <label for="major">Major</label>
            <input type="text" class="form-control" id="major" name="major">
        </div>
        <div class="form-group">
            <label for="university_base">University Base</label>
            <input type="text" class="form-control" id="university_base" name="university_base">
        </div>
        <div class="form-group">
            <label for="graduation_year">Graduation Year</label>
            <input type="text" class="form-control" id="graduation_year" name="graduation_year">
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
    </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="container mt-5">
                    <div id="stepper" class="bs-stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <div class="step" data-target="#step1"> <button type="button" class="btn step-trigger"
                                    role="tab" id="steppertrigger1" aria-controls="step1"> <span
                                        class="bs-stepper-circle">1</span> <span class="bs-stepper-label">Data
                                        Pribadi</span> </button> </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step2"> <button type="button" class="btn step-trigger"
                                    role="tab" id="steppertrigger2" aria-controls="step2"> <span
                                        class="bs-stepper-circle">2</span> <span class="bs-stepper-label">Data
                                        Alamat</span> </button> </div>
                            <div class="line"></div>
                            <div class="step" data-target="#step3"> <button type="button" class="btn step-trigger"
                                    role="tab" id="steppertrigger3" aria-controls="step3"> <span
                                        class="bs-stepper-circle">3</span> <span class="bs-stepper-label">Data
                                        Kontak</span> </button> </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form>
                                <div id="step1" class="content" role="tabpanel" aria-labelledby="steppertrigger1">
                                    {{-- FORM --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="full_name">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="full_name"
                                                    name="full_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="front_title">Gelar Depan</label>
                                                <input type="text" class="form-control" id="front_title"
                                                    name="front_title" placeholder="kosongkan jika tidak ada">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="back_title">Gelar Belakang</label>
                                                <input type="text" class="form-control" id="back_title"
                                                    name="back_title" required>
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
                                                <input type="text" class="form-control" id="born_place"
                                                    name="born_place" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="born_date">Tanggal Lahir</label>
                                                <input type="date" class="form-control" id="born_date"
                                                    name="born_date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="date_of_application">Tanggal Melamar</label>
                                                <input type="date" class="form-control" id="date_of_application"
                                                    name="date_of_application" required>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="university">Nama Kampus</label>
                                                <input type="text" class="form-control" id="university"
                                                    name="university" required>
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
                                                <input type="text" class="form-control" id="major"
                                                    name="major" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="university_base">Kota Asal Kampus</label>
                                                <input type="text" class="form-control" id="university_base"
                                                    name="university_base" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tahun Lulus</label>
                                                <input type="text" id="implementation_year" name="graduation_year"
                                                    class="form-control" min="0" max="9999"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4);"
                                                    placeholder="Input 4-digit tahun" value="{{ request('year') }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END FORM --}}
                                    <button type="button" class="btn btn-primary"
                                        onclick="stepper.next()"><i class="fa fa-arrow-right" aria-hidden="true"></i> Tahap Berikutnya</button>
                                </div>
                                <div id="step2" class="content" role="tabpanel"
                                    aria-labelledby="steppertrigger2">
                                    <div class="form-group"> <label for="address">Alamat</label> <input
                                            type="text" class="form-control" id="address" name="address">
                                    </div> <button type="button" class="btn btn-primary"
                                        onclick="stepper.previous()">Previous</button> <button type="button"
                                        class="btn btn-primary" onclick="stepper.next()">Next</button>
                                </div>
                                <div id="step3" class="content" role="tabpanel"
                                    aria-labelledby="steppertrigger3">
                                    <div class="form-group"> <label for="contact">Nomor Kontak</label> <input
                                            type="text" class="form-control" id="contact" name="contact">
                                    </div>
                                    <button type="button" class="btn btn-primary"
                                        onclick="stepper.previous()">Previous</button> <button type="submit"
                                        class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
