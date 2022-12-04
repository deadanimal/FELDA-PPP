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
.frame9402-text {
  color: #781E2A;
  width: 383px;
  height: auto;
  font-size: 80px;
  align-self: auto;
  font-style: SemiBold;
  text-align: center;
  font-family: Poppins;
  font-weight: 600;
  line-height: 12.976823806762695px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 38px;
  text-decoration: none;
  padding-bottom:15px;
  padding-top:50px;
}
.frame9402-text02 {
  color: #781E2A;
  width: 368px;
  height: auto;
  font-size: 25px;
  align-self: auto;
  font-style: SemiBold;
  text-align: center;
  font-family: Poppins;
  font-weight: 600;
  line-height: 12.976823806762695px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 38px;
  text-decoration: none;
}
.frame9402-frame9278 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-frame7301 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 17px;
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
}
.frame9402-text04 {
  color: black;
  height: auto;
  font-size: 17.30810546875px;
  align-self: auto;
  font-style: ☞;
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
  font-family: 'Eina01-SemiBold';
  font-size: 18px;
  padding-left:10px;
}
.frame9402-b-u-t-t-o-n-c-a-r-i-a-n {
  display: flex;
  opacity: 0.50;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  cursor:pointer;
}
.frame9402-frame7294 {
  width: 76px;
  height: 42px;
  display: flex;
  padding: 12px 10px;
  position: relative;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: #A2335D;
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
.frame9402-text06 {
  color: white;
  width: 39px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: 34.39542007446289px;
  font-stretch: normal;
  margin-right: 2px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-frame {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-layer31 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-shape {
  width: 15px;
  height: 16px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9402-frame7445 {
  display: flex;
  padding: 10px 21px;
  position: relative;
  align-self: flex-end;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 49px;
  border-radius: 8.598855018615723px;
  margin-bottom: 32px;
  flex-direction: column;
  background-color: #A2335D;
  text-decoration: none;
}
.frame9402-frame72931 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9402-text08 {
  color: white;
  width: 57px;
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
.frame9402-group7527 {
  width: 24px;
  height: 24px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9402-table {
  overflow: auto;
  height: auto; 
  max-height: 850px;
  display: flex;
  padding-bottom: 29px;
  position: relative;
  box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgb(0 0 0 / 5%);
  box-sizing: content-box;
  align-items: center;
  border-color: transparent;
  margin-left: 48px;
  margin-right: 48px;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: #FFFFFF;
  width: max-content;
  align-self: center;
}

.frame9402-frame93961 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  border-radius: 0px 0px 0px 0px;
  padding-top: 30px;
  padding-bottom: 25px;
  padding-left: 49px;
  padding-right: 73px;
  border-bottom: 2px solid #781E2A;
}
.frame9402-text10 {
  color: #494949;
  width: 32.57px;
  font-size: 16px;
  align-self: auto;
  text-align: center;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;;
}
.frame9402-text12 {
  color: #494949;
  width: 350px;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 31.06px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text14 {
  color: #494949;
  width: 160px;
  font-size: 17.197710037231445px;
  align-self: auto;
  font-style: ☞;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 32px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text15 {
  color: #494949;
  width: 160px;
  font-size: 17.197710037231445px;
  align-self: auto;
  font-style: ☞;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 32px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text16 {
  color: #494949;
  width: 78px;
  font-size: 17.197710037231445px;
  align-self: center;
  text-align: center;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  margin-left: 137px;
  font-stretch: normal;
  text-decoration: none;
}
.frame9402-input {
  width: 100%;
  display: flex;
  padding-top: 5px;
  padding-right: 0px;
  padding-bottom: 5px;
  padding-left: 49px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-left: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 10px;
  background-color: rgba(162, 50, 93, 0.20000000298023224);
}
.frame9402-text18 {
  color: #494949;
  width: 32.57px;
  font-size: 16px;
  align-self: center;
  text-align: center;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text19 {
  color: #494949;
  width: 350px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-left: 35px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text20 {
  color: #494949;
  width: 160px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-left: 50px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text21 {
  color: #494949;
  width: 160px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-left: 10px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-frame8727 {
  width: auto;
  height: 30px;
  display: flex;
  opacity: 1;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-left: auto;
  margin-right: 30px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: row;
}
.frame9402-rectangle828245 {
  width: 32px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-left: 20px;
    margin-top: -1px;
}
.frame9402-rectangle828246 {
  width: 32px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  border-color: transparent;
  padding: 0px;
  margin-left: 21px;
  cursor:pointer;
}
</style>
<div class="frame9402-frame9402">
  <div class="frame9402-frame9281">
    <span class="frame9402-text"><span>{{$bilangan}}</span></span>
    <span class="frame9402-text02"><span>JUMLAH MODUL</span></span>
    <form action="/pengurusanModul/cariModul" method="POST" class="frame9402-frame9278">
      @csrf
      <div class="frame9402-frame7301">
          <div class="frame9402-frame7188">
              <span class="frame9402-text04"><span>Nama Modul </span></span>
              <input type="text" class="frame9402-kotaknama" name="namaModul" id="namaModul" onkeyup="changeTheColorOfButton()"/>
          </div>
      </div>
      <button type="submit" class="frame9402-b-u-t-t-o-n-c-a-r-i-a-n" id="buttonCari" disabled onclick="changeTheColorOfButtonDaftar()">
        <div class="frame9402-frame7294">
          <div class="frame9402-frame7293">
            <span class="frame9402-text06"><span>Cari</span></span>
            <div class="frame9402-frame">
              <div class="frame9402-layer31">
                <img
                  src="/SVG/find.svg"
                  class="frame9402-shape"
                  />
              </div>
            </div>
          </div>
        </div>
      </button>
    </form>
  </div>
    <table class="frame9402-table">
      <tr class="frame9402-frame93961">
          <th class="frame9402-text10"><span>Bil.</span></th>
          <th class="frame9402-text12"><span>Nama Modul</span></th>
          <th class="frame9402-text14"><span>Dicipta oleh</span></th>
          <th class="frame9402-text15"><span>Dikemaskini oleh</span></th>
          <th class="frame9402-text16"><span>Tindakan</span></th>
      </tr>
      @php
        $i = 1;
      @endphp
      @foreach ($modul as $moduls)
        @if ($i == 1 || $i% 2 == 1)
          <tr class="frame9402-input">
        @else
          <tr class="frame9402-input" style="background-color: rgba(162, 50, 93, 0.08);"> 
        @endif
          <td class="frame9402-text18" id="bilangan">{{$i}}</td>
          <td class="frame9402-text19">{{$moduls->nama}}</td>
          <td class="frame9402-text21">{{$moduls->userDiciptaOleh->nama}}</td>
          <td class="frame9402-text20">{{$moduls->userDikemaskiniOleh->nama}}</td>
          <td class="frame9402-frame8727" id="tindakan">
            <a href="/pengurusanModul/senaraiProses/{{$moduls->id}}" class="frame9402-rectangle828245">
              <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
            </a>
            <a href="/pengurusanModul/editModul/{{$moduls->id}}" class="frame9402-rectangle828245"  onclick="openForm()"">
              <img src="/SVG/pencil.svg"/>
            </a>
            <form method="post" action="/pengurusanModul/delete">
              @csrf
              @method('DELETE')
              <input type="hidden" name="modulId" value="{{$moduls->id}}"/>
              <button class="frame9402-rectangle828246"><img src="/SVG/bin.svg"/></button>
            </form>
          </td>
        </tr>
        @php
          $i++;
        @endphp
      @endforeach
      
    </table>
  </div>
</div>

<script>
  function changeTheColorOfButton() {
    var button = document.getElementById("buttonCari");
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