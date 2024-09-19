@extends('layouts.dashboard')

@section('template_title')
    Surat @if ($type_letter == 1)
        Masuk
    @elseif ($type_letter == 0)
        Keluar
    @endif
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                @if ($type_letter == 1)
                                    <i class="fas fa-arrow-circle-down text-success"></i> Surat Masuk
                                @elseif ($type_letter == 0)
                                    <i class="fas fa-arrow-circle-up text-primary"></i> Surat Keluar
                                @endif
                            </span>

                            <div class="float-right">
                                @if ($type_letter == 1)
                                    <a href="#" data-toggle="modal" data-target="#createInbox"
                                        class="btn btn-success btn-sm float-right" data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                    @include('letter.modal.create-inbox')
                                @elseif($type_letter == 0)
                                    <a href="#" data-toggle="modal" data-target="#createOutbox"
                                        class="btn btn-success btn-sm float-right" data-placement="left">
                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                    </a>
                                    @include('letter.modal.create-outbox')
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>No. Surat</th>
                                        <th>Tanggal</th>
                                        <th>Dari</th>
                                        <th>Judul</th>
                                        <th>Lampiran</th>
                                        <th>Jenis Surat</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($letters as $letter)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $letter->letter_number }}</td>
                                            <td>{{ $letter->date }}</td>
                                            <td>{{ $letter->from }}</td>
                                            <td>{{ $letter->title }}</td>
                                            <td>
                                                @if ($letter->letter_type == 1)
                                                    <a class="btn btn-outline-info w-100"
                                                        href="{{ url('/data_surat_masuk/' . $letter->file) }}"
                                                        target="_blank" title="Lampiran {{ $letter->title }}">
                                                        <i class="fas fa-paperclip"></i>
                                                    </a>
                                                @elseif($letter->letter_type == 0)
                                                    <a class="btn btn-outline-info w-100"
                                                        href="{{ url('/data_surat_keluar/' . $letter->file) }}"
                                                        target="_blank" title="Lampiran {{ $letter->title }}"">
                                                        <i class="fas fa-paperclip"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td>{{ $letter->typeLetter->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.letters.destroy', $letter->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-warning"
                                                            href="{{ route('admin.letters.edit', $letter->id) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Hapus data Surat {{ $letter->title }}?')"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                    </div>
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
    @parent
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
