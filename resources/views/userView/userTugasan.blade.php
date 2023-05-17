@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            TUGASAN BAGI {{Auth::user()->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="tab">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a 
                  @if (Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                    class="nav-link active"
                  @else
                    class="nav-link" 
                  @endif
                  
                  data-bs-toggle="tab" href="#tab-4" style="height: 100%;">
                    <span class="arial-N" style="display: flex;">TUGASAN
                      @if ($tugasans_noti != 0)
                          <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin:0 2%;">
                            {{$tugasans_noti}}
                          </div>
                        @endif
                    </span>
                  </a>
                </li>
                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a 
                  @if (Request::is('user/tugasan/aduan/*'))
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

                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a 
                  @if (Request::is('user/tugasan/petiMasuk/*'))
                    class="nav-link active"
                  @else
                    class="nav-link" 
                  @endif
                  
                  data-bs-toggle="tab" href="#tab-6" style="height: 100%;">
                      <span class="arial-N" style="display: flex;white-space: nowrap;">Peti Masuk
                        @if ($borangs_noti != 0)
                          <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                            {{$borangs_noti}}
                          </div>
                        @endif
                      </span>
                  </a>   
                </li>

                <li class="nav-item" style="background-color: rgb(210 210 210);">
                  <a 
                  @if (Request::is('user/projek/*'))
                    class="nav-link active"
                  @else
                    class="nav-link" 
                  @endif
                  
                  data-bs-toggle="tab" href="#tab-7" style="height: 100%;">
                      <span class="arial-N" style="display: flex;white-space: nowrap;">Tugasan Projek
                        {{-- @if ($borangs_noti != 0)
                          <div class="alert alert-danger" role="alert" style="padding: 0 5%;margin-left:2%;">
                            {{$borangs_noti}}
                          </div>
                        @endif --}}
                      </span>
                  </a>   
                </li>
              </ul>
              
              <div class="tab-content">
                <div 
                  @if (Request::is('user/projek/') || Request::is('user/projek/*'))
                    class="tab-pane fade active show" 
                  @else
                    class="tab-pane fade" 
                  @endif
                  id="tab-7" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Senarai projek yang perlu dikemaskini.</h5>
                  </div>
                  <div class="card-body">
                      @if (!$hantarSurats->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                          <thead class="text-white bg-primary w-100">
                            <tr class="text-center">
                                <th scope="col">Nama Peserta</th>                                
                                <th scope="col">Nama Projek</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($hantarSurats as $hantarSurat)
                              <tr>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$hantarSurat->jawapan->nama}}</td>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$hantarSurat->jawapan->borangs->namaBorang}}</td>
                                  <td class="text-center arial">
                                    <a class="btn btn-success" href="/user/projek/{{$hantarSurat->jawapan_id}}/list" style="color: white; text-decoration:none;">
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
                  @if (Request::is('user/tugasan') || Request::is('user/tugasan/*'))
                    class="tab-pane fade active show" 
                  @else
                    class="tab-pane fade" 
                  @endif
                  id="tab-4" role="tabpanel">
                  <div class="card-header">
                      <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut sebelum tarikh yang ditetapkan.</h5>
                  </div>
                  <div class="card-body">
                      @if (!$tugasans->isEmpty())
                      <table class="table table-bordered table-striped w-100 arial">
                          <thead class="text-white bg-primary w-100">
                            <tr class="text-center">
                                <th scope="col">Nama Tugasan</th>
                                <th scope="col">Tarikh</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($tugasans as $tugasan)
                              <tr>
                                  <td class="text-center arial" style="text-transform: uppercase;">{{$tugasan->nama}}</td>
                                  {{-- <td class="text-center arial" style="text-transform: uppercase;">{{$tugasan->borang}}</td> --}}
                                  <td class="text-center arial">{{$tugasan->due_date}}</td>
                                  <td class="text-center arial">
                                      <a class="btn btn-success" href="/user/tugasan/{{$tugasan->id}}/item_list" style="color: white; text-decoration:none;">
                                      Semak Tugasan
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
                  @if (Request::is('user/tugasan/aduan/*'))
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
            </div>
        </div>
    </div>
</div>

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