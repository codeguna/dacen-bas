<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ env('APP_NAME') }} - @yield('template_title')</title>
        <!-- DataTable -->
        <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('adminLTE/plugins/select2/css/select2.min.css') }}">
        <link rel="stylesheet"
            href="{{ asset('adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        @yield('scripts-head')
        @stack('custom-scripts')
    </head>

    <body class="hold-transition sidebar-mini">
        <script src="{{ asset('/js/jquery.js') }}"></script>
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                @php
                    $now = now();
                    $birthdayCount = \App\User::select('birthday', 'name')
                        ->whereMonth('birthday', $now->month)
                        ->whereDay('birthday', $now->day)
                        ->orderBy('birthday', 'ASC')
                        ->count();
                    $birthdayGet = \App\User::select('birthday', 'name')
                        ->whereMonth('birthday', $now->month)
                        ->whereDay('birthday', $now->day)
                        ->orderBy('birthday', 'ASC')
                        ->get();
                @endphp
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            @if ($birthdayCount == 0)
                                <i class="fas fa-birthday-cake text-muted"></i>
                            @else
                                <i class="fas fa-birthday-cake text-pink beat-fade-icon"></i>
                                <span class="badge badge-warning navbar-badge">{{ $birthdayCount }}</span>
                            @endif



                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">{{ $birthdayCount }} orang Ulang Tahun</span>
                            @forelse ($birthdayGet as $birthday)
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-birthday-cake mr-2"></i> {{ $birthday->name }}
                                    <span
                                        class="float-right text-muted text-xs">{{ \Carbon\Carbon::parse($birthday->birthday)->format('j F') }}</span>
                                </a>
                            @empty
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-birthday-cake mr-2"></i> Tidak ada
                                    <span class="float-right text-muted text-sm"><i
                                            class="fas fa-times-circle"></i></span>
                                </a>
                            @endforelse
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="#" class="brand-link">
                    <img src="{{ asset('adminLTE/dist/img/dacen.png') }}" alt="AdminLTE Logo"
                        class="brand-image elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        @php
                            function getInitials($fullName)
                            {
                                $words = explode(' ', $fullName);
                                $initials = '';

                                foreach ($words as $word) {
                                    $initials .= strtoupper($word[0]);
                                    if (strlen($initials) == 2) {
                                        break; // Stop after getting the first two initials
                                    }
                                }

                                return $initials;
                            }

                            $fullName = Auth::user()->name;
                            $initials = getInitials($fullName);
                        @endphp
                        @if (Auth::User()->photo == null)
                            <div class="image">
                                <div class="avatar">{{ $initials }}</div>
                            </div>
                        @else
                            <img class="avatar" src="/data_photo_profil/{{ Auth::User()->photo }}"
                                alt="User profile picture">
                        @endif
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::User()->name }}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    @include('partials.menuLTE')
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h1 class="m-0">
                                    @yield('title')
                                </h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    <em>
                        "<small id="quote"></small>"
                    </em>
                </div>
                <!-- Default to the left -->
                <strong>Copyright <a href="https://www.linkedin.com/in/gunadhip/" target="_blank">
                        {{ env('APP_AUTHOR') }}</a> &copy;
                    {{ date('Y') }} </strong> All
                rights
                reserved.
            </footer>
        </div>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/chart.js/Chart.min.js') }}"></script>
        <!-- REQUIRED SCRIPTS -->
        <script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
        <!-- SLEECT2 -->
        <!-- Select2 -->
        <script src="{{ asset('adminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
        @yield('scripts')
        <script>
            const quotes = ["Bekerja keras hari ini, biar besok bisa malas-malasan tanpa merasa bersalah. 😎✨",
                "Ingat, kopi cuma motivasi sementara. Kerja keras yang bikin bos senyum lebar. ☕💪",
                "Waktu bukan uang, tapi waktu kerja itu mahal harganya. Jangan disia-siakan! ⏳💼",
                "Semangat kerja itu kayak Wi-Fi kafe, kadang lemot tapi tetap butuh! 📶😉",
                "Kerja sesuai waktu biar gaji dan tunjangan aman di kantong. 🤑💰",
                "Kerja serius dulu, becanda nanti. Jangan sampai terbalik ya! 😂📈",
                "Kerja keras itu kayak olahraga, capek tapi bikin sehat dompet. 🏋️‍♂️💵",
                "Semangat kerja seperti Superman! Tapi ingat, Batman juga punya hari libur. 🦸‍♂️🦇",
                "Kapan lagi bisa bangun pagi? Biar pas pensiun bisa bangun siang. ⏰🔜😴",
                "Kerja keras hari Senin, biar Jumat bisa ngopi sambil santai. ☕➡️🛋️",
                "Bekerjalah seakan-akan atasanmu mengawasi, karena mungkin dia memang sedang begitu. 👀💼",
                "Bekerja itu seperti nonton drama, penuh konflik tapi menarik. 📺😅",
                "Kerja keras sekarang, biar weekend bisa happy tanpa beban. 🥳📅",
                "Jangan lupa, kerja keras hari ini adalah investasi masa depan. 💪🔮",
                "Kerja itu ibarat cinta, kadang butuh pengorbanan biar hasilnya manis. ❤️💼",
                "Semangat kerja bukan cuma soal target, tapi juga soal perjalanan. 🎯🚀",
                "Kerja sesuai waktu biar nggak usah nunggu gajian terlalu lama. ⏰💸",
                "Bekerja keras di pagi hari biar malam bisa tidur nyenyak. 🌞💤",
                "Semangat kerja itu kayak bensin, kadang perlu diisi ulang. ⛽🔋",
                "Bekerjalah dengan sepenuh hati, biar hasilnya juga maksimal. ❤️📊",
                "Kerja keras itu kayak menabung, sedikit demi sedikit lama-lama jadi bukit. 🏦⛰️",
                "Ingat, kerja keras adalah kunci kesuksesan, tapi jangan lupa istirahat juga. 🗝️😌",
                "Semangat kerja itu kayak playlist favorit, bikin hari-hari lebih bersemangat! 🎧🎶",
                "Kerja itu kayak puzzle, setiap potongan penting untuk gambaran besar. 🧩🏢",
                "Rajin bekerja bukan cuma buat atasan, tapi juga buat masa depan kita sendiri. 🚀🌟"
            ];

            function generateQuote() {
                const randomIndex = Math.floor(Math.random() * quotes.length);
                document.getElementById("quote").innerText = quotes[randomIndex];
            }
            window.onload = generateQuote; // Call generateQuote function when the page loads 
        </script>
    </body>

</html>
