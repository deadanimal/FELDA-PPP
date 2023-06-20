@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            BORANG {{$borang->namaBorang}}
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
              <table class="table table-borderless w-100">
                <tr>
                  <td><label for="nama" style="font-family:'Arial'">NAMA <span style="color: red;">*</span></label><br></td>
                  <td style="display:flex;"><input type="text" class="form-control align-middle" style="text-transform: uppercase;margin: auto; border: 2px solid #ced4da;" name="nama" id="nama" readonly oninput="this.value = this.value.toUpperCase()"><br></td>
                </tr>
                <tr>
                  <td><label for="wilayah" style="font-family:'Arial', sans-serif">PERINGKAT <span style="color: red;">*</span></label></td>
                  <td style="display:flex;">
                      <select name="wilayah" id="wilayah" class="form-control" style="border: 2px solid #ced4da;" disabled>
                          <option value="" selected disabled>Pilih Peringkat</option>
                      </select>
                      <br>
                  </td>
                </tr>
                <tr>
                  <td><label for="rancangan" style="font-family:'Arial', sans-serif">RANCANGAN <span style="color: red;">*</span></label><br></td>
                  <td style="display:flex;">
                    <select name="rancangan" id="rancangan" class="form-control" style="border: 2px solid #ced4da;" disabled>
                        <option value="" selected disabled>Pilih Rancangan</option>
                    </select>
                    <br>
                  </td>
                </tr>
                  @foreach($medans as $medan)
                    @if($medan->datatype == "checkbox")
                      <tr>
                        <td  style="width: 25%;"><label for="nama" style="font-family:'Arial', sans-serif; text-transform:uppercase;">{{$medan->nama}}</label></td>
                        <td style="display:flex;">
                          <div style="vertical-align: middle;">
                            @foreach($checkboxes as $checkbox=>$value)
                              @foreach($value as $chkbox)
                                  @if($chkbox->medan_id == $medan->id)
                                      <input type="radio" id="check{{$chkbox->id}}" name="jawapancheck{{$medan->id}}[]" value="{{$chkbox->nama}}" style="border: 2px solid #ced4da;" disabled>
                                      <label for="check{{$chkbox->id}}">{{$chkbox->nama}}</label><br>
                                  @endif
                              @endforeach
                            @endforeach
                          </div>
                          <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                        </td>
                      </tr>
                    @elseif($medan->datatype == "calendar")
                      <tr>
                        <td ><label for="jawapan{{$medan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase">{{$medan->nama}}</label></td>
                        <td style="display:flex;">
                          <input type="date" class="form-control" name="jawapan[]" id="jawapan{{$medan->id}}" style="border: 2px solid #ced4da;" disabled>
                          <br>
                          <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                        </td>
                      </tr>
                    @else
                      <tr>
                        <td >
                          <label for="jawapan{{$medan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase;">
                            {{$medan->nama}}
                            @if ($medan->pilihan == "required")
                                <span style="color: red;">*</span> 
                            @endif
                          </label>
                        </td>
                        <td style="display:flex;">
                          <input style="border: 2px solid #ced4da;" class="form-control" maxlength="{{$medan->max}}" minlength="{{$medan->min}}" name="jawapan[]" id="jawapan{{$medan->id}}" readonly><br>
                          <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                        </td>
                      </tr>
                    @endif
                  @endforeach    
                </tr>
              </table>
            </div>
          </div>
          @foreach($perkaras as $perkara)
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila isikan perkara yang ingin dimohon.</h5>
                    <table class="w-100">
                        <tr>
                            <td style="text-align: center"><h5 class="card-title mb-0">{{$perkara->nama}}</h5></td>
                            <td style="width:5%; text-align: end"><button class="btn btn-primary" type="button" id="rowAdder{{$loop->iteration}}" disabled>Tambah</button></td>
                        </tr>
                    </table>
                </div>
                <div class="card-body">
                    <table class="w-100">
                        <tr>
                            <th style="text-align: center"><h5 class="card-title mb-0">PERKARA PEMOHONAN</h5></th>
                            <th style="text-align: center"><h5 class="card-title mb-0">JUMLAH DI MOHON</h5></th>
                            <th style="text-align: center"><h5 class="card-title mb-0">JUMLAH KOS (RM)</h5></th>
                            <th style="width: 5%;"></th>
                        </tr>
                        <tbody id="borangField{{$loop->iteration}}">
                        </tbody>
                    </table>
                </div>
            </div>
          @endforeach
          
          @if (!$lampirans->isEmpty())
            <div class="card">
              <div class="card-header">
                  <h5 class="card-title mb-0">Lampiran</h5>
              </div>
              <div class="card-body">
                  <table class="w-100">
                      @foreach ($lampirans as $lampiran)
                          <tr>
                              <td style="width: 25%;">{{$lampiran->nama}}</td>
                              <td>
                                  <button type="button" class="btn btn-info" onclick="document.getElementById('getFile{{$lampiran->id}}').click()" disabled>Muat Naik</button>
                                  <input type='file' id="getFile{{$lampiran->id}}" name="lampiran[]" style="display:none">
                                  <input type="hidden" name="lampiranId[]" value="{{$lampiran->id}}">
                              </td>
                          </tr>
                      @endforeach
                  </table>
              </div>
            </div>        
          @endif
          <div class="card">
            <div class="card-body">
              @if ($borang->consent != null || $borang->consent != "")
                <label for="consentForm" class="form-label">
                  <input type="checkbox" id="consentForm" name="const" disabled> 
                  {{$borang->consent}}
                </label><br>
              @endif
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