@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            PENERIMAAN TAWARAN BORANG {{$borang->namaBorang}}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>
              <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/proses">{{$modul->nama}}</a></li>
              <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang">{{$proses->nama}}</a></li>
              <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang/{{$borang->id}}">{{$borang->namaBorang}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">Penerimaan Tawaran</li>
            </ol>
          </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="frame9403-frame7445"  
                    @if ($acceptance->count() >= 2)
                        disabled
                    @endif
                    data-toggle="modal" data-target="#exampleModaladdMedan">
                        <div class="frame9403-frame7293">
                        <span class="frame9403-text21"><span>Tambah Pilihan</span></span>
                        <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>

                      {{-- Modal Tambah Medan --}}
                    <div class="modal fade" id="exampleModaladdMedan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA PILIHAN PENERIMAAN TAWARAN</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/moduls/borang/acceptance/add" method="POST">
                                @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td colspan="2"><textarea name="name" class="form-control frame9402-kotaknama" id="name" cols="30" rows="7"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td class="frame9402-text04"><p class="text-xs-center">Jenis Pilihan</p></td>
                                                <td>
                                                <select name="datatype" class="frame9403-kotaknama3">
                                                    <option value="Terima">Terima</option>
                                                    <option value="Menolak">Menolak</option>
                                                </select>
                                                </td>
                                            </tr>
                                        </table>
                                        <input type="hidden" value="{{$borang->id}}" name="borang_id">        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
                                        <button class="btn btn-primary">TAMBAH</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (!$acceptance->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                        <tr class="text-center">
                            <th scope="col" style="width: 60%;"></th>
                            <th scope="col">Jenis Pilihan</th>
                            <th scope="col" style="width: 20%">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($acceptance as $accept)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">{!!nl2br(e($accept->name))!!}</td>
                                <td class="text-center arial">{{$accept->types}}</td>
                                <td class="text-center arial">
                                    <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModalView{{$accept->id}}" title="Kemaskini"><img src="/SVG/pencil.svg"/></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalView{{$accept->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Kemaskini Penerimaan Tawaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/moduls/borang/acceptance/edit" method="POST">
                                                @csrf
                                                @method('PUT')
                                                    <div class="modal-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td colspan="2"><textarea name="name" class="form-control frame9402-kotaknama" id="name" cols="30" rows="7">{{$accept->name}}</textarea></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="frame9402-text04"><p class="text-xs-center">Jenis Pilihan</p></td>
                                                                <td>
                                                                <select name="datatype" class="frame9403-kotaknama3">
                                                                    <option value="{{$accept->types}}">{{$accept->types}}</option>
                                                                    <option value="Terima">Terima</option>
                                                                    <option value="Menolak">Menolak</option>
                                                                </select>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="hidden" value="{{$accept->id}}" name="accept_id">                                        
                                                    <input type="hidden" value="{{$borang->id}}" name="borang_id">        
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>      
                                                        <button class="btn btn-primary">KEMASKINI</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModaldelete{{$accept->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
        
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModaldelete{{$accept->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Padam Penerimaan Tawaran</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda Pasti Mahu Padam Penerimaan Tawaran Ini?<p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                                    <form method="post" action="/moduls/borang/acceptance/delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" value="{{$accept->id}}" name="accept_id">
                                                        <input type="hidden" value="{{$borang->id}}" name="borang_id">
                                                        <button class="btn btn-danger">YA</button>
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
                        <h1 style="text-align: center;"> Tiada Penerimaan Tawaran </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style>

.frame9402-text04 {
  color: black;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: end;
  font-family: 'Arial', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9403-kotaknama3 {
    top: 0px;
    width: -webkit-fill-available;
    height: 45px;
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
    font-family: 'Arial', sans-serif;
    font-size: 17.3081px;
    text-align: center;  
    text-transform: uppercase;
  }
    .center{
         margin-left: auto;
        margin-right: auto;
    }
    .frame9403-frame7445:disabled {
        opacity: 0.8;
    }
    .frame9403-frame7445 {
    width: 20%;
    display: flex;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25);
    box-sizing: border-box;
    align-items: center;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    padding-bottom: 0px;
    justify-content: center;
    background-color: #A2335D;
    margin-left:auto;
    margin-right: 2% !important; 
    cursor: pointer;
    text-decoration: none;
  }
  .frame9403-frame7445:hover{
    text-decoration: none;

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
    text-decoration: none;
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
    height: auto;
    font-size: 16px;
    align-self: auto;
    text-align: left;
    font-family: 'Arial', sans-serif;
    font-weight: 600;
    line-height: 34.39542007446289px;
    font-stretch: normal;
    margin-right: 2px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-kotaknama {
  width: -webkit-fill-available;
  position: relative;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  margin-right: 0;
  border-radius: 3.461621046066284px;
  margin-bottom: 0;
  font-family: 'Arial', sans-serif;
  font-size: 18px;
  padding-left:10px;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
  background-color: #FFFFFF; 
    text-transform: uppercase; 
}
</style>
@endsection