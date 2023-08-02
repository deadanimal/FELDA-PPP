@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            KEMAJUAN TUGAS {{$sendSurats->KategoriPengguna->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            
            <div class="card">
                <div class="card-header">
                    <a href="/user/tugasan/petiMasuk/{{$sendSurats->id}}" class="btn frame7445 align-middle" style="margin-left:0px;">
                          <span class="frame9403-text21 align-middle"><span>Kembali</span></span>
                    </a>
                </div>
                @php
                    $lewat=0;
                    $total_wajaran=0;
                    $total_kemajuan=0;
                    if (!$tindakans->isEmpty()){
                        foreach ($tindakans as $tindakan){
                            $total_wajaran += $tindakan->wajaran;
                        }
                    }
                @endphp
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
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tindakans as $tindakan)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">
                                        {{$tindakan->aktiviti}}
                                </td>
                                <td class="text-center arial">{{$tindakan->wajaran}}%</td>
                                <td class="text-center arial">
                                    {{date('d-m-Y', strtotime($tindakan->tarikh_sasaran))}}
                                    @php
                                        $target_date = Carbon::parse($tindakan->tarikh_sasaran)
                                    @endphp
                                </td>
                                <td class="text-center arial">
                                    @if (!$tindakan->TindakanProgress->isEmpty())
                                        @foreach ($tindakan->TindakanProgress as $TinProgress)
                                            {{date('d-m-Y', strtotime($TinProgress->created_at))}}
                                            @php
                                                $date = Carbon::parse($TinProgress->created_at)
                                            @endphp
                                            @break
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center arial">
                                    @if (!$tindakan->TindakanProgress->isEmpty())
                                        {{$target_date->diffInDays($date)}}
                                        @php
                                            $lewat = $target_date->diffInDays($date);
                                        @endphp
                                    @else
                                        @php
                                            $lewat = 0;
                                        @endphp
                                    @endif
                                </td>
                                <td class="text-center arial">
                                    @if (!$tindakan->TindakanProgress->isEmpty())
                                        @foreach ($tindakan->TindakanProgress as $TinProgress)
                                            {{$TinProgress->catatan}}
                                            @break
                                        @endforeach
                                    @endif
                                </td>
                                <td class="text-center arial">
                                    @if (!$tindakan->TindakanProgress->isEmpty())
                                        @foreach ($tindakan->TindakanProgress as $TinProgress)
                                            {{$TinProgress->progress * $tindakan->wajaran/100}}%
                                        
                                            @php
                                                $total_kemajuan += ($TinProgress->progress * $tindakan->wajaran/100);
                                            @endphp
                                            @break
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            @endforeach 
                            <tr class="text-center" style="border-top: 2px solid black;">
                                <td class="Arial"><b>JUMLAH</b></td>
                                <td>{{$total_wajaran}}%</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$total_kemajuan}}%</td>
                            </tr>
                        </tbody>
                    </table>
                @else
                    <h1 style="text-align: center;"> Tiada Maklum Balas Dari Pengguna </h1>
                @endif
            </div>
            
            @if (!$PurchaseOrders->isEmpty())
                <div class="card">
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                        <tr class="text-center">
                            <th scope="col" style="width: 50%;">Pesanan Pembelian</th>
                            <th scope="col">Tarikh Maklum Balas</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($PurchaseOrders as $PO)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">
                                    <a href="{{$PO->file}}">Lihat Pesanan Pembelian</a>
                                </td>
                                <td class="text-center arial">{{date('d-m-Y', strtotime($PO->created_at))}}</td>
                                <td class="text-center arial">
                                    <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModalView{{$PO->id}}" title="Lihat"><i class="align-middle me-2 fas fa-fw fa-search-plus" style="font-size: x-large;color: #CD352A;"></i></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalView{{$PO->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Padam Pesanan Pembelian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($PO->InputMedan != null)
                                                        @foreach ($PO->InputMedan as $items)
                                                            <br>
                                                            <label for="medan{{$items->id}}" class="form-label">{{$items->MedanPO->nama}}</label>
                                                            <input class="form-control" id="medan{{$items->id}}" value="{{$items->value}}" readonly>
                                                        @endforeach
                                                    @endif
                                                    
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>      
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            
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
    .frame7445:disabled {
      opacity: 0.7;
      cursor: default;
  }
    .frame7445 {
    width: 20%;
    height: 50px;
    display: flex;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25);
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