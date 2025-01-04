<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @php
                    $i = 0;
                @endphp
                <div class="table-responsive">
                    <table id="example1" class="table table-hover">
                        <thead class="bg-primary">
                            <tr>
                                <th>#</th>
                                <th>Peserta</th>
                                <th>Nama Acara</th>
                                <th>Pemateri</th>
                                <th>Tgl. Mulai - Selesai</th>
                                <th>Status</th>
                                <th>Sertifikat</th>
                                <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Carbon\Carbon;
                            @endphp
                            @forelse ($employeeDevelopmentPersons as $pk)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $pk->user->name }}</td>
                                    <td>{{ $pk->employeeDevelopment->event_name }}</td>
                                    <td>{{ $pk->employeeDevelopment->speaker }}</td>
                                    <td>{{ Carbon::parse($pk->employeeDevelopment->start_date)->format('j F y') }}
                                        s/d {{ Carbon::parse($pk->employeeDevelopment->end_date)->format('j F y') }}
                                    </td>
                                    <td>
                                        @if ($pk->employeeDevelopment->is_approved == 1)
                                            <span class="badge bg-success">
                                                <i class="fa fa-check-circle" aria-hidden="true"></i> Terverifikasi
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                <i class="fa fa-times-circle" aria-hidden="true"></i> Belum
                                                Terverifikasi
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a
                                            href="{{ url('/data_pengembangan/' . $pk->certificate_attachment) }}" target="_blank">
                                            <i class="fa fa-paperclip" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('admin.employee-developments.show',$pk->employeeDevelopment->id) }}" target="_blank">
                                            <i class="fa fa-eye" aria-hidden="true"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr style="text-align: center">
                                    <td colspan="7">== data tidak ada ==</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="bg-primary">
                            <tr>
                                <th>#</th>
                                <th>Peserta</th>
                                <th>Nama Acara</th>
                                <th>Pemateri</th>
                                <th>Tgl. Mulai - Selesai</th>
                                <th>Status</th>
                                <th>Sertifikat</th>
                                <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
