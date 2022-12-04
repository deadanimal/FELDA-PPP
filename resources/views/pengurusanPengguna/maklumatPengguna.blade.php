@extends('layouts.guest')

@section('innercontent')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
.frame9403-frame9403 {
  width: 100%;
  height:100%;
  display: flex;
  padding: 67px 48px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
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
  width: 737px;
  height: auto;
  font-size: 18px;
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
.frame9403-frame9330 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 43px;
}
.frame9403-frame9399 {
  height: 281px;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 66px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}
.frame9403-frame7301 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
}
.frame9403-text04 {
  color: #494949;
  width: 115px;
  height: auto;
  font-size: 17.3081px;
  align-self: center;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  text-decoration: none;
}
.frame9403-kotaknama {
  top: 0px;
  left: 132px;
  width: 454px;
  height: 50px;
  position: absolute;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  border-radius: 3.461621046066284px;
  color: #161616;
  font-family: Eina01-SemiBold;
  font-size: 17.3081px;
  padding-left:10px;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
}
.frame9403-frame9278 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
}
.frame9403-group71881 {
  width: 586px;
  height: 50.000030517578125px;
  display: flex;
  padding: 0;
  position: relative;
  align-self: auto;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 1;
  border-color: transparent;
  border-style: none;
  border-width: 0;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: row;
  justify-content: flex-start;
  background-color: transparent;
}
.frame9403-frame9281 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
}
.frame9403-frame7188 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9403-frame9283 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
}
.frame9403-kotaknama3 {
  top: 0px;
  left: 132px;
  width: 467px;
  height: 50px;
  position: absolute;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  border-radius: 3.461621046066284px;
  background:url('/SVG/arrow2.svg') no-repeat;
  background-position:99% center;
  display:block;
  font-family: 'Eina01-SemiBold';
  font-size: 17.3081px;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
}

.select-selected {
    color: #AFAFAF;
}

.select-selected.select-active {
    color: #161616;
}
.frame9403-kotaknama3 select {
  display: none; /*hide original SELECT element:*/
}

.select-items div,.select-selected {  
  font-family: 'Eina01-SemiBold';
  font-size:17.3081px;
  padding-left: 7px;
  padding-top: 15px;
  cursor: pointer;
  user-select: none;
  padding-bottom: 10px;
  gap: 10px;
  opacity: 1;
}
.select-items div{
  color: #161616;
  font-family: 'Eina01-SemiBold';
  font-size: 15px;
  padding-left: 7px;
  padding-top: 10px;
  cursor: pointer;
  user-select: none;
    padding-bottom: 10px;
  margin-top: 3px;
  background-color: rgba(120, 30, 42, 0.1);
  opacity: 1;
}
.select-items {
  position: absolute;
  background-color: #FFFFFF;
  top: 100%;
  left: 0;
  right: 0;
  border: 0.865405px solid #8C263C;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
  border-radius: 3.46162px;
  padding: 7px 0px;
  gap: 2px;
  z-index: 10000;
}
.select-hide {
  display: none;
}
.select-items div:hover, .same-as-selected {
  background-color: rgba(120, 30, 42, 0.12);
}

.frame9403-frame9396 {
  height: 274px;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
}
.frame9403-frame9279 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
}
.frame9403-frame9280 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
}
.frame9403-frame92801 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 20px;
  flex-direction: column;
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
  margin-left:1095px;
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

</style>
<div class="frame9403-frame9403">
  <div class="frame9403-frame9401">
      <span class="frame9403-text"><span>KEMASKINI PROFIL PENGGUNA</span></span>
      <span class="frame9403-text02">
        <span>Sila isikan maklumat anda berikut dengan betul.</span>
      </span>
  </div>
  <form action="/pengurusanPengguna/kemaskiniProfil" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" value="{{Auth::user()->id}}" name="id">

    <div class="frame9403-frame9330">
      <div class="frame9403-frame9399">
        <div class="frame9403-frame7301">
          <div class="frame9403-group71881">
            <span class="frame9403-text04"><span>Nama</span></span>
            <input type="text" class="frame9403-kotaknama" maxlength="100" size="100" 
            value="{{Auth::user()->nama}}" name="nama"
            @if (Auth::user()->kategoripengguna != 1)
                readonly
            @endif
            />
          </div>
        </div>
        <div class="frame9403-frame9281">
          <div class="frame9403-group71881">
              <span class="frame9403-text04"><span>E-mel</span></span>
              <input type="email" class="frame9403-kotaknama" value="{{Auth::user()->email}}" name="email">
          </div>
        </div>
        <div class="frame9403-frame9278">
          <div class="frame9403-group71881">
            <span class="frame9403-text04">
              <span>
                <span>No. Kad</span>
                <br />
                <span>Pengenalan</span>
              </span>
              <input class="frame9403-kotaknama" type="text" name="nokadpengenalan" maxlength="12" size="12" 
               oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" 
               value="{{Auth::user()->nokadpengenalan}}" required
               @if (Auth::user()->kategoripengguna != 1)
                    readonly
               @endif/>
            </span>
          </div>
        </div>
        <div class="frame9403-frame9283">
          <div class="frame9403-group71881">
            <label for="kategoriPengguna" class="frame9403-text04">
                <span>Kategori Pengguna</span>
            </label>
            @if (Auth::user()->kategoripengguna == 1)
                <select name="kategoripengguna" name="kategoriPengguna" class="frame9403-kotaknama3">
                    <option value="{{Auth::user()->kategoripengguna}}" selected style="display:none">{{Auth::user()->kategori->nama}}</option>
                    @foreach ($kategoriPengguna as $kategoriPenggunas)
                    <option value="{{ $kategoriPenggunas->id }}">{{ $kategoriPenggunas->nama }}</option>
                    @endforeach
                </select>
            @else
            <input type="text" name="showkategoripengguna"class="frame9403-kotaknama" value="{{Auth::user()->kategori->nama}}" readonly>
            <input type="hidden" name="kategoripengguna" value="{{Auth::user()->kategoripengguna}}">
            @endif
          </div>
        </div>
        <div class="frame9403-frame9281">
          <div class="frame9403-group71881">
            <span class="frame9403-text04"><span> Kata Laluan</span></span>
            <i class="far fa-eye" onclick="showPassFunction()" style="position: absolute;
              right: -50px; padding: 10px 12px;margin-top: 9px; cursor: pointer;" id="iconPass"></i>
            <input type="password" id="passcode" class="frame9403-kotaknama" name="password" minlength="8">
          </div>
        </div>
      </div>
      <div class="frame9403-frame9396">
        <div class="frame9403-frame9279">
          <div class="frame9403-group71881">
            <span class="frame9403-text04"><span>ID Pengguna</span></span>
            <input type="text" class="frame9403-kotaknama" maxlength="12" size="12" 
            value="{{Auth::user()->idPengguna}}" name="idPengguna"
            @if (Auth::user()->kategoripengguna != 1)
                readonly
            @endif>
          </div>
        </div>
        <div class="frame9403-frame9280">
          <div class="frame9403-group71881">
            <span class="frame9403-text04"><span>No. Telefon</span></span>
            <input type="text" class="frame9403-kotaknama" name="noTelefon" maxlength="11" size="11" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{Auth::user()->notelefon}}" required>
          </div>
        </div>
        <div class="frame9403-frame92801">
          <div class="frame9403-group71881">
            <label for="wilayah" class="frame9403-text04">Peringkat</label>
            @if (Auth::user()->kategoripengguna == 1)
                <select name="wilayah" id="wilayah" class="frame9403-kotaknama3">
                    <option value="{{Auth::user()->wilayah}}" selected style="display:none">{{Auth::user()->wilayah_id->nama}}</option>
                    @foreach ($wilayah as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            @else
                <input type="text" name="showkategoripengguna"class="frame9403-kotaknama" value="{{Auth::user()->wilayah_id->nama}}" readonly>
                <input type="hidden" name="kategoripengguna" value="{{Auth::user()->wilayah}}">
            @endif
          </div>
        </div>
        <div class="frame9403-frame92802">
          <div class="frame9403-group71881">
            <label for="rancangan" class="frame9403-text04">Rancangan</label>
            @if (Auth::user()->kategoripengguna == 1)
                <select name="rancangan" id="rancangan" class="frame9403-kotaknama3" required>
                    <option value="{{Auth::user()->rancangan}}" selected style="display:none">{{Auth::user()->rancangan_id->nama}}</option>
                </select>
            @else
                <input type="text" name="showkategoripengguna"class="frame9403-kotaknama" value="{{Auth::user()->rancangan_id->nama}}" readonly>
                <input type="hidden" name="kategoripengguna" value="{{Auth::user()->rancangan}}">
            @endif
            
          </div>
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