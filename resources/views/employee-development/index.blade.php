@extends('layouts.dashboard')

@section('template_title')
    Pengembangan Saya
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3><i class="fas fa-certificate text-orange"></i> Pengembangan Saya</h3>
                            </span>

                            <div class="float-right">
                                @can('create_employee_developments')
                                    <a href="#" data-toggle="modal" data-target="#createCertificate"
                                        class="btn btn-success btn-sm float-right" data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                @endcan
                            </div>
                            @include('employee-development.modal.create')
                        </div>                        
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <strong><i class="fa fa-info" aria-hidden="true"></i> Harap follow up kepala departemen/koordinator</strong> setelah menambahkan pengembangan untuk selanjutnya di Validasi!
                        </div>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-sm table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Peserta</th>
                                        <th>Nama Acara</th>
                                        <th>Pemateri</th>
                                        <th>Jenis Acara</th>
                                        <th>Tempat Acara</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status</th>
                                        <th>Bukti Kegiatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employeeDevelopments as $employeeDevelopment)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{  $employeeDevelopment->employeeDevelopmentMembers->user->name }}</td>
                                            <td>{{  $employeeDevelopment->event_name }}</td>
                                            <td>{{ $employeeDevelopment->speaker }}</td>
                                            <td>{{ $employeeDevelopment->eventTypes->name }}</td>
                                            <td>{{ $employeeDevelopment->place }}</td>
                                            <td>{{ $employeeDevelopment->start_date }}</td>
                                            <td>{{ $employeeDevelopment->end_date }}</td>
                                            <td>
                                                @if ($employeeDevelopment->is_approved == 0)
                                                    <div class="badge bg-warning">
                                                        <i class="fa fa-times-circle" aria-hidden="true"></i> Belum
                                                        Disetujui
                                                    </div>
                                                @else
                                                    <div class="badge bg-success">
                                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Sudah
                                                        Disetujui
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('/data_pengembangan/' . $employeeDevelopment->employeeDevelopmentMembers->certificate_attachment) }}"
                                                    target="_blank">
                                                    <i class="fa fa-paperclip text-primary" aria-hidden="true"></i> Klik disini
                                                </a>
                                            </td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.employee-developments.destroy', $employeeDevelopment->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus data Pengembangan {{ $employeeDevelopment->event_name }}?')" title="Hapus Data Pengembangan?"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('admin.employee-developments.show', $employeeDevelopment->id) }}" title="Lihat Data Pengembangan?"><i
                                                                class="fa fa-fw fa-eye"></i></a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.employee-developments.edit', $employeeDevelopment->id) }}" title="Perbarui Data Pengembangan?"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                        @can('approve_employee_developments')
                                                            <a class="btn btn-sm btn-warning"
                                                                href="{{ route('admin.employee-developments.status', $employeeDevelopment->id) }}">
                                                                @if ($employeeDevelopment->is_approved == '0')
                                                                    <i class="fa fa-check-circle" aria-hidden="true"
                                                                        title="Setujui Pengajuan?"></i>
                                                                @else
                                                                    <i class="fa fa-times-circle" aria-hidden="true"
                                                                        title="Batalkan Pengajuan?"></i>
                                                                @endif

                                                            </a>
                                                        @endcan
                                                    </div>

                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">== Data Pengembangan tidak ditemukan! ==
                                            </td>
                                        </tr>
                                    @endforelse
                                    <tfoot class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Peserta</th>
                                            <th>Nama Acara</th>
                                            <th>Pemateri</th>
                                            <th>Jenis Acara</th>
                                            <th>Tempat Acara</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Tanggal Selesai</th>
                                            <th>Status</th>
                                            <th>Bukti Kegiatan</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
