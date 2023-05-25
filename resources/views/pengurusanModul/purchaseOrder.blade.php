@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        MEDAN PESANAN PEMBELIAN
    </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>          
          <li class="breadcrumb-item"><a href="/moduls/{{$proses->Projek->modul->id}}/projek">{{$proses->Projek->modul->nama}}</a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$proses->Projek->id}}/proses">{{$proses->Projek->nama}}</a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$proses->Projek->modul->id}}/{{$proses->id}}/borang">{{$proses->nama}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tugasan {{$tugasan->nama}}</a></li>
        </ol>
    </nav>
  </div>
  
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <table style="width: 100%">
              <tr>
                <td><h1 style="font-family: 'Arial', sans-serif; font-size:23px;">Senarai Medan</h1></td>
                <td>
                  <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAddMedan">
                    <div class="frame9403-frame7293">
                    <span class="frame9403-text21"><span>Tambah Medan</span></span>
                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                    </div>
                  </button>
                </td>
              </tr>
            </table>

            <div class="modal fade" id="exampleModalAddMedan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Medan P.O</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form method="post" action="/moduls/medanPO/add">
                        @csrf
                        <div class="modal-body">
                            <label for="nama" class="form-label">Nama Medan</label>
                            <input type="text" class="form-control" name="nama" id="nama" oninput="this.value = this.value.toUpperCase()">
                            
                            <label for="datatype" class="form-label">Jenis Data</label>
                            <select class="form-select" name="datatype" id="datatype">
                                <option value="Text">Text</option>
                                <option value="Number">Number</option>
                                <option value="Date">Date</option>
                            </select>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button> 
                                <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                <button class="btn btn-danger">CIPTA</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
                {{-- senarai Tugasan --}}
            @if (!$medans->isEmpty())
            <table class="table table-bordered table-striped w-100 arial">
              <thead class="text-white bg-primary w-100 arial">
                <tr class="text-center">
                    <th scope="col" class="text-center">Nama Medan</th>
                    <th scope="col" class="text-center">Jenis Data</th>
                    <th scope="col" class="text-center">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($medans as $medan)
                  <tr>
                    <td class="text-center arial" style="width:50%">{{$medan->nama}}</td>
                    <td class="text-center arial" style="text-transform: uppercase;">{{$medan->datatype}}</td>
                    <td class="text-center arial">
                        <button class="btn frame9402-rectangle828246" style="margin-left: 0px;" title="Kemaskini" data-toggle="modal" data-target="#exampleModaledit{{$medan->id}}"><img src="/SVG/pencil.svg" title="kemaskini"/></button>
                          
                        <div class="modal fade" id="exampleModaledit{{$medan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Medan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <form action="/moduls/medanPO/update" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <label for="nama" class="form-label">Nama Medan</label>
                                        <input type="text" class="form-control" name="nama" id="nama" value="{{$medan->nama}}" oninput="this.value = this.value.toUpperCase()">
                                        
                                        <label for="datatype" class="form-label">Jenis Data</label>
                                        <select class="form-select" name="datatype" id="datatype">
                                            <option value="{{$medan->datatype}}" selected>{{$medan->datatype}}</option>
                                            <option value="Date">Date</option>
                                            <option value="Text">Text</option>
                                            <option value="Number">Number</option>
                                        </select>                
                                    </div>
                                    <input type="hidden" value="{{$medan->id}}" name="medanID">
                                    <input type="hidden" value="{{$medan->tugasan->id}}" name="tugasan_id">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button>   
                                        <button class="btn btn-danger">KEMASKINI</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                      
                        <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModaldelete{{$medan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaldelete{{$medan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Padam Medan {{$medan->nama}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda Pasti Mahu Padam Medan {{$medan->nama}}?<p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                        <form method="post" action="/moduls/medanPO/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{$medan->tugasan->id}}" name="tugasan_id">
                                            <input type="hidden" value="{{$medan->id}}" name="medanID">
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
              <h2 class="text-center" style="color:black; padding-bottom: 5%;"> Tiada Medan </h2>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
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
    font-family: 'Arial', sans-serif;
    font-weight: 600;
    font-stretch: normal;
    margin-right: 10px;
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
</style>
@endsection