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
                    </table>
                </div>
                <div class="card-footer">
                    <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAdd">
                        <div class="frame9403-frame7293">
                            <span class="frame9403-text21"><span>Kemaskini</span></span>
                            <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>
                    <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Kemaskini Tugasan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="/user/projek/tindakan/PO/add" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <label for="PO" class="form-label">Pesanan Pembelian</label>
                                        <input type="file" class="form-control" name="PO" required>

                                        @foreach ($medanPO as $medan)
                                            <br>
                                            <label for="medan{{$medan->id}}" class="form-label">{{$medan->nama}}</label>
                                            <input 
                                            @if ($medan->datatype == "Text") 
                                                type="text" 
                                            @elseif ($medan->datatype == "Date") 
                                                type="date" 
                                            @elseif ($medan->datatype == "Number") 
                                                type="number" 
                                            @endif
                                            class="form-control" name="jawapan[]" id="medan{{$medan->id}}" required oninput="this.value = this.value.toUpperCase()">
                                            <input type="hidden" value="{{$medan->id}}" name="medanId[]">
                                        @endforeach

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" disabled>BATAL</button> 
                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                        <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
                                        <button class="btn btn-danger">CIPTA</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pesanan Pembelian</h5>
                </div>
                <div class="card-body">
                    {{-- @if (!$tindakans->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                        <tr class="text-center">
                            <th scope="col" style="width: 50%;">Pesanan Pembelian</th>
                            <th scope="col">Tarikh Maklum Balas</th>
                            <th scope="col">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tindakans as $tindakan)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">
                                    <a href="{{$tindakan->file}}">Lihat Pesanan Pembelian</a>
                                </td>
                                <td class="text-center arial">{{date('d-m-Y', strtotime($tindakan->created_at))}}</td>
                                <td class="text-center arial">
                                    <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModalView{{$tindakan->id}}" title="Lihat"><i class="align-middle me-2 fas fa-fw fa-search-plus" style="font-size: x-large;color: #CD352A;"></i></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalView{{$tindakan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Padam Pesanan Pembelian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @foreach ($medanPO as $medan)
                                                        @foreach ($tindakan->jawapan as $items)
                                                            @if ($items->medanPO_id == $medan->id)
                                                                <br>
                                                                <label for="medan{{$medan->id}}" class="form-label">{{$medan->nama}}</label>
                                                                <input class="form-control" id="medan{{$medan->id}}" value="{{$items->value}}" readonly>
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                                <div class="modal-body">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>      
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="button" class="btn frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModaldelete{{$tindakan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
        
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModaldelete{{$tindakan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Padam Pesanan Pembelian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Anda Pasti Mahu Padam Pesanan Pembelian Ini?<p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                                    <form method="post" action="/user/projek/tindakan/PO/delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasan_id">
                                                        <input type="hidden" value="{{$tindakan->id}}" name="tindakanID">
                                                        <input type="hidden" value="{{$jawapan_id}}" name="jawapan_id">
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
                        <h1 style="text-align: center;"> Tiada Pesanan Pembelian </h1>
                    @endif --}}
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
    margin-right: auto;
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