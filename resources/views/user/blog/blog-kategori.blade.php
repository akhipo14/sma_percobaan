@extends('user.main')
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Berita</h2>
                        <hr class="m-auto" style="border: 2px solid #ffffff; width: 150px;opacity: 100;" />
                    </div>
                </div>
            </div>
            <div class="container">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/berita">Berita</a></li>
                    <li><a
                            href="/berita-kategori/{{ $posts[0]->kategori->slug }}">{{ $posts[0]->kategori->nama_kategori }}</a>
                    </li>
                </ol>
            </div>

        </section>
        <!-- End Breadcrumbs -->
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container " data-aos="fade-in">
                <div class="row justify-content-start mt-2">
                    @foreach ($posts as $item)
                        <div class="col-md-4 ">
                            <div class="icon-box p-3" data-aos="fade-up">
                                <img src="{{ asset('storage/' . $item->foto) }}" style="max-height:200px;object-fit: cover;"
                                    class="card-img-top rounded" alt="..." />
                                <div class="card-body " style="padding: 10px">
                                    <h5 class="card-title" style="font-family: 'Inter-boldd'">
                                        {{ substr(strtoupper($item->judul), 0, 35) }}...</h5>
                                    <p class="card-text " style="padding-top: 10px; color: #666666; text-align:justify">
                                        {{ substr(strip_tags($item->body), 0, 177) }}...
                                    </p>
                                </div>
                                <div class="card-body" style="padding: 10px">
                                    <a href="/berita/{{ $item->slug }}" class="card-link"
                                        style="color: #666666; font-family: 'Inter-boldd'">BACA
                                        SELENGKAPNYA >></a>
                                </div>
                                <hr />
                                <div class="card-body" style="padding: 10px">
                                    <a href="#" class="card-link" style="color: #666666">Admin</a>
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
@endsection
