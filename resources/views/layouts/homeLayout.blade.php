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
    @include('sweetalert::alert')
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages ">
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
  <header id="header" class="fixed-top d-flex align-items-center header-inner-pages " style="height: 100px">
    <div class="container d-flex align-items-center justify-content-between" style="height: 100px">

      <h1 class="logo">
        <a href="/">
            <img src="/SVG/FELDA_logo.svg" style="width: auto; height: 200px; min-height: 80px; background:#ffff; border-radius:4px;"/>
            <img src="/Image/logo.png" style="width: auto; height: 200px; min-height: 80px; background:#ffff; border-radius:4px;"/>
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
            @if(Request::is('/'))
                <li><a class="nav-link scrollto active" href="#hero">LAMAN UTAMA</a></li>
            @else
                <li><a class="nav-link scrollto" href="/">LAMAN UTAMA</a></li>
            @endif
            <li><a class="nav-link scrollto" href="#contact">HELPDESK</a></li>
            <li><a class="nav-link scrollto" href="#services">PAUTAN</a></li>
            <li><a class="nav-link scrollto " href="#faq">FAQ</a></li>
            @if(Request::is('/penyataan'))
                <li><a class="nav-link scrollto active" href="/penyataan">PENYATAAN DAN PENAFIAN</a></li>
            @else
                <li><a class="nav-link scrollto" href="/penyataan">PENYATAAN DAN PENAFIAN</a></li>
            @endif
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
      <div style="margin-left: 2%;">
        <a class="btn zoom"><i class="bi bi-zoom-in" style="color: #f6b024;font-size: 1.5em;"></i></a>
        <a class="btn zoom-init"><i class="bi bi-arrow-clockwise" style="color: #f6b024;font-size: 1.5em;"></i></a>
        <a class="btn zoom-out"><i class="bi bi-zoom-out" style="color: #f6b024;font-size: 1.5em;"></i></a>
      </div>

    </div>
  </header><!-- End Header -->
  @yield('content')
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
        <div class="container">
            <div class="row" style="display: flex;justify-content: center;">

            <div class="col-lg-3 col-md-6 footer-links size">
                <h5>Useful Links</h5>
                <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="/">Laman Utama</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#contact">Helpdesk</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#services">Pautan</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Penyataan dan Penafian</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-contact size">
                <h5>Hubungi Kami</h5>
                <p class="size">
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

            <div class="col-lg-3 col-md-6 footer-info size">
                <h4>Tentang Felda</h4>
                <p style="font-size:10px">Lembaga Kemajuan Tanah Persekutuan (FELDA) (bahasa Inggeris: Federal Land Development Authority atau FELDA) 
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
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script>
        	var zoom = 1;
		
		$('.zoom').on('click', function(){
			zoom += 0.1;
			$('.target').css('transform', 'scale(' + zoom + ')');
		});
		$('.zoom-init').on('click', function(){
			zoom = 1;
			$('.target').css('transform', 'scale(' + zoom + ')');
		});
		$('.zoom-out').on('click', function(){
			zoom -= 0.1;
			$('.target').css('transform', 'scale(' + zoom + ')');
		});
    </script>
    <style>
        .hantar{
            padding: 10px 32px;
            color: #0880e8;
            transition: 0.4s;
            border-radius: 50px;
            border: 2px solid #0880e8;
            background: #fff;
        }
        .size{
            font-size: 10px;
        }
    </style>
</body>

</html>