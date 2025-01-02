<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @php
                    $i = 0;
                @endphp
                <table id="example1" class="table table-sm table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Bulan</th>
                            <th>Terlambat</th>
                            <th>PA Murni</th>
                            <th>Kontribusi</th>
                            <th>&Sigma; PA</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($performanceAppraisalsPersons as $pa)
                            @php
                                $pin = $pa->pin;
                                $totalMonth = App\Models\PerformanceAppraisal::where('pin', $pin)
                                    ->where('year', '=', $year)
                                    ->count();

                                $totalContribution = App\Models\PerformanceAppraisal::select('contribution')
                                    ->where('pin', $pin)
                                    ->where('year', '=', $year)
                                    ->sum('contribution');

                                $totalLate = App\Models\PerformanceAppraisal::select('late_total')
                                    ->where('pin', $pin)
                                    ->where('year', '=', $year)
                                    ->sum('late_total');

                                $totalPurePa = App\Models\PerformanceAppraisal::select('pure_pa')
                                    ->where('pin', $pin)
                                    ->where('year', '=', $year)
                                    ->sum('pure_pa');

                                $summaryPA = $totalPurePa + $totalContribution;

                                $avgLate = $totalMonth > 0 ? number_format($totalLate / $totalMonth, 2) : 0;
                                $avgPurePA = $totalMonth > 0 ? number_format($totalPurePa / $totalMonth, 2) : 0;
                                $avgContribution =  $totalMonth > 0 ? number_format($totalContribution / $totalMonth, 2) : 0;
                                $avgSummaryPA = $totalMonth > 0 ? number_format($summaryPA / $totalMonth, 2) : 0;
                            @endphp
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pa->user->name }}</td>
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
                                    @endswitch
                                </td>
                                <td>
                                    {{ $pa->late_total }}
                                </td>
                                <td>
                                    {{ $pa->pure_pa }}
                                </td>
                                <td>
                                    {{ $pa->contribution }}
                                </td>
                                <td>
                                    {{ $pa->pure_pa + $pa->contribution }}
                                </td>
                                <td>
                                    {{ $pa->note }}
                                </td>
                            </tr>
                            @empty
                                <tr style="text-align: center">
                                    <td colspan="8">== data tidak ada ==</td>
                                </tr>
                            @endforelse                                
                            <tr class="bg-primary">
                                <td class="text-center" colspan="3">
                                    <strong>&Sigma; Total</strong>
                                </td>
                                <td>
                                    <strong>{{ $totalLate ?? '' }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $totalPurePa ?? ''  }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $totalContribution ?? ''  }}</strong>
                                </td>
                                <td colspan="2">
                                    <strong>{{ $summaryPA ?? ''  }}</strong>
                                </td>
                            </tr>
                            <tr class="bg-success">
                                <td class="text-center" colspan="3">
                                    <strong>% Rata-rata</strong>
                                </td>
                                <td>
                                    <strong>{{ $avgLate ?? '' }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $avgPurePA ?? '' }}</strong>
                                </td>
                                <td>
                                    <strong>{{ $avgContribution?? ''  }}</strong>
                                </td>
                                <td colspan="2">
                                    <strong>{{ $avgSummaryPA ?? '' }}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
