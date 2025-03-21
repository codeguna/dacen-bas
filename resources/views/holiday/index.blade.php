@extends('layouts.dashboard')

@section('template_title')
    Holiday
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.holidays.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <i class="fas fa-info-circle"></i> Import Data Tanggal Libur Nasional dengan format/template dibawah ini, pilih
                            File lalu tekan tombol Import untuk
                            memulai Import data tanggal libur nasional
                            <hr>                            
                            <form action="{{ route('admin.holidays.import') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="input-group mb-3">
                                    <input type="file" name="file" class="form-control-file m-1">
                                    <br>
                                    <button type="submit" class="btn btn-warning btn-sm m-1">
                                        <i class="fas fa-check-circle"></i> Import
                                    </button>
                                    <a href="https://drive.google.com/file/d/1KHLJEQDvnxPqePMxGC0zM9p5cqT0MM2E/view?usp=sharing"
                                        class="btn btn-success btn-sm m-1" data-placement="left" target="_blank"
                                        style="text-decoration: none">
                                        <i class="fas fa-file-excel"></i> Template
                                    </a>
                                </form>
                                <form action="{{ route('admin.holidays.destroy-last-year') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm m-1" type="submit"  onclick="return confirm('Hapus data Tahun lalu?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus Data Libur Tahun Lalu
                                    </button>
                                </form>
                                <form action="{{ route('admin.holidays.destroy-current-year') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Hapus data Tahun ini?')">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Hapus Data Libur Tahun Ini
                                    </button>
                                </form>
                                </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Date</th>
										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($holidays as $holiday)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ \Carbon\Carbon::parse($holiday->date)->format('j F Y'); }}</td>
											<td>{{ $holiday->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.holidays.destroy',$holiday->id) }}" method="POST">                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
    <script>
        $(function() {
            $("#dataTable1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
