<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <title>{{ env('APP_NAME') }} | Rekapitulasi Kehadiran Periode - {{ $start_date }}/ {{ $end_date }}</title>
        <style>
            .header {
                padding: 10px;
                text-align: center;
            }

            .logo {
                width: auto;
                height: 50px;
                margin: 10px;
                background-image: url('logo.png');
                /* ganti dengan nama file logo Anda */
                background-size: cover;
                background-position: center;
                border-radius: 1px;
            }

            .header-text {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="header">
                            <img src="{{ asset('images/logo-lpkia.png') }}" alt="Logo" class="logo">
                            <h2>Rekapitulasi Kehadiran untuk Semua Departemen</h2>
                            <h3>Periode {{ Carbon\Carbon::parse($start_date)->format('d-M-Y') }} s/d Periode
                                {{ Carbon\Carbon::parse($end_date)->format('d-M-Y') }}</h3>
                            <p class="header-text">Jumlah Hari Kerja {{ $total_day }} Hari dan {{ $total_hour }}
                                Jam</p>
                        </div>
                        <div
                            style="border-bottom: 2px solid #000; border-bottom-width: 1px 1px 0.5px 0.5px; padding-bottom: 10px;">
                        </div>
                        <div style="border-bottom: 1px solid #000; padding-bottom: 10px; margin-bottom: 20px;"></div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIP/NIDN</th>
                                    <th>Nama</th>
                                    <th>Total Hari Hadir</th>
                                    <th>Presentase Kehadiran</th>
                                    <th>Total Jam Hadir</th>
                                    <th>Presentase Jam Hadir</th>
                                    <th>Total Terlambat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                  <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->nomor_induk }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>  
                                @empty
                                    <tr>
                                        <td colspan="8">== Tidak Ada Data ==</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
