@extends('admin.layouts.app')

@section('title', 'Data Nilai')

@section('content')
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Data Nilai</h5>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li><a href="#">Nilai</a></li>
                <li class="active"><span>Data Nilai</span></li>
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
                                    <button aria-expanded="false" data-toggle="dropdown"
                                        class="btn btn-orange dropdown-toggle" type="button">
                                        Menu <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#importModal"><i
                                                    class="fa fa-upload"></i> Import Data</a></li>
                                        <li class="divider"></li>
                                        {{-- <li><a href="#"><i class="fa fa-download"></i> Download Data</a></li> --}}
                                        <li><a href="#" data-toggle="modal" data-target="#downloadTemplateModal"><i class="fa fa-download"></i> Download Template</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 text-right">
                            <form method="GET" action="{{ route('admin.nilai.index') }}">
                                <div class="form-group">
                                    <div class="input-group mb-15">
                                        <input type="text" id="search" name="search" class="form-control"
                                            placeholder="Cari Data..." value="{{ $search }}">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-orange btn-anim"><i
                                                    class="icon-magnifier"></i><span class="btn-text">Cari</span></button>
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
                            <div class="form-group">
                                <label for="tahun_pelajaran_filter">Tahun Pelajaran</label>
                                <select class="form-control" id="tahun_pelajaran_filter" name="tahun_pelajaran_id">
                                    <option value="">Pilih Tahun Pelajaran</option>
                                    @foreach ($tahunPelajarans as $tp)
                                        <option value="{{ $tp->id }}">{{ $tp->nama_tahun_pelajaran }} -
                                            {{ $tp->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tryout_filter">Try Out</label>
                                <select class="form-control" id="tryout_filter" name="tryout_id">
                                    <option value="">Pilih Try Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelas_filter">Kelompok</label>
                                <select class="form-control" id="kelas_filter" name="kelas_id">
                                    <option value="">Pilih Kelompok</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="table-responsive">
                                <form id="nilaiForm" action="{{ route('admin.nilai.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="tryout_id" value="{{ $tryoutId }}" id="tryout_hidden">
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                @foreach ($mataPelajarans as $mataPelajaran)
                                                    <th>{{ $mataPelajaran->namaMataPelajaran }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody id="siswa_nilai_body">
                                            <!-- Data siswa dan nilai akan diisi oleh JavaScript -->
                                        </tbody>
                                    </table>
                                    <div class="text-right mt-15">
                                        <button type="submit" class="btn btn-orange"><i class="fa fa-save"></i> Simpan
                                            Semua Nilai</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav class="pagination-wrap d-inline-block" aria-label="Page navigation example">
                                    {{ $nilais->appends(request()->query())->links('vendor.pagination.custom') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

    <!-- Modal Download Template -->
    <div class="modal fade" id="downloadTemplateModal" tabindex="-1" role="dialog" aria-labelledby="downloadTemplateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.nilai.downloadTemplate') }}" method="GET">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h5 class="modal-title" id="downloadTemplateModalLabel">Download Template Import Nilai</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="download_tahun_pelajaran_filter">Tahun Pelajaran</label>
                            <select class="form-control" id="download_tahun_pelajaran_filter" name="tahun_pelajaran_id" required>
                                <option value="">Pilih Tahun Pelajaran</option>
                                @foreach ($tahunPelajarans as $tp)
                                    <option value="{{ $tp->id }}">{{ $tp->nama_tahun_pelajaran }} - {{ $tp->semester }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="download_tryout_filter">Try Out</label>
                            <select class="form-control" id="download_tryout_filter" name="tryout_id" required>
                                <option value="">Pilih Try Out</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="download_kelas_filter">Kelompok</label>
                            <select class="form-control" id="download_kelas_filter" name="kelas_id" required>
                                <option value="">Pilih Kelompok</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-orange">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Import Data -->
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h5 class="modal-title" id="importModalLabel">Import Data Nilai</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.nilai.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file">Upload File Excel</label>
                            <input type="file" name="file" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/bower_components/jsgrid/dist/jsgrid.min.js"></script>

    @if (session('success'))
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

    <script>
        $(document).ready(function() {

            $('#download_tahun_pelajaran_filter').on('change', function() {
                var tahunPelajaranId = $(this).val();
                $.ajax({
                    url: '{{ route('admin.nilai.getTryouts') }}',
                    type: 'GET',
                    data: {
                        tahun_pelajaran_id: tahunPelajaranId
                    },
                    success: function(data) {
                        $('#download_tryout_filter').empty();
                        $('#download_tryout_filter').append('<option value="">Pilih Try Out</option>');
                        $.each(data, function(key, value) {
                            $('#download_tryout_filter').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            });

            $('#tryout_filter').on('change', function() {
                var tryoutId = $(this).val();
                $('#tryout_hidden').val(tryoutId);
            });

            $('#tahun_pelajaran_filter').on('change', function() {
                var tahunPelajaranId = $(this).val();
                $.ajax({
                    url: '{{ route('admin.nilai.getTryouts') }}',
                    type: 'GET',
                    data: {
                        tahun_pelajaran_id: tahunPelajaranId
                    },
                    success: function(data) {
                        $('#tryout_filter').empty();
                        $('#tryout_filter').append('<option value="">Pilih Try Out</option>');
                        $.each(data, function(key, value) {
                            $('#tryout_filter').append('<option value="' + key + '">' +
                                value + '</option>');
                        });
                    }
                });
            });

            $('#kelas_filter').on('change', function() {
                var kelasId = $(this).val();
                var tryoutId = $('#tryout_filter').val();
                if (tryoutId) {
                    loadSiswas(kelasId, tryoutId);
                }
            });

            function loadSiswas(kelasId, tryoutId) {
                $.ajax({
                    url: '{{ route('admin.nilai.getSiswas') }}',
                    type: 'GET',
                    data: {
                        kelas_id: kelasId,
                        tryout_id: tryoutId
                    },
                    success: function(data) {
                        var tableBody = $('#siswa_nilai_body');
                        tableBody.empty();
                        $.each(data, function(index, siswa) {
                            var row = '<tr>' +
                                '<td>' + (index + 1) + '</td>' +
                                '<td>' + siswa.nama_siswa + '</td>';
                            @foreach ($mataPelajarans as $mataPelajaran)
                                var nilaiObj = siswa.nilais.find(n => n.mata_pelajaran_id ===
                                    '{{ $mataPelajaran->id }}');
                                var nilai = nilaiObj ? nilaiObj.nilai : '';
                                row +=
                                    '<td><input type="number" class="form-control" name="nilai[' +
                                    siswa.id + '][{{ $mataPelajaran->id }}]" value="' + nilai +
                                    '" min="10" max="100"></td>';
                            @endforeach
                            row += '</tr>';
                            tableBody.append(row);
                        });
                    }
                });
            }

            // SweetAlert for Delete
            $('.delete-button').on('click', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#f83f37",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }, function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '/admin/nilai/' + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}',
                            },
                            success: function(result) {
                                swal({
                                    title: "Deleted!",
                                    text: result.success,
                                    type: "success",
                                    confirmButtonText: "OK"
                                }, function() {
                                    location.reload();
                                });
                            },
                            error: function() {
                                swal("Error!", "There was an error deleting the data.",
                                    "error");
                            }
                        });
                    } else {
                        swal("Cancelled", "Your data is safe :)", "error");
                    }
                });
            });
        });
    </script>


@endsection
