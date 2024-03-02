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
                        <h2 class="text-white" style="font-weight: bold;">Lupa Password</h2>
                        <p class="text-white" style="font-size: .8em">Kami akan mengirimkan verifikasi ke email anda</p>
                    </div>

                    <div class="col-lg-5 m-auto">
                        <div class="card" data-aos="fade-up">
                            <div class="col-lg-12 ms-auto me-auto  mt-lg-0 p-3">
                                <form action="/forgot-password" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="php-email-form">
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <img class="rounded " style="width:100%;height: 250px;"
                                                    src="{{ asset('assets/img/a.jpg') }}" alt="">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <input type="text" name="email"
                                                    class="form-control rounded @error('email') is-invalid @enderror"
                                                    placeholder="Email" />
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="text-center"><button class="btn btn-primary" type="submit">Kirim
                                                verifikasi Email</button>
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
