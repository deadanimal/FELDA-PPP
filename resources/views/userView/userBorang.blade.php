@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            BORANG {{$borang->namaBorang}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/userBorang/view/add" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sila isikan maklumat anda berikut dengan betul.</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless w-100">
                            <tr>
                                <td ><label for="nama" style="font-family:'Arial'">NAMA <span style="color: red;">*</span></label><br></td>
                                <td style="display:flex;"><input type="text" class="form-control align-middle" style="text-transform: uppercase;margin: auto; border: 2px solid #ced4da;" name="nama" id="nama" required oninput="this.value = this.value.toUpperCase()"><br></td>
                            </tr>
                            <tr>
                                <td ><label for="wilayah" style="font-family:'Arial', sans-serif">PERINGKAT <span style="color: red;">*</span></label></td>
                                <td style="display:flex;">
                                    <select name="wilayah" id="wilayah" class="form-control" style="border: 2px solid #ced4da;">
                                        <option value="" selected disabled>Pilih Peringkat</option>
                                        @foreach ($wilayah as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    <br>
                                </td>
                            </tr>
                            <tr>
                                <td ><label for="rancangan" style="font-family:'Arial', sans-serif">RANCANGAN <span style="color: red;">*</span></label><br></td>
                                <td style="display:flex;">
                                    <select name="rancangan" id="rancangan" class="form-control" style="border: 2px solid #ced4da;" required>
                                        <option value="" selected disabled>Pilih Rancangan</option>
                                    </select>
                                    <br>
                                </td>
                            </tr>
                                @php
                                    $count = 0;
                                @endphp
                                @foreach($medans as $medan)
                                    @if($medan->datatype == "checkbox")
                                    <tr>
                                        <td  style="width: 25%;">
                                            <label for="nama" style="font-family:'Arial', sans-serif; text-transform:uppercase;">
                                                {{$medan->nama}}
                                                @if ($medan->pilihan == "required")
                                                    <span style="color: red;">*</span> 
                                                @endif
                                            </label>
                                        </td>
                                        <td style="display:flex;">
                                            <div style="vertical-align: middle;">
                                                @foreach($checkboxes as $checkbox=>$value)
                                                    @foreach($value as $chkbox)
                                                        @if($chkbox->medan_id == $medan->id)
                                                            <input type="radio" id="check{{$chkbox->id}}" name="jawapancheck{{$medan->id}}[]"
                                                            @if ($medan->pilihan == 'required')
                                                                required
                                                            @endif
                                                            value="{{$chkbox->nama}}" style="border: 2px solid #ced4da;">
                                                            <label for="check{{$chkbox->id}}">{{$chkbox->nama}}</label><br>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                            <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                                        </td>
                                    </tr>
                                    @elseif($medan->datatype == "calendar")
                                        <tr>
                                            <td ><label for="jawapan{{$medan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase">{{$medan->nama}}</label></td>
                                            <td style="display:flex;">
                                                <input type="date" class="form-control" name="jawapan[]" 
                                                @if ($medan->pilihan == 'required')
                                                    required
                                                @endif
                                                id="jawapan{{$medan->id}}" style="border: 2px solid #ced4da;">
                                                <br>
                                                <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                                            </td>
                                        </tr>
                                    @else
                                    <tr>
                                        <td ><label for="jawapan{{$medan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase;">
                                                {{$medan->nama}}
                                                @if ($medan->pilihan == "required")
                                                    <span style="color: red;">*</span> 
                                                @endif
                                            </label>
                                        </td>
                                        <td style="display:flex;">
                                            <input style="border: 2px solid #ced4da;"
                                            @if ($medan->datatype == "string")
                                                type="text" 
                                            @else
                                                type="number" step="any"
                                            @endif

                                            @if ($medan->pilihan == "required")
                                                required 
                                            @endif
                                            @if ($medan->nama != 'emel')
                                                style="text-transform: uppercase;"
                                            @endif
                                            class="form-control" maxlength="{{$medan->max}}" minlength="{{$medan->min}}" name="jawapan[]" id="jawapan{{$medan->id}}" ><br>
                                            <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                                        </td>
                                    </tr>
                                @endif
                                @php
                                    $count += 1;
                                @endphp
                            @endforeach    
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                    <h5 class="card-title mb-0">Sila isikan jumlah bagi perkara yang ingin dimohon.</h5>
                    </div>
                    <div class="card-body">
                    @foreach($perkaras as $perkara)
                        <div class="row">
                            <div class="mb-3">
                                <label for="Perkara" style="font-family:'Arial', sans-serif; text-transform:uppercase;">{{$perkara->nama}}</label>
                                <input type="Number" class="form-control" name="perkara[]" id="Perkara" required>
                                <input type="hidden" name="perkara_id[]" value="{{$perkara->id}}">
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>        
                <div class="card">
                    <div class="card-body">
                        @if ($borang->consent != null || $borang->consent != "")
                            <label for="consent" style="font-size: 120%;">
                                <input type="checkbox" id="consent" name="const" onchange="document.getElementById('hantar').disabled = !this.checked;">
                                {{$borang->consent}}
                            </label><br>
                            <input type="hidden" name="borangID" value="{{$borang->id}}">
                            <button type="submit" class="frame9403-frame7445" id="hantar" disabled>
                        @else
                            <input type="hidden" name="borangID" value="{{$borang->id}}">
                            <button type="submit" class="frame9403-frame7445" id="hantar">
                        @endif
                                <input type="hidden" name="countJwpn" value="{{$count}}">

                                <div class="frame9403-frame7293">
                                    <span class="frame9403-text21"><span>Hantar</span></span>
                                    <img
                                    src="/SVG/kemaskini.svg"
                                    class="frame9403-group7527"
                                    />
                                </div>
                            </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/js/jquery.js"></script>
<script>
  $(document).ready(function(){
  $('select[name="wilayah"]').on('change',function(){
      var wilayahid= $(this).val();
      var newUrl = window.location.protocol + "//" + window.location.host;
      if (wilayahid) {
        $.ajax({
          url: newUrl+"/getRancangan/"+wilayahid,
        type: "GET",
        dataType: "json",
        success: function(data){
          console.log(data);
          $('select[name="rancangan"]').empty();
          $.each(data,function(key,value){
              $('select[name="rancangan"]').append('<option value="'+key+'">'+value+'</option>');
          });
        }
        });
      }else {
            $('select[name="rancangan"]').empty();
      }
  });
});
</script>
<style>
    td input, td label { vertical-align: middle; }

    .frame9403-frame7445:disabled {
        background-color: rgba(162, 51, 93, 0.75);
    }
    .frame9403-frame7445 {
    width: 125px;
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
    margin-left:auto;
    margin-right: 0px;
    cursor: pointer;
    text-decoration: none;
  }
  .frame9403-frame7445:hover{
    text-decoration: none;

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
    text-decoration: none;
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
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
</style>
@endsection