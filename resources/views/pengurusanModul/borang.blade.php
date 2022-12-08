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
  border-radius: 8.598855018615723px;
  margin-bottom: 0;
  flex-direction: column;
  background-color: white;
  align-self: center;
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
  box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
  background-color: #FFFFFF;
}
.frame9403-frame7445 {
  width: auto;
  height: 50px;
  display: flex;
  max-width: 250px;
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
  width: auto;
  height: auto;
  font-size: 16px;
  align-self: auto;
  font-style: SemiBold;
  text-align: left;
  font-family: Poppins;
  font-weight: 600;
  font-stretch: normal;
  margin-right: 10px;
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
    width: 50%;
    height: 50px;
    position: relative;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2);
    background-color:#FFFFFF;
    background-position:99% center;
    display:block;
    font-family: 'Eina01-SemiBold';
    font-size: 17.3081px;
  }
* {
    box-sizing: border-box;
  }
  .frame9403-frame74451 {
      width: auto;
    height: 50px;
    display: flex;
    max-width: 250px;
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
    margin-left: auto;
    margin-right: 30px;
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
  .frame9402-kotaknamaBorang {
  width: auto;
  height: 50px;
  position: relative;
  box-sizing: content-box;
  margin-right: 0;
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
    font-family: Poppins;
    font-weight: 600;
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
  height: 100px;
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
  cursor: grabbing;
  user-select: none;
}
  .frame9402-text30 {
  color: #494949;
  width: 30%;
  height: auto;
  font-size: 17px;
  margin-left: auto;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  text-decoration: none;
}
.frame9402-text31 {
  color: #494949;
  width: 40%%;
  height: auto;
  font-size: 17px;
  align-self: auto;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  margin-left: 10px;
  text-decoration: none;
}
.frame9402-text32 {
  color: #494949;
  width: 30%;
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
  margin-right: 7px;    
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
.frame9402-rectangle8282452 {
  width: 32px;
  height: 30px;
  position: relative;
  box-sizing: border-box;
  align-items: center;
  margin-top: -1px;
  margin-right: auto;
  margin-left: auto;
}

.switch {
  position: relative;
}

.switch label {
  width: 55px;
  height: 23px;
  background-color: #999;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 50px;
}

.switch input[type="checkbox"] {
  visibility: hidden;
}
.switch label:after {
  content: 'Active';
  width: 21px;
  height: 21px;
  border-radius: 50px;
  position: absolute;
  top: 1px;
  left: 1px;
  transition: 100ms;
  background-color: white;
}

.switch .look:checked + label:after {
  left: 32px;
}

.switch .look:checked + label {
  background-color: lightsteelblue;
}

{
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
  .frame9402-kotaknamaBorang {
  width: 40%%;
  height: auto;
  align-self: auto;
  text-align: left;
  font-family: Eina01-Bold;
  font-weight: 400;
  line-height: 15.477937698364258px;
  font-stretch: normal;
  margin-bottom: 0;
  margin-left: 10px;
  text-decoration: none;
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
    font-family: Poppins;
    font-weight: 600;
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
            <span class="frame9402-text05"><span>{{$borang->namaBorang}}</span></span>
            {{-- <button class="frame9403-frame7445"  onclick="openForm()">
              <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Muat Naik Borang</span></span>
              <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
              </div>
            </button> --}}
            <button class="frame9403-frame74451" type="button" id="rowAdder">
                <div class="frame9403-frame7293">
                <span class="frame9403-text21"><span>Tambah</span></span>
                <img src="/SVG/daftar.svg" class="frame9403-group7527"/>
                </div>
            </button>
        </div>
    </div>

    {{-- upload Borang --}}
    {{-- <div class="borangPopup">
      <div class="formPopup" id="popupForm">
        <form action="/pengurusanBorang/uploadBorang" method="POST" enctype="multipart/form-data" class="formContainer">
          @csrf
          <h2 class="frame9402-text01" style="margin-top: 0px;">Muat Naik Borang</h2>
          <input class="frame9402-kotaknamaBorang" type="file" name="borangPdf" accept=".pdf,.doc" required/>
          <input type="hidden" value="{{$borang->id}}" name="borangId">
          <button type="submit" class="btn">Simpan</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Batal</button>
        </form>
      </div>
    </div> --}}

    <form action="/pengurusanBorang/simpanMedanBorang" method="POST" style="width: 100%;">    
      @csrf
      <input type="hidden" name="borangId" value="{{$borang->id}}">
      <table style="overflow: scroll; max-height: 750px; width:100%;" id="borangField" class="draggable-table">
        <tbody class="row_drag">
        @if ($borang->context != null)
          @php
            $contexts = json_decode($borang->context);
          @endphp
          @foreach($contexts as $context)
          <tr class="frame9402-input" id="row">
            <td class="frame9402-text31">Nama Medan:<input type="text" name="nama[]" class="frame9402-kotaknama" value="{{$context->nama}}"></td>
            <td class="frame9402-text30">Jenis Data:
              <select name="datatype[]" class="frame9403-kotaknama3">
                @if ($context->datatype == "string" )
                  <option value="string" selected>String</option>
                  <option value="integer">Integer</option>
                @else
                  <option value="string">String</option>
                  <option value="integer"selected>Integer</option>
                @endif
              </select>
            </td>
            <td class="frame9402-text32"> Pilihan:
              <select name="pilihan[]" class="frame9403-kotaknama3">
                @if ($context->pilihan == "required" )
                  <option value="required" selected>Mandatori</option>
                  <option value="optional">Pilihan</option>
                @else
                  <option value="required">Mandatori</option>
                  <option value="optional" selected>Pilihan</option>
                @endif
              </select>
            </td>
            <td class="frame9402-frame8727" id="tindakan">
              <button class="frame9402-rectangle828246" id="DeleteRow"><img src="/SVG/bin.svg"/></button>
            </td>
          </tr>
          @endforeach
        @endif
        </tbody>
      </table>
      <button type="submit" class="frame9403-frame7445">
        <div class="frame9403-frame7293">
          <span class="frame9403-text21"><span>Simpan</span></span>
          <img
          src="/SVG/kemaskini.svg"
          class="frame9403-group7527"
          />
        </div>
      </button>
    </form>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$("#rowAdder").click(function () {
            newRowAdd =
            '<tr class="frame9402-input" id="row">'+
                '<td class="frame9402-text31">Nama Medan:<input type="text" name="nama[]" class="frame9402-kotaknama" placeholder="Nama Medan"></td>'+
                '<td class="frame9402-text30">Jenis Data:'+
                    '<select name="datatype[]" class="frame9403-kotaknama3">'+
                        '<option value="string">String</option>'+
                        '<option value="integer">Integer</option>'+
                    '</select>'+
                '</td>'+
                '<td class="frame9402-text32"> Pilihan:'+
                '<select name="pilihan[]" class="frame9403-kotaknama3">'+
                    '<option value="required">Mandatori</option>'+
                    '<option value="optional">Pilihan</option>'+
                '</select></td>'+
                '<td class="frame9402-frame8727" id="tindakan">'+
                    '<button class="frame9402-rectangle828246" id="DeleteRow"><img src="/SVG/bin.svg"/></button>'+
                '</td>'+
            '</tr>';
            $('#borangField').append(newRowAdd);
        });
 
$("body").on("click", "#DeleteRow", function () {
  $(this).parents("#row").remove();
});
$("#borangField").scrollTop( $("#borangField").attr("scrollHeight") );
</script>
<script>
function openForm() {
  document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
  document.getElementById("popupForm").style.display = "none";
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
  $( ".row_drag" ).sortable({
      delay: 120,
      stop: function() {
          var selectedRow = new Array();
          $('.row_drag>tr').each(function() {
              selectedRow.push($(this).attr("id"));
          });
      }
  });
</script>

@endsection