@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Modul {{$modul->nama}}
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/moduls">Modul</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$modul->nama}}</li>
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAddProses">
            <div class="frame9403-frame7293">
            <span class="frame9403-text21"><span>Tambah</span></span>
            <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
            </div>
          </button>
        </div>

        {{-- Modal form Tambah proses --}}
        <div class="modal fade" id="exampleModalAddProses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA PROSESM</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/moduls/proses/add" method="POST">
                @csrf
                <div class="modal-body">
                  <label for="namaProses" class="frame9402-text04">
                    <strong>Nama Proses</strong>
                  </label>
                  <input type="text" class="frame9402-kotaknamaProses" id="namaProses" placeholder="Nama Proses" name="namaProses" required oninput="this.value = this.value.toUpperCase()">
                  <input type="hidden" value="{{$modul->id}}" name="modulId">
                  <input type="hidden" value="{{count($prosess)+1}}" name="sequence">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Tambah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      
        {{-- senarai proses --}}
        <table style="overflow: auto; height: auto; max-height: 750px; width:100%;">
          @if (!$prosess->isEmpty())
            @php
              $i = 1;
              $var = 0;
            @endphp
            @foreach ($prosess as $proses)
              @if ($i == 1 || $i% 2 == 1)
                <tr class="frame9402-input">
              @else
                <tr class="frame9402-input" style="background-color: rgba(162, 50, 93, 0.08);"> 
              @endif
                <td class="frame9402-text30">Nama Proses:</td>
                <td class="frame9402-text31"><input type="text" id="nama{{$i}}" class="frame9402-kotaknama" value="{{$proses->nama}}"></td>
                <td class="frame9402-text32">Turutan Proses:
                  <select name="sequence" id="sequence{{$i}}" class="frame9403-kotaknama3">
                    @for($x=1; $x<=count($prosess); $x++)
                      <option value="{{$x}}" @if($x == $proses->sequence)selected @endif>{{$x}}</option>
                    @endfor
                </td>

                <td class="frame9402-text32">
                  Status Proses:
                  <select name="status" id="status{{$i}}" class="frame9403-kotaknama3">
                  @if ($proses->status == 1)
                    <option value="1" selected>Aktif</option>
                    <option value="0">Tidak Aktif</option>
                  @else
                    <option value="1">Aktif</option>
                    <option value="0" selected>Tidak Aktif</option>
                  @endif
                  </select></td>
                <td class="frame9402-frame8727" id="tindakan">
                  <a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang" class="frame9402-rectangle828245" title="Masuk">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
                  </a>
                  {{-- <a href='' onclick="this.href='/pengurusanModul/kemaskiniProses/{{$proses->id}}/'+document.getElementById('nama').value" class="frame9402-rectangle8282452">                
                  </a> --}}
                  <form method="Post" action="/moduls/proses/update">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="namaupdate" id="namaupdate{{$i}}" >
                    <input type="hidden" name="statusUpdate" id="statusUpdate{{$i}}" >
                    <input type="hidden" name="sequenceUpdate" id="sequenceUpdate{{$i}}" >
                    <input type="hidden" name="prosesId" id="prosesId" value="{{$proses->id}}">
                    <input type="hidden" name="modulID" id="modulID" value="{{$modul->id}}">
                    <button class="frame9402-rectangle828245" type="submit" onclick="save({{$i}})" style="margin-left:10px;padding: 0px;background-color: transparent;border-color: transparent;" title="Simpan">                
                      <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A;margin-top: 5px;" viewBox="0 0 530 512" width="31px"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 416c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
                    </button>
                  </form>
                  {{-- <a href="/pengurusanModul/kemaskiniProses/{{$proses->id}}/{{}}" class="frame9402-rectangle8282452" id="kemaskini">
                    <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A;" viewBox="0 0 548 612"><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 416c-35.3 0-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64s-28.7 64-64 64z"/></svg>
                  </a> --}}
                  <button type="button" class="frame9402-rectangle828246" style="margin-left: 5px" data-toggle="modal" data-target="#exampleModal{{$i}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Padam Proses {{$proses->nama}}</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <p>Anda Pasti Mahu Padam Proses {{$proses->nama}}?<p>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                          <form method="post" action="/moduls/proses/delete">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" value="{{$modul->id}}" name="modulId">
                            <input type="hidden" name="prosesId" value="{{$proses->id}}"/>
                            <button class="btn btn-danger">Ya</button>
                          </form>
                      </div>
                      </div>
                  </div>
                  </div>
                </td>
              </tr>
              @php
                $i++;
                if ($var == $proses->sequence) {
                   Alert::error('Terdapat Duplikasi.', 'Terdapat duplikasi pada turutan proses.');   
                }
                $var = $proses->sequence;
              @endphp
            @endforeach 
          @else
            <tr class="frame9402-input" style="background-color: #FFFFFF;"><h2 class="frame9402-text01" style="color:black;"> Tiada Proses </h2></tr>
          @endif
        </table>
      </div>
    </div>
  </div>
</div>
<style>
  .frame9402-text04 {
    color: black;
    height: auto;
    font-size: 17px;
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
  .frame9402-kotaknama {
    width: 350px;
    height: 45px;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    margin-right: 0;
    border-radius: 3.461621046066284px;
    margin-bottom: 0;
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    padding-left:10px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
    background-color: #FFFFFF;
    text-transform: uppercase;
  }
  .frame9403-frame7445 {
      width: auto;
    height: 44px;
    display: flex;
    max-width: 157px;
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
    width: 70px;
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
  .frame9403-kotaknama3 {
      top: 0px;
      width: 59%;
      height: 50px;
      position: relative;
      box-sizing: content-box;
      border-color: rgba(140, 38, 60, 1);
      border-style: solid;
      border-width: 0.865405261516571px;
      border-radius: 3.461621046066284px;
      box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
      background-color:#FFFFFF;
      background-position:99% center;
      text-align: center;
      display:block;
      font-family: 'Eina01-SemiBold', sans-serif;
      font-size: 17.3081px;
      text-transform: uppercase;
    }
  * {
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
    }
    .formContainer {
      max-width: 550px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      margin-bottom: 0px;
    }
    .frame9402-kotaknamaProses {
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
    height: 80px;
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
    width: 10%;
    height: auto;
    font-size: 17px;
    margin-left: auto;
    text-align: right;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: 15.477937698364258px;
    font-stretch: normal;
    margin-bottom: 0;
    text-decoration: none;
    padding-right: 20px;
  }
  .frame9402-text31 {
    color: #494949;
    width: 50%;
    height: auto;
    font-size: 17px;
    align-self: auto;
    text-align: left;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: 15.477937698364258px;
    font-stretch: normal;
    margin-bottom: 0;
    text-decoration: none;
  }
  .frame9402-text32 {
    color: #494949;
    width: 20%;
    height: auto;
    font-size: 17px;
    align-items: center;
    font-family: 'Eina01-SemiBold', sans-serif;
    font-weight: 400;
    line-height: 15.477937698364258px;
    font-stretch: normal;
    margin-bottom: 0;
    margin-left: auto;
    margin-right: auto;
    text-decoration: none;
  }
  .frame9402-frame8727 {
    width: 15%;
    display: flex;
    opacity: 1;
    position: relative;
    box-sizing: border-box;
    align-items: center;
    flex-shrink: 0;
    border-color: transparent;
    margin-left: auto;
    margin-right: 10px;
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
    margin-right: 10px;
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
  
  </style>
<script src="/js/jquery.js"></script>
<script>
function save(no)
  {
   var nama_val=document.getElementById("nama"+no).value;
   var status_val=document.getElementById("status"+no).value;
   var sequence_val=document.getElementById("sequence"+no).value;
   document.getElementById("sequenceUpdate"+no).value = sequence_val;
   document.getElementById("statusUpdate"+no).value = status_val;
   document.getElementById("namaupdate"+no).value=nama_val;
  }
</script>

<script>
function openForm() {
  document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
}


</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

@endsection