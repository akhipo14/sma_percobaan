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
            <div class="container" data-aos="fade-in">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-5">
                        <h1 class="text-center">Absen anda telah disimpan</h1>
                        <h3 class="text-center">Terimakasih</h3>
                    </div>
                    @include('user.layouts.script')
                </div>
            </div>
        </section>
    </main>

</body>

</html>
