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
</style>
<div class="frame9403-frame9403">
    <div class="frame9403-frame9401">
        <span class="frame9403-text"><span>KEMASKINI KATEGORI PENGGUNA</span></span>
        <span class="frame9403-text02">
          <span>Sila isikan maklumat berikut dengan betul.</span>
        </span>
    </div>
    <form method="post" action="/pengurusanPengguna/kemaskiniKategoriPengguna" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$kategoriPengguna->id}}" name="kategoriId">
  
        <div class="frame9403-frame9330">
            <div class="frame9403-frame9399">
                <div class="frame9403-frame7301">
                    <div class="frame9403-group71881">
                        <span class="frame9403-text04"><span>Nama kategori </span></span>
                        <input type="text" class="frame9403-kotaknama" value="{{$kategoriPengguna->nama}}" name="kategoriPengguna">
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="frame9403-frame7445">
            <div class="frame9403-frame7293">
                <span class="frame9403-text21"><span>Kemaskini</span></span>
                <img src="/SVG/kemaskini.svg" class="frame9403-group7527"/>
            </div>
        </button>
    </form>
</div>

@endsection