@extends('layouts.guest')

@section('innercontent')
<style>
.frame9404-frame9404 {
  width: 1336px;
  display: flex;
  padding-top: 0px;
  padding-right: 48px;
  padding-bottom: 67px;
  padding-left: 48px;
  position: relative;
  max-width: 1336px;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  flex-direction: column;
  justify-content: center;
}
.frame9404-frame9398 {
  display: flex;
  position: relative;
  align-self: stretch;
  box-sizing: border-box;
  align-items: flex-start;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 46px;
  margin-top: 47px;
}
.frame9404-text {
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
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-frame93981 {
  display: flex;
  position: relative;
  align-self: stretch;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 117px;
  flex-direction: column;
}
.frame9404-frame9278 {
  width: 625.3135986328125px;
  height: 49.67985916137695px;
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 10px;
}
.frame9404-frame7301 {
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
.frame9404-frame7188 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9404-text02 {
  color: #494949;
  width: 115px;
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
.frame9404-kotaknama {
  width: 380px;
  height: 50px;
  padding-left: 10px;
  font-size: 17px;
  position: relative;
  box-sizing: content-box;
  border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  margin-right: 0;
  border-radius: 3.461621046066284px;
  margin-bottom: 0;
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
}
.frame9404-kotaknama:focus { 
    outline: none !important;
    border-color: rgba(140, 38, 60, 1);
  border-style: solid;
  border-width: 0.865405261516571px;
  border-radius: 3.461621046066284px
}

.frame9404-b-u-t-t-o-n-c-a-r-i-a-n {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  background-color:rgba(255,255,255,0);
  opacity:0.5;
}

.frame9404-b-u-t-t-o-n-c-a-r-i-a-n1 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  background-color:rgba(255,255,255,0);
  opacity:0.5;
}
.frame9404-b-u-t-t-o-n-c-a-r-i-a-n2 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: flex-start;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
  flex-direction: column;
  background-color:rgba(255,255,255,0);
  opacity:0.5;
}
.frame9404-frame7294 {
  width: 77px;
  height: 42px;
  display: flex;
  position: relative;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  padding-top: 0px;
  border-color: transparent;
  margin-right: 0;
  padding-left: 0px;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  padding-right: 0px;
  flex-direction: column;
  padding-bottom: 0px;
  justify-content: center;
  background-color: #A2335D;
  cursor:pointer;
}
.frame9404-frame7293 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9404-text07 {
  color: #FFFFFF;
  width: 39px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-SemiBold;
  font-weight: 100;
  line-height: 34.39542007446289px;
  font-stretch: normal;
  margin-right: 1px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-group {
  width: 15px;
  height: 16px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9404-frame72941 {
  width: 77px;
  height: 42px;
  display: flex;
  position: relative;
  align-self: center;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  padding-top: 0px;
  border-color: transparent;
  margin-right: 0;
  padding-left: 0px;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  padding-right: 0px;
  flex-direction: column;
  padding-bottom: 0px;
  justify-content: center;
  background-color: #A2335D;
  cursor:pointer;
}
.frame9404-group1 {
  width: 15px;
  height: 16px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9404-frame72942 {
  width: 77px;
  height: 42px;
  display: flex;
  position: relative;
  box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
  box-sizing: border-box;
  align-items: center;
  padding-top: 0px;
  border-color: transparent;
  margin-right: 0;
  padding-left: 0px;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  padding-right: 0px;
  flex-direction: column;
  padding-bottom: 0px;
  justify-content: center;
  background-color: #A2335D;
  cursor:pointer;
}
.frame9404-group2 {
  width: 15px;
  height: 15px;
  position: relative;
  align-self: center;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
}
.frame9404-next-button3 {
  display: flex;
  position: relative;
  align-self: stretch;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 19px;
  justify-content: flex-end;
}
.frame9404-frame8969 {
  display: flex;
  padding: 6px 16px;
  position: relative;
  align-self: center;
  box-shadow: inset -4px -4px 9px rgba(255, 255, 255, 0.6), inset 4px 4px 14px #C5D7EE;
  box-sizing: content-box;
  align-items: flex-start;
  border-color: rgba(120, 30, 42, 1);
  border-style: solid;
  border-width: 1px;
  margin-right: 25px;
  border-radius: 4px;
  margin-bottom: 0;
  background-color: #FFFFFF;
}
.frame9404-text17 {
  color: #781E2A;
  height: auto;
  font-size: 16px;
  align-self: auto;
  font-style: Bold;
  text-align: left;
  font-family: Poppins;
  font-weight: 700;
  line-height: 18px;
  font-stretch: normal;
  margin-right: 0;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text18 {
  color: #494949;
  width: 39px;
  font-size: 12px;
  align-self: center;
  text-align: center;
  font-family: Poppins;
  font-weight: 600;
  line-height: 18px;
  font-stretch: normal;
  margin-right: 25px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-frame7308 {
  display: flex;
  position: relative;
  align-self: stretch;
  box-sizing: border-box;
  align-items: center;
  flex-shrink: 0;
  border-color: transparent;
  margin-right: 0;
  border-radius: 0px 0px 0px 0px;
  margin-bottom: 0;
}
.frame9404-group8974 {
  width: 30px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0px;
  margin-bottom: 0;
  background-image:url('/SVG/left.svg'); 
  background-repeat: no-repeat;
  background-position:center;
  cursor:pointer;
}
.frame9404-group8975 {
  width: 30px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  border-color: transparent;
  margin-right: 0;
  margin-bottom: 0;
  background-image:url('/SVG/right.svg'); 
  background-repeat: no-repeat;
  background-position:center;
  cursor:pointer;
}
.frame9404-table {
  display: flex;
  padding-bottom: 29px;
  position: relative;
  box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgba(0, 0, 0, 0.05000000074505806) ;
  box-sizing: content-box;
  align-items: center;
  border-color: transparent;
  margin-left: 48px;
  margin-right: 48px;
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: #FFFFFF;
}
.frame9404-frame93982 {
  display: flex;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  border-radius: 0px 0px 0px 0px;
  padding-top: 30px;
  padding-bottom: 25px;
  padding-left:69.36px;
  padding-right:73px;
  border-bottom: 2px solid #781E2A;
}

.frame9404-text20 {
  color: #494949;
  width: 33px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: center;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text22 {
  color: #494949;
  width: 129px;
  height: auto;
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
.frame9404-text24 {
  color: #494949;
  width: 362px;
  height: auto;
  font-size: 17.197710037231445px;
  align-self: auto;
  font-style: ☞;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 31px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text26 {
  color: #494949;
  width: 111px;
  height: auto;
  font-size: 17.197710037231445px;
  align-self: auto;
  text-align: center;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 24px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text28 {
  color: #494949;
  width: 253px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 35px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text30 {
  color: #494949;
  width: 129px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: center;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 19px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-line3 {
  width: 1187px;
  height: 0px;
  position: relative;
  box-sizing: border-box;
  margin-right: 0;
  margin-bottom: 19px;
}
.frame9404-input {
  display: flex;
  padding-left:69.36px;
  padding-right:73px;
  padding-top:11px;
  padding-bottom:11px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  border-color: transparent;
  border-radius: 0px 0px 0px 0px;
  margin-top: 11px;
  margin-bottom: 0;
  background-color: rgba(162, 50, 93, 0.20000000298023224);
}

.frame9404-text21 {
  color: #494949;
  width: 33px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: center;
  font-family: 'Eina01-SemiBold';
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text23 {
  color: #494949;
  width: 129px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold';
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 31.06px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text25 {
  color: #494949;
  width: 362px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold';
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 31px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text27 {
  color: #494949;
  width: 111px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: center;
  font-family: 'Eina01-SemiBold';
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 24px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text29 {
  color: #494949;
  width: 253px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: left;
  font-family: 'Eina01-SemiBold';
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 35px;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9404-text31 {
  color: #494949;
  width: 129px;
  height: auto;
  font-size: 16px;
  align-self: auto;
  text-align: center;
  font-family: 'Eina01-SemiBold';
  font-weight: 400;
  line-height: 25.477937698364258px;
  font-stretch: normal;
  margin-left: 19px;
  margin-bottom: 0;
  text-decoration: none;
}
</style>

<div class="frame9404-frame9404">
    <div class="frame9404-frame9398">
        <span class="frame9404-text"><span>Audit Trail</span></span>
    </div>
    <div class="frame9404-frame93981">
        <form action="/auditTrail/auditPengguna" method="POST" class="frame9404-frame9278">
          @csrf  
            <div class="frame9404-frame7301">
                <div class="frame9404-frame7188">
                    <span class="frame9404-text02">
                        <span>ID Pengguna</span>
                    </span>
                    <input type="text" id="idPengguna" name="idPengguna" class="frame9404-kotaknama" onkeyup="changeTheColorOfButton()">
                </div>
            </div>
            <button type="submit" class="frame9404-b-u-t-t-o-n-c-a-r-i-a-n" id="buttonIdPengguna" disabled>
                <div class="frame9404-frame7294">
                    <div class="frame9404-frame7293">
                        <span class="frame9404-text07"><span>Cari</span></span>
                        <img
                        src="/SVG/find.svg"
                        class="frame9404-group"
                        />
                    </div>
                </div>
            </button>
        </form>
        <form action="/auditTrail/auditTindakan"  method="POST" class="frame9404-frame9278">
          @csrf  
            <div class="frame9404-frame7301">
                <div class="frame9404-frame7188">
                    <span class="frame9404-text02"><span>Tindakan</span></span>
                    
                    <input type="text" name="tindakan" id="tindakan" class="frame9404-kotaknama" onkeyup="changeTheColorOfButton1()">
                </div>
            </div>
            <button type="submit" class="frame9404-b-u-t-t-o-n-c-a-r-i-a-n1" id="buttonAktiviti" disabled>
                <div class="frame9404-frame72941">
                    <div class="frame9404-frame7293">
                        <span class="frame9404-text07"><span>Cari</span></span>
                        <img
                        src="/SVG/find.svg"
                        class="frame9404-group1"
                        />
                    </div>
                </div>
            </button>
        </form>
        <form action="/auditTrail/auditTarikh" method="POST"  class="frame9404-frame9278">
          @csrf
            <div class="frame9404-frame7301">
                <div class="frame9404-frame7188">
                    <span class="frame9404-text02"><span>Tarikh</span></span>
                    
                    <input type="date" name="tarikh" id="tarikh" class="frame9404-kotaknama" onkeyup="changeTheColorOfButton2()">
                </div>
            </div>
            <button type="submit" class="frame9404-b-u-t-t-o-n-c-a-r-i-a-n2" id="buttonTarikh" disabled>
                <div class="frame9404-frame72942">
                    <div class="frame9404-frame7293">
                        <span class="frame9404-text07"><span>Cari</span></span>
                        <img
                        src="/SVG/find.svg"
                        class="frame9404-group2"
                        />
                    </div>
                </div>
            </button>
        </form>
    </div>
    <table class="frame9404-table" style="overflow: auto; height: 850px;">
        <tr class="frame9404-frame93982" style="position: sticky; top: 0; z-index: 1; background-color:white;">
            <th class="frame9404-text20"><span>Bil.</span></th>
            <th class="frame9404-text22"><span>ID Pengguna</span></th>
            <th class="frame9404-text24"><span>Nama Pengguna</span></th>
            <th class="frame9404-text26"><span>Tindakan</span></th>
            <th class="frame9404-text28"><span>Keterangan</span></th>
            <th class="frame9404-text30"><span>Tarikh Tindakan</span></th>
        </tr>
        @php
        $i = 1;
        @endphp
        @foreach ($audits as $audit)
        {{-- @dd($audit->new_values)   --}}
          @if ($i == 1 || $i% 2 == 1)
            <tr class="frame9404-input">
          @else
            <tr class="frame9404-input" style="background-color: rgba(162, 50, 93, 0.08);"> 
          @endif
            <td class="frame9404-text21">{{$i}}</td>
            <td class="frame9404-text23">{{$audit->user->idPengguna??""}}</td>
            <td class="frame9404-text25">{{$audit->user->nama??""}}</td>
            <td class="frame9404-text27">

            @if ($audit->event == "created")
              <span>Cipta</span>
              </td>
              <td class="frame9404-text29"> 
              @if($audit->auditable_type== "App\Models\User")
                    Nama: {{$audit->new_values['nama'] }}<br> 
                    ID Pengguna: {{$audit->new_values['idPengguna']}}<br>
              @elseif($audit->auditable_type=="App\Models\Modul")
                  Nama Modul: {{$audit->new_values['nama'] }}<br> 
              @endif
              </td> 
            @elseif($audit->event == "updated")
              <span>Kemaskini</span>
              </td>
              <td class="frame9404-text29">
                @if($audit->auditable_type== "App\Models\User")
                  Nama: {{$audit->auditable->nama??""}}<br> 
                  ID Pengguna: {{$audit->auditable->idPengguna??""}}<br>
                @elseif($audit->auditable_type=="App\Models\Modul")
                  Nama Modul: {{$audit->new_values['nama'] }}<br> 
                @endif
                
              </td>
            @elseif($audit->event == "deleted")
              <span>Padam</span>
              </td>
              <td class="frame9404-text29">
              @if($audit->auditable_type== "App\Models\User")
                    Nama: {{$audit->old_values['nama'] }}<br> 
                    ID Pengguna: {{$audit->old_values['idPengguna']}}<br>
              @elseif($audit->auditable_type=="App\Models\Modul")
                  Nama Modul: {{$audit->old_values['nama'] }}<br> 
              @endif
              </td>
            @endif
{{-- 
            @if({{$audit->auditable}}!= null)
            <td class="frame9404-text29"> 
              Nama: {{$audit->auditable->nama}}<br> 
              ID Pengguna: {{$audit->auditable->idPengguna}}<br>
              Kategori: {{$audit->auditable->kategori->nama}}<br>
            </td>
            @elseif({{$audit->auditable_type}}=="App\Models\Modul")
            <td class="frame9404-text29"> 
              Nama Modul: {{$audit->new_values->nama}}<br> 
              ID Pengguna: {{$audit->auditable->idPengguna}}<br>
              Kategori: {{$audit->auditable->kategori->nama}}<br>
            </td> --}}
            <td class="frame9404-text31">{{$audit->created_at}}</td>
          </tr>

          @php
          $i++;
          @endphp
        @endforeach
    </table>
</div>
<script>
function changeTheColorOfButton() {
    var element = document.getElementById("buttonIdPengguna");
    if (document.getElementById("idPengguna").value !== "") {
        element.style.opacity = "1";
        element.style.cursor = "pointer";
        element.disabled = false;
    } else {
        element.style.opacity = "0.5";
        element.style.cursor = "not-allowed";
        element.disabled = true;
    }
}
function changeTheColorOfButton1() {
    var element = document.getElementById("buttonAktiviti");
    if (document.getElementById("tindakan").value !== "") {
        element.style.opacity = "1";
        element.disabled = false;
    } else {
        element.style.opacity = "0.5";
        element.disabled = true;
    }
}
function changeTheColorOfButton2() {
    var element = document.getElementById("buttonTarikh");
    if (document.getElementById("tarikh").value !== "dd/mm/yyyy") {
        element.style.opacity = "1";
        element.disabled = false;
    } else {
        element.style.opacity = "0.5";
        element.disabled = true;
    }
}

</script>
@endsection