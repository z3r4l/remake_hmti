<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li class="mega-menu mega-menu-lg">
                <a class="has-arrow {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-label">Postingan</li>
            <li>
                <a class="has-arrow {{ Request::is('dashboard/post*') ? 'active' : '' }}" href="{{ route('dashboard.posts.index') }}" aria-expanded="false"><i class="mdi mdi-monitor"></i> <span class="nav-text">Postingan Kegiatan</span></a>
            </li>
            <li>
                <a class="has-arrow {{ Request::is('dashboard/category*') ? 'active' : '' }}" href="{{ route('dashboard.category.index') }}" aria-expanded="false"><i class="mdi mdi-application"></i><span class="nav-text">Kategori</span></a>
            </li>

      
            <li class="nav-label">Struktur</li>
            <li class="mega-menu mega-menu-md">
                <a class="has-arrow {{ Request::is('dashboard/struktur*') ? 'active' : '' }}" href="{{ route('dashboard.struktur.index') }}" aria-expanded="false"><i class="mdi mdi-television-guide"></i><span class="nav-text">Struktur Anggota </span></a>
            </li>
            <li class="mega-menu mega-menu-xl">
                <a class="has-arrow {{ Request::is('dashboard/divisi*') ? 'active' : '' }}" href="{{ route('dashboard.divisi.index') }}" aria-expanded="false"><i class="mdi  mdi-division"></i><span class="nav-text">Struktur Divisi</span></a>
            </li>

            <li class="nav-label">Lainnya</li>
            <li class="mega-menu mega-menu-md">
                <a class="has-arrow {{ Request::is('dashboard/repository*') ? 'active' : '' }}" href="{{ route('dashboard.repository.index') }}" aria-expanded="false"><i class="mdi mdi-folder-multiple"></i><span class="nav-text"> Repository </span></a>
            </li>
            <li class="mega-menu mega-menu-md">
                <a class="has-arrow {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="{{ route('dashboard.user.index') }}" aria-expanded="false"><i class="mdi mdi-account"></i><span class="nav-text"> User </span></a>
            </li>
        </ul>
    </div>
</div>