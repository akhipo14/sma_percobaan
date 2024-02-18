@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Jadwal</h3>
    <button href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmodal">Tambah</button>
    <div class="table-responsive">
        <div class="card p-3 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded  ">
                    <thead>
                        <tr>
                            <th class="px-2 py-1 col-1">no</th>
                            <th class="px-2 py-1 col-3">Hari</th>
                            <th class="px-2 py-1 col-3">Kelas</th>
                            <th class="px-2 py-1 col-3">jam 1</th>
                            <th class="px-2 py-1 col-3">jam 2</th>
                            <th class="px-2 py-1 col-3">jam 3</th>
                            <th class="px-2 py-1 col-3">jam 4</th>
                            <th class="px-2 py-1 col-3">jam 5</th>
                            <th class="px-2 py-1 col-3">jam 6</th>
                            {{-- <th class="px-2 py-1 col-3">jam 7</th>
                            <th class="px-2 py-1 col-3">jam 8</th>
                            <th class="px-2 py-1 col-3">jam 9</th>
                            <th class="px-2 py-1 col-3">jam 10</th>
                            <th class="px-2 py-1 col-3">jam 11</th>
                            <th class="px-2 py-1 col-3">jam 12</th> --}}
                            <th class="px-2 py-1 col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @if ($jadwals->isNotEmpty())
                            @foreach ($jadwals as $item)
                                <tr>
                                    <td class="px-2  pb-0">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-2 pb-0">{{ $item->hari->nama_hari }}</td>
                                    <td class="px-2 pb-0">{{ $item->kelas->nama_kelas }}</td>
                                    <td class="px-2 pb-0">{{ $item->mapel1->nama_pelajaran }}</td>
                                    <td class="px-2 pb-0">{{ $item->mapel2->nama_pelajaran }}</td>
                                    <td class="px-2 pb-0">{{ $item->mapel3->nama_pelajaran }}</td>
                                    <td class="px-2 pb-0">{{ $item->mapel4->nama_pelajaran }}</td>
                                    <td class="px-2 pb-0">{{ $item->mapel5->nama_pelajaran }}</td>
                                    <td class="px-2 pb-0">{{ $item->mapel6->nama_pelajaran }}</td>
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
                                <td colspan="6">Data Kosong</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{-- <div class="style_paginator " style="float: right; ">
                    {{ $jadwals->links() }}
                </div> --}}
            </div>
        </div>
    </div>


@endsection
