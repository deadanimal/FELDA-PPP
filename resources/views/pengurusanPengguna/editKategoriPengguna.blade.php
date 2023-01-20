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
  font-family: 'Poppins', sans-serif;
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
  font-family: 'Poppins', sans-serif;
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
  font-family: 'Eina01-SemiBold', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  text-decoration: none;
}
.frame9403-kotaknama {
  width: 454px;
  height: 50px;
  position: relative;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  border-radius: 3.461621046066284px;
  color: #161616;
  font-family: 'Eina01-SemiBold', sans-serif;
  font-size: 17.3081px;
  padding-left:10px;
  text-transform: uppercase;
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
  margin-top: 20px;
  justify-content: center;
  background-color: #A2335D;
  margin-left:5%;
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
.frame9403-group71881 {
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
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">
      KEMASKINI KATEGORI PENGGUNA
    </h1>
  </div>
  <div class="card">
    <div class="card-header">
      <h5 class="card-title mb-0">Sila isikan maklumat anda berikut dengan betul.</h5>
  </div>
  <div class="card-body">
    <form method="post" action="/user-categories" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$kategoriPengguna->id}}" name="kategoriId">
        <div class="frame9403-group71881">
            <span class="frame9403-text04"><span>Nama kategori </span></span>
            <input type="text" class="frame9403-kotaknama" value="{{$kategoriPengguna->nama}}" name="kategoriPengguna">
        </div>
        <button type="submit" class="frame9403-frame7445">
          <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kemaskini</span></span>
              <img src="/SVG/kemaskini.svg" class="frame9403-group7527"/>
          </div>
        </button>
    </form>
  </div>
</div>

@endsection