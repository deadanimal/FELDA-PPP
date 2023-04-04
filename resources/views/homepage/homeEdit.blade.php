@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Tetapan Laman Utama
    </h1>
  </div>
  
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <table style="width: 100%">
                    <tr>
                    <td><h1 style="font-family: 'Eina01-SemiBold', sans-serif; font-size:23px;">Senarai Slider</h1></td>
                    <td>
                        <button class="frame9403-frame7445"  data-toggle="modal" data-target="#modalCenterAddSlider">
                            <div class="frame9403-frame7293">
                                <span class="frame9403-text21"><span>Tambah Slider</span></span>
                                <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                            </div>
                        </button>
                    </td>
                    </tr>
                </table>
            </div>

            {{-- popup form Tambah Slider --}}
            <div class="modal fade" id="modalCenterAddSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA SLIDER</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/slider/add" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label for="title" class="frame9402-text04">
                                    <strong>Tajuk Slider</strong>
                                </label>
                                <input type="text" class="frame9402-kotaknamaBorang" id="title" placeholder="Tajuk Slider" name="title" oninput="this.value = this.value.toUpperCase()">
                                <label for="content" class="frame9402-text04">
                                    <strong>Kandungan Slider</strong>
                                </label>
                                <textarea class="form-control" id="content" rows="5" name="content" placeholder="Kandungan Slider"></textarea>
                                <br>
                                <label for="picture" class="frame9402-text04">
                                    <strong>Muat Naik Gambar</strong>
                                </label>
                                <input class="form-control" id="picture" type="file" accept="image/*" name="picture"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- senarai Slider --}}
            @if (!$sliders->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">                    
                    <tr class="text-center">
                        <th class="text-center" style="width: 1%">No.</th>
                        <th class="text-center">Tajuk Slider</th>
                        <th class="text-center" style="width: 50%">Kandungan Slider</th>
                        <th class="text-center">Gambar</th>
                        <th class="text-center" style="width: 11%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>          
                    @foreach ($sliders as $slider)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        @if ($slider->title)
                            <td class=""text-center arial-N">
                                {!! nl2br(e($slider->title)) !!}
                            </td>
                        @else
                            <td class="text-center arial-N">-</td>
                        @endif
                        
                        @if ($slider->content)
                            <td class="arial-N">
                                {!! nl2br(e($slider->content)) !!}
                            </td>
                        @else
                            <td class="text-center arial-N">-</td>
                        @endif

                        @if ($slider->picture)
                            <td class="text-center arial-N">
                                <a href="{{ $slider->picture }}">Gambar</a>
                            </td>
                        @else
                            <td class="text-center arial-N">-</td>
                        @endif

                        <td class="text-center align-middle">
                            <!-- Button trigger modal update-->
                            <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#exampleModalCenter{{$slider->id}}">
                                <img src="/SVG/pencil.svg"/>
                            </button>
        
                            <!-- Modal update-->
                            <div class="modal fade" id="exampleModalCenter{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$slider->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="post" action="/home/slider/update">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <label for="title" class="frame9402-text04">
                                                    <strong>Tajuk Slider</strong>
                                                </label>
                                                <input type="text" class="frame9402-kotaknamaBorang" value="{{$slider->title ?? ""}}" name="title" oninput="this.value = this.value.toUpperCase()">
                                                <label for="content" class="frame9402-text04">
                                                    <strong>Kandungan Slider</strong>
                                                </label>
                                                <textarea class="form-control" id="content" rows="5" name="content" placeholder="Kandungan Slider">{{ $slider->content }}</textarea>
                                                <br>
                                                @if ($slider->picture)
                                                    <img class="img-fluid img-thumbnail" src="{{ $slider->picture }}" alt=""/>
                                                @endif
                                                <br>
                                                <input id="picture" type="file" accept="image/*" name="picture"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <input type="hidden" value="{{$slider->id}}" name="sliderId">
                                                <button class="btn btn-primary">Kemaskini</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Button trigger modal delete -->
                            <button type="button" class="frame9402-rectangle828246" style="margin-left: 10%" data-toggle="modal" data-target="#exampleModal{{$slider->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Padam Slider {{$slider->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Padam Slider {{$slider->title}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                                            <form method="post" action="/home/slider/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="sliderId" value="{{$slider->id}}"/>
                                            <button class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Slider </h2>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
            <table style="width: 100%">
                <tr>
                <td><h1 style="font-family: 'Eina01-SemiBold', sans-serif; font-size:23px;">Senarai Kad</h1></td>
                <td>
                    <button class="frame9403-frame7445" data-toggle="modal" data-target="#ModalCenterTambahKad">
                        <div class="frame9403-frame7293">
                            <span class="frame9403-text21"><span>Cipta Kad</span></span>
                            <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>
                </td>
                </tr>
            </table>
            </div>

            {{-- modal Tambah Kad --}}
            <div class="modal fade" id="ModalCenterTambahKad" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA KAD</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/card/add" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            <label for="rows" class="frame9402-text04">
                                            <strong>Baris Kad</strong>
                                            </label>
                                        </td>
                                        <td>
                                            <input type="number" class="frame9402-kotaknamaBorang" id="rows" name="rows" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="tajukKad" class="frame9402-text04">
                                            <strong>Tajuk Kad</strong>
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" class="frame9402-kotaknamaBorang" id="tajukKad" placeholder="Tajuk Kad" name="title" required oninput="this.value = this.value.toUpperCase()">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="content" class="frame9402-text04">
                                            <strong>Kadungan Kad</strong>
                                            </label>
                                        </td>
                                        <td>
                                            <textarea class="form-control" id="content" rows="5" name="content" placeholder="Kadungan Kad"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="picture" class="frame9402-text04">
                                            <strong>Muat Naik Gambar</strong>
                                            </label>
                                        </td>
                                        <td>
                                            <input id="picture" type="file" accept="image/*" name="picture" class="form-control"/>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- senarai Kad --}}
            @if (!$cards->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">
                    <tr class="text-center">
                        <th class="text-center" style="width: 1%">No.</th>
                        <th scope="col" class="text-center">Tajuk Kad</th>
                        <th scope="col" class="text-center" style="width: 50%">Kadungan Kad</th>
                        <th scope="col" class="text-center">Gambar</th>
                        <th scope="col" class="text-center">Baris Kad</th>
                        <th scope="col" style="width: 11%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cards as $card)
                        <tr>
                            <td class="text-center"> {{ $loop->iteration }}</td>
                            <td class="text-center arial-N" style="text-transform: uppercase;">{{$card->title}}</td>

                            @if ($card->content)
                                <td class="arial-N">{!! nl2br(e($card->content)) !!}</td>
                            @else
                                <td class="text-center arial-N">-</td>
                            @endif

                            @if ($card->picture)
                                <td class="text-center arial-N">
                                    <a href="{{ $card->picture }}">Gambar</a>
                                </td>
                            @else
                                <td class="text-center arial-N">-</td>
                            @endif

                            <td class="text-center arial-N">{{ $card->rows }}</td>
                            <td class="text-center align-middle">
                                <!-- Button trigger modal update-->
                                <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#ModalCenter{{$card->id}}">
                                    <img src="/SVG/pencil.svg"/>
                                </button>
            
                                <!-- Modal update-->
                                <div class="modal fade" id="ModalCenter{{$card->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$card->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form method="post" action="/home/card/update" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <label for="rows" class="frame9402-text04">
                                                        <strong>Baris Kad</strong>
                                                    </label>
                                                    <input type="number" class="frame9402-kotaknamaBorang" id="rows" name="rows" value="{{$card->rows}}" required>
                                                    <br>
                                                    <label for="title" class="frame9402-text04">
                                                        <strong>Tajuk Kad</strong>
                                                    </label>
                                                    <input type="text" class="frame9402-kotaknamaBorang" value="{{$card->title}}" name="title" required oninput="this.value = this.value.toUpperCase()">
                                                    <br>
                                                    <label for="content" class="frame9402-text04">
                                                        <strong>Kandungan Kad</strong>
                                                    </label>
                                                    <textarea class="form-control" id="content" rows="5" name="content">{{ $card->content }}</textarea>
                                                    <br>
                                                    <label for="picture" class="frame9402-text04">
                                                        <strong>Gambar</strong>
                                                    </label>
                                                    @if ($card->picture)
                                                        <img class="img-fluid img-thumbnail" src="{{ $card->picture }}" alt=""/>
                                                    @endif
                                                    <input type="file" accept="image/*" name="picture" class="form-control"/>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <input type="hidden" value="{{$card->id}}" name="cardId">
                                                    <button class="btn btn-primary">Kemaskini</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Button trigger modal delete -->
                                <button type="button" class="frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModalKad{{$card->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalKad{{$card->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Padam Kad {{$card->title}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda Pasti Mahu Kad {{$card->title}}?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                                                <form method="post" action="/home/card/delete">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="cardId" value="{{$card->id}}"/>
                                                <button class="btn btn-danger">Ya</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            @else
            <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Kad </h2>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <table style="width: 100%">
                    <tr>
                        <td><h1 style="font-family: 'Eina01-SemiBold', sans-serif; font-size:23px;">Senarai Soalan Lazim</h1></td>
                        <td>
                            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModaladdFAQ">
                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Tambah Soalan Lazim</span></span>
                                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                </div>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            {{-- Modal Tambah Soalan Lazim --}}
            <div class="modal fade" id="exampleModaladdFAQ" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA SOALAN LAZIM</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/faq/add" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="question" class="frame9402-text04">
                                    <strong>Soalan</strong>
                                </label>
                                <input type="text" class="frame9402-kotaknamaBorang" style="text-transform: unset; width:-webkit-fill-available"  id="question" placeholder="Soalan" name="question" required>
                                <label for="answer" class="frame9402-text04">
                                    <strong>Jawapan Soalan Tersebut</strong>
                                </label>
                                <textarea class="form-control" id="answer" rows="5" name="answer" placeholder="Jawapan Soalan"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- senarai Soalan Lazim --}}
            @if (!$faqs->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">                    
                    <tr class="text-center">
                        <th class="text-center" style="width: 1%">No.</th>
                        <th class="text-center"  style="width: 30%">Soalan</th>
                        <th class="text-center">Jawapan</th>
                        <th class="text-center" style="width: 11%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>          
                    @foreach ($faqs as $faq)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center arial-N">{{ $faq->question }}</td>
                        <td class="arial-N">
                            {!! nl2br(e($faq->answer)) !!}
                        </td>
                        <td class="text-center align-middle">
                            <!-- Button trigger modal update-->
                            <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#exampleModalFaq{{$faq->id}}">
                                <img src="/SVG/pencil.svg"/>
                            </button>
        
                            <!-- Modal update-->
                            <div class="modal fade" id="exampleModalFaq{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$faq->question}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="post" action="/home/faq/update">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <label for="question" class="frame9402-text04">
                                                    <strong>Soalan</strong>
                                                </label>
                                                <input type="text" class="frame9402-kotaknamaBorang" style="text-transform: unset; width:-webkit-fill-available" value="{{$faq->question}}" name="question" required>
                                                <label for="answer" class="frame9402-text04">
                                                    <strong>Jawapan Soalan Tersebut</strong>
                                                </label>
                                                <textarea class="form-control" id="content" rows="5" name="answer">{{ $faq->answer }}</textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <input type="hidden" value="{{$faq->id}}" name="faqId">
                                                <button class="btn btn-primary">Kemaskini</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Button trigger modal delete -->
                            <button type="button" class="frame9402-rectangle828246" style="margin-left: 10%" data-toggle="modal" data-target="#deleteModalFaq{{$faq->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModalFaq{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Padam Soalan Lazim</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Padam Soalan Lazim?</p>
                                            <p>{{$faq->question}}</p>
                                            <p>{{$faq->answer}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                                            <form method="post" action="/home/faq/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="faqId" value="{{$faq->id}}"/>
                                            <button class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            @else
            <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Soalan Lazim </h2>
            @endif
        </div>
        
        <div class="card">
            <div class="card-header">
                <table style="width: 100%">
                    <tr>
                        <td><h1 style="font-family: 'Eina01-SemiBold', sans-serif; font-size:23px;">Senarai Penyataan dan Penafian</h1></td>
                        <td>
                            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModaladdStat">
                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Tambah Penyataan dan Penafian</span></span>
                                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                </div>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            {{-- Modal Tambah Statement --}}
            <div class="modal fade" id="exampleModaladdStat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA PENYATAAN DAN PENAFIAN</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/statement/add" method="POST">
                            @csrf
                            <div class="modal-body">
                                <label for="title" class="frame9402-text04">
                                    <strong>Penyataan</strong>
                                </label>
                                <input type="text" class="frame9402-kotaknamaBorang" style="text-transform: unset; width:-webkit-fill-available"  id="title" placeholder="Penyataan" name="title" required>
                                <label for="statement" class="frame9402-text04">
                                    <strong>Penafian</strong>
                                </label>
                                <textarea class="form-control" id="statement" rows="5" name="statement" placeholder="Penafian"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- senarai Statement --}}
            @if (!$stats->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">                    
                    <tr class="text-center">
                        <th class="text-center" style="width: 1%">No.</th>
                        <th class="text-center"  style="width: 30%">Penyataan</th>
                        <th class="text-center">Penafian</th>
                        <th class="text-center" style="width: 11%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>          
                    @foreach ($stats as $stat)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center arial-N">{{ $stat->title }}</td>
                        <td class="arial-N">
                            {!! nl2br(e($stat->statement)) !!}
                        </td>
                        <td class="text-center align-middle">
                            <!-- Button trigger modal update-->
                            <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#exampleModalUpdateStat{{$stat->id}}">
                                <img src="/SVG/pencil.svg"/>
                            </button>
        
                            <!-- Modal update-->
                            <div class="modal fade" id="exampleModalUpdateStat{{$stat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$stat->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="post" action="/home/statement/update">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <label for="title" class="frame9402-text04">
                                                    <strong>Penyataan</strong>
                                                </label>
                                                <input type="text" class="frame9402-kotaknamaBorang" id="title" style="text-transform: unset; width:-webkit-fill-available" value="{{$stat->title}}" name="title" required>
                                                <label for="statement" class="frame9402-text04">
                                                    <strong>Penafian</strong>
                                                </label>
                                                <textarea class="form-control" id="statement" rows="5" name="statement">{{ $stat->statement }}</textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <input type="hidden" value="{{$stat->id}}" name="statId">
                                                <button class="btn btn-primary">Kemaskini</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Button trigger modal delete -->
                            <button type="button" class="frame9402-rectangle828246" style="margin-left: 10%" data-toggle="modal" data-target="#deleteModalStat{{$stat->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModalStat{{$stat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Padam Penyataan dan Penafian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Padam Penyataan dan Penafian?</p>
                                            <p>Penyataan: {{$stat->title}}</p>
                                            <p>Penafian: {{$stat->statement}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                                            <form method="post" action="/home/statement/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="statId" value="{{$stat->id}}"/>
                                            <button class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            @else
            <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Penyataan dan Penafian </h2>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <table style="width: 100%">
                    <tr>
                        <td><h1 style="font-family: 'Eina01-SemiBold', sans-serif; font-size:23px;">Senarai Dokumen</h1></td>
                        <td>
                            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModaladdDoc">
                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Tambah Dokumen</span></span>
                                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                </div>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            @php
                foreach($errors->all() as $error) {
                    Alert::error('Tidak Berjaya.', $error);   
                }
            @endphp

            {{-- Modal Tambah Doc --}}
            <div class="modal fade" id="exampleModaladdDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">TAMBAH DOKUMEN</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/document/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label for="title" class="frame9402-text04">
                                    <strong>Tajuk Dokumen</strong>
                                </label>
                                <input type="text" class="frame9402-kotaknamaBorang" style="text-transform: unset; width:-webkit-fill-available"  id="title" placeholder="Tajuk" name="name" required oninput="this.value = this.value.toUpperCase()">
                                <label for="document" class="frame9402-text04">
                                    <strong>Muat Naik Dokumen</strong>
                                </label>
                                <input id="document" type="file" name="dokumen" required/>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- senarai Slider --}}
            @if (!$docs->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">                    
                    <tr class="text-center">
                        <th class="text-center" style="width: 1%">No.</th>
                        <th class="text-center"  style="width: 40%">Tajuk</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center" style="width: 11%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>          
                    @foreach ($docs as $doc)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center arial-N">{{ $doc->name }}</td>
                        <td class="text-center arial-N">
                                <a href="{{ $doc->dokumen }}">Lihat Dokumen</a>
                        </td>
                        <td class="text-center align-middle">
                            <!-- Button trigger modal update-->
                            <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#updateModalDoc{{$doc->id}}">
                                <img src="/SVG/pencil.svg"/>
                            </button>
        
                            <!-- Modal update-->
                            <div class="modal fade" id="updateModalDoc{{$doc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$doc->question}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="post" action="/home/document/update" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <label for="title" class="frame9402-text04">
                                                    <strong>Tajuk</strong>
                                                </label>
                                                <input type="text" class="frame9402-kotaknamaBorang" id="title" style="text-transform: unset; width:-webkit-fill-available" value="{{$doc->name}}" name="name" required oninput="this.value = this.value.toUpperCase()">
                                                <label for="document" class="frame9402-text04">
                                                    <strong>Muat Naik Dokumen</strong>
                                                </label>
                                                <p><a href="{{ $doc->dokumen }}">Lihat dokumen</a> yang telah dimuat naik</p>
                                                <input id="document" type="file" name="dokumen"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <input type="hidden" value="{{$doc->id}}" name="docId">
                                                <button class="btn btn-primary">Kemaskini</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Button trigger modal delete -->
                            <button type="button" class="frame9402-rectangle828246" style="margin-left: 10%" data-toggle="modal" data-target="#deleteModalDoc{{$doc->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModalDoc{{$doc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Padam Dokumen</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Dokumen {{$doc->name}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                                            <form method="post" action="/home/document/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="docId" value="{{$doc->id}}"/>
                                            <button class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
            @else
            <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Dokumen </h2>
            @endif
        </div>
    </div>
  </div>
</div>

<script src="/js/jquery.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<style>
  .arial-N{
      font-family: 'Arial', sans-serif;
  }
  .frame9402-frame9402 {
    width: 100%;
    display: flex;
    position: relative;
    box-sizing: border-box;
    flex-shrink: 0;
    border-color: transparent;
    border-radius: 0px 0px 0px 0px;
    margin: 0;
    flex-direction: column;
  }
  .frame9402-frame9281 {
    display: flex;
    padding: 58px 339px;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 32px;
    flex-direction: column;
    background-color: #F1F1F1;
  }
  .frame9403-frame9401 {
    display: flex;
    position: relative;
    align-self: stretch;
    box-sizing: border-box;
    align-items: flex-start;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 43px;
    flex-direction: column;
    justify-content: center;
    padding-top: 25px;
  
  }
  .frame9403-text {
    color: #781E2A;
    height: auto;
    font-size: 30px;
    align-self: auto;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 13px;
    text-decoration: none;
  }
  .frame9403-text02 {
    color: #781E2A;
    height: auto;
    font-size: 25px;
    align-self: auto;
    font-style: Medium;
    text-align: left;
    font-family: 'Poppins', sans-serif;
    font-weight: 500;
    line-height: normal;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-box {
    width: 100%;
    display: flex;
    padding-bottom: 50px;
    position: relative;
    box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgba(0, 0, 0, 0.05000000074505806) ;
    box-sizing: content-box;
    align-items: center;
    border-color: transparent;
    border-radius: 8.598855018615723px;
    margin-bottom: 0;
    flex-direction: column;
    background-color: white;
  }
  .frame9402-frame9282 {
    display: flex;
    width: inherit;
    padding-top: 30px;
    padding-bottom: 30px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 32px;
    flex-direction: column;
    background-color: #F1F1F1;
  }
  .frame9402-frame7301 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-self: flex-start;
    border-color: transparent;
    margin-left: 17px;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    flex-direction: column;
  }
  .frame9402-frame7188 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-left: 20px;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
  }
  .frame9402-text04 {
    color: black;
    height: auto;
    font-size: 17px;
    align-self: auto;
    text-align: left;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: normal;
    font-stretch: normal;
    margin-right: 17px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-text01 {
    color: #781E2A;
    height: auto;
    font-size: 23px;
    align-self: auto;
    text-align: center;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: normal;
    font-stretch: normal;
    margin-right: 17px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-text05 {
    color: #781E2A;
    height: auto;
    font-size: 23px;
    align-self: auto;
    text-align: left;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: normal;
    font-stretch: normal;
    margin-right: 17px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-kotaknama {
    width: 95%;
    height: 80%;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    margin-right: 0;
    border-radius: 3.461621046066284px;
    margin-bottom: 0;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-size: 18px;
    padding-left:10px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
    background-color: #FFFFFF;  
    text-transform: uppercase;
  }
  .frame9403-frame7445 {
      width: auto;
    height: 50px;
    display: flex;
    max-width: 250px;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    justify-content: center;
    background-color: #A2335D;
    cursor: pointer;
    align-self: flex-end;
    margin-left: auto;
    margin-right: 10px;
  }
  .frame9403-frame7293 {
  display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
    height: auto;
    font-size: 16px;
    align-self: auto;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    font-stretch: normal;
    margin-right: 10px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9403-group7527 {
    width: 24px;
    height: 24px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-right: 0;
    margin-bottom: 0;
  }
  .frame9403-kotaknama3 {
      top: 0px;
      width: 65%;
      height: 50px;
      position: relative;
      box-sizing: content-box;
      border-color: rgba(140, 38, 60, 1);
      border-style: solid;
      border-width: 0.865405261516571px;
      border-radius: 3.461621046066284px;
      box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
      background-color:#FFFFFF;
      background-position:99% center;
      display:block;
      font-family: 'Eina01-SemiBold', sans-serif;
      font-size: 17.3081px;  
      text-transform: uppercase;
      text-align: center;
    }
  * {
      box-sizing: border-box;
    }
    .openBtn {
      display: flex;
      justify-content: left;
    }
    .openButton {
      border: none;
      border-radius: 5px;
      background-color: #1c87c9;
      color: white;
      padding: 14px 20px;
      cursor: pointer;
      position: fixed;
    }
    .divPopup {
      position: relative;
      text-align: center;
      width: 100%;
    }
    .formPopup {
      display: none;
      position: fixed;
      left: 50%;
      top: 5%;
      transform: translate(-50%, 5%);
      border: 4px solid #781E2A;
      border-radius: 8px;
      z-index: 9;
    }
    .formContainer {
      max-width: 550px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      margin-bottom: 0px;
    }
    .frame9402-kotaknamaBorang {
    width: 299px;
    height: 50px;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    margin-right: 0;
    border-radius: 3.461621046066284px;
    margin-top: 10px;
    margin-bottom: 30px;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-size: 18px;
    padding-left:10px;  
    text-transform: uppercase;
  }
    .formContainer .btn {
      padding: 12px 20px;
      border: none;
      background-color: #8ebf42;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      cursor: pointer;
      width: 100%;
      margin-bottom: 15px;
      opacity: 0.8;
    }
    .formContainer .cancel {
      background-color: #cc0000;
    }
    .formContainer .btn:hover,
    .openButton:hover {
      opacity: 1;
    }
    .frame9402-input {
    width: 100%;
    height: 70px;
    display: flex;
    padding-top: 5px;
    padding-bottom: 5px;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    flex-shrink: 0;
    border-color: transparent;
    margin-left: 0;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 20px;
    background-color: rgba(162, 50, 93, 0.20000000298023224);
  }
    .frame9402-text30 {
    color: #494949;
    height: auto;
    font-size: 17px;
    margin-left: auto;
    text-align: right;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: 15.477937698364258px;
    font-stretch: normal;
    margin-bottom: 0;
    text-decoration: none;
    padding-right: 20px;
  }
  .frame9402-text31 {
    color: #494949;
    width: 50%;
    height: auto;
    font-size: 17px;
    align-self: auto;
    text-align: left;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: 15.477937698364258px;
    font-stretch: normal;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-text32 {
    color: #494949;
    width: 20%;
    height: auto;
    font-size: 17px;
    align-items: center;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: 15.477937698364258px;
    font-stretch: normal;
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    text-decoration: none;
  }
  .frame9402-frame8727 {
    width: 20%;
    display: flex;
    opacity: 1;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    flex-shrink: 0;
    border-color: transparent;
    margin-left: auto;
    border-radius: 0px 0px 0px 0px;
    margin-bottom: 0;
    justify-content: center;
  }
  .frame9402-rectangle828246 {
    width: 35px;
    height: 30px;
    padding: 0px;
    margin-top: -5px;
    position: relative;
    box-sizing: border-box;
    background-color: transparent;
    border-color: transparent;
    cursor:pointer;
  }
  .frame9402-rectangle828245 {
    width: 32px;
    height: 30px;
    box-sizing: border-box;
    padding-right: 10px;
    border: none;
    background-color: rgba(0, 0, 0, 0)
  }
  .frame9402-rectangle8282452 {
    width: 32px;
    height: 30px;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    margin-top: -1px;
    margin-right: auto;
    margin-left: auto;
  }
  
  .switch {
    position: relative;
  }
  
  .switch label {
    width: 55px;
    height: 23px;
    background-color: #999;
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 50px;
  }
  
  .switch input[type="checkbox"] {
    visibility: hidden;
  }
  .switch label:after {
    content: 'Active';
    width: 21px;
    height: 21px;
    border-radius: 50px;
    position: absolute;
    top: 1px;
    left: 1px;
    transition: 100ms;
    background-color: white;
  }
  
  .switch .look:checked + label:after {
    left: 32px;
  }
  
  .switch .look:checked + label {
    background-color: lightsteelblue;
  }
  
  </style>
@endsection