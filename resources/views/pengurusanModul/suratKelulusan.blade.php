@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css">
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            Tahap Kelulusan Borang {{$borang->namaBorang}}
        </h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/moduls">Modul </a></li>
                <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/proses">{{$modul->nama}}</a></li>
                <li class="breadcrumb-item"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang">{{$proses->nama}}</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/moduls/{{$modul->id}}/{{$proses->id}}/borang/{{$borang->id}}">{{$borang->namaBorang}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Surat Kelulusan</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table class="w-100">
                        <tr>
                            <td><h1 class="card-title"> Surat Tahap Kelulusan {{$tahapKelulusan->kategoriPengguna->nama}} Bagi Borang {{$borang->namaBorang}}</h1></td>
                            <td class="text-end">
                                @if ($surat !=null)
                                    <form action="/moduls/borang/suratKelulusan/view">
                                        <input type="hidden" name="tahapKelulusanID" value="{{$tahapKelulusan->id}}">
                                        <input type="hidden" name="suratID" value="{{$surat->id}}">
                                        <button class="btn btn-primary btn-lg" style="background-color: #A2335D"><span class="arial">Papar Surat</span></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-body">
                    @if ($surat !=null)
                        <form action="/moduls/borang/suratKelulusan/update" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="address" class="form-label">Alamat</label>
                            <x-markdown>
                                <textarea class="form-control" rows="4" id="address" name="address">{{$surat->address}}</textarea>
                            </x-markdown>

                            <br><label for="title" class="form-label">Tajuk Surat</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$surat->title}}" >
                            
                            <br><label for="kandungan_surat" class="form-label">Kandungan Surat</label>
                            <x-markdown>
                                <textarea class="form-control" id="kandungan_surat" rows="5" name="body">
                                    {{$surat->body}}
                                </textarea>
                            </x-markdown>

                            <div class="text-end">
                                <input type="hidden" name="suratID" value="{{$surat->id}}">
                                <input type="hidden" name="borangId" value="{{$borang->id}}">
                                <input type="hidden" name="tahapKelulusanID" value="{{$tahapKelulusan->id}}">
                                <button type="submit" class="btn btn-primary btn-lg" style="margin-right: 4%;"> Kemaskini</button>
                            </div>
                        </form>
                    @else
                        <form action="/moduls/borang/suratKelulusan/add" method="POST">
                            @csrf
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" rows="4" id="address" name="address" placeholder="Alamat Surat"></textarea>
                            
                            <br><label for="title" class="form-label">Tajuk Surat</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Tajuk Surat">
                            
                            <br><label for="kandungan_surat" class="form-label">Kandungan Surat</label>
                            <textarea class="form-control" id="kandungan_surat" rows="5" name="body"></textarea>
                            
                            <div class="text-end">
                                <input type="hidden" name="tahapKelulusanID" value="{{$tahapKelulusan->id}}">
                                <input type="hidden" name="borangId" value="{{$borang->id}}">
                                <button type="submit" class="btn btn-primary btn-lg" style="margin-right: 4%;">Simpan</button>
                            </div>
                        </form>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .arial{
        font-size: 16px;
        font-family: 'Arial', sans-serif;
        font-weight: 600;
    }
</style>
<script>
  function markdown_editor() {
      const easyMDE = new EasyMDE({
          element: document.getElementById('kandungan_surat')
      });
  }
  markdown_editor();
</script>
@endsection