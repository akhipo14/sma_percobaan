<nav class="d-flex flex-row-reverse navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl "
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-3 px-0">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 justify-content-end" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex justify-content-end">
                <div class="dropdown ">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-sm-start  " style="top:.25rem;">
                        <li><a href="https://wa.me/6282289608096" target="_blank" class="dropdown-item"
                                type="button">Contact
                                Developer</a></li>
                        <li><a class="dropdown-item" type="button">Another action</a></li>
                        <li><a href="/admin-dashboard" class="dropdown-item" type="button">Something else here</a></li>
                    </ul>
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end mb-3">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center ">
                    <a class="  " id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner ">
                            <i class=" sidenav-toggler-line px-3 py-1 bg-primary"></i>
                            <i class=" sidenav-toggler-line px-3 py-1 bg-primary"></i>
                            <i class=" sidenav-toggler-line px-3 py-1 bg-primary"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
