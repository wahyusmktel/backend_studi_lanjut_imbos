@extends('admin.layouts.app')

@section('title', 'Detail Absensi Guru')

@section('content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Detail Absensi Guru - {{ $absensi->guru->nama }}</h5>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.absensi-guru.index') }}">Data Absensi Guru</a></li>
            <li class="active"><span>{{ $absensi->guru->nama }}</span></li>
        </ol>
    </div>
</div>
<!-- /Title -->

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default border-panel card-view">
            <div class="panel-heading">
                <h6 class="panel-title txt-dark">Detail Absensi</h6>
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
                                        <th>Nama Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Tanggal</th>
                                        <th>Catatan</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $absensi->guru->nama }}</td>
                                        <td>{{ $absensi->guru->mataPelajaran->namaMataPelajaran }}</td>
                                        <td>{{ $absensi->kelas->nama_kelas }}</td>
                                        <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d-m-Y') }}</td>
                                        <td>{{ $absensi->catatan }}</td>
                                        <td>
                                            @if($absensi->foto)
                                                <a href="{{ asset('storage/' . $absensi->foto) }}" target="_blank">Lihat Foto</a>
                                            @else
                                                Tidak ada foto
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('admin.absensi-guru.index') }}" class="btn btn-default">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->

@endsection
