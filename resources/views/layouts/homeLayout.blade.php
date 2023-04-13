<!DOCTYPE html>
<html lang="ms">

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
  <div id="topbar" class="fixed-top d-flex align-items-center topbar-inner-pages " style="background: rgba(36, 61, 37, 1) !important">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between" style="margin-right:0px">
      <div class="contact-info d-flex" style="width: 100%">
        <table class="w-100">
            <tr>
                <td  style="text-align: right">

                    <form name="t1" onSubmit="if(this.t1.value!=null && this.t1.value!='') findString(this.t1.value);return false">
                        <div class="d-flex flex-row">
                            <input type="text" class="form-control" placeholder="Carian" name="t1">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary" style="background-color: #3A5F3B; border: #3A5F3B;" >
                                    <i class="bi bi-search" style="color:white"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </td>
                <td style="width:25%; text-align: right">
                    <div class="social-links mt-3">
                        <a href="#" class="youtube"><i class="bx bxl-youtube" style="font-size: 2em"></i></a>
                        <a href="#" class="twitter"><i class="bx bxl-twitter" style="font-size: 2em"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook" style="font-size: 2em"></i></a>
                        <a href="#" class="tiktok"><i class="bx bxl-tiktok" style="font-size: 2em"></i></a>
                    </div>
                </td>
                <td style="width:20%; text-align: right ">
                    <div id="google_translate_element" style="width:100%"></div>
                    {{-- <a href="/"><img src="/SVG/malaysia.svg" style="width: 25%;" /></a>
                    <a href="#"><img src="/SVG/uk.svg" style="width: 25%;  opacity: 0.5;"/></a> --}}
                </td>
            </tr>
        </table>
        
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-inner-pages " style="height: 100px;" >
    <div class="d-flex align-items-center justify-content-between" style="height: 100px; margin: 1%;">

      <h1 style="height: -webkit-fill-available;margin: 0px;">
        <a href="/" >
            <img src="/Image/logo.png" style="height: -webkit-fill-available;background:#ffff; border-radius:4px;"/>
        </a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar" >
        <ul class="nav navbar-nav d-flex flex-row">
            @if(Request::is('/'))
                <li><a class="nav-link scrollto active" href="/"  style="font-size:1em;">LAMAN UTAMA</a></li>
            @else
                <li><a class="nav-link scrollto" href="/"  style="font-size:1em;">LAMAN UTAMA</a></li>
            @endif

            @foreach ($pages as $page)
                @if(Request::is('page/'.$page->id))
                    <li><a class="nav-link scrollto active"href="/page/{{$page->id}}" style="font-size:1em;">{{$page->nama}}</a></li>
                @else
                    <li><a class="nav-link scrollto" href="/page/{{$page->id}}" style="font-size:1em;">{{$page->nama}}</a></li>
                @endif
            @endforeach

            @if(Request::is('penyataan'))
                <li><a class="nav-link scrollto active" href="/penyataan" style="font-size:1em;">PENYATAAN DAN PENAFIAN</a></li>
            @else
                <li><a class="nav-link scrollto" href="/penyataan" style="font-size:1em;">PENYATAAN DAN PENAFIAN</a></li>
            @endif

            @if (Route::has('login'))
                <li>
                    @auth
                        <a class="nav-link scrollto" href="{{ url('/dashboard') }}" style="font-size:1em;">PAPAN PEMUKA</a>
                    @else
                        <a class="nav-link scrollto" href="{{ route('login') }}" style="font-size:1em;">LOG MASUK</a>
                    @endauth
                </li>
            @endif
            
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->
    </div>
    <ul class="nav navbar-nav navbar-right d-flex flex-row" style="display: flex; position: absolute;right: 1%;">
        <li><a class="btn zoom"><i class="bi bi-zoom-in" style="color: #105CCB;font-size: 1.2em;"></i></a></li>
        <li><a class="btn zoom-init"><i class="bi bi-arrow-clockwise" style="color: #105CCB;font-size: 1.2em;"></i></a></li> 
        <li><a class="btn zoom-out"><i class="bi bi-zoom-out" style="color: #105CCB;font-size: 1.2em;"></i></a></li>
    </ul>
  </header><!-- End Header -->
      @yield('content')
    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
        <div class="container">
            <div class="row" style="display: flex;justify-content: center;">

            <div class="col-lg-3 col-md-6 footer-links size">
                <h4>Useful Links</h4>
                <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="/">Laman Utama</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#contact">Helpdesk</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#services">Pautan</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#faq">FAQ</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#">Penyataan dan Penafian</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-contact size">
                <h4>Hubungi Kami</h4>
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
                <p style="font-size:12px">Lembaga Kemajuan Tanah Persekutuan (FELDA) (bahasa Inggeris: Federal Land Development Authority atau FELDA) 
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
    <script type="module" src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/ionicons/dist/ionicons/ionicons.js"></script>
    
    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
          new google.translate.TranslateElement({pageLanguage: 'ms', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
        }
        </script>
        
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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
    <script language="JavaScript">
        <!--
        var TRange=null;
        function findString (str) {
         if (parseInt(navigator.appVersion)<4) return;
         var strFound;
         if (window.find) {
        
          // CODE FOR BROWSERS THAT SUPPORT window.find
          strFound=self.find(str);
          if (strFound && self.getSelection && !self.getSelection().anchorNode) {
           strFound=self.find(str)
          }
          if (!strFound) {
           strFound=self.find(str,0,1)
           while (self.find(str,0,1)) continue
          }
         }
         else if (navigator.appName.indexOf("Microsoft")!=-1) {
        
          // EXPLORER-SPECIFIC CODE
        
          if (TRange!=null) {
           TRange.collapse(false)
           strFound=TRange.findText(str)
           if (strFound) TRange.select()
          }
          if (TRange==null || strFound==0) {
           TRange=self.document.body.createTextRange()
           strFound=TRange.findText(str)
           if (strFound) TRange.select()
          }
         }
         else if (navigator.appName=="Opera") {
          alert ("Opera browsers not supported, sorry...")
          return;
         }
         if (!strFound) alert ("Perkataan '"+str+"' Tidak Dijumpai!")
         return;
        }
        //-->
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
            font-size: 12px;
        }
    </style>
</body>

</html>