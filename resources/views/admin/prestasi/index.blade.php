@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Prestasi</h3>
    <a href="/admin-prestasi/add" class="btn btn-primary">Tambah</a>
    <div class="table-responsive">
        <div class="card p-3 py-1 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class=" table-striped table-hover ">
                <table class=" table bg-white rounded  ">
                    <thead>
                        <tr>
                            <th class="px-1 py-1 col-1">no</th>
                            <th class="px-1 py-1 col-3">Nama</th>
                            <th class="px-1 py-1 col-3 ">Tingkat</th>
                            <th class="px-1 py-1 col-3 ">Tahun</th>
                            <th class="px-1 py-1 col-1 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="">
                        @if ($prestasis->isNotEmpty())
                            @foreach ($prestasis as $item)
                                <tr>
                                    <td class="px-1  pb-0">
                                        {{ $loop->iteration }}</td>
                                    <td class="px-1 pb-0">{{ $item->nama }}</td>
                                    <td class="px-1 pb-0">{{ $item->tingkat }}</td>
                                    <td class="px-1 pb-0">{{ $item->tahun }}</td>
                                    <td class="px-1 pb-0">
                                        <div class="d-flex justify-content-center gap-2">

                                            <a class="btn btn-primary btn-sm"
                                                href="/admin-prestasi/{{ $item->id }}/edit"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>


                                            <a type="submit" href="/admin-prestasi/ {{ $item->id }} }}"
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
                <div class="style_paginator " style="float: right; ">
                    {{ $prestasis->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
