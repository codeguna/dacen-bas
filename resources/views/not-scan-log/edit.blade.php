@extends('layouts.dashboard')

@section('template_title')
    Perbarui Ketidakhadiran
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fas fa-pencil-alt text-warning"></i> Perbarui Ketidakhadiran</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.not-scan-logs.update', $notScanLog->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="{{ $notScanLog->user->name }}"
                                            readonly>
                                        <input type="hidden" name="pin" class="form-control"
                                            value="{{ $notScanLog->pin }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control" name="date"
                                            value="{{ $notScanLog->date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alasan Tidak Hadir</label>
                                        <select class="form-control" name="reason_id" required>
                                            @foreach ($reasons as $value => $key)
                                                <option value="{{ $key }}"
                                                    @if ($notScanLog->reason_id == $key) selected @endif>{{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" name="note" cols="5" rows="10" required>{{ $notScanLog->note }}</textarea>
                                    </div>
                                    <button class="btn btn-success" type="submit">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i> Submit
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
