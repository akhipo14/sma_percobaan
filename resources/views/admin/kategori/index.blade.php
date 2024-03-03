@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Category</h3>
    <button href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah</button>
    <div class="card p-3 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="table-responsive">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded  ">
                    <thead>
                        <tr>
                            <th class="px-2 py-1 col-1">no</th>
                            <th class="px-2 py-1 col-3">Kategori</th>
                            <th class="px-2 py-1 col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @if ($kategoris->isNotEmpty())
                            @foreach ($kategoris as $item)
                                <tr>
                                    <td class="px-2  pb-0">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-2 pb-0">{{ $item->nama_kategori }}</td>
                                    <td class="px-2 pb-0">
                                        <div class="d-flex justify-content-center gap-2">

                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editmodal{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>

                                            <form action="/admin-kategori/{{ $item->id }} " method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" onclick="return confirm('yakin mau hapus data ?')"
                                                    class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-trash confirm-button"></i></button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Data Kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="style_paginator " style="float: right; margin-left: auto;">
            {{ $kategoris->links() }}
        </div>
    </div>

    @foreach ($kategoris as $item)
        <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <form action="/admin-kategori/{{ $item->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Jenis
                                    Guru</label>
                                <input type="text" name="nama_kategori"
                                    class="form-control @error('nama_kategori') is-invalid @enderror"
                                    id="nama_kategori_edit_{{ $item->id }}" value="{{ $item->nama_kategori }}">
                                @error('nama_kategori')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label " style="font-size: .8em">Slug</label>
                                <input type="text" name="slug"
                                    class="form-control slug-input @error('slug') is-invalid @enderror" readonly
                                    id="slug2_{{ $item->id }}" value="{{ $item->slug }}">
                                @error('slug')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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


    {{-- create kategori --}}
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>

                    <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                </div>
                <form action="/admin-kategori" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Nama Kategori</label>
                            <input type="text" name="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="hello World"
                                id="nama_kategori_tambah" value="{{ old('nama_kategori') }}">
                            @error('nama_kategori')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Slug</label>
                            <input type="text" name="slug"
                                class="form-control slug-input @error('slug') is-invalid @enderror" readonly
                                id="slug" value="">
                            @error('slug')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
            </div>

            </form>
        </div>
    </div>
    {{-- end kategori --}}

    <script>
        // create
        // const nama_kategori = document.querySelector('#nama_kategori');
        // const slug = document.querySelector('#slug');

        // nama_kategori.addEventListener('change', function() {
        //     fetch('/admin-kategori/slug?nama_kategori=' + nama_kategori.value)
        //         .then(response => response.json())
        //         .then(data => slug.value = data.slug)
        // });

        // end create
        function slugifyTambahKategori(nama_kategori_tambah) {
            return nama_kategori_tambah.toLowerCase().replace(/[^\w\s-]/g, '').trim().replace(/\s+/g, '-');
        }

        document.getElementById('nama_kategori_tambah').addEventListener('input', function() {
            var nama_kategori_tambah = this.value;
            var slug = slugifyTambahKategori(nama_kategori_tambah);
            document.getElementById('slug').value = slug;
        });

        function slugifyEditKategori(nama_kategori_edit) {
            return nama_kategori_edit.toLowerCase().replace(/[^\w\s-]/g, '').trim().replace(/\s+/g, '-');
        }
    </script>
    @foreach ($kategoris as $item)
        <script>
            document.getElementById('nama_kategori_edit_{{ $item->id }}').addEventListener('input', function() {
                var nama_kategori_edit = this.value;
                var slug = slugifyEditKategori(nama_kategori_edit);
                document.getElementById('slug2_{{ $item->id }}').value = slug;

            });
        </script>
    @endforeach
    {{-- <script>
        document.getElementById('nama_kategori_edit').addEventListener('input', function() {
            var nama_kategori_edit = this.value;
            var slug2 = slugifyEditKategori(nama_kategori_edit);
            document.getElementById('slug2').value = slug2;
        });
    </script> --}}

@endsection
