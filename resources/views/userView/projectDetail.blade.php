@extends('layouts.guest')

@section('innercontent')
    <div class="container-fluid">
        <div class="header">
            <h1 class="header-title">
                PROJEK {{$jawapan->borangs->namaBorang}}
            </h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="nama" class="labeltext">NAMA</label>
                        <input type="text" class="form-control frame9403-kotaknama" value="{{$jawapan->nama}}" readonly>
                    </div>
                </div>
                @foreach ($jawapanMedan as $jwpn)
                    @if ($loop->index % 2 == 0)
                        <div class="row">
                    @endif

                            <div class="mb-3 col-md-6">
                                <label for="medan{{$jwpn->id}}" class="labeltext">{{$jwpn->medan->nama}}</label>
                                <input type="text" class="form-control frame9403-kotaknama" value="{{$jwpn->jawapan}}" readonly>
                            </div>
                    @if ($loop->index != 0 && $loop->index % 2 == 0)
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
            </div>
        </div>
    </div>
<style>
   
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