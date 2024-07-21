@extends('admin.layouts.app')

@section('title', 'Data Absensi')

@section('content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Data Absensi</h5>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="#">Master Data</a></li>
            <li class="active"><span>Data Absensi</span></li>
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
                        <form method="GET" action="{{ route('admin.absensi.index') }}">
                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <input type="date" id="date" name="date" class="form-control" value="{{ request('date') }}">
                                    <select name="mata_pelajaran_id" class="form-control">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        @foreach($mataPelajarans as $mp)
                                            <option value="{{ $mp->id }}" {{ request('mata_pelajaran_id') == $mp->id ? 'selected' : '' }}>{{ $mp->namaMataPelajaran }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                    <button type="submit" class="btn btn-orange btn-anim"><i class="icon-magnifier"></i><span class="btn-text">Cari</span></button>
                                    </span> 
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4 col-xs-6 text-right">
                        <a href="{{ route('admin.absensi.export', ['date' => request('date'), 'mata_pelajaran_id' => request('mata_pelajaran_id')]) }}" class="btn btn-success">Download Excel</a>
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
                                        <th>Mata Pelajaran</th>
                                        <th>Guru</th>
                                        <th>Tanggal</th>
                                        <th>Kehadiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($absensiDetails as $index => $detail)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $detail->siswa->nama_siswa }}</td>
                                        <td>{{ $detail->absensi->kelas->nama_kelas }}</td>
                                        <td>{{ $detail->absensi->guru->mataPelajaran->namaMataPelajaran }}</td>
                                        <td>{{ $detail->absensi->guru->nama }}</td>
                                        <td>{{ $detail->absensi->tanggal }}</td>
                                        <td>
                                            @if($detail->kehadiran == 1)
                                                Hadir
                                            @elseif($detail->kehadiran == 0)
                                                Tidak Hadir
                                            @elseif($detail->kehadiran == 2)
                                                Sakit
                                            @endif
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
                                {{ $absensiDetails->appends(['date' => request('date'), 'mata_pelajaran_id' => request('mata_pelajaran_id')])->links('vendor.pagination.custom') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->

@if(session('success'))
<script>
    $(document).ready(function() {
        setTimeout(function() {
            swal({
                title: "Success!",
                text: "{{ session('success') }}",
                type: "success",
                confirmButtonText: "OK"
            });
        }, 1000);
    });
</script>
@endif

@endsection
