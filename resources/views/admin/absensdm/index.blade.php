@extends('admin.main')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    @include('sweetalert::alert')
    <h3 class="text-primary">Absensi Pegawai</h3>
    <div class="d-flex justify-content-start">
        <form method="GET" action="{{ route('absensdms.show') }}">
            <div class="" style="display:block;;justify-content: center;align-items: center;gap:10px;">
                <div class=" mb-0">
                    <p class="form-label " style="font-size: 1em;">Pilih Tanggal</p>
                </div>
                <div style=" display: flex;justify-content: center;">

                    <div class="" style="margin-right: 10px">
                        <input type="date" class="form-control" name="created_at" value="{{ $inputdate }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Pilih</button>
                </div>
            </div>
        </form>
    </div>
    <a href=" {{ url('/admin-absen-sdm/cetak_pdf') . '/' . $inputdate }}" class="btn btn-primary" target="_blank">CETAK
        PDF</a>

    <div class="card p-3 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="table-responsive">

            <table class=" table bg-white  text-center">
                <thead>
                    <tr>
                        <th class="px-2 py-1 col-1 text-start">no</th>
                        <th class="px-2 py-1 col-3 text-center">Nama</th>
                        <th class="px-2 py-1 col-2 text-center">Nip</th>
                        <th class="px-2 py-1 col-2 text-center">Posisi</th>
                        <th class="px-2 py-1 col-2 text-center">Ket</th>
                        {{-- <th class="px-2 py-1 col-1 text-center">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody style="">
                    @if ($absensdm->isNotEmpty())
                        @foreach ($absensdm as $item)
                            <tr>
                                <td class="px-2  pb-0 text-start">
                                    {{ $loop->iteration }}</td>
                                <td class="px-2 pb-0 text-center">{{ $item->nama }}</td>
                                <td class="px-2 pb-0 text-center">{{ $item->nip }}</td>
                                <td class="px-2 pb-0 text-center">{{ $item->posisi }}</td>
                                <td class="px-2 pb-0 text-center">{{ $item->ket }}</td>
                                {{-- <td class="px-2 pb-0">
                                    <div class="d-flex justify-content-center gap-2">

                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editmodal{{ $item->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>

                                        <a href="{{ route('kelas.delete', $item->id) }}" data-confirm-delete="true"
                                            class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash confirm-button"></i></a>

                                    </div>

                                </td> --}}
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
                {{ $kelas->links() }}
            </div> --}}
        </div>
    </div>

@endsection
