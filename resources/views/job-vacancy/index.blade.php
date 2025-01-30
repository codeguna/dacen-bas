@extends('layouts.dashboard')

@section('template_title')
    Permintaan Pegawai
@endsection

@section('content')
    <div class="container-fluid">
        @include('job-vacancy.widget.box')
        <div class="row">
            <div class="col-md-12">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="table-tab" data-toggle="tab" data-target="#table" type="button"
                            role="tab" aria-controls="table" aria-selected="true">
                            <i class="fa fa-binoculars" aria-hidden="true"></i> Lowongan
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="report-tab" data-toggle="tab" data-target="#report" type="button"
                            role="tab" aria-controls="report" aria-selected="false">
                            <i class="fa fa-search" aria-hidden="true"></i> Report
                        </button>
                    </li>
                </ul>
            </div>

            <div class="row">

                <!-- Tab panes -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="table" role="tabpanel" aria-labelledby="table-tab">
                                <div class="row">
                                    @include('job-vacancy.tab.index-vacancy')
                                </div>
                            </div>
                            <div class="tab-pane" id="report" role="tabpanel" aria-labelledby="report-tab">
                                <div class="row">
                                    @include('job-vacancy.tab.report')
                                </div>
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
        });
    </script>
@endsection
