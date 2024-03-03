<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .text-start {
            text-align: start;
            text-align: left;
        }


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



        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: rgb(94, 114, 228);
            color: white;
            border: none;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="text-center" style="margin-bottom: -10px">Absensi Pegawai</h1>
    {{-- <h5>{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</h5> --}}
    <h3 class="text-center">SDN Percobaan</h3>
    <p style="font-size: .9em;margin-bottom:30px" class="text-center">
        {{ \Carbon\Carbon::parse($inputData)->isoFormat('dddd, D MMMM Y') }}
    </p>
    {{-- <h5>{{ $inputData }}</h5> --}}

    <table class=" table bg-white " id="customers">
        <thead>
            <tr>
                <th class="  th-1 " style="">no</th>
                <th class=" text-start">Nama</th>
                <th class=" text-start">Nip</th>
                <th class=" text-start">Posisi</th>
                <th class="text-start  th-2">Ket</th>
            </tr>
        </thead>
        <tbody style="">
            @if ($absensdm->isNotEmpty())
                @foreach ($absensdm as $item)
                    <tr>
                        <td class=" text-center">
                            {{ $loop->iteration }}</td>
                        <td class=" ">{{ $item->nama }}</td>
                        <td class=" ">{{ $item->nip }}</td>
                        <td class=" ">{{ $item->posisi }}</td>
                        <td class="">{{ $item->ket }}</td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">Data Kosong</td>
                </tr>
            @endif
        </tbody>
    </table>

</body>

</html>
