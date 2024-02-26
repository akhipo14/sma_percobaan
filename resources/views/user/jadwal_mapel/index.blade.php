@extends('user.main')
@section('content')
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
            <div class="container mt-5" data-aos="fade-in">
                <div class="table-responsive border rounded " style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                    {{-- <table class=" table  table-striped">
                        <thead class=" table-primary" style="">
                            <tr>
                                <th style="background-color: rgb(62, 98, 244);" class="text-white px-3 py-3 col-1">no</th>
                                <th style="background-color: rgb(62, 98, 244)" class="text-white px-3 py-3 col-3">Jam
                                    Pelajaran</th>
                                @foreach ($kelas as $item)
                                    <th style="background-color: rgb(62, 98, 244)" class="text-white px-3 py-3 col-3">
                                        {{ $item->nama_kelas }}
                                    </th>
                                @endforeach

                            </tr>
                        </thead>
                        <tbody style="">

                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>halow</td>
                                    <td>{{ $jadwal->kelas->nama_kelas }}</td>
                                </tr>
                            @endforeach
                            @if ($jadwals->isNotEmpty())
                                @foreach ($jadwals as $item)
                                    <tr>
                                        <td class="px-3  py-2">
                                            {{ $loop->iteration }}</td>
                                        <td class="px-3 py-2">{{ $item->detail_prestasi }}</td>
                                        <td class="px-3 py-2">{{ $item->nama }}</td>
                                        <td class="px-3 py-2">{{ $item->tingkat }}</td>
                                        <td class="px-3 py-2">{{ $item->tahun }}</td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Data Kosong</td>
                                </tr>
                            @endif
                        </tbody>
                    </table> --}}
                    <div class="card p-3 mb-5">
                        <div class="table-responsive">
                            <table class="table bg-white text-center">
                                <thead>
                                    <tr>
                                        <th class="border-bottom">Hari</th>
                                        @foreach ($jadwals_kelas as $kelasItem)
                                            <th class="border-bottom">{{ $kelasItem->nama_kelas }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwals_by_kelas as $kelasItem => $jadwals)
                                        {{-- Loop through each jadwal for the current kelas --}}
                                        @foreach ($jadwals as $jadwal)
                                            <tr>
                                                <td>{{ $hari2->nama_hari }}</td>
                                                @foreach ($jadwals_kelas as $kelas)
                                                    <td>
                                                        {{-- Check if the jadwal belongs to the current kelas --}}
                                                        @if ($jadwal->kelas_id == $kelas->id)
                                                            {{-- Display pelajaran_id --}}
                                                            {{ $jadwal->pelajaran_id }}
                                                        @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                    {{-- <div class="total" style="float: left;margin-left: 20px;margin-top: auto;margin-bottom: auto;">
                        <p>
                            <span class="text-secondary fs-6">Total Prestasi : {{ $total_prestasis }}</span>
                        </p>
                    </div> --}}
                    {{-- <div class="style_paginator " style="float: right;margin-right: 20px ">
                        {{ $jadwals->links() }}
                    </div> --}}
                    {{-- @foreach ($kelas as $kelasitem)
                        <h2>Kelas {{ $kelasitem->nama }}</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Jam</th>
                                    <th>Mata Pelajaran</th>
                                    <!-- Tambahkan kolom lain yang diperlukan -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwals_by_kelas[$kelasitem->id] as $jadwal)
                                    <tr>
                                        <!-- Menggunakan indeks array $jam untuk mendapatkan waktu sesuai dengan jam_id -->
                                        <td>{{ $jadwal->pelajaran_id }}</td>
                                        <!-- Tambahkan kolom lain yang diperlukan -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach --}}

                </div>
            </div>
        </section>
    </main>
@endsection
