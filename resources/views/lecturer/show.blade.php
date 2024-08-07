@extends('layouts.dashboard')

@section('template_title')
    {{ $lecturer->name }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @php
                                    $idDosen = $lecturer->nidn;
                                    $cekUser = \App\User::where('nomor_induk', $idDosen)->first();
                                @endphp
                                @if ($cekUser)
                                    @if ($lecturer->user->photo == null)
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="https://www.w3schools.com/howto/img_avatar.png" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="/data_photo_profil/{{ $lecturer->user->photo }}"
                                            alt="User profile picture">
                                    @endif
                                @endif

                            </div>
                            <p class="text-center">
                                @if ($cekUser)
                                    <form action="{{ route('admin.users.photo') }}" method="POST" id="myForm"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $lecturer->nidn }}">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="photo"
                                                onchange="submitForm()" required>
                                                <label class="custom-file-label">Choose file</label>
                                            <small class="form-text text-danger">*Format .jpg maksimal 500x500 &
                                                1MB</small>
                                        </div>
                                    </form>
                                @endif
                            </p>
                            <h3 class="profile-username text-center">
                                {{ $lecturer->name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ $lecturer->homebases->name }}
                            </p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tanggal Lahir</b> <a class="float-right">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                        {{ $lecturer->user->birthday ?? 'Belum Set' }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>NIDN/NITK</b> <a class="float-right">
                                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                                        {{ $lecturer->nidn }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>NIP</b> <a class="float-right">
                                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                                        {{ $lecturer->nip??'-' }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>NUPTK</b> <a class="float-right">
                                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                                        {{ $lecturer->nuptk??'-' }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal Masuk</b> <a class="float-right">
                                        <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                        {{ $lecturer->appointment_date }}
                                    </a>
                                </li>
                                @can('set_status_dosen')
                                    <li class="list-group-item">
                                        <b>Status</b> <a class="float-right">
                                            <form id="statusForm" action="{{ route('admin.lecturer.setstatus') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $lecturer->id }}">
                                                @if ($lecturer->status == 1)
                                                    <div class="form-group">
                                                        <div
                                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                            @can('set_status_dosen')
                                                                <input type="checkbox" class="custom-control-input" checked
                                                                    id="statusCheckbox">
                                                            @endcan
                                                            <label class="custom-control-label text-success"
                                                                for="statusCheckbox">Aktif</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="status" value="0">
                                                @else
                                                    <div class="form-group">
                                                        <div
                                                            class="custom-control custom-switch custom-switch-off-secondary custom-switch-on-success">
                                                            @can('set_status_dosen')
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="statusCheckbox">
                                                            @endcan
                                                            <label class="custom-control-label text-muted"
                                                                for="statusCheckbox">Non
                                                                Aktif</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="status" value="1">
                                                @endif
                                            </form>
                                        </a>
                                    </li>
                                @endcan
                            </ul>

                            <a href="{{ url('/data_ktp_dosen/' . $lecturer->id_card) }}" class="btn btn-primary btn-block"
                                target="_blank">
                                <i class="fa fa-id-card" aria-hidden="true"></i> <b>KTP</b>
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    <i class="fa fa-university" aria-hidden="true"></i> Pendidikan
                                </span>

                                <div class="float-right">
                                    @can('add_education_dosen')
                                        <a href="#" data-toggle="modal" data-target="#createEducation"
                                            class="btn btn-success btn-sm float-right" data-placement="left">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse ($lecturer->lecturerEducations  as $education)
                                        <div id="education">
                                            <strong>
                                                <form
                                                    action="{{ route('admin.lecturer-educations.destroy', $education->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('delete_education_dosen')
                                                        <button type="submit" class="btn btn-xs btn-danger mr-1"
                                                            onclick="return confirm('Hapus data pendidikan {{ $education->university->name }}?')">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                    @endcan
                                                    <i class="fas fa-book"></i>
                                                    {{ $education->university->name ?? 'Data Universitas tidak ditemukan' }}
                                                    -
                                                    {{ $education->level->name }}
                                                </form>

                                            </strong>
                                            <p class="text-muted">
                                                {{ $education->studyProgram->name }} -
                                                {{ $education->knowledge->name }}
                                            </p>
                                            <a class="text-cyan"
                                                href="{{ url('/data_ijazah_dosen/' . $education->certificate) }}"
                                                target="_blank">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i> Ijazah
                                            </a>
                                            <hr>
                                        </div>
                                    @empty
                                        <div id="education">
                                            <strong>
                                                <i class="fas fa-times mr-1"></i> Belum ada data Pendidikan
                                            </strong>
                                            <p class="text-muted">
                                                Tambahkan dengan klik tombol plus disamping pendidikan
                                            </p>
                                            <hr>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-warning card-outline">
                        <div class="card-header p-2">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#functional"
                                                data-toggle="tab">Jabatan Fungsional</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#inpassing"
                                                data-toggle="tab">Inpassing</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#certificateLecturer"
                                                data-toggle="tab">Sertifikat</a></li>
                                    </ul>
                                </span>

                                <div class="float-right">
                                    <div class="btn-group dropleft">
                                        <button type="button" class="btn btn-success dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            @can('add_jabfung_dosen')
                                                <a href="#" data-toggle="modal" data-target="#createJabfung"
                                                    class="dropdown-item" type="button">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    JabFung
                                                </a>
                                            @endcan
                                            @can('add_inpassing_dosen')
                                                <a href="#" data-toggle="modal" data-target="#createInpassing"
                                                    class="dropdown-item" type="button">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Inpassing
                                                </a>
                                            @endcan
                                            @can('add_certificate_dosen')
                                                <a href="#" data-toggle="modal" data-target="#createCertificate"
                                                    class="dropdown-item" type="button">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                    Sertifikat
                                                </a>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                @include('lecturer.tab.jabfung')
                                @include('lecturer.tab.inpassing')
                                @include('lecturer.tab.sertifikat')
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
        @include('lecturer.modal.create-education')
        @include('lecturer.modal.create-certificate')
        @include('lecturer.modal.create-inpassing')
        @include('lecturer.modal.create-jabfung')
    </section>
    <!-- /.content -->
@endsection
@section('scripts')
    <script>
        const statusForm = document.getElementById('statusForm');
        const statusCheckbox = document.getElementById('statusCheckbox');

        statusCheckbox.addEventListener('click', function() {
            // Submit the form when the checkbox is clicked
            statusForm.submit();
        });

        function submitForm() {
            document.getElementById('myForm').submit();
        }
    </script>
@endsection
