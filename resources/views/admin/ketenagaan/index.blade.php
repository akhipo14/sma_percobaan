@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <button href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah
        Ketenagaan</button>

    <div class="table-responsive">
        <div class="card p-3 mb-3" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded text-center">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>
                                <div class="d-flex">
                                    Jenis Guru
                                </div>
                            </th>
                            <th>Laki - laki</th>
                            <th>Perempuan</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @foreach ($ketenagaans as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        {{ $item->jenis_guru }}
                                    </div>
                                </td>
                                <td>{{ $item->laki_laki }}</td>
                                <td>{{ $item->perempuan }}</td>
                                <td>{{ $item->laki_laki + $item->perempuan }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#showmodal{{ $item->id }}"><i
                                                class="fa-solid fa-eye"></i></button>

                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editmodal{{ $item->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>

                                        <form id="hapus" action="/admin-ketenagaan/{{ $item->id }} " method="post">
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
                    </tbody>
                </table>
                <div class="style_paginator " style="float: right; ">
                    {{ $ketenagaans->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    @foreach ($ketenagaans as $item)
        <div class="modal fade" id="editmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Ketenagaan</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                    </div>
                    <form action="/admin-ketenagaan/{{ $item->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Jenis
                                    Guru</label>
                                <input type="text" name="jenis_guru"
                                    class="form-control @error('jenis_guru') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->jenis_guru }}">
                                @error('jenis_guru')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="font-size: .8em">Laki-laki</label>
                                <input type="number" name="laki_laki"
                                    class="form-control @error('laki_laki') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->laki_laki }}">
                                @error('laki_laki')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="font-size: .8em">Perempuan</label>
                                <input type="number" name="perempuan"
                                    class="form-control @error('perempuan') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->perempuan }}">
                                @error('perempuan')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label class="form-label" style="font-size: .8em">Keterangan (Optional)</label>
                                <textarea rows="4" type="text" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                    placeholder="masukkan Keterangan (Optional)">{{ $item->ket }}</textarea>
                                @error('ket')
                                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Edit Ketenagaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end edit modal --}}

    {{-- show modal --}}
    @foreach ($ketenagaans as $item)
        <div class="modal fade" id="showmodal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Lengkap Ketenagaan</h1>

                        <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close"
                            style="cursor: pointer"></i>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Jenis
                                Guru</label>
                            <input type="text" name="jenis_guru"
                                class="form-control @error('jenis_guru') is-invalid @enderror"
                                id="exampleFormControlInput1" value="{{ $item->jenis_guru }}" disabled>
                        </div>
                        <div class="d-flex justify-content-between gap-2">
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="font-size: .8em">Laki-laki</label>
                                <input type="number" name="laki_laki"
                                    class="form-control @error('laki_laki') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->laki_laki }}" disabled>

                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label"
                                    style="font-size: .8em">Perempuan</label>
                                <input type="number" name="perempuan"
                                    class="form-control @error('perempuan') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->perempuan }}" disabled>
                            </div>
                            <div class="mb-2">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Total
                                    Ketenagaan</label>
                                <input type="number" name="perempuan"
                                    class="form-control @error('perempuan') is-invalid @enderror"
                                    id="exampleFormControlInput1" value="{{ $item->perempuan + $item->laki_laki }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label" style="font-size: .8em">Keterangan (Optional)</label>
                            <textarea rows="4" type="text" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                disabled>{{ $item->ket }}</textarea>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end show modal --}}


    <div class="modal fade" id="tambahmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ketenagaan</h1>

                    <i class="fa-solid fa-xmark" data-bs-dismiss="modal" aria-label="Close" style="cursor: pointer"></i>
                </div>
                <form action="/admin-ketenagaan" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label " style="font-size: .8em">Jenis Guru</label>
                            <input type="text" name="jenis_guru"
                                class="form-control @error('jenis_guru') is-invalid @enderror" placeholder="Tata usaha">
                            @error('jenis_guru')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label" style="font-size: .8em">Laki-Laki</label>
                            <input type="number" name="laki_laki"
                                class="form-control @error('laki_laki') is-invalid @enderror" placeholder="0">
                            @error('laki_laki')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-2">
                            <label class="form-label" style="font-size: .8em">Perempuan</label>
                            <input type="text" name="perempuan"
                                class="form-control @error('perempuan') is-invalid @enderror" placeholder="0">
                            @error('perempuan')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div class="mb-2">
                            <label class="form-label" style="font-size: .8em">Keterangan (Optional)</label>
                            <textarea rows="4" type="text" name="ket" class="form-control @error('ket') is-invalid @enderror"
                                placeholder="masukkan Keterangan (Optional)"></textarea>
                            @error('ket')
                                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Tambah Ketenagaan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
