@extends('layouts.guest')

@section('innercontent')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                KEMASKINI PROFIL
            </h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Sila isi maklumat anda dengan betul.</h5>
            </div>
            <div class="card-body">
                <form action="/users/update" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ Auth::user()->id }}" name="id">
        
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nama" class="labeltext">Nama</label>
                            <input type="text" class="form-control frame9403-kotaknama" maxlength="100" size="100"
                            value="{{ Auth::user()->nama }}" name="nama" id="nama"
                            @if (Auth::user()->kategoripengguna != 1) readonly @endif >
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="idPengguna" class="labeltext">ID Pengguna</label>
                            <input type="text" class="form-control frame9403-kotaknama" maxlength="12" size="12"
                            value="{{ Auth::user()->idPengguna }}" name="idPengguna" id="idPengguna" required
                            @if(Auth::user()->kategoripengguna !="4"){
                                readonly
                            }
                            @endif>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="email" class="labeltext">Emel</label>
                            <input type="email" class="form-control frame9403-kotaknama" value="{{ Auth::user()->email }}" name="email" id="email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="noTelefon" class="labeltext">No. Telefon</label>
                            <input type="text" class="form-control frame9403-kotaknama" id="noTelefon" name="noTelefon" data-mask="000-000 0000" autocomplete="off"  maxlength="11" size="11"
                            value="{{ Auth::user()->notelefon }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="nokadpengenalan" class="labeltext">No. Kad Pengenalan</label>
                            <input type="text" class="form-control frame9403-kotaknama" id="nokadpengenalan" name="nokadpengenalan" maxlength="12"
                            size="12" data-mask="000000-00-0000" data-reverse="true"
                            value="{{ Auth::user()->nokadpengenalan }}" required
                            @if (Auth::user()->kategoripengguna != 1) readonly @endif>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="wilayah" class="labeltext">Peringkat</label>
                        @if (Auth::user()->kategoripengguna == 1)
                            <select name="wilayah" id="wilayah" class="form-control frame9403-kotaknama3">
                                <option value="{{ Auth::user()->wilayah }}" selected style="display:none">
                                    {{ Auth::user()->wilayah_id->nama }}</option>
                                @foreach ($wilayah as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        @else
                            <input type="text" name="showWilayah"class="form-control frame9403-kotaknama3"
                                value="{{ Auth::user()->wilayah_id->nama }}" readonly>
                            <input type="hidden" name="wilayah" value="{{ Auth::user()->wilayah }}">
                        @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="inputLastName" class="labeltext">Kategori Pengguna</label>
                            @if (Auth::user()->kategoripengguna == 1)
                                <select name="kategoripengguna" name="kategoriPengguna" class="form-control frame9403-kotaknama3">
                                    <option value="{{ Auth::user()->kategoripengguna }}" selected style="display:none">
                                        {{ Auth::user()->kategori->nama }}</option>
                                    @foreach ($kategoriPengguna as $kategoriPenggunas)
                                        <option value="{{ $kategoriPenggunas->id }}">{{ $kategoriPenggunas->nama }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="text" name="showkategoripengguna" class="form-control frame9403-kotaknama3"
                                    value="{{ Auth::user()->kategori->nama }}" readonly>
                                <input type="hidden" name="kategoripengguna" value="{{ Auth::user()->kategoripengguna }}">
                            @endif
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="rancangan" class="labeltext">Rancangan</label>
                        @if (Auth::user()->kategoripengguna == 1)
                            <select name="rancangan" id="rancangan" class="form-control frame9403-kotaknama3" required>
                                <option value="{{ Auth::user()->rancangan }}" selected style="display:none">
                                    {{ Auth::user()->rancangan_id->nama }}</option>
                            </select>
                        @else
                            <input type="text" name="showRancangan"class="form-control frame9403-kotaknama3"
                                value="{{ Auth::user()->rancangan_id->nama }}" readonly>
                            <input type="hidden" name="rancangan" value="{{ Auth::user()->rancangan }}">
                        @endif
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
    </div>
<style>
   
.frame9403-kotaknama {
    top: 0px;
    width: 454px;
    height: 50px;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    font-family: 'Eina01-SemiBold', sans-serif;
    color: #161616;
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
    font-family: 'Eina01-SemiBold', sans-serif;
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
.labeltext{
    font-family:'Poppins';
}
</style>
<script src="/js/jquery.js"></script>
<script>
  
$(document).ready(function(){
  $('select[name="wilayah"]').on('change',function(){
      var wilayahid= $(this).val();
      if (wilayahid) {
        $.ajax({
          url: "{{url('/getRancangan/')}}/"+wilayahid,
        type: "GET",
        dataType: "json",
        success: function(data){
          console.log(data);
          $('select[name="rancangan"]').empty();
          $.each(data,function(key,value){
              $('select[name="rancangan"]').append('<option value="'+key+'">'+value+'</option>');
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