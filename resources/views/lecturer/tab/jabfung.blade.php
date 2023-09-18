<div class="tab-pane active" id="functional">
    <!-- The timeline -->
    <div class="timeline timeline-inverse">
        <!-- timeline time label -->

        <!-- /.timeline-label -->
        <!-- timeline item -->
        @forelse ($lecturer->lecturerFunctionalPositions as $positions)
            <div class="time-label">
                <span class="bg-warning">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    {{ $positions->created_at->format('m-d-Y') }}
                </span>
            </div>
            <div id="certificate">
                <i class="fa fa-user-check bg-primary" aria-hidden="true"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header">
                        <form action="{{ route('admin.lecturer-functional-positions.destroy', $positions->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            @can('delete_jabfung_dosen')
                                <button type="submit" class="btn btn-xs btn-danger mr-1"
                                    onclick="return confirm('Hapus data sertifikat {{ $positions->functionalPosition->name }}?')">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            @endcan
                            <a href="#">{{ $positions->functionalPosition->name }}</a>
                        </form>

                    </h3>
                    <div class="timeline-body">
                        <p>Tanggal Penetapan: {{ date('d F Y', strtotime($positions->determination_date)) }}</p>
                        <p>TMT: {{ date('d F Y', strtotime($positions->tmt)) }}</p>
                        <p>Angka Kredit: {{ $positions->credit_score }}</p>
                    </div>
                    <div class="timeline-footer">
                        <a href="{{ url('/data_jabfung_dosen/' . $positions->functional_position_attachment) }}"
                            class="text-cyan" target="_blank">
                            <i class="fa fa-paperclip" aria-hidden="true"></i> Lampiran
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div id="certificate">
                <i class="fa fa-times bg-warning" aria-hidden="true"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header font-weight-bold">
                        Belum ada data Jabatan Fungsional
                    </h3>
                    <div class="timeline-body">
                        Silahkan tambahkan dengan klik tombol plus diatas
                    </div>
                </div>
            </div>
        @endforelse
        <!-- END timeline item -->
    </div>
</div>
