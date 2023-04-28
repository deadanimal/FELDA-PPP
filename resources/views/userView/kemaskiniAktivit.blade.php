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
                KEMASKINI PROJEK
            </h1>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Sila Pilih Aktiviti Bagi Jenis Kemaskini {{$kemaskini->nama}}</h1>
                </div>
                <div class="card-body">
                    @if(!$aktivitis->isEmpty())
                    <form action="/kemaskini/aktiviti/list" method="get">
                        <table class="w-100">
                            <tr>
                                <td>
                                    <select name="aktiviti" class="form-control">
                                        @foreach ($aktivitis as $aktiviti)
                                            <option value="{{$aktiviti->id}}">{{$aktiviti->nama}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="hidden" name="kemaskiniId" value="{{$kemaskini->id}}">
                                    <button type="submit" class="btn btn-primary" style="height: 2.4rem;border-radius: 100px;"><i class="align-middle me-2 fas fa-fw fa-search"></i></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    @else
                        <h1 style="text-align: center; padding-bottom:5%;">Tiada Aktiviti Yang Perlu Dikemaskini</h1>
                    @endif
                </div>
            </div>
        </div>
        @if(!$params->isEmpty())
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Sila Kemaskini Aktiviti Tersebut</h1>
                    </div>
                    <div class="card-body">
                        @if (!$jawapans->isEmpty())
                        <form action="/kemaskini/param/update" method="post">
                            @csrf
                            @method("put")
                        @else
                        <form action="/kemaskini/param/add" method="post">
                            @csrf
                        @endif
                            @foreach ($params as $param)
                                @if ($loop->index % 2 == 0)
                                    <div class="row">
                                @endif

                                    <div class="mb-3 col-md-6">
                                        <label for="param{{$param->id}}" class="labeltext">{{$param->nama}} ({{$param->unit}})
                                            @if ($param->category == "Pendapatan")
                                            (Sasaran: {{$param->sasaran??""}})
                                            @endif
                                        </label>
                                        <table class="w-100">
                                            <tr>
                                                <td>
                                                    <input 
                                                    @if ($param->jenisData == "Numerikal")
                                                        type="number" step="any"
                                                    @else
                                                        type="text" 
                                                    @endif
                                                    class="form-control frame9403-kotaknama"
                                                    name="jwpnParam[]"
                                                    
                                                    @foreach ($jawapans as $jawapan)
                                                        @if ($jawapan->aktivitiParameter_id == $param->id)
                                                            value="{{$jawapan->value}}"
                                                        @endif
                                                    @endforeach
                                                    >
                                                </td>
                                                <input type="hidden" name="paramId[]" value="{{$param->id}}">
                                            </tr>
                                        </table>
                                    </div>

                                @if ($loop->index != 0 && $loop->index % 2 == 0)
                                    </div>
                                @endif
                                
                                {{-- for jawapanID --}}
                                @foreach ($jawapans as $jawapan)
                                    @if ($jawapan->aktivitiParameter_id == $param->id)
                                        <input type="hidden" name="jawapanID[]" value="{{$jawapan->id}}">
                                    @endif
                                @endforeach

                            @endforeach
                            
                            <button type="submit" class="frame9403-frame7445">
                                <div class="frame9403-frame7293">
                                <span class="frame9403-text21">Kemaskini Aktiviti</span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>
<style>
   
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
.frame9403-kotaknama {
    top: 0px;
    display: block;
    height: 3rem;
    border-color: rgba(140, 38, 60, 1);
    border-style: solid;
    border-width: 0.865405261516571px;
    border-radius: 3.461621046066284px;
    font-family: 'Arial', sans-serif;
    color: #161616;
    padding-left:10px;
    box-shadow: inset -3.46162px -3.46162px 7.78865px rgba(255, 255, 255, 0.6), inset 3.46162px 3.46162px 12.1157px rgba(140, 38, 60, 0.2)
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

.labeltext{
    text-transform: uppercase;
    font-family:'Arial';
    text-align: center;
}
</style>
@endsection