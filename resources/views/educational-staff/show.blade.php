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
                                    src="https://img.freepik.com/premium-vector/3d-simple-user-icon-isolated_169241-7120.jpg?w=740"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">Gunadhi Pratama</h3>
                            <p class="text-muted text-center">Departemen</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Tanggal Masuk</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right">543</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block">
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
                                    <a href="{{ route('admin.levels.create') }}" class="btn btn-success btn-sm float-right"
                                        data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                <hr>
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
                                    <a href="{{ route('admin.levels.create') }}" class="btn btn-success btn-sm float-right"
                                        data-placement="left">
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
    </section>
    <!-- /.content -->
@endsection
