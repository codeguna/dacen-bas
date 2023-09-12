<div class="tab-pane" id="certificateLecturer">
    <!-- The timeline -->
    <div class="timeline timeline-inverse">
        <!-- timeline time label -->

        <!-- /.timeline-label -->
        <!-- timeline item -->
        @forelse ($lecturer->lecturerCertificates as $certificates)
            <div class="time-label">
                <span class="bg-warning">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    {{ $certificates->created_at->format('m-d-Y') }}
                </span>
            </div>
            <div id="certificate">
                <i class="fa fa-certificate bg-primary" aria-hidden="true"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header">
                        <form action="{{ route('admin.lecturer-certificates.destroy', $certificates->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-xs btn-danger mr-1"
                                onclick="return confirm('Hapus data sertifikat {{ $certificates->certificateType->name }}?')">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </button><a href="#">{{ $certificates->certificateType->name }}</a>
                        </form>

                    </h3>
                    <div class="timeline-body">
                        {{ $certificates->note }}
                    </div>
                    <div class="timeline-footer">
                        <a href="{{ url('/data_sertifikat_dosen/' . $certificates->certificate_attachment) }}"
                            class="text-cyan" target="_blank">
                            <i class="fa fa-paperclip" aria-hidden="true"></i> Sertifikat
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div id="certificate">
                <i class="fa fa-times bg-warning" aria-hidden="true"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header font-weight-bold">
                        Belum ada data Sertifikat
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
