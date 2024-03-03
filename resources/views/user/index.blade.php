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
    <section id="hero">
        <div class="hero-container" data-aos="fade-up">
            <h2>SELAMAT DATANG DI</h2>
            <h1 style="font-family: 'Inter-bold'">SD NEGERI PERCOBAAN PADANG</h1>
            <h3 style="color: white">“Honesty, Creativity, and Morality, Are our Cultures”</h3>
        </div>
    </section>
    <!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container " style="width: 90%;">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                                <div class="count-box py-3">
                                    <img src="assets/img/akreditasi.png" class="img-fluid" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->

        <!-- ======= Work Process Section ======= -->
        <section id="work-process" class="work-process">
            <div class="container  p-4">
                <div class="row content">
                    <div class="col-md-5" data-aos="fade-right">
                        <img src="assets/img/sambutan.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-md-7 pt-5" data-aos="fade-left">
                        <h3 style="font-family: 'Inter-boldd'; color: black"><strong>Sambutan Kepala Sekolah</strong>
                        </h3>
                        <hr style="border: 3px solid #3e62f4; width: 100px" />
                        <p style="text-align: justify">
                            <br />
                            <strong>Assalamualaikum, Wr.Wb <br /></strong>
                            <br />

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit sem vel
                            laoreet bibendum. Nunc id velit vitae nulla vehicula euismod. Nulla suscipit turpis sit amet
                            pharetra semper. In hac habitasse platea
                            dictumst. Nunc pellentesque at magna ac pellentesque. Maecenas massa erat, molestie vitae
                            aliquam at, pretium quis enim. Nam accumsan viverra ante. Pellentesque eleifend semper
                            libero sed congue. Donec risus odio, luctus ut
                            lectus vel, maximus malesuada justo. Suspendisse nec sem velit. Nam ante metus, aliquet
                            lacinia enim a, varius dapibus arcu. Donec eget justo in nulla fermentum elementum. Fusce id
                            quam et sapien porta fermentum a at elit.
                            <br />
                            Wassalamualaikum, Wr.Wb <br /><br />
                            <strong>Lifda Sari S, M. Pd <br />Kepala Sekolah SDN Percobaan Padang</strong>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Work Process Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="fade-in">
                <div class="row text-center">
                    <div class="col-md-4">
                        <h1 style="color: white; font-family: 'Inter-bold'">{{ $kelas }}</h1>
                        <h2 style="color: white">Jumlah Kelas</h2>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box" data-aos="fade-up">
                            <h1 style="color: white; font-family: 'Inter-bold'">{{ $sdms }}</h1>
                            <h2 style="color: white">Jumlah Guru</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="icon-box" data-aos="fade-up">
                            <h1 style="color: white; font-family: 'Inter-bold'">{{ $ruangs }}</h1>
                            <h2 style="color: white">Jumlah Bangunan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Cta Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-in">
                <div class="section-title pt-5" data-aos="fade-up">
                    <h2>Berita Terbaru</h2>
                </div>
                <div class="row justify-content-center">
                    @foreach ($posts as $item)
                        <div class="col-md-4">
                            <div class="icon-box p-3" data-aos="fade-up">
                                <img src="{{ asset('storage/' . $item->foto) }}" style="max-height:200px;object-fit: cover;"
                                    class="card-img-top rounded" alt="..." />
                                <div class="card-body" style="padding: 10px">
                                    <h6 class="card-title" style="font-family: 'Inter-boldd'">
                                        {{ substr(strtoupper($item->judul), 0, 52) }}...
                                    </h6>
                                    <p class="card-text" style="padding-top: 10px; color: #666666; text-align: justify">
                                        {{ substr(strip_tags($item->body), 0, 177) }}...
                                    </p>
                                </div>
                                <div class="card-body" style="padding: 10px">
                                    <a href="/berita/{{ $item->id }}" class="card-link"
                                        style="color: #666666; font-family: 'Inter-boldd'">BACA SELENGKAPNYA >></a>
                                </div>
                                <hr />
                                <div class="card-body" style="padding: 10px">
                                    <a href="" class="card-link" style="color: #666666">Admin</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!-- End #main -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta" style="width: 100%; padding: 40px 0px;">
        <!-- ======= Our Clients Section ======= -->
        <section id="clients" class="clients" style="padding: 40px 0;">
            <div class="" data-aos="fade-up">
                <div class="section-title">
                    <h2 style="color: white">Galeri Sekolah</h2>
                </div>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center ">
                        @foreach ($gallerys as $item)
                            <div class="swiper-slide " style="margin: 20vh;">
                                <img src="{{ asset('storage/' . $item->gambar) }}"
                                    style="min-width: 200px;min-height:80px;width: 320px;height: 250px;" class="rounded " />
                            </div>
                        @endforeach
                    </div>
                    <br /><br /><br />
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
        <!-- End Our Clients Section -->
    </section>
    <!-- End Cta Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title pt-5" data-aos="fade-up">
                <h2>Kotak Saran</h2>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 mt-2 mt-lg-0" data-aos="fade-left">
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
                                <button class=" btn btn-primary w-100" style=" margin:auto;"
                                    type="submit">Kirim</button>
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
        </div>
    </section>
    <!-- End Contact Section -->
@endsection
