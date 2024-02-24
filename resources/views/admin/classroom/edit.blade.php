@extends('admin.main')
@section('content')
    <h3 class="text-primary mb-3">Tambah Classroom</h3>
    <form action="/admin-classroom/{{ $classrooms->id }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">Mata pelajaran</label>
                <select class="form-select " aria-label="Default select example" name="mapel_id">
                    @foreach ($mapels as $item)
                        @if ($classrooms->mapel_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_pelajaran }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_pelajaran }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">Kelas</label>
                <select class="form-select " aria-label="Default select example" name="kelas_id">
                    @foreach ($kelas as $item)
                        @if ($classrooms->kelas_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_kelas }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_kelas }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">Nama Guru</label>
                <select class="form-select " aria-label="Default select example" name="sdm_id">
                    @foreach ($sdms as $item)
                        @if ($classrooms->sdm_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Link google
                    Classroom</label>
                <input type="text" name="link" class="form-control  @error('link') is-invalid @enderror"
                    value="{{ $classrooms->link }}">
                @error('link')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="/admin-classroom" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>
@endsection
