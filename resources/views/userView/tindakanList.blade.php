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
                    <h2 class="title text-center">{{$tugasan->perkara}}</h2>
                    <table class="w-100 center">
                        <tr>
                            <td><h5 class="card-title mb-0">Senarai Aktiviti</h5></td>
                            <td>
                                <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAdd">
                                    <div class="frame9403-frame7293">
                                        <span class="frame9403-text21"><span>Tambah Aktiviti</span></span>
                                        <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                    </div>
                                </button>
                            </td>
                        </tr>
                    </table>

                    <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Tambah Aktiviti</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                            <form method="post" action="/user/projek/tindakan/aktiviti/add">
                                @csrf
                                <div class="modal-body">
                                    <label for="aktiviti" class="form-label">Aktiviti Tugasan</label>
                                    <input type="text" class="form-control" name="aktiviti" id="aktiviti" required oninput="this.value = this.value.toUpperCase()">
                                    <br>
                                    <label for="wajaran" class="form-label">Wajaran</label>
                                    <input type="number" class="form-control" name="wajaran" id="wajaran" required>
                                    <br>
                                    <label for="tarikh_sasaran" class="form-label">Tarikh Sasaran</label>
                                    <input type="date" class="form-control" name="tarikh_sasaran" id="tarikh_sasaran" min="{{date('Y-m-d')}}" required>                                   
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button> 
                                    <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                    <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
                                    <button class="btn btn-danger">TAMBAH</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if (!$tindakans->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                        <tr class="text-center">
                            <th scope="col" style="width: 40%;">Aktiviti</th>
                            <th scope="col">Wajaran</th>
                            <th scope="col">Tarikh Sasaran</th>
                            <th scope="col">Tarikh Tindakan</th>
                            <th scope="col">Hari Lewat</th>
                            <th scope="col">Catatan</th>
                            <th scope="col">Kemajuan</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tindakans as $tindakan)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;"><a href="/user/projek/tindakan/{{$tindakan->id}}/progress_list">{{$tindakan->aktiviti}}</a></td>
                                <td class="text-center arial">{{$tindakan->wajaran}}</td>
                                <td class="text-center arial">{{$tindakan->tarikh_sasaran}}</td>
                                <td class="text-center arial">{{--$tindakan->tarikh_tindakan ?? ""--}}</td>
                                <td class="text-center arial">contoh</td>
                                <td class="text-center arial">contoh1</td>
                                <td class="text-center arial">contoh2</td>
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
<script type="text/javascript">
    const fileBlocks = document.querySelectorAll('.file-block')
    const buttons = document.querySelectorAll('.btn-select-file')
    
    ;[...buttons].forEach(function (btn) {
      btn.onclick = function () {
        btn.parentElement.querySelector('input[type="file"]').click()
      }
    })
    
    ;[...fileBlocks].forEach(function (block) {
      block.querySelector('input[type="file"]').onchange = function () {
        const filename = this.files[0].name
    
        block.querySelector('.btn-select-file').textContent = filename
      }
    })
    </script>
<style>

    a{
        color:black !important;
        text-decoration:none;
    }
    a:hover{
        color:#3b7ddd !important;
        text-decoration:none;
    }
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