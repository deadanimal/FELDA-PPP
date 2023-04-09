@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Gambar Dalam Galeri {{$gallery->title}}
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home </a></li>
            <li class="breadcrumb-item"><a href="/home/page/{{$item->page_id}}/item">{{$item->page->nama}}</a></li>
            <li class="breadcrumb-item"><a href="/home/item/{{$item->id}}/gallery">{{$gallery->title}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Gambar</li>                  
        </ol>
      </nav>
  </div>
  
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="container">
                <table class="w-100 mt-4">
                    <tr>
                        <td><h1 class="fw-light text-center text-lg-start mb-0">Senarai Gambar</h1></td>
                        <td>
                            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModaladd">
                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Tambah Gambar</span></span>
                                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                </div>
                            </button>
                        </td>
                    </tr>
                </table>

                {{-- modal tambah picture --}}
                <div class="modal fade" id="exampleModaladd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA GALERI</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/home/picture/add" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label for="picture" class="frame9402-text04">
                                        <strong>Muat Naik Gambar</strong>
                                    </label>
                                    <input id="picture" type="file" accept="image/*" name="picture" class="form-control" required/>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" value="{{$gallery->id}}" name="galleryId">
                                    <input type="hidden" value="{{$item->id}}" name="itemId">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              
                <hr class="mt-2 mb-5">
                
                @if (!$pictures->isEmpty())
                    <div class="row text-center text-lg-start">
                        
                        @foreach ($pictures as $pic)
                            
                        <div class="col-lg-3 col-md-4 col-6">
                            <a href="#" class="d-block mb-4 h-100" style="border:none; background-color:none;"  data-toggle="modal" data-target="#exampleModalupdate{{$pic->id}}">
                            <img class="img-fluid img-thumbnail" src="{{$pic->picture}}" alt="">
                            </a>

                            <div class="modal fade" id="exampleModalupdate{{$pic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/home/picture/update" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <img src="{{$pic->picture}}" class="card-img-top">
                                                <label for="picture" class="frame9402-text04" style="margin-top: 30px;">
                                                    <strong>Muat Naik Gambar</strong>
                                                </label>
                                                <input id="picture" type="file" accept="image/*" name="picture" class="form-control" required/>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="pictureId" value="{{$pic->id}}"/>
                                                <input type="hidden" value="{{$gallery->id}}" name="galleryId">
                                                <input type="hidden" value="{{$item->id}}" name="itemId">
                                                <a class="frame9402-rectangle828246" data-toggle="modal" href="#deleteModal{{$pic->id}}" title="Padam"><img src="/SVG/bin.svg"/></a>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal" id="deleteModal{{$pic->id}}" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Padam Gambar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda Pasti Mahu Padam Gambar?</p>

                                                <img src="{{$pic->picture}}" class="card-img-top">
                                            </div>
                                            <div class="modal-footer">
                                                <a href="#" class="btn btn-primary" data-dismiss="modal">Tidak</a>      
                                                <form method="post" action="/home/picture/delete">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="pictureId" value="{{$pic->id}}"/>
                                                <input type="hidden" name="galleryId" value="{{$gallery->id}}"/>
                                                <input type="hidden" value="{{$item->id}}" name="itemId">
                                                <button class="btn btn-danger">Ya</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                @else
                    <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Gambar </h2>
                @endif
            </div>
        </div>
    </div>
  </div>
</div>
<style>
    .modal:nth-of-type(even) {
    z-index: 1052 !important;
}
.modal-backdrop.show:nth-of-type(even) {
    z-index: 1051 !important;
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
</style>
@endsection