@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Borang {{$borangJwpns->borangs->namaBorang}}
        </h1>
        <a href="/user/sub_borang/list"  class="frame9403-frame7445" style="margin-left:0px;">
            <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kembali</span></span>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="mb-3">
                          <label for="nama" style="font-family:'Arial', sans-serif; text-transform: uppercase;">NAMA</label>
                          <input class="form-control" name="nama" id="nama" value="{{$borangJwpns->nama}}" readonly style="text-transform: uppercase;">
                      </div>
                  </div>
                  <div class="row">
                    <div class="mb-3">
                        <label for="wilayah" style="font-family:'Arial', sans-serif; text-transform: uppercase;">WILAYAH</label>
                        <input class="form-control" name="wilayah" id="wilayah" value="{{$borangJwpns->wilayahs->nama}}" readonly style="text-transform: uppercase;">
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3">
                        <label for="rancangan" style="font-family:'Arial', sans-serif; text-transform: uppercase;">RANCANGAN</label>
                        <input class="form-control" name="rancangan" id="rancangan" value="{{$borangJwpns->rancangans->nama}}" readonly style="text-transform: uppercase;">
                    </div>
                  </div>
                  @foreach($jawapanMedans as $jwpnMed)
                    <div class="row">
                      <div class="mb-3">
                          <label for="jwpn{{$jwpnMed->id}}" style="font-family:'Arial', sans-serif; text-transform: uppercase;">{{$jwpnMed->medan->nama}}</label>
                          <input class="form-control" name="jwpn[]" id="jwpn{{$jwpnMed->id}}" value="{{$jwpnMed->jawapan}}" readonly style="text-transform: uppercase;">
                      </div>
                    </div>
                  @endforeach
                </div>
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
    font-family: 'Arial', sans-serif;
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