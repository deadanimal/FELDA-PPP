@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">
        PELAPORAN AKTIVITI <span style="text-transform: uppercase">{{$aktiviti->nama}} </span>
    </h1>
  </div>
  <div class="card" style="width: auto;">
    <div class="card-header">
       <h3>Carian Wilayah / Rancangan</h3>
    </div>
    <div class="card-body" style="width: auto;">
        <form action="/pelaporan/userSearchList/{{$aktiviti->id}}" method="POST" class="formContainer">
            @csrf
            <table class="table table-borderless">
                <tr>
                    <td>
                    <label class="frame9402-text04">
                        <strong>Wilayah / Rancangan</strong>
                    </label>
                    </td>
                    <td>
                    <input type="text" class="frame9402-kotaknamaBorang" placeholder="Carian" name="carian">
                    </td>
                </tr>
            </table>
            <button type="submit" class="frame9403-frame7445">
                <div class="frame9403-frame7293">
                  <span class="frame9403-text21">Cari</span>
                  <img src="/SVG/find.svg" class="frame9403-group7527">
                </div>
            </button>
        </form>
    </div>
  </div>
  <div class="card" style="width: auto;">
    <div class="card-header">
        <h3>SENARAI PENGGUNA</h3>
      </div>
    <div class="card-body" style="width: auto;">
      <div class="row d-flex justify-content-center">
        <table class="table table-bordered table-striped w-100">
          <thead class="text-white bg-primary w-100">
            <tr>
                <th class="text-center">Bil.</th>
                <th class="text-center" scope="col">Nama Pengguna</th>
                <th class="text-center" scope="col">Wilayah</th>
                <th class="text-center" scope="col">Rancangan</th>
                <th class="text-center" scope="col">Tindakan</th>
            </tr>
          </thead>
          @php
              $index = 1;
              $lastName = '';
          @endphp
          <tbody>
            {{-- @dd($jwpnParameter[0]->users->wilayah->nama) --}}
            @foreach ($jwpnParameter as $jwpn)
                @if ($jwpn->users->nama != $lastName)
                    <tr>
                        <td class="text-center arial-N">{{$index}}</td>
                        <td class="text-center arial-N">{{$jwpn->users->nama}}</td>
                        <td class="text-center arial-N">{{$jwpn->users->rancangan_id->nama}}</td>
                        <td class="text-center arial-N">{{$jwpn->users->wilayah_id->nama}}</td>
                        <td class="text-center col-sm-auto w-25">
                            <a href="/pelaporan/report/{{$aktiviti->id}}/{{$jwpn->users->id}}" class="btn btn-info">
                            Lihat
                            </a>
                        </td>
                    </tr>
                @php
                $index++;
                $lastName = $jwpn->users->nama;
                @endphp
                @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<style>
  .arial-N{
      font-family: 'Arial-N', sans-serif;
      font-size: 18px;
      text-transform: uppercase;
  }
  .frame9402-frame9281 {
    display: flex;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    border-color: transparent;
    margin-right: 0;
    border-radius: 0px 0px 0px 0px;
    flex-direction: column;
    background-color: #F1F1F1;
  }
  .frame9402-text {
    color: #781E2A;
    width: 383px;
    height: auto;
    font-size: 80px;
    align-self: auto;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 38px;
    text-decoration: none;
    padding-bottom:15px;
    padding-top:50px;
  }
  .frame9402-text02 {
    color: #781E2A;
    width: 368px;
    height: auto;
    font-size: 25px;
    align-self: auto;
    text-align: center;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    line-height: 12.976823806762695px;
    font-stretch: normal;
    margin-right: 0;
    margin-bottom: 38px;
    text-decoration: none;
  }
  .frame9402-kotaknama {
    width: 399px;
    height: 50px;
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
  }
  .frame9402-rectangle828245 {
    width: 32px;
    height: 30px;
    position: relative;
    box-sizing: border-box;
    border-color: transparent;
    margin-left: 10px;
    text-decoration: none;
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
  .frame9403-frame7445 {
    width: 157px;
    height: 44px;
    display: flex;
    max-width: 157px;
    box-shadow: 0px 2px 3px 0px rgb(0 0 0 / 25%);
    box-sizing: border-box;
    align-items: center;
    align-self: center;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    padding-bottom: 0px;
    justify-content: center;
    background-color: #A2335D;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
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
    width: -webkit-fill-available;
    height: auto;
    font-size: 16px;
    align-self: auto;
    text-align: left;
    font-family: Poppins;
    font-weight: 600;
    line-height: 34.39542007446289px;
    font-stretch: normal;
    margin-right: 2px;
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
    font-family: 'Eina01-SemiBold', sans-serif;
    font-size: 18px;
    padding-left:10px;  
    text-transform: uppercase;
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
  </style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@endsection