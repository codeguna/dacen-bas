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
                                <img class="profile-user-img img-fluid img-circle"
                                    src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=740&t=st=1694070041~exp=1694070641~hmac=1c5be28279274e89b0764b1f392787abfdff355ee07b80f59ea73d3608b23e0e"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">
                                {{ $educationalStaff->name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ $educationalStaff->departmens->name }}
                            </p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tanggal Masuk</b> <a class="float-right">
                                        {{ $educationalStaff->date_of_entry }}
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right">
                                        @if ($educationalStaff->status == 1)
                                            <div class="badge bg-success">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                Aktif
                                            </div>
                                        @else
                                            <div class="badge bg-secondary">
                                                <i class="fa fa-check-times" aria-hidden="true"></i>
                                                Non Aktif
                                            </div>
                                        @endif
                                    </a>
                                </li>
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
                                    <div id="education">
                                        <strong>
                                            <i class="fas fa-book mr-1"></i> Nama PT - Bidang Ilmu - S1
                                        </strong>
                                        <p class="text-muted">
                                            Program Studi - Sistem Informasi
                                        </p>
                                        <a href="#">
                                            <i class="fa fa-paperclip" aria-hidden="true"></i> Ijazah
                                        </a>
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                        </button>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <span id="card_title">
                                    <a class="nav-link active" href="#timeline" data-toggle="tab">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Daftar Sertifikat</a>
                                </span>

                                <div class="float-right">
                                    <a href="#" data-toggle="modal" data-target="#createCertificate"
                                        class="btn btn-success btn-sm float-right" data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
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
                                        <div class="time-label">
                                            <span class="bg-warning">
                                                10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fa fa-certificate bg-primary" aria-hidden="true"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header"><a href="#">Jenis Sertifikat</a></h3>
                                                <div class="timeline-body">
                                                    Keterangan
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-paperclip" aria-hidden="true"></i> Sertifikat
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
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
