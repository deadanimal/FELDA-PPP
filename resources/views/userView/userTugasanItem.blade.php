@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
  <div class="header">
    <a href="/user/projek/tugasan/{{$tindakan->tugasan_id}}/{{$hantarSurat->id}}/list" class="btn frame9403-frame7445" style="margin-left:0px; width:15%;">
      <span class="frame9403-text21">Kembali</span>
    </a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <table class="w-50" style="margin: 0px auto 0px auto">
            <tr>
              <td colspan="2" class="text-center">
                  <h2 class="Arial">{{$tindakan->aktiviti}}</h2>
              </td>
            </tr>
            @if ($hantarSurat->fasa == "PEROLEHAN")
                <tr>
                  <td class="w-50 text-end">
                    <h4 class="Arial" style="margin:0 10% 0 0">TARIKH SASARAN</h4>
                  </td>
                  <td class="text-start">
                    <h4 class="Arial" style="margin:0;">{{$tindakan->tarikh_sasaran}}</h4>
                  </td>
                </tr>
              </table>
              <button type="button" class="btn frame9403-frame7445" data-toggle="modal" data-target="#exampleModalAdd"
              @if (!$kemajuans->isEmpty())
                @if ($kemajuans->last()->progress == "100")
                    disabled
                @endif
              @endif
              >
                <div class="frame9403-frame7293">
                    <span class="frame9403-text21">Kemaskini Kemajuan Aktiviti</span>
                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                </div>
              </button>
            @else
                <tr>
                  <td class="w-50 text-end">
                    <h4 class="Arial" style="margin:0 10% 0 0">Nilai Kontrak:</h4>
                  </td>
                  <td class="text-start">
                    <h4 class="Arial" style="margin:0;">RM {{$tindakan->nilai_kontrak}}</h4>
                  </td>
                </tr>
              </table>
              <button type="button" class="btn frame9403-frame7445" data-toggle="modal" data-target="#exampleModalAdd">
                <div class="frame9403-frame7293">
                    <span class="frame9403-text21">Kemaskini Nilai Tuntutan</span>
                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                </div>
              </button>
            @endif
          <!-- Modal -->
          <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  @if ($hantarSurat->fasa == "PEROLEHAN")
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kemajuan Aktiviti Tugasan</h5>
                  @else
                    <h5 class="modal-title" id="exampleModalLabel">Kemaskini Nilai Tuntutan</h5>
                  @endif
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/user/tugasan/tindakan/progress/add" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                  @if ($hantarSurat->fasa == "PEROLEHAN")
                    <table class="table table-borderless">
                      <tr style="border: none;">
                        <td>
                          <label for="progress" class="form-label"><strong>Kemajuan</strong></label>
                        </td>
                        <td>  
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
                        </td>
                      </tr>
                      <tr style="border: none;"> 
                        <td>
                          <label for="Catatan" class="frame9402-text04">
                            <strong>Catatan</strong>
                          </label>
                        </td>
                        <td>
                          <textarea class="form-control" id="Catatan" placeholder="Catatan Kemajuan" name="catatan" oninput="this.value = this.value.toUpperCase()"></textarea>
                        </td>
                      </tr>
                      <tr style="border: none;">
                        <td>
                          <label class="form-label"><strong>Bukti Kemajuan</strong></label>
                        </td>
                        <td>
                          <input type="file" id="upload" name="upload[]" style="display: none;" multiple>
                          <label for="upload" class="btn btn-success">
                              <i class="align-middle me-2 fas fa-fw fa-file-upload"></i>Muat Naik
                          </label>
                        </td>
                      </tr>
                    </table>
                  @else
                    <table class="table table-borderless">
                      <tr style="border: none;">
                        <td>
                          <label for="progress" class="form-label"><strong>Nilai Dituntut (RM)</strong></label>
                        </td>
                        <td>
                          <input type="number" class="form-control" id="progress" min="1" step="any" name="progress"/>
                        </td>
                      </tr>
                      <tr style="border: none;"> 
                        <td>
                          <label for="Catatan" class="frame9402-text04">
                            <strong>Catatan</strong>
                          </label>
                        </td>
                        <td>
                          <textarea class="form-control" id="Catatan" placeholder="Catatan Kemajuan" name="catatan" oninput="this.value = this.value.toUpperCase()"></textarea>
                        </td>
                      </tr>
                      <tr style="border: none;">
                        <td>
                          <label class="form-label"><strong>Bukti Kemajuan</strong></label>
                        </td>
                        <td>
                          <input type="file" id="upload" name="upload[]" style="display: none;" multiple>
                          <label for="upload" class="btn btn-success">
                              <i class="align-middle me-2 fas fa-fw fa-file-upload"></i>Muat Naik
                          </label>
                        </td>
                      </tr>
                    </table>
                  @endif
                    
                    <input type="hidden" name="tindakan_id" value="{{$tindakan->id}}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>          
        <div class="card-body">
          @if (!$kemajuans->isEmpty())
            @if ($hantarSurat->fasa == "PEROLEHAN")
              <table class="table table-bordered table-striped w-100 Arial">
                <thead class="text-white bg-primary w-100">
                  <tr class="text-center">
                      <th scope="col">Kemajuan</th>
                      <th scope="col">Catatan</th>
                      <th scope="col">Tarikh Kemaskini</th>
                      <th scope="col">Bukti Kemajuan</th>
                      <th scope="col" style="width: 5%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kemajuans as $kemajuan)
                    <tr>
                      <td class="text-center Arial" style="text-transform: uppercase;">{{$kemajuan->progress}}%</td>
                      <td class="text-center Arial">{{$kemajuan->catatan ?? ""}}</td>
                      <td class="text-center Arial">{{date('d-m-Y', strtotime($kemajuan->updated_at))}}</td>
                      <td class="text-center Arial">
                        @if ($kemajuan->bukti != null)
                          @foreach (json_decode($kemajuan->bukti) as $bukti)
                            <a href="{{$bukti}}">Bukti Kemajuan {{$loop->iteration}}</a><br>
                          @endforeach
                        @endif
                        
                      </td>
                      <td>
                        <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModaldelete{{$kemajuan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaldelete{{$kemajuan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padam Kemajuan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Anda Pasti Mahu Padam Kemajuan Ini?<p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                <form method="post" action="/user/tugasan/tindakan/progress/delete">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$kemajuan->id}}" name="kemajuan_id">
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
              <table class="table table-bordered table-striped w-100 Arial">
                <thead class="text-white bg-primary w-100">
                  <tr class="text-center">
                      <th scope="col">Nilai Telah Dituntut (RM)</th>
                      <th scope="col">Baki Nilai Belum Dituntut(RM)</th>
                      <th scope="col">Catatan</th>
                      <th scope="col">Bukti</th>
                      <th scope="col" style="width: 5%"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($kemajuans as $kemajuan)
                    <tr>
                      <td class="text-center Arial" style="text-transform: uppercase;">{{$kemajuan->progress}}</td>
                      <td class="text-center Arial" style="text-transform: uppercase;">{{$tindakan->nilai_kontrak - $kemajuan->progress}}</td>
                      <td class="text-center Arial">{{$kemajuan->catatan ?? ""}}</td>
                      <td class="text-center Arial">
                        @if ($kemajuan->bukti != null)
                          @foreach (json_decode($kemajuan->bukti) as $bukti)
                            <a href="{{$bukti}}">Bukti Kemajuan {{$loop->iteration}}</a><br>
                          @endforeach
                        @endif
                        
                      </td>
                      <td>
                        <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModaldelete{{$kemajuan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaldelete{{$kemajuan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padam Rekod Tuntutan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Anda Pasti Mahu Padam Rekod Tuntutan Ini?<p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                <form method="post" action="/user/tugasan/tindakan/progress/delete">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$kemajuan->id}}" name="kemajuan_id">
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
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
<script src="/js/jquery.js"></script>
<style>
  .Arial{
    font-family: 'Arial', sans-serif;
}
    .frame9403-frame7445 {
    width: 20%;
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
    font-stretch: normal;
    margin-right: 2px;
    margin-bottom: 0;
    text-decoration: none;
    text-align: center;
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
    align-self: flex-end;
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
    margin-bottom: 30px;
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    padding-left:10px;  
    text-transform: uppercase;
  }
</style>
@endsection