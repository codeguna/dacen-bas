<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <title>{{ env('APP_NAME') }} | Rekapitulasi Ketidakhadiran Periode - {{ $start_date }}/ {{ $end_date }}
        </title>
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
                            {{-- <p class="header-text">Jumlah Hari Kerja {{ $total_day }} Hari dan {{ $total_hour }}
                                Jam</p> --}}
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
                                    <th>Alasan/Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $cuti = 1;
                                    $izin = 2;
                                    $izin_khusus = 3;
                                    $izin_waktu_kerja = 4;
                                    $sakit = 5;
                                    $tanpa_pemberitahuan = 6;
                                    $piket = 7;
                                    $pulang_cepat = 8;
                                    $tidak_absen_masuk = 9;
                                    $penggantian = 10;
                                    $izin_khusus_anak_menikah = 11;
                                    $izin_menikah = 12;
                                    $cuti_melahirkan = 13;
                                    $penelitian = 14;
                                    $pkm = 15;
                                @endphp
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->nomor_induk ?? 'NIP/NIDN not found!' }}</td>
                                        <td>{{ $user->name }}</td>
                                        @php
                                            $pin = $user->pin;
                                            $cuti_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $cuti)
                                                ->count();
                                            $izin_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $izin)
                                                ->count();
                                            $izin_khusus_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $izin_khusus)
                                                ->count();
                                            $izin_waktu_kerja_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $izin_waktu_kerja)
                                                ->count();
                                            $sakit_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $sakit)
                                                ->count();
                                            $tanpa_pemberitahuan_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $tanpa_pemberitahuan)
                                                ->count();
                                            $piket_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $piket)
                                                ->count();
                                            $pulang_cepat_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $pulang_cepat)
                                                ->count();
                                            $tidak_absen_masuk_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $tidak_absen_masuk)
                                                ->count();
                                            $penggantian_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $penggantian)
                                                ->count();
                                            $izin_khusus_anak_menikah_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $izin_khusus_anak_menikah)
                                                ->count();
                                            $izin_menikah_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $izin_menikah)
                                                ->count();
                                            $cuti_melahirkan_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $cuti_melahirkan)
                                                ->count();
                                            $penelitian_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $penelitian)
                                                ->count();
                                            $pkm_count = \App\Models\NotScanLog::where('pin', $pin)
                                                ->whereBetween(\DB::raw('DATE(date)'), [$start_date, $end_date])
                                                ->where('reason_id', $pkm)
                                                ->count();
                                        @endphp
                                        <td>
                                            @if ($cuti_count > 0)
                                                Cuti: {{ $cuti_count }} <br>
                                            @endif
                                            @if ($izin_count > 0)
                                                Izin: {{ $izin_count }} <br>
                                            @endif
                                            @if ($izin_khusus_count > 0)
                                                Izin Khusus: {{ $izin_khusus_count }} <br>
                                            @endif
                                            @if ($izin_waktu_kerja_count > 0)
                                                Izin Waktu Kerja: {{ $izin_waktu_kerja_count }} <br>
                                            @endif
                                            @if ($sakit_count > 0)
                                                Sakit: {{ $sakit_count }} <br>
                                            @endif
                                            @if ($tanpa_pemberitahuan_count > 0)
                                                Tanpa Pemberitahuan: {{ $tanpa_pemberitahuan_count }} <br>
                                            @endif
                                            @if ($piket_count > 0)
                                                Piket: {{ $piket_count }} <br>
                                            @endif
                                            @if ($pulang_cepat_count > 0)
                                                Pulang Cepat: {{ $pulang_cepat_count }} <br>
                                            @endif
                                            @if ($tidak_absen_masuk_count > 0)
                                                Tidak Absen Masuk: {{ $tidak_absen_masuk_count }} <br>
                                            @endif
                                            @if ($penggantian_count > 0)
                                                Penggantian: {{ $penggantian_count }} <br>
                                            @endif
                                            @if ($izin_khusus_anak_menikah_count > 0)
                                                Izin Khusus Anak Menikah: {{ $izin_khusus_anak_menikah_count }} <br>
                                            @endif
                                            @if ($izin_menikah_count > 0)
                                                Izin Menikah: {{ $izin_menikah_count }} <br>
                                            @endif
                                            @if ($cuti_melahirkan_count > 0)
                                                Cuti Melahirkan: {{ $cuti_melahirkan_count }} <br>
                                            @endif
                                            @if ($penelitian_count > 0)
                                                Penelitian: {{ $penelitian_count }} <br>
                                            @endif
                                            @if ($pkm_count > 0)
                                                Penelitian: {{ $pkm_count }} <br>
                                            @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8">== Tidak Ada Data ==</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <hr>
                        <small>
                            <em>Dicetak pada: {{ now() }}</em>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
