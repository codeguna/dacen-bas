@extends('layouts.dashboard')

@section('template_title')
    Kesediaan Karyawan
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">

                                <h3><i class="fas fa-check-double text-primary"></i> Kesediaan Karyawan</h3>
                            </span>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="callout callout-info">
                                    <h6><i class="fas fa-info-circle"></i> Set kesediaan untuk penyesuaian jam
                                        presensi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kesediaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                @if ($user->willingness->count() == 0)
                                                    <i class="fa fa-times-circle text-danger text-" aria-hidden="true"></i>
                                                @else
                                                    <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->willingness->count() == 0)
                                                    <a href="{{ route('admin.willingness.setTime', $user->id) }}"
                                                        class="btn btn-primary" title="Set Kesediaan">
                                                        <i class="fas fa-clock"></i>
                                                    </a>
                                                @else
                                                    <form action="{{ route('admin.willingnesses.destroy', $user->id) }}"
                                                        method="POST">
                                                        <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <a href="{{ route('admin.willingness.getTime', $user->id) }}"
                                                                    class="btn btn-warning" title="Update/Lihat Kesediaan">
                                                                    <i class="fas fa-pencil-alt"></i>
                                                                </a>

                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Hapus data Kesediaan {{ $user->name }}?')"><i
                                                                        class="fa fa-fw fa-trash"></i></button>

                                                            </span>
                                                        </div>
                                                    </form>
                                                @endif
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
