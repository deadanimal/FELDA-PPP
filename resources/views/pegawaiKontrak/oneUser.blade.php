@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="/css/bootstrap-multiselect.css">

<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        PERMOHONAN {{$jawapans->nama}}
    </h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <h3 style="text-transform: uppercase;">{{$jawapans->borangs->namaBorang}}</h3>
        </div>
        <div class="card-body">
          <table class="w-100">
            <tr>
              <td>
                <label for="nama" class="frame9402-text04">
                  <strong>Nama</strong>
                </label>
              </td>
              <td><input type="text" class="form-control frame9402-kotaknama" id="nama" value="{{$jawapans->nama}}" readonly></td>                
            </tr>
            <tr> 
              <td>
                <label for="kod_projek" class="frame9402-text04">
                  <strong>Kod Projek</strong>
                </label>
              </td>
              <td><input type="text" class="form-control frame9402-kotaknama" id="kod_projek" value="{{$jawapans->kod_projek}}" readonly></td> 
            </tr>
            <tr> 
              <td>
                <label for="wilayah" class="frame9402-text04">
                  <strong>Wilayah</strong>
                </label>
              </td>
              <td><input type="text" class="form-control frame9402-kotaknama" id="wilayah" value="{{$jawapans->wilayahs->nama}}" readonly></td> 
            </tr>
            <tr> 
              <td>
                <label for="rancangan" class="frame9402-text04">
                  <strong>Rancangan</strong>
                </label>
              </td>
              <td><input type="text" class="form-control frame9402-kotaknama" id="rancangan" value="{{$jawapans->rancangans->nama}}" readonly></td> 
            </tr>
          </table>
        </div>
      </div>
      @if (!$surats->isEmpty())
        <div class="card">
          <div class="card-body">
            <table class="w-100">
              <tr>
                @foreach ($surats as $surat)
                  <td>
                    <form action="/user/borang_app/surat/view" method="get" style="margin-bottom:0px;margin-right:2%;">
                      <input type="hidden" name="jawapan_id" value="{{$jawapans->id}}">
                      <input type="hidden" name="surat_id" value="{{$surat->id}}">
                      
                      <button class="btn frame9403-frame7445" style="max-width:none; margin-right:auto;">
                        <div class="frame9403-frame7293">
                          <span class="frame9403-text21">LIHAT SURAT {{$surat->jenis}}</span>
                        </div>
                      </button>
                    </form>
                  </td>
                @endforeach
              </tr>
            </table>
          </div>
        </div>
      @endif
      <div class="card">
        <div class="card-header">
          @if (!$items->isEmpty())
            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#modalAdd">
                <div class="frame9403-frame7293">
                    <span class="frame9403-text21"><span>Tambah Pengguna</span></span>
                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                </div>
            </button>

            {{-- Modal Pengguna --}}
            <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">PILIH PENGGUNA YANG DITUGASKAN</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/user/tugasan/send/create" method="POST">
                      @csrf
                      <div class="modal-body">
                        <table class="table table-borderless w-100">
                          <tr>
                            <td>
                              <span style="text-align:right;margin-right:2%;">Kategori Pengguna</span>
                            </td>
                            <td>
                              <select name="category" class="form-select frame9402-kotaknama">
                                @foreach($kategoriPenggunas as $kategoriPengguna)
                                  <option value="{{$kategoriPengguna->id}}">{{$kategoriPengguna->nama}}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="text-align:right;margin-right:2%;">Jenis Fasa</span>
                            </td>
                            <td>
                              <select name="fasa" class="form-select frame9402-kotaknama">
                                @foreach($jenis_fasas as $jenis_fasa)
                                  <option value="{{$jenis_fasa->fasa}}">{{$jenis_fasa->fasa}}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="text-align:right;margin-right:2%;">Peratus Muat Naik Borang Pesanan (PO)</span>
                            </td>
                            <td>
                              <select name="PO_percent" class="form-select frame9402-kotaknama">
                                  <option value="" default>Pilih Peratus</option>
                                  <option value="10">10%</option>
                                  <option value="20">20%</option>
                                  <option value="30">30%</option>
                                  <option value="40">40%</option>
                                  <option value="50">50%</option>
                                  <option value="60">60%</option>
                                  <option value="70">70%</option>
                                  <option value="80">80%</option>
                                  <option value="90">90%</option>
                                  <option value="100">100%</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <span style="text-align:right;margin-right:2%;">Salinan Karbon</span>
                            </td>
                            <td>
                              <select name="cc[]" id="cc" multiple="multiple">
                                @foreach($kategoriPenggunas as $kategoriPengguna)
                                  <option value="{{$kategoriPengguna->id}}">{{$kategoriPengguna->nama}}</option>
                                @endforeach
                              </select>
                            </td>
                          </tr>
                          <tr style="border:none; height:10%">
                            <td colspan="2" style="border:none">
                              <br>
                              <span style="text-align:right;margin-right:2%;">Perkara Yang Ingin Dihantar</span>
                            </td>
                          </tr>
                          <tr style="border:none">
                            <td colspan="2" style="border:none">
                              @if (!$items->isEmpty())
                                <table class="table table-bordered w-100">
                                  <tr class="text-white bg-primary text-center">
                                    <th></th>
                                    <th class="text-start">Perkara Pemohonan</th>
                                    <th>Jumlah dimohon</th>
                                    <th>Harga (RM)</th>
                                  </tr>
                                  @foreach($items as $item)
                                    <tr class="text-center">
                                      <td>
                                        <input type="checkbox" name="perkara[]" value="{{$item->id}}">
                                      </td>
                                      <td class="text-start">{{$item->nama}}</td>
                                      <td>
                                        @if ($item->jumlah_akhir != null)
                                          {{$item->jumlah_akhir}}
                                        @else
                                          {{$item->jumlah}}
                                        @endif
                                      </td>
                                      <td>
                                        @if ($item->harga_akhir != null)
                                          {{$item->harga_akhir}}
                                        @else
                                          {{$item->harga}}
                                        @endif
                                      </td>
                                    </tr>
                                  @endforeach
                                </table> 
                              @endif
                            </td> 
                          </tr>
                        </table>
                      </div>
                      <div class="modal-footer">
                          <input type="hidden" name="jawapan_id" value="{{$jawapans->id}}">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                          <button class="btn btn-primary">Cipta</button>
                      </div>
                    </form> 
                </div>  
              </div>
            </div>
          @endif
        </div>
        <table class="table table-bordered w-100">
          <thead class="text-white bg-primary w-100">
            <tr class="text-center">
              <th class="align-middle">Jenis Fasa</th>
              <th class="align-middle" style="width:15%">Peratus Muat Naik 
                <br>Borang Pesanan (PO)
              </th>
              <th class="align-middle">Kategori Pengguna</th>
              <th class="align-middle">Perkara Permohonan</th>
              <th class="align-middle">Status</th>
              <th class="align-middle">Tindakan</th>
            </tr>
          </thead>
          <tbody>
            @if (!$sendSurats->isEmpty())
              @foreach ($sendSurats as $send)
                <tr>
                  <td class="text-center">{{$send->fasa}}</td>
                  <td class="text-center">
                    @if ($send->PO_percent != null)
                      {{$send->PO_percent}}%
                    @endif
                  </td>
                  <td class="text-center">{{$send->KategoriPengguna->nama}}</td>
                  <td>
                    <ul style="margin-bottom: 0px;">
                      @foreach (json_decode($send->items) as $perkara)
                        @foreach($items as $item)
                          @if ($perkara == $item->id)
                            <li>{{$item->nama}}</li>
                          @endif
                        @endforeach
                      @endforeach
                    </ul>
                  </td>
                  <td class="text-center">{{$send->status}}</td>
                  <td class="text-center">
                    <a href="/user/tugasan/surat/{{$send->id}}/edit" style="padding-left:1.5%;" title="Kemaskini Surat"><i class="align-middle me-2 fas fa-fw fa-envelope" style="color: #CD352A; font-size:2em;"></i></a>
                    
                    <button type="button" class="frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModalSend{{$send->id}}" title="Hantar Tugasan"><i class="align-middle me-2 fas fa-fw fa-paper-plane" style="color: #CD352A; font-size:1.5em;"></i></button>
                    
                    {{-- modal Hantar surat serta item --}}                   
                    <div class="modal fade" id="exampleModalSend{{$send->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Hantar Surat Serta Barang Permohonan Ini</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <p>Anda pasti mahu hantar surat serta barang permohonan ini?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                              <form method="post" action="/user/tugasan/send/update">
                                @csrf
                                @method('put')                                        
                                <input type="hidden" name="send_id" value="{{$send->id}}">
                                <button class="btn btn-danger">YA</button>
                              </form>
                            </div>
                          </div>
                      </div>
                    </div>
                    
                    <button type="button" class="frame9402-rectangle828246" style="margin-left: 10px; margin-top: -5px;" data-toggle="modal" data-target="#exampleModal{{$send->id}}" title="Padam"><img src="/SVG/bin.svg"></button>
                          
                    {{-- modal delete --}}                   
                    <div class="modal fade" id="exampleModal{{$send->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padam Tugasan Ini</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <p>Anda Pasti Mahu Padam Tugasan ini?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                              <form method="post" action="/user/tugasan/send/delete">
                                @csrf
                                @method('delete')                                        
                                <input type="hidden" name="send_id" value="{{$send->id}}">
                                <button class="btn btn-danger">YA</button>
                              </form>
                            </div>
                          </div>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('#perkara').multiselect({
    buttonWidth:'100%',
    selectAllText:' Pilih Semua',
    nonSelectedText: 'Tiada Pilihan',
    nSelectedText: 'Dipilih',
    allSelectedText: 'Semua Dipilih',
    includeSelectAllOption: true
  });
  $('#cc').multiselect({
    buttonWidth:'100%',
    selectAllText:' Pilih Semua',
    nonSelectedText: 'Tiada Pilihan',
    nSelectedText: 'Dipilih',
    allSelectedText: 'Semua Dipilih',
    includeSelectAllOption: true
  });
});
</script>
<style>
  .frame9402-rectangle828246 {
    width: 35px;
    height: 30px;
    padding: 0px;
    position: relative;
    box-sizing: border-box;
    background-color: transparent;
    border-color: transparent;
  }
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
    width: -webkit-fill-available;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    margin-right: 0;
    border-radius: 3.461621046066284px;
    margin-bottom: 1%;
    margin-top: 1%;
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    padding-left:10px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
    background-color: #FFFFFF;  
    text-transform: uppercase;
  }
  .frame9403-frame7445:disabled {
    opacity: 0.5;
    cursor: default;
  }
  .frame9403-frame7445 {
      width: auto;
    height: 50px;
    display: flex;
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
    display: inline;
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
  margin: auto 0px;
  box-sizing: border-box;
  background-color: transparent;
  border: none;
  cursor:pointer;
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
