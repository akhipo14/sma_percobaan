@extends('admin.main')
@section('content')
    <h3 class="text-primary mb-3">Edit Prestasi</h3>
    <form action="/admin-prestasi/{{ $prestasis->id }}" enctype="multipart/form-data" method="post">
        @method('put')
        @csrf
        <div class="card p-3 mb-2 me-0" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Detail Prestasi</label>
                <input type="text" name="detail_prestasi" id="detail_prestasi"
                    class="form-control  @error('detail_prestasi') is-invalid @enderror"
                    value="{{ $prestasis->detail_prestasi }}" id="exampleFormControlInput1">
                @error('detail_prestasi')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="form-control  @error('nama') is-invalid @enderror" value="{{ $prestasis->nama }}"
                    id="exampleFormControlInput1">
                @error('nama')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Tingkat</label>
                <input type="text" name="tingkat" id="tingkat"
                    class="form-control  @error('tingkat') is-invalid @enderror" value="{{ $prestasis->tingkat }}"
                    id="exampleFormControlInput1">
                @error('tingkat')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Tahun</label>
                <input type="number" name="tahun" class="form-control  @error('tahun') is-invalid @enderror"
                    value="{{ $prestasis->tahun }}">
                @error('tahun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="/admin-prestasi" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>
@endsection
