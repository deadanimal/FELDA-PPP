@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.css"> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href='https://cdn.jsdelivr.net/npm/froala-editor@latest/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

{{-- <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" /> --}}


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
                    <table class="table table-borderless w-100" style="border: 0px;">
                        <tr style="border:0px">
                            <td style="border:0px"><h1 class="card-title"> Surat Tahap Kelulusan {{$tahapKelulusan->kategoriPengguna->nama}} Bagi Borang {{$borang->namaBorang}}</h1></td>
                            <td class="text-end" style="border:0px">
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
                        <form action="/moduls/borang/suratKelulusan/update" method="POST" id="form">
                            @csrf
                            @method('PUT')
                            <label for="address" class="form-label">Alamat</label>
                            <x-markdown>
                                <textarea class="form-control" rows="4" id="address" name="address">{{$surat->address}}</textarea>
                            </x-markdown>

                            <br><label for="title" class="form-label">Tajuk Surat</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$surat->title}}" >
                            
                            <br>
                            <label for="editor" class="form-label">Kandungan Surat</label>
                            <div class="card">
                            
                            </div>
                            <div id="editor">
                                <x-markdown>
                                    {!!$surat->body!!}
                                </x-markdown>
                            </div>
                            <input type='hidden' name="body" id="content">
                            <div class="text-end">
                                <input type="hidden" name="suratID" value="{{$surat->id}}">
                                <input type="hidden" name="borangId" value="{{$borang->id}}">
                                <input type="hidden" name="tahapKelulusanID" value="{{$tahapKelulusan->id}}">
                                <button type="submit" class="btn btn-primary btn-lg" style="margin-right: 4%; margin-top:1%;"> Kemaskini</button>
                            </div>
                        </form>
                    @else
                        <form action="/moduls/borang/suratKelulusan/add" method="POST" id="form">
                            @csrf
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" rows="4" id="address" name="address" placeholder="Alamat Surat"></textarea>
                            
                            <br><label for="title" class="form-label">Tajuk Surat</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Tajuk Surat">
                            
                            <br>                                
                            <label for="kandungan_surat" class="form-label">Kandungan Surat</label>
                            <div id="editor">
                            </div>
                            <input type='hidden' name="body" id="content">
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
    table, th, td, tr {
        border: 1px solid black;
    }

</style>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  	
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/plugins/markdown.min.js"></script>
{{-- <script type="text/javascript">

    const Editor = toastui.Editor;

    const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '500px',
  initialEditType: 'markdown',
  previewStyle: 'vertical'
});

editor.getMarkdown();
</script> --}}

<script type="text/javascript">

    var editor = new FroalaEditor('#editor', {
        height: 300,
        toolbarButtons: ['bold', 'italic', 'underline', 'paragraphFormat', 'align','insertTable', 'undo', 'redo']
    // }, function () {
    //     console.log(editor.html.get())
    });	

    document.querySelector('#form').addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#content').value = editor.html.get();
    e.target.submit();
});
</script>
@endsection