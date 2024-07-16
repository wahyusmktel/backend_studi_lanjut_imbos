@extends('admin.layouts.app')

@section('title', 'Data Try Out')

@section('content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Data Try Out</h5>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="#">Try Out</a></li>
            <li class="active"><span>Data Try Out</span></li>
        </ol>
    </div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8 col-xs-6">
                        <div class="btn-group">
                            <div class="dropdown">
                                <button aria-expanded="false" data-toggle="dropdown" class="btn btn-orange dropdown-toggle" type="button">
                                    Menu <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i> Tambah Data</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 text-right">
                        <form method="GET" action="{{ route('admin.tryout.index') }}">
                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <input type="text" id="search" name="search" class="form-control" placeholder="Cari Data..." value="{{ request('search') }}">
                                    <span class="input-group-btn">
                                    <button type="submit" class="btn btn-orange btn-anim"><i class="icon-magnifier"></i><span class="btn-text">Cari</span></button>
                                    </span> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Try Out</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tryouts as $index => $tryout)
                                    <tr>
                                        <td>{{ $tryouts->firstItem() + $index }}</td>
                                        <td>{{ $tryout->nama_tryout }}</td>
                                        <td>{{ $tryout->tahunPelajaran->nama_tahun_pelajaran }}</td>
                                        <td class="text-nowrap">
                                            <a href="#" class="mr-25 edit-button" data-toggle="tooltip" data-original-title="Edit" data-id="{{ $tryout->id }}" data-nama="{{ $tryout->nama_tryout }}" data-tahun-pelajaran-id="{{ $tryout->tahun_pelajaran_id }}"> 
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                            </a> 
                                            <a href="#" class="delete-button" data-id="{{ $tryout->id }}" data-toggle="tooltip" data-original-title="Delete"> 
                                                <i class="fa fa-close text-danger"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav class="pagination-wrap d-inline-block" aria-label="Page navigation example">
                                {{ $tryouts->appends(['search' => request('search')])->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->

<!-- Modal Tambah Data -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.tryout.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="addModalLabel">Tambah Data Try Out</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tahun_pelajaran_id">Tahun Pelajaran</label>
                        <select class="form-control" id="tahun_pelajaran_id" name="tahun_pelajaran_id" required>
                            @foreach($tahunPelajarans as $tahunPelajaran)
                                <option value="{{ $tahunPelajaran->id }}">{{ $tahunPelajaran->nama_tahun_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_tryout">Nama Try Out</label>
                        <input type="text" class="form-control" id="nama_tryout" name="nama_tryout" placeholder="Nama Try Out" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-orange">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editForm" method="POST">
                @csrf
                @method('POST')
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="editModalLabel">Edit Data Try Out</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="editTahunPelajaranId">Tahun Pelajaran</label>
                        <select class="form-control" id="editTahunPelajaranId" name="tahun_pelajaran_id" required>
                            @foreach($tahunPelajarans as $tahunPelajaran)
                                <option value="{{ $tahunPelajaran->id }}">{{ $tahunPelajaran->nama_tahun_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editNamaTryout">Nama Try Out</label>
                        <input type="text" class="form-control" id="editNamaTryout" name="nama_tryout" placeholder="Nama Try Out" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-orange">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        @if(session('success'))
            swal("Success", "{{ session('success') }}", "success");
        @endif

        $('.edit-button').on('click', function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var tahunPelajaranId = $(this).data('tahun-pelajaran-id');

            $('#editForm').attr('action', '/admin/tryout/' + id);
            $('#editNamaTryout').val(nama);
            $('#editTahunPelajaranId').val(tahunPelajaranId);
            $('#editModal').modal('show');
        });

        $('.delete-button').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#e6b034",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(){
                $.ajax({
                    url: '/admin/tryout/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(result) {
                        swal("Deleted!", "Your data has been deleted.", "success");
                        location.reload();
                    }
                });
            });
        });
    });
</script>

@endsection
