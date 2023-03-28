@extends('layouts.homeLayout')

@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <br><br>
        <h2>Penyataan Dan Penafian</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-11 entries">

            @if (!$stats->isEmpty())
                @foreach ($stats as $stat)
                    <article class="entry">

                    <div class="entry-img">
                        <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title">
                        <a href="blog-single.html">{{$stat->title}}</a>
                    </h2>

                    <div class="entry-content">
                        <p>{{$stat->statement}}</p>
                    </div>

                    </article><!-- End blog entry -->
                @endforeach
            @endif
        
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection