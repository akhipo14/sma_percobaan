@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Post</h3>

    <div class="card p-3 ">
        <div class="table-responsive">
            <table class=" table bg-white   ">
                <thead>
                    <tr>
                        <th class="px-2 py-1 col-1">no</th>
                        <th class="px-2 py-1 col-3">Judul Portofolio</th>
                        <th class="px-2 py-1 col-3">Kategori</th>
                        <th class="px-2 py-1 col-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody style="">
                    @if ($posts->isNotEmpty())
                        @foreach ($posts as $item)
                            <tr>
                                <td class="px-2  pb-0">
                                    {{ $loop->iteration }}</td>
                                <td class="px-2 pb-0">{{ substr($item->judul, 0, 45) }}...</td>
                                <td class="px-2 pb-0">{{ $item->kategori->nama_kategori }}</td>
                                <td class="px-2 pb-0">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#showmodal{{ $item->id }}"
                                            href="/admin-post/{{ $item->id }}/show"><i
                                                class="fa-solid fa-eye"></i></button>

                                        <a class="btn btn-primary btn-sm" href="/admin-post/{{ $item->id }}/edit"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        {{-- 
                                        <form action="/admin-post/{{ $item->id }} " method="post" class="delete-form">
                                            @method('delete')
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" onclick="return confirm('yakin mau hapus data ?')"
                                                class="btn btn-danger btn-sm ">
                                                <i class="fa-solid fa-trash confirm-button"></i></button>
                                        </form> --}}
                                        <a type="submit" href="/admin-post/{{ $item->id }}" data-confirm-delete="true"
                                            class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash confirm-button"></i></a>
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
        <div class="style_paginator " style="float: right;margin-left: auto; ">
            {{ $posts->links() }}
        </div>
    </div>
    @foreach ($posts as $item)
        <div class="modal modal-md fade" id="showmodal{{ $item->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">lihat Postingan</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2 ">
                            <img class="img-preview rounded mx-auto d-block"
                                style="max-width: 300px;max-height:350px;margin:0;"
                                src="{{ asset('storage/' . $item->foto) }}">
                        </div>
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Judul</label>
                            <input type="text" name="nama_kategori" class="form-control"value="{{ $item->judul }}"
                                readonly>
                        </div>
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $item->slug }}"readonly>
                        </div>
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Kategori</label>
                            <input type="text" name="slug" class="form-control"
                                value="{{ $item->kategori->nama_kategori }}"readonly>
                        </div>

                        <div class="mb-2 ">
                            <label class="form-label " style="font-size: .8em">Body</label>
                            <div class="border rounded px-2  " style="text-align: justify">
                                <p style="">
                                    {!! $item->body !!}
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- <script>
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
    @endforeach --}}

@endsection
