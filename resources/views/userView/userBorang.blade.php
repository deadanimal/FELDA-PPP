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
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila isikan maklumat anda berikut dengan betul.</h5>
                </div>
                <form action="/userBorang/view/add" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama" style="font-family:'Arial'">NAMA</label>
                                <input type="text" class="form-control" style="text-transform: uppercase;" name="nama" id="nama" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="wilayah" style="font-family:'Arial', sans-serif">Peringkat</label>
                                <select name="wilayah" id="wilayah" class="form-control">
                                  <option value="" selected disabled>Pilih Peringkat</option>
                                  @foreach ($wilayah as $key => $value)
                                      <option value="{{ $key }}">{{ $value }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="rancangan" style="font-family:'Arial', sans-serif">Rancangan</label>
                                <select name="rancangan" id="rancangan" class="form-control" required>
                                    <option value="" selected disabled>Pilih Rancangan</option>
                                </select>
                            </div>
                        </div>
                        @foreach($medans as $medan)
                            <div class="row">
                                <div class="mb-3">
                                    <label for="jawapan{{$medan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase">{{$medan->nama}}</label>
                                    <input 
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
                                    class="form-control" maxlength="{{$medan->max}}" minlength="{{$medan->min}}" name="jawapan[]" id="jawapan{{$medan->id}}">
                                    <input type="hidden" name="medanID[]" value="{{$medan->id}}">
                                </div>
                            </div>
                        @endforeach
                        @if ($borang->consent != null || $borang->consent != "")
                            <input type="checkbox" id="consent" name="const" onchange="document.getElementById('hantar').disabled = !this.checked;">
                            <label for="consent" style="font-size: 120%;">{{$borang->consent}}</label><br>
                            <input type="hidden" name="borangID" value="{{$borang->id}}">
                            <button type="submit" class="frame9403-frame7445" id="hantar" disabled>
                        @else
                            <input type="hidden" name="borangID" value="{{$borang->id}}">
                            <button type="submit" class="frame9403-frame7445" id="hantar">
                        @endif
                            <div class="frame9403-frame7293">
                                <span class="frame9403-text21"><span>Hantar</span></span>
                                <img
                                src="/SVG/kemaskini.svg"
                                class="frame9403-group7527"
                                />
                            </div>
                        </button>
                    </div>
                </form>
            </div>
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