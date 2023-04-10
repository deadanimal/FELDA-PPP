@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Borang {{$borangJwpn->borangs->namaBorang}}
        </h1>
        <a href="/user/borang_app/{{$borangJwpn->borangs->id}}/user_list"  class="frame9403-frame7445" style="margin-left:0px;">
            <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kembali</span></span>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="header-title" style="color: var(--bs-body-color)">Nama Permohon: <p style="color: var(--bs-body-color);text-transform:uppercase">{{$borangJwpn->user->nama}}</p></h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="jwpn{{$borangJwpn->id}}" style="font-family:'Arial'; text-transform: uppercase;">NAMA</label>
                            <input class="form-control" name="jwpn{{$borangJwpn->id}}" id="jwpn{{$borangJwpn->id}}" value="{{$borangJwpn->nama}}" readonly style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="jwpn{{$borangJwpn->id}}" style="font-family:'Arial'; text-transform: uppercase;">NO KAD PENGENALAN</label>
                            <input class="form-control" name="jwpn{{$borangJwpn->id}}" id="jwpn{{$borangJwpn->id}}" value="{{$borangJwpn->ic}}" readonly style="text-transform: uppercase;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="wilayah" style="font-family:'Arial'; text-transform: uppercase;">WILAYAH</label>
                            <input class="form-control" name="wilayah" id="wilayah" value="{{$borangJwpn->wilayahs->nama}}" readonly style="text-transform: uppercase;">
                        </div>
                      </div>
                      <div class="row">
                        <div class="mb-3">
                            <label for="rancangan" style="font-family:'Arial'; text-transform: uppercase;">RANCANGAN</label>
                            <input class="form-control" name="rancangan" id="rancangan" value="{{$borangJwpn->rancangans->nama}}" readonly style="text-transform: uppercase;">
                        </div>
                      </div>
                @foreach($jawapanMedan as $jwpnMedan)
                    <div class="row">
                        <div class="mb-3">
                            <label for="jwpn{{$jwpnMedan->id}}" style="font-family:'Arial'; text-transform: uppercase;">{{$jwpnMedan->medan->nama}}</label>
                            <input class="form-control" name="jwpn{{$jwpnMedan->id}}" id="jwpn{{$jwpnMedan->id}}" value="{{$jwpnMedan->jawapan}}" readonly style="text-transform: uppercase;">
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            @if($lulusBorangs->isEmpty())
                <div class="card">
                    <table class="table table-borderless">
                        <th>
                            <h1 class="header-title" style="color: var(--bs-body-color)">Kelulusan</h1>
                        </th>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-success" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModal{{$borangJwpn->id}}">Lulus</button>
                    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$borangJwpn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Lulus Permohonan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Lulus Permohonan {{$borangJwpn->user->nama}}?<p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>      
                                            <form action="/user/borang_app/update" method="post">
                                                @csrf
                                                <input type="hidden" name="tahapLulusID" value="{{$tahapLulus}}">
                                                <input type="hidden" name="jawapanID" value="{{$borangJwpn->id}}">
                                                <input type="hidden" name="borangID" value="{{$borangJwpn->borangs->id}}">
                                                <input type="hidden" name="userID" value="{{$borangJwpn->userid}}">
                                                <input type="hidden" name="status" value="Lulus">
                                                <button class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModaldel{{$borangJwpn->id}}">Tidak Lulus</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModaldel{{$borangJwpn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="/user/borang_app/update">
                                        @csrf
                                        <div class="modal-header">
                                            <p>Anda Pasti Tidak Melulus Permohonan {{$borangJwpn->user->nama}}?<p>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <h5 for="exampleFormControlTextarea1">Ulasan: </h5>
                                                    <textarea type="text" class="form-control" name="ulasan" id="ulasan" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                            <input type="hidden" name="tahapLulusID" value="{{$tahapLulus}}">
                                            <input type="hidden" name="jawapanID" value="{{$borangJwpn->id}}">
                                            <input type="hidden" name="borangID" value="{{$borangJwpn->borangs->id}}">
                                            <input type="hidden" name="userID" value="{{$borangJwpn->userid}}">
                                            <input type="hidden" name="status" value="Gagal">   
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif 
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