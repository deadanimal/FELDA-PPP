@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.arial-N{
  font-family: 'Arial-N', sans-serif;
  font-size: 18px;
}
.frame9402-box {
  width: 80%;
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
  margin-bottom: 5%;
  flex-direction: column;
  background-color: white;
}
.box-shadow{
    box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgb(0 0 0 / 5%);
    border-radius: 8.598855018615723px;
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
        width: 100%;
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
        width: -webkit-fill-available;
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
        text-transform: uppercase;
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
  width: -webkit-fill-available;
  height: auto;
  font-size: 16px;
  align-self: auto;
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
.divPopup {
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
    }
    .formContainer {
      max-width: 550px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      margin-bottom: 0px;
    }
  .frame9402-text01 {
    color: #781E2A;
    height: auto;
    font-size: 23px;
    align-self: auto;
    text-align: center;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: normal;
    font-stretch: normal;
    margin-right: 17px;
    margin-bottom: 0;
    text-decoration: none;
  }
    .frame9402-kotaknamaBorang {
    width: 299px;
    height: 50px;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    margin-right: 0;
    border-radius: 3.461621046066284px;
    margin-top: 10px;
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
    height: 70px;
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
    position: relative;
    box-sizing: border-box;
    border: none;
    background-color: transparent;
  }
</style>
<div class="container-fluid">
    <div class="header">
      <h1 class="header-title">
          Jenis Kemaskini {{$kemaskini->nama}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/proses">{{$modul->nama}}</a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang">{{$proses->nama}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">
            <form action="/moduls/jenisTernakan/edit" id="linkTernakan" method="GET" style="width: 150%;">
                @csrf
              <input type="hidden" name="jenisTernakanID" value="{{$jenisTernakan->id}}">
              <input type="hidden" name="prosesId" value="{{$proses->id}}">
              <input type="hidden" name="modulId" value="{{$modul->id}}">

              <a href="#" class="breadcrumb-item active" onclick="myFunction()">{{$jenisTernakan->nama}}</a>
            </form>
          </li>
        </ol>
      </nav>
    </div>
    
    <div class="row">
      <div class="col-12">
        <div class="card frame9402-box">
          <form action="/moduls/jenisKemas/update" method="POST" class="frame9402-frame9278">
            @csrf
            @method("PUT")
            <input type="hidden" value="{{$kemaskini->id}}" name="kemaskiniID">
            <input type="hidden" name="ternakanaID" value="{{$jenisTernakan->id}}">
            <input type="hidden" name="prosesId" value="{{$proses->id}}">
            <input type="hidden" name="modulId" value="{{$modul->id}}">
            <table class="table table-borderless">
                <tr>
                    <td><span class="frame9402-text04">Nama Jenis Kemaskini: </span></td>
                    <td><input type="text" class="frame9402-kotaknama arial-N" name="namaKemas" value="{{$kemaskini->nama}}" required oninput="this.value = this.value.toUpperCase()"/></td>
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
        <div class="card box-shadow">
            <div class="card-header">
                <table style="width: 100%">
                <tr>
                    <td><h1 style="font-family: 'Eina01-SemiBold', sans-serif; font-size:23px;">SENARAI AKTIVITI</h1></td>
                    <td>
                    <button class="frame9403-frame7445"  onclick="openForm()">
                        <div class="frame9403-frame7293">
                        <span class="frame9403-text21">Tambah</span>
                        <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>
                    </td>
                </tr>
                </table>
                <div class="divPopup">
                <div class="formPopup" id="popupForm">
                    <form action="/moduls/jenisKemas/aktiviti/add" method="POST" class="formContainer">
                        @csrf
                        <h2 class="frame9402-text01" style="margin-top: 0px;">TAMBAH AKTIVITI</h2>
                        <table>
                        <tr>
                            <td><p class="frame9402-text04">Nama Aktiviti</p></td>
                            <td><input type="text" class="frame9402-kotaknamaBorang" placeholder="Nama Aktiviti" name="namaAktiviti" required oninput="this.value = this.value.toUpperCase()"></td>
                        </tr>
                        </table>
                        <input type="hidden" name="kemaskiniID" value="{{$kemaskini->id}}">
                        <input type="hidden" value="{{$jenisTernakan->id}}" name="ternakanaID">
                        <input type="hidden" value="{{$proses->id}}" name="prosesId">
                        <input type="hidden" value="{{$modul->id}}" name="modulId">
                        <button type="submit" class="btn" style="margin-top: 6%;">Tambah</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Batal</button>
                    </form>
                </div>
                </div>
            </div>
            @if (!$aktivitis->isEmpty())
            <table class="table table-borderless table-striped">
                <tbody>
                @foreach($aktivitis as $act)
                <tr>
                    <td><p class="frame9402-text04">Nama Aktiviti:</p></td>
                    <td><p class="frame9402-text04" style="text-align: left; text-transform:uppercase;">{{$act->nama}}</p></td>
                    <td>
                      <a href="/moduls/jenisKemas/aktiviti/Param/{{$proses->id}}/{{$modul->id}}/{{$act->id}}" class="frame9402-rectangle828245" style="margin-right: 2%;" title="masuk">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A; width: 32px; height: 30px;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"></path></svg>
                      </a>
                    <!-- Button trigger modal update-->
                    <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#exampleModalCenter{{$act->id}}">
                        <img src="/SVG/pencil.svg"/>
                    </button>

                    <!-- Modal update-->
                    <div class="modal fade" id="exampleModalCenter{{$act->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$act->nama}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <form method="post" action="/moduls/jenisKemas/aktiviti/update">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <label for="namaBorang" class="frame9402-text04">
                                        <strong>Nama Aktiviti</strong>
                                        </label>
                                        <input type="text" class="frame9402-kotaknamaBorang" value="{{$act->nama}}" name="namaAktivitiUp" required oninput="this.value = this.value.toUpperCase()">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                        <input type="hidden" value="{{$act->id}}" name="aktivId">
                                        <input type="hidden" value="{{$kemaskini->id}}" name="kemaskiniID">
                                        <input type="hidden" value="{{$jenisTernakan->id}}" name="ternakanaID">
                                        <input type="hidden" value="{{$proses->id}}" name="prosesId">
                                        <input type="hidden" value="{{$modul->id}}" name="modulId">
                                        <button class="btn btn-danger">Kemaskini</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal delete -->
                    <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModalcheck{{$act->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                    <!-- Modal delete-->
                    <div class="modal fade" id="exampleModalcheck{{$act->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padam Aktiviti {{$act->nama}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda Pasti Mahu Padam Aktiviti {{$act->nama}}?<p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>      
                                <form method="post" action="/moduls/jenisKemas/aktiviti/delete">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{$act->id}}" name="aktivId">
                                    <input type="hidden" value="{{$kemaskini->id}}" name="kemaskiniID">
                                    <input type="hidden" value="{{$jenisTernakan->id}}" name="ternakanaID">
                                    <input type="hidden" value="{{$proses->id}}" name="prosesId">
                                    <input type="hidden" value="{{$modul->id}}" name="modulId">
                                    <button class="btn btn-danger">Ya</button>
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
                <h2 class="frame9402-text01" style="color:black; margin-bottom:5%;"> Tiada Aktiviti </h2>
            @endif
        </div>
      </div>
    </div>
</div>
<script src="/js/jquery.js"></script>
<script>
 function displayDiv(id, elementValue) {
      document.getElementById(id).style.display = elementValue.value == 'checkBox' ? 'block' : 'none';
   }
  function openForm() {
    document.getElementById("popupForm").style.display = "block";
  }
  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
  }
  function myFunction() {
      document.getElementById("linkTernakan").submit();
  }
</script>
@endsection