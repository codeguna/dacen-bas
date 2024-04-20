@extends('layouts.dashboard')

@section('template_title')
    Willingness
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h4><i class="fas fa-user-clock text-primary"></i> Kesediaan Karyawan</h4>
                            </span>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="alert alert-primary" role="alert">
                            <i class="fas fa-info-circle"></i> Import kesediaan dengan format/template dibawah ini, pilih
                            File lalu tekan tombol Import untuk
                            memulai Import data kesediaan TenDik/Dosen
                            <hr>
                            <form action="{{ route('admin.willingness.import') }}" method="POST"
                                enctype="multipart/form-data">

                                @csrf
                                <div class="input-group mb-3">
                                    <input type="file" name="file" class="form-control-file m-1" required>
                                    <br>
                                    <button type="submit" class="btn btn-warning btn-sm m-1">
                                        <i class="fas fa-check-circle"></i> Import
                                    </button>
                                    <a href="https://drive.google.com/file/d/1FCkwmBlAb9H6smmv9oAXOnfKfSYDFXtD/view?usp=sharing"
                                        class="btn btn-success btn-sm m-1" data-placement="left" target="_blank"
                                        style="text-decoration: none">
                                        <i class="fas fa-file-excel"></i> Template
                                    </a>
                                </div>


                            </form>
                        </div>

                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kesediaan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $user->name }}</td>
                                            <td>
                                                {{-- @forelse ($user->willingness as $willingness)
                                                    <button class="btn btn-primary">
                                                        Notifications <span
                                                            class="badge bg-primary">{{ $willingness->count() }}</span>
                                                    </button>
                                                @empty
                                                    <i class="fas fa-info-circle text-danger"></i> Belum set Kesediaan
                                                @endforelse --}}
                                                @if ($user->willingness->count() < 1)
                                                    <i class="fas fa-info-circle text-danger"></i> Belum set Kesediaan
                                                @else
                                                    <a href="{{ route('admin.willingnesses.show', $user->pin) }}"
                                                        class="btn btn-primary btn-sm w-100" style="text-decoration: none">
                                                        <i class="fas fa-user-clock"></i> Cek Kesediaan
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" target="_blank" class="btn btn-warning" type="button">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
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
            }).buttons().container().appendTo('#dataTable1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
