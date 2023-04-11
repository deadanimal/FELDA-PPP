@extends('layouts.homeLayout')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <br><br>
      <h2>{{$gallery->title}}</h2>

    </div>
</section>
<br>
<main id="main"  class="target">
        <div class="container gallery-container">

            <div class="tz-gallery">
                @foreach($pictures->chunk(3) as $picture)
                    <div class="row">

                    @foreach ($picture as $pic)

                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a class="lightbox" href="{{$pic->picture}}">
                                        <img src="{{$pic->picture}}" alt="Park">
                                    </a>
                                </div>
                            </div>
                    @endforeach

                    </div>
                @endforeach
            </div>
        </div>
  
      
</main><!-- End #main -->
<style>

.gallery-container h1 {
    text-align: center;
    margin-top: 70px;
    font-family: 'Droid Sans', sans-serif;
    font-weight: bold;
    color: #58595a;
}

.gallery-container p.page-description {
    text-align: center;
    margin: 30px auto;
    font-size: 18px;
    color: #85878c;
}

.tz-gallery {
    padding: 40px;
}

.tz-gallery .thumbnail {
    padding: 0;
    margin-bottom: 30px;
    background-color: #fff;
    border-radius: 4px;
    border: none;
    transition: 0.15s ease-in-out;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.06);
}

.tz-gallery .thumbnail:hover {
    transform: translateY(-10px) scale(1.02);
}

.tz-gallery .lightbox img {
    border-radius: 4px 4px 0 0;
}

.baguetteBox-button {
    background-color: transparent !important;
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
@endsection