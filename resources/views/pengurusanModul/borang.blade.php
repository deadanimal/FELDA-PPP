@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style>
.frame9402-frame9402 {
  width: 100%;
  display: flex;
  position: relative;
  box-sizing: border-box;
  flex-shrink: 0;
  border-color: transparent;
  border-radius: 0px 0px 0px 0px;
  margin: 0;
  flex-direction: column;
}
.frame9402-frame9281 {
  display: flex;
  padding: 58px 339px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 32px;
  flex-direction: column;
  background-color: #F1F1F1;
}
.frame9403-frame9401 {
  display: flex;
  position: relative;
  align-self: stretch;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 43px;
  flex-direction: column;
  justify-content: center;
  padding-top: 25px;

}
.frame9403-text {
  color: #781E2A;
  height: auto;
  font-size: 30px;
  align-self: auto;
  text-align: left;
  font-family: Poppins;
  font-weight: 600;
  line-height: 12.976823806762695px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 13px;
  text-decoration: none;
}
.frame9403-text02 {
  color: #781E2A;
  height: auto;
  font-size: 25px;
  align-self: auto;
  font-style: Medium;
  text-align: left;
  font-family: Poppins;
  font-weight: 500;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-box {
  width: 1332.490px;
  display: flex;
  padding-bottom: 50px;
  position: relative;
  box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgba(0, 0, 0, 0.05000000074505806) ;
  box-sizing: content-box;
  align-items: center;
  border-color: transparent;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
  align-self: center;
}
.frame9402-frame9282 {
  display: flex;
  width: inherit;
  padding-top: 30px;
  padding-bottom: 30px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 32px;
  flex-direction: column;
  background-color: #F1F1F1;
}
.frame9402-frame7301 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-self: flex-start;
  border-color: transparent;
  margin-left: 17px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}
.frame9402-frame7188 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-left: 20px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-text04 {
  color: black;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: end;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text01 {
  color: #781E2A;
  height: auto;
  font-size: 23px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text05 {
  color: #781E2A;
  height: auto;
  font-size: 23px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-kotaknama {
  width: -webkit-fill-available;
  height: 45px;
  position: relative;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  margin-right: 0;
  border-radius: 3.461621046066284px;
  margin-bottom: 0;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-size: 18px;
  padding-left:10px;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
  background-color: #FFFFFF;  
  text-transform: uppercase;
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
  margin-right: 30px;
  margin-bottom: 20px;
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
.frame9403-kotaknama3 {
    top: 0px;
    width: -webkit-fill-available;
    height: 45px;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
    background-color:#FFFFFF;
    background-position:99% center;
    display:block;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-size: 17.3081px;
    text-align: center;  
    text-transform: uppercase;
  }
* {
    box-sizing: border-box;
  }
  .frame9403-frame74451 {
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
    margin-right: 10px;
  }
  .frame9402-kotaknamaBorang {
  width: auto;
  height: 50px;
  position: relative;
  box-sizing: content-box;
  margin-right: 0;
  margin-top: 10px;
  margin-bottom: 30px;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-size: 18px;
  padding-left:10px;  
    text-transform: uppercase;
}
  .formContainer .btn {
    padding: 12px 20px;
    border: none;
    background-color: #8ebf42;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    margin-bottom: 15px;
    opacity: 0.8;
  }
  .formContainer .cancel {
    background-color: #cc0000;
  }
  .formContainer .btn:hover,
  .openButton:hover {
    opacity: 1;
  }
  .frame9402-input {
  width: 100%;
  height: 100px;
  display: flex;
  padding-top: 5px;
  padding-bottom: 5px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-left: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  background-color: rgba(162, 50, 93, 0.20000000298023224);
}
  .frame9402-text30 {
  color: #494949;
  width: 30%;
  height: auto;
  font-size: 17px;
  margin-left: auto;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;
  margin-left: 1%;
}
.frame9402-text31 {
  color: #494949;
  width: 40%;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  margin-left: 1%;
  text-decoration: none;
}
.frame9402-text32 {
  color: #494949;
  width: 15%;
  height: auto;
  font-size: 15px;
  margin-left: auto;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  text-decoration: none;
  margin-left: 1%;
}
.frame9402-text33 {
  color: #494949;
  width:15%;
  align-items: center;
  display: flex;
  flex-direction: column;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  margin-left: 1%;
  text-decoration: none;
}
.frame9402-frame8727 {
  width: 5%;
  display: flex;
  opacity: 1;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-left: auto;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  justify-content: center;
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
.frame9402-rectangle828245 {
  width: 32px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  margin-right: 15px;
  margin-top: -1px;
}
.frame9402-rectangle8282452 {
  width: 32px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  margin-top: -1px;
  margin-right: auto;
  margin-left: auto;
}

.switch {
  position: relative;
}

.switch label {
  width: 55px;
  height: 23px;
  background-color: #999;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 50px;
}

.switch input[type="checkbox"] {
  visibility: hidden;
}
.switch label:after {
  content: 'Active';
  width: 21px;
  height: 21px;
  border-radius: 50px;
  position: absolute;
  top: 1px;
  left: 1px;
  transition: 100ms;
  background-color: white;
}

.switch .look:checked + label:after {
  left: 32px;
}

.switch .look:checked + label {
  background-color: lightsteelblue;
}

{
    box-sizing: border-box;
  }
  .openBtn {
    display: flex;
    justify-content: left;
  }
  .openButton {
    border: none;
    border-radius: 5px;
    background-color: #1c87c9;
    color: white;
    padding: 14px 20px;
    cursor: pointer;
    position: fixed;
  }
  .loginPopup {
    position: relative;
    text-align: center;
    width: 100%;
  }
  .formPopup {
    display: none;
    position: fixed;
    left: 50%;
    top: 25%;
    transform: translate(-50%, 5%);
    border: 4px solid #781E2A;
    border-radius: 8px;
    z-index: 9;
    width: 550px;
  }
  .formContainer {
    max-width: 550px;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    margin-bottom: 0px;
  }
  .frame9402-kotaknamaMedan {
  height: auto;
  align-self: auto;
  text-align: left;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  margin-left: 10px;
  text-decoration: none;
  margin-top: 10px;
  margin-bottom: 30px;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-size: 18px;
  padding-left:10px;  
    text-transform: uppercase;
}
  .formContainer .btn {
    padding: 12px 20px;
    border: none;
    background-color: #8ebf42;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    margin-bottom: 15px;
    opacity: 0.8;
  }
  .formContainer .cancel {
    background-color: #cc0000;
  }
  .formContainer .btn:hover,
  .openButton:hover {
    opacity: 1;
  }
</style>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Borang {{$borang->namaBorang}}
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>
        <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/proses">{{$modul->nama}}</a></li>
        <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang">{{$proses->nama}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$borang->namaBorang}}</li>
      </ol>
    </nav>
  </div>
  <div class="row">
      <div class="card mb-3" style="padding-left: 0px; padding-right: 0px;">
        <div class="card-header">
          <table style="overflow: auto; height: auto; max-height: 750px; width:100%;">
            <tr>
              <td>
                <form action="/moduls/borang/viewBorang" method="GET">
                  <button type="submit" class="frame9403-frame7445" style="margin-left: 0px; margin-right:auto;">
                    <input type="hidden" value="{{$proses->id}}" name="prosesId">
                    <input type="hidden" value="{{$modul->id}}" name="modulId">
                    <input type="hidden" value="{{$borang->id}}" name="borangId">
                    <div class="frame9403-frame7293">
                    <span class="frame9403-text21"><span>Papar Borang</span></span>
                    </div>
                  </button>
                </form>
              </td>
              <td>
                <form action="/moduls/borang/kelulusan" method="GET">
                  <button type="submit" class="frame9403-frame7445" style="margin-left: auto; margin-right:auto;">
                    <input type="hidden" value="{{$proses->id}}" name="prosesId">
                    <input type="hidden" value="{{$modul->id}}" name="modulId">
                    <input type="hidden" value="{{$borang->id}}" name="borangId">
                    <div class="frame9403-frame7293">
                    <span class="frame9403-text21"><span>Proses Kelulusan</span></span>
                    </div>
                  </button>
                </form>
              </td>
              <td>
                <button type="submit" class="frame9403-frame7445" style="margin-left: auto; margin-right:auto;" data-toggle="modal" data-target="#exampleModaladdConsent">
                  <div class="frame9403-frame7293">
                  <span class="frame9403-text21"><span>Persutujuan borang</span></span>
                  </div>
                </button>

                {{-- Modal Persutujuan borang --}}
                <div class="modal fade" id="exampleModaladdConsent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">PERSUTUJUAN BORANG</h2>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>

                          <form action="/moduls/borang/consent/add" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="modal-body">
                              <label for="consent" class="frame9402-text04">
                                  <strong>Persutujuan</strong>
                              </label>
                              <textarea class="form-control" id="consent" rows="5" name="consent" placeholder="Persutujuan Borang">{{$borang->consent ?? ""}}</textarea>
                          
                              <input type="hidden" value="{{$proses->id}}" name="prosesId">
                              <input type="hidden" value="{{$modul->id}}" name="modulId">
                              <input type="hidden" value="{{$borang->id}}" name="borangId">
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                              <button class="btn btn-primary">Tambah</button>
                            </div>
                          </form>
                      </div>
                  </div>
                </div>
              </td>
              <td>
                <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModaladdMedan">
                  <div class="frame9403-frame7293">
                  <span class="frame9403-text21"><span>Tambah Medan</span></span>
                  <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                  </div>
                </button>
              </td>
            </tr>
          </table>
        </div>
        
        {{-- Modal Tambah Medan --}}
        <div class="modal fade" id="exampleModaladdMedan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA MEDAN</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form action="/moduls/borang_field/add" method="POST">
                    @csrf
                    <div class="modal-body">
                      <table class="table table-borderless">
                        <tr>
                          <td class="frame9402-text04"><p class="text-xs-center" style="margin: auto;">Nama Medan</p></td>
                          <td><input type="text" class="frame9402-kotaknama" placeholder="Nama Medan" name="nama" required oninput="this.value = this.value.toUpperCase()"></td>
                        </tr>
                        <tr>
                          <td class="frame9402-text04"><p class="text-xs-center"  style="margin: auto;">Jenis Data</p></td>
                          <td>
                            <select name="datatype" class="frame9403-kotaknama3">
                              <option value="string">Alfanumerik</option>
                              <option value="integer">Numerikal</option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td class="frame9402-text04"><p class="text-xs-center"  style="margin: auto;">Minimum Angka/Perkataan</p></td>
                          <td><input type="number" class="frame9402-kotaknama" placeholder="Minimum" name="min" required></td>
                        </tr>
                        <tr>
                          <td class="frame9402-text04"><p class="text-xs-center"  style="margin: auto;">Maksimum Angka/Perkataan</p></td>
                          <td><input type="number" class="frame9402-kotaknama" placeholder="Maksimum" name="max" required></td>
                        </tr>
                        <tr>
                          <td class="frame9402-text04"><p class="text-xs-center"  style="margin: auto;">Pilihan</p></td>
                          <td>
                            <select name="pilihan" class="frame9403-kotaknama3">
                              <option value="required">Mandatori</option>
                              <option value="optional">Pilihan</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                      @php
                      $count = count($medans);
                      @endphp
                      <input type="hidden" value="{{$count = $count+1}}" name="sequence">
                      <input type="hidden" value="{{$proses->id}}" name="prosesId">
                      <input type="hidden" value="{{$modul->id}}" name="modulId">
                      <input type="hidden" value="{{$borang->id}}" name="borangId">        
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
              </div>
          </div>
        </div>

        @php
            $var= 0;
        @endphp

        <table style="overflow: scroll; max-height: 750px; width:100%;">
          @if (!$medans->isEmpty())
          <tbody>
            @foreach($medans as $medan)
              <tr class="frame9402-input">          
                <form action="/moduls/borang_field/update" method="POST">
                  @csrf
                  @method('PUT')
                  <td class="frame9402-text31">Nama Medan:<input type="text" name="nama" class="frame9402-kotaknama" value="{{$medan->nama}}" oninput="this.value = this.value.toUpperCase()"></td>
                  <td class="frame9402-text30">Jenis Data:
                    <select name="datatype" class="frame9403-kotaknama3">
                      @if ($medan->datatype == "string" )
                        <option value="string" selected>Alfanumerik</option>
                        <option value="integer">Numerikal</option>
                      @else
                        <option value="string">Alfanumerik</option>
                        <option value="integer"selected>Numerikal</option>
                      @endif
                    </select>
                  </td>
                  <td class="frame9402-text30"> Pilihan:
                    <select name="pilihan" class="frame9403-kotaknama3">
                      @if ($medan->pilihan == "required" )
                        <option value="required" selected>Mandatori</option>
                        <option value="optional">Pilihan</option>
                      @else
                        <option value="required">Mandatori</option>
                        <option value="optional" selected>Pilihan</option>
                      @endif
                    </select>
                  </td>
                  <td class="frame9402-text32">
                    @if ($medan->datatype == "string" )
                      Minimum Perkataan
                    @else
                      Minimum Angka
                    @endif
                    <input type="number" name="min" class="frame9403-kotaknama3" value="{{$medan->min}}">
                  </td>
                  <td class="frame9402-text32">
                    @if ($medan->datatype == "string" )
                      Maksimum Perkataan
                    @else
                      Maksimum Angka
                    @endif
                    <input type="number" name="max" class="frame9403-kotaknama3" value="{{$medan->max}}">
                  </td>
                  <td class="frame9402-text33">Turutan:
                    <select name="sequence" class="frame9403-kotaknama3">
                    @for($x=1; $x<=count($medans); $x++)
                      <option value="{{$x}}" @if($x == $medan->sequence)selected @endif>{{$x}}</option>
                    @endfor
                  </td>

                  <input type="hidden" name="medanID" value="{{$medan->id}}">
                  <input type="hidden" value="{{$proses->id}}" name="prosesId">
                  <input type="hidden" value="{{$modul->id}}" name="modulId">
                  <input type="hidden" value="{{$borang->id}}" name="borangId">
                  <td class="frame9402-frame8727" id="tindakan">
                    <button class="frame9402-rectangle828246" style="height: auto;" title="Simpan"><svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A;margin-top: 5px;" viewBox="0 0 530 512" width="31px"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 416c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"></path></svg></button>
                  </td>
                </form>
                <td class="frame9402-frame8727">
                  <button type="button" class="frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModal{{$medan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
                </td>
                
                <div class="modal fade" id="exampleModal{{$medan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog  modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Padam Medan {{$medan->nama}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Anda Pasti Mahu Padam Medan {{$medan->nama}}?<p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                            <form method="post" action="/moduls/borang_field/delete">
                              @csrf
                              @method('DELETE')
                              <input type="hidden" name="medanID" value="{{$medan->id}}">
                              <input type="hidden" value="{{$proses->id}}" name="prosesId">
                              <input type="hidden" value="{{$modul->id}}" name="modulId">
                              <input type="hidden" value="{{$borang->id}}" name="borangId">
                              <button class="btn btn-danger">Ya</button>
                            </form>
                        </div>
                      </div>
                  </div>
                </div>
                
                @php
                  // popup alert for duplicate sequence
                  if ($var == $medan->sequence) {
                    Alert::error('Terdapat Duplikasi.', 'Terdapat duplikasi pada turutan medan.');   
                  }
                  $var = $medan->sequence;
                @endphp
              </tr>
            @endforeach
          </tbody>
          @else
            <tr class="frame9402-input" style="background-color: #FFFFFF; justify-content:center;"><td><h2 class="frame9402-text01" style="color:black;"> Tiada Medan </h2></td></tr>
          @endif
        </table>
      </div>
    {{-- upload Borang --}}
    {{-- <div class="borangPopup">
      <div class="formPopup" id="popupForm">
        <form action="/pengurusanBorang/uploadBorang" method="POST" enctype="multipart/form-data" class="formContainer">
          @csrf
          <h2 class="frame9402-text01" style="margin-top: 0px;">Muat Naik Borang</h2>
          <input class="frame9402-kotaknamaBorang" type="file" name="borangPdf" accept=".pdf,.doc" required/>
          <input type="hidden" value="{{$borang->id}}" name="borangId">
          <button type="submit" class="btn">Simpan</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Batal</button>
        </form>
      </div>
    </div> --}}
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function openForm() {
  document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
}
</script>
@endsection