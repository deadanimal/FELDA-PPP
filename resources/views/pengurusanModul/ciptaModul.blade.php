@extends('layouts.guest')

@section('innercontent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            CIPTA MODUL
        </h1>
    </div>
    <div class="frame9402-box">
        <form action="/moduls/add" method="POST" class="frame9402-frame9278">
            @csrf
            <input type="hidden" name="userid" value="{{ Auth::user()->id }}" />
            <div class="frame9402-frame7301">
                <div class="frame9402-frame7188">
                    <span class="frame9402-text04"><span>Nama Modul: </span></span>
                    <input type="text" class="frame9402-kotaknama" name="namaModul" id="namaModul"
                        onkeyup="changeTheColorOfButton()" oninput="this.value = this.value.toUpperCase()" />
                </div>
                <div class="frame9402-frame7188">
                    <span class="frame9402-text04"><span>Status Modul: </span></span>
                    <select name="status" class="frame9403-kotaknama3">
                        <option value="Pending">Pending</option>
                        <option value="Active">Active</option>
                        <option value="Go-live">Go-live</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="frame9402-b-u-t-t-o-n-c-a-r-i-a-n" id="buttonCipta" disabled>
                <div class="frame9402-frame7294">
                    <div class="frame9402-frame7293">
                        <span class="frame9402-text06"><span>Cipta</span></span>
                        <div class="frame9402-frame">
                            <div class="frame9402-layer31">
                                <img src="/SVG/daftar.svg"class="frame9402-shape" />
                            </div>
                        </div>
                    </div>
                </div>
            </button>
        </form>
    </div>
</div>
<style>
    .frame9402-box {
        width: max-content;
        display: flex;
        padding-top: 25px;
        padding-bottom: 50px;
        position: relative;
        box-shadow: 0px 3.439542055130005px 8.598855018615723px 8.598855018615723px rgba(0, 0, 0, 0.05000000074505806);
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

    .frame9403-text03 {
        color: #781E2A;
        height: auto;
        font-size: 30px;
        align-self: auto;
        font-style: Medium;
        text-align: left;
        font-family: 'Arial', sans-serif;
        font-weight: 500;
        line-height: normal;
        font-stretch: normal;
        margin-right: auto;
        margin-left: 15px;
        margin-bottom: 0;
        margin-top: auto;
        text-decoration: none;
        padding-bottom: 15px;
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

    .frame9402-frame9278 {
        display: flex;
        position: relative;
        box-sizing: border-box;
        align-items: center;
        border-color: transparent;
        padding: 0px 100px;
        margin-right: 0;
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
        padding-bottom: 20px;
    }

    .frame9402-text04 {
        color: black;
        height: auto;
        font-size: 19px;
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
        padding-left: 10px;
        text-transform: uppercase;
    }

    .frame9402-b-u-t-t-o-n-c-a-r-i-a-n {
        display: flex;
        opacity: 0.50;
        position: relative;
        box-sizing: border-box;
        align-items: flex-start;
        border-color: transparent;
        margin-right: 0;
        margin-left: auto;
        border-radius: 0px 0px 0px 0px;
        margin-bottom: 0;
        flex-direction: column;
        cursor: pointer;
        background-color: transparent;
    }

    .frame9402-frame7294 {
        width: 90px;
        height: 42px;
        display: flex;
        padding: 12px 10px;
        position: relative;
        box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25);
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
        height: auto;
        font-size: 16px;
        align-self: auto;
        text-align: left;
        font-family: 'Arial', sans-serif;
        font-weight: 400;
        line-height: 34.39542007446289px;
        padding-left: 5px;
        font-stretch: normal;
        margin-right: 5px;
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
        padding-left: 3px;
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
<script>
    function changeTheColorOfButton() {
        var button = document.getElementById("buttonCipta");
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
