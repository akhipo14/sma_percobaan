@extends('user.main')
@section('content')
    <style>
        .a-hover {
            color: rgb(88, 88, 88);
            transition: .3s;
        }

        .a-hover:hover {
            color: rgb(62, 98, 244);
        }
    </style>

    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Classroom</h2>
                        <hr class="m-auto" style="border: 2px solid #ffffff; width: 150px;opacity:100" />

                    </div>
                </div>
            </div>
        </section>
        <section id="services" class="services">
            <div class=" container mt-3" data-aos="fade-in">
                <div class="row d-flex justify-content-end">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="col-3 d-flex justify-content-end me-3">
                            <p for="selekuy" class="mt-2 text-secondary" style="font-family: 'Inter-boldd'">Tampilkan
                                berdasarkan kelas</p>
                        </div>
                        <div class="col-1">
                            <select class="form-select border-primary"
                                style="background-color: white; padding:8px 30px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;"
                                aria-label="Default select example" name="kelas" id="kelas">
                                @foreach ($kelas as $item)
                                    <option value="{{ $item->id }}"
                                        {{ request()->input('kelas') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-start  ">
                    @foreach ($classrooms as $item)
                        <div class="col-md-4 mt-3 d-flex justify-content-center">
                            <div class="card p-0 mt-3 "
                                style="box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px;;width:21rem ;border:none">
                                <div class="card-body text-white"
                                    style="border-radius: 6px 6px 0px 0px ;background-color:rgb(62, 98, 244)">
                                    <div class="row d-flex justify-content-between ">
                                        <div class="col">
                                            <p class="card-text" style="font-family: 'Inter-boldd'">
                                                {{ $item->mapel->nama_pelajaran }}</p>
                                        </div>
                                        <div class="col d-flex justify-content-end">
                                            <h2 class="card-tittle" style="font-family: 'Inter-boldd'">
                                                {{ $item->kelas->nama_kelas }}</h2>
                                        </div>
                                    </div>
                                    <p class="card-text ">{{ $item->sdm->nama }}</p>
                                </div>
                                <div class="card-body pt-2 pb-2 d-flex justify-content-end"
                                    style="border-radius: 0px 0px 6px 6px;background-color:white">

                                    <a href="{{ $item->link }}" class="a-hover card-link " style="font-size: .8em">
                                        Masuk
                                        Classroom <i class="fa-solid fa-angle-right"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>
        </section>
    </main>
    <script>
        document.getElementById('kelas').addEventListener('change', function() {
            var kelasId = this.value;
            window.location.href = '/classroom?kelas=' + kelasId;
        });
    </script>
@endsection
