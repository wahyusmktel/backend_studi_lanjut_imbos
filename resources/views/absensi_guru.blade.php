@extends('layouts.app')

@section('title', 'Absensi Guru - Studi Lanjut IMBOS Pringsewu')

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
                <use xlink:href="#wave-path" x="50" y="9" fill="#e9e8e8">
            </g>
        </svg>

    </section><!-- /Hero Section -->

    <!-- Pricing Section -->
    <section id="guru" class="section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $guru->nama }}</h2> <!-- Tampilkan nama guru yang sedang login -->
            <p>Perkembangan Studi Lanjut IMBOS<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-3">
                <div class="col-lg-12">
                    <!-- Panel Start -->
                    <div class="panel profile-cover">
                        <div class="profile-cover__img">
                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}">
                            <!-- Path gambar dari database -->
                            {{-- <h3 class="h3">M.Kosim Ali, M.Pd</h3> <p class="sub-name">Pengampu Penalaran Matematika</p> --}}
                            <h3 class="h3">{{ $guru->nama }}</h3> <!-- Tampilkan nama guru -->
                            <p class="sub-name">Pengampu {{ $guru->mataPelajaran->namaMataPelajaran }}</p>
                            <!-- Tampilkan nama mata pelajaran -->
                        </div>

                        <div class="profile-cover__action" data-bg-img="assets/img/covers/01_800x150.jpg"
                            data-overlay="0.3">
                            <!-- <button class="btn btn-rounded btn-info">
                          <i class="fa fa-plus"></i>
                          <span>Follow</span>
                      </button> -->

                            {{-- <button class="btn btn-rounded btn-info">
                      <i class="bi bi-upload"></i>
                      <span>Ganti Foto Sampul</span>
                  </button> --}}
                            <!-- Tombol Ganti Foto Sampul -->
                            <button class="btn btn-rounded btn-info" data-bs-toggle="modal"
                                data-bs-target="#uploadFotoSampulModal">
                                <i class="bi bi-upload"></i>
                                <span>Ganti Foto Sampul</span>
                            </button>

                            <!-- Modal Ganti Foto Sampul -->
                            <div class="modal fade no-fixed-backdrop" id="uploadFotoSampulModal" tabindex="-1"
                                aria-labelledby="uploadFotoSampulModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="uploadFotoSampulModalLabel">Ganti Foto Sampul</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('guru.uploadFotoSampul') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="foto_sampul" class="form-label">Pilih Foto Sampul</label>
                                                    <input type="file" class="form-control" id="foto_sampul"
                                                        name="foto_sampul" accept="image/*"
                                                        onchange="previewImage(event)">
                                                </div>
                                                <div class="mb-3">
                                                    <img id="preview" src="#" alt="Preview Image"
                                                        style="display: none; max-width: 100%;">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function previewImage(event) {
                                    var reader = new FileReader();
                                    reader.onload = function() {
                                        var output = document.getElementById('preview');
                                        output.src = reader.result;
                                        output.style.display = 'block';
                                    }
                                    reader.readAsDataURL(event.target.files[0]);
                                }

                                document.addEventListener('show.bs.modal', function(event) {
                                    if (event.target.classList.contains('no-fixed-backdrop')) {
                                        var backdrop = document.querySelector('.modal-backdrop');
                                        if (backdrop) {
                                            backdrop.classList.add('no-fixed-backdrop');
                                        }
                                    }
                                });
                            </script>


                        </div>

                        <div class="profile-cover__info">
                            <ul class="nav">
                                <!-- <li><strong>26</strong>Projects</li>
                          <li><strong>33</strong>Followers</li>
                          <li><strong>136</strong>Following</li> -->
                            </ul>
                        </div>
                    </div>
                    <!-- Panel End -->
                </div>
                <div class="col-lg-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Absensi Perkembangan Studi Lanjut Siswa IMBOS</h3>
                        </div>
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-info">
                                        Silahkan isi data dibawah ini dengan benar.
                                    </div>
                                </div>
                            </div>
                            <form id="absensiForm" action="{{ route('absensi.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <label>
                                            <span class="label-text">Tanggal</span>
                                            <input type="date" name="tanggal" placeholder="Pilih Tanggal..."
                                                class="form-control" required>
                                        </label>
                                        <label>
                                            <span class="label-text">Nama Guru</span>
                                            <input type="text" name="nama_guru" value="{{ $guru->nama }}"
                                                class="form-control" readonly>
                                        </label>
                                        <label>
                                            <span class="label-text">Materi</span>
                                            <input type="text" value="{{ $guru->mataPelajaran->namaMataPelajaran }}"
                                                class="form-control" readonly>
                                        </label>
                                        <label>
                                            <span class="label-text">Kelas</span>
                                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                                <option value="">Pilih Kelas</option>
                                                @foreach ($kelases as $kelas)
                                                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        <label>
                                            <span class="label-text">Catatan</span>
                                            <textarea name="catatan" class="form-control" placeholder="Catatan..." required></textarea>
                                        </label>
                                        <label>
                                            <span class="label-text">Kirim Foto</span>
                                            <input type="file" name="foto" class="form-control" required>
                                        </label>
                                        <div class="col-lg-12 mt-3">
                                            <button type="submit" class="btn btn-imbos">SIMPAN</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Kehadiran</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="siswa-table-body">
                                                    <tr>
                                                        <td colspan="3" class="text-center">Pilih kelas terlebih dahulu
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- End pricing row -->

        </div>

    </section><!-- /Pricing Section -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('kelas_id').addEventListener('change', function() {
            var kelasId = this.value;
            var tbody = document.getElementById('siswa-table-body');

            if (kelasId) {
                fetch(`/absensi/get-siswa?kelas_id=${kelasId}`)
                    .then(response => response.json())
                    .then(data => {
                        tbody.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach((siswa, index) => {
                                var tr = document.createElement('tr');
                                tr.innerHTML = `
                                <td>${index + 1}</td>
                                <td>${siswa.nama_siswa}</td>
                                <td>
                                    <div class="customradiobutton">
                                        <input type="hidden" name="siswa_id[]" value="${siswa.id}">
                                        <input type="radio" id="hadir${index}" name="kehadiran[${siswa.id}]" value="1" required>
                                        <label for="hadir${index}">Hadir</label>

                                        <input type="radio" id="tidak_hadir${index}" name="kehadiran[${siswa.id}]" value="0" required>
                                        <label for="tidak_hadir${index}">Tidak Hadir</label>

                                        <input type="radio" id="sakit${index}" name="kehadiran[${siswa.id}]" value="2" required>
                                        <label for="sakit${index}">Sakit</label>
                                    </div>
                                </td>
                            `;
                                tbody.appendChild(tr);
                            });
                        } else {
                            var tr = document.createElement('tr');
                            tr.innerHTML = '<td colspan="3" class="text-center">Tidak ada siswa</td>';
                            tbody.appendChild(tr);
                        }
                    });
            } else {
                tbody.innerHTML = '<tr><td colspan="3" class="text-center">Pilih kelas terlebih dahulu</td></tr>';
            }
        });

        document.getElementById('absensiForm').addEventListener('submit', function(event) {
            var radioGroups = document.querySelectorAll('#siswa-table-body .customradiobutton');
            var allChecked = true;

            radioGroups.forEach(function(group) {
                var radios = group.querySelectorAll('input[type="radio"]');
                var checked = Array.from(radios).some(function(radio) {
                    return radio.checked;
                });
                if (!checked) {
                    allChecked = false;
                }
            });

            if (!allChecked) {
                event.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Silahkan isikan kehadiran terlebih dahulu sebelum menyimpan.',
                });
            }
        });
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: '{{ session('success') }}',
            });
        </script>
    @endif


@endsection
