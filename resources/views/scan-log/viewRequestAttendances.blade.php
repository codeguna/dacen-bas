@extends('layouts.dashboard')

@section('template_title')
    Scan Logs - Pengajuan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fa fa-hourglass-start text-warning" aria-hidden="true"></i> Pengajuan Presensi | Luar
                            Kantor
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Aktivitas</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Jam Pengajuan</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($request_attendances as $request)
                                        <tr>
                                            <td>
                                                {{ ++$i }}
                                            </td>
                                            <td>
                                                {{ $request->user->name }}
                                            </td>
                                            <td>
                                                {{ $request->activity->name }}
                                            </td>
                                            <td>
                                                {{ date('d F Y', strtotime($request->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $request->created_at }}
                                            </td>
                                            <td>
                                                <a href="{{ url('/data_photo_pengajuan/' . $request->photo) }}"
                                                    class="link" target="_blank">
                                                    <i class="fas fa-file-image"></i> Foto
                                                </a>
                                            </td>
                                            <td>
                                                @if ($request->status == 1)
                                                    <span class="badge bg-success">
                                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                        Sudah disetujui
                                                    </span>
                                                @elseif ($request->status == 2)
                                                    <span class="badge bg-success">
                                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                        Pengajuan ditolak
                                                    </span>
                                                @else
                                                    <span class="badge bg-warning">
                                                        <i class="fas fa-sync-alt    "></i>
                                                        Proses Pengajuan
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Aktivitas</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jam Pengajuan</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
