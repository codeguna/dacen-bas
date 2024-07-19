@extends('layouts.dashboard')

@section('template_title')
    Daftar Dosen/Jabatan Akademik
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            <i class="fa fa-search" aria-hidden="true"></i> Daftar Dosen Jabatan Akademik
                            <strong>{{ $title->name }}</strong>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-striped">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Prodi</th>
                                                <th>Note</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($lecturers as $lecturer)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $lecturer->name }}</td>
                                                    <td>{{ $lecturer->homebases->name }}</td>
                                                    <td>-</td>
                                                </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4">
                                                   <span class="badge bg-warning w-100"><i class="fa fa-info-circle" aria-hidden="true"></i> Tidak terdapat dosen di posisi ini</span> 
                                                </td>
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
        </div>
    </div>
@endsection
