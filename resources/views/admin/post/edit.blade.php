@extends('admin.main')
@section('content')
    @include('sweetalert::alert')

    <h3 class="text-primary">Edit Postingan</h3>
    <form action="{{ route('posts.update', $posts) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Judul</label>
                <input type="text" name="judul" id="judul"
                    class="form-control  @error('judul') is-invalid @enderror" value="{{ $posts->judul }}"
                    id="exampleFormControlInput1">
                @error('judul')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">slug</label>
                <input type="text" name="slug" id="slug" class="form-control" id="exampleFormControlInput1"
                    disabled value="{{ $posts->slug }}">
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">Kategori</label>
                <select class="form-select " aria-label="Default select example" name="kategori_id">
                    @foreach ($kategoris as $item)
                        @if ($posts->kategori_id == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->nama_kategori }}</option>
                        @else
                            <option value= "{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                @if ($posts->foto)
                    <img class="img-preview " style="max-width: 250px;max-height:250px;margin:0;"
                        src="{{ asset('storage/' . $posts->foto) }}">
                @else
                    <img class="img-preview " style="max-width: 250px;max-height:250px;margin:0;">
                @endif
                <br>
                <label class="form-label " style="font-size: .8em">Foto</label>

                <input type="file" id="image" name="foto" accept="image/*"
                    class="form-control @error('foto') is-invalid @enderror" value="{{ $posts->foto }}"
                    onchange="previewImage()">
                @error('foto')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">Body</label>
                <input class=" @error('body') is-invalid @enderror" value="{{ old('body', $posts->body) }}" id="body"
                    type="hidden" name="body">
                <trix-editor input="body"></trix-editor>
                @error('body')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a type="button" class="btn btn-secondary" href="/admin-post">Kembali</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </div>

    </form>
    <script>
        function slugifyjudul(judul) {
            return judul.toLowerCase().replace(/[^\w\s-]/g, '').trim().replace(/\s+/g, '-');
        }

        document.getElementById('judul').addEventListener('input', function() {
            var judul = this.value;
            var slug = slugifyjudul(judul);
            document.getElementById('slug').value = slug;
        });


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
