@extends('user/layout/main')

@section('content-page')

<section id="hero" class="hero d-flex align-items-center">

  <div class="container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center">
        <h1 data-aos="fade-up">Web Adab Rosulluloh Muhammad SAW</h1>
        <h2 data-aos="fade-up" data-aos-delay="400">Menceritakan Bagaimana Keseharian Nabi Muhammad SAW</h2>
        <div data-aos="fade-up" data-aos-delay="600">
        </div>
      </div>
      <div class="col-lg-5 hero-img " data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ asset('images/logo_muhammad.png') }}" class="img-fluid" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h2>Mengenal Rosululloh</h2>
            <p class="intro-text">
              Nabi Muhammad SAW lahir pada hari Senin, tanggal 12 Rabiul Awal tahun Gajah. Ini merupakan pendapat mayoritas yang paling diunggulkan. Menurut para sejarawan, tahun Gajah bertepatan dengan 570 atau 571 M.
            </p>
            <p>
              Alasan di balik penamaan tahun Gajah berkaitan dengan serbuan pasukan gajah yang berada di bawah pimpinan Gubernur Jenderal Najasyi Habasyah di Yaman yang bernama Abrahah bin Shabah. Kedatangan mereka ke kota Makkah untuk menghancurkan Ka'bah. Peristiwa ini terjadi sekitar 50 hari menjelang kelahiran Nabi Muhammad SAW.
            </p>
          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <div class="embed-responsive embed-responsive-16by9">
                <video class="embed-responsive-item" controls>
                    <source src="{{ asset('images/videoplayback.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
        </div>

      </div>
    </div>

  </section><!-- End About Section -->

  <!-- ======= Values Section ======= -->
  <section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h1>Website Value</h1>
      </header>

      <div class="row">

        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <img src="{{ asset('images/vide_rosul.svg') }}" class="img-fluid" alt="">
            <h3>Video Adab Nabi</h3>
            <p>Berisi mengenai kumpulan video video untuk suri tauladan nabi muhammad saw</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
          <div class="box">
            <img src="{{ asset('images/artikel_rosul.png') }}" class="img-fluid" alt="">
            <h3>Artikel Tentang Nabi</h3>
            <p>Berisi Mengenai Informasi Nabi Muhammad SAW</p>
          </div>
        </div>

        <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
          <div class="box">
            <img src="{{ asset('images/chating_rosul.png') }}" class="img-fluid" alt="">
            <h3>Chating Ustad</h3>
            <p>Konsultasi Agama Dengan Ustad Dibidangnya</p>
          </div>
        </div>

      </div>

    </div>

  </section><!-- End Values Section -->

  <!-- ======= Recent Blog Posts Section ======= -->
  <section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Artikel Terkini</p>
      </header>
      
      <div class="row">
        @foreach ($posts as $post)
            <div class="col-lg-4">
                <div class="post-box">
                    <div class="post-img">
                        <img src="{{ asset('/storage/products/' . $post->cover_path) }}" class="card-img-top " style="height: 200px;" alt="">
                    </div>
                    <span class="post-date">Recent</span>
                    <h3 class="post-title">{{ $post->judul }}</h3>
                    <a href="{{ route('welcome.artikel', $post->id) }}" class="readmore stretched-link mt-auto">
                        <span>Read More</span><i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->

</main>
  
@endsection