@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
      <h1 class="header-title">
          TUGASAN BORANG {{$borang->namaBorang}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$borang->proses->modul->id}}/proses">{{$borang->proses->modul->nama}}</a></li>
          <li class="breadcrumb-item"><a href="/moduls/{{$borang->proses->modul->id}}/{{$borang->proses->id}}/borang">{{$borang->proses->nama}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tugasan</li>
        </ol>
      </nav>
    </div>
    
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
              <table style="width: 100%">
                <tr>
                  <td><h1 style="font-family: 'Arial', sans-serif; font-size:23px;">Senarai Tugasan</h1></td>
                  <td>
                    <button class="frame9403-frame7445"  data-toggle="modal" data-target="#exampleModalAddTugasan">
                      <div class="frame9403-frame7293">
                      <span class="frame9403-text21"><span>Cipta Tugasan</span></span>
                      <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                      </div>
                    </button>
                  </td>
                </tr>
              </table>
            </div>
    
            {{-- ModalTambah Tugasan --}}
            <div class="modal fade" id="exampleModalAddTugasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="min-width: fit-content;">
                  <div class="modal-header">
                    <h2 class="modal-title frame9402-text01" style="margin-top: 0px;">CIPTA TUGASAN</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="/moduls/borang/tugasan/add" method="POST">
                    @csrf
                    <div class="modal-body">
                      <table>
                        <tr>
                          <td>
                            <label for="perkara" class="frame9402-text04">
                              <strong>Perkara</strong>
                            </label>
                          </td>
                          <td>
                            <input type="text" class="frame9402-kotaknamaBorang" id="perkara" placeholder="Perkara Tugasan" name="perkara" required oninput="this.value = this.value.toUpperCase()">
                          </td>
                        </tr>
                        <tr>
                          <td style="vertical-align: middle;">
                            <label for="userCategory" class="frame9402-text04">
                              <strong>Kategori Pengguna</strong>
                            </label>
                          </td>
                          <td style="vertical-align: middle;">
                            <select name="category" class="frame9402-kotaknamaBorang" id="userCategory">
                              @foreach($user_Categories as $category)
                                <option value="{{$category->id}}">{{$category->nama}}</option>
                              @endforeach
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label for="Tarikh" class="frame9402-text04">
                              <strong>Tarikh Sasaran</strong>
                            </label>
                          </td>
                          <td>
                            <input type="date" class="frame9402-kotaknamaBorang" id="tarikh" name="tarikh" min="{{ date('Y-m-d')}}" required>
                          </td>
                        </tr>
                        <tr>
                            <td>
                              <label for="jenis" class="frame9402-text04">
                                <strong>Jenis Input</strong>
                              </label>
                            </td>
                            <td>
                                <select name="jenis" class="frame9402-kotaknamaBorang" id="jenis">
                                    <option value="Text">Text</option>
                                    <option value="File">File</option>
                                    <option value="P.O">P.O</option>
                                </select>                            
                            </td>
                          </tr>
                      </table>
                    </div>
                    <input type="hidden" value="{{$borang->id}}" name="borang_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary">Cipta</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    
            {{-- senarai Tugasan --}}
            @if (!$tugasans->isEmpty())
            <table class="table table-bordered table-striped w-100 arial">
              <thead class="text-white bg-primary w-100 arial">
                <tr class="text-center">
                    <th scope="col" class="text-center">Perkara</th>
                    <th scope="col" class="text-center">Pengguna Ditugaskan</th>
                    <th scope="col" class="text-center">Tarikh</th>
                    <th scope="col">Tindakan</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($tugasans as $tugasan)
                  <tr>
                    <td class="text-center arial" style="width:50%">{{$tugasan->perkara}}</td>
                    <td class="text-center arial" style="text-transform: uppercase;">{{$tugasan->KategoriPengguna->nama}}</td>
                    <td class="text-center arial">{{$tugasan->due_date}}</td>
                    <td class="text-center arial">

                        @if ($tugasan->jenis_input == "P.O")
                            <a href="/moduls/medanPO/{{$tugasan->id}}/List"><i class="align-middle me-2 fas fa-fw fa-file-invoice-dollar" style="color: #CD352A; font-size:27px;" title="PESANAN PEMBELIAN"></i></a>
                        @endif
                        <button class=" btn frame9402-rectangle828246" style="margin-left: 0px;" title="Kemaskini" data-toggle="modal" data-target="#exampleModaledit{{$tugasan->id}}"><img src="/SVG/pencil.svg" title="kemaskini"/></button>
                          
                        <div class="modal fade" id="exampleModaledit{{$tugasan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Tugasan</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <form action="/moduls/borang/tugasan/update" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                          <tr>
                                            <td>
                                              <label for="perkara" class="frame9402-text04">
                                                <strong>Perkara</strong>
                                              </label>
                                            </td>
                                            <td>
                                              <input type="text" class="frame9402-kotaknamaBorang" id="perkara" value="{{$tugasan->perkara}}" name="perkara" required oninput="this.value = this.value.toUpperCase()">
                                            </td>
                                          </tr>
                                          <tr>
                                            <td style="vertical-align: middle;">
                                              <label for="userCategory" class="frame9402-text04">
                                                <strong>Kategori Pengguna</strong>
                                              </label>
                                            </td>
                                            <td style="vertical-align: middle;">
                                              <select name="category" class="frame9402-kotaknamaBorang" id="category">
                                                @foreach($user_Categories as $category)
                                                    @if($tugasan->userCategory_id == $category->id)
                                                        <option value="{{$category->id}}" selected>{{$category->nama}}</option>
                                                    @else
                                                        <option value="{{$category->id}}">{{$category->nama}}</option>
                                                    @endif
                                                @endforeach
                                              </select>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <label for="Tarikh" class="frame9402-text04">
                                                <strong>Tarikh Sasaran</strong>
                                              </label>
                                            </td>
                                            <td>
                                              <input type="date" value="{{$tugasan->due_date}}" class="frame9402-kotaknamaBorang" id="tarikh" name="tarikh" min="{{ date('Y-m-d')}}" required>
                                            </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                <label for="jenis" class="frame9402-text04">
                                                  <strong>Jenis Input</strong>
                                                </label>
                                              </td>
                                              <td>
                                                  <select name="jenis" class="frame9402-kotaknamaBorang" id="jenis">
                                                      <option value="{{$tugasan->jenis_input}}" selected>{{$tugasan->jenis_input}}</option>
                                                      <option value="Text">Text</option>
                                                      <option value="File">File</option>
                                                      <option value="P.O">P.O</option>
                                                  </select>                            
                                              </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <input type="hidden" value="{{$tugasan->id}}" name="tugasanID">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">BATAL</button>   
                                        <button class="btn btn-danger">KEMASKINI</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>
                      
                        <button type="button" class="btn frame9402-rectangle828246" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModaltugas{{$tugasan->id}}" title="Padam"><img src="/SVG/bin.svg"/></button>
        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaltugas{{$tugasan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Padam Tugasan {{$tugasan->nama}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda Pasti Mahu Padam Tugasan {{$tugasan->perkara}}?<p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>      
                                    <form method="post" action="/moduls/borang/tugasan/delete">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" value="{{$tugasan->Borang->id}}" name="borang_id">
                                        <input type="hidden" value="{{$tugasan->id}}" name="tugasanID">
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
              <h2 class="frame9402-text01" style="color:black; padding-bottom: 5%;"> Tiada Tugasan </h2>
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
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<style>
    .table-borderless > tbody > tr > td,
    .table-borderless > tbody > tr > th,
    .table-borderless > tfoot > tr > td,
    .table-borderless > tfoot > tr > th,
    .table-borderless > thead > tr > td,
    .table-borderless > thead > tr > th {
        border: none;
        background-color: white;
    }
    .arial-N{
      font-family: 'Arial-N', sans-serif;
      font-size: 18px;
      text-transform: uppercase;
    }
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
            font-family: 'Eina01-SemiBold', sans-serif;
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
            text-transform: uppercase;
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
      font-family: 'Arial', sans-serif;
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
      height: 44px;
      display: flex;
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
      margin-right: 2%;
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
        margin-bottom: 10px;
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
@endsection