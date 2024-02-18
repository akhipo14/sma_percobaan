@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Jadwal / {{ $jadwals->kelas->nama_kelas }} / {{ $jadwals->hari->nama_hari }}</h3>
    <form action="/admin-jadwal/{{ $jadwals->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">07.00 - 07.30</label>
                <select class="form-select " aria-label="Default select example" name="mapel_1_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_1_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">07.30 - 08.05</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_2_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_2_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">08.05 - 08.40</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_3_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_3_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">08.40 - 09.15</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_4_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_4_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">09.15 - 09.50</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_5_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_5_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">09.50 - 10.10</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_6_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_6_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">10.10 - 10.45</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_7_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_7_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">10.45 - 11.20</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_8_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_8_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">11.20 - 11.55</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_9_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_9_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">11.55 - 13.00</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_10_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_10_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">13.00 - 13.35</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_11_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_11_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">13.35 - 14.00</label>
                <select class="form-select " aria-label="Default select example" name=" mapel_12_id">
                    @foreach ($pelajarans as $item)
                        @if ($jadwals->mapel_12_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a type="button" class="btn btn-secondary" href="/admin-post">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>
@endsection
