@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Jadwal / {{ $jadwals[0]->kelas_id }} / {{ $jadwals[0]->hari->nama_hari }}</h3>
    <form action="{{ route('jadwal.update', ['kelas_id' => $jadwals[0]->kelas_id, 'hari_id' => $jadwals[0]->hari_id]) }}"
        enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 mb-2 me-0" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            @php
                $i = 0;
                $jam = [
                    '07.00 - 07.30',
                    '07.30 - 08.05',
                    '08.05 - 08.40',
                    '08.40 - 09.15',
                    '09.15 - 09.50',
                    '09.50 - 10.10',
                    '10.10 - 10.45',
                    '10.45 - 11.20',
                    '11.20 - 11.55',
                    '11.55 - 13.00',
                    '13.00 - 13.35',
                    '13.35 - 14.00',
                ];

            @endphp
            @foreach ($jadwals as $jadwal)
                <div class="mb-3">
                    {{-- <p>{{ $jadwal->pelajaran_id }}</p> --}}

                    <label class="form-label " style="font-size: .8em">{{ $jam[$i] }}</label>
                    <select class="form-select " aria-label="Default select example"
                        name="pelajaran_id[{{ $i }}]">
                        @foreach ($pelajarans as $item)
                            @if ($jadwal->pelajaran)
                                @if ($jadwal->pelajaran_id == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                                @else
                                    <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                                @endif
                            @else
                                <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @php
                    $i++;
                @endphp
            @endforeach

            <div class="d-flex justify-content-end gap-2">
                <a type="button" class="btn btn-secondary" href="/admin-jadwal">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>
@endsection
