@extends('layouts.dashboard')

@section('template_title')
    Pengajuan Presensi di luar
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3><i class="fa fa-check-circle text-primary" aria-hidden="true"></i> Pengajuan Presensi di Luar</h3>
                <div class="alert alert-warning" role="alert">
                    <strong><i class="fa fa-info" aria-hidden="true"></i> Lakukan proses ini 2x, saat akan melakukan aktivitas dinas/mengajar & setelah melakukan aktivitas dinas/mengajar</strong>
                </div>
            </div>
            <form action="{{ route('admin.scan-log.request-attendances-store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">

                        @include('scan-log.form-requestAttendances')

                    </div>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h3><i class="fa fa-list-alt text-warning" aria-hidden="true"></i> Pengajuan Saya</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Keterangan</th>
                                <th>Aktivitas</th>
                                <th>Waktu Pengajuan</th>
                                <th>Lampiran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($request_attendances as $scan)
                                <tr>
                                    <td>
                                        {{ ++$i }}
                                    </td>
                                    <td>
                                        {{ date('d F Y', strtotime($scan->created_at)) }}
                                    </td>
                                    <td>
                                        {{ $scan->keterangan }}
                                    </td>
                                    <td>
                                        {{ $scan->activity->name }}
                                    </td>
                                    <td>
                                        {{ $scan->created_at }}
                                    </td>
                                    <td>
                                        <a href="{{ url('/data_photo_pengajuan/' . $scan->photo) }}" class="link"
                                            target="_blank">
                                            <i class="fas fa-file-image"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @if ($scan->status == 1)
                                            <span class="badge bg-success">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                Disetujui
                                            </span>
                                        @elseif ($scan->status == 2)
                                            <span class="badge bg-danger">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                Ditolak
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                <i class="fas fa-sync-alt    "></i>
                                                Butuh Persetujuan
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                   
                </div> 
                {!! $request_attendances->links() !!}
            </div>
        </div>        
    </div>
@endsection
