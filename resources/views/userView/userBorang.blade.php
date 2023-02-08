@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Borang {{$borang->namaBorang}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila isikan maklumat anda berikut dengan betul.</h5>
                </div>
                <form action="/userBorang/view/add" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama" style="font-family:'Poppins'">NAMA</label>
                                <input type="text" class="form-control" style="text-transform: uppercase;" name="nama" id="nama">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="ic" style="font-family:'Poppins'">NO KAD PENGENALAN</label>
                                <input type="text" class="form-control" name="ic" id="ic" maxlength="12" minlength="12"
                                size="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="E.g: 750922140122" required>
                            </div>
                        </div>
                        @foreach($medans as $medan)
                            <div class="row">
                                <div class="mb-3">
                                    <label for="jawapan{{$medan->id}}" style="font-family:'Poppins'; text-transform:uppercase">{{$medan->nama}}</label>
                                    <input 
                                    @if ($medan->datatype == "string")
                                        type="text" 
                                    @else
                                        type="number" step="any"
                                    @endif

                                    @if ($medan->pilihan == "required")
                                        required 
                                    @endif
                                    @if ($medan->nama != 'emel')
                                        style="text-transform: uppercase;"
                                    @endif
                                    class="form-control" maxlength="100" size="100" name="jawapan[]" id="jawapan{{$medan->id}}">
                                    <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                                </div>
                            </div>
                        @endforeach
                        <input type="hidden" name="borangID" value="{{$borang->id}}">
                        <button type="submit" class="frame9403-frame7445">
                            <div class="frame9403-frame7293">
                                <span class="frame9403-text21"><span>Hantar</span></span>
                                <img
                                src="/SVG/kemaskini.svg"
                                class="frame9403-group7527"
                                />
                            </div>
                        </button>
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