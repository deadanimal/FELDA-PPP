@extends('layouts.guest')

@section('innercontent')

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Tugasan Bagi {{Auth::user()->kategori->nama}}
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sila lengkapkan tugasan berikut.</h5>
                </div>
                <div class="card-body">
                    @if (!$tugasans->isEmpty())
                    @php
                        $bill = 1;
                    @endphp
                        @foreach($tugasans as $tugasan)
                            <div class="row">
                                <div class="mb-3">
                                    @if($tugasan->jenisTugas == "checkBox")
                                        <form action="/user/tugasan/cb_add" method="post">
                                            @csrf
                                            <label for="tugasan" style="font-family:'Poppins'">{{$bill}}) {{$tugasan->nama}}</label>
                                            @foreach($checkboxes as $key=>$checkbox)
                                                @foreach($checkbox as $cb)
                                                    @if($tugasan->id == $cb->tugasan)
                                                        <?php $i=$loop->index; ?>
                                                        <label class="form-check">
                                                            <input type="hidden" value="0" name="chckbox[{{$i}}]">
                                                            <input class="form-check-input" type="checkbox" value="1" name="chckbox[{{$i}}]"
                                                                @foreach ($cb_anss as $key=>$checkbox_ans)
                                                                    @foreach ($checkbox_ans as $key=>$cb_ans)
                                                                            @if ($cb_ans->checkbox_id == $cb->id && $cb_ans->value == '1')
                                                                                checked
                                                                            @endif
                                                                    @endforeach
                                                                @endforeach
                                                                >
                                                                @foreach ($cb_anss as $key=>$checkbox_ans)
                                                                    @foreach ($checkbox_ans as $key=>$cb_ans)
                                                                            @if ($cb_ans->checkbox_id == $cb->id)
                                                                                <input type="hidden" name="chckboxansid[{{$i}}]" value="{{$cb_ans->id}}">
                                                                            @endif
                                                                    @endforeach
                                                                @endforeach
                                                            <span class="form-check-label">
                                                                    {{$cb->nama}}
                                                                </span>
                                                        </label>
                                                        <input type="hidden" name="chckboxId[{{$i}}]" value="{{$cb->id}}">
                                                    @endif
                                                @endforeach
                                            @endforeach
                                    @elseif ($tugasan->jenisTugas == "input")
                                        <form action="/user/tugasan/in_add" method="post">
                                            @csrf
                                            <label for="tugasan" style="font-family:'Poppins'">{{$bill}} ) {{$tugasan->nama}}</label>
                                            <input type="text"  class="form-control" maxlength="100" size="100" name="jawapan[]" id="jawapan" style="margin-top: 1%;"
                                            @foreach ($tugas_anss as $key=>$tugas_ans)
                                                @foreach ($tugas_ans as $answer)
                                                    @if ($answer->tugasan_id == $tugasan->id)
                                                        value="{{$answer->value}}"
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            >
                                            @foreach ($tugas_anss as $key=>$tugas_ans)
                                                @foreach ($tugas_ans as $answer)
                                                    @if ($answer->tugasan_id == $tugasan->id)
                                                        <input type="hidden" name="answerID" value="{{$answer->id}}">
                                                    @endif
                                                @endforeach
                                            @endforeach

                                    @elseif($tugasan->jenisTugas == "uploadDoc")
                                        <form action="/user/tugasan/file_add" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <label for="tugasan" style="font-family:'Poppins'">{{$bill}} ) {{$tugasan->nama}}</label><br><br>
                                            <input type="file" class="form-control btn btn-outline-primary" name="file_up" id="doc">
                                            @foreach ($tugas_anss as $key=>$tugas_ans)
                                                @foreach ($tugas_ans as $answer)
                                                    @if ($answer->tugasan_id == $tugasan->id)
                                                    <a href="{{$answer->value}}" style="font-family:'Arial'"> Papar Dokumen </a>
                                                    <input type="hidden" name="answerID" value="{{$answer->id}}">
                                                    @endif
                                                @endforeach
                                            @endforeach
                                    @endif
                                        <input type="hidden" name="tugasanID" value="{{$tugasan->id}}">
                                        <input type="hidden" name="categoryID" value="{{Auth::user()->kategori->id}}">
                                        <button class="btn frame9403-frame7445" type="submit">
                                            <div class="frame9403-frame7293">
                                                <span class="frame9403-text21"><span>Simpan</span></span>
                                                <img src="/SVG/daftar.svg" class="frame9403-group7527">
                                            </div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            @php
                                $bill++
                            @endphp
                        @endforeach
                    @else
                        <h1 style="text-align: center;"> Tiada Tugasan </h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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
    margin-top: 1%;
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
    font-family: 'Poppins', sans-serif;
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