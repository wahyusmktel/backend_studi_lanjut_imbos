@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Berita</h1>
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul_berita">Judul Berita</label>
                <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
            </div>
            <div class="form-group">
                <label for="isi_berita">Isi Berita</label>
                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id" required>
                    @foreach($kategoriBeritas as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">File (optional)</label>
                <input type="file" class="form-control" id="file" name="file">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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
