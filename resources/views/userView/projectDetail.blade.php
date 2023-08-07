@extends('layouts.guest')

@section('innercontent')
    <div class="container-fluid">
        <div class="header" style="display: flex">
            <table class="w-100">
                <tr>
                    <td>
                        <h1 class="header-title">
                            PROFIL PROJEK {{$jawapan->borangs->namaBorang}}
                        </h1>
                    </td>

                    @if ($jawapan->fasa == "PEMANTAUAN")
                        <td>
                            <a href="/kemaskiniProjek/{{$jawapan->id}}" class="frame9403-frame7445">
                                <div class="frame9403-frame7293">
                                <span class="frame9403-text21"><i class="align-middle me-2 fas fa-fw fa-cogs"></i>KEMASKINI</span>
                                </div>
                            </a>
                        </td>
                    @endif
                    
                    <td>
                        <a href="/tarikDiri/{{$jawapan->id}}" class="frame9403-frame7445">
                            <div class="frame9403-frame7293">
                            <span class="frame9403-text21"><i class="align-middle me-2 fas fa-fw fa-sign-out-alt"></i>TARIK DIRI</span>
                            </div>
                        </a>
                    </td>
                </tr>
            </table>
            
        </div>
        @if (!$surats->isEmpty())
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table class="w-100">
                            <tr>
                                @foreach ($surats as $surat)
                                    <td>
                                        <form action="/user/borang_app/surat/view" method="get" style="margin-bottom:0px;margin-right:2%;">
                                            <input type="hidden" name="jawapan_id" value="{{$jawapan->id}}">
                                            <input type="hidden" name="surat_id" value="{{$surat->id}}">
                                            
                                            <button class="btn frame9403-frame7445" style="max-width:none; margin-right:auto;">
                                                <div class="frame9403-frame7293">
                                                    <span class="frame9403-text21">LIHAT SURAT {{$surat->jenis}}</span>
                                                </div>
                                            </button>
                                        </form>
                                    </td>
                                @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="labeltext">NAMA</label>
                                <input type="text" class="form-control frame9403-kotaknama" value="{{$jawapan->nama}}" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nama" class="labeltext">KOD PROJEK</label>
                                <input type="text" class="form-control frame9403-kotaknama" value="{{$jawapan->kod_projek}}" readonly>
                            </div>
                        </div>
                        @foreach ($jawapanMedan as $jwpn)
                            @if ($loop->index%2 == 0)
                                <div class="row">
                            @endif
                                <div class="mb-3 col-md-6">
                                    <label for="medan{{$jwpn->id}}" class="labeltext">{{$jwpn->medan->nama}}</label>
                                    <input type="text" class="form-control frame9403-kotaknama" value="{{$jwpn->jawapan}}" readonly>
                                </div>
                            @if ($loop->index%2 != 0)
                                </div>
                            @endif
                        @endforeach
                    </div>
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
    width: 454px;
    height: 50px;
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
<script src="/js/jquery.js"></script>
@endsection