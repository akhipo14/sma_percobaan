@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <button href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah
        Bangun Ruang</button>

    <div class="table-responsive">
        <div class="card p-2 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
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
                            <th class="px-2 py-1 col-2" colspan="2"> Jenis Ruang</th>
                            <th class="px-2 py-1 col-1">Kondisi</th>
                            <th class="px-2 py-1 table-primary col-1">Aksi</th>
                        </tr>

                    </thead>
                    <tbody style="">
                        @if ($ruangs->isNotEmpty())
                            @foreach ($ruangs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td colspan="2">{{ $item->jenis_ruang }}</td>
                                    <td> {{ $item->kondisi }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">

                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editmodal{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>

                                            <form id="hapus" action="/admin-ketenagaan/{{ $item->id }} "
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    onclick="return confirm('hapus {{ $item->jenis_guru }} ?')"
                                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
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
@endsection
