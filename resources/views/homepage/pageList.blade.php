@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid">

  <div class="header">
    <h1 class="header-title">
        Tetapan Laman
    </h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="/moduls">Modul</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$modul->nama}}</li> --}}
      </ol>
    </nav>
  </div>
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <table style="width: 100%">
                    <tr>
                        <td>
                            <h2 class="modal-title">Senarai Laman</h2>
                        </td>
                        <td>
                            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAddProses">
                            <div class="frame9403-frame7293">
                            <span class="frame9403-text21"><span>Tambah Laman</span></span>
                            <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                            </div>
                        </button>
                        </td>
                    </tr>
                </table>
            </div>

            {{-- Modal form Tambah proses --}}
            <div class="modal fade" id="exampleModalAddProses" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">Cipta Laman</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/page/add" method="POST">
                    @csrf
                    <div class="modal-body">
                    <label for="pageName" class="frame9402-text04">
                        <strong>Nama Laman</strong>
                    </label>
                    <input type="text" class="frame9402-kotaknamaProses" id="pageName" placeholder="Nama Laman" name="pageName" required oninput="this.value = this.value.toUpperCase()">
                    <input type="hidden" value="{{count($pages)+1}}" name="sequence">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Tambah</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        
            @if (!$pages->isEmpty())
                @php
                    $var = 0;
                @endphp
                <table class="table table-bordered table-striped w-100 arial">
                <thead class="text-white bg-primary w-100 arial">
                    <tr>
                        <th scope="col" class="text-center">Nama Laman</th>
                        <th scope="col" class="text-center">Turutan</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center" style="width:20%">Tindakan</th>
                    </tr>
                </thead>
                <tbody style="back">
                    @foreach ($pages as $page)
                    <tr>
                        <td class="text-center arial" style="text-transform: uppercase;">{{$page->nama}}</td>
                        <td class="text-center arial" style="text-transform: uppercase;">{{$page->sequence}}</td>
                        <td class="text-center arial" style="text-transform: uppercase;">
                            @if ($page->status == "Active")
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                        </td>
                        <td class="text-center arial">

                            <a href="home/page/{{$page->id}}/item" class=" btn frame9402-rectangle828246" style="margin-left: 0px;" title="Masuk">
                                <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A; width: 32px; height: 30px;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
                            </a>

                            <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModalEdit{{$page->id}}" title="Padam"><img src="/SVG/pencil.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalEdit{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Kemaskini Laman {{$page->nama}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/home/page/update" method="POST" class="frame9402-frame9278">
                                            @csrf
                                            @method("PUT")
                                            <div class="modal-body">
                                                <input type="hidden" name="pageId" value="{{$page->id}}">
                                                <table class="table table-borderless">
                                                    <tr scope="row" style="background-color: #fff">
                                                        <td>
                                                            <label for="pageName" class="frame9402-text04">
                                                                <strong>Nama Laman</strong>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="frame9402-kotaknamaProses" id="pageName" value="{{$page->nama}}" name="pageName" required oninput="this.value = this.value.toUpperCase()">
                                                        </td>
                                                    </tr>
                                                    <tr scope="row" style="background-color: #fff">
                                                        <td>
                                                            <label for="status" class="frame9402-text04">
                                                                <strong>Status</strong>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <select name="status" class="frame9402-kotaknamaProses">
                                                                <option value="Active" 
                                                                @if ($page->status == "Active")
                                                                    selected
                                                                @endif>Aktif</option>
                                                                <option value="Inactive"
                                                                @if ($page->status == "Inactive")
                                                                    selected
                                                                @endif>Tidak Aktif</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr scope="row" style="background-color: #fff">
                                                        <td>
                                                            <label for="pageSequence" class="frame9402-text04">
                                                                <strong>Turutan</strong>
                                                            </label>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="frame9402-kotaknamaProses" id="pageSequence" value="{{$page->sequence}}" name="sequence" required oninput="this.value = this.value.toUpperCase()">
                                                        </td>
                                                    </tr>
                                                </table>
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger">Ya</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModalDel{{$page->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalDel{{$page->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Padam Laman {{$page->nama}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda Pasti Mahu Padam laman {{$page->nama}}?<p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                        <form method="post" action="/home/page/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{$page->id}}" name="pageId">
                                            <button class="btn btn-danger">YA</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @php
                        if ($var == $page->sequence) {
                        Alert::warning('Terdapat Duplikasi.', 'Terdapat duplikasi pada turutan Laman.');   
                        }
                        $var = $page->sequence;
                    @endphp
                    @endforeach 
                </tbody>
                </table>
            @else
                <h2 class="frame9402-text01" style="color:black; margin-bottom:5%;"> Tiada Laman</h2>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <table style="width: 100%">
                    <tr>
                        <td><h2 class="modal-title">Senarai Dokumen</h2></td>
                        <td>
                            <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModaladdDoc">
                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Tambah Dokumen</span></span>
                                    <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                                </div>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>

            @php
                foreach($errors->all() as $error) {
                    Alert::error('Tidak Berjaya.', $error);   
                }
            @endphp

            {{-- Modal Tambah Doc --}}
            <div class="modal fade" id="exampleModaladdDoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">TAMBAH DOKUMEN</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="/home/document/add" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <label for="title" class="frame9402-text04">
                                    <strong>Tajuk Dokumen</strong>
                                </label>
                                <input type="text" class="frame9402-kotaknamaBorang" style="text-transform: unset; width:-webkit-fill-available"  id="title" placeholder="Tajuk" name="name" required oninput="this.value = this.value.toUpperCase()">
                                <label for="document" class="frame9402-text04">
                                    <strong>Muat Naik Dokumen</strong>
                                </label>
                                <input id="document" type="file" name="dokumen" required/>
                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- senarai Slider --}}
            @if (!$docs->isEmpty())
            <table class="table table-bordered table-striped w-100">
                <thead class="text-white bg-primary w-100">                    
                    <tr class="text-center">
                        <th class="text-center" style="width: 1%">No.</th>
                        <th class="text-center"  style="width: 40%">Tajuk</th>
                        <th class="text-center">Dokumen</th>
                        <th class="text-center" style="width: 20%;">Tindakan</th>
                    </tr>
                </thead>
                <tbody>          
                    @foreach ($docs as $doc)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center arial-N">{{ $doc->name }}</td>
                        <td class="text-center arial-N">
                                <a href="{{ $doc->dokumen }}">Lihat Dokumen</a>
                        </td>
                        <td class="text-center align-middle">
                            <!-- Button trigger modal update-->
                            <button type="button" class="frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#updateModalDoc{{$doc->id}}">
                                <img src="/SVG/pencil.svg"/>
                            </button>
        
                            <!-- Modal update-->
                            <div class="modal fade" id="updateModalDoc{{$doc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">KEMASKINI {{$doc->question}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form method="post" action="/home/document/update" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <label for="title" class="frame9402-text04">
                                                    <strong>Tajuk</strong>
                                                </label>
                                                <input type="text" class="frame9402-kotaknamaBorang" id="title" style="text-transform: unset; width:-webkit-fill-available" value="{{$doc->name}}" name="name" required oninput="this.value = this.value.toUpperCase()">
                                                <label for="document" class="frame9402-text04">
                                                    <strong>Muat Naik Dokumen</strong>
                                                </label>
                                                <p><a href="{{ $doc->dokumen }}">Lihat dokumen</a> yang telah dimuat naik</p>
                                                <input id="document" type="file" name="dokumen"/>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                <input type="hidden" value="{{$doc->id}}" name="docId">
                                                <button class="btn btn-primary">Kemaskini</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Button trigger modal delete -->
                            <button type="button" class="frame9402-rectangle828246" style="margin-left: 10%" data-toggle="modal" data-target="#deleteModalDoc{{$doc->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>

                            <!-- Modal -->
                            <div class="modal fade" id="deleteModalDoc{{$doc->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Padam Dokumen</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda Pasti Mahu Padam Dokumen {{$doc->name}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                            <form method="post" action="/home/document/delete">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="docId" value="{{$doc->id}}"/>
                                            <button class="btn btn-danger">YA</button>
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
            <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Dokumen </h2>
            @endif
        </div>
    </div>
  </div>
</div>
<style>
    .arial{
        font-family: 'Arial', sans-serif;
    }
  .frame9402-text04 {
    color: black;
    height: auto;
    font-size: 17px;
    align-self: auto;
    text-align: left;
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    margin-right: 10px;
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
      font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
    font-size: 18px;
    padding-left:10px;
  text-transform: uppercase;
  }
    .formContainer .btn {
      padding: 12px 20px;
      border: none;
      background-color: #8ebf42;
      color: #fff;
      font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    font-family: 'Arial', sans-serif;
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
    box-sizing: border-box;
    padding-right: 10px;
    border: none;
    background-color: rgba(0, 0, 0, 0)
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