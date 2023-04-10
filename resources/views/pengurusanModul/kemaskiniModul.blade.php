@extends('layouts.guest')

@section('innercontent')
<style>
.frame9402-frame9402 {
  width: 100vw;
  display: flex;
  position: relative;
  box-sizing: border-box;
  flex-shrink: 0;
  border-color: transparent;
  border-radius: 0px 0px 0px 0px;
  margin: 0;
  flex-direction: column;
}
.frame9402-frame9281 {
  display: flex;
  padding: 58px 339px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 32px;
  flex-direction: column;
  background-color: #F1F1F1;
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
  font-family: 'Arial', sans-serif;
  font-weight: 600;
  line-height: 12.976823806762695px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 13px;
  text-decoration: none;
}
.frame9403-text02 {
  color: #781E2A;
  height: auto;
  font-size: 25px;
  align-self: auto;
  font-style: Medium;
  text-align: left;  
  font-family: 'Arial', sans-serif;
  font-weight: 500;
  line-height: normal;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
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
.frame9402-frame7188 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  padding-bottom: 20px;
}
.frame9402-text04 {
  color: black;
  height: auto;
  font-size: 17.30810546875px;
  align-self: auto;
  font-style: ☞;
  text-align: left;
  font-family: 'Arial', sans-serif;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-kotaknama {
  width: 399px;
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
  padding-left:10px;
  text-transform: uppercase;
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
        text-transform: uppercase;
        box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
    }   
</style>
<div class="container-fluid">
  <div class="header">
    <h1 class="header-title">
        KEMASKINI MODUL
    </h1>
  </div>
  <div class="frame9402-box">
    <form action="/moduls/{{$modul->id}}" method="POST" class="frame9402-frame9278" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="frame9402-frame7301">
            <div class="frame9402-frame7188">
                <span class="frame9402-text04"><span>Nama Modul: </span></span>
                <input type="text" class="frame9402-kotaknama" name="namaModul" id="namaModul" value="{{$modul->nama}}" onkeyup="changeTheColorOfButton()" oninput="this.value = this.value.toUpperCase()"/>
            </div>
        </div>
        <div class="frame9402-frame7188">
          <span class="frame9402-text04"><span>Status Modul: </span></span>
          <select name="status" class="frame9403-kotaknama3">
            @if ($modul->status == "Pending"){
              <option value="Pending" selected>Pending</option>
              <option value="Active">Active</option>
              <option value="Go-live">Go-live</option>
            }  
            @elseif($modul->status == "Active"){
              <option value="Pending">Pending</option>
              <option value="Active" selected>Active</option>
              <option value="Go-live">Go-live</option>
            }
            @else
              <option value="Pending">Pending</option>
              <option value="Active">Active</option>
              <option value="Go-live"selected>Go-live</option>
            @endif
          </select>
      </div>
        <button type="submit" id="buttonKemaskini" class="frame9403-frame7445">
          <div class="frame9403-frame7293">
            <span class="frame9403-text21"><span>Kemaskini</span></span>
            <img src="/SVG/kemaskini.svg" class="frame9403-group7527">
          </div>
        </button>
    </form>
  </div>
</div>
<script>
    function changeTheColorOfButton() {
      var button = document.getElementById("buttonKemaskini");
      if (document.getElementById("namaModul").value !== "") {
        button.style.opacity = "1";
        button.disabled = false;
      } else {
        button.style.opacity = "0.5";
        button.disabled = true;
      }
    }
  
</script>
@endsection