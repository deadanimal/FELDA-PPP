@extends('layouts.guest')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

@section('innercontent')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container-fluid">
    <div class="header">
        <h1 class="header-title">
            BORANG {{$borangJwpn->borangs->namaBorang}}
        </h1>
        <table class="w-100">
            <tr>
                <td>
                    <a href="/user/borang_app/{{$borangJwpn->borangs->id}}/user_list"  class="frame9403-frame7445" style="margin-left:0px;">
                        <div class="frame9403-frame7293">
                        <span class="frame9403-text21"><span>Kembali</span></span>
                        </div>
                    </a>
                </td>
                <td  class="text-right" >
                    @if (!$surats->isEmpty())
                        <div style="display: flex; Justify-content: flex-end;">
                            @foreach ($surats as $surat)
                                    <form action="/user/borang_app/surat/view" method="get" style="margin-bottom:0px;margin-right:2%;">
                                        <input type="hidden" name="jawapan_id" value="{{$borangJwpn->id}}">
                                        <input type="hidden" name="surat_id" value="{{$surat->id}}">
                                        
                                        <button class="btn frame9403-frame7445" style="max-width:none;">
                                            <div class="frame9403-frame7293">
                                                <span class="frame9403-text21">LIHAT SURAT {{$surat->jenis}}</span>
                                            </div>
                                        </button>
                                    </form>
                            @endforeach
                        </div>
                    @endif
                </td>
            </tr>
        </table>
        
        
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="table table-borderless w-100">
                    <tr>
                        <td ><label for="nama" style="font-family:'Arial'">NAMA <span style="color: red;">*</span></label><br></td>
                        <td style="display:flex;"><input class="form-control" name="nama" id="nama" value="{{$borangJwpn->nama}}" readonly style="text-transform: uppercase;"><br></td>
                    </tr>
                    <tr>
                        <td ><label for="wilayah" style="font-family:'Arial', sans-serif">PERINGKAT <span style="color: red;">*</span></label></td>
                        <td style="display:flex;"><input class="form-control" name="wilayah" id="wilayah" value="{{$borangJwpn->wilayahs->nama}}" readonly style="text-transform: uppercase;"></td>
                    </tr>
                    <tr>
                        <td ><label for="rancangan" style="font-family:'Arial', sans-serif">RANCANGAN <span style="color: red;">*</span></label><br></td>
                        <td style="display:flex;"><input class="form-control" name="rancangan" id="rancangan" value="{{$borangJwpn->rancangans->nama}}" readonly style="text-transform: uppercase;"></td>
                    </tr>
                        @foreach($jawapanMedan as $jwpnMedan)
                            @if($jwpnMedan->medan->datatype == "checkbox")
                                <tr>
                                    <td  style="width: 25%;"><label for="nama" style="font-family:'Arial', sans-serif; text-transform:uppercase;">{{$jwpnMedan->medan->nama}}</label></td>
                                    <td style="display:flex;">
                                        <div style="vertical-align: middle;">
                                            @foreach($checkboxes as $chkbox)
                                                @if($chkbox->medan_id == $jwpnMedan->medan->id)
                                                    <input type="radio" id="check{{$chkbox->id}}" name="jawapancheck{{$jwpnMedan->id}}[]" disabled
                                                    @if ($jwpnMedan->jawapan == $chkbox->nama)
                                                        checked
                                                    @endif
                                                    value="{{$chkbox->nama}}" style="border: 2px solid #ced4da;">
                                                    <label for="check{{$chkbox->id}}">{{$chkbox->nama}}</label><br>
                                                @endif
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @elseif($jwpnMedan->medan->datatype == "calendar")
                                <tr>
                                    <td ><label for="jawapan{{$jwpnMedan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase">{{$jwpnMedan->medan->nama}}</label></td>
                                    <td style="display:flex;">
                                        <input type="date" class="form-control" value="{{$jwpnMedan->jawapan}}" id="jawapan{{$jwpnMedan->id}}" style="border: 2px solid #ced4da;" readonly>
                                        <br>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td ><label for="jawapan{{$jwpnMedan->id}}" style="font-family:'Arial', sans-serif; text-transform:uppercase;">
                                            {{$jwpnMedan->medan->nama}}
                                            @if ($jwpnMedan->medan->pilihan == "required")
                                                <span style="color: red;">*</span> 
                                            @endif
                                        </label>
                                    </td>
                                    <td style="display:flex;">
                                        <input style="border: 2px solid #ced4da;" class="form-control" value="{{$jwpnMedan->jawapan}}" id="jawapan{{$jwpnMedan->id}}" readonly><br>
                                    </td>
                                </tr>
                            @endif
                        @endforeach    
                    </tr>
                    <tr>
                        <td ><label for="rancangan" style="font-family:'Arial', sans-serif">NILAI PERMOHONAN DANA (RM)</label><br></td>
                        <td style="display:flex;"><input class="form-control" name="rancangan" id="rancangan" value="{{$borangJwpn->permohonan_dana}}" readonly style="text-transform: uppercase;"></td>
                    </tr>
                    @if ($borangJwpn->nilai_akhir != Null)
                        <tr>
                            <td><label for="ftotal" style="font-family:'Arial', sans-serif">NILAI DANA TAMBAHAN (RM)</label></td>
                            <td style="display:flex;"><input class="form-control" name="ftotal" value="{{$borangJwpn->tambah_dana}}" readonly style="text-transform: uppercase;"></td>
                        </tr>
                        <tr>
                            <td><label for="ftotal" style="font-family:'Arial', sans-serif">NILAI GERAN AKHIR (RM)</label></td>
                            <td style="display:flex;"><input class="form-control" name="ftotal" value="{{$borangJwpn->nilai_akhir}}" readonly style="text-transform: uppercase;"></td>
                        </tr>
                    @endif
                </table>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Senarai perkara yang dimohon.</h5>
                </div>
                <div class="card-body">
                @if (Str::contains(Auth::user()->kategori->nama, 'FIC Wilayah') || Str::contains(Auth::user()->kategori->nama, 'FIC HQ') || Auth::user()->kategoripengguna == '1' || Str::contains(Auth::user()->kategori->nama, 'PEGAWAI KPF')) 
                    @if($lulusBorangs->isEmpty())
                        <form action="/user/projek/tugasan/jawapan/update" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <table class="table table-bordered w-100">
                                <thead>
                                    <th class="perkara"><h5 class="card-title mb-0">JENIS PERKARA</h5></th>
                                    <th class="perkara"><h5 class="card-title mb-0">PERKARA PEMOHONAN</h5></th>
                                    <th class="perkara"><h5 class="card-title mb-0">JUMLAH DI MOHON</h5></th>
                                    <th class="perkara"><h5 class="card-title mb-0">JUMLAH AKHIR</h5></th>
                                    <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS (RM)</h5></th>
                                    <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS AKHIR (RM)</h5></th>
                                </thead>
                                <tbody id="borangField">
                                @foreach($items as $item)
                                    <tr>
                                        <td class="perkara">{{$item->Perkara_Pemohonan->nama}}</td>
                                        <td class="perkara">{{$item->nama}}</td>
                                        <td class="perkara">{{$item->jumlah}}</td>
                                        <td class="perkara">
                                            @if (Str::contains($item->Perkara_Pemohonan->nama, "INFRA") && ((Str::contains(Auth::user()->kategori->nama, 'FIC Wilayah') || Str::contains(Auth::user()->kategori->nama, 'FIC HQ') || Auth::user()->kategoripengguna == '1' )))
                                                <input type="number" class="form-control text-center" name="jumlah_akhir[]" value="{{$item->jumlah_akhir ?? ""}}">
                                                
                                            @elseif (Str::contains($item->Perkara_Pemohonan->nama, "BEKALAN") && (Auth::user()->kategoripengguna == '1' || Str::contains(Auth::user()->kategori->nama, 'PEGAWAI KPF')))
                                                <input type="number" class="form-control text-center" name="jumlah_akhir[]" value="{{$item->jumlah_akhir ?? ""}}">
                                            @else
                                                <input type="number" class="form-control text-center" name="jumlah_akhir[]" value="{{$item->jumlah_akhir ?? ""}}" readonly>
                                            @endif
                                        </td>
                                        <td class="perkara">{{$item->harga}}</td>
                                        <td class="perkara">
                                            @if (Str::contains($item->Perkara_Pemohonan->nama, "INFRA") && ((Str::contains(Auth::user()->kategori->nama, 'FIC Wilayah') || Str::contains(Auth::user()->kategori->nama, 'FIC HQ') || Auth::user()->kategoripengguna == '1' )))
                                                <input type="number" class="form-control text-center" name="harga_akhir[]" value="{{$item->harga_akhir ?? ""}}">
                                                <input type="hidden" name="perkaraID[]" value="{{$item->id}}">
                                                
                                            @elseif (Str::contains($item->Perkara_Pemohonan->nama, "BEKALAN") && (Auth::user()->kategoripengguna == '1' || Str::contains(Auth::user()->kategori->nama, 'PEGAWAI KPF')))
                                                <input type="number" class="form-control text-center" name="harga_akhir[]" value="{{$item->harga_akhir ?? ""}}">
                                                <input type="hidden" name="perkaraID[]" value="{{$item->id}}">
                                            @else
                                                <input type="number" class="form-control text-center" name="harga_akhir[]" value="{{$item->harga_akhir ?? ""}}" readonly>
                                                <input type="hidden" name="perkaraID[]" value="{{$item->id}}">
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="w-100">
                                <input type="hidden" name="jawapan_id" value="{{$borangJwpn->id}}">
                                <tr style="border: 0px">
                                    <td style="border: 0px"><button class="btn btn-primary" type="button" id="rowAdder">Tambah</button></td>
                                    <td style="border: 0px; text-align:end;">
                                        <button type="submit" class="btn btn-primary">Kemaskini</button>
                                    </td>
                                </tr>
                            </table>
                            </form>
                    @else
                    <table class="table table-bordered w-100">
                        <thead>
                            <th class="perkara"><h5 class="card-title mb-0">JENIS PERKARA</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">PERKARA PEMOHONAN</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH DI MOHON</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH AKHIR</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS (RM)</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS AKHIR (RM)</h5></th>
                        </thead>
                        @foreach($items as $item)
                            <tr>
                                <td class="perkara">{{$item->Perkara_Pemohonan->nama}}</td>
                                <td class="perkara">{{$item->nama}}</td>
                                <td class="perkara">{{$item->jumlah}}</td>
                                <td class="perkara">
                                    <input type="number" class="form-control text-center" value="{{$item->jumlah_akhir ?? ""}}" readonly>
                                </td>
                                <td class="perkara">{{$item->harga}}</td>
                                <td class="perkara">
                                    <input type="number" class="form-control text-center" value="{{$item->harga_akhir ?? ""}}" readonly>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @endif
                @else
                    <table class="table table-bordered w-100">
                        <thead>
                            <th class="perkara"><h5 class="card-title mb-0">JENIS PERKARA</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">PERKARA PEMOHONAN</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH DI MOHON</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH AKHIR</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS (RM)</h5></th>
                            <th class="perkara"><h5 class="card-title mb-0">JUMLAH KOS AKHIR (RM)</h5></th>
                        </thead>
                        @foreach($items as $item)
                            <tr>
                                <td class="perkara">{{$item->Perkara_Pemohonan->nama}}</td>
                                <td class="perkara">{{$item->nama}}</td>
                                <td class="perkara">{{$item->jumlah}}</td>
                                <td class="perkara">
                                    <input type="number" class="form-control text-center" value="{{$item->jumlah_akhir ?? ""}}" readonly>
                                </td>
                                <td class="perkara">{{$item->harga}}</td>
                                <td class="perkara">
                                    <input type="number" class="form-control text-center" value="{{$item->harga_akhir ?? ""}}" readonly>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                @endif
                </div>
            </div>

            @if (!$lampirans->isEmpty())
                <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Lampiran</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered w-50">
                    <tr>
                        <th>Nama Lampiran</th>
                        <th>Dimuat Naik</th>
                    </tr>
                    @foreach ($lampirans as $lmp)
                        <tr>
                        <td>{{$lmp->Lampiran->nama}}</td>
                        <td style="width: 25%;">
                            <a href="{{$lmp->file}}">Lihat</a>
                        </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
                </div>
            @endif

            @if($lulusBorangs->isEmpty())
                <div class="card">
                    <table class="table table-borderless">
                        <th>
                            <h1 class="header-title" style="color: var(--bs-body-color)">Kelulusan</h1>
                        </th>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-success" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModal{{$borangJwpn->id}}">Lulus</button>
                    
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$borangJwpn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Lulus Permohonan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if (!$surats->isEmpty())
                                                <b><span style="color: red;">*</span> Sila Pastikan Anda Telah Menyemak Surat-Surat Yang Akan Dijana</b>
                                                <br>
                                                <p>Anda Pasti Mahu Lulus Permohonan {{$borangJwpn->user->nama}}?</p>
                                            @else
                                                <p>Anda Pasti Mahu Lulus Permohonan {{$borangJwpn->user->nama}}?</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>      
                                            <form action="/user/borang_app/update" method="post">
                                                @csrf
                                                <input type="hidden" name="tahapLulusID" value="{{$tahapLulus}}">
                                                <input type="hidden" name="jawapanID" value="{{$borangJwpn->id}}">
                                                <input type="hidden" name="borangID" value="{{$borangJwpn->borangs->id}}">
                                                <input type="hidden" name="userID" value="{{$borangJwpn->userid}}">
                                                <input type="hidden" name="status" value="Lulus">
                                                <button class="btn btn-danger">Ya</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <button type="button" class="btn btn-danger" style="margin-left: 10px" data-toggle="modal" data-target="#exampleModaldel{{$borangJwpn->id}}">Tidak Lulus</button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModaldel{{$borangJwpn->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="/user/borang_app/update">
                                        @csrf
                                        <div class="modal-header">
                                            <p>Anda Pasti Tidak Melulus Permohonan {{$borangJwpn->user->nama}}?<p>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <h5 for="exampleFormControlTextarea1">Ulasan: </h5>
                                                    <textarea type="text" class="form-control" name="ulasan" id="ulasan" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                            <input type="hidden" name="tahapLulusID" value="{{$tahapLulus}}">
                                            <input type="hidden" name="jawapanID" value="{{$borangJwpn->id}}">
                                            <input type="hidden" name="borangID" value="{{$borangJwpn->borangs->id}}">
                                            <input type="hidden" name="userID" value="{{$borangJwpn->userid}}">
                                            <input type="hidden" name="status" value="Gagal">   
                                            <button type="submit" class="btn btn-danger">Ya</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif 
        </div>
    </div>
</div>
<script src="/js/jquery.js"></script>
<script type="text/javascript">
    $("#rowAdder").click(function () {
            newRowAdd = 
            '<tr id="row">'+
                '<td>'+
                    '<select class="form-select border2 text-center" name="jenisAdd[]">'+
                        '@foreach($perkaras as $p)'+
                        '<option value="{{$p->id}}"'+
                            '@if (Str::contains($p->nama, "BEKALAN") && ((Str::contains(Auth::user()->kategori->nama, "FIC Wilayah") || Str::contains(Auth::user()->kategori->nama, "FIC HQ") || Auth::user()->kategoripengguna == "1" )))'+
                                'disabled'+
                            '@elseif (Str::contains($p->nama, "INFRA") && (Auth::user()->kategoripengguna == "1" || Str::contains(Auth::user()->kategori->nama, "PEGAWAI KPF")))'+
                                'disabled'+
                            '@endif'+
                            '>{{$p->nama}}</option>'+
                        '@endforeach'+
                    '</select>'+
                '</td>'+
                '<td>'+
                    '<input type="text" class="form-control border2" name="perkaraAdd[]" required oninput="this.value = this.value.toUpperCase()">'+
                '</td>'+
                '<td>'+
                    '<input type="number" class="form-control border2" name="jumlahAdd[]" required>'+
                '</td>'+
                '<td style="background-color:#e9ecef;">'+
                '</td>'+
                '<td>'+
                    '<input type="number" class="form-control border2" name="kosAdd[]" required>'+
                '</td>'+
                '<td style=" text-align:center;">'+
                    '<button class="btn btn-primary" type="button" id="DeleteRow"><i class="fas fa-fw fa-trash-alt" ></i></button>'+
                '</td>'+
            '</tr>';
            $('#borangField').append(newRowAdd);
    });

    $("body").on("click", "#DeleteRow", function () {
      $(this).parents("#row").remove();
    });
</script>
<style>
    .perkara{
    text-align: center;
    background-color: #FFFFFF !important;
  }
    .table-borderless > tbody > tr > td,
.table-borderless > tbody > tr > th,
.table-borderless > tfoot > tr > td,
.table-borderless > tfoot > tr > th,
.table-borderless > thead > tr > td,
.table-borderless > thead > tr > th {
    border: none;
}
    .frame9403-frame7445 {
    height: 44px;
    display: flex;
    max-width: 170px;
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