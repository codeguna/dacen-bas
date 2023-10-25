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
        @can('view_attendances')
            <li class="nav-item">
                <a href="{{ route('admin.scan-log.my-attendances') }}"
                    class="nav-link {{ request()->is('admin/scan-log/myattendances') || request()->is('admin/scan-log/myattendances/*') || request()->is('admin/scan-log/myattendancesfilter') ? 'active' : '' }}">
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
                        <span class="right badge badge-danger">+1</span>
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
                class="nav-item {{ request()->is('admin/scan-logs') || request()->is('admin/scan-logs/*') || request()->is('admin/scan-log/filter') ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->is('admin/scan-logs') || request()->is('admin/scan-logs/*') || request()->is('admin/scan-log/filter') ? 'active' : '' }}">
                    <i class="nav-icon fa fa-history" aria-hidden="true"></i>
                    <p>
                        Scan Logs
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.scan-logs.index') }}"
                            class="nav-link {{ request()->is('admin/scan-logs') || request()->is('admin/scan-logs/*') || request()->is('admin/scan-log/filter') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-archive" aria-hidden="true"></i>
                            <p>Semua Data</p>
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
                request()->is('admin/certificate-types')
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
        request()->is('admin/certificate-types')
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
                request()->is('admin/user/set_users_pin/*')
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
                    request()->is('admin/user/set_users_pin/*')
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
