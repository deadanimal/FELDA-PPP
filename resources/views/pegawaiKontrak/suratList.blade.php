@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            SENARAI SURAT BAGI BORANG {{$borang->namaBorang}}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/moduls">MODUL</a></li>
                <li class="breadcrumb-item"><a href="/moduls/{{$borang->proses->Projek->modul_id}}/proses">{{$borang->proses->Projek->modul->nama}}</a></li>
                <li class="breadcrumb-item"><a href="/moduls/{{$borang->proses->Projek->modul_id}}/{{$borang->proses->id}}/borang">{{$borang->proses->nama}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">SENARAI SURAT</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <table style="width: 100%">
                    <tr>
                      <td></td>
                      <td>
                        <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAddTugasan" 
                        @if (count($surats) >= 3)
                            disabled
                        @endif>
                          <div class="frame9403-frame7293">
                          <span class="frame9403-text21"><span>Cipta Surat</span></span>
                          <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                          </div>
                        </button>
                      </td>
                    </tr>
                  </table>
                </div>
        
                {{-- ModalTambah Surat --}}
                <div class="modal fade" id="exampleModalAddTugasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="min-width: fit-content;">
                      <div class="modal-header">
                        <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA SURAT</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="/modul/borang_app/surat/add" method="POST">
                        @csrf
                        <div class="modal-body">
                          <table style="width: 100%">
                            <tr>
                              <td>
                                <label for="perkara" class="frame9402-text04">
                                  <strong>Jenis Surat</strong>
                                </label>
                              </td>
                              <td>
                                <input type="text" class="frame9402-kotaknamaBorang" placeholder="Jenis Surat" name="jenis" required oninput="this.value = this.value.toUpperCase()">
                              </td>
                            </tr>
                          </table>
                        </div>
                        <input type="hidden" value="{{$borang->id}}" name="borang_id">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Cipta</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    {{-- senarai Surat --}}
                    @if (!$surats->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                    <thead class="text-white bg-primary w-100 arial">
                        <tr class="text-center">
                            <th scope="col" class="text-center">Jenis Surat</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($surats as $surat)
                        <tr>
                            <td class="text-center arial" style="width:50%">{{$surat->jenis}}</td>
                            <td class="text-center arial" style="display: flex; justify-content: center;">
                                <form action="/modul/borang_app/surat/{{$surat->id}}/template" method="get">
                                    <input type="hidden" name="borang_id" value="{{$borang->id}}">
                                    <button class=" btn frame9402-rectangle828246" style="margin-left: 0px;" title="Kemaskini"><img src="/SVG/pencil.svg" title="kemaskini"/></button>
                                </form>

                                <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModaltugas{{$surat->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
                
                                <!-- Modal delete-->
                                <div class="modal fade" id="exampleModaltugas{{$surat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Padam Surat {{$surat->jenis}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Padam Surat {{$surat->jenis}}?<p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                            <form method="post" action="/moduls/borang/tugasan/delete">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" value="{{$surat->id}}" name="surat_id">
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
                    <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Surat </h2>
                    @endif
                </div>
              </div>
        </div>
    </div>
</div>
<style>

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
    .frame9402-text04 {
    color: black;
    height: auto;
    font-size: 17px;
    align-self: auto;
    text-align: left;
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
    font-weight: 400;
    line-height: normal;
    font-stretch: normal;
    margin-right: 17px;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-kotaknamaBorang {
    width: -webkit-fill-available;
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
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    padding-left:10px;  
    text-transform: uppercase;
  }
  .frame9403-frame7445:disabled {
    opacity: 0.5;
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
  .frame9402-rectangle828246 {
    width: 35px;
    height: 30px;
    padding: 0px;
    position: relative;
    box-sizing: border-box;
    background-color: transparent;
    border-color: transparent;
    cursor:pointer;
  }
</style>
@endsection