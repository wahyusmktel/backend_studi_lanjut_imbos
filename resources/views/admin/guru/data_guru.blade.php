@extends('admin.layouts.app')

@section('title', 'Data Guru')

@section('content')
<!-- Title -->
<div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h5 class="txt-dark">Data Guru</h5>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
            <li class="active"><span>Data Guru</span></li>
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
                                    <li class="divider"></li>
                                    <li><a href="#" data-toggle="modal" data-target="#importModal"><i class="fa fa-upload"></i> Import Data</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-download"></i> Download Data</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 text-right">
                        <form>
                            <div class="form-group">
                                <div class="input-group mb-15">
                                    <input type="email" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="Cari Data...">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-orange btn-anim"><i class="icon-magnifier"></i><span class="btn-text">Cari</span></button>
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
                                        <th>Nama Guru</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contoh Data Guru -->
                                    <tr>
                                        <td>1</td>
                                        <td>Guru 1</td>
                                        <td>Matematika</td>
                                        <td class="text-nowrap">
                                            <a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> 
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                            </a> 
                                            <a href="#" data-toggle="tooltip" data-original-title="Close"> 
                                                <i class="fa fa-close text-danger"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Guru 2</td>
                                        <td>Fisika</td>
                                        <td class="text-nowrap">
                                            <a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> 
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> 
                                            </a> 
                                            <a href="#" data-toggle="tooltip" data-original-title="Close"> 
                                                <i class="fa fa-close text-danger"></i> 
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan data contoh lainnya di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav class="pagination-wrap d-inline-block" aria-label="Page navigation example">
                                <ul class="pagination custom-pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">15</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="addModalLabel">Tambah Data Guru</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="namaGuru">Nama Guru</label>
                        <input type="text" class="form-control" id="namaGuru" placeholder="Nama Guru">
                    </div>
                    <div class="form-group">
                        <label for="nipGuru">NIP Guru</label>
                        <input type="text" class="form-control" id="nipGuru" placeholder="NIP Guru">
                    </div>
                    <div class="form-group">
                        <label for="mataPelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="mataPelajaran">
                            <option>Matematika</option>
                            <option>Fisika</option>
                            <option>Kimia</option>
                            <option>Biologi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tempatLahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir">
                    </div>
                    <div class="form-group">
                        <label for="tanggalLahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggalLahir">
                    </div>
                    <div class="form-group">
                        <label for="uploadFoto">Upload Foto</label>
                        <input type="file" class="dropify" id="uploadFoto" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Import Data -->
<div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title" id="importModalLabel">Import Data Guru</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="importGuru">Upload File Data Guru</label>
                        <input type="file" class="dropify" id="importGuru" />
                        <span class="help-block mt-10 mb-0"><small>Download format import data guru <a href="">disini</a>.</small></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-orange">Import Data</button>
            </div>
        </div>
    </div>
</div>
@endsection
