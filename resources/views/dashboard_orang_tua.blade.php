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
            <h2>Dashboard</h2>
            <p>Perkembangan Studi Lanjut Siswa IMBOS</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $siswa->nama_siswa }}</h3>
                    </div>
                    <div class="panel-content panel-about">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <div class="img-profile">
                                            {{-- <img src="https://placehold.co/400x600/png" alt="Profile">
                                            <img src="{{ asset('storage/' . $siswa->foto_siswa) }}" alt="Profile"> --}}
                                            @if($siswa->foto_siswa)
                                                <img src="{{ asset('storage/' . $siswa->foto_siswa) }}" alt="Profile">
                                            @else
                                                <img src="https://placehold.co/400x600/png" alt="Profile">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 mt-2">
                                        <table class="table table-profil">
                                            <tr>
                                                <th style="text-align: left;">Nama</th>
                                                <td>{{ $siswa->nama_siswa }}</td>
                                                <script>
                                                    console.log("ID Siswa: {{ $siswa->id }}");
                                                </script>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Kelompok</th>
                                                <td>{{ $siswa->kelas->nama_kelas }}</td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Program Bimbel</th>
                                                <td>{{ $siswa->programBimbel->nama_program }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <canvas id="nilaiChart"></canvas>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    <h2>Hasil Try Out Siswa : 100</h2>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    {{-- <table class="table table-hover table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Try Out</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Semester</th>
                                        @foreach ($mataPelajarans as $mataPelajaran)
                                            <th>{{ $mataPelajaran->namaMataPelajaran }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($nilai as $tryoutId => $nilaiGroup)
                                        <tr>
                                            <td>{{ $index }}</td>
                                            <td>{{ $nilaiGroup->first()->tryout->nama_tryout }}</td>
                                            <td>{{ $nilaiGroup->first()->tryout->tahunPelajaran->nama_tahun_pelajaran }}</td>
                                            <td>{{ $nilaiGroup->first()->tryout->tahunPelajaran->semester }}</td>
                                            @foreach ($mataPelajarans as $mataPelajaran)
                                                <td>{{ $nilaiGroup->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}</td>
                                            @endforeach
                                        </tr>
                                        @php
                                            $index++;
                                        @endphp
                                    @endforeach
                                    @if ($nilai->isEmpty())
                                        <tr>
                                            <td colspan="{{ 4 + $mataPelajarans->count() }}" class="text-center">Data tidak ditemukan</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table> --}}

                                    <table class="table table-hover table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Try Out</th>
                                                <th rowspan="2">Tahun Pelajaran</th>
                                                <th rowspan="2">Semester</th>
                                                @foreach ($mataPelajarans->where('opsi_test_tps', false) as $mataPelajaran)
                                                    <th rowspan="2">{{ $mataPelajaran->namaMataPelajaran }}</th>
                                                @endforeach
                                                <th colspan="{{ $mataPelajarans->where('opsi_test_tps', true)->count() }}">
                                                    Tes Potensi Skolastik</th>
                                                <th rowspan="2">Aksi</th>
                                            </tr>
                                            <tr>
                                                @foreach ($mataPelajarans->where('opsi_test_tps', true) as $mataPelajaran)
                                                    <th>{{ $mataPelajaran->namaMataPelajaran }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $index = 1;
                                            @endphp
                                            @foreach ($nilai as $tryoutId => $nilaiGroup)
                                                <tr>
                                                    <td>{{ $index }}</td>
                                                    <td>{{ $nilaiGroup->first()->tryout->nama_tryout }}</td>
                                                    <td>{{ $nilaiGroup->first()->tryout->tahunPelajaran->nama_tahun_pelajaran }}
                                                    </td>
                                                    <td>{{ $nilaiGroup->first()->tryout->tahunPelajaran->semester == 1 ? 'Ganjil' : 'Genap' }}
                                                    </td>
                                                    @foreach ($mataPelajarans->where('opsi_test_tps', false) as $mataPelajaran)
                                                        <td>{{ $nilaiGroup->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}
                                                        </td>
                                                    @endforeach
                                                    @foreach ($mataPelajarans->where('opsi_test_tps', true) as $mataPelajaran)
                                                        <td>{{ $nilaiGroup->where('mata_pelajaran_id', $mataPelajaran->id)->first()->nilai ?? '-' }}
                                                        </td>
                                                    @endforeach
                                                    <td>
                                                        <a href="{{ route('parent.downloadSertifikatTryout', ['id' => $siswa->id, 'tryout_id' => $tryoutId]) }}"
                                                            class="btn btn-primary">Download Sertifikat</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $index++;
                                                @endphp
                                            @endforeach
                                            @if ($nilai->isEmpty())
                                                <tr>
                                                    <td colspan="{{ 4 + $mataPelajarans->count() }}" class="text-center">
                                                        Data tidak ditemukan</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <div class="text-center">
                                    <a href="{{ route('parent.downloadSertifikat', $siswa->id) }}"
                                        class="btn btn-warning">
                                        <span>Download Rapor Perkembangan Bimbel</span>
                                        <i class="bi bi-download"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('nilaiChart').getContext('2d');
            const labels = {!! json_encode($nilai->map(fn($group) => $group->first()->tryout->nama_tryout)->values()) !!};
            const datasets = {!! $mataPelajarans->map(function ($mp) use ($nilai) {
                    return [
                        'label' => $mp->namaMataPelajaran,
                        'data' => $nilai->map(fn($group) => $group->where('mata_pelajaran_id', $mp->id)->first()->nilai ?? 0)->values(),
                        'borderColor' => 'randomColor()',
                        'backgroundColor' => 'rgba(0, 0, 0, 0)',
                        'pointStyle' => 'circle',
                        'pointRadius' => 5,
                        'pointHoverRadius' => 7,
                    ];
                })->values()->toJson() !!};

            datasets.forEach(dataset => {
                dataset.borderColor = randomColor();
            });

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Nilai'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Try Out'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Grafik Perkembangan Nilai Siswa'
                        }
                    }
                }
            });

            function randomColor() {
                const letters = '0123456789ABCDEF';
                let color = '#';
                for (let i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
        });
    </script>


@endsection
