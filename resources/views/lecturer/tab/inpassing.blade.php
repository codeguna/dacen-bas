<div class="tab-pane" id="inpassing">
    <!-- The timeline -->
    <div class="timeline timeline-inverse">
        <!-- timeline time label -->

        <!-- /.timeline-label -->
        <!-- timeline item -->
        @forelse ($lecturer->inpassings as $inpassing)
            <div class="time-label">
                <span class="bg-warning">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    {{ $inpassing->created_at->format('m-d-Y') }}
                </span>
            </div>
            <div id="certificate">
                <i class="fa fa-id-badge bg-primary" aria-hidden="true"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header">
                        <form action="{{ route('admin.inpassings.destroy', $inpassing->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            @can('delete_inpassing_dosen')
                                <button type="submit" class="btn btn-xs btn-danger mr-1"
                                    onclick="return confirm('Hapus data inpassing ini {{ $inpassing->inpassing->name }}?')">
                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                </button>
                            @endcan
                            <a href="#">Golongan/Pangkat: {{ $inpassing->inpassing->name }}</a>
                        </form>

                    </h3>
                    <div class="timeline-body">
                        <p>Tanggal Penetapan: {{ date('d F Y', strtotime($inpassing->determination_date)) }}</p>
                        <p>TMT: {{ date('d F Y', strtotime($inpassing->tmt)) }}</p>
                    </div>
                    <div class="timeline-footer">
                        <a href="{{ url('/data_inpassing_dosen/' . $inpassing->inpassing_attachment) }}"
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
                        Belum ada data Inpassing
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
