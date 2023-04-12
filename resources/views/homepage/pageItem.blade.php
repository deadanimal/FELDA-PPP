@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container-fluid">
    <div class="header">
      <h1 class="header-title">
          Laman {{$page->nama}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home </a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$page->nama}}</li>
        </ol>
      </nav>
    </div>
    
    <div class="row">
      <div class="col-12">
        <div class="card box-shadow">
            <div class="card-header">
                <table style="width: 100%">
                <tr>
                    <td><h2 class="modal-title">Senarai Item</h2></td>
                    <td>
                    <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAddItem">
                        <div class="frame9403-frame7293">
                        <span class="frame9403-text21">Tambah</span>
                        <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                        </div>
                    </button>
                    </td>
                </tr>
                </table>

                {{-- Modal Tambah Item --}}
                <div class="modal fade" id="exampleModalAddItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">TAMBAH JENIS KEMASKINI</h2>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <form action="/home/page/item/add" method="POST">
                            @csrf
                              <div class="modal-body">
                                <table class="table table-borderless">
                                  <tr>
                                      <td><p class="frame9402-text04">Nama Item</p></td>
                                      <td><input type="text" class="frame9402-kotaknamaBorang" placeholder="Nama item" name="namaItem" required oninput="this.value = this.value.toUpperCase()"></td>
                                  </tr>
                                  <tr>
                                    <td><p class="frame9402-text04">Jenis Item</p></td>
                                    <td>
                                        <select name="category" class="frame9402-kotaknamaBorang">
                                            <option value="Slider">Slider</option>
                                            <option value="Card">Card</option>
                                            <option value="Dropdown">Dropdown</option>
                                            <option value="Article">Artikel</option>
                                            <option value="Gallery">Galeri</option>
                                            
                                      </select>
                                    </td>
                                  <tr>
                                    <td><p class="frame9402-text04">Baris Item</p></td>
                                    <td><input type="number" class="frame9402-kotaknamaBorang" placeholder="Baris Item" name="row" required oninput="this.value = this.value.toUpperCase()"></td>
                                </tr>
                                </table>
                              </div>
                                <input type="hidden" value="{{$page->id}}" name="pageId">
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-primary">Tambah</button>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>

            </div>

            @if (!$pageItems->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">
                  <tr>
                      <th scope="col" class="text-center">Nama Item</th>
                      <th scope="col" class="text-center">Jenis Item</th>
                      <th scope="col" class="text-center">Baris</th>
                      <th scope="col" class="text-center" style="width: 20%">Tindakan</th>
                  </tr>
                </thead>
                <tbody style="back">
                    @foreach($pageItems as $item)
                    <tr>
                      <td class="text-center arial-N" style="text-transform: uppercase;">{{$item->nama}}</td>
                      <td class="text-center arial-N" style="text-transform: uppercase;">
                        @if ($item->category == "Article")
                            Artikel
                        @elseif($item->category == "Gallery")
                            Galeri
                        @else
                            {{$item->category}}
                        @endif    
                      </td>
                      <td class="text-center arial-N" style="text-transform: uppercase;">{{$item->row}}</td>
                      <td class="text-center">
                        <div class="btn-group btn-group-toggle ">

                            <a href="/home/page/item/{{$item->id}}" class=" btn frame9402-rectangle828246" style="margin-left: 0px;" title="Masuk">
                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A; width: 32px; height: 30px;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
                            </a>

                            <!-- Button trigger modal edit -->
                            <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModalEdit{{$item->id}}" title="Padam"><img src="/SVG/pencil.svg"/></button>

                            <!-- Modal edit-->
                            <div class="modal fade" id="exampleModalEdit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Kemaskini Item {{$item->nama}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/home/page/item/update" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                            <table class="table table-borderless">
                                                <tr style="background-color: #fff">
                                                    <td><p class="frame9402-text04">Nama Item</p></td>
                                                    <td><input type="text" class="frame9402-kotaknamaBorang" value="{{$item->nama}}" name="namaItem" required oninput="this.value = this.value.toUpperCase()"></td>
                                                </tr>
                                                <tr style="background-color: #fff">
                                                    <td><p class="frame9402-text04">Jenis Item</p></td>
                                                    <td>
                                                        <select name="category" class="frame9402-kotaknamaBorang">
                                                            <option value="Slider" 
                                                            @if ($item->category == "Slider")
                                                            selected 
                                                            @endif>
                                                            Slider</option>

                                                            <option value="Card"
                                                            @if ($item->category == "Card")
                                                            selected 
                                                            @endif>Card</option>

                                                            <option value="Dropdown"
                                                            @if ($item->category == "Dropdown")
                                                            selected 
                                                            @endif>Dropdown</option>

                                                            <option value="Article"
                                                            @if ($item->category == "Article")
                                                            selected 
                                                            @endif>Artikel</option>
                                                            <option value="Gallery"
                                                            @if ($item->category == "Gallery")
                                                            selected 
                                                            @endif>Galeri</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr style="background-color: #fff">
                                                    <td><p class="frame9402-text04">Baris Item</p></td>
                                                    <td><input type="number" class="frame9402-kotaknamaBorang" value="{{$item->row}}" name="row" required oninput="this.value = this.value.toUpperCase()"></td>
                                                </tr>
                                            </table>
                                            </div>
                                            <input type="hidden" value="{{$page->id}}" name="pageId">
                                            <input type="hidden" value="{{$item->id}}" name="itemId">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <button class="btn btn-primary">Kemaskini</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                          <!-- Button trigger modal delete -->
                          <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModalDel{{$item->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                          <!-- Modal delete-->
                          <div class="modal fade" id="exampleModalDel{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Padam Jenis Kemaskini {{$item->nama}}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      <p>Anda Pasti Mahu Padam Item {{$item->nama}}?<p>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                      <form method="post" action="/home/page/item/delete">
                                          @csrf
                                          @method('DELETE')
                                          <input type="hidden" value="{{$page->id}}" name="pageId">
                                          <input type="hidden" value="{{$item->id}}" name="itemId">
                                          <button class="btn btn-danger">YA</button>
                                      </form>
                                  </div>
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
                <h2 class="frame9402-text01" style="color:black; margin-bottom:5%;"> Tiada Item </h2>
            @endif
        </div>
      </div>
    </div>
</div>

<style>
    .arial-N{
      font-family: 'Arial', sans-serif;
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
        font-family: 'Arial', sans-serif;
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
        font-family: 'Arial', sans-serif;
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
        font-family: 'Arial', sans-serif;
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
        font-family: 'Arial', sans-serif;
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
      font-family: Arial;
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
      margin-right: 10%;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    padding-left:10px;
    text-transform: uppercase;
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
</script>
@endsection