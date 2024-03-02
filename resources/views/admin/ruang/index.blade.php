@extends('admin.main')
@section('content')
    @include('sweetalert::alert')
    <h3 class="text-primary">Manage Ruang</h3>
    <button href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah
        Bangun Ruang</button>
    {{-- <input type="text" class="form-control" id="tahunInput" placeholder="Tahun"> --}}
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
                                    <td> {{ str_replace('_', ' ', $item->kondisi) }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">

                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editmodal{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>


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
                {{-- <div class="style_paginator " style="float: right; ">
                    {{ $ruangs->links() }}
                </div> --}}
            </div>
        </div>
    </div>

    {{-- update ruang --}}
    @foreach ($ruangs as $item)
        <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <form action="{{ route('ruangs.update', $item) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label class="form-label " style="font-size: .8em">Jenis Ruang</label>
                                <input type="text" name="jenis_ruang"
                                    class="form-control @error('jenis_ruang') is-invalid @enderror"
                                    placeholder="Labor Komputer" value="{{ $item->jenis_ruang }}">
                                @error('jenis_ruang')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label " style="font-size: .8em">Jumlah</label>
                                <input type="number" name="jumlah"
                                    class="form-control @error('jumlah') is-invalid @enderror" placeholder="Labor Komputer"
                                    value="{{ $item->jumlah }}">
                                @error('jumlah')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label " style="font-size: .8em">Kategori</label>
                                <select class="form-select " aria-label="Default select example" name="kondisi">
                                    @if ($item->kondisi == 'baik')
                                        <option value="baik" selected>Baik</option>
                                        <option value="rusak_ringan">Rusak Ringan</option>
                                        <option value="rusak_berat">Rusak Berat</option>
                                    @else
                                        @if ($item->kondisi == 'rusak_ringan')
                                            <option value="rusak_ringan" selected>Rusak Ringan</option>
                                            <option value="baik">Baik</option>
                                            <option value="rusak_berat">Rusak Berat</option>
                                        @else
                                            <option value="rusak_berat" selected>Rusak Berat</option>
                                            <option value="baik">Baik</option>
                                            <option value="rusak_ringan">Rusak Ringan</option>
                                        @endif
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- end update ruang --}}

    {{-- create ruang --}}
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Bangun Ruang</h1>

                    <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                </div>
                <form action="/admin-ruang" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Jenis Ruang</label>
                            <input type="text" name="jenis_ruang"
                                class="form-control @error('jenis_ruang') is-invalid @enderror"
                                placeholder="Labor Komputer">
                            @error('jenis_ruang')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Jumlah</label>
                            <input type="number" name="jumlah"
                                class="form-control @error('jumlah') is-invalid @enderror" placeholder="Labor Komputer">
                            @error('jumlah')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <label class="form-label " style="font-size: .8em">Kondisi</label>
                        <select class="form-select" aria-label="Default select example" name="kondisi">
                            <option value="baik">Baik</option>
                            <option value="rusak_ringan">Rusak Ringan</option>
                            <option value="rusak_berat">Rusak Berat</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah Ruang</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
    </div>
    {{-- end create ruang --}}

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
