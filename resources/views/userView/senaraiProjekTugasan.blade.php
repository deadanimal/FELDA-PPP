@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            TUGASAN BAGI PROJEK {{$jawapan->borangs->namaBorang}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            {{-- <div class="card">
                <div class="card-title">
                    <h1 class="text-center">{{$tugasan->perkara}}</h1>
                </div>
                <div class="card-body">
                    <table class="w-50 center">
                        <tr>
                            <td><h1 class="text-right" style="margin-right:3%">Tarikh Sasaran</h1></td>
                            <td><h1 class="text-left">{{$tugasan->due_date}}</h1></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut sebelum tarikh yang ditetapkan.</h5>
                </div>
                <div class="card-body">
                    @if (!$tugasans->isEmpty())
                    <table class="table table-bordered table-striped w-100 arial">
                        <thead class="text-white bg-primary w-100">
                        <tr class="text-center">
                            <th scope="col" >Perkara Tugasan</th>
                            <th scope="col" style="width: 20%;">Tindakan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugasans as $tugasan)
                            <tr>
                                <td class="text-center arial" style="text-transform: uppercase;">{{$tugasan->perkara}}</td>
                                <td class="text-center arial">
                                    @if ($tugasan->jenis_input == "P.O")
                                        <a class="btn btn-success" href="/user/projek/tugasan/{{$tugasan->id}}/{{$jawapan->id}}/PO/list" style="color: white; text-decoration:none;">
                                         Semak Tugasan
                                        </a>
                                    @else
                                        <a class="btn btn-success" href="/user/projek/tugasan/{{$tugasan->id}}/{{$jawapan->id}}/list" style="color: white; text-decoration:none;">
                                            Semak Tugasan
                                        </a>
                                    @endif
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
        </div>
    </div>
</div>
<style>
.perkara{
    text-align: center;
    background-color: #FFFFFF !important;
  }
    .center{
         margin-left: auto;
        margin-right: auto;
    }

    .frame9403-frame7445 {
    display: flex;
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
    margin-top:2%;
    margin-left:auto;
    margin-right: 2% !important; 
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
</style>
@endsection