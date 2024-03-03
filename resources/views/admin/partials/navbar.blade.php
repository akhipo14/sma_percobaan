<nav class="d-flex flex-row-reverse navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl "
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-3 px-0 ">
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
                        <li class="dropdown-item ">
                            <form action="/logout" method="post">
                                @csrf
                                <button class="bg-danger text-white rounded"
                                    style="padding: 5px auto 5px auto;width:100%;border:none;" type="submit">Log
                                    Out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="navbar-nav  justify-content-end mb-3 me-3">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center ">
                    <a class="  " id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner  ">
                            <i class=" sidenav-toggler-line border border-2 border-primary px-3 py-0 bg-white"></i>
                            <i class=" sidenav-toggler-line border border-2 border-primary px-3 py-0 bg-white"></i>
                            <i class=" sidenav-toggler-line border border-2 border-primary px-3 py-0 bg-white"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
