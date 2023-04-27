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
                KEMASKINI PROJEK {{$jawapan->borangs->namaBorang}}
            </h1>
            <a href="/user/project/{{$jawapan->id}}" class="frame9403-frame7445">
                <div class="frame9403-frame7293">
                <span class="frame9403-text21">Kembali</span>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">Senarai Jenis Ternakan/Tanaman Bagi Projek {{$jawapan->borangs->namaBorang}}</h1>
                </div>
                <div class="card-body">
                    @if(!$jenisTernakan->isEmpty())
                        <table class="table table-bordered table-striped w-100">
                            <thead class="text-white bg-primary w-100">
                            <tr>
                                <th scope="col" class="labeltext">Jenis Ternakan/Tanaman</th>
                                <th scope="col" class="labeltext" style="width: 20%">Tindakan</th>
                            </tr>
                            </thead>
                            <tbody style="back">
                                @foreach($jenisTernakan as $ternakan)
                                <tr>
                                    <td class="labeltext" style="text-transform: uppercase;">{{$ternakan->nama}}</td>
                                    <td class="labeltext" style="text-transform: uppercase;">
                                        <a class="btn btn-success" style="margin-left: 0px;color:white;" href="/kemaskini/{{$ternakan->id}}">
                                            Kemaskini
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h1 style="text-align: center; padding-bottom:5%;">Tiada Jenis Ternakan/Tanaman Yang Perlu Dikemaskini</h1>
                    @endif
                </div>
            </div>
        </div>
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