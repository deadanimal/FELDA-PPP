@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
  <div class="header">
      <h1 class="header-title">
          BORANG {{$borangJwpns->borangs->namaBorang}}
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
        <div class="card-body">
          <table class="table table-borderless w-100">
              <tr>
                  <td ><label for="nama" style="font-family:'Arial'">NAMA <span style="color: red;">*</span></label><br></td>
                  <td style="display:flex;"><input class="form-control" name="nama" id="nama" value="{{$borangJwpns->nama}}" readonly style="text-transform: uppercase;"><br></td>
              </tr>
              <tr>
                  <td ><label for="wilayah" style="font-family:'Arial', sans-serif">PERINGKAT <span style="color: red;">*</span></label></td>
                  <td style="display:flex;"><input class="form-control" name="wilayah" id="wilayah" value="{{$borangJwpns->wilayahs->nama}}" readonly style="text-transform: uppercase;"></td>
              </tr>
              <tr>
                  <td ><label for="rancangan" style="font-family:'Arial', sans-serif">RANCANGAN <span style="color: red;">*</span></label><br></td>
                  <td style="display:flex;"><input class="form-control" name="rancangan" id="rancangan" value="{{$borangJwpns->rancangans->nama}}" readonly style="text-transform: uppercase;"></td>
              </tr>
                  @foreach($jawapanMedans as $jwpnMedan)
                      @if($jwpnMedan->medan->datatype == "checkbox")
                      <tr>
                          <td  style="width: 25%;"><label for="nama" style="font-family:'Arial', sans-serif; text-transform:uppercase;">{{$jwpnMedan->medan->nama}}</label></td>
                          <td style="display:flex;">
                              <div style="vertical-align: middle;">
                                  @foreach($checkboxes as $chkbox)
                                    @if($chkbox->medan_id == $jwpnMedan->medan->id)
                                        <input type="radio" id="check{{$chkbox->id}}" name="jawapancheck{{$jwpnMedan->id}}[]" disabled
                                        @if ($jwpnMedan->jawapan == $chkbox->nama)
                                            checked
                                        @endif
                                        value="{{$chkbox->nama}}" style="border: 2px solid #ced4da;">
                                        <label for="check{{$chkbox->id}}">{{$chkbox->nama}}</label><br>
                                    @endif
                                  @endforeach
                              </div>
                          </td>
                      </tr>
                      @elseif($jwpnMedan->medan->datatype == "calendar")
                          <tr>
                              <td ><label for="jawapan{{$jwpnMedan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase">{{$jwpnMedan->medan->nama}}</label></td>
                              <td style="display:flex;">
                                  <input type="date" class="form-control" value="{{$jwpnMedan->jawapan}}" id="jawapan{{$jwpnMedan->id}}" style="border: 2px solid #ced4da;" readonly>
                                  <br>
                              </td>
                          </tr>
                      @else
                      <tr>
                          <td ><label for="jawapan{{$jwpnMedan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase;">
                                  {{$jwpnMedan->medan->nama}}
                                  @if ($jwpnMedan->medan->pilihan == "required")
                                    <span style="color: red;">*</span> 
                                  @endif
                              </label>
                          </td>
                          <td style="display:flex;">
                              <input style="border: 2px solid #ced4da;" class="form-control" value="{{$jwpnMedan->jawapan}}" id="jawapan{{$jwpnMedan->id}}" readonly><br>
                          </td>
                      </tr>
                  @endif
              @endforeach    
              </tr>
              <tr>
                <td ><label for="rancangan" style="font-family:'Arial', sans-serif">NILAI PERMOHONAN DANA (RM)</label><br></td>
                <td style="display:flex;"><input class="form-control" name="rancangan" id="rancangan" value="{{$borangJwpns->permohonan_dana}}" readonly style="text-transform: uppercase;"></td>
              </tr>
              @if ($borangJwpns->nilai_akhir != Null)
                  <tr>
                      <td><label for="ftotal" style="font-family:'Arial', sans-serif">NILAI DANA TAMBAHAN (RM)</label></td>
                      <td style="display:flex;"><input class="form-control" name="ftotal" value="{{$borangJwpns->tambah_dana}}" readonly style="text-transform: uppercase;"></td>
                  </tr>
                  <tr>
                      <td><label for="ftotal" style="font-family:'Arial', sans-serif">NILAI GERAN AKHIR (RM)</label></td>
                      <td style="display:flex;"><input class="form-control" name="ftotal" value="{{$borangJwpns->nilai_akhir}}" readonly style="text-transform: uppercase;"></td>
                  </tr>
              @endif
          </table>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
            <h5 class="card-title mb-0">Senarai perkara yang dimohon.</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered w-100">
                <tr>
                    <th class="perkara"><h5 class="card-title mb-0">JENIS PERKARA</h5></th>
                    <th class="perkara"><h5 class="card-title mb-0">PERKARA PEMOHONAN</h5></th>
                    <th class="perkara"><h5 class="card-title mb-0">JUMLAH DI MOHON</h5></th>
                    <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS (RM)</h5></th>
                </tr>
                <tbody>
                  @foreach($items as $item)
                  <tr id="row">
                    <td class="perkara">{{$item->Perkara_Pemohonan->nama}}</td>
                    <td class="perkara">{{$item->nama}}</td>
                    <td class="perkara">{{$item->jumlah}}</td>
                    <td class="perkara">{{$item->harga}}</td>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>

      @if (!$lampirans->isEmpty())
        <div class="card">
          <div class="card-header">
              <h5 class="card-title mb-0">Lampiran</h5>
          </div>
          <div class="card-body">
            <table class="table table-bordered w-50">
              <tr>
                <th>Nama Lampiran</th>
                <th>Dimuat Naik</th>
              </tr>
              @foreach ($lampirans as $lmp)
                <tr>
                  <td>{{$lmp->Lampiran->nama}}</td>
                  <td style="width: 25%;">
                      <a href="{{$lmp->file}}">Lihat</a>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>

<style>
  .perkara{
    text-align: center;
    background-color: #FFFFFF !important;
  }
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