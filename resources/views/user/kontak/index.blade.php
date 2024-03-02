@extends('user.main')
@section('content')
    @include('sweetalert::alert')

    <style>
        .custom-input {
            background-color: rgb(255, 255, 255);
        }

        .a-hover {
            color: rgb(88, 88, 88);
            transition: .3s;
        }

        .a-hover:hover {
            color: rgb(62, 98, 244);
        }
    </style>

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Kontak</h2>
                        <hr class="m-auto" style="border: 2px solid #ffffff; width: 150px;opacity:100" />

                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="mt-5 mb-5 d-flex justify-content-center gap-5 text-center">
                    <a href="https://maps.app.goo.gl/aBNDL2vQuaQVbdH58" class="a-hover"><i
                            class="fa-solid fa-location-dot"></i> Jl. Ujung Gurun No. 56
                        Padang </a>
                    <a href="" class="a-hover"><i class="fa-solid fa-phone"></i> 0751-841743 </a>
                    <a href="" class="a-hover"><i class="fa-solid fa-envelope"></i></i>
                        sdp_pdg@yahoo.co.id</a>
                </div>
                <hr class="m-auto" style="border: 1px solid #3E62F4; width: 100%;opacity:100" />
                <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">
                        <form action="/sendmail" method="post" role="form">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="name"
                                        class="custom-input form-control rounded @error('name') is-invalid @enderror"
                                        placeholder="Nama" value="{{ old('name') }}" />
                                    @error('name')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email"
                                        class="custom-input form-control rounded @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" value="{{ old('email') }}" />
                                    @error('email')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="number"
                                        class="custom-input form-control rounded @error('phone') is-invalid @enderror"
                                        name="phone" placeholder="No. Telepon" value="{{ old('phone') }}" />
                                    @error('phone')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <input type="text"
                                        class="custom-input form-control rounded @error('subject') is-invalid @enderror"
                                        name="subject" placeholder="Subject" value="{{ old('subject') }}" />
                                    @error('subject')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <textarea class="custom-input form-control rounded @error('body') is-invalid @enderror" name="body" rows="5"
                                        placeholder="Message">{{ old('body') }}</textarea>
                                    @error('body')
                                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <button class=" btn btn-primary w-100" type="submit">Kirim</button>
                                </div>
                            </div>

                            {{-- <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div> --}}
                        </form>
                    </div>
                </div>

                {{-- <div class="row mt-5">
                    <div class="col-lg-12 mt-5 mt-lg-0" data-aos="fade-left">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <input type="text" name="name" class="form-control rounded custom-input"
                                        id="name" placeholder="Nama" required />
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control rounded custom-input" name="email"
                                        id="email" placeholder="Email" required />
                                </div>
                                <div class="col-md-4 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control rounded custom-input" name="email"
                                        id="email" placeholder="No. Telepon" required />
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <textarea class="form-control rounded custom-input" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Kirim</button></div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </section>
        <!-- End Contact Section -->
    </main>
    <!-- End #main -->
@endsection
