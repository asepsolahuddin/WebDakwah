<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Website Nabi Muhammad SAW</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <script src="https://kit.fontawesome.com/db31522e5d.js" crossorigin="anonymous"></script>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



  <!-- Main CSS File -->
  <link href="{{ asset('css/user/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top bg-light shadow-sm py-3">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      
      <a href="{{ route('home.index') }}" class="logo d-flex align-items-center text-decoration-none text-dark">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h4>Rosululloh Muhammad ﷺ</h4>
      </a>
      
      <nav id="navbar" class="navbar">
        <form action="/logout" method="post" class="d-inline">
          @csrf
          <button type="submit" class="btn btn-primary">Logout</button>
        </form>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <img src="{{ asset('images/hero-bg-abstract.jpg') }}" alt="" data-aos="fade-in" class="images">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-out">
          <div class="col-xl-7 col-lg-9 text-center">
            <h1>Chating Bersama Dengan Ustad</h1>
            <p>Anda bisa berkirim pesan ataupun konsul mengenai permasalahan anda dengan ustad ataupun berbicara dengan user lainnya, dengan klik tombol dibawah ini</p>
          </div>
        </div>
        <div class="text-center mb-5" data-aos="zoom-out" data-aos-delay="100">
          <a href="{{ route('chatify') }}" class="btn btn-primary mt-4">Chating</a>
        </div>
        
        <form action="{{ route('dashboard.index') }}" method="GET" class="form-inline my-2 my-lg-0">
          <input class="form-control form-control-lg form-control-long mr-sm-2" type="text" name="query" placeholder="Cari Nama / Spesialis" aria-label="Search">
          <button class="btn btn-outline-primary btn-lg my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="card-header mt-4">
          <h3 class="text-center">DAFTAR NAMA USTAD</h3>
        </div>

        <div class="row gy-4 mt-5 ml-5">
        @if(!$dataFound)
          <div class="alert alert-warning" role="alert">
              Data tidak Ditemukan
          </div>
        @else
        @foreach ($ustads as $ustad)
        <div class="card mr-4 mt-2" style="width: 19rem;">
          <img src="{{ asset('/storage/products/'.$ustad->pp_path) }}" class="card-img-top" style="width: 100%; height:250px" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ $ustad->name }}</h5>
            <hr>
            <div class="d-flex align-items-center">
              <i class="fas fa-graduation-cap mr-2 text-success"></i>
              <p class="card-text" style="font-size: 15px">spesialis di bidang: {{ $ustad->spesialis }}</p>
            </div>
            <hr>
            <div class="d-flex align-items-center">
              <i class="fas fa-award mt-3 ml-1 mr-2 text-warning"></i>
              <p class="card-text" style="font-size: 15px">memiliki prestasi sebagai berikut:</p>
            </div>
            <p class="card-text" style="font-size: 15px">{{ $ustad->prestasi }}</p>
            
          </div>
          <div class="text-center mb-5" data-aos="zoom-out" data-aos-delay="100">
            <a href="{{ route('chatify.ustad', $ustad->id) }}" class="btn btn-primary mt-4">Chat Langsung</a>
          </div>
        </div>
        @endforeach
        
      @endif

        </div>
        {{ $ustads->links('pagination::bootstrap-5') }}
      </div>

    </section>

  </main>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
  $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  })
  </script>

  <!-- Main JS File -->
  <script src="{{ asset('js/user/main.js') }}"></script>

</body>

</html>