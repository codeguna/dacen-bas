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
                                <img class="profile-user-img img-fluid img-circle"
                                    src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1694070041~exp=1694070641~hmac=1c5be28279274e89b0764b1f392787abfdff355ee07b80f59ea73d3608b23e0e"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">
                                {{ $lecturer->name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ $lecturer->homebases->name }}
                            </p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tanggal Masuk</b> <a class="float-right">
                                        <i class="fa fa-calendar-check" aria-hidden="true"></i>
                                        {{ $lecturer->appointment_date }}
                                    </a>
                                </li>
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
                                    <a href="#" data-toggle="modal" data-target="#createEducation"
                                        class="btn btn-success btn-sm float-right" data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
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
                                                    <button type="submit" class="btn btn-xs btn-danger mr-1"
                                                        onclick="return confirm('Hapus data pendidikan {{ $education->university->name }}?')">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </button><i class="fas fa-book"></i>
                                                    {{ $education->university->name }} -
                                                    {{ $education->level->name }}
                                                </form>

                                            </strong>
                                            <p class="text-muted">
                                                {{ $education->studyProgram->name }} -
                                                {{ $education->studyProgram->name }}
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
                                        <li class="nav-item"><a class="nav-link" href="#certificate"
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
                                            <a href="#" data-toggle="modal" data-target="#createEducation"
                                                class="dropdown-item" type="button">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                JabFung
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#createEducation"
                                                class="dropdown-item" type="button">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Inpassing
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#createEducation"
                                                class="dropdown-item" type="button">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                Sertifikat
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- /.tab-pane -->
                                <div class="tab-pane active" id="functional">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->

                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        @forelse ($lecturer->lecturerCertificates as $certificates)
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
                                                            <button type="submit" class="btn btn-xs btn-danger mr-1"
                                                                onclick="return confirm('Hapus data sertifikat {{ $certificates->certificateType->name }}?')">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button><a
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
                                                        Belum ada data Jabatan Fungsional
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
                                <div class="tab-pane" id="inpassing">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->

                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        @forelse ($lecturer->lecturerCertificates as $certificates)
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
                                                            <button type="submit" class="btn btn-xs btn-danger mr-1"
                                                                onclick="return confirm('Hapus data sertifikat {{ $certificates->certificateType->name }}?')">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button><a
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
                                                        Belum ada data Inpassing
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
                                <div class="tab-pane" id="certificateLecturer">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->

                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        @forelse ($lecturer->lecturerCertificates as $certificates)
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
                                                            <button type="submit" class="btn btn-xs btn-danger mr-1"
                                                                onclick="return confirm('Hapus data sertifikat {{ $certificates->certificateType->name }}?')">
                                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                                            </button><a
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
        @include('lecturer.modal.create-education')
        {{-- @include('educational-staff.modal.create-certificate') --}}
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
    </script>
@endsection
