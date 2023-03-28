@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            Borang {{$borang->namaBorang}}
        </h1>
        <a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang/{{$borang->id}}"  class="frame9403-frame7445" style="margin-left:0px;">
            <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kembali</span></span>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title mb-0">Sila isikan maklumat anda berikut dengan betul.</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="mb-3">
                    <label for="nama" style="font-family:'Poppins'">NAMA</label>
                    <input type="text" class="form-control" maxlength="100" size="100" name="" id="nama" readonly>
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                    <label for="nama" style="font-family:'Poppins'">NO KAD PENGENALAN</label>
                    <input type="text" class="form-control" maxlength="100" size="100" name="" id="nama" readonly>
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                    <label for="wilayah" style="font-family:'Poppins'; text-transform: uppercase;">WILAYAH</label>
                    <input class="form-control" name="wilayah" id="wilayah" readonly>
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                    <label for="rancangan" style="font-family:'Poppins'; text-transform: uppercase;">RANCANGAN</label>
                    <input class="form-control" name="rancangan" id="rancangan" readonly>
                </div>
              </div>

              @foreach($medans as $medan)
              <div class="row">
                  <div class="mb-3">
                      <label for="nama" style="font-family:'Poppins'; text-transform:uppercase;">{{$medan->nama}}</label>
                      <input type="text" class="form-control" maxlength="100" size="100" name="" id="nama" readonly>
                  </div>
              </div>
              @endforeach

              <button type="submit" class="frame9403-frame7445" disabled>
                  <div class="frame9403-frame7293">
                    <span class="frame9403-text21"><span>Hantar</span></span>
                    <img
                    src="/SVG/kemaskini.svg"
                    class="frame9403-group7527"
                    />
                  </div>
              </button>
            </div>
        </div>
    </div>
</div>

<style>
    .frame9403-frame7445 {
    width: 125px;
    height: 44px;
    display: flex;
    max-width: 157px;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
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
    margin-right: 0px;
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
    font-family: 'Poppins', sans-serif;
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
</style>
@endsection