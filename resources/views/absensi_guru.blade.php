@extends('layouts.app')

@section('title', 'Absensi Guru - Studi Lanjut IMBOS Pringsewu')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section">

    <div class="menu-mobile-app">
      <div class="menu-mobile-heading aos-init aos-animate" data-aos="fade-up">
        <h2>Main Menu</h2>
      </div>
      <div class="row gy-3">

        <div class="col-xl-3 d-flex">
          <div class="row align-self-center gy-3">

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-house-fill"></i>
                <a href="index.html">Home</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-buildings"></i>
                <a href="tentang_kami.html">Tentang Kami</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-mortarboard-fill"></i>
                <a href="tracking-alumni.html">Track Alumni</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-list-task"></i>
                <a href="program.html">Program</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-person-hearts"></i>
                <a href="pantau_ortu.html">Pantau Ortu</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-book-fill"></i>
                <a href="tryout.html">Try Out</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-info-square-fill"></i>
                <a href="info.html">Info</a>
              </div>
            </div><!-- End Feature Item -->

            <div class="col-md-3 col-xs-6 aos-init aos-animate" data-aos="fade-up" data-aos-delay="700">
              <div class="feature-box d-flex align-items-center">
                <i class="bi bi-calendar2-check"></i>
                <a href="absensi-guru.html">Daftar Hadir Guru</a>
              </div>
            </div><!-- End Feature Item -->

          </div>
        </div>

      </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
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
      <h2>Nama Guru</h2>
      <p>Perkembangan Studi Lanjut IMBOS<br></p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-3">
        <div class="col-lg-12">
            <!-- Panel Start -->
            <div class="panel profile-cover">
              <div class="profile-cover__img">
                  <img src="assets/img/avatars/01_150x150.png" alt="">
                  <h3 class="h3">M.Kosim Ali, M.Pd</h3> <p class="sub-name">Pengampu Penalaran Matematika</p>
              </div>

              <div class="profile-cover__action" data-bg-img="assets/img/covers/01_800x150.jpg" data-overlay="0.3">
                  <!-- <button class="btn btn-rounded btn-info">
                      <i class="fa fa-plus"></i>
                      <span>Follow</span>
                  </button> -->

                  <button class="btn btn-rounded btn-info">
                      <i class="bi bi-upload"></i>
                      <span>Ganti Foto Sampul</span>
                  </button>
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
              <div class="row">
                <div class="col-lg-6 mt-3">
                  <form action="">
                    <!-- Form Group Start -->
                    <label>
                        <span class="label-text">Tanggal</span>
                        <input type="date" name="tanggal" placeholder="Pilih Tanggal..." class="form-control">
                    </label>
                    <!-- Form Group End -->
                    <!-- Form Group Start -->
                    <label>
                        <span class="label-text">Nama Guru</span>
                        <input type="text" name="nama_guru" placeholder="Masukan Nama Guru" class="form-control">
                    </label>
                    <!-- Form Group End -->
                    <!-- Form Group Start -->
                    <label>
                        <span class="label-text">Materi</span>
                        <select name="select" class="form-control">
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                          <option value="4">Option 4</option>
                      </select>
                    </label>
                    <!-- Form Group End -->
                    <!-- Form Group Start -->
                    <label>
                        <span class="label-text">Kelas</span>
                        <select name="select" class="form-control">
                          <option value="1">Option 1</option>
                          <option value="2">Option 2</option>
                          <option value="3">Option 3</option>
                          <option value="4">Option 4</option>
                      </select>
                    </label>
                    <!-- Form Group End -->
                    <!-- Form Group Start -->
                    <label>
                        <span class="label-text">Catatan</span>
                        <textarea name="textarea" class="form-control" placeholder="Catatan..."></textarea>
                    </label>
                    <!-- Form Group End -->
                     <!-- Form Group Start -->
                    <label>
                        <span class="label-text">Kirim Foto</span>
                        <input class="form-control" type="file" id="formFile">
                    </label>
                  <!-- Form Group End -->
                  </form>
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
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Nama Siswa</td>
                          <td>
                            <div class="customradiobutton">
                              <input type="radio" id="hadir1" name="kehadiran1" value="hadir">
                              <label for="hadir1">Hadir</label>
                    
                              <input type="radio" id="tidak_hadir1" name="kehadiran1" value="tidak_hadir">
                              <label for="tidak_hadir1">Tidak Hadir</label>
                    
                              <input type="radio" id="sakit1" name="kehadiran1" value="sakit">
                              <label for="sakit1">Sakit</label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 mt-3">
                  <a href="" class="btn btn-imbos">SIMPAN</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- End pricing row -->

    </div>

  </section><!-- /Pricing Section -->

  @endsection