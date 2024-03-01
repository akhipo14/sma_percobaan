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
                        <h1 class="text-white" style="font-family: 'Inter-bold'">LOGIN</h1>
                    </div>

                    <div class="col-lg-5 m-auto">
                        <div class="card" data-aos="fade-up">
                            <div class="col-lg-12 ms-auto me-auto  mt-lg-0 p-3">
                                <form action="/login" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-2"
                                                style="display: flex;justify-content: center;align-items: center;">
                                                <img class="rounded " style="width:90%;height:auto; "
                                                    src="{{ asset('assets/img/logo.png') }}" alt="">
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

                                        <div class="text-center mt-3"><button class="btn btn-primary"
                                                type="submit">Login</button>
                                        </div>
                                        <div class="text-center mt-3 ">
                                            <p style="font-size: .8em">Lupa Password ? <a href="/forgot-password">reset
                                                    password</a></p>
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
