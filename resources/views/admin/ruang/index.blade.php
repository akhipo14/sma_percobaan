@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Prestasi</h3>
    <a href="admin-ruang/add" class="btn btn-primary">Tambah
        Bangun Ruang</a>
    <div class="card p-2 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="table-responsive">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded text-center">
                    <thead>
                        {{-- <tr>
                            <th class="px-2 py-1 " rowspan="2">no</th>
                            <th class="px-2 py-1 " rowspan="2">
                                Jenis Ruang
                            </th>
                            <th class="px-2 py-1 " colspan="3">Kondisi</th>
                            <th class="px-2 py-1 " rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th class="px-2 py-1 ">Perempuan</th>
                            <th class="px-2 py-1 ">Jumlah</th>
                            <th class="px-2 py-1 ">Jumlah</th>
                        </tr> --}}
                        <tr>
                            <th class="px-2 py-1 col-1">no</th>
                            <th class="px-2 py-1 col-2" colspan="2"> Nama Bangunan/Ruang</th>
                            <th class="px-2 py-1 col-1">Jumlah</th>
                            <th class="px-2 py-1 col-1">Kondisi</th>
                            <th class="px-2 py-1  col-1">Aksi</th>
                        </tr>

                    </thead>
                    <tbody style="">
                        @if ($ruangs->isNotEmpty())
                            @foreach ($ruangs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td colspan="2">{{ $item->jenis_ruang }}</td>
                                    <td> {{ $item->jumlah }}</td>
                                    <td> {{ str_replace('-', ' ', $item->kondisi) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">

                                            <a class="btn btn-primary btn-sm" href="admin-ruang/{{ $item->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>


                                            <a href="{{ Route('ruangs.delete', $item->id) }}" data-confirm-delete="true"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">Data Kosong</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                <div class="style_paginator " style="float: right; ">
                    {{ $ruangs->links() }}
                </div>
            </div>
        </div>
    </div>


    <script>
        var input = document.getElementById('tahunInput');

        // Tambahkan event listener untuk membatasi input hanya pada tahun
        input.addEventListener('input', function() {
            // Hapus karakter selain angka dari nilai input
            var tahun = this.value.replace(/\D/g, '');
            // Batasi panjang karakter input menjadi maksimum 4 digit
            tahun = tahun.slice(0, 4);
            // Tambahkan angka nol di depan tahun jika panjangnya kurang dari 4 digit
            if (tahun.length < 4) {
                tahun = ('000' + tahun).slice(-4);
            } else if (tahun.length > 4) {
                // Ambil 4 digit terakhir dari tahun jika panjangnya lebih dari 4 digit
                tahun = tahun.slice(-4);
            }
            // Atur nilai input menjadi tahun yang sudah diformat
            this.value = tahun;
        });
    </script>
@endsection
