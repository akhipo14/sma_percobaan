<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl  fixed-start  "
    id="sidenav-main">
    <div class="sidenav-header mb-3" style="position: fixed; z-index: 5; background-color:white;">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
            target="_blank">
            <img src="{{ asset('assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Argon Dashboard 2</span>
        </a>
        <hr class="horizontal dark mt-0">
    </div>
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">

        <ul class="navbar-nav" style="margin-top: 20vh;">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin-dashboard*') ? 'active' : '' }} " href="/admin-dashboard">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-gauge-simple-high text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1 ">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin-add-post*') ? 'active' : '' }} " href="/admin-add-post">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-file-arrow-up text-primary "></i>
                    </div>
                    <span class="nav-link-text ms-1 ">Add Post</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin-post*') ? 'active' : '' }} " href="/admin-post">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-folder-open text-primary "></i>
                    </div>
                    <span class="nav-link-text ms-1 ">Manage Post</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin-kategori*') ? 'active' : '' }}" href="/admin-kategori">
                    <div class="border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-folder-open text-primary "></i>
                    </div>
                    <span class="nav-link-text ms-1 ">Manage Category</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin-gallery*') ? 'active' : '' }}" href="/admin-gallery">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-images text-primary "></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Gallery</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin-sdm') ? 'active' : '' }}" href="/admin-sdm">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-users-gear text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage SDM</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "href="#submenu2" data-bs-toggle="collapse">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Mapel</span>
                </a>
                {{-- sub menu --}}
                <ul class="collapse nav flex-column" id="submenu2" data-bs-parent="#menu2">
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('admin-jadwal*') ? 'active' : '' }}" href="/admin-jadwal">
                            <div
                                class="ps-3 border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-clock text-primary"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Jadwal</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('admin-kelas*') ? 'active' : '' }}" href="/admin-kelas">
                            <div
                                class="ps-3 border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-chalkboard-user text-primary"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Kelas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('admin-pelajaran*') ? 'active' : '' }}"
                            href="/admin-pelajaran">
                            <div
                                class="ps-3 border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-book-open text-primary"></i>
                            </div>
                            <span class="nav-link-text ms-1">Manage Pelajaran</span>
                        </a>
                    </li>
                </ul>
                {{-- end sub menu --}}
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ Request::is('admin-ketenagaan*') ? 'active' : '' }}" href="/admin-ketenagaan">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book-open text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ketenagaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin-ruang*') ? 'active' : '' }}" href="/admin-ruang">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book-open text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Ruangan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin-classroom*') ? 'active' : '' }}" href="/admin-classroom">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book-open text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Classroom</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin-prestasi*') ? 'active' : '' }}" href="/admin-prestasi">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book-open text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Prestasi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link "href="#submenu2" data-bs-toggle="collapse">
                    <div class=" border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-book text-primary"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manage Absensi</span>
                </a>
                {{-- sub menu --}}
                <ul class="collapse nav flex-column" id="submenu2" data-bs-parent="#menu">
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('admin-absen-sdm*') ? 'active' : '' }}" href="/admin-sdm">
                            <div
                                class="ps-3 border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-clock text-primary"></i>
                            </div>
                            <span class="nav-link-text ms-1">Absen SDM</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ Request::is('admin-absen-murid*') ? 'active' : '' }}"
                            href="/admin-sdm">
                            <div
                                class="ps-3 border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-chalkboard-user text-primary"></i>
                            </div>
                            <span class="nav-link-text ms-1">Absen Murid</span>
                        </a>
                    </li>

                </ul>
                {{-- end sub menu --}}
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link " href="./pages/rtl.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/profile.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/sign-in.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="./pages/sign-up.html">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-collection text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>

    {{-- <div class="sidenav-footer mx-3 ">
        <div class="card card-plain shadow-none" id="sidenavCard">
            <img class="w-50 mx-auto" src="{{ asset('assets/img/illustrations/icon-documentation.svg') }}"
                alt="sidebar_illustration">
            <div class="card-body text-center p-3 w-100 pt-0">
                <div class="docs-info">
                    <h6 class="mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                </div>
            </div>
        </div>
        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank"
            class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
        <a class="btn btn-primary btn-sm mb-0 w-100"
            href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to
            pro</a>
    </div> --}}
</aside>
