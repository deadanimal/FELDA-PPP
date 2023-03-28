@extends('layouts.homeLayout')

@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <br><br>
        <h2>Muat Turun Dokumen</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-11 entries">

            <article class="entry">

            <table class="table table-bordered table-hover">
            <thead>
                <tr class="table-primary">
                    <th class="text-center">Nama Dokumen</th>
                    <th class=""></th>
                </tr>
            </thead>
            @if (!$docs->isEmpty())
                <tbody>
                    @foreach($docs as $doc)
                    <tr>
                        <td class="text-center">{{$doc->name}}</td>
                        <td class="text-center"><a href="{{$doc->file}}" download>Muat Turun</a></td>
                    </tr>
                    @endforeach
                </tbody>
            @endif
            
            </table>

            </article><!-- End blog entry -->
        
          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection