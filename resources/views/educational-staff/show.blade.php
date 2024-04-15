@extends('layouts.dashboard')

@section('template_title')
    {{ $educationalStaff->name }}
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
                                @if (Auth::user()->photo == null)
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="https://www.w3schools.com/howto/img_avatar.png" alt="User profile picture">
                                        @else
                                        <img class="profile-user-img img-fluid img-circle"
                                        src="/data_photo_profil/{{ Auth::User()->photo }}" alt="User profile picture">
                                @endif
                            </div>
                            <p class="text-center">
                            <form action="{{ route('admin.users.photo') }}" method="POST" id="myForm"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="file" class="form-control-file" name="photo" onchange="submitForm()"
                                        required>
                                    <small class="form-text text-danger">*Format .jpg maksimal 500x500 &
                                        1MB</small>
                                </div>
                            </form>
                            </p>
                            <h3 class="profile-username text-center">
                                {{ $educationalStaff->name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ $educationalStaff->departmens->name }}
                                <br>
                                ({{ $educationalStaff->departmens->short_name }})
                            </p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tanggal Lahir</b> <a class="float-right">
                                        <i class="fa fa-birthday-cake" aria-hidden="true"></i>
                                        {{ $educationalStaff->user->birthday ?? 'Belum Set' }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>NIDN/NITK</b> <a class="float-right">
                                        <i class="fa fa-hashtag" aria-hidden="true"></i>
                                        {{ $educationalStaff->nip }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Tanggal Masuk</b> <a class="float-right">
                                        <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                        {{ $educationalStaff->date_of_entry }}
                                    </a>
                                </li>
                                @can('set_status_tendik')
                                    <li class="list-group-item">
                                        <b>Status</b> <a class="float-right">
                                            <form id="statusForm" action="{{ route('admin.educational-staff.setstatus') }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $educationalStaff->id }}">
                                                @if ($educationalStaff->status == 1)
                                                    <div class="form-group">
                                                        <div
                                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                id="statusCheckbox">
                                                            <label class="custom-control-label text-success"
                                                                for="statusCheckbox">Aktif</label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="status" value="0">
                                                @else
                                                    <div class="form-group">
                                                        <div
                                                            class="custom-control custom-switch custom-switch-off-secondary custom-switch-on-success">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="statusCheckbox">
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

                            <a href="{{ url('/data_ktp_tendik/' . $educationalStaff->id_card) }}"
                                class="btn btn-primary btn-block" target="_blank">
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
                                    @can('add_education_tendik')
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
                                    @forelse ($educationalStaff->educationalStaffEducations  as $education)
                                        <div id="education">
                                            <strong>
                                                <form
                                                    action="{{ route('admin.educational-staff-educations.destroy', $education->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('delete_education_tendik')
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
                                                {{ $education->studyProgram->name }} - {{ $education->knowledge->name }}
                                            </p>
                                            <a class="text-cyan"
                                                href="{{ url('/data_ijazah_tendik/' . $education->certificate) }}"
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
                                    <a class="nav-link active" href="#timeline" data-toggle="tab">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Sertifikat</a>
                                </span>

                                <div class="float-right">
                                    @can('add_certificate_tendik')
                                        <a href="#" data-toggle="modal" data-target="#createCertificate"
                                            class="btn btn-success btn-sm float-right" data-placement="left">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="active tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->

                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        @forelse ($educationalStaff->educationalStaffCertificates as $certificates)
                                            <div class="time-label">
                                                <span class="bg-warning">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    {{ $certificates->created_at->format('m-d-Y') }}
                                                </span>
                                            </div>
                                            <div id="certificate">
                                                <i class="fa fa-certificate bg-primary" aria-hidden="true"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header">
                                                        <form
                                                            action="{{ route('admin.educational-staff-certificates.destroy', $certificates->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            @can('delete_certificate_tendik')
                                                                <button type="submit" class="btn btn-xs btn-danger mr-1"
                                                                    onclick="return confirm('Hapus data sertifikat {{ $certificates->certificateType->name }}?')">
                                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                                </button>
                                                            @endcan
                                                            <a
                                                                href="#">{{ $certificates->certificateType->name }}</a>
                                                        </form>

                                                    </h3>
                                                    <div class="timeline-body">
                                                        {{ $certificates->note }}
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="{{ url('/data_sertifikat_tendik/' . $certificates->certificate_attachment) }}"
                                                            class="text-cyan" target="_blank">
                                                            <i class="fa fa-paperclip" aria-hidden="true"></i> Sertifikat
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div id="certificate">
                                                <i class="fa fa-times bg-warning" aria-hidden="true"></i>
                                                <div class="timeline-item">
                                                    <h3 class="timeline-header font-weight-bold">
                                                        Belum ada data Sertifikat
                                                    </h3>
                                                    <div class="timeline-body">
                                                        Silahkan tambahkan dengan klik tombol plus diatas
                                                    </div>
                                                </div>
                                            </div>
                                        @endforelse
                                        <!-- END timeline item -->
                                    </div>
                                </div>
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
        @include('educational-staff.modal.create-education')
        @include('educational-staff.modal.create-certificate')
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
