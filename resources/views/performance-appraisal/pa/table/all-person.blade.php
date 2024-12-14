<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @php
                    $i = 0;
                @endphp
                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Periode - Tahun</th>
                            <th>Nama</th>
                            <th>Total Terlambat</th>
                            <th>PA Murni</th>
                            <th>Kontribusi</th>
                            <th>Total PA</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    @php
                        $totalPurePa = 0;
                        $totalContribution = 0;
                        $totalLate = 0;
                        $count = count($performanceAppraisals);
                    @endphp
                    <tbody>
                        @forelse ($performanceAppraisals as $pa)
                            @php
                                $totalPurePa += $pa->pure_pa;
                                $totalContribution += $pa->contribution;
                                $totalLate += $pa->late_total;
                            @endphp
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>
                                    @switch($pa->period)
                                        @case('01')
                                            Januari
                                        @break

                                        @case('02')
                                            Februari
                                        @break

                                        @case('03')
                                            Maret
                                        @break

                                        @case('04')
                                            April
                                        @break

                                        @case('05')
                                            Mei
                                        @break

                                        @case('06')
                                            Juni
                                        @break

                                        @case('07')
                                            Juli
                                        @break

                                        @case('08')
                                            Agustus
                                        @break

                                        @case('09')
                                            September
                                        @break

                                        @case('10')
                                            Oktober
                                        @break

                                        @case('11')
                                            November
                                        @break

                                        @case('12')
                                            Desember
                                        @break

                                        @default
                                            Invalid Month
                                    @endswitch - {{ $pa->year }}
                                </td>
                                <td>{{ $pa->user->name }}</td>
                                <td>{{ $pa->late_total }}</td>
                                <td>{{ $pa->pure_pa }}</td>
                                <td>{{ $pa->contribution }}</td>
                                <td>{{ $pa->contribution + $pa->pure_pa }}</td>
                                <td>{{ $pa->note }}</td>
                            </tr>
                            @empty
                                <tr style="text-align: center">
                                    <td colspan="7">== data tidak ada ==</td>
                                </tr>
                            @endforelse
                            @php
                                $averagePurePa = $count > 0 ? number_format($totalPurePa / $count, 2) : 0;
                                $averageContribution = $count > 0 ? number_format($totalContribution / $count, 2) : 0;
                                $averageLate = $count > 0 ? number_format($totalLate / $count, 2) : 0;
                                $averageAllPa =  $averagePurePa+$averageContribution;
                            @endphp
                        </tbody>
                        <thead>
                            <th colspan="3">Rata-rata:</th>
                            <th>{{ $averageLate }}</th>
                            <th>{{ $averagePurePa }}</th>
                            <th>{{ $averageContribution }}</th>
                            <th>{{ $averageAllPa }}</th>
                            <th></th>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
