@extends('layouts.dashboard')

@section('template_title')
    Pilih Periode | Pengembangan Karyawan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-newspaper text-info"></i> Report Pengembangan Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="period-tab" data-toggle="tab" data-target="#period"
                                    type="button" role="tab" aria-controls="period" aria-selected="true">
                                    <i class="fas fa-calendar-alt"></i> Per Periode
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="department-tab" data-toggle="tab" data-target="#department"
                                    type="button" role="tab" aria-controls="department" aria-selected="false">
                                    <i class="fas fa-building"></i> Per Departemen
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="person-tab" data-toggle="tab" data-target="#person"
                                    type="button" role="tab" aria-controls="person" aria-selected="false">
                                    <i class="fas fa-user-plus"></i> Per Orang
                                </button>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="period" role="tabpanel" aria-labelledby="period-tab">
                                @include('employee-development.report.all-person')
                            </div>
                            <div class="tab-pane" id="department" role="tabpanel" aria-labelledby="department-tab">
                                @include('employee-development.report.department')
                            </div>
                            <div class="tab-pane" id="person" role="tabpanel" aria-labelledby="person-tab">
                                @include('employee-development.report.person')
                            </div>
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

        $(document).ready(function() {
            // Simpan tab aktif di local storage saat tab diubah
            $('button[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).data('target'));
            });

            // Muat tab aktif terakhir dari local storage
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab button[data-target="' + activeTab + '"]').tab('show');
                $('.tab-content .tab-pane').removeClass('active'); // Hapus kelas active dari semua tab-pane
                $(activeTab).addClass('active'); // Tambahkan kelas active ke tab-pane yang sesuai
            }
        });
    </script>
@endsection
