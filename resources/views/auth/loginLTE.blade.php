<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description"
        content="HERA (Human Employee Records Archive). Sistem Penyimpanan Arsip Dosen dan Tenaga Kependidikan pada Departemen Biro Administrasi Sumberdaya">
    <meta name="keywords" content="archive, system, lpkia, ide, institut, digital, ekonomi, bandung">
    <meta name="author" content="Sistem Informasi Manajemen - IDE LPKIA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="{{ asset('images/thumb.jpg') }}" />
    <title>{{ ENV('APP_NAME') }} | Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('login-new/assets/css/login.css') }}">
</head>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="{{ asset('login-new/assets/images/login.jpg') }}" alt="login"
                            class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="{{ asset('login-new/assets/images/hera.png') }}" alt="logo"
                                    style="width:300px">
                            </div>
                            <p class="login-card-description">Isi Email dan Password untuk masuk Admin Panel.</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        type="email" name="email" id="email" autofocus
                                        value="{{ old('email') }}" placeholder="admin@secret.com">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        type="password" name="password" id="password" placeholder="********">
                                </div>
                                <button name="login" id="login" class="btn btn-block login-btn mb-4"
                                    type="submit"><i class="fa fa-lock" aria-hidden="true"></i> Login</button>
                            </form>
                            <p class="login-card-footer-text">
                                Mulai
                                Presensi? <a href="{{ url('auth/google') }}" class="text-reset">
                                    <b><img src="https://cdn-icons-png.flaticon.com/512/300/300221.png"
                                            style="height: 20px"> Klik/Tap Disini!</b> </a>
                            </p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Copyright</a>
                                <a href="https://www.linkedin.com/in/gunadhip/">
                                    <strong>
                                        MIS LPKIA © {{ date('Y') }}</strong>
                                </a>
                                <a href="#!">All rights reserved.</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>
