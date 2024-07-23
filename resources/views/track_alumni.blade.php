@extends('layouts.app')

@section('title', 'Track Alumni')

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
    <use xlink:href="#wave-path" x="50" y="3" fill="rgba(246, 197, 6, 100)">
    </g>
    <g class="wave2">
    <use xlink:href="#wave-path" x="50" y="0" fill="rgba(246, 197, 6, 0.2)">
    </g>
    <g class="wave3">
    <use xlink:href="#wave-path" x="50" y="9" fill="#ffffff">
    </g>
</svg>

</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">

    <div class="container" data-aos="fade-up">
    <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <div class="content">
            <h2>Alumni Studi Lanjut IMBOS</h2>
            <p>
            Tersebar diberbagai perguruan tinggi yang ada di Indonesia, seperti di Perguruan Tinggi Negeri (PTN), Perguruan Tinggi Kedinasan (PTK), Perguruan Tinggi Keagamaan Islam Negeri (PTKIN), dan Perguruan Tinggi Swasta (PTS). Berikut ini adalah sebaran alumni Bimbel Lanjut IMBOS.
            </p>
            <!-- <div class="text-center text-lg-start">
            <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Read More</span>
                <i class="bi bi-arrow-right"></i>
            </a>
            </div> -->
        </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
        <!-- Chart -->
        <div class="col-xl-12 col-md-12 col-xs-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Grafik Persebaran Alumni</h3>

                    <div class="dropdown">
                        <button type="button" class="btn-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>

                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-sync"></i>Update Data</a></li>
                            <li><a href="#"><i class="fa fa-cogs"></i>Settings</a></li>
                            <li><a href="#"><i class="fa fa-times"></i>Remove Panel</a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-chart">
                    <!-- Morris Area Chart 01 Start -->
                    <div id="morrisAreaChart01" class="chart--body area--chart style--1"></div>
                    <!-- Morris Area Chart 01 End -->

                    <div class="chart--stats style--1">
                        <ul class="nav">
                            <li data-overlay="1 orange">
                                <p class="amount">PTN</p>
                            </li>
                            <li data-overlay="1 red">
                                <p class="amount">PTK</p>
                            </li>
                            <li data-overlay="1 blue">
                                <p class="amount">PTKIN</p>
                            </li>
                            <li data-overlay="1 green">
                                <p class="amount">PTS</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
        </div>

    </div>
    </div>

</section><!-- /About Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

<!-- Section Title -->
<div class="container section-title-white" data-aos="fade-up">
    <h2>Testimonials</h2>
    <p>Apa Kata Alumni ?<br></p>
    <small>IMBOS selalu berupaya mempersiapkan para santrinya untuk bersaing dan berkompetisi dengan sekolah lain untuk masuk ke Perguruan Tinggi secara optimal !!!</small>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
    <script type="application/json" class="swiper-config">
        {
        "loop": true,
        "speed": 600,
        "autoplay": {
            "delay": 5000
        },
        "slidesPerView": "auto",
        "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
        },
        "breakpoints": {
            "320": {
            "slidesPerView": 1,
            "spaceBetween": 40
            },
            "1200": {
            "slidesPerView": 3,
            "spaceBetween": 1
            }
        }
        }
    </script>
    <div class="swiper-wrapper">

        <div class="swiper-slide">
        <div class="testimonial-item">
            <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
            </p>
            <div class="profile mt-auto">
            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            </div>
        </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
        <div class="testimonial-item">
            <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
            </p>
            <div class="profile mt-auto">
            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            </div>
        </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
        <div class="testimonial-item">
            <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
            </p>
            <div class="profile mt-auto">
            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            </div>
        </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
        <div class="testimonial-item">
            <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
            </p>
            <div class="profile mt-auto">
            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            </div>
        </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
        <div class="testimonial-item">
            <div class="stars">
            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
            </div>
            <p>
            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
            </p>
            <div class="profile mt-auto">
            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            </div>
        </div>
        </div><!-- End testimonial item -->

    </div>
    <div class="swiper-pagination"></div>
    </div>

</div>

</section><!-- /Testimonials Section -->

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Alumni</h2>
    <p>Sebaran Alumni Studi Lanjut IMBOS</p>
</div><!-- End Section Title -->

<div class="container">

    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">Semua</li>
        <li data-filter=".filter-app">PTK (Perguruan Tinggi Kedinasan)</li>
        <li data-filter=".filter-product">PTN (Perguruan Tinggi Negeri)</li>
        <li data-filter=".filter-branding">PTKIN (Perguruan Tinggi Islam Negeri)</li>
        <li data-filter=".filter-books">PTS (Perguruan Tinggi Swasta)</li>
    </ul><!-- End Portfolio Filters -->

    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>App 1</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Product 1</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Branding 1</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/books-1.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Books 1</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/books-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/app-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>App 2</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/app-2.jpg" title="App 2" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/product-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Product 2</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/product-2.jpg" title="Product 2" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/branding-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Branding 2</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/branding-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/books-2.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Books 2</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/books-2.jpg" title="Branding 2" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/app-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>App 3</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/app-3.jpg" title="App 3" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/product-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Product 3</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/product-3.jpg" title="Product 3" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/branding-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Branding 3</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/branding-3.jpg" title="Branding 2" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
        <div class="portfolio-content h-100">
            <img src="assets/img/portfolio/books-3.jpg" class="img-fluid" alt="">
            <div class="portfolio-info">
            <h4>Books 3</h4>
            <p>Lorem ipsum, dolor sit amet consectetur</p>
            <a href="assets/img/portfolio/books-3.jpg" title="Branding 3" data-gallery="portfolio-gallery-book" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
            <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
            </div>
        </div>
        </div><!-- End Portfolio Item -->

    </div><!-- End Portfolio Container -->

    </div>

</div>

</section><!-- /Portfolio Section -->

@endsection