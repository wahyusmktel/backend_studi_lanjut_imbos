@extends('layouts.app')

@section('title', 'Dashboard Pantau Orang Tua')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section">

        @include('includes.menu_mobile_app')

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(246, 197, 6, 0.2)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(246, 197, 6, 100)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#0b7ac2">
            </g>
        </svg>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="features" class="features section">
        <!-- Section Title -->
        <div class="container section-title-white" data-aos="fade-up">
            <h2>Detail Absensi - {{ $siswa->nama_siswa }} - {{ $siswa->kelas->nama_kelas }}</h2>
            <p>Absensi Perkembangan Siswa</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8 col-xs-6">
                                <form method="GET" action="{{ route('parent.absensi.detail') }}">
                                    <div class="form-group">
                                        <label for="filter">Filter Absensi Siswa {{ $siswa->nama_siswa }}</label><br>
                                        <div class="input-group mb-15">
                                            <!-- Filter berdasarkan tanggal -->
                                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ $request->start_date }}">
                                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ $request->end_date }}">
                                            <!-- Filter berdasarkan mata pelajaran -->
                                            <select name="mata_pelajaran_id" class="form-control">
                                                <option value="">Pilih Mata Pelajaran</option>
                                                @foreach($mataPelajarans as $mp)
                                                    <option value="{{ $mp->id }}" {{ $request->mata_pelajaran_id == $mp->id ? 'selected' : '' }}>{{ $mp->namaMataPelajaran }}</option>
                                                @endforeach
                                            </select>
                                            
                                            <button type="submit" class="btn btn-secondary"><i class="icon-magnifier"></i><span class="btn-text">Cari</span></button>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4 text-right" style="text-align: right;">
                                <a href="/orang-tua" class="btn btn-warning btn-sm" style="padding: 8px;">KEMBALI</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content panel-about">
                        <!-- Widget Row -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default border-panel card-view">
                                    <div class="panel-body">
                                        <div class="text-center">
                                            <h4 class="txt-dark">Jumlah Kehadiran</h4>
                                            <h2>{{ $absensiDetails->where('kehadiran', 1)->count() }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default border-panel card-view">
                                    <div class="panel-body">
                                        <div class="text-center">
                                            <h4 class="txt-dark">Jumlah Ketidakhadiran</h4>
                                            <h2>{{ $absensiDetails->where('kehadiran', 0)->count() }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default border-panel card-view">
                                    <div class="panel-body">
                                        <div class="text-center">
                                            <h4 class="txt-dark">Jumlah Sakit</h4>
                                            <h2>{{ $absensiDetails->where('kehadiran', 2)->count() }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Widget Row -->
                        <hr>
                        <div class="row">
                            <div class="content-title-custom-1">
                                <p>Tabel Perkembangan Absensi Siswa</p>
                            </div>
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <!-- Tabel untuk menampilkan detail absensi siswa -->
                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Mata Pelajaran</th>
                                                <th>Guru</th>
                                                <th>Tanggal</th>
                                                <th>Waktu</th>
                                                <th>Kehadiran</th>
                                                <th>Foto</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($absensiDetails as $index => $detail)
                                            <tr>
                                                <td style="text-align: center">{{ $index + 1 }}</td>
                                                <td style="text-align: center">{{ $detail->absensi->guru->mataPelajaran->namaMataPelajaran }}</td>
                                                <td style="text-align: center">{{ $detail->absensi->guru->nama }}</td>
                                                <td style="text-align: center">{{ \Carbon\Carbon::parse($detail->absensi->tanggal)->format('d-m-Y') }}</td>
                                                <td style="text-align: center">{{ $detail->absensi->waktu }}</td>
                                                <td style="text-align: center">
                                                    @if($detail->kehadiran == 1)
                                                        Hadir
                                                    @elseif($detail->kehadiran == 0)
                                                        Tidak Hadir
                                                    @elseif($detail->kehadiran == 2)
                                                        Sakit
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    @if($detail->absensi->foto)
                                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#fotoModal-{{ $index }}">
                                                            Lihat Foto
                                                        </button>
                                                    @else
                                                        Tidak ada foto
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="fotoModal-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel-{{ $index }}" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="fotoModalLabel-{{ $index }}">Foto Kehadiran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            @if($detail->absensi->foto)
                                                                <img src="{{ asset('storage/' . $detail->absensi->foto) }}" alt="Foto Kehadiran" class="img-fluid">
                                                            @else
                                                                <p>Foto tidak tersedia.</p>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @if ($absensiDetails->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center">Data tidak ditemukan</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="content-title-custom-1">
                            <p>Grafik Perkembangan Absensi Siswa</p>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Canvas untuk grafik -->
                                <canvas id="attendanceChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Pagination -->
                                {{ $absensiDetails->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Script untuk menampilkan grafik menggunakan Chart.js -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'bar', // Jenis grafik yang digunakan adalah bar
            data: {
                labels: ['Hadir', 'Tidak Hadir', 'Sakit'], // Label sumbu X
                datasets: [{
                    label: 'Jumlah Kehadiran', // Label dataset
                    data: [
                        {{ $absensiDetails->where('kehadiran', 1)->count() }},
                        {{ $absensiDetails->where('kehadiran', 0)->count() }},
                        {{ $absensiDetails->where('kehadiran', 2)->count() }}
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', // Warna background bar untuk hadir
                        'rgba(255, 99, 132, 0.2)', // Warna background bar untuk tidak hadir
                        'rgba(255, 206, 86, 0.2)' // Warna background bar untuk sakit
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Warna border bar untuk hadir
                        'rgba(255, 99, 132, 1)', // Warna border bar untuk tidak hadir
                        'rgba(255, 206, 86, 1)' // Warna border bar untuk sakit
                    ],
                    borderWidth: 1 // Ketebalan border bar
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Mulai sumbu Y dari 0
                    }
                }
            }
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('attendanceChart').getContext('2d');
        const attendanceChart = new Chart(ctx, {
            type: 'bar', // Jenis grafik yang digunakan adalah bar
            data: {
                labels: ['Grafik Absensi Siswa'], // Label sumbu X
                datasets: [
                    {
                        label: 'Hadir', // Label dataset untuk hadir
                        data: [{{ $absensiDetails->where('kehadiran', 1)->count() }}], // Jumlah hadir
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna background bar untuk hadir
                        borderColor: 'rgba(75, 192, 192, 1)', // Warna border bar untuk hadir
                        borderWidth: 1 // Ketebalan border bar
                    },
                    {
                        label: 'Tidak Hadir', // Label dataset untuk tidak hadir
                        data: [{{ $absensiDetails->where('kehadiran', 0)->count() }}], // Jumlah tidak hadir
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Warna background bar untuk tidak hadir
                        borderColor: 'rgba(255, 99, 132, 1)', // Warna border bar untuk tidak hadir
                        borderWidth: 1 // Ketebalan border bar
                    },
                    {
                        label: 'Sakit', // Label dataset untuk sakit
                        data: [{{ $absensiDetails->where('kehadiran', 2)->count() }}], // Jumlah sakit
                        backgroundColor: 'rgba(255, 206, 86, 0.2)', // Warna background bar untuk sakit
                        borderColor: 'rgba(255, 206, 86, 1)', // Warna border bar untuk sakit
                        borderWidth: 1 // Ketebalan border bar
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Mulai sumbu Y dari 0
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Menampilkan legend
                        onClick: function(e, legendItem) {
                            const index = legendItem.datasetIndex;
                            const ci = this.chart;
                            const meta = ci.getDatasetMeta(index);

                            // Menyembunyikan/memunculkan dataset saat label diklik
                            meta.hidden = meta.hidden === null ? !ci.data.datasets[index].hidden : null;
                            ci.update();
                        }
                    }
                }
            }
        });
    </script>

@endsection