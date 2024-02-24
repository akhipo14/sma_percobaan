@extends('admin.main')
@section('content')
    <h3 class="text-primary">Edit Gallery</h3>
    <form action="{{ Route('gallery.update', $gallerys) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 pb-1 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Judul</label>
                <input type="text" name="judul" id="judul"
                    class="form-control  @error('judul') is-invalid @enderror" value="{{ $gallerys->judul }}"
                    id="exampleFormControlInput1">
                @error('judul')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <img class="img-preview rounded" style="max-width: 250px;max-height:250px;margin:0;"
                    src="{{ asset('storage/' . $gallerys->gambar) }}"><br>
                <label class="form-label " style="font-size: .8em">Gambar</label>

                <input type="file" id="image" name="gambar" accept="image/*"
                    class="form-control @error('gambar') is-invalid @enderror" value="{{ $gallerys->gambar }}"
                    onchange="previewImage()">
                @error('gambar')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="/admin-gallery" class="btn btn-secondary">Kembali</a>
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
