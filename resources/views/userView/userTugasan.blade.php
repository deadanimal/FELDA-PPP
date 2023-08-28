@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            NOTIFIKASI
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab">
              <ul class="nav nav-tabs" role="tablist">
                
                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a 
                  @if (Request::is('user/tugasan/aduan/*')|| Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                    class="nav-link active"
                  @else
                    class="nav-link" 
                  @endif
                  
                  data-bs-toggle="tab" href="#tab-5" style="height: 100%;">
                      <span class="arial-N" style="display: flex;">ADUAN 
                        @if ($aduans_noti != 0)
                          <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                            {{$aduans_noti}}
                          </div>
                        @endif
                      </span>
                  </a>   
                </li>

                @if (Str::contains(Auth::user()->kategori->nama, 'PEGAWAI KONTRAK'))
                  <li class="nav-item" style="background-color: rgb(210 210 210);">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-6" style="height: 100%;">
                        <span class="arial-N" style="display: flex;white-space: nowrap;">PETI MASUK (Pegawai Kontrak)
                          @if ($borangs_noti != 0)
                            <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                              {{$borangs_noti}}
                            </div>
                          @endif
                        </span>
                    </a>   
                  </li>
                @else
                  <li class="nav-item" style="background-color: rgb(210 210 210);">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-10" style="height: 100%;">
                        <span class="arial-N" style="display: flex;white-space: nowrap;">PETI MASUK
                          @if ($borangs_noti != 0)
                            <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                              {{$borangs_noti}}
                            </div>
                          @endif
                        </span>
                    </a>   
                  </li>
                @endif

                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a class="nav-link" data-bs-toggle="tab" href="#tab-7" style="height: 100%;">
                      <span class="arial-N" style="display: flex;white-space: nowrap;">TUGASAN
                        {{-- @if ($borangs_noti != 0)
                          <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                            {{$borangs_noti}}
                          </div>
                        @endif --}}
                      </span>
                  </a>   
                </li>

                @if (Str::contains(Auth::user()->kategori->nama, 'Pengurus Rancangan') || Str::contains(Auth::user()->kategori->nama, 'PENGURUS RANCANGAN'))
                  <li class="nav-item" style="background-color: rgb(210 210 210);">
                    <a 
                    @if (Request::is('user/pengurus/*'))
                      class="nav-link active"
                    @else
                      class="nav-link" 
                    @endif
                    
                    data-bs-toggle="tab" href="#tab-8" style="height: 100%;">
                        <span class="arial-N" style="display: flex;white-space: nowrap;">PENGURUS RANCANGAN
                          {{-- @if ($borangs_noti != 0)
                            <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                              {{$borangs_noti}}
                            </div>
                          @endif --}}
                        </span>
                    </a>   
                  </li>
                @endif
                

                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a 
                  {{-- @if (Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                    class="nav-link active"
                  @else --}}
                    class="nav-link" 
                  {{-- @endif --}}
                  
                  data-bs-toggle="tab" href="#tab-4" style="height: 100%;">
                    <span class="arial-N" style="display: flex;">KELULUSAN BORANG
                      @if ($tugasans_noti != 0)
                          <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin:0 2%;">
                            {{$tugasans_noti}}
                          </div>
                        @endif
                    </span>
                  </a>
                </li>
              </ul>
              
              <div class="tab-content">
                <div 
                  @if (Request::is('user/pengurus') || Request::is('user/pengurus/*'))
                    class="tab-pane fade active show" 
                  @else
                    class="tab-pane fade" 
                  @endif
                  id="tab-8" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Senarai pengguna yang perlu pengesahan penerimaan bekalan.</h5>
                  </div>
                  <div class="card-body">
                      @if (!$jawapan_rancangan->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                          <thead class="text-white bg-primary w-100">
                            <tr class="text-center">
                                <th scope="col">Nama Peserta</th>                                
                                <th scope="col">Nama Projek</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($jawapan_rancangan as $jawapan)
                              <tr>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$jawapan->nama}}</td>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$jawapan->borangs->namaBorang}}</td>
                                  <td class="text-center arial">
                                    <a class="btn btn-success" href="/user/pengurus/item/{{$jawapan->id}}/list" style="color: white; text-decoration:none;">
                                      Lihat Selanjutnya
                                    </a>
                                  </td>
                              </tr>
                              @endforeach 
                          </tbody>
                        </table>
                        
                                      
                      @else
                          <h1 style="text-align: center;"> Tiada pengesahan penerimaan bekalan </h1>
                      @endif
                  </div>
                </div>
                <div class="tab-pane fade" id="tab-7" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Senarai projek yang perlu dikemaskini.</h5>
                  </div>
                  <div class="card-body">
                      @if (!$hantarSurats->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                          <thead class="text-white bg-primary w-100">
                            <tr class="text-center">
                                <th scope="col">Nama Peserta</th>                                
                                <th scope="col">Jenis Projek</th>
                                <th scope="col">Fasa</th>
                                <th scope="col" style="width:5%;">Surat</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($hantarSurats as $hantarSurat)
                              <tr>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$hantarSurat->jawapan->nama}}</td>
                                  <td class="text-center arial" style="text-transform: uppercase;">
                                    @if (!$hantarSurat->jawapan->jawapanMedan->isEmpty())
                                      @foreach($hantarSurat->jawapan->jawapanMedan as $medan)
                                        {{$medan->jawapan ?? ""}}
                                      @endforeach
                                    @endif
                                  </td>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$hantarSurat->fasa}}</td>
                                  <td class="text-center">
                                    <a class="btn btn-info" href="/user/petiMasuk/{{$hantarSurat->surat_id}}/{{$hantarSurat->jawapan_id}}/view"><i class="align-middle me-2 fas fa-fw fa-envelope" style="color:white; margin:0px !important; font-size:1.5em"></i></a>
                                  </td>
                                  <td class="text-center arial">
                                    <a class="btn btn-success" href="/user/projek/{{$hantarSurat->id}}/list" style="color: white; text-decoration:none;">
                                      Lihat Tugasan
                                    </a>
                                  </td>
                              </tr>
                              @endforeach 
                          </tbody>
                        </table>
                        
                                      
                      @else
                          <h1 style="text-align: center;"> Tiada Tugasan </h1>
                      @endif
                  </div>
                </div>

                <div 
                  @if (Request::is('user/borang_app') || Request::is('user/borang_app/*'))
                      class="tab-pane fade active show" 
                  @else 
                    class="tab-pane fade" 
                  @endif
                  id="tab-4" role="tabpanel">
                  <div class="card-header">
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Carian..">           
                  </div>
                  <div class="card-body">
                    @if (!$borangKelulusan->isEmpty())
                      {{-- senarai borang --}}
                      <table class="table table-bordered table-striped w-100 Arial" id="borangTable">
                        <thead class="text-white bg-primary w-100" style="text-align: center;">
                          <tr>
                              <th scope="col" class="Arial">Nama Borang</th>
                              <th scope="col" class="Arial">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($borangKelulusan as $borangK)
                              <tr>
                                  <td class="text-center Arial">{{$borangK->namaBorang}}</td>
                                  <td class="text-center Arial">
                                      <a class="btn btn-success" href="/user/borang_app/{{$borangK->id}}/user_list" style="color: white; text-decoration:none;">
                                          Senarai Pemohon
                                      </a>
                                  </td>
                              </tr> 
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Borang Perlu Diluluskan </h2>
                    @endif
                  </div>
                </div>
                <div 
                  @if (Request::is('user/tugasan/aduan/*')|| Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                    class="tab-pane fade active show" 
                  @else
                    class="tab-pane" 
                  @endif
                  id="tab-5" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut</h5>
                  </div>
                  <div class="card-body">
                      @if (!$aduans->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                          <thead class="text-white bg-primary w-100">
                            <tr class="text-center">
                                <th scope="col">Aduan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($aduans as $aduan)
                              <tr>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$aduan->nama}}</td>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$aduan->status}}</td>
                                  <td class="text-center arial">
                                    <a class="btn btn-success" href="/user/tugasan/aduan/{{$aduan->id}}/list" style="color: white; text-decoration:none;">
                                      Semak Tugasan
                                      </a>
                                  </td>
                              </tr>
                              @endforeach 
                          </tbody>
                        </table>
                        
                                      
                      @else
                          <h1 style="text-align: center;"> Tiada Aduan </h1>
                      @endif
                  </div>
                </div>

                <div 
                  @if (Request::is('user/tugasan/petiMasuk/*'))
                    class="tab-pane fade active show" 
                  @else
                    class="tab-pane" 
                  @endif
                  id="tab-6" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Senarai Borang</h5>
                  </div>
                  <div class="card-body">
                      @if (!$borangs->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                          <thead class="text-white bg-primary w-100">
                            <tr class="text-center">
                                <th scope="col">Nama Borang</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($borangs as $borang)
                              <tr>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$borang->namaBorang}}</td>
                                  <td class="text-center arial">
                                    <a class="btn btn-success" href="/user/tugasan/petiMasuk/{{$borang->id}}/list" style="color: white; text-decoration:none;">
                                      Senarai Peneroka
                                    </a>
                                  </td>
                              </tr>
                              @endforeach 
                          </tbody>
                        </table>
                        
                                      
                      @else
                          <h1 style="text-align: center;"> Tiada Borang </h1>
                      @endif
                  </div>
                </div>

                <div class="tab-pane fade" id="tab-10" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Senarai Surat Peserta.</h5>
                  </div>
                  @if (Str::contains(Auth::user()->kategori->nama, 'Peserta'))
                    @if (!$borangs->isEmpty())
                    {{-- senarai borang --}}
                    <table class="table table-bordered table-striped w-100">
                      <thead class="text-white bg-primary w-100" style="text-align: center;">
                        <tr>
                            <th scope="col" class="arial">Nama Borang</th>
                            <th scope="col" class="arial">Status</th>
                            <th scope="col" class="arial">Ulasan</th>
                            <th scope="col" class="arial">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($borangs as $borangJwpn)
                          <tr>
                            <td class="text-center arial">{{$borangJwpn->borangs->namaBorang}}</td>
                            @if ($borangJwpn->status != null || $borangJwpn->status == "Lulus"|| $borangJwpn->status == "Menolak")
                              <td class="text-center arial">{{$borangJwpn->status}}</td>
                              <td class="text-center arial"></td>    
                            @else
                              <td class="text-center arial">Sedang di Proses</td>
                              <td class="text-center arial"></td>
                            @endif
                            <td class="text-center arial">
                                @if ($borangJwpn->status == "Lulus")
                                    <a href="/user/sub_borang/{{$borangJwpn->id}}/tindakan" type="button" class="btn btn-success">Tindakan</a>
                                @else
                                    <a class="btn btn-info" href="/user/sub_borang/{{$borangJwpn->id}}/view" style="color: white; text-decoration:none;">
                                        Papar Borang Permohon
                                    </a>
                                @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @else
                    <h1 style="text-align: center; padding-bottom:5%;">Tiada Permohonan</h1>
                    @endif
                  @else
                        @if (!$surats->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                          <tr class="text-center">
                            <th scope="col">Nama Peserta</th>                                
                            <th scope="col">Jenis Projek</th>
                            <th scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($surats as $surat)
                            <tr>
                              <td class="text-center arial" style="text-transform: uppercase;">{{$surat->jawapan->nama}}</td>
                              <td class="text-center arial" style="text-transform: uppercase;">
                                @if (!$surat->jawapan->jawapanMedan->isEmpty())
                                  @foreach($surat->jawapan->jawapanMedan as $medan)
                                    {{$medan->jawapan ?? ""}}
                                  @endforeach
                                @endif
                              </td>
                              <td class="text-center arial">
                                <a class="btn btn-success" href="/user/petiMasuk/{{$surat->surat_id}}/{{$surat->jawapan_id}}/view" style="color: white; text-decoration:none;">
                                  Lihat Surat
                                </a>
                              </td>
                            </tr>
                          @endforeach 
                        </tbody>
                      </table>
                    @else
                      <h1 style="text-align: center;"> Tiada Tugasan </h1>
                    @endif
                  @endif
                  
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("borangTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<style>
  .arial{
    font-family: 'Arial', sans-serif;
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
    margin-top: 1%;
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