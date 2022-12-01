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
.frame9402-text01 {
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
  font-family: 'Eina01-SemiBold';
  font-size: 18px;
  padding-left:10px;
}
  .formContainer .btn {
    padding: 12px 20px;
    border: none;
    background-color: #8ebf42;
    color: #fff;
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
  .frame9402-text30 {
  color: #494949;
  width: 10%;
  height: auto;
  font-size: 17px;
  margin-left: auto;
  text-align: right;
  font-family: Eina01-Bold;
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
  font-family: Eina01-Bold;
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
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  margin-left: auto;
  margin-right: auto;
  text-decoration: none;
}
.frame9402-frame8727 {
  width: 10%;
  display: flex;
  opacity: 1;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-left: auto;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  justify-content: center;
}
.frame9402-rectangle828246 {
  width: 32px;
  height: 30px;
  padding: 0px;
  margin-left: 7px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  border-color: transparent;
  cursor:pointer;
}
.frame9402-rectangle828245 {
  width: 32px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  margin-right: 15px;
  margin-top: -1px;
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
            <button class="frame9403-frame7445"  onclick="openForm()">
                <div class="frame9403-frame7293">
                <span class="frame9403-text21"><span>Tambah</span></span>
                <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                </div>
            </button>
        </div>
    </div>

    {{-- popup form Tambah proses --}}
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="/pengurusanModul/ciptaProses" method="POST" class="formContainer">
          @csrf
          <h2 class="frame9402-text01" style="margin-top: 0px;">CIPTA PROSES</h2>
          <label for="namaProses" class="frame9402-text04">
            <strong>Nama Proses</strong>
          </label>
          <input type="text" class="frame9402-kotaknamaProses" id="namaProses" placeholder="Nama Proses" name="namaProses" required>
          <input type="hidden" value="{{$modul->id}}" name="modulId">
          <button type="submit" class="btn">Log in</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>

    {{-- senarai proses --}}
    <table style="overflow: auto; height: inherit; width:100%;">
      @if ($prosess != null)
        @php
          $i = 1;
        @endphp
        @foreach ($prosess as $proses)
          @if ($i == 1 || $i% 2 == 1)
            <tr class="frame9402-input">
          @else
            <tr class="frame9402-input" style="background-color: rgba(162, 50, 93, 0.08);"> 
          @endif
            <td class="frame9402-text30">Nama Proses:</td>
            <td class="frame9402-text31">{{$proses->nama}}</td>
            <td class="frame9402-text32">{{$proses->status}}</td>
            <td class="frame9402-frame8727" id="tindakan">
              <a href="/pengurusanModul/masuk/{{$proses->id}}" class="frame9402-rectangle828245">
                <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
              </a>
              <form method="post" action="/pengurusanModul/delete">
                @csrf
                @method('DELETE')
                <input type="hidden" name="modulId" value="1"/>
                <button class="frame9402-rectangle828246"><img src="/SVG/bin.svg"/></button>
              </form>
            </td>
          </tr>
          @php
            $i++;
          @endphp
        @endforeach 
      @endif
    </table>

  </div>
</div>

<script>
function openForm() {
  document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
}
</script>


@endsection