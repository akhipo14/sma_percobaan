@extends('user.main')
@section('content')
    <style>
        .nowrap-th th {
            white-space: nowrap;
        }

        .nowrap-td td {
            white-space: nowrap;
        }

        #customers {
            border-collapse: collapse;
            width: 100%;
        }

        .th-1 {
            border-radius: 8px 0px 0px 0px;

        }

        .th-2 {
            border-radius: 0px 8px 0px 0px;

        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding: 12px 25px 12px 25px;
            text-align: center;
            background-color: rgb(44, 87, 245);
            color: white;
            border: none;
        }
    </style>
    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Jadwal Mata Pelajaran</h2>
                        <hr class="m-auto" style="border: 2px solid #ffffff; width: 150px;opacity:100" />

                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->
        <section id="services" class="services">
            <div class="container mt-3" data-aos="fade-in">
                <div class="row d-flex justify-content-end">
                    <div class="col-12 d-flex justify-content-end">
                        <div class="col-3 d-flex justify-content-end me-3">
                            <p for="selekuy" class="mt-2 text-secondary" style="font-family: 'Inter-boldd'">Tampilkan
                                berdasarkan kelas</p>
                        </div>
                        <div class="col-1">
                            <form action="/jadwal_kelas" method="get">
                                <select class="form-select   border-primary"
                                    style="background-color: white; padding:8px 30px;" aria-label="Default select example"
                                    name="kelas" onchange="this.form.submit()">
                                    @foreach ($kelas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ request()->input('kelas') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="card p-3 mb-5">
                    <div class="table-responsive">
                        <table class="table bg-white text-center">
                            <thead>
                                <tr>
                                    <th class="border-bottom">Hari</th>
                                    <th class="  border-buttom">07.30 - 07.30</th>
                                    <th class="  border-buttom">07.30 - 08.05</th>
                                    <th class="  border-buttom">08.05 - 08.40</th>
                                    <th class="  border-buttom">08.40 - 09.15</th>
                                    <th class="  border-buttom">09.15 - 09.50</th>
                                    <th class="  border-buttom">09.50 - 10.10</th>
                                    <th class="  border-buttom">10.10 - 10.45</th>
                                    <th class="  border-buttom">10.45 - 11.20</th>
                                    <th class="  border-buttom">11.20 - 11.55</th>
                                    <th class="  border-buttom">11.55 - 13.00</th>
                                    <th class="  border-buttom">13.00 - 13.35</th>
                                    <th class="  border-buttom">13.35 - 14.00</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div> --}}
                <div class="card mt-3 mb-3">

                    <div class="table-responsive">
                        <table class="table bg-white  text-center" id="customers">
                            <thead>
                                <tr class="nowrap-th rounded">
                                    <th class=" th-1 ">Hari</th>
                                    <th>Kelas</th>
                                    <th class=" ">07.30 - 07.30</th>
                                    <th class=" ">07.30 - 08.05</th>
                                    <th class=" ">08.05 - 08.40</th>
                                    <th class=" ">08.40 - 09.15</th>
                                    <th class=" ">09.15 - 09.50</th>
                                    <th class=" ">09.50 - 10.10</th>
                                    <th class=" ">10.10 - 10.45</th>
                                    <th class=" ">10.45 - 11.20</th>
                                    <th class=" ">11.20 - 11.55</th>
                                    <th class=" ">11.55 - 13.00</th>
                                    <th class=" ">13.00 - 13.35</th>
                                    <th class="th-2 ">13.35 - 14.00</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($jadwals_hari as $hariItem)
                                <tr class="nowrap-td">

                                    <td class="" style="font-weight: bold;text-align: inherit">
                                        {{ $hariItem->nama_hari }}</td>
                                    @if (isset($jadwals_by_hari[$hariItem->id]) && count($jadwals_by_hari[$hariItem->id]) > 0)
                                        <td>{{ $kelas2->nama_kelas }}</td>
                                        @foreach ($jadwals_by_hari[$hariItem->id] as $jadwal)
                                            <td>{{ $jadwal->pelajaran_id ? $jadwal->pelajaran->nama_pelajaran : '-' }}
                                            </td>
                                        @endforeach
                                    @else
                                        <td>Tidak ada jadwal untuk hari ini.</td>
                                    @endif


                                </tr>
                                @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
