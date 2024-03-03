@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Classroom</h3>
    <a href="/admin-classroom/add" class="btn btn-primary">Tambah</a>
    <div class="card p-3 py-1 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="table-responsive">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded  ">
                    <thead>
                        <tr>
                            <th class="px-1 py-1 col-1">no</th>
                            <th class="px-1 py-1 col-3">Mata Pelajaran</th>
                            <th class="px-1 py-1 col-3 ">Kelas</th>
                            <th class="px-1 py-1 col-3 ">Nama Guru</th>
                            <th class="px-1 py-1 col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @if ($classrooms->isNotEmpty())
                            @foreach ($classrooms as $item)
                                <tr>
                                    <td class="px-1  pb-0">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-1 pb-0">{{ $item->mapel->nama_pelajaran }}</td>
                                    <td class="px-1 pb-0">{{ $item->kelas->nama_kelas }}</td>
                                    <td class="px-1 pb-0">{{ $item->sdm->nama }}</td>
                                    <td class="px-1 pb-0">
                                        <div class="d-flex justify-content-center gap-2">

                                            <a class="btn btn-primary btn-sm"
                                                href="/admin-classroom/{{ $item->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>


                                            <a type="submit" href="/admin-classroom/ {{ $item->id }} }}"
                                                data-confirm-delete="true" class="btn btn-danger btn-sm"><i
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
        </div>
        <div class="style_paginator " style="float: right;margin-left:auto; ">
            {{ $classrooms->links() }}
        </div>
    </div>

@endsection
