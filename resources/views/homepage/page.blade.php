@extends('layouts.homeLayout')

@section('content')
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container text-center">

        <br><br>
        <h2>{{$pg->nama}}</h2>

    </div>
</section>
<main id="main"  class="target">
@foreach ($items as $item)
    @switch($item->category)
    @case('Slider')
            @if (!$sliders->isEmpty())
                <!-- ======= Slider Section ======= -->
                <section id="hero" class="d-flex justify-cntent-center align-items-center" style="height: 100vh;">
                    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
                    
                    <!-- Slider loop -->
                        @foreach($sliders as $slider)
                            <div class="carousel-item 
                                @if($loop->iteration == 1)
                                active 
                                @endif ">
                                <div class="carousel-container">
                                    @if($slider->title)
                                        <h2 class="animate__animated animate__fadeInDown">{{$slider->title}}</h2>
                                    @endif

                                    <div class="animate__animated animate__fadeInUp" style="margin:0px;width:100%">
                                        @if($slider->picture)
                                            <img src="{{$slider->picture}}" style="object-fit: contain;" class="animate__animated animate__fadeInUp slider">
                                        @endif
                                        <p div class="animate__animated animate__fadeInUp" style="margin:0px;width:100%"> {!! nl2br(e($slider->content)) !!}</p>   
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    
                    
                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
                    </a>

                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
                    </a>

                    </div>
                </section>
            @endif
        @break
    @case('Card')
            @if (!$cards->isEmpty())
                <!-- ======= Card Section ======= -->
                <section id="icon-boxes" class="icon-boxes" style="margin-top: 7%">
                <div class="container">
                    <div class="section-title">
                        <h2 style="font-size: 3em">{{$cards[0]->item->nama}}</h2>
                    </div>

                    <!-- loop for card row -->
                        @for($x=1; $x<= $cardsTotalRows; $x++)
                            <div class="row" style="margin-bottom: 7%">
                                <!-- loop card -->
                                @foreach($cards as $card)
                                    @if($card->rows == $x)
                                        <div class="col-sm d-flex align-items-stretch">
                                            <div class="icon-box shadow">
                                                @if($card->picture)
                                                <picture>
                                                    <img src="{{$card->picture}}" class="gambar">
                                                </picture>
                                                @else
                                                <div class="icon">
                                                    <i class="bx bx-file" style="color: #136552 "></i>
                                                </div>
                                                @endif

                                                <h4 class="title">{{$card->title}}</h4>

                                                @if($card->content)
                                                    <p class="description justify" style="line-height:20px">{!! nl2br(e($card->content)) !!}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endfor
                    
                </div>
                </section><!-- End Icon Boxes Section -->
            @endif
        @break
    @case('Gallery')
            @if (!$galleries->isEmpty())
                <!--  Gallery section -->
                <section id="portfolio" class="portfoio" style="margin-top: 7%">
                    <div class="container" data-aos="fade-up">
                        <div class="section-title">
                            <h2 style="font-size: 3em">{{$galleries[0]->item->nama}}</h2>
                        </div>
                        @foreach($galleries->chunk(3) as $galleries)
                            <div class="row portfolio-container">

                            @foreach ($galleries as $gallery)

                                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                    <a href="/gallery/{{$gallery->id}}">
                                        <img src="{{$gallery->thumbnail}}" class="img-fluid" alt="">
                                        <div class="portfolio-info">
                                            <h4 class="text-center">{{$gallery->title}}</h4>
                                            @if(strlen($gallery->body) > 60)
                                                <p>{{substr($gallery->body,0,60)}}....</p>
                                            @else
                                                <p>{{$gallery->body}}</p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach  
                            </div>
                        @endforeach

                    </div>
                </section><!--  end Gallery section -->
            @endif
        @break
    @case('Dropdown')
            @if (!$dropdowns->isEmpty())
            <!-- ======= dropdown Section ======= -->
                <section class="faq section-bg" style="margin-top: 7%">
                    <div class="container" data-aos="fade-up">
                        <div class="section-title">
                        <h2 style="font-size: 3em">{{$dropdowns[0]->item->nama}}</h2>
                        </div>

                        <div class="faq-list">
                        <ul>
                                @foreach($dropdowns as $dropdown)
                                    <li data-aos="fade-up" data-aos="fade-up" data-aos-delay="{{$loop->iteration}}00">
                                        <i class="bx bxs-pin icon-help"></i>
                                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{$loop->iteration}}">{{$dropdown->title}}
                                            <i class="bx bx-chevron-down icon-show"></i>
                                            <i class="bx bx-chevron-up icon-close"></i>
                                        </a>
                                        <div id="faq-list-{{$loop->iteration}}" class="collapse" data-bs-parent=".faq-list">
                                            <p>
                                                {{$dropdown->body}}
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                        </ul>
                        </div>

                    </div>
                </section><!-- End Frequently Asked Questions Section -->
            @endif
        @break
    @case('Document')
            @if (!$docs->isEmpty())
                <section id="services" class="services" style="margin-top: 7%">
                    <div class="container aos-init aos-animate" data-aos="fade-up">
                        <div class="section-title" style="margin-top: 10%">
                            <h2 style="font-size: 3em">PAUTAN LAIN</h2>
                        </div>
                        @foreach ($docs as $doc)
                            @if ($loop->iteration%4 == 0)
                                <div class="row" style="margin-bottom: 5%">
                            @endif
                            <div class="col d-flex align-items-stretch mt-4 mt-md-0 center aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box">
                                    <i class="bi bi-file-earmark-arrow-down" style="color: #136552"></i>
                                    <h4><a href="/doc/{{$doc->id}}">{{$doc->nama}}</a></h4>
                                </div>
                            </div>
                            @if ($loop->iteration%4 == 0)
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            @endif
        @break
    @endswitch
@endforeach


    

    
        

    
    
    

</main><!-- End #main -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script>
    $('.text').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 2500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
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