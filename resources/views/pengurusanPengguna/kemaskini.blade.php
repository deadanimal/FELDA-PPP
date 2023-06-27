@extends('layouts.guest')

@section('innercontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">KEMASKINI MAKLUMAT PENGGUNA</h1>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title mb-0">Sila isi maklumat berikut dengan betul.</h5>
      </div>
      <div class="card-body">
        <form action="/users/{{$user->id}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label for="nama" class="labeltext">Nama</label>
                  <input type="text" class="form-control frame9403-kotaknama text-upp" maxlength="100" size="100"
                  value="{{ $user->nama }}" name="nama" id="nama" oninput="this.value = this.value.toUpperCase()">
              </div>
              <div class="mb-3 col-md-6">
                  <label for="idPengguna" class="labeltext">ID Pengguna</label>
                  <input type="text" class="form-control frame9403-kotaknama" maxlength="12" size="12"
                  value="{{ $user->idPengguna }}" name="idPengguna" id="idPengguna">
              </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="nama" style="font-family:'Arial', sans-serif">Nama Peneroka Asal</label>
              <input type="text" class="form-control frame9403-kotaknama" maxlength="100" size="100" name="nama_asal" id="nama" oninput="this.value = this.value.toUpperCase()" value="{{$user->nama_asal}}">
            </div>
            <div class="mb-3 col-md-6">
              <label for="nokadpengenalan" style="font-family:'Arial', sans-serif">No. Kad Pengenalan Peneroka Asal</label>
              <input type="text" class="form-control frame9403-kotaknama" id="nokadpengenalan" name="nokadpengenalan_asal" maxlength="12" minlength="12"
              size="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{$user->nokadpengenalan_asal}}">
            </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label for="email" class="labeltext">Emel</label>
                  <input type="email" class="form-control frame9403-kotaknama " value="{{ $user->email }}" name="email" id="email">
              </div>
              <div class="mb-3 col-md-6">
                  <label for="noTelefon" class="labeltext">No. Telefon</label>
                  <input type="text" class="form-control frame9403-kotaknama" id="noTelefon" name="noTelefon" data-mask="000-000 0000" autocomplete="off"  maxlength="11" size="11"
                  value="{{ $user->notelefon }}" required>
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label for="nokadpengenalan" class="labeltext">No. Kad Pengenalan</label>
                  <input type="text" class="form-control frame9403-kotaknama" id="nokadpengenalan" name="nokadpengenalan" maxlength="12"
                  size="12" data-mask="000000-00-0000" data-reverse="true"
                  value="{{ $user->nokadpengenalan }}" required>
              </div>
              <div class="mb-3 col-md-6">
                  <label for="wilayah" class="labeltext">Peringkat</label>
                  <select name="wilayah" id="wilayah" class="form-control frame9403-kotaknama3 ">
                    <option value="{{ $user->wilayah }}" selected style="display:none">
                        {{ $user->wilayah_id->nama }}</option>
                    @foreach ($wilayah as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                  <label for="inputLastName" class="labeltext">Kategori Pengguna</label>
                  <select name="kategoripengguna" name="kategoriPengguna" class="form-control frame9403-kotaknama3 ">
                      <option value="{{ $user->kategoripengguna }}" selected style="display:none">
                          {{ $user->kategori->nama }}</option>
                      @foreach ($kategoriPengguna as $kategoriPenggunas)
                          <option value="{{ $kategoriPenggunas->id }}">{{ $kategoriPenggunas->nama }}</option>
                      @endforeach
                  </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="rancangan" class="labeltext">Rancangan</label>
                <select name="rancangan" id="rancangan" class="form-control frame9403-kotaknama3 " required>
                    <option value="{{ $user->rancangan }}" selected style="display:none">
                        {{ $user->rancangan_id->nama }}</option>
                </select>
              </div>
          </div>
          <div class="row">
              <div class="mb-3 col-md-6">
                <label for="passcode" class="labeltext">Kata Laluan</label>
                <div style="display: flex; flex-direction: row; align-items: center;">
                  <input type="password" id="passcode" class="form-control frame9403-kotaknama" name="password" minlength="8">
                  <i class="far fa-eye" onclick="showPassFunction()" id="iconPass" style="margin-left: 10px"></i>
                </div>
              </div>
          </div>
          <button type="submit" class="frame9403-frame7445">
            <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kemaskini</span></span>
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
  .labeltext{
    font-family: 'Arial', sans-serif;
  }
  .text-upp{
    text-transform: uppercase;
  }
  .frame9403-kotaknama {
    top: 0px;
    width: 454px;
    height: 50px;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    color: #161616;
    font-family: 'Arial', sans-serif;
    font-size: 17.3081px;
    padding-left:10px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
  }
  .frame9403-kotaknama3 {
    top: 0px;
    width: 454px;
    height: 50px;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    background:url('/SVG/arrow2.svg') no-repeat;
    background-position:99% center;
    font-family: 'Arial', sans-serif;
    display:block;
    font-size: 17.3081px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
  }
  .frame9403-frame7445 {
      width: 157px;
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
    width: 91px;
    height: auto;
    font-size: 16px;
    align-self: auto;
    text-align: left;
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
<script src="/js/jquery.js"></script>
<script>
  $(document).ready(function(){
  $('select[name="wilayah"]').on('change',function(){
      var wilayahid= $(this).val();
      var newUrl = window.location.protocol + "//" + window.location.host;
      if (wilayahid) {
        $.ajax({
          url: newUrl+"/getRancangan/"+wilayahid,
        type: "GET",
        dataType: "json",
        success: function(data){
          console.log(data);
          $('select[name="rancangan"]').empty();
          $.each(data,function(key,value){
            $('select[name="rancangan"]').append('<option value="'+value.id+'">'+value.nama+'</option>');
          });
        }
        });
      }else {
            $('select[name="rancangan"]').empty();
      }
  });
});
function showPassFunction(){
  var x = document.getElementById("passcode");
  var eye = document.getElementById("iconPass");
  if (x.type === "password") {
    eye.classList.toggle('fa-eye-slash');
    x.type = "text";
  } else {
    x.type = "password";
    eye.classList.remove('fa-eye-slash');
  }
}
</script>
@endsection