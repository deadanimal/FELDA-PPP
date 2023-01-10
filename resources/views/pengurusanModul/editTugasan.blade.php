@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
.frame9402-box {
  width: max-content;
  display: flex;
  padding: 29px;
  position: relative;
  box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgba(0, 0, 0, 0.05000000074505806) ;
  box-sizing: content-box;
  align-items: center;
  border-color: transparent;
  margin-left: auto;
  margin-right: auto;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
}
.frame9403-text03 {
        color: #781E2A;
        height: auto;
        font-size: 30px;
        align-self: auto;
        font-style: Medium;
        text-align: left;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        line-height: normal;
        font-stretch: normal;
        margin-right: auto;
        margin-left: 15px;
        margin-bottom: 0;
        margin-top: auto;
        text-decoration: none;
        padding-bottom: 15px;
    }

    .frame9402-frame7301 {
        display: flex;
        position: relative;
        box-sizing: border-box;
        align-items: flex-start;
        border-color: transparent;
        margin-right: 10px;
        border-radius: 0px 0px 0px 0px;
        margin-bottom: 0;
        flex-direction: column;
    }

    .frame9402-frame9278 {
        display: flex;
        position: relative;
        box-sizing: border-box;
        align-items: center;
        border-color: transparent;
        padding: 0px 100px;
        margin-right: 0;
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
        margin-right: 0;
        border-radius: 0px 0px 0px 0px;
        margin-bottom: 0;
        padding-bottom: 20px;
    }

    .frame9402-text04 {
        color: black;
        font-size: 19px;
        text-align: right;
        font-family: 'Eina01-SemiBold', sans-serif;
        margin-right: 17px;
        margin-bottom: 0;
    }

    .frame9402-kotaknama {
        width: 399px;
        height: 50px;
        position: relative;
        box-sizing: content-box;
        border-color: rgba(140, 38, 60, 1);
        border-style: solid;
        border-width: 0.865405261516571px;
        margin-right: 0;
        border-radius: 3.461621046066284px;
        margin-bottom: 0;
        font-family: 'Eina01-SemiBold';
        font-size: 18px;
        padding-left: 10px;
    }
    .frame9402-frame7293 {
        height: 20px;
        display: flex;
        position: absolute;
        box-sizing: border-box;
        align-items: center;
        border-color: transparent;
        margin-right: 0;
        border-radius: 0px 0px 0px 0px;
        margin-bottom: 0;
    }
    .frame9403-kotaknama3 {
        top: 0px;
        width: 300px;
        height: 50px;
        box-sizing: content-box;
        border-color: rgba(140, 38, 60, 1);
        border-style: solid;
        border-width: 0.865405261516571px;
        border-radius: 3.461621046066284px;
        background:url('/SVG/arrow2.svg') no-repeat;
        background-position:99% center;
        display:block;
        font-family: 'Eina01-SemiBold', sans-serif;
        font-size: 17.3081px;
        box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
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
  width: 91px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  font-style: SemiBold;
  text-align: left;
  font-family: Poppins;
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
.frame9403-frame7445 {
    width: 157px;
  height: 44px;
  display: flex;
  max-width: 157px;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  align-self: center;
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
  margin-right: auto;
  margin-top: 20px;
  cursor: pointer;
}
</style>
<div class="container-fluid">
    <div class="header">
      <h1 class="header-title">
          Tugasan {{$tugasan->nama}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/proses">{{$modul->nama}}</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang">{{$proses->nama}}</a></li>
        </ol>
      </nav>
    </div>
    
    <div class="row">
        <div class="col-12">
          <div class="frame9402-box">
            <form action="/moduls/tugasan/update" method="POST" class="frame9402-frame9278">
              @csrf
              @method("PUT")
              <input type="hidden" name="tugasanID" value="{{$tugasan->id}}">
              <input type="hidden" name="prosesId" value="{{$proses->id}}">
              <input type="hidden" name="modulId" value="{{$modul->id}}">
              <table class="table table-borderless">
                  <tr>
                      <td><span class="frame9402-text04">Nama Tugasan: </span></td>
                      <td><input type="text" class="frame9402-kotaknama" name="namaTugas" value="{{$tugasan->nama}}" required/></td>
                  </tr>
                  <tr>
                    <td><span class="frame9402-text04">Jenis Tugasan: </span></td>
                    <td>
                      <select name="jenisTugas" class="frame9403-kotaknama3">
                        <option value="input" @if ($tugasan->jenisTugas == "input") selected @endif >Input</option>
                        <option value="checkBox" @if ($tugasan->jenisTugas == "checkBox") selected @endif >Kotak Semak</option>
                        <option value="uploadDoc" @if ($tugasan->jenisTugas == "uploadDoc") selected @endif >Muat Naik Dokumen</option>
                    </select>
                    </td>
                  </tr>
                  <tr>
                    <td><span class="frame9402-text04">Kategori Pengguna: </span></td>
                    <td>
                      <select name="userKategori" class="frame9403-kotaknama3">
                          @foreach($kategoriPengguna as $kategoriPengguna)
                            <option value="{{$kategoriPengguna->id}}" 
                              @if ($kategoriPengguna->id == $tugasan->userKategori)
                                selected
                              @endif >{{$kategoriPengguna->nama}}</option>
                          @endforeach
                      </select>
                    </td>
                  </tr>
              </table>
              <button type="submit" class="frame9403-frame7445">
                <div class="frame9403-frame7293">
                  <span class="frame9403-text21"><span>Kemaskini</span></span>
                  <img src="/SVG/kemaskini.svg" class="frame9403-group7527">
                </div>
              </button>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection