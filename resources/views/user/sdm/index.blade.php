@extends('user.main')
@section('content')
    <main id="main">

        <section id="services" class="services">
            <div class="container" data-aos="fade-in">
                <div class="section-title pt-5" data-aos="fade-up">
                    <h2>Dafta Guru dan Karyawan</h2>
                    <hr class="m-auto" style="border: 3px solid #3e62f4; width: 100px" />
                </div>
                <div class="row justify-content-cente mt-2">
                    @foreach ($sdm as $item)
                        <div class="col-md-3 mt-4">
                            <div class="icon-box p-3 m-0" data-aos="fade-up">
                                <img src="{{ asset('storage/' . $item->foto) }}"
                                    class="card-img-top rounded responsive-image" alt="..." />
                                <div class="card-body" style="padding: 10px">
                                    <h6 class="card-title mt-3" style="font-family: 'Inter-boldd'">
                                        {{ $item->nama }}
                                    </h6>
                                    <p class="card-text" style="padding-top:5px; color: #666666; text-align: justify">
                                        {{ $item->posisi }}
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Team Section -->
    </main>
    <!-- End #main -->
@endsection
