<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @can('create_attendances')
            <li class="nav-item">
                <a href="{{ route('admin.scan-logs.create') }}"
                    class="nav-link {{ request()->is('admin/scan-logs/create') || request()->is('admin/scan-logs/create/*') ? 'active' : '' }}">
                    <i class="fas fa-check-circle nav-icon"></i>
                    <p>
                        Lakukan Presensi
                    </p>
                </a>
            </li>
        @endcan
        @can('create_request_attendances')
            <li class="nav-item">
                <a href="{{ route('admin.scan-log.request-attendances') }}"
                    class="nav-link {{ request()->is('admin/scan-log/request_attendances') || request()->is('admin/scan-log/request_attendances/*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-home" aria-hidden="true"></i>
                    <p>
                        Presensi Luar
                    </p>
                </a>
            </li>
        @endcan
        @can('view_attendances')
            <li class="nav-item">
                <a href="{{ route('admin.scan-log.my-attendances') }}"
                    class="nav-link {{ request()->is('admin/scan-log/myattendances') || request()->is('admin/scan-log/myattendances/*') ? 'active' : '' }}">
                    <i class="fas fa-eye nav-icon"></i>
                    <p>
                        Lihat Presensi
                    </p>
                </a>
            </li>
        @endcan
        @can('view_profile')
            <li class="nav-item">
                <a href="{{ url('admin/myprofile') }}"
                    class="nav-link {{ request()->is('admin/myprofile') || request()->is('admin/myprofile/*') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-user-check" aria-hidden="true"></i>
                    <p>
                        Profil Saya
                    </p>
                </a>
            </li>
        @endcan


        @can('bas_menu')
            <!-- Add icons to the links using the .nav-icon class
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.home') }}"
                    class="nav-link {{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li
                class="nav-item {{ request()->is('admin/lecturers/*') ||
                request()->is('admin/lecturers') ||
                request()->is('admin/lecturer/inactive/*') ||
                request()->is('admin/lecturer/inactive') ||
                request()->is('admin/lecturer/setstatus/*') ||
                request()->is('admin/lecturer/setstatus')
                    ? 'menu-open'
                    : '' }}">
                <a href="#"
                    class="nav-link 
        {{ request()->is('admin/lecturers/*') ||
        request()->is('admin/lecturers') ||
        request()->is('admin/lecturer/inactive/*') ||
        request()->is('admin/lecturer/inactive') ||
        request()->is('admin/lecturer/setstatus/*') ||
        request()->is('admin/lecturer/setstatus')
            ? 'active'
            : '' }}">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p>
                        Dosen
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.lecturers.index') }}"
                            class="nav-link {{ request()->is('admin/lecturers') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-check-circle"></i>
                            <p>Aktif</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.lecturer.inactive') }}"
                            class="nav-link {{ request()->is('admin/lecturer/inactive') || request()->is('admin/lecturer/inactive/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-times-circle"></i>
                            <p>Tidak Aktif</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.lecturers.create') }}"
                            class="nav-link {{ request()->is('admin/lecturers/create') || request()->is('admin/lecturers/create/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-plus"></i>
                            <p>Tambah Dosen</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item {{ request()->is('admin/dashboard/dosen-prodi/*') ||
                request()->is('admin/dashboard/dosen-prodi') ||
                request()->is('admin/dashboard/jabatan-akademik') ||
                request()->is('admin/dashboard/jabatan-akademik/*') ||
                request()->is('admin/dashboard/golongan-dosen') ||
                request()->is('admin/dashboard/golongan-dosen/*')
                    ? 'menu-open'
                    : '' }}">
                <a href="#"
                    class="nav-link  {{ request()->is('admin/dashboard/dosen-prodi/*') ||
                    request()->is('admin/dashboard/dosen-prodi') ||
                    request()->is('admin/dashboard/jabatan-akademik') ||
                    request()->is('admin/dashboard/jabatan-akademik/*') ||
                    request()->is('admin/dashboard/golongan-dosen') ||
                    request()->is('admin/dashboard/golongan-dosen/*')
                        ? 'active'
                        : '' }}">
                    <i class="fas fa-user-graduate nav-icon"></i>
                    <p>
                        Dosen Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.dosen-prodi') }}"
                            class="nav-link {{ request()->is('admin/dashboard/dosen-prodi') || request()->is('admin/dashboard/dosen-prodi/*') ? 'active' : '' }}">
                            <i class="fas fa-university nav-icon"></i>
                            <p>Per Prodi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.jabatan-akademik') }}"
                            class="nav-link {{ request()->is('admin/dashboard/jabatan-akademik') || request()->is('admin/dashboard/jabatan-akademik/*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie nav-icon"></i>
                            <p>Per Jabatan Akademik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard.golongan-dosen') }}"
                            class="nav-link {{ request()->is('admin/dashboard/golongan-dosen') || request()->is('admin/dashboard/golongan-dosen/*')
                                ? 'active'
                                : '' }}">
                            <i class="fas fa-pallet nav-icon"></i>
                            <p>Per Golongan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-arrow-up nav-icon"></i>
                            <p>Pengembangan Dosen</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item {{ request()->is('admin/educational-staffs/*') ||
                request()->is('admin/educational-staffs') ||
                request()->is('admin/educational-staff/inactive')
                    ? 'menu-open'
                    : '' }}">
                <a href="#"
                    class="nav-link 
        {{ request()->is('admin/educational-staffs/*') ||
        request()->is('admin/educational-staffs') ||
        request()->is('admin/educational-staff/inactive')
            ? 'active'
            : '' }}">
                    <i class="nav-icon fa fa-user-check"></i>
                    <p>
                        Tendik
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.educational-staffs.index') }}"
                            class="nav-link {{ request()->is('admin/educational-staffs') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-check-circle"></i>
                            <p>Aktif</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.educational-staff.inactive') }}"
                            class="nav-link {{ request()->is('admin/educational-staff/inactive') || request()->is('admin/educational-staff/inactive/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-times-circle"></i>
                            <p>Tidak Aktif</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.educational-staffs.create') }}"
                            class="nav-link {{ request()->is('admin/educational-staffs/create') || request()->is('admin/educational-staffs/create/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-plus"></i>
                            <p>Tambah Tendik</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item {{ request()->is('admin/birthday/*') || request()->is('admin/birthday/select') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->is('admin/birthday/*') ||
                    request()->is('admin/birthday/select') ||
                    request()->is('admin/birthday/result') ||
                    request()->is('admin/birthday/result/*')
                        ? 'active'
                        : '' }}">
                    <i class="fas fa-birthday-cake nav-icon"></i>
                    <p>
                        Ulang Tahun
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.birthday.select') }}"
                            class="nav-link {{ request()->is('admin/birthday/select') ||
                            request()->is('admin/birthday/select/*') ||
                            request()->is('admin/birthday/result') ||
                            request()->is('admin/birthday/result/*')
                                ? 'active'
                                : '' }}">
                            <i class="fas fa-search nav-icon"></i>
                            <p>Cari Ulang Tahun</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item {{ request()->is('admin/scan-log/select-period/presences/*') || request()->is('admin/scan-log/select-period/precences') ? 'menu-open' : '' }}">
                <a
                    href="#"class="nav-link {{ request()->is('admin/scan-log/select-period/presences/*') || request()->is('admin/scan-log/select-period/precences') ? 'active' : '' }}">
                    <i class="fa fa-book nav-icon" aria-hidden="true"></i>
                    <p>
                        Rekapitulasi
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.select-recap-presences') }}"
                            class="nav-link {{ request()->is('admin/scan-log/select-period/presences') ? 'active' : '' }}">
                            <i class="fa fa-table nav-icon" aria-hidden="true"></i>
                            <p>Kehadiran</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.lecturer.inactive') }}"
                            class="nav-link {{ request()->is('admin/lecturer/inactive') || request()->is('admin/lecturer/inactive/*') ? 'active' : '' }}">
                            <i class="fa fa-user-times nav-icon" aria-hidden="true"></i>
                            <p>Ketidakhadiran Staf</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li
                class="nav-item {{ request()->is('admin/scan-logs') ||
                request()->is('admin/scan-logs/*') ||
                request()->is('admin/scan-log/filter') ||
                request()->is('admin/scan-log/view_request_attendances') ||
                request()->is('admin/scan-log/view_request_attendances/*') ||
                request()->is('admin/scan-log/detail') ||
                request()->is('admin/scan-logs/detail/*') ||
                request()->is('admin/scan-logs-extras') ||
                request()->is('admin/scan-logs-extras/*') ||
                request()->is('admin/scan-log-extra/filter') ||
                request()->is('admin/scan-log-extra/filter/*') ||
                request()->is('admin/scan-log/detail/filter') ||
                request()->is('admin/scan-log/detail/filter/*') ||
                request()->is('admin/scan-log/print') ||
                request()->is('admin/scan-log/print/*') ||
                request()->is('admin/scan-log/check_attendances') ||
                request()->is('admin/scan-log/check_attendances/*') ||
                request()->is('admin/scan-log/check_attendances_filter') ||
                request()->is('admin/scan-log/check_attendances_filter/*') ||
                request()->is('admin/scan-log/check-late') ||
                request()->is('admin/scan-log/check-late/*') ||
                request()->is('admin/scan-log/result-late') ||
                request()->is('admin/scan-log/result-late/*') ||
                request()->is('admin/scan-log/select-period-total-hours') ||
                request()->is('admin/scan-log/select-period-total-hours/*') ||
                request()->is('admin/scan-log/result-total-hours') ||
                request()->is('admin/scan-log/result-total-hours/*') ||
                request()->is('admin/scan-log/select-missing-date') ||
                request()->is('admin/scan-log/select-missing-date/*') ||
                request()->is('admin/scan-log/import') ||
                request()->is('admin/scan-log/import/*')
                    ? 'menu-open'
                    : '' }}">
                <a href="#"
                    class="nav-link {{ request()->is('admin/scan-logs') ||
                    request()->is('admin/scan-logs/*') ||
                    request()->is('admin/scan-log/filter') ||
                    request()->is('admin/scan-log/view_request_attendances') ||
                    request()->is('admin/scan-log/view_request_attendances/*') ||
                    request()->is('admin/scan-log/detail') ||
                    request()->is('admin/scan-logs/detail/*') ||
                    request()->is('admin/scan-logs-extras') ||
                    request()->is('admin/scan-logs-extras/*') ||
                    request()->is('admin/scan-log-extra/filter') ||
                    request()->is('admin/scan-log-extra/filter/*') ||
                    request()->is('admin/scan-log/detail/filter') ||
                    request()->is('admin/scan-log/detail/filter/*') ||
                    request()->is('admin/scan-log/print') ||
                    request()->is('admin/scan-log/print/*') ||
                    request()->is('admin/scan-log/check_attendances') ||
                    request()->is('admin/scan-log/check_attendances/*') ||
                    request()->is('admin/scan-log/check_attendances_filter') ||
                    request()->is('admin/scan-log/check_attendances_filter/*') ||
                    request()->is('admin/scan-log/check-late') ||
                    request()->is('admin/scan-log/check-late/*') ||
                    request()->is('admin/scan-log/result-late') ||
                    request()->is('admin/scan-log/result-late/*') ||
                    request()->is('admin/scan-log/select-period-total-hours') ||
                    request()->is('admin/scan-log/select-period-total-hours/*') ||
                    request()->is('admin/scan-log/result-total-hours') ||
                    request()->is('admin/scan-log/result-total-hours/*') ||
                    request()->is('admin/scan-log/select-missing-date') ||
                    request()->is('admin/scan-log/select-missing-date/*') ||
                    request()->is('admin/scan-log/import') ||
                    request()->is('admin/scan-log/import/*')
                        ? 'active'
                        : '' }}">
                    <i class="nav-icon fa fa-history" aria-hidden="true"></i>
                    @php
                        $cekPengajuanPresensi = \App\Models\AttendancesRequest::where('status', 0)->count();
                    @endphp
                    <p>
                        Scan Logs
                        <i class="right fas fa-angle-left"></i>
                        @if ($cekPengajuanPresensi > 0)
                            <span class="right badge badge-danger">+{{ $cekPengajuanPresensi }}</span>
                        @endif
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.select-missing-date') }}"
                            class="nav-link {{ request()->is('admin/scan-log/select-missing-date') || request()->is('admin/scan-log/select-missing-date/*') ? 'active' : '' }}">
                            <i class="fa fa-download nav-icon" aria-hidden="true"></i>
                            <p>Tarik Presensi Manual</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.select-period-total-hours') }}"
                            class="nav-link {{ request()->is('admin/scan-log/select-period-total-hours') || request()->is('admin/scan-log/select-period-total-hours/*') || request()->is('admin/scan-log/result-total-hours') || request()->is('admin/scan-log/result-total-hours/*') ? 'active' : '' }}">
                            <i class="fas fa-stopwatch nav-icon"></i>
                            <p>Jam Kerja</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.view-request-attendances') }}"
                            class="nav-link {{ request()->is('admin/scan-log/view_request_attendances') || request()->is('admin/scan-logs/view_request_attendances/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-hourglass-start" aria-hidden="true"></i>
                            <p>Pengajuan Presensi</p>
                            @if ($cekPengajuanPresensi > 0)
                                <span class="right badge badge-danger">+{{ $cekPengajuanPresensi }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-logs-extras.index') }}"
                            class="nav-link {{ request()->is('admin/scan-logs-extras') || request()->is('admin/scan-logs-extras/*') ? 'active' : '' }}">
                            <i class="fas fa-user-clock nav-icon"></i>
                            <p>Report Presensi Luar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scanlogs.detail') }}"
                            class="nav-link {{ request()->is('admin/scan-log/detail') ||
                            request()->is('admin/scan-log/detail/*') ||
                            request()->is('admin/scan-log/detail/filter') ||
                            request()->is('admin/scan-log/detail/filter/*')
                                ? 'active'
                                : '' }}">
                            <i class="nav-icon fa fa-book" aria-hidden="true"></i>
                            <p>Detail Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-logs.index') }}"
                            class="nav-link {{ request()->is('admin/scan-logs') || request()->is('admin/scan-logs/*') || request()->is('admin/scan-log/filter') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-archive" aria-hidden="true"></i>
                            <p>Semua Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scanlogs.print') }}"
                            class="nav-link {{ request()->is('admin/scan-log/print') || request()->is('admin/scan-log/print/*') || request()->is('admin/scan-log/filter') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-csv"></i>
                            <p>Export Data</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.check-attendances') }}"
                            class="nav-link {{ request()->is('admin/scan-log/check_attendances') || request()->is('admin/scan-log/check_attendances/*') || request()->is('admin/scan-log/check_attendances_filter') || request()->is('admin/scan-log/check_attendances_filter/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-puzzle-piece"></i>
                            <p>Kelengkapan Presensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.selectLate') }}"
                            class="nav-link {{ request()->is('admin/scan-log/check-late') || request()->is('admin/scan-log/check-late/*') || request()->is('admin/scan-log/result-late/*') || request()->is('admin/scan-log/result-late') ? 'active' : '' }}">
                            <i class="fa fa-user-times nav-icon" aria-hidden="true"></i>
                            <p>Presensi Terlambat/Pulang Cepat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.view-import-scan') }}"
                            class="nav-link {{ request()->is('admin/scan-log/import') || request()->is('admin/scan-log/import/*') || request()->is('admin/scan-log/result-late/*') || request()->is('admin/scan-log/result-late') ? 'active' : '' }}">
                            <i class="fa fa-database nav-icon" aria-hidden="true"></i>
                            <p>Import Presensi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-log.view-import-scan') }}"
                            class="nav-link {{ request()->is('admin/scan-log/import') || request()->is('admin/scan-log/import/*') || request()->is('admin/scan-log/result-late/*') || request()->is('admin/scan-log/result-late') ? 'active' : '' }}">
                            <i class="fa fa-database nav-icon" aria-hidden="true"></i>
                            <p>Input Ketidakhadiran</p>
                        </a>
                    </li>
                </ul>
            <li
                class="nav-item {{ request()->is('admin/homebases/*') ||
                request()->is('admin/homebases') ||
                request()->is('admin/departmens/*') ||
                request()->is('admin/departmens') ||
                request()->is('admin/universities/*') ||
                request()->is('admin/universities') ||
                request()->is('admin/study-programs/*') ||
                request()->is('admin/study-programs') ||
                request()->is('admin/levels/*') ||
                request()->is('admin/levels') ||
                request()->is('admin/knowledges/*') ||
                request()->is('admin/knowledges') ||
                request()->is('admin/functional-positions/*') ||
                request()->is('admin/functional-positions') ||
                request()->is('admin/functional-ranks/*') ||
                request()->is('admin/functional-ranks') ||
                request()->is('admin/certificate-types/*') ||
                request()->is('admin/certificate-types') ||
                request()->is('admin/activities') ||
                request()->is('admin/activities/*') ||
                request()->is('admin/willingnesses') ||
                request()->is('admin/willingnesses/*') ||
                request()->is('admin/holidays') ||
                request()->is('admin/holidays/*')
                    ? 'menu-open'
                    : '' }}">
                <a href="#"
                    class="nav-link 
        {{ request()->is('admin/homebases/*') ||
        request()->is('admin/homebases') ||
        request()->is('admin/departmens/*') ||
        request()->is('admin/departmens') ||
        request()->is('admin/universities/*') ||
        request()->is('admin/universities') ||
        request()->is('admin/study-programs/*') ||
        request()->is('admin/study-programs') ||
        request()->is('admin/levels/*') ||
        request()->is('admin/levels') ||
        request()->is('admin/knowledges/*') ||
        request()->is('admin/knowledges') ||
        request()->is('admin/functional-positions/*') ||
        request()->is('admin/functional-positions') ||
        request()->is('admin/functional-ranks/*') ||
        request()->is('admin/functional-ranks') ||
        request()->is('admin/certificate-types/*') ||
        request()->is('admin/certificate-types') ||
        request()->is('admin/activities') ||
        request()->is('admin/activities/*') ||
        request()->is('admin/willingnesses') ||
        request()->is('admin/willingnesses/*') ||
        request()->is('admin/holidays') ||
        request()->is('admin/holidays/*')
            ? 'active'
            : '' }}">
                    <i class="nav-icon fa fa-cogs"></i>
                    <p>
                        Setup
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.activities.index') }}"
                            class="nav-link {{ request()->is('admin/activities') || request()->is('admin/activities/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-hashtag" aria-hidden="true"></i>
                            <p>Aktivitas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.knowledges.index') }}"
                            class="nav-link {{ request()->is('admin/knowledges') || request()->is('admin/knowledges/*') ? 'active' : '' }}">
                            <i class="fas fa-lightbulb nav-icon"></i>
                            <p>Bidang Ilmu</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.departmens.index') }}"
                            class="nav-link {{ request()->is('admin/departmens') || request()->is('admin/departmens/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-flag"></i>
                            <p>Departemen</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.functional-ranks.index') }}"
                            class="nav-link {{ request()->is('admin/functional-ranks') || request()->is('admin/functional-ranks/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-id-badge" aria-hidden="true"></i>
                            <p>Golongan/Pangkat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.holidays.index') }}"
                            class="nav-link {{ request()->is('admin/holidays') || request()->is('admin/holidays/*') ? 'active' : '' }}">
                            <i class="fas fa-info-circle nav-icon"></i>
                            <p>Hari Libur</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.homebases.index') }}"
                            class="nav-link {{ request()->is('admin/homebases') || request()->is('admin/homebases/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Homebase</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.functional-positions.index') }}"
                            class="nav-link {{ request()->is('admin/functional-positions') || request()->is('admin/functional-positions/*') ? 'active' : '' }}">
                            <i class="fas fa-angle-double-down nav-icon"></i>
                            <p>Jabatan Fungsional</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.certificate-types.index') }}"
                            class="nav-link {{ request()->is('admin/certificate-types') || request()->is('admin/certificate-types/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-certificate" aria-hidden="true"></i>
                            <p>Jenis Sertifikat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.levels.index') }}"
                            class="nav-link {{ request()->is('admin/levels') || request()->is('admin/levels/*') ? 'active' : '' }}">
                            <i class="fas fa-sort nav-icon"></i>
                            <p>Jenjang Pendidikan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.willingnesses.index') }}"
                            class="nav-link {{ request()->is('admin/willingnesses') || request()->is('admin/willingnesses/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-clock"></i>
                            <p>Kesediaan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.study-programs.index') }}"
                            class="nav-link {{ request()->is('admin/study-programs') || request()->is('admin/study-programs/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>Program Studi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.universities.index') }}"
                            class="nav-link {{ request()->is('admin/universities') || request()->is('admin/universities/*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-university"></i>
                            <p>Universitas</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        @can('users_manage')
            <li
                class="nav-item {{ request()->is('admin/roles/*') ||
                request()->is('admin/roles') ||
                request()->is('admin/permissions') ||
                request()->is('admin/permissions/*') ||
                request()->is('admin/users') ||
                request()->is('admin/users/*') ||
                request()->is('admin/user/view_users_pin') ||
                request()->is('admin/user/view_users_pin/*') ||
                request()->is('admin/user/set_users_pin') ||
                request()->is('admin/user/set_users_pin/*') ||
                request()->is('admin/logs') ||
                request()->is('admin/logs/*')
                    ? 'menu-open'
                    : '' }}">
                <a href="#"
                    class="nav-link {{ request()->is('admin/roles/*') ||
                    request()->is('admin/roles') ||
                    request()->is('admin/permissions') ||
                    request()->is('admin/permissions/*') ||
                    request()->is('admin/users') ||
                    request()->is('admin/users/*') ||
                    request()->is('admin/user/view_users_pin') ||
                    request()->is('admin/user/view_users_pin/*') ||
                    request()->is('admin/user/set_users_pin') ||
                    request()->is('admin/user/set_users_pin/*') ||
                    request()->is('admin/logs') ||
                    request()->is('admin/logs/*')
                        ? 'active'
                        : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Users Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}"
                            class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="far fas fa-unlock-alt nav-icon"></i>
                            <p>Permissions</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}"
                            class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="far fas fa-briefcase nav-icon"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="far fas fa-user nav-icon"></i>
                            <p>Users</p>
                        </a>
                    <li class="nav-item">
                        <a href="{{ route('admin.user.pin') }}"
                            class="nav-link {{ request()->is('admin/user/view_users_pin') || request()->is('admin/user/view_users_pin/*') || request()->is('admin/user/set_users_pin/*') || request()->is('admin/user/set_users_pin/*') ? 'active' : '' }}">
                            <i class="fa fa-calculator nav-icon" aria-hidden="true"></i>
                            <p>Set Users PIN</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.logs.index') }}"
                            class="nav-link {{ request()->is('admin/logs/index') || request()->is('logs/index/*') ? 'active' : '' }}">
                            <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
                            <p>Logs</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endcan
        <li class="nav-item">
            <a href="#" class="nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Logout
                </p>
            </a>
        </li>
    </ul>
</nav>
