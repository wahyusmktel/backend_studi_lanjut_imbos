<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <!-- counter jumlah siswa dari tabel siswas -->
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 data-wrap-left">
                                                <span class="capitalize-font block">Siswa</span>
                                                <span class="txt-dark block">{{ $jumlahSiswa }}</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-account-box data-right-rep-icon bg-grad-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end counter jumlah siswa -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <!-- counter jumlah guru dari tabel gurus -->
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 data-wrap-left">
                                                <span class="capitalize-font block">Guru</span>
                                                <span class="txt-dark block">{{ $jumlahGuru }}</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-account-box data-right-rep-icon bg-grad-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end counter jumlah guru -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <!-- counter jumlah mata_pelajarans dari tabel mata_pelajarans -->
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 data-wrap-left">
                                                <span class="capitalize-font block">Mapel</span>
                                                <span class="txt-dark block">{{ $jumlahMataPelajaran }}</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-account-box data-right-rep-icon bg-grad-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end counter jumlah mata_pelajarans -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <!-- counter jumlah nilais dari tabel nilais -->
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 data-wrap-left">
                                                <span class="capitalize-font block">Nilai</span>
                                                <span class="txt-dark block">{{ $jumlahNilai }}</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="zmdi zmdi-account-box data-right-rep-icon bg-grad-info"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end counter jumlah nilais -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
