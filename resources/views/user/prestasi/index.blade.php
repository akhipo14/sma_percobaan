@extends('user.main')
@section('content')
    <main id="main">
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="breadcrumb-hero">
                <div class="container">
                    <div class="breadcrumb-hero">
                        <h2 style="font-family: 'Inter-boldd'">Prestasi</h2>
                        <hr class="m-auto" style="border: 2px solid #ffffff; width: 150px;opacity:100" />

                    </div>
                </div>
            </div>
        </section>
        <!-- End Breadcrumbs -->
        <section id="services" class="services">
            <div class="container mt-5" data-aos="fade-in">
                <div class="table-responsive border rounded " style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                    <table class=" table  table-striped">
                        <thead class=" table-primary" style="">
                            <tr>
                                <th style="background-color: rgb(62, 98, 244);" class="text-white px-3 py-3 col-1">no</th>
                                <th style="background-color: rgb(62, 98, 244)" class="text-white px-3 py-3 col-3">Detail
                                    Prestasi</th>
                                <th style="background-color: rgb(62, 98, 244)" class="text-white px-3 py-3 col-3 ">Nama</th>
                                <th style="background-color: rgb(62, 98, 244)" class="text-white px-3 py-3 col-3 ">Tingkat
                                </th>
                                <th style="background-color: rgb(62, 98, 244)" class="text-white px-3 py-3 col-1 ">Tahun
                                </th>
                            </tr>
                        </thead>
                        <tbody style="">
                            @if ($prestasis->isNotEmpty())
                                @foreach ($prestasis as $item)
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
                    </table>
                    <div class="total" style="float: left;margin-left: 20px;margin-top: auto;margin-bottom: auto;">
                        <p>
                            <span class="text-secondary fs-6">Total Prestasi : {{ $total_prestasis }}</span>
                        </p>
                    </div>
                    <div class="style_paginator " style="float: right;margin-right: 20px ">
                        {{ $prestasis->links() }}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
