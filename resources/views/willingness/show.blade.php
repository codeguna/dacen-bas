@extends('layouts.dashboard')

@section('template_title')
    Daftar Kesediaan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <span class="card-title">
                        <h3><i class="fas fa-calendar text-primary"></i> Daftar Kesediaan</h3>
                    </span>
                </div>
                <div class="float-right">
                    <a class="btn btn-primary" href="{{ route('admin.willingnesses.index') }}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            <strong><i class="fas fa-question-circle"></i> Cara perbaharui data</strong> <br>
                            <p>
                                Pilih data mana yang akan di update, lalu tekan <strong>ENTER</strong> atau tekan tombol
                                Submit yang ada disamping kanan tabel
                            </p>

                            <form action="{{ route('admin.willingnesses.destroy', $willingnessID->pin) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-xs m-1"
                                    onclick="return confirm('Hapus semua data kesediaan? Semua data akan kesediaan akan terhapus.')">
                                    <i class="fas fa-trash"></i> Hapus Semua Data?
                                </button>
                            </form>

                        </div>
                        <hr>
                        <center>
                            <h3>Tabel Kesediaan</h3>
                        </center>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hari</th>
                                    <th>Jam Datang</th>
                                    <th>Jam Pulang</th>
                                    <th>Berlaku Dari</th>
                                    <th>Berlaku Sampai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @foreach ($willingnesses as $willingness)
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ ++$i }}
                                        </td>
                                        <td>
                                            @switch($willingness->day_code)
                                                @case(1)
                                                    Senin
                                                @break

                                                @case(2)
                                                    Selasa
                                                @break

                                                @case(3)
                                                    Rabu
                                                @break

                                                @case(4)
                                                    Kamis
                                                @break

                                                @case(5)
                                                    Jumat
                                                @break

                                                @case(6)
                                                    Sabtu
                                                @break

                                                @default
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i> Hari tidak lengkap, cek
                                                    kembali data kesediaan
                                            @endswitch
                                        </td>
                                        <td>
                                            <form method="POST"
                                                action="{{ route('admin.willingnesses.update', $willingness->id) }}"
                                                role="form" enctype="multipart/form-data">
                                                <input class="form-control" type="time" name="time_of_entry"
                                                    value="{{ $willingness->time_of_entry }}">
                                        <td>
                                            <input class="form-control" type="time" name="time_of_return"
                                                value="{{ $willingness->time_of_return }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="date" name="start_date"
                                                value="{{ $willingness->start_date }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="date" name="end_date"
                                                value="{{ $willingness->end_date }}">
                                        </td>
                                        <td>
                                            {{ method_field('PATCH') }}
                                            @csrf
                                            <button class="btn btn-warning">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            </button>
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
        {!! $willingnesses->links() !!}
    </section>
@endsection
