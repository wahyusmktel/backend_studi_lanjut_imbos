@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Berita</h1>
        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="judul_berita">Judul Berita</label>
                <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ $berita->judul_berita }}" required>
            </div>
            <div class="form-group">
                <label for="isi_berita">Isi Berita</label>
                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" required>{{ $berita->isi_berita }}</textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
                <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto Berita" class="img-thumbnail mt-2" style="width: 200px;">
            </div>
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    @foreach($kategoriBeritas as $kategori)
                        <option value="{{ $kategori->id }}" {{ $kategori->id == $berita->kategori_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">File (optional)</label>
                <input type="file" class="form-control" id="file" name="file">
                @if($berita->file)
                    <a href="{{ asset('storage/' . $berita->file) }}" target="_blank" class="d-block mt-2">Lihat File</a>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#isi_berita').summernote({
                height: 300
            });
        });
    </script>
@endsection
