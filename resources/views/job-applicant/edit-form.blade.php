@extends('layouts.dashboard')

@section('template_title')
    Edit Detail Pelamar {{ $jobApplicant->full_name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <form method="POST" action="{{ route('admin.job-applicants.update', $jobApplicant->id) }}" role="form"
            enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-left">
                                <h4 class="card-title"><i class="fa fa-edit text-primary" aria-hidden="true"></i> Edit
                                    Detail Pelamar</h4>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary" href="{{ route('admin.job-applicants.index') }}">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="font-weight-bold">Data Personal</h4>
                            <div class="form-group">
                                <label for="full_name"><strong>Nama Lengkap:</strong></label>
                                <input type="text" name="full_name" id="full_name" class="form-control"
                                    value="{{ $jobApplicant->full_name }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="front_title"><strong>Gelar Depan:</strong></label>
                                        <input type="text" name="front_title" id="front_title" class="form-control"
                                            value="{{ $jobApplicant->front_title }}" placeholder="kosongkan jika tidak ada">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="back_title"><strong>Gelar Belakang:</strong></label>
                                        <input type="text" name="back_title" id="back_title" class="form-control"
                                            value="{{ $jobApplicant->back_title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender"><strong>Jenis Kelamin:</strong></label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="1" {{ $jobApplicant->gender == 1 ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="2" {{ $jobApplicant->gender == 2 ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="born_place"><strong>Tempat Lahir:</strong></label>
                                        <input type="text" name="born_place" id="born_place" class="form-control"
                                            value="{{ $jobApplicant->born_place }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="born_date"><strong>Tanggal Lahir:</strong></label>
                                        <input type="date" name="born_date" id="born_date" class="form-control"
                                            value="{{ $jobApplicant->born_date }}" required>
                                    </div>
                                </div>
                                @php
                                    $birthDate = $jobApplicant->born_date;
                                    $birthDateTimestamp = strtotime($birthDate);
                                    $age = date('Y') - date('Y', $birthDateTimestamp); // Jika bulan dan hari saat ini belum melewati bulan dan hari lahir, kurangi umur dengan satu tahun if (date('md', $birthDateTimestamp) > date('md')) { $age--; }
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age"><strong>Umur:</strong></label>
                                        <input type="number" name="age" id="age" class="form-control"
                                            value="{{ $age }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date_of_application"><strong>Tanggal Melamar:</strong></label>
                                <input type="date" name="date_of_application" id="date_of_application"
                                    class="form-control" value="{{ $jobApplicant->date_of_application }}" required>
                            </div>
                            <hr>
                            <h4 class="font-weight-bold">Data Pendidikan</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="level"><strong>Pendidikan:</strong></label>
                                        <select name="level" id="level" class="form-control" required>
                                            <option value="1" {{ $jobApplicant->level == 1 ? 'selected' : '' }}>
                                                SMA/SMK</option>
                                            <option value="2" {{ $jobApplicant->level == 2 ? 'selected' : '' }}>D1
                                            </option>
                                            <option value="3" {{ $jobApplicant->level == 3 ? 'selected' : '' }}>D3
                                            </option>
                                            <option value="4" {{ $jobApplicant->level == 4 ? 'selected' : '' }}>D4
                                            </option>
                                            <option value="5" {{ $jobApplicant->level == 5 ? 'selected' : '' }}>S1
                                            </option>
                                            <option value="6" {{ $jobApplicant->level == 6 ? 'selected' : '' }}>S2
                                            </option>
                                            <option value="7" {{ $jobApplicant->level == 7 ? 'selected' : '' }}>S3
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="major"><strong>Jurusan:</strong></label>
                                        <input type="text" name="major" id="major" class="form-control"
                                            value="{{ $jobApplicant->major }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="university_base"><strong>Kota Universitas:</strong></label>
                                        <input type="text" name="university_base" id="university_base"
                                            class="form-control" value="{{ $jobApplicant->university_base }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="graduation_year"><strong>Tahun Lulus:</strong></label>
                                        <input type="text" name="graduation_year" id="graduation_year"
                                            class="form-control" value="{{ $jobApplicant->graduation_year }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="university"><strong>Universitas:</strong></label>
                                    <input type="text" name="university" id="university" class="form-control"
                                        value="{{ $jobApplicant->university }}" required>
                                </div>
                            </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="font-weight-bold">Data Alamat</h4>
                                <div class="form-group">
                                    <label for="address"><strong>Alamat Lengkap:</strong></label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ $jobApplicant->jobApplicantAddress->address }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"><strong>Kota/Kab:</strong></label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ $jobApplicant->jobApplicantAddress->city }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"><strong>Kelurahan</strong></label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ $jobApplicant->jobApplicantAddress->village }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"><strong>Kecamatan</strong></label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ $jobApplicant->jobApplicantAddress->district }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city"><strong>Provinsi</strong></label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ $jobApplicant->jobApplicantAddress->province }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city"><strong>Kode Pos</strong></label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ $jobApplicant->jobApplicantAddress->postal_code }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="form-group">
                                    <h4 class="font-weight-bold">Surat Lamaran dan CV:</h4>
                                    <div class="form-group">
                                        <label>Perbarui data Surat Pelamar dan CV?</label>
                                        <input type="file" class="form-control-file" name="files">
                                        <small id="fileHelpId" class="form-text text-danger">Tipe file: .pdf, doc, docx
                                            maks 2MB</small>
                                    </div>
                                    <a href="{{ url('/data_lampiran_pelamar/' . $jobApplicant->jobApplicantAttachments->files) }}"
                                        target="_blank">
                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Lampiran
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="btn-group">
                        <a class="btn btn-primary" href="{{ route('admin.job-applicants.index') }}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                        <button type="submit" class="btn btn-success"
                            onclick="return confirm('Perika kembali data Pelamar, jika sudah yakin? Silahkan tekan tombol Simpan')"><i
                                class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
