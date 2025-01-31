<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kop Surat - IDE LPKIA</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            .kop-surat {
                border-bottom: 2px solid #000;
                margin-bottom: 20px;
                padding-bottom: 15px;
            }

            .logo {
                width: 80px;
                height: auto;
            }

            .kop-text {
                text-align: left;
            }

            .kop-title {
                font-size: 1.5rem;
                font-weight: bold;
            }

            .kop-address {
                font-size: 1rem;
            }

            .footer {
                text-align: center;
                padding: 10px;
                background-color: #f2f2f2;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="kop-surat d-flex align-items-center">
                <div>
                    <img src="https://assets.siakadcloud.com/uploads/lpkia/logoaplikasi/642.jpg" alt="Logo IDE LPKIA"
                        class="logo">
                </div>
                <div class="ml-3 kop-text">
                    <div class="kop-title">Institut Digital Ekonomi LPKIA</div>
                    <div class="kop-address">Jalan Soekarno Hatta No. 456, Bandung</div>
                    <div class="kop-address"><i class="fas fa-phone"></i> 022-7564283 / 7564284</div>
                </div>
            </div>
            @php
                $dari = \Carbon\Carbon::parse($start_date)->format('j F Y');
                $sampai = \Carbon\Carbon::parse($end_date)->format('j F Y');
            @endphp
            <center>
                <h3>Daftar Pelamar | {{ $type }}</h3>
                <h4>Periode {{ $dari }} s/d {{ $sampai }}</h4>
            </center>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Melamar di</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kota Lahir</th>
                                    <th>Umur</th>
                                    <th>Tanggal Melamar Pekerjaan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($jobApplicant as $applicant)
                                    @php
                                        $birthDate = $applicant->born_date;
                                        $birthDateTimestamp = strtotime($birthDate);
                                        $age = date('Y') - date('Y', $birthDateTimestamp); // Jika bulan dan hari saat ini belum melewati bulan dan hari lahir, kurangi umur dengan satu tahun if (date('md', $birthDateTimestamp) > date('md')) { $age--; }
                                    @endphp
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $applicant->jobVacancy->department->name }}</td>
                                        <td>{{ $applicant->full_name }}</td>
                                        <td>
                                            @switch($applicant->level)
                                                @case(1)
                                                    SMA/SMK
                                                @break

                                                @case(2)
                                                    D1
                                                @break

                                                @case(3)
                                                    D3
                                                @break

                                                @case(4)
                                                    D4
                                                @break

                                                @case(5)
                                                    S1
                                                @break

                                                @case(6)
                                                    S2
                                                @break

                                                @case(7)
                                                    S3
                                                @break

                                                @default
                                            @endswitch | {{ $applicant->university }} -
                                            {{ $applicant->university_base }}</td>
                                        <td>
                                            @if ($applicant->gender == 1)
                                                Laki-laki
                                            @elseif ($applicant->gender == 2)
                                                Perempuan
                                            @endif
                                        </td>
                                        <td>
                                            {{ $applicant->born_place }}
                                        </td>
                                        <td>{{ $age }} tahun</td>
                                        <td>{{ $applicant->jobVacancy->created_at->diffForHumans() }}</td>
                                        <td> @switch($applicant->is_approved)
                                                @case(0)
                                                    <i class="fa fa-hourglass-start" aria-hidden="true"></i> Dalam
                                                    proses
                                                @break

                                                @case(1)
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    Diterima
                                                @break

                                                @case(2)
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                    Ditolak
                                                @break

                                                @case(3)
                                                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                                                    Sudah jadi Pegawai
                                                @break

                                                @default
                                            @endswitch
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <footer class="footer">
                <p>
                    <strong>&copy; {{ date('Y') }} IDE LPKIA.</strong>
                    All rights reserved. | Dicetak pada:
                    <span id="timestamp"></span>
                </p>
            </footer>
            <script>
                // Mengatur timestamp pada elemen span dengan id "timestamp"
                var timestampElement = document.getElementById('timestamp');
                var currentDate = new Date();
                var timestamp = currentDate.toLocaleString();
                timestampElement.innerHTML = timestamp;
            </script>
            <!-- Bootstrap JS, Popper.js, and jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

    </html>
