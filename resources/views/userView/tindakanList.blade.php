@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            SENARAI PESANAN PEMBELIAN TUGASAN BAGI PROJEK {{$tugasan->Proses->Projek->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut sebelum tarikh yang ditetapkan.</h5>
                </div>
                <div class="card-body">
                    <table class="w-50 center">
                        <tr>
                            <td colspan="2"><h2 class="text-center">{{$tugasan->perkara}}</h2></td>
                        </tr>
                        @if ($tarikh != null)
                            <tr>
                                <td><h2 class="text-right" style="margin-right:3%">Tarikh Sasaran:</h2></td>
                                <td><h2 class="text-left">{{date('d-m-Y', strtotime($tarikh->tarikh_sasaran))}}</h2></td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="card-footer">
                    <button class="frame9403-frame7445" style="margin-right: auto;" data-toggle="modal" data-target="#exampleModalDate" 
                    @if ($tarikh != null)
                        @if (now()->toDateString() > $tarikh->tarikh_sasaran)
                            disabled
                        @endif 
                    @endif
                    >
                        <div class="frame9403-frame7293">
                            <span class="frame9403-text21"><span>Kemaskini Tugasan</span></span>
                            <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>
                    <div class="modal fade" id="exampleModalDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kemaskini Tugasan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="/user/projek/tindakan/date/add" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="reply" class="form-label">Tarikh Sasaran</label>
                                        <input type="date" class="form-control" name="tarikh" min="{{now()->toDateString()}}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button> 
                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                        <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
                                        <button class="btn btn-danger">KEMASKINI</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Senarai Maklum Balas</h5>
                    <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAdd" 
                    @if ($tarikh != null)
                        @if (now()->toDateString() > $tarikh->tarikh_sasaran)
                            disabled
                        @endif 
                    @endif
                    >
                        <div class="frame9403-frame7293">
                            <span class="frame9403-text21"><span>Lakukan Tugasan</span></span>
                            <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>
                    <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Lakukan Tugasan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              @if ($tugasan->jenis_input == "Text")
                                <form method="post" action="/user/projek/tindakan/text/add">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="reply" class="form-label">Maklum Balas</label>
                                        <input type="text" class="form-control" name="reply" id="reply" required oninput="this.value = this.value.toUpperCase()">
                                        
                                        <label for="progress" class="form-label">Kemajuan</label>
                                        <select class="form-select" name="progress" id="progress">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button> 
                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                        <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
                                        <button class="btn btn-danger">KEMASKINI</button>
                                    </div>
                                </form>

                              @elseif ($tugasan->jenis_input == "File")
                                <form method="post" action="/user/projek/tindakan/file/add" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="reply" class="form-label">Maklum Balas</label>
                                        <input type="file" class="form-control" name="reply" required>
                                        <br>
                                        <label for="progress" class="form-label">Kemajuan</label>
                                        <select class="form-select" name="progress" id="progress">
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
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button> 
                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                        <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
                                        <button class="btn btn-danger">KEMASKINI</button>
                                    </div>
                                </form>
                              @endif
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (!$tindakans->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                        <tr class="text-center">
                            <th scope="col" style="width: 50%;">Maklum Balas</th>
                            <th scope="col">Kemajuan</th>
                            <th scope="col">Tarikh Maklum Balas</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tindakans as $tindakan)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">
                                    @if ($tindakan->Tugasan->jenis_input == "Text")
                                        {{$tindakan->input}}
                                    @elseif($tindakan->Tugasan->jenis_input == "File")
                                        <a href="{{$tindakan->file}}">Lihat Fail</a>
                                    @endif
                                </td>
                                <td class="text-center arial">{{$tindakan->progress}}%</td>
                                <td class="text-center arial">{{date('d-m-Y', strtotime($tindakan->created_at))}}</td>
                                <td class="text-center arial">
                                    <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModaldelete{{$tindakan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
        
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModaldelete{{$tindakan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Padam Maklum Balas</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda Pasti Mahu Padam Maklum Balas Ini?<p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                                    <form method="post" action="/user/projek/tindakan/text/delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                                        <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
                                                        <input type="hidden" value="{{$tindakan->id}}" name="tindakanID">
                                                        <button class="btn btn-danger">YA</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                            
                    @else
                        <h1 style="text-align: center;"> Tiada Maklum Balas </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .center{
         margin-left: auto;
        margin-right: auto;
    }
    .frame9403-frame7445:disabled {
      opacity: 0.7;
      cursor: default;
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
    margin-left: auto;
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
  .frame9402-rectangle828246 {
        width: 35px;
        height: 30px;
        padding: 0px;
        margin-top: -5px;
        position: relative;
        box-sizing: border-box;
        background-color: transparent;
        border-color: transparent;
        cursor:pointer;
      }
</style>
@endsection