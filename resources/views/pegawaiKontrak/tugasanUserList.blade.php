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
                    <a href="/user/tugasan/petiMasuk/{{$sendSurats->jawapan_id}}/user" class="btn frame7445 align-middle" style="margin-left:0px;">
                          <span class="frame9403-text21 align-middle"><span>Kembali</span></span>
                    </a>
                </div>
                <table class="table table-bordered table-striped w-100 arial">
                    <thead class="text-white bg-primary w-100">
                    <tr class="text-center">
                        <th scope="col" style="width: 10%;"></th>
                        <th scope="col">Nama Pengguna</th>
                        <th scope="col" style="width: 20%"></th>
                    </tr>
                    </thead>
                    @if (!$users->isEmpty())
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="text-center arial">{{$loop->iteration}}</td>
                                <td class="text-center arial" style="text-transform: uppercase;">{{$user->nama}}</td>
                                <td class="text-center arial">
                                    <form action="/user/tugasan/tindakan/list" method="get">
                                        <input type="hidden" name="surat_id" value="{{$sendSurats->id}}">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <input type="submit" class="btn btn-success" value="Lihat Kemajuan">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    @else
                        <tr style="text-align: center;"> 
                            <td colspan="3">Tiada Senarai Pengguna</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
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