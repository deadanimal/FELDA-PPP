@extends('layouts.guest')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            SURAT BORANG {{$borang->namaBorang}}
        </h1>
        <a href="/user/tugasan/petiMasuk/{{$borang->id}}/list" class="frame9403-frame7445" style="margin-left:0px;">
            <div class="frame9403-frame7293">
              <span class="frame9403-text21"><span>Kembali</span></span>
            </div>
        </a>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <table class="table table-borderless w-100" style="border: 0px;">
                        <tr style="border:0px">
                            <td style="border:0px">
                                <h1 class="card-title">                    
                                    Templat Surat
                                </h1>
                            </td>
                            <td class="text-end" style="border:0px">
                                @if ($surat !=null)
                                    <form action="/moduls/borang/suratKelulusan/view">
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
                        <form action="/user/borang_app/surat/update" method="POST" id="form">
                            @csrf
                            @method('PUT')
                            <label for="title" class="form-label">Tajuk Surat</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{$surat->title}}"  oninput="this.value = this.value.toUpperCase()">
                            
                            <br>
                            <label for="editor" class="form-label">Kandungan Surat</label>
                            <div class="clearfix">
                                <div id="quill-toolbar">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-script" value="sub"></button>
                                        <button class="ql-script" value="super"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-indent" value="-1"></button>
                                        <button class="ql-indent" value="+1"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-direction" value="rtl"></button>
                                        <select class="ql-align"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                    </span>
                                </div>
                                <div id="editor">
                                    <x-markdown>
                                        {!!$surat->body!!}
                                    </x-markdown>
                                </div>
                            </div>
                            <input type='hidden' name="body" id="content">
                            <div class="text-end">
                                <input type="hidden" name="suratID" value="{{$surat->id}}">
                                <input type="hidden" name="borangId" value="{{$borang->id}}">
                                <button type="submit" class="btn btn-primary btn-lg" style="margin-right: 4%; margin-top:1%;"> Kemaskini</button>
                            </div>
                        </form>
                    @else
                        <form action="/user/borang_app/surat/add" method="POST" id="form">
                            @csrf
                            <label for="title" class="form-label">Tajuk Surat</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Tajuk Surat" required  oninput="this.value = this.value.toUpperCase()">
                            
                            <br>                                
                            <label for="kandungan_surat" class="form-label">Kandungan Surat</label>
                            <div class="clearfix">
                                <div id="quill-toolbar">
                                    <span class="ql-formats">
                                        <select class="ql-font"></select>
                                        <select class="ql-size"></select>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <button class="ql-strike"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-script" value="sub"></button>
                                        <button class="ql-script" value="super"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-list" value="ordered"></button>
                                        <button class="ql-list" value="bullet"></button>
                                    </span>
                                    <span class="ql-formats">
                                        <button class="ql-clean"></button>
                                    </span>
                                </div>
                                <div id="editor"></div>
                            </div>
                            <input type='hidden' name="body" id="content">
                            <div class="text-end">
                                <input type="hidden" name="borangId" value="{{$borang->id}}">
                                <input type="hidden" name="borangId" value="{{$borang->id}}">
                                <button type="submit" class="btn btn-primary btn-lg" style="margin-right: 4%; margin-top:1%;" id="simpan" disabled="disabled">Simpan</button>
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

    .frame9403-frame7445:hover{
        text-decoration: none;
    }

    .frame9403-frame7445 {
      width: auto;
    height: 6%;
    display: flex;
    max-width: 10%;
    box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.25) ;
    box-sizing: border-box;
    padding-top: 0px;
    border-color: transparent;
    padding-left: 20px;
    border-radius: 8.598855018615723px;
    padding-right: 20px;
    flex-direction: column;
    justify-content: center;
    background-color: #A2335D;
    cursor: pointer;
    margin-left: auto;
    margin-right: 10px;
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
  }
  .frame9403-text21 {
    color: #FFFFFF;
    width: auto;
    height: auto;
    font-size: 16px;
    align-self: auto;
    font-family: 'Arial', sans-serif;
    font-weight: 600;
    font-stretch: normal;
    margin: 0 auto;
    text-decoration: none;
  }
</style>
{{-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@latest/js/froala_editor.pkgd.min.js'></script>  	
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/plugins/markdown.min.js"></script> --}}
<script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script type="text/javascript">

    var editor = new Quill('#editor', {
        modules: {
            toolbar: "#quill-toolbar",
        },
        placeholder: "Taip Disini",
        theme: "snow"    
    });	

    document.querySelector('#form').addEventListener('submit', e => {
        e.preventDefault();
        var editor_content = editor.container.firstChild.innerHTML;
        
        document.querySelector('#content').value = editor_content;
        e.target.submit();
    });

    let button = document.getElementById('myBtn');

    document.querySelector('#form').addEventListener('keyup', function(){
    
    var editor_content = editor.container.firstChild.innerHTML;
    
    if(editor_content ==''){
        $('#simpan').attr('disabled', 'disabled');  // Make button disabled
    }
    else{
        $('#simpan').removeAttr('disabled');  // Make button enabled 
    }
    
});
</script>
@endsection