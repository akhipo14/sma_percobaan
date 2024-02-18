@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Gallery</h3>
    <a href="/admin-gallery/add" class="btn btn-primary">Tambah</a>
    <div class="table-responsive">
        <div class="card p-3 py-1 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded  ">
                    <thead>
                        <tr>
                            <th class="px-1 py-1 col-1">no</th>
                            <th class="px-1 py-1 col-3">Judul</th>
                            <th class="px-1 py-1 col-3 text-center">Gambar</th>
                            <th class="px-1 py-1 col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @if ($gallerys->isNotEmpty())
                            @foreach ($gallerys as $item)
                                <tr>
                                    <td class="px-1  pb-0">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-1 pb-0">{{ $item->judul }}</td>
                                    <td class="px-1 pb-0">
                                        <img class="img-preview rounded mx-auto d-block"
                                            style="max-width: 150px;max-height:100px;margin:0;"
                                            src="{{ asset('storage/' . $item->gambar) }}">
                                    </td>
                                    <td class="px-1 pb-0">
                                        <div class="d-flex justify-content-center gap-2">

                                            <a class="btn btn-primary btn-sm"
                                                href="/admin-gallery/{{ $item->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>

                                            <form action="/admin-gallery/{{ $item->id }} " method="post">
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
                <div class="style_paginator " style="float: right; ">
                    {{ $gallerys->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
