@extends('layouts.dashboard')

@section('template_title')
    Lakukan Presensi
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1><i class="fas fa-user-clock text-primary"></i> Presensi</h1>
                        <div class="alert alert-primary" role="alert">
                            <i class="fa fa-info-circle"></i>
                            Harap gunakan jaringan internet di LPKIA, tidak boleh gunakan <strong>VPN!</strong>
                        </div>
                        <div class="alert alert-warning" role="alert">
                            <strong>
                                <i class="fa fa-info-circle" aria-hidden="true"></i> Tombol Presensi aktif di jam:
                            </strong>
                            <ul>
                                {{-- <li>
                                    {{ $scan2 }}:{{ $scanMinute }} - {{ $scan2End }}:{{ $scanMinute }}
                                </li>
                                <li>
                                    {{ $scan3 }}:{{ $scanMinute }} - {{ $scan3End }}:{{ $scanMinute }}
                                </li> --}}
                                <li>
                                    11:00 - 12:00
                                </li>
                                <li>
                                    13:00 -
                                    14:00
                                </li>
                            </ul>
                            <hr>

                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            Presensi di mesin fingerprint masih dapat di lakukan, presensi disini bersifat
                            <strong>opsional</strong>.
                        </div>
                    </div>
                    <div class="card-body">
                        <button id="presensiButton" class="btn btn-lg btn-success w-100">
                            <i class="fa fa-check-circle" aria-hidden="true"></i> Presensi
                        </button>
                    </div>
                    <div class="card-footer">
                        <small>
                            <i class="fas fa-clock"></i> Waktu Server: <span id="clock"></span>
                        </small>
                    </div>
                </div>
            </div>
        </div>

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
    </div>
@endsection

@section('scripts')
    <script>
        function updateClock() {
            const now = new Date();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const currentTime = `${hours}:${minutes}:${seconds}`;

            // Update the element with the new time
            document.getElementById('clock').innerHTML = currentTime;
        }

        // Update the clock every second
        setInterval(updateClock, 1000);

        // Run the function once to initialize the clock
        updateClock();
    </script>
    <script>
        function isButtonActive() {
            const now = new Date();
            const dayOfWeek = now.getDay(); // Hari dalam format 0 (Minggu) hingga 6 (Sabtu)
            const hour = now.getHours();

            // Aktifkan tombol pada Senin hingga Sabtu antara jam 11:00 - 12:00 dan 13:00 - 14:00
            const isButtonEnabled = dayOfWeek >= 1 && dayOfWeek <= 6 &&
                ((hour >= 11 && hour < 12) || (hour >= 13 && hour < 14));

            return isButtonEnabled;
        }

        // function isButtonActive() {
        //     const now = new Date();
        //     const dayOfWeek = now.getDay(); // Hari dalam format 0 (Minggu) hingga 6 (Sabtu)
        //     const hour = now.getHours();
        //     const minutes = now.getMinutes();

        //     // Aktifkan tombol pada Senin hingga Sabtu antara jam 11:30 - 12:45
        //     const isButtonEnabled = dayOfWeek >= 1 && dayOfWeek <= 6 &&
        //         (hour === {{ $scan2 }} && minutes >= {{ $scanMinute }}) || (hour === {{ $scan2End }} &&
        //             minutes <= {{ $scanMinute }}) || (hour === {{ $scan3 }} && minutes >=
        //             {{ $scanMinute }}) &&
        //         (
        //             hour === {{ $scan3End }} &&
        //             minutes <= {{ $scanMinute }});

        //     return isButtonEnabled;
        // }

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
