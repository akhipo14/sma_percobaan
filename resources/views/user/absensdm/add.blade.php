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
                        <h2 style="font-family: 'Inter-boldd'">Absen Pegawai</h2>

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
            <h3 style="font-family: 'Inter-boldd'" class="text-center mt-2">Absen Pegawai SDN Percobaan</h3>
            <div class="container" data-aos="fade-in">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-3">
                        <form action="/absen-sdm" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="php-email-form">
                                <div class="card p-3 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                                    <div class="mb-3">
                                        <label class="form-label" style="font-size: .8em">Nama</label>
                                        <input type="text" name="nama" id="nama"
                                            class="form-control  @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" style="font-size: .8em">NIP</label>
                                        <input type="number" name="nip"
                                            class="form-control  @error('nip') is-invalid @enderror"
                                            value="{{ old('nip') }}">
                                        @error('nip')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" style="font-size: .8em">Posisi</label>
                                        <input type="text" name="posisi" id="posisi"
                                            class="form-control  @error('posisi') is-invalid @enderror"
                                            value="{{ old('posisi') }}">
                                        @error('posisi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label " style="font-size: .8em">Keterangan</label>
                                        <select class="form-select " aria-label="Default select example" name="ket">
                                            <option value="Hadir" selected>Hadir</option>
                                            <option value= "Izin">izin</option>
                                            <option value= "Sakit">Sakit</option>
                                        </select>
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
