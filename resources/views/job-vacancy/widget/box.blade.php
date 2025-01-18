<div class="row">
    <div class="col-md-12">
        <h3><i class="fas fa-chalkboard"></i> Dashboard Permintaan Kerja Tahun {{ date('Y') }}</h3>
    </div>
    <div class="col-md-12">
        <div class="small-box bg-lightblue">
            <div class="inner">
                <h3>{{ $vacancyRequest }}</h3>

                <p>Permintaan Lowongan</p>
            </div>
            <div class="icon">
                <i class="fa fa-check-circle" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-orange">
            <div class="inner">
                <h3>{{ $applicantCount }}</h3>

                <p>Pelamar Masuk</p>
            </div>
            <div class="icon">
                <i class="fa fa-hourglass-end" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $proses }}</h3>

                <p>Pelamar Belum Diproses</p>
            </div>
            <div class="icon">
            <i class="fa fa-cog" aria-hidden="true"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $accepted }}</h3>

                <p>Pelamar Diterima</p>
            </div>
            <div class="icon">
                <i class="fas fa-handshake"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $notAccepted }}</h3>

                <p>Pelamar Ditolak</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-times"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>