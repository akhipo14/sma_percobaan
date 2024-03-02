<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('user.layouts.link')
</head>

<body>
    @include('sweetalert::alert')
    <main id="main" style="margin-top: 0px">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Perbarui Password</h2>

                        <hr class="m-auto" style="border: 2px solid #ffffff; width: 150px;opacity: 100;" />
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <p class="text-white mt-2">Hari :
                            {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->
        <!-- ======= Services Section ======= -->
        <section id="services" class="services ">
            <div class="container" data-aos="fade-in">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-3">
                        <form action="{{ route('reset.password.post') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="php-email-form">
                                <div class="card p-3 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                                    <div class="mb-3">
                                        <input type="text" hidden value="{{ $token }}" name="token">
                                        <div class="mb-3">
                                            <label class="form-label" style="font-size: .8em">Email</label>
                                            <input type="text" hidden value="{{ $email }}" name="email">
                                            <input type="email" id="email" value="{{ $email }}"
                                                class="form-control  @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" disabled>

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" style="font-size: .8em">Masukkan password
                                                baru</label>
                                            <input type="password" name="password"
                                                class="form-control  @error('password') is-invalid @enderror"
                                                value="{{ old('password') }}">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" style="font-size: .8em">Konfirmasi ulang
                                                password</label>
                                            <input type="password" name="password_confirmation"
                                                id="password_confirmation"
                                                class="form-control  @error('password_confirmation') is-invalid @enderror"
                                                value="">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    @include('user.layouts.script')
                </div>
            </div>
        </section>
    </main>

</body>

</html>
