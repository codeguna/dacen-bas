@extends('layouts.dashboard')

@section('template_title')
    Tambah Lowongan Pekerjaan
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fa fa-plus text-success" aria-hidden="true"></i> Tambah Lowongan
                            Pekerjaan</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.job-vacancies.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('job-vacancy.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function validateAges() {
            var minAge = parseInt(document.getElementById('min_age').value);
            var maxAge = parseInt(document.getElementById('max_age').value);
            if (minAge > maxAge) {
                document.getElementById('max_age').setCustomValidity(
                    'Maksimal Umur tidak boleh lebih kecil dari Minimal Umur.');
            } else {
                document.getElementById('max_age').setCustomValidity('');
            }
        }

        function validateDates() {
            var dateStart = new Date(document.getElementById('date_start').value);
            var deadline = new Date(document.getElementById('deadline').value);
            if (deadline < dateStart) {
                document.getElementById('deadline').setCustomValidity(
                    'Tanggal Terakhir tidak boleh lebih kecil dari Tanggal Mulai.');
            } else {
                document.getElementById('deadline').setCustomValidity('');
            }
        }
    </script>
@endsection
