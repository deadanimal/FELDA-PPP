@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        TINDAKAN ADUAN
    </h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h1 style="font-family: 'Arial', sans-serif; font-size:23px;">Aduan</h1>
        </div>
        <div class="card-body">
            <div class="card-title text-center">
                <h1 style="font-family: 'Arial', sans-serif; font-size:23px; text-decoration: underline;">{{$aduan->title}}</h1><br>
                <h1 style="font-family: 'Arial', sans-serif; font-size:23px;">{!! nl2br(e($aduan->nama)) !!}</h1>
                <h1 style="font-family: 'Arial', sans-serif; font-size:23px;">Jenis Aduan: {{$aduan->jenis_aduan}}</h1>
            </div><br>
            @if ($aduan->status == "Belum Selesai")
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">
                        <strong>Status: {{$aduan->status}}</strong>
                    </div>
                </div>
            @elseif ($aduan->status == "Dalam Proses")
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <div class="alert-message">
                        <strong>Status: {{$aduan->status}}</strong>
                    </div>
                </div>
            @elseif ($aduan->status == "Selesai")
                <div class="alert alert-secondary alert-dismissible" role="alert">
                    <div class="alert-message">
                        <strong>Status: {{$aduan->status}}</strong>
                    </div>
                </div>
            @else
            <div class="alert alert-success alert-dismissible" role="alert">
                <div class="alert-message">
                    <strong>Status: {{$aduan->status}}</strong>
                </div>
            </div>
            @endif
            
            <div class="col-md-12 text-center">
                <button type="button" class="btn btn-danger text-center btn-lg" data-toggle="modal" data-target="#exampleModalstatus">Belum Selesai</button>
                {{-- modal Belum Selesai --}}
                <div class="modal fade" id="exampleModalstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Aduan Belum Selesai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Adakah Aduan Belum Selesai?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                            <form action="/Aduan/respon/update" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="aduan_id" value="{{$aduan->id}}">
                                <input type="hidden" name="status" value="Belum Selesai">
                                <button class="btn btn-danger">YA</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary text-center btn-lg" data-toggle="modal" data-target="#exampleModalSelesai">Sah Selesai</button>
                {{-- modal Selesai --}}
                <div class="modal fade" id="exampleModalSelesai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selesai Aduan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Adakah Aduan Sudah Selesai?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                            <form action="/Aduan/respon/update" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="hidden" name="aduan_id" value="{{$aduan->id}}">
                                <input type="hidden" name="status" value="Sah Selesai">
                                <button class="btn btn-danger">YA</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h1 style="font-family: 'Arial', sans-serif; font-size:23px;">Senarai Maklum balas</h1>
        </div>

        {{-- senarai borang --}}
        @if (!$responds->isEmpty())
        <div class="card-body">

            <table class="table table-bordered table-striped w-100 text-center">
                <thead class="text-white bg-primary w-100">
                    <tr>
                        <th scope="col" class="text-center" style="width: 60%">Respon</th>
                        <th scope="col" class="text-center">Pengguna</th>
                    </tr>
                </thead>
            <tbody>
                @foreach ($responds as $response)
                    <tr>
                        <td>
                        @if ($response->Aduan->jenis_respond == "Text")
                            {!!nl2br(e($response->respond))!!}
                        @else
                            <a href="{{$response->respond}}">Papar fail</a>
                        @endif
                        </td>

                        <td>{{$response->user->nama}}</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        @else
          <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Aduan </h2>
        @endif
      </div>
    </div>
  </div>
</div>

<style>
  .arial{
      font-family: 'Arial', sans-serif;
      text-transform: uppercase;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
      font-family: 'Arial', sans-serif;
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
      top: 25%;
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
    .formContainer .btn {
      padding: 12px 20px;
      border: none;
      background-color: #8ebf42;
      color: #fff;
      font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
  
  .frame9402-rectangle828245 {
  width: 32px;
  height: 31px;
  box-sizing: border-box;
  background-color: transparent;
  border: none;
  cursor:pointer;
  background: url("/SVG/pencil.svg")
}

.frame9402-rectangle828246 {
  width: 32px;
  height: 31px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  margin-left: 10px;
  border: none;
  cursor:pointer;
  background: url("/SVG/bin.svg")
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
