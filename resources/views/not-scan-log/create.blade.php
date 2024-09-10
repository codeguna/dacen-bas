@extends('layouts.dashboard')

@section('template_title')
    Input Ketidakhadiran
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fa fa-calendar-times" aria-hidden="true"></i> Input
                            Ketidakhadiran</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.not-scan-logs.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Pengguna</label>
                                    <input class="form-control" type="text" name="name" value="{{ $name->name }}"
                                        readonly>
                                    <input class="form-control" type="hidden" name="pin" value="{{ $pin }}"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label>Tanggal</label>
                                    <input class="form-control" type="date" name="date" value="{{ $date }}"
                                        readonly>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alasan Tidak Hadir</label>
                                        <select class="form-control" name="reason_id" required>
                                            <option disabled selected>== Pilih Alasan ==</option>
                                            @foreach ($reasons as $value => $key)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Note</label>
                                    <textarea class="form-control" name="note" cols="30" rows="5" required></textarea>
                                </div>
                                <div class="col-md-12 mt-1">
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                                    </button>
                                </div>
                            </div>
                            {{-- @include('not-scan-log.form') --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
