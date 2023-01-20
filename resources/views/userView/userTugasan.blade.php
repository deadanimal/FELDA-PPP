@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Tugasan Bagi {{Auth::user()->kategori->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut.</h5>
                </div>
                <form action="/user/tugasan/do_tugas" method="POST">
                    @csrf
                    <div class="card-body">
                        @if (!$tugasans->isEmpty())
                        @php
                            $bill = 1;
                        @endphp
                        <form action="" method="post"></form>
                            @foreach($tugasans as $tugasan)
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="tugasan" style="font-family:'Poppins'">{{$bill}}) {{$tugasan->nama}}</label>
                                        @if ($tugasan->jenisTugas == "input")
                                            <input type="text"  class="form-control" maxlength="100" size="100" name="jawapan" id="jawapan">
                                        @elseif($tugasan->jenisTugas == "checkBox")
                                            @foreach($checkboxes as $checkbox)
                                                <label class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1">
                                                    <span class="form-check-label">
                                                        {{$checkbox->nama}}
                                                    </span>
                                                </label>
                                            @endforeach
                                        @elseif($tugasan->jenisTugas == "uploadDoc")
                                            <input type="file" class="form-control-file" name="tugasan">
                                        @endif
                                        <input type="hidden" name="tugasanID" value="{{$tugasan->id}}">
                                    </div>
                                </div>
                                @php
                                    $bill++
                                @endphp
                            @endforeach
                            <input type="hidden" name="userID" value="{{Auth::user()->id}}">
                            <button type="submit" class="frame9403-frame7445">
                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Kemas</span></span>
                                    <img
                                    src="/SVG/kemaskini.svg"
                                    class="frame9403-group7527"
                                    />
                                </div>
                            </button>
                        @else
                            <h1 style="text-align: center;"> Tiada Tugasan </h1>
                        @endif
                    </div>
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