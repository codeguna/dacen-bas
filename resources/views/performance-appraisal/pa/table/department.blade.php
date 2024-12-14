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
                            <th class="text-center bg-primary" colspan="7">Total Keseluruhan</th>
                            <th class="text-center bg-success" colspan="10">Rata-rata Keseluruhan</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Bulan</th>
                            <th>Terlambat</th>
                            <th>PA Murni</th>
                            <th>Kontribusi</th>
                            <th>&Sigma; PA</th>
                            <th>% Terlambat</th>
                            <th>% PA Murni</th>
                            <th>% Kontribusi</th>
                            <th>% PA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($performanceAppraisalsDepartments as $pa)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pa->name }}</td>
                                <td>
                                    @php
                                        $pin = $pa->pin;
                                        $totalMonth = App\Models\PerformanceAppraisal::where('pin', $pin)
                                            ->where('year', '=', $year)
                                            ->count();
                                        $totalLate = App\Models\PerformanceAppraisal::select('late_total')
                                            ->where('pin', $pin)
                                            ->where('year', '=', $year)
                                            ->sum('late_total');
                                        $totalPurePa = App\Models\PerformanceAppraisal::select('pure_pa')
                                            ->where('pin', $pin)
                                            ->where('year', '=', $year)
                                            ->sum('pure_pa');
                                        $totalContribution = App\Models\PerformanceAppraisal::select('contribution')
                                            ->where('pin', $pin)
                                            ->where('year', '=', $year)
                                            ->sum('contribution');
                                        $summaryPA = $totalPurePa + $totalContribution;
                                        $avgLate = $totalMonth > 0 ? number_format($totalLate / $totalMonth, 2) : 0;
                                        $avgPurePA = $totalMonth > 0 ? number_format($totalPurePa / $totalMonth, 2) : 0;
                                        $avgContribution = $totalMonth > 0 ? number_format($totalContribution / $totalMonth, 2) : 0;
                                        $avgSummaryPA = $totalMonth > 0 ? number_format($summaryPA / $totalMonth, 2) : 0;
                                    @endphp
                                    {{ $totalMonth }}
                                </td>
                                <td>
                                    {{ $totalLate }}
                                </td>
                                <td>
                                    {{ $totalPurePa }}
                                </td>
                                <td>
                                    {{ $totalContribution }}
                                </td>
                                <td>
                                    {{ $summaryPA }}
                                </td>
                                <td>
                                    {{ $avgLate }}
                                </td>
                                <td>
                                    {{ $avgPurePA }}
                                </td>
                                <td>
                                    {{ $avgContribution }}
                                </td>
                                <td>
                                    {{ $avgSummaryPA }}
                                </td>
                            </tr>
                        @empty
                            <tr style="text-align: center">
                                <td colspan="7">== data tidak ada ==</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
