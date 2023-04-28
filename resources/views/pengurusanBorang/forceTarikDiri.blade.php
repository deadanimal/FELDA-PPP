@extends('layouts.guest')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

@section('innercontent')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                TARIK DIRI
            </h1>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h1 class="header-title" style="color: var(--bs-body-color)">PROJEK </h1>
                </div>
                <div class="card-body">
                    <form action="/tarik_Diri/add" method="post">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                    <label for="project" class="labeltext">PROJEK</label>
                                    <select name="project" id="project" class="form-select form-control frame9403-kotaknama">
                                        <option value="" selected disabled>Pilih Projek</option>
                                        @foreach ($borangs as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="namaAsal" class="labeltext">NAMA PENEROKA ASAL</label>
                                <select name="namaAsal" id="namaAsal" class="form-select form-control frame9403-kotaknama">
                                    <option value="" selected disabled>Pilih Peneroka</option>
                                </select>
                            </div>            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="pengganti" class="labeltext">NAMA PENGGANTI</label>
                                <select class="form-select form-control select2" name="pengganti" id="pengganti">
                                    <option value="" selected disabled>Pilih Peneroka</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->nama}}</option>
                                @endforeach
                                </select>
                            </div>      
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                    <label for="reason" class="labeltext">SEBAB TARIK DIRI</label>
                                    <textarea class="form-control frame9403-kotaknama" name="reason" id="reason" rows="4" oninput="this.value = this.value.toUpperCase()" required></textarea>
                            </div>

                        </div>
                        <button type="submit" class="frame9403-frame7445">
                            <div class="frame9403-frame7293">
                                <span class="frame9403-text21"><span>Hantar</span></span>
                                <img src="/SVG/kemaskini.svg" class="frame9403-group7527">
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<style>
    .select2-container .select2-selection--single {
  height: 40px !important;
  vertical-align: middle!important;
}

.select2-container--default .select2-selection--single {
    border-color: rgba(140, 38, 60, 1)!important;
    border-radius: 3.461621046066284px!important;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)!important;
    border-style: solid;
    border-width: 0.865405261516571px !important;
    font-family: 'Arial', sans-serif !important;
    font-size: 17.3081px!important;
    vertical-align: middle!important;
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
.frame9403-frame7445 {
    height: 44px;
    display: flex;
    max-width: 170px;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25);
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
    margin-left: auto;
    margin-right: 0px;
    cursor: pointer;
    text-decoration: none!important;
}
.frame9403-frame7445:disabled {
    background-color: rgba(162, 51, 93, 0.75);
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
.frame9403-kotaknama {
    top: 0px;
    box-sizing: content-box;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    font-family: 'Arial', sans-serif;
    color: #161616;
    padding-left:10px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
}
.labeltext{
    text-transform: uppercase;
    font-family:'Arial';
}
</style>

<script>
    $('.select2').select2();
 </script>
 <script src="/js/jquery.js"></script>
 <script>
    $(document).ready(function(){
    $('select[name="project"]').on('change',function(){
        var borangid= $(this).val();
        var newUrl = window.location.protocol + "//" + window.location.host;
        if (borangid) {
          $.ajax({
            url: newUrl+"/getPeneroka/"+borangid,
          type: "GET",
          dataType: "json",
          success: function(data){
            console.log(data);
            $('select[name="namaAsal"]').empty();
            $.each(data,function(key,value){
                $('select[name="namaAsal"]').append('<option value="'+key+'">'+value+'</option>');
            });
          }
          });
        }else {
              $('select[name="namaAsal"]').append('<option selected disabled>Tiada Permohonan</option>');
        }
    });
  });
  </script>
@endsection