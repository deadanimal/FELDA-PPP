@extends('layouts.homeLayout')
<script src="js/settings.js"></script>

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-cntent-center align-items-center" style=" background: url('../img/felda-2.jpg') no-repeat top center! important;">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
        
    </div>
  </section><!-- End Hero -->

<main id="main"  class="target">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2 style="font-size: 3em">Mengenai Kami</h2>
            <p style="font-size: 20px;">
                Lembaga Kemajuan Tanah Persekutuan (FELDA) (bahasa Inggeris: Federal Land Development Authority atau FELDA) 
                adalah satu agensi kerajaan Malaysia yang menangani penempatan semula penduduk luar bandar yang miskin ke kawasan-kawasan yang baru dibangun agar meningkatkan taraf ekonomi mereka.
            </p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p style="font-size: 20px;">
                FELDA mempunyai tiga peringkat pengurusan iaitu :
            </p>
            <ul>
              <li style="font-size: 20px;"><i class="ri-check-double-line"></i> Ibu Pejabat</li>
              <li style="font-size: 20px;"><i class="ri-check-double-line"></i> Wilayah</li>
              <li style="font-size: 20px;"><i class="ri-check-double-line"></i> Rancangan</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 justify">
            <p style="font-size: 20px;">
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
        <div class="section-title">
            <h2 style="font-size: 3em">MAKLUMAT ASAS</h2>
        </div>
        <div class="row">
          <div class="col-sm-4 d-flex align-items-stretch center" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box box" style="padding:0">
                <img src="/SVG/farm.svg" style="height:6em; filter: invert(16%) sepia(24%) saturate(2078%) hue-rotate(119deg) brightness(90%) contrast(103%);"><br>
                <h3 class="text-center" style="margin: 0px;">Jumlah Projek</h3>
                <h1 class="text" style="margin-left: 0px;">{{$totalModul}}</h1>
            </div>
          </div>
          <div class="col-sm-4 d-flex align-items-stretch center" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box box" style="padding:0">
              <img src="/SVG/group.svg" style="height:6em; filter: invert(16%) sepia(24%) saturate(2078%) hue-rotate(119deg) brightness(90%) contrast(103%);"><br>
              <h3 class="text-center" style="margin: 0px;">Jumlah Peneroka</h3>
              <h1 class="text" style="margin-left: 0px;"> {{$totalPeneroka}}</h1>
            </div>
          </div>
          <div class="col-sm-4 d-flex align-items-stretch center" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-box box" style="padding:0; width:100%" >
              <img src="/SVG/money.svg" style="height:6em; filter: invert(16%) sepia(24%) saturate(2078%) hue-rotate(119deg) brightness(90%) contrast(103%);"><br>
              <h3 class="text-center" style="margin: 0px;">Jumlah Penyaluran Dana</h3>
              <h1 class="text" style="margin-left: 0px;">{{$totalDana}}</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col d-flex align-items-stretch center" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box box" style="padding:0;">
              <img src="/SVG/user-global.svg" style="height:6em; filter: invert(16%) sepia(24%) saturate(2078%) hue-rotate(119deg) brightness(90%) contrast(103%);"><br>
              <h3 class="text-center" style="margin: 0px;">Jumlah Pelawat</h3>
              <h1 class="text" style="margin-left: 0px;">{{$userCount}}</h1>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="section-title" style="margin-top: 5%">
            <h2 style="font-size: 3em">KALENDAR</h2>
          </div>
          <div id="fullcalendar"></div>
      
        </div>


        <div class="section-title" style="margin-top: 10%">
            <h2 style="font-size: 3em">PAUTAN LAIN</h2>
        </div>
        <div class="row">
          <div class="col d-flex align-items-stretch mt-4 mt-md-0 center" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box" >
              <i class="bi bi-file-earmark-arrow-down" style="color: #136552"></i>
              <h4><a href="/document">Muat Turun Dokumen</a></h4>
            </div>
          </div>
          <div class="col d-flex align-items-stretch mt-4 mt-md-0 center" data-aos="fade-up" data-aos-delay="500">
            <div class="icon-box">
              <i class="bi bi-calendar4-week" style="color: #136552"></i>
              <h4><a href="#">Penerbitan</a></h4>
            </div>
          </div>
          <div class="col d-flex align-items-stretch mt-4 mt-md-0 center" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <i class="bi bi-briefcase" style="color: #136552"></i>
              <h4><a href="#">Data Terbuka</a></h4>
            </div>
          </div>
          <div class="col d-flex align-items-stretch mt-4 mt-md-0 center" data-aos="fade-up" data-aos-delay="600">
            <div class="icon-box">
              <i class="bi bi-briefcase" style="color: #136552"></i>
              <h4><a href="#">e-Penyertaan</a></h4>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 style="font-size: 3em">Hubungi Kami</h2>
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

          <div class="col-lg-6 mt-5 mt-lg-0"  data-aos-delay="100">

            <form action="/home/contact" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Emel" required>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Perkara" required>
                </div>
                <div class="form-group mt-3">
                    <textarea class="form-control" name="pesanan" rows="5" placeholder="Pesanan" required></textarea>
                </div>
                <div class="text-center" style="margin-top:2%"><button type="submit" class="hantar">Hantar</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
  <script src="js/app.js"></script>
  <script>
		document.addEventListener("DOMContentLoaded", function() {
			var calendarEl = document.getElementById('fullcalendar');
			var calendar = new FullCalendar.Calendar(calendarEl, {
				themeSystem: 'bootstrap',
				initialView: 'dayGridMonth',
				initialDate: '2021-07-07',
				headerToolbar: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay'
				},
				events: [{
						title: 'All Day Event',
						start: '2021-07-01'
					}
				]
			});
			setTimeout(function() {
				calendar.render();
			}, 250)
		});
	</script>
<style>
    .slider{
        width: 60%;
        height: auto;
    }
    .text{
        margin-left: 0px;
        font-weight: bold;
        font-size: 100px;
    }
    .justify{
        text-align: justify;
        text-justify: inter-word;
    }
    .center{
        justify-content: center;
    }
    .shadow{
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
    }
    .box{
        align-items: center;
        display: flex;
        flex-direction: column;
    }
</style>
  @endsection