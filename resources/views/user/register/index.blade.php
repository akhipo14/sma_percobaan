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
                        <h1 class="text-white" style="font-family: 'Inter-bold'">REGISTER</h1>
                    </div>

                    <div class="col-lg-5 m-auto">
                        <div class="card" data-aos="fade-up">
                            <div class="col-lg-12 ms-auto me-auto  mt-lg-0 p-3">
                                <form action="/register" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="php-email-form">
                                        <div class="row ">
                                            <div class="col-md-12 form-group mb-2"
                                                style="display: flex;justify-content: center;align-items: center;">
                                                <img class="rounded " style="width:90%;height:auto; "
                                                    src="{{ asset('assets/img/logo.png') }}" alt="">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="name"
                                                    class="form-control rounded @error('name') is-invalid @enderror"
                                                    placeholder="Nama" value="{{ old('name') }}" />
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <input type="email" name="email"
                                                    class="form-control rounded @error('email') is-invalid @enderror"
                                                    placeholder="Email" value="{{ old('email') }}" />
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 form-group mt-3 mt-md-0">
                                                <input type="password"
                                                    class="form-control rounded  @error('password') is-invalid @enderror"
                                                    name="password" placeholder="password" />
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center mt-2">
                                            <button class="btn btn-primary" type="submit">Register</button>
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
