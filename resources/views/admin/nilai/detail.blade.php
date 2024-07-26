@extends('admin.layouts.app')

@section('title', 'Detail Nilai Siswa')

@section('content')
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">Detail Nilai Siswa</h5>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.nilai-siswa.index') }}">Nilai</a></li>
                <li class="active"><span>Detail Nilai Siswa</span></li>
            </ol>
        </div>
    </div>
    <!-- /Title -->

    <!-- Filter -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8 col-xs-6">
                            <h6 class="panel-title txt-dark">Detail Nilai Siswa: {{ $siswa->nama_siswa }}</h6>
                        </div>
                        <div class="col-md-4 col-xs-6 text-right">
                            {{-- <a href="{{ route('admin.nilai.downloadSertifikat', ['id' => $siswa->id, 'tahun_pelajaran_id' => $tahunPelajaranId, 'tryout_id' => $tryoutId]) }}"
                                class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Download Sertifikat</a> --}}
                            <a href="#" id="downloadSertifikat" class="btn btn-primary"><i class="fa fa-file-pdf-o"></i> Download Sertifikat</a>
                            <a href="{{ route('admin.nilai-siswa.index') }}" class="btn btn-default"><i
                                    class="fa fa-arrow-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <form method="GET" action="{{ route('admin.nilai.detail', $siswa->id) }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tahun_pelajaran_id">Tahun Pelajaran</label>
                                        <select class="form-control" id="tahun_pelajaran_id" name="tahun_pelajaran_id">
                                            <option value="">Pilih Tahun Pelajaran</option>
                                            @foreach ($tahunPelajarans as $tp)
                                                <option value="{{ $tp->id }}"
                                                    {{ $tp->id == $tahunPelajaranId ? 'selected' : '' }}>
                                                    {{ $tp->nama_tahun_pelajaran }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tryout_id">Try Out</label>
                                        <select class="form-control" id="tryout_id" name="tryout_id">
                                            <option value="">Pilih Try Out</option>
                                            @foreach ($tryouts as $tryout)
                                                <option value="{{ $tryout->id }}"
                                                    {{ $tryout->id == $tryoutId ? 'selected' : '' }}>
                                                    {{ $tryout->nama_tryout }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Filter -->

    {{-- Grafik --}}
    {{-- <div class="row">
    <div class="col-sm-12">
        <canvas id="nilaiChart" width="400" height="200"></canvas>
    </div>
</div> --}}

    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-8 col-xs-6">
                            <h6 class="panel-title txt-dark">Nilai Siswa</h6>
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
                                            <th>Mata Pelajaran</th>
                                            <th>Try Out</th>
                                            <th>Tahun Pelajaran</th>
                                            <th>Semester</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa->nilais as $index => $nilai)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $nilai->mataPelajaran->namaMataPelajaran }}</td>
                                                <td>{{ $nilai->tryout->nama_tryout }}</td>
                                                <td>{{ $nilai->tryout->tahunPelajaran->nama_tahun_pelajaran ?? '' }}</td>
                                                <td>{{ $nilai->tryout->tahunPelajaran->semester ?? '' }}</td>
                                                <td>{{ $nilai->nilai }}</td>
                                            </tr>
                                        @endforeach
                                        @if ($siswa->nilais->isEmpty())
                                            <tr>
                                                <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var filterApplied = new URLSearchParams(window.location.search).has('tahun_pelajaran_id') && new URLSearchParams(window.location.search).has('tryout_id');
            $('#tahun_pelajaran_id').change(function() {
                var tahunPelajaranId = $(this).val();
                if (tahunPelajaranId) {
                    $.ajax({
                        url: '/admin/nilai/getTryouts', // Pastikan rute ini sesuai dengan yang ada di web.php
                        type: 'GET',
                        data: {
                            tahun_pelajaran_id: tahunPelajaranId
                        },
                        dataType: 'json',
                        success: function(data) {
                            $('#tryout_id').empty();
                            $('#tryout_id').append('<option value="">Pilih Tryout</option>');
                            $.each(data, function(key, value) {
                                $('#tryout_id').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#tryout_id').empty();
                    $('#tryout_id').append('<option value="">Pilih Tryout</option>');
                }
            });

            $('#downloadSertifikat').click(function(e) {
                var tahunPelajaranId = $('#tahun_pelajaran_id').val();
                var tryoutId = $('#tryout_id').val();
                if (!tahunPelajaranId || !tryoutId) {
                    e.preventDefault();
                    alert('Silakan pilih Tahun Pelajaran dan Try Out terlebih dahulu.');
                } else if (!filterApplied) {
                    e.preventDefault();
                    alert('Silakan klik tombol Filter terlebih dahulu.');
                } else {
                    var url = "{{ route('admin.nilai.downloadSertifikat', ['id' => $siswa->id, 'tahun_pelajaran_id' => '__tahun_pelajaran_id__', 'tryout_id' => '__tryout_id__']) }}";
                    url = url.replace('__tahun_pelajaran_id__', tahunPelajaranId).replace('__tryout_id__', tryoutId);
                    window.location.href = url;
                }
            });

        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('nilaiChart').getContext('2d');
            var nilaiChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($siswa->nilais->pluck('tryout.nama_tryout')) !!},
                    datasets: [{
                        label: 'Nilai Tryout',
                        data: {!! json_encode($siswa->nilais->pluck('nilai')) !!},
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>



@endsection
