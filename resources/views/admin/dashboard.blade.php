@extends('admin.main')
@section('content')
    @include('sweetalert::alert')
    <h3 class="text-primary mb-3">Welcome {{ auth()->user()->name }} !</h3>

    <div class="row ">
        <div class="col">
            <div class="card">
                <div class="card-body p-3 ">
                    <div class="row gap-0">
                        <div class="col-9 ">
                            <h3 class=" mb-0 text-uppercase font-weight-bolder">{{ $sdms }}</h4>
                                <p class="mb-0 font-weight-bold text-sm">Guru dan Karyawan</p>
                        </div>
                        <div class="col-3 tex-center " style="display: flex;justify-content: center;align-items: center">
                            <h2><i class="fa-solid fa-chalkboard-user text-primary "></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body p-3 ">
                    <div class="row gap-0">
                        <div class="col-9 ">
                            <h3 class=" mb-0 text-uppercase font-weight-bolder">{{ $prestasis }}</h4>
                                <p class="mb-0 font-weight-bold text-sm">Prestasi</p>
                        </div>
                        <div class="col-3 tex-center " style="display: flex;justify-content: center;align-items: center">
                            <h2><i class="fa-solid fa-medal text-primary"></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body p-3 ">
                    <div class="row gap-0">
                        <div class="col-8 ">
                            <h3 class=" mb-0 text-uppercase font-weight-bolder">{{ $kelas }}</h4>
                                <p class="mb-0 font-weight-bold text-sm">Ruang Kelas</p>
                        </div>
                        <div class="col-4 tex-center " style="display: flex;justify-content: center;align-items: center">
                            <h2><i class="fa-solid fa-door-closed text-primary"></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body p-3 ">
                    <div class="row gap-0">
                        <div class="col-9 ">
                            <h3 class=" mb-0 text-uppercase font-weight-bolder">{{ $ruangs }}</h4>
                                <p class="mb-0 font-weight-bold text-sm">Bangun Ruang</p>
                        </div>
                        <div class="col-3 tex-center " style="display: flex;justify-content: center;align-items: center">
                            <h2>
                                <i class="fa-solid fa-building text-primary"></i>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-xl-3 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-10">
                            <div class="numbers">
                                <h3 class=" mb-0 text-uppercase font-weight-bolder">{{ $sdms }}</h4>

                                    <p class="mb-0 font-weight-bold">Guru dan Karyawan </p>
                            </div>
                        </div>
                        <div class="col-2 text-center">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fa-solid fa-chalkboard-user text-white"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                <h5 class="font-weight-bolder">
                                    2,300
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                    since last week
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                <h5 class="font-weight-bolder">
                                    +3,462
                                </h5>
                                <p class="mb-0">
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    since last quarter
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder">
                                    $103,430
                                </h5>
                                <p class="mb-0">
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last
                                    month
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
