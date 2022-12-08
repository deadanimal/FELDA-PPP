@extends('layouts.guest')

@section('innercontent')
<style>
.frame9402-frame9402 {
  width: 100%;
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
  padding-left: 43.36px;
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
  width: 250px;
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
  width: 481px;
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
  margin-left: 145px;
  font-stretch: normal;
  text-decoration: none;
}
.frame9402-input {
  width: 100%;
  display: flex;
  padding: 5px 49px;
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
  width: 21px;
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
  width: 250px;
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
  width: 481px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-left: 32px;
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
  margin-right: 20px;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: row;
}
.frame9402-rectangle828245 {
  width: 32px;
  height: 31px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  border: none;
  cursor:pointer;
  background: url("/SVG/pencil.svg")
}
.frame9402-rectangle828246 {
  width: 32px;
  height: 31px;
  margin-left: 26px;
  position: relative;
  box-sizing: border-box;
  background-color: transparent;
  border: none;
  cursor:pointer;
  background: url("/SVG/bin.svg")
}
</style>
<div class="frame9402-frame9402">
  <div class="frame9402-frame9281">
    <span class="frame9402-text"><span>{{$bilangan}}</span></span>
    <span class="frame9402-text02"><span>JUMLAH PENGGUNA</span></span>
    <form action="/pengurusanPengguna/cariPengguna" method="POST" class="frame9402-frame9278">
      @csrf
      <div class="frame9402-frame7301">
          <div class="frame9402-frame7188">
              <span class="frame9402-text04"><span>ID Pengguna /</span><br><span> Nama Pengguna</span></span>
              <input type="text" class="frame9402-kotaknama" name="idPengguna" id="idPengguna" onkeyup="changeTheColorOfButton()"/>
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
    <a href="/pengurusanPengguna/daftarPengguna" class="frame9402-frame7445">
      <div class="frame9402-frame72931">
        <span class="frame9402-text08"><span>Daftar</span></span>
        <img
            src="/SVG/daftar.svg"
            class="frame9402-group7527"
        />
      </div>
    </a>
    <table class="frame9402-table">
      <tr class="frame9402-frame93961">
          <th class="frame9402-text10"><span>Bil.</span></th>
          <th class="frame9402-text12"><span>No. Pengguna</span></th>
          <th class="frame9402-text14"><span>Nama Pengguna</span></th>
          <th class="frame9402-text16"><span>Tindakan</span></th>
      </tr>
      @php
        $i = 1;
      @endphp
      @foreach ($user as $pengguna)
        @if ($i == 1 || $i% 2 == 1)
          <tr class="frame9402-input">
        @else
          <tr class="frame9402-input" style="background-color: rgba(162, 50, 93, 0.08);"> 
        @endif
          <td class="frame9402-text18" id="bilangan">{{$i}}</td>
          <td class="frame9402-text19">{{$pengguna->idPengguna}}</td>
          <td class="frame9402-text20"><a href="/pengurusanPengguna/edit/{{$pengguna->id}}" style="text-decoration: none; color:#494949;">{{$pengguna->nama}}</a></td>
          <td class="frame9402-frame8727" id="tindakan">
            <a href="/pengurusanPengguna/edit/{{$pengguna->id}}" class="frame9402-rectangle828245">
          
            </a>
            <form method="post" action="/pengurusanPengguna/delete">
              @csrf
              @method('DELETE')
              <input type="hidden" name="penggunaId" value="{{$pengguna->id}}"/>
              <button class="frame9402-rectangle828246">
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
    if (document.getElementById("idPengguna").value !== "") {
      button.style.opacity = "1";
      button.disabled = false;
    } else {
      button.style.opacity = "0.5";
      button.disabled = true;
    }
  }

</script>
@endsection