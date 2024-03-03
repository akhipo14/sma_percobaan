@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Kelas</h3>
    <button href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah</button>
    <div class="card p-3 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="table-responsive">

            <table class=" table bg-white  text-center">
                <thead>
                    <tr>
                        <th class="px-2 py-1 col-1 text-start">no</th>
                        <th class="px-2 py-1 col-5 text-center">Kelas</th>
                        <th class="px-2 py-1 col-1 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody style="">
                    @if ($kelas->isNotEmpty())
                        @foreach ($kelas as $item)
                            <tr>
                                <td class="px-2  pb-0 text-start">
                                    {{ $loop->iteration }}</td>
                                <td class="px-2 pb-0 text-center">{{ $item->nama_kelas }}</td>
                                <td class="px-2 pb-0">
                                    <div class="d-flex justify-content-center gap-2">

                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editmodal{{ $item->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>

                                        <a href="{{ route('kelas.delete', $item->id) }}" data-confirm-delete="true"
                                            class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash confirm-button"></i></a>

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
        </div>
        <div class="style_paginator " style="float: right; margin-left:auto;">
            {{ $kelas->links() }}
        </div>
    </div>

    @foreach ($kelas as $item)
        <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <form action="{{ route('kelas.update', $item->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Jenis
                                    Guru</label>
                                <input type="text" name="nama_kelas"
                                    class="form-control @error('nama_kelas') is-invalid @enderror"
                                    value="{{ $item->nama_kelas }}">
                                @error('nama_kelas')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Edit </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    {{-- create kelas --}}
    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kelas</h1>

                    <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                </div>
                <form action="/admin-kelas" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Nama Kelas</label>
                            <input type="text" name="nama_kelas"
                                class="form-control @error('nama_kelas') is-invalid @enderror" placeholder="hello World"
                                id="nama_kategori_tambah" value="{{ old('nama_kelas') }}">
                            @error('nama_kelas')
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
                </form>
            </div>
        </div>
    </div>
    {{-- end kategori --}}
@endsection
