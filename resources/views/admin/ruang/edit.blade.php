@extends('admin.main')
@section('content')
    <h3 class="text-primary">Edit Gallery</h3>
    <form action="{{ route('ruangs.update', $ruangs) }}" enctype="multipart/form-data" method="post">
        @csrf
        @method('put')
        <div class="card p-3 mb-2 me-4" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Jenis Ruang</label>
                <input type="text" name="jenis_ruang" id="jenis_ruang"
                    class="form-control  @error('jenis_ruang') is-invalid @enderror" value="{{ $ruangs->jenis_ruang }}"
                    id="exampleFormControlInput1">
                @error('jenis_ruang')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label " style="font-size: .8em">Kondisi</label>
                <select class="form-select " aria-label="Default select example" name="kondisi">
                    @if ($ruangs->kondisi == 'baik')
                        <option value="baik" selected>Baik</option>
                        <option value= "rusak-ringan">Rusak Ringan</option>
                        <option value= "rusak-berat">Rusak Berat</option>
                    @elseif($ruangs->kondisi == 'rusak-ringan')
                        <option value="baik">Baik</option>
                        <option value= "rusak-ringan"selected>Rusak Ringan</option>
                        <option value= "rusak-berat">Rusak Berat</option>
                    @else
                        <option value="baik">Baik</option>
                        <option value= "rusak-ringan">Rusak Ringan</option>
                        <option value= "rusak-berat"selected>Rusak Berat</option>
                    @endif

                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label" style="font-size: .8em">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah"
                    class="form-control  @error('jumlah') is-invalid @enderror" value="{{ $ruangs->jumlah }}"
                    id="exampleFormControlInput1">
                @error('jumlah')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <img class="img-preview rounded " src="{{ asset('storage/' . $ruangs->image) }}"
                    style="max-width: 250px;max-height:250px;margin:0;">
                <br>
                <label class="form-label " style="font-size: .8em">Gambar</label>

                <input type="file" id="image" name="image" accept="image/*"
                    class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                @error('image')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="/admin-ruang" class="btn btn-secondary">Kembali</a>
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
