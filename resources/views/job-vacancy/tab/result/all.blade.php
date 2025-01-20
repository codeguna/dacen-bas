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
                </div>
            </div>
            <center>
                <h3>Daftar Permintaan Pegawai</h3>
                <h4>Periode {{ $start_date }} s/d {{ $end_date }}</h4>
            </center>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Nama Permintaan</th>
                                    <th>Departmen</th>
                                    <th>Jumlah Kebutuhan</th>
                                    <th>Umur Minimum</th>
                                    <th>Umur Maksimum</th>
                                    <th>Berlaku dari</th>
                                    <th>Sampai</th>
                                    <th>Jumlah Pelamar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    use Carbon\Carbon;
                                @endphp
                                @forelse ($jobVacancies as $vacancy)
                                    @php
                                        $requestDate = \Carbon\Carbon::parse($vacancy->created_at)->format('j F Y');
                                    @endphp
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $requestDate }}</td>
                                        <td>{{ $vacancy->title }}</td>
                                        <td>{{ $vacancy->department->name }}</td>
                                        <td>{{ $vacancy->amount_needed }}</td>
                                        <td>{{ $vacancy->min_age }}</td>
                                        <td>{{ $vacancy->max_age }}</td>
                                        <td>{{ $vacancy->deadline }}</td>
                                        <td>{{ $vacancy->deadline }}</td>
                                        <td>
                                            @foreach ($vacancy->jobApplicant as $applicant)
                                                @if ($applicant)
                                                    @if ($loop->first)
                                                        {{ $applicant->count() }}
                                                    @endif
                                                @else
                                                    0
                                                @endif
                                            @endforeach
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

        <!-- Bootstrap JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
