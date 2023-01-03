@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">

    <div class="header">
        <h1 class="header-title">
            Borang Contoh
            {{-- {{$borang->nama}} --}}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" style="color: #FFFFFF">Modul Contoh</li>
                <li class="breadcrumb-item active" aria-current="page">Nama Proses</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title mb-0">Sila isikan maklumat anda berikut dengan betul.</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="nama" style="font-family:'Poppins'">Nama</label>
                            <input type="text" class="form-control" maxlength="100" size="100" name="" id="nama" required>
                        </div>
                    </div>
                    <button type="submit" class="frame9403-frame7445">
                        <div class="frame9403-frame7293">
                          <span class="frame9403-text21"><span>Hantar</span></span>
                          <img
                          src="/SVG/kemaskini.svg"
                          class="frame9403-group7527"
                          />
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
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
    text-align: left;
    font-family: 'Poppins', sans-serif;
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