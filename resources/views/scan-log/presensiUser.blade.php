@extends('layouts.dashboard')

@section('template_title')
    Tenaga Kependidikan - Aktif
@endsection

@section('content')
    <div class="container">
        <h1>Presensi</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Tombol Presensi -->
        <button id="presensiButton">Presensi</button>


        <!-- Timer atau Jam Aktif -->
        <p>Jam aktif: 11:00 - 12:00 dan 13:00 - 14:00</p>
    @endsection

    @section('scripts')
        <script>
            function isButtonActive() {
                const now = new Date();
                const dayOfWeek = now.getDay(); // Hari dalam format 0 (Minggu) hingga 6 (Sabtu)
                const hour = now.getHours();

                // Aktifkan tombol pada Senin hingga Sabtu antara jam 11:00 - 12:00 dan 13:00 - 14:00
                const isButtonEnabled = dayOfWeek >= 1 && dayOfWeek <= 6 &&
                    ((hour >= 8 && hour < 12) || (hour >= 13 && hour < 14));

                return isButtonEnabled;
            }

            function updateButtonStatus() {
                const button = document.getElementById('presensiButton');

                if (isButtonActive()) {
                    button.disabled = false;
                } else {
                    button.disabled = true;
                }
            }

            // Panggil updateButtonStatus saat halaman dimuat dan setiap menit untuk memperbarui status tombol
            window.onload = updateButtonStatus;
            setInterval(updateButtonStatus, 60000); // Setiap 1 menit
        </script>

        <script>
            document.getElementById('presensiButton').addEventListener('click', function() {
                // Lakukan redirect ke rute 'presensi' di Laravel
                window.location.href = '{{ route('admin.presensi') }}';
            });
        </script>
    @endsection
