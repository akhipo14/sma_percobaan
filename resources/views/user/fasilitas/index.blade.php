@extends('user.main')
@section('content')
    <main id="main">

        <section style="background-color: rgb(247, 247, 247)" id="services" class="services">
            <div class="container" data-aos="fade-in">
                <div class="section-title pt-5" data-aos="fade-up">
                    <h2>Fasilitas</h2>
                    <hr class="m-auto" style="border: 3px solid #3e62f4; width: 100px" />
                </div>
                <div class="row justify-content-cente mt-2">
                    @foreach ($ruangs as $item)
                        <div class="col-md-4 mt-4 ">
                            <div class="icon-box p-3 m-0 " data-aos="fade-up">
                                <img src="{{ asset('storage/' . $item->image) }}"
                                    class="card-img-top rounded responsive-image-fasilitas" alt="..." />
                                <div class="card-body" style="padding: 10px">
                                    <h6 class="card-title mt-1" style="font-family: 'Inter-boldd'">
                                        {{ $item->jenis_ruang }}
                                    </h6>
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
