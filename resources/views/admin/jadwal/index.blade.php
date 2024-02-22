@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Manage Jadwal</h3>
    <div class="d-flex justify-content-start">
        <form method="GET" action="{{ route('jadwal.index') }}">
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <label class="form-label " style="font-size: 1em">Pilih Kelas</label>
                </div>
                <div class="col-auto" style="display: flex;justify-content: center;align-items: center">
                    <select class="form-select   border-primary"
                        style="background-color: white; padding:8px 30px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;"
                        aria-label="Default select example" name="kelas" onchange="this.form.submit()">
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}"
                                {{ request()->input('kelas') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    {{-- <p>{{ $pelajarans[]->id }}</p> --}}

    <div class="card p-3 mb-5 ">
        <div class="table-responsive  ">
            <table class=" table bg-white  text-center">
                <thead class=" ">
                    <tr>
                        <th class="border-buttom">Hari</th>
                        <th class="border-buttom">Kelas</th>
                        <th class="  border-buttom">07.30 - 07.30</th>
                        <th class="  border-buttom">07.30 - 08.05</th>
                        <th class="  border-buttom">08.05 - 08.40</th>
                        <th class="  border-buttom">08.40 - 09.15</th>
                        <th class="  border-buttom">09.15 - 09.50</th>
                        <th class="  border-buttom">09.50 - 10.10</th>
                        <th class="  border-buttom">10.10 - 10.45</th>
                        <th class="  border-buttom">10.45 - 11.20</th>
                        <th class="  border-buttom">11.20 - 11.55</th>
                        <th class="  border-buttom">11.55 - 13.00</th>
                        <th class="  border-buttom">13.00 - 13.35</th>
                        <th class="  border-buttom">13.35 - 14.00</th>
                        <th class=" border-buttom text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwals_hari as $hariItem)
                        <tr>

                            <td>{{ $hariItem->nama_hari }}</td>
                            @if (isset($jadwals_by_hari[$hariItem->id]) && count($jadwals_by_hari[$hariItem->id]) > 0)
                                <td>{{ $kelas2->nama_kelas }}</td>
                                @foreach ($jadwals_by_hari[$hariItem->id] as $jadwal)
                                    <td>{{ $jadwal->pelajaran_id ? $jadwal->pelajaran->nama_pelajaran : '-' }}</td>
                                @endforeach
                            @else
                                <td>Tidak ada jadwal untuk hari ini.</td>
                            @endif
                            <td class="border-top border-buttom">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="/admin-jadwal/{{ $kelas2->id }}/{{ $hariItem->id }}/edit"
                                        class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="card p-3 mb-5 ">
        <div class="table-responsive  ">
            <table class=" table bg-white  text-center">
                <thead class=" ">
                    <tr>
                        <th class="border-buttom">no</th>
                        <th class="  border-buttom">Hari</th>
                        <th class="  border-buttom">Kelas</th>
                        <th class="  border-buttom">07.30 - 07.30</th>
                        <th class="  border-buttom">07.30 - 08.05</th>
                        <th class="  border-buttom">08.05 - 08.40</th>
                        <th class="  border-buttom">08.40 - 09.15</th>
                        <th class="  border-buttom">09.15 - 09.50</th>
                        <th class="  border-buttom">09.50 - 10.10</th>
                        <th class="  border-buttom">10.10 - 10.45</th>
                        <th class="  border-buttom">10.45 - 11.20</th>
                        <th class="  border-buttom">11.20 - 11.55</th>
                        <th class="  border-buttom">11.55 - 13.00</th>
                        <th class="  border-buttom">13.00 - 13.35</th>
                        <th class="  border-buttom">13.35 - 14.00</th>
                        <th class=" border-buttom text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($jadwals->isNotEmpty())
                        @foreach ($jadwals as $item)
                            <tr>
                                <td class="border-top border-buttom">{{ $loop->iteration }}</td>
                                <td class="border-top border-buttom">{{ $item->hari->nama_hari }}</td>
                                <td class="border-top border-buttom">{{ $item->kelas->nama_kelas }}</td>
                                <td class="border-top border-buttom">{{ $item->pelajaran_id }}</td>
                                <td class="border-top border-buttom">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="/admin-jadwal/{{ $item->id }}/edit" class="btn btn-primary btn-sm"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="border-top border-buttom" colspan="16" class="text-center">Data Kosong</td>
                        </tr>
                    @endif
                </tbody>
            </table>



        </div>
    </div>
 --}}
    <!-- Misalkan ini adalah tampilan 'admin.jadwal.index' -->

    {{-- @foreach ($jadwals_hari as $hariItem)
        <h2>Jadwal untuk Hari {{ $hariItem->nama_hari }}</h2>
        @if (isset($jadwals_by_hari[$hariItem->id]) && count($jadwals_by_hari[$hariItem->id]) > 0)
            <ul>
                @foreach ($jadwals_by_hari[$hariItem->id] as $jadwal)
                    <li>{{ $jadwal->pelajaran->nama_pelajaran }} - {{ $jadwal->kelas->nama_kelas }}</li>
                @endforeach
            </ul>
        @else
            <p>Tidak ada jadwal untuk hari ini.</p>
        @endif
    @endforeach --}}

    {{-- <div class="table-responsive">
        <table class="table table-sm bg-white ">
            <thead>
                <tr>
                    <th class="border-top border-buttom">#</th>
                    <th class="border-top border-buttom">Firstname</th>
                    <th>Lastname</th>
                    <th>Age</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Sex</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                    <th>Example</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                      <td class="border-top border-buttom">1</td>
                      <td class="border-top border-buttom">Anna</td>
                      <td class="border-top border-buttom">Pitt</td>
                      <td class="border-top border-buttom">35</td>
                      <td class="border-top border-buttom">New York asd asd</td>
                      <td class="border-top border-buttom">USA</td>
                      <td class="border-top border-buttom">Female</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                </tr>
                <tr>
                      <td class="border-top border-buttom" class="border-top border-buttom">1</td>
                      <td class="border-top border-buttom" class="border-top border-buttom">Anna</td>
                      <td class="border-top border-buttom">Pitt</td>
                      <td class="border-top border-buttom">35</td>
                      <td class="border-top border-buttom">New York asd asd</td>
                      <td class="border-top border-buttom">USA</td>
                      <td class="border-top border-buttom">Female</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                      <td class="border-top border-buttom">Yes</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
@endsection
