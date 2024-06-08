<?php
include 'db.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard - PawPal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>


<link
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
  rel="stylesheet"
/>

<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
  crossorigin="anonymous"
/>
</head>
<body id="dashboard-user">
<!-- CAROUSEL -->
<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="image/carousell-1.jpg" class="d-block w-100" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Penitipan Hewan Terpercaya</h5>
            <p>Tempat terbaik untuk hewan kesayangan Anda saat Anda bepergian.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/carousell-2.jpg" class="d-block w-100" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Keamanan Terjamin</h5>
            <p>Area bermain yang aman dan diawasi 24 jam, membuat hewan peliharaan Anda merasa nyaman dan bahagia.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="image/carousell-3.jpg" class="d-block w-100" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
            <h5>Perawatan Profesional</h5>
            <p>Tim kami yang berpengalaman siap memberikan perawatan terbaik, termasuk pemantauan kesehatan harian.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>

<div class="container-lg">
  <!-- HEADER -->
  <header class="header-custom sticky-top">
    <nav class="navbar navbar-expand-lg navbar-custom" id="mainNavbar">
        <div class="container-fluid">
            <a id="navbar-brands" class="navbar-brand" href="#">PawPal</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#tentang">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#layanan">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#karyawan">Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

  <!-- TENTANG SECTION -->
  <section id="tentang">
    <div class="container mt-5">
      <h2 class="text-center">Tentang</h2>
      <div class="row">
        <div class="col-md-6 align-content-center">
          <h1 class="fw-bold">
          Perawatan Terbaik untuk Hewan Kesayangan Anda!
          </h1>
          <p class="text-secondary pt-4">
          Kami memahami betapa pentingnya hewan peliharaan bagi Anda. Oleh karena itu, 
          kami menawarkan layanan penitipan hewan yang profesional dan penuh kasih sayang. 
          Tim kami berdedikasi untuk memberikan perawatan terbaik, sehingga Anda bisa merasa tenang 
          saat meninggalkan hewan kesayangan Anda bersama kami.
          </p>
          <p class="text-secondary">
          Kami menyediakan lingkungan yang aman dan nyaman bagi hewan peliharaan Anda. 
          Dengan fasilitas modern dan staf yang berpengalaman, kami memastikan setiap kebutuhan 
          hewan peliharaan Anda terpenuhi, mulai dari makanan sehat hingga waktu bermain yang menyenangkan.
          </p>
          <hr />
          <p class="text-secondary">
          Kepercayaan Anda adalah prioritas kami. Itulah sebabnya kami selalu berusaha 
          untuk memberikan pelayanan terbaik dengan standar kebersihan dan kenyamanan yang tinggi.
          </p>
        </div>

        <div class="col-md-6 text-center">
          <img
            src="image/gambar.png"
            class="img-fluid rounded mx-auto d-block"
            alt="UI/UX Designer"
            width="90%"
          />
        </div>
      </div>
    </div>
  </section>

<!-- layanan SECTION -->
<section id="layanan" >
    <div class="row">
        <div class="col mt-5">
            <h2 class="text-center">Layanan</h2>
            <div class="container">
                <section class="container pt-3 mb-3">
                    <h2 class="h3 block-title text-center"><small>Apa yang Kami Lakukan, Kami Lakukan dengan Kasih 
                      Sayang dan Perhatian untuk Hewan Kesayangan Anda</small></h2>
                    <div class="row pt-5 mt-30">
                        <div class="col-lg-4 col-sm-6 mb-30 pb-5">
                            <a class="card" href="#">
                                <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                                <i class="bi bi-check-square large-icon"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h3 class="card-title pt-1">Perawatan Harian</h3>
                                    <p class="card-text text-sm">Kami menyediakan layanan perawatan harian yang memastikan hewan peliharaan Anda 
                                      mendapatkan perhatian dan aktivitas yang mereka butuhkan untuk kebahagiaan dan kesejahteraan mereka.</p>
                                    <span class="text-sm text-uppercase font-weight-bold">Learn More&nbsp;<i class="bi bi-arrow-right-short"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-30 pb-5">
                            <a class="card" href="#">
                                <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                                <i class="bi bi-check-square large-icon"></i>
                                </div>
                                <div class="card-body text-center">
                                    <h3 class="card-title pt-1">Pengawasan Khusus</h3>
                                    <p class="card-text text-sm">Kami menyediakan layanan pengawasan khusus untuk hewan peliharaan yang memerlukan perhatian ekstra. 
                                      Staf berpengalaman kami memberikan perawatan tepat, termasuk obat-obatan jika diperlukan.</p>
                                    <span class="text-sm text-uppercase font-weight-bold">Learn More&nbsp;<i class="bi bi-arrow-right-short"></i></span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-30 pb-5">
                            <a class="card" href="#">
                                <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;">
                                <i class="bi bi-check-square large-icon"></i></i>
                                </div>
                                <div class="card-body text-center">
                                    <h3 class="card-title pt-1">Kesehatan dan Kebersihan</h3>
                                    <p class="card-text text-sm">Kesehatan dan kebersihan hewan peliharaan Anda adalah prioritas kami. Kami menyediakan makanan bergizi, 
                                      pemeriksaan kesehatan rutin, dan lingkungan bersih untuk menjaga kesehatan dan kebahagiaan mereka.</p>
                                    <span class="text-sm text-uppercase font-weight-bold">Learn More&nbsp;<i class="bi bi-arrow-right-short"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>



<!-- karyawan SECTION -->
<section id="karyawan" class="timeline-section">
  <!-- Menambahkan kelas timeline-section -->
  <div class="row">
    <div class="col mt-5">
      <h2 class="text-center">Karyawan</h2>
      <div class="container">
          <h3 class="block-title text-center mb-5 font-weight-light">Tidak hanya itu, tetapi kami juga mengutamakan keamanan dan kesejahteraan hewan kesayangan Anda</h3>
      </div>

      <div class="container overflow-hidden">
        <div class="row gy-4 gy-lg-0 gx-xxl-5">
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 border-bottom shadow-sm overflow-hidden">
              <div class="card-body p-0">
                <figure class="m-0 p-0">
                  <img class="img-fluid" loading="lazy" src="image/trainer-1.jpg" alt="Flora Nyra">
                  <figcaption class="m-0 p-4">
                    <h4 class="mb-1">Flora Nyra</h4>
                    <p class="text-secondary mb-0">Karyawan 1</p>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 border-bottom shadow-sm overflow-hidden">
              <div class="card-body p-0">
                <figure class="m-0 p-0">
                  <img class="img-fluid" loading="lazy" src="image/trainer-2.jpg" alt="Taytum Elia">
                  <figcaption class="m-0 p-4">
                    <h4 class="mb-1">Taytum Elia</h4>
                    <p class="text-secondary mb-0">Karyawan 2</p>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 border-bottom shadow-sm overflow-hidden">
              <div class="card-body p-0">
                <figure class="m-0 p-0">
                  <img class="img-fluid" loading="lazy" src="image/trainer-3.jpg" alt="Evander Mac">
                  <figcaption class="m-0 p-4">
                    <h4 class="mb-1">Evander Mac</h4>
                    <p class="text-secondary mb-0">Karyawan 3</p>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="card border-0 border-bottom shadow-sm overflow-hidden">
              <div class="card-body p-0">
                <figure class="m-0 p-0">
                  <img class="img-fluid" loading="lazy" src="image/trainer-4.jpg" alt="Wylder Elio">
                  <figcaption class="m-0 p-4">
                    <h4 class="mb-1">Wylder Elio</h4>
                    <p class="text-secondary mb-0">Karyawan 4</p>
                  </figcaption>
                </figure>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- GALERI SECTION -->
  <section id="galeri">
    <div class="container mt-5">
      <h2 class="text-center mb-4">Galeri</h2>
      <div class="row">
      <div class="container-fluid">
          <!-- For demo purpose -->
          <div class="row py-5">
            <div class="col-lg-12 mx-auto">
              <div class="text-white p-5 shadow-sm rounded banner">
                <h1 class="display-4">PawPal Galeri</h1>
                <p class="lead">Saksikan momen bahagia dan penuh kasih sayang</p>
                <p class="lead">Lihat betapa bahagianya hewan peliharaan Anda bersama PawPal</p>
              </div>
            </div>
          </div>
          <!-- End -->

          <div class="row">
            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-1.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Smoothie</h5>
                  <p class="small text-muted mb-0">Kucing Persia, bulu panjang berwarna putih.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Anna</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">Kucing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-2.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Tiger</h5>
                  <p class="small text-muted mb-0">Kucing domestik berwarna oren, bulu panjang dan tebal.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Dian</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">Kucing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-3.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Kiwi</h5>
                  <p class="small text-muted mb-0">Golden Retriever, bulu keemasan, sangat energik dan setia.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Clara</span></p>
                    <div class="badge badge-warning px-3 rounded-pill font-weight-normal">Anjing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-4.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Domge</h5>
                  <p class="small text-muted mb-0">Shiba Inu, bulu pendek berwarna kuning, sangat lincah.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Dimas</span></p>
                    <div class="badge badge-info px-3 rounded-pill font-weight-normal">Anjing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

             <!-- Gallery item -->
             <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-1.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Smoothie</h5>
                  <p class="small text-muted mb-0">Kucing Persia, bulu panjang berwarna putih.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Anna</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">Kucing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-2.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Tiger</h5>
                  <p class="small text-muted mb-0">Kucing domestik berwarna oren, bulu panjang dan tebal.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Dian</span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">Kucing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-3.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Kiwi</h5>
                  <p class="small text-muted mb-0">Golden Retriever, bulu keemasan, sangat energik dan setia.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Clara</span></p>
                    <div class="badge badge-warning px-3 rounded-pill font-weight-normal">Anjing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
              <div class="bg-white rounded shadow-sm"><img src="image/product-4.jpg" alt="" class="img-fluid card-img-top">
                <div class="p-4">
                  <h5>Domge</h5>
                  <p class="small text-muted mb-0">Shiba Inu, bulu pendek berwarna kuning, sangat lincah.</p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
                    <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">Dimas</span></p>
                    <div class="badge badge-info px-3 rounded-pill font-weight-normal">Anjing</div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End -->
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
</div>

  <!-- Footer -->
  <footer class="text-center text-white footer">
    <!-- Grid container -->
    <div class="container">
      <!-- Section: Links -->
      <section class="links-section mt-5">
        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5">
          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="">
              <a href="#" class="text-white">PawPal</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="">
              <a href="#tentang" class="text-white">Tentang</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="">
              <a href="#layanan" class="text-white">Layanan</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="">
              <a href="#karyawan" class="text-white">Karyawan</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="">
              <a href="#galeri" class="text-white">Galeri</a>
            </h6>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-5" />

      <!-- Section: Text -->
      <section class="text-section mb-2">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <p>
            Tetap terhubung dengan kami melalui media sosial kami dan jangan ragu untuk menghubungi 
            tim dukungan kami untuk bantuan lebih lanjut.
            </p>
          </div>
        </div>
      </section>
      <!-- Section: Text -->

      <!-- Section: Social -->
      <section class="social-section text-center mb-5">
        <a href="#" class="text-white me-4">
          <i class="bi bi-facebook"></i>
        </a>
        <a href="#" class="text-white me-4">
          <i class="bi bi-twitter"></i>
        </a>
        <a href="#" class="text-white me-4">
          <i class="bi bi-google"></i>
        </a>
        <a href="#" class="text-white me-4">
          <i class="bi bi-instagram"></i>
        </a>
        <a href="#" class="text-white me-4">
          <i class="bi bi-linkedin"></i>
        </a>
        <a href="#" class="text-white me-4">
          <i class="bi bi-github"></i>
        </a>
      </section>

      <!-- Section: Social -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 footer-bottom">
      © 2024 Copyright:
      <a class="text-white" href="#">PawPal</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->
<!-- End of .container -->



<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
