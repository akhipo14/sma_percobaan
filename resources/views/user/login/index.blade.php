@extends('user.main')
@section('content')
    @include('sweetalert::alert')
    <style>
        .bl {
            background-image: url('/assets/img/b.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <main id="main" style="height: 100vh;" class="bl">
        <section id="contact" class="contact">
            <div class="container">
                <div class="row mt-5 ">
                    <div class="text-center" style="margin-bottom: 10px; " data-aos="fade-up">
                        <h2 class="text-white" style="font-weight: bold;">LOGIN</h2>
                    </div>

                    <div class="col-lg-5 m-auto">
                        <div class="card" data-aos="fade-up">
                            <div class="col-lg-12 ms-auto me-auto  mt-lg-0 p-3">
                                <form action="/login" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <img class="rounded " style="width:100%;height: 250px;"
                                                    src="{{ asset('assets/img/a.jpg') }}" alt="">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="name" class="form-control rounded"
                                                    placeholder="Nama" />
                                            </div>

                                            <div class="col-md-12 form-group mt-3 mt-md-0">
                                                <input type="password" class="form-control rounded" name="password"
                                                    placeholder="password" />
                                            </div>
                                        </div>

                                        <div class="text-center"><button class="btn btn-primary"
                                                type="submit">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
