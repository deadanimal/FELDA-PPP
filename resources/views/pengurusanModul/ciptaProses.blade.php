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
  padding-top: 25px;

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
  height: auto;
  font-size: 25px;
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
.frame9402-box {
  width: 1332.490px;
  display: flex;
  padding-bottom: 50px;
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
.frame9402-frame9282 {
  display: flex;
  width: inherit;
  padding-top: 30px;
  padding-bottom: 30px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 32px;
  flex-direction: column;
  background-color: #F1F1F1;
}
.frame9402-frame7301 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-self: flex-start;
  border-color: transparent;
  margin-left: 17px;
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
  margin-left: 20px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-text04 {
  color: black;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: normal;
  font-stretch: normal;
  margin-right: 17px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text05 {
  color: #781E2A;
  height: auto;
  font-size: 23px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-Bold;
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
  font-family: 'Eina01-SemiBold';
  font-size: 18px;
  padding-left:10px;
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

<div class="frame9402-frame9402">
  <div class="frame9402-frame9281">
      <div class="frame9403-frame9401">
          <span class="frame9403-text"><span>PROGRAM PEMBAGUNAN PENEROKA</span></span>
          <span class="frame9403-text02" style="font-size: 40px;">
            <span>(IMS PPP)</span>
          </span>
      </div>
  </div>
  <div class="frame9402-box">
    <div class="frame9402-frame9282">
        <div class="frame9402-frame7188">
            <span class="frame9402-text05"><span>{{$modul->nama}}</span></span>
            <button class="frame9403-frame7445">
                <div class="frame9403-frame7293">
                <span class="frame9403-text21" onclick=""><span>Tambah</span></span>
                <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                </div>
            </button>
        </div>
    </div>

      <input type="hidden" name="userid" value="{{Auth::user()->id}}"/>
      <div class="frame9402-frame7301">
          <div class="frame9402-frame7188">
              <span class="frame9402-text04"><span>Nama Modul: </span></span>
              <input type="text" class="frame9402-kotaknama" name="namaModul" id="namaModul" onkeyup="changeTheColorOfButton()"/>
          </div>
      </div>
  </div>
</div>

<script>
    var dynamicInput = [];
    
    function addInput(){
        var name = document.getElementById("myInput").value
        var newdiv = document.createElement('div');
        newdiv.id = dynamicInput[counter];
        newdiv.innerHTML = "Entry " + (counter + 1) + " <br><input type='text' name='myInputs[]'> <input type='button' value='-' onClick='removeInput("+dynamicInput[counter]+");'>";
        document.getElementById('formulario').appendChild(newdiv);
        counter++;
    }
      
    function removeInput(id){
        var elem = document.getElementById(id);
        return elem.parentNode.removeChild(elem);
    }
</script>


@endsection