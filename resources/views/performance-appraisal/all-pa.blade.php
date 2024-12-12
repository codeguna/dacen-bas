@extends('layouts.dashboard')

@section('template_title')
    Semua Data
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-user-friends text-success"></i> Semua Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            <strong>
                                <i class="fas fa-info-circle"></i> Klik tombol <i class="fas fa-edit"></i>
                            </strong> untuk memperbaiki data PA yang salah. <br> Harap perhatikan Periode dan Tahun sebelum
                            melakukan perubahan data!
                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tahun/Periode</th>
                                        <th>Nama</th>
                                        <th>Total Terlambat</th>
                                        <th>PA Murni</th>
                                        <th>Kontribusi</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($performanceAppraisals as $pa)
                                        <tr>
                                            <td>
                                                {{ ++$i }}
                                            </td>
                                            <td>
                                                {{ $pa->year }} / @switch($pa->period)
                                                    @case('01')
                                                        Januari
                                                    @break

                                                    @case('02')
                                                        Februari
                                                    @break

                                                    @case('03')
                                                        Maret
                                                    @break

                                                    @case('04')
                                                        April
                                                    @break

                                                    @case('05')
                                                        Mei
                                                    @break

                                                    @case('06')
                                                        Juni
                                                    @break

                                                    @case('07')
                                                        Juli
                                                    @break

                                                    @case('08')
                                                        Agustus
                                                    @break

                                                    @case('09')
                                                        September
                                                    @break

                                                    @case('10')
                                                        Oktober
                                                    @break

                                                    @case('11')
                                                        November
                                                    @break

                                                    @case('12')
                                                        Desember
                                                    @break

                                                    @default
                                                        Invalid Month
                                                @endswitch
                                            </td>
                                            <td>
                                                {{ $pa->user->name }}
                                            </td>
                                            <td>
                                                {{ $pa->late_total }}
                                            </td>
                                            <td>
                                                {{ $pa->pure_pa }}
                                            </td>
                                            <td>
                                                {{ $pa->contribution }}
                                            </td>
                                            <td>
                                                {{ $pa->note }}
                                            </td>
                                            <td>
                                                <form action="{{ route('admin.performance-appraisals.destroy', $pa->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('admin.performance-appraisals.edit', $pa->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus data PA {{ $pa->user->name }}?')">
                                                            <i class="fa fa-fw fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td colspan="8">== Data PA Kosong ==</td>
                                            </tr>
                                        @endforelse

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
