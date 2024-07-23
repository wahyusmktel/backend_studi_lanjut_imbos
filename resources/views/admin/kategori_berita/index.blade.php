@extends('admin.layouts.app')

@section('title', 'Kelola Kategori Berita')

@section('content')
<div class="container">
    <h1 class="my-4">Kelola Kategori Berita</h1>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addModal">Tambah Kategori</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoriBeritas as $index => $kategori)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->status ? 'Aktif' : 'Non-Aktif' }}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-kategori" data-id="{{ $kategori->id }}" data-nama="{{ $kategori->nama_kategori }}" data-status="{{ $kategori->status }}">Edit</button>
                    <button class="btn btn-danger btn-sm delete-kategori" data-id="{{ $kategori->id }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Tambah Kategori -->
<div id="addModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Kategori Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kategori -->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Kategori Berita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control" id="edit_nama_kategori" name="nama_kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <select class="form-control" id="edit_status" name="status">
                            <option value="1">Aktif</option>
                            <option value="0">Non-Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Tambah Kategori
        $('#addForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.kategori.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $('#addModal').modal('hide');
                    swal("Berhasil!", response.message, "success").then(() => {
                        location.reload();
                    });
                },
                error: function(response) {
                    let errors = response.responseJSON.errors;
                    let errorMessage = '';
                    for (const error in errors) {
                        errorMessage += errors[error][0] + '\n';
                    }
                    swal("Gagal!", errorMessage, "error");
                }
            });
        });

        // Edit Kategori
        $('.edit-kategori').on('click', function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let status = $(this).data('status');
            $('#edit_nama_kategori').val(nama);
            $('#edit_status').val(status ? 1 : 0);
            $('#editForm').attr('action', '/admin/kategori-berita/' + id);
            $('#editModal').modal('show');
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: "PUT",
                data: $(this).serialize(),
                success: function(response) {
                    $('#editModal').modal('hide');
                    swal("Berhasil!", response.message, "success").then(() => {
                        location.reload();
                    });
                },
                error: function(response) {
                    let errors = response.responseJSON.errors;
                    let errorMessage = '';
                    for (const error in errors) {
                        errorMessage += errors[error][0] + '\n';
                    }
                    swal("Gagal!", errorMessage, "error");
                }
            });
        });

        // Hapus Kategori
        $('.delete-kategori').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#f83f37",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Tidak, batalkan",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        url: '/admin/kategori-berita/' + id,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(result) {
                            swal({
                                title: "Dihapus!",
                                text: "Data kategori berhasil dihapus.",
                                type: "success",
                                confirmButtonText: "OK"
                            }, function() {
                                location.reload();
                            });
                        },
                        error: function() {
                            swal("Error!", "Terjadi kesalahan saat menghapus data.", "error");
                        }
                    });
                } else {
                    swal("Dibatalkan", "Data kategori tetap aman :)", "error");
                }
            });
        });
    });
</script>
@endsection
