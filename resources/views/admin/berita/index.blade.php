@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Berita</h1>
        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Kategori</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $index => $berita)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $berita->judul_berita }}</td>
                        <td>{{ $berita->kategori->nama_kategori }}</td>
                        <td>{{ $berita->author->name }}</td>
                        <td>{{ $berita->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm delete-berita" data-id="{{ $berita->id }}">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.delete-berita').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                swal({
                    title: "Apakah Anda yakin?",
                    text: "Menghapus berita ini tidak bisa dibatalkan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Tidak, batalkan",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '{{ url("admin/berita") }}/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(result) {
                                swal({
                                    title: "Dihapus!",
                                    text: "Berita berhasil dihapus.",
                                    type: "success",
                                    confirmButtonText: "OK"
                                }, function() {
                                    location.reload();
                                });
                            },
                            error: function() {
                                swal("Error!", "Terjadi kesalahan saat menghapus berita.", "error");
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Berita tetap aman :)", "error");
                    }
                });
            });
        });
    </script>
@endsection
