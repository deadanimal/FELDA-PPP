<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Felda - Program Pembangunan Peneroka</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/style.css" rel="stylesheet">
</head>
<style>
    .gambar{
        width: 100%;
        height: auto;
    }
</style>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      </div>
      <div class="contact-info d-none d-md-block">
        <div class="social-links mt-3">
            <a href="#" class="youtube"><i class="bx bxl-youtube" style="font-size: 3em"></i></a>
            <a href="#" class="twitter"><i class="bx bxl-twitter" style="font-size: 3em"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook" style="font-size: 3em"></i></a>
            <a href="#" class="tiktok"><i class="bx bxl-tiktok" style="font-size: 3em"></i></a>
          </div>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center " style="height: 100px">
    <div class="container d-flex align-items-center justify-content-between" style="height: 100px">

      <h1 class="logo">
        <a href="/">
            <img src="/SVG/FELDA_logo.svg" style="height:200px; background:#ffff; border-radius:4px;"/>
            <img src="/Image/logo.png" style="width: 100px; height:100px; background:#ffff; border-radius:4px;"/>
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            <li><a class="nav-link scrollto active" href="/">LAMAN UTAMA</a></li>
            <li><a class="nav-link scrollto" href="#contact">HELPDESK</a></li>
            <li><a class="nav-link scrollto" href="#services">PAUTAN</a></li>
            <li><a class="nav-link scrollto " href="#faq">FAQ</a></li>
            <li><a class="nav-link scrollto" href="">PENYATAAN DAN PENAFIAN</a></li>
            @if (Route::has('login'))
                <li>
                    @auth
                        <a class="nav-link scrollto" href="{{ url('/dashboard') }}">PAPAN PEMUKA</a>
                    @else
                        <a class="nav-link scrollto" href="{{ route('login') }}">LOG MASUK</a>
                    @endauth
                </li>
            @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
        
      <!-- Slider loop -->
      @if (!$sliders->isEmpty())
        @foreach($sliders as $slider)
            <div class="carousel-item active">
                <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">{{$slider->title}}</h2>
                <p class="animate__animated animate__fadeInUp">
                        {!! nl2br(e($slider->content)) !!}
                </p>
                </div>
            </div>
        @endforeach
      @endif
      
      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Card Section ======= -->
    <section id="icon-boxes" class="icon-boxes">
      <div class="container">
        @if (!$cards->isEmpty())
            @for($x=1; $x<= $cardsTotalRows; $x++)
                <div class="row" style="margin-bottom: 5%">
                    @foreach($cards as $card)
                        @if($card->rows == $x)
                            <div class="col-sm d-flex align-items-stretch">
                                <div class="icon-box">
                                @if($card->picture)
                                <picture>
                                    <img src="{{$card->picture}}" class="gambar">
                                </picture>
                                @endif

                                <h4 class="title">{{$card->title}}</h4>

                                @if($card->content)
                                    <p class="description">{!! nl2br(e($card->content)) !!}</p>
                                @endif
                                </div>
                            </div>
                            @endif
                    @endforeach
                </div>
            @endfor
        @endif
      </div>
    </section><!-- End Icon Boxes Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Mengenai Kami</h2>
            <p>
                Lembaga Kemajuan Tanah Persekutuan (FELDA) (bahasa Inggeris: Federal Land Development Authority atau FELDA) 
                adalah satu agensi kerajaan Malaysia yang menangani penempatan semula penduduk luar bandar yang miskin ke kawasan-kawasan yang baru dibangun agar meningkatkan taraf ekonomi mereka.
            </p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
                FELDA mempunyai tiga peringkat pengurusan iaitu :
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ibu Pejabat</li>
              <li><i class="ri-check-double-line"></i> Wilayah</li>
              <li><i class="ri-check-double-line"></i> Rancangan</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
                Skim-skim FELDA tidak hanya dikhaskan untuk membantu orang Melayu yang miskin malah beberapa buah FELDA terawal seperti Felda LBJ dan Felda Lurah Bilut menerima peneroka pelbagai kaum sperti kaum Cina dan kaum India, begitu juga FELDA di Sabah dan Sarawak yang mana peneroka terdiri 
                dari pelbagai kaum dan keturunan yang membentuk sebilangan besar penduduk Malaysia. Sehingga tahun 2000, FELDA mengusahakan tanah sebanyak 9,000 kilometer persegi, kebanyakannya ladang kelapa sawit. Walaupun objektif utama FELDA adalah untuk mengurangkan kemiskinan di luar bandar melalui petempatan semula, 
                ia dilaporkan juga memegang kepentingan minoriti dalam sebilangan bank utama Malaysia.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-sm-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h4>Jumlah Projek: {{$totalModul}}</h4>
            </div>
          </div>
          <div class="col-sm-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h4>Jumlah Peneroka: {{$totalPeneroka}}</h4>
            </div>
          </div>
          <div class="col-sm-4 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h4>Jumlah Penyaluran Dana: RM 2.4M</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">Muat Turun Dokumen</a></h4>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">Penerbitan</a></h4>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">Data Terbuka</a></h4>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">e-Penyertaan</a></h4>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Soalan-Soalan Lazim (FAQ)</h2>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
        </div>

        <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

          <div class="col-lg-5">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Lokasi:</h4>
                <p>
                    Lembaga Kemajuan Tanah Persekutuan, Menara FELDA, Platinum Park, No. 11, Persiaran KLCC, 50088 Kuala Lumpur, Malaysia.
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Emel:</h4>
                <p>jkk@felda.net.my</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>No. Tel:</h4>
                <p>03 2191 2191</p>
                <h4>No. Faks:</h4>
                <p>03 2191 2590</p>
              </div>

            </div>

          </div>

          <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="100">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Laman Utama</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Helpdesk</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Pautan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Penyataan dan Penafian</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Hubungi Kami</h4>
            <p>
                Lembaga Kemajuan Tanah Persekutuan,<br>
                Menara FELDA,<br>
                Platinum Park, No. 11,<br>
                Persiaran KLCC, 50088 Kuala Lumpur,<br>
                Malaysia.<br>
                <br>
              <strong>No. Tel:</strong> 03 2191 2191<br>
              <strong>Emel:</strong> jkk@felda.net.my<br>
            </p>

          </div>

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Tentang Felda</h3>
            <p>Lembaga Kemajuan Tanah Persekutuan (FELDA) (bahasa Inggeris: Federal Land Development Authority atau FELDA) 
                adalah satu agensi kerajaan Malaysia yang menangani penempatan semula penduduk luar bandar yang miskin ke kawasan-kawasan yang baru dibangun agar meningkatkan taraf ekonomi mereka.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

</footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>