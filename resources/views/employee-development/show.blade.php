@extends('layouts.dashboard')

@section('template_title')
    Pengembangan Karyawan | {{ $employeeDevelopment->employeeDevelopmentMembers->user->name ?? '' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Detail Pengembangan Karyawan</h1>
                        <p>Dari tanggal {{ $employeeDevelopment->start_date }} s/d tanggal {{ $employeeDevelopment->end_date }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Nama Kegiatan:</strong></div>
                            <div class="col-md-8">{{ $employeeDevelopment->event_name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Pemateri:</strong></div>
                            <div class="col-md-8">{{ $employeeDevelopment->speaker }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Penyelenggara Kegiatan:</strong></div>
                            <div class="col-md-8">{{ $employeeDevelopment->event_organizer }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Tempat Kegiatan:</strong></div>
                            <div class="col-md-8">{{ $employeeDevelopment->place }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Biaya Kegiatan:</strong></div>
                            <div class="col-md-8">Rp. {{ number_format($employeeDevelopment->price, 0, ',', '.') }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Jenis Kegiatan:</strong></div>
                            <div class="col-md-8">{{ $employeeDevelopment->eventTypes->name }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"><strong>Lampiran Sertifikat:</strong></div>
                            <div class="col-md-8">
                                <a class="btn btn-primary" href="{{ url('/data_pengembangan/'.$employeeDevelopment->employeeDevelopmentMembers->certificate_attachment) }}" target="_blank">
                                    <i class="fa fa-paperclip" aria-hidden="true"></i> Klik disini
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <p>Dengan bangga diberikan kepada: <strong>{{ $employeeDevelopment->employeeDevelopmentMembers->user->name }}</strong></p>
                    </div>
                </div>
            </div>
    </section>
@endsection
