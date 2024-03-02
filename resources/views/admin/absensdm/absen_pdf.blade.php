<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .th-1 {
            border-radius: 8px 0px 0px 0px;

        }

        .th-2 {
            border-radius: 0px 8px 0px 0px;

        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            border: none;
        }
    </style>
</head>

<body>
    <h3 class="text-primary">Absensi Pegawai</h3>
    {{-- <h5>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h5> --}}
    <h5>{{ \Carbon\Carbon::parse($inputData)->isoFormat('dddd, D MMMM Y') }}</h5>
    {{-- <h5>{{ $inputData }}</h5> --}}
    <div class="card p-3 mb-2" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="table-responsive">

            <table class=" table bg-white  text-center" id="customers">
                <thead>
                    <tr>
                        <th class="px-2 py-1 col-1 text-start th-1">no</th>
                        <th class="px-2 py-1 col-3 text-center">Nama</th>
                        <th class="px-2 py-1 col-2 text-center">Nip</th>
                        <th class="px-2 py-1 col-2 text-center">Posisi</th>
                        <th class="px-2 py-1 col-2 text-center th-2">Ket</th>
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
</body>

</html>
