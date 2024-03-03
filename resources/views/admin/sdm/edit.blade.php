@extends('admin.main')
@section('content')
    <h3 class="text-primary">Edit SMD</h3>
    <form action="{{ route('sdm.update', $sdms) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 mb-2 me-0" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="form-control  @error('nama') is-invalid @enderror" value="{{ $sdms->nama }}"
                    id="exampleFormControlInput1">
                @error('nama')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Posisi</label>
                <input type="text" name="posisi" id="posisi"
                    class="form-control  @error('posisi') is-invalid @enderror" value="{{ $sdms->posisi }}"
                    id="exampleFormControlInput1">
                @error('posisi')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <img class="img-preview rounded" style="max-width: 250px;max-height:250px;margin:0;"
                    src="{{ asset('storage/' . $sdms->foto) }}">
                <br>
                <label class="form-label " style="font-size: .8em">Foto</label>

                <input type="file" id="image" name="foto" accept="image/*"
                    class="form-control @error('foto') is-invalid @enderror" value="{{ $sdms->foto }}"
                    onchange="previewImage()">
                @error('foto')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="/admin-sdm" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFRevent) {
                imgPreview.src = oFRevent.target.result;
            }
        }
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        });
    </script>
@endsection
