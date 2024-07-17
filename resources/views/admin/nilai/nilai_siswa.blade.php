@extends('admin.layouts.app')

@section('title', 'Data Nilai Siswa')

@section('content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Data Nilai Siswa</h5>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="#">Nilai</a></li>
            <li class="active"><span>Data Nilai Siswa</span></li>
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
                        <h6 class="panel-title txt-dark">Data Nilai Siswa</h6>
                    </div>
                    <div class="col-md-4 col-xs-6 text-right">
                        <form method="GET" action="{{ route('admin.nilai-siswa.index') }}">
                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <input type="text" id="search" name="search" class="form-control" placeholder="Cari Nama Siswa..." value="{{ $search }}">
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
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($siswas as $siswa)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $siswa->nama_siswa }}</td>
                                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                                            <td>
                                                <a href="{{ route('admin.nilai.detail', $siswa->id) }}" class="btn btn-info">Detail</a>
                                                <form action="{{ route('admin.nilai.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav class="pagination-wrap d-inline-block" aria-label="Page navigation example">
                                {{ $siswas->appends(request()->query())->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
@endsection
