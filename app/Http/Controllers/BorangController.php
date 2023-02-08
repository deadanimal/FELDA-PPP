<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Borang;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Medan;
use App\Models\Audit;
use App\Models\Jawapan;
use App\Models\Jawapan_medan;
use App\Models\ProsesKelulusan;
use App\Models\User;
use App\Models\Tahap_kelulusan;
use App\Models\Kelulusan_borang;
use Illuminate\Http\Request;
use Alert;

class BorangController extends Controller
{
    public function borang_detail(Request $request)
    {
        $idBorang = (int)$request->route('borang_id');
        $borang = Borang::find($idBorang);

        $idModul = (int)$request->route('modul_id');
        $modul = Modul::find($idModul);

        $idProses = (int)$request->route('proses_id');
        $proses = Proses::find($idProses);

        $medans = Medan::where('borang_id', $idBorang)->orderBy("sequence", "ASC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function uploadBorang(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $borang->borangPdf =  $request->file('borangPdf')->store('felda-ppp/uploads');
        $borang->save();

        Alert::success('Muat Naik Borang berjaya.', 'Muat naik borang anda berjaya.');   

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borang', compact('borang', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function borang_field_add(Request $request)
    {
        $medan = new Medan;
        $medan->nama = $request->nama;
        $medan->datatype = $request->datatype;
        $medan->pilihan = $request->pilihan;
        $medan->borang_id = $request->borangId;
        $medan->sequence = $request->sequence;
        $medan->save();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);


        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Tambah medan ".$medan->nama." pada Borang ".$borang->namaBorang;
        $audit->save();

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        Alert::success('Tambah Medan Borang berjaya.', 'Tambah medan borang telah berjaya.');   

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function borang_field_update(Request $request)
    {
        $medan = Medan::find($request->medanID);
        $medan->nama = $request->nama;
        $medan->datatype = $request->datatype;
        $medan->pilihan = $request->pilihan;
        $medan->borang_id = $request->borangId;
        $medan->sequence = $request->sequence;
        $medan->save();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);


        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini medan ".$medan->nama." pada Borang ".$borang->namaBorang;
        $audit->save();

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        Alert::success('Kemaskini Medan Borang berjaya.', 'Kemaskini medan borang telah berjaya.');   

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function borang_field_delete(Request $request)
    {
        $medan = Medan::find($request->medanID);
        $nama = $medan->nama;
        $medan->delete();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);


        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam medan ".$nama." pada Borang ".$borang->namaBorang;
        $audit->save();

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        Alert::success('Padam Medan Borang berjaya.', 'Kemaskini medan borang telah berjaya.');   

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function borang_view(Request $request)
    { 
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.viewBorang', compact('borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }
    public function userBorang_view(Request $request)
    {
        $idBorang = (int)$request->route('idBorang');
        $borang = Borang::find($idBorang);

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorang', compact('borang', 'medans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function userBorang_submit(Request $request)
    {
        $medanID = $request->medanID;
        $jawapan = $request->jawapan;
        $count = count($jawapan);

        $borangid = $request->borangID;

        $ans = new Jawapan;
        $ans->nama = $request->nama;
        $ans->ic = $request->ic;
        $ans->user_id = Auth::user()->id;
        $ans->borang_id = $borangid;
        $ans->save();

        $jawapan_id= $ans->id;

        for($x=0; $x<$count; $x++){
            $jwpn_Medan = new Jawapan_medan;
            $jwpn_Medan->jawapan = $jawapan[$x];
            $jwpn_Medan->jawapan_id = $jawapan_id;
            $jwpn_Medan->medan_id = $medanID[$x];
            $jwpn_Medan->save();
        }

        $borang = Borang::find($borangid);
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Menghantar Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Maklumat Anda Berjaya Disimpan.', 'Maklumat anda telah berjaya disimpan.');   
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return redirect('/user/sub_borang/list');
    }

    public function user_listBorang(Request $request)
    {
        $borang = Borang::find($idBorang);

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorang', compact('borang', 'medans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borangList_app(Request $request)
    {
        $borangs = Borang::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.borangList', compact('borangs','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borangApp_search(Request $request)
    {
        $nBorang= $request->searchBorang;
        $borangs = Borang::where('status', 1)->where('namaBorang','LIKE','%'.$nBorang.'%')->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.borangList', compact('borangs','menuModul', 'menuProses', 'menuBorang'));
    }
    

    public function borangApp_list(Request $request)
    {
        $borangId = (int) $request->route('borang_id');
        $oneBorang = Borang::find($borangId);
        if(Auth::user()->kategori->nama == "Pengurus Rancangan"){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Sedang di proses')->get();
        }
        elseif(Str::contains(Auth::user()->kategori->nama , "Wilayah")){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Lulus Peringkat Rancangan')->get();
        }
        elseif(Str::contains(Auth::user()->kategori->nama , "HQ")){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Lulus Peringkat Wilayah')->get();
        }
        elseif(Auth::user()->kategori->nama == "Pengarah Jabatan"){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Lulus Peringkat HQ')->get();
        }
        elseif(Auth::user()->kategori->nama == "Super Admin"){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->get();
        }

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.userListBorang', compact('borangJwpns','oneBorang','menuModul', 'menuProses', 'menuBorang'));
    }
    public function borangApp_view(Request $request)
    {
        $userId = (int) $request->route('user_id');
        $borangId = (int) $request->route('borang_id');
        $oneBorang = Borang::find($borangId);

        $borangJwpns = Jawapan::where('borang_id', $borangId)->where('userid', $userId)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.viewBorangApp', compact('borangJwpns','oneBorang','menuModul', 'menuProses', 'menuBorang'));
    }

    
    public function borangApp_update(Request $request)
    {
        $userId = $request->userID;
        $borangId = $request->borangID;
        $stat = $request->stat;

        $oneBorang = Borang::find($borangId);

        $borangJwpns = Jawapan::where('borang_id', $borangId)->where('userid', $userId)->get();

        foreach($borangJwpns as $jwpn){
            $jawapan = Jawapan::find($jwpn->id);
            if($stat == "Lulus"){
                $action = $jawapan->user->nama;
                if(Auth::user()->kategori->nama == "Pengurus Rancangan"){
                    $jawapan->status = 'Lulus Peringkat Rancangan';
                }
                elseif(Str::contains(Auth::user()->kategori->nama , "Wilayah")){
                    $jawapan->status = 'Lulus Peringkat Wilayah';
                }
                elseif(Str::contains(Auth::user()->kategori->nama , "HQ")){
                    $jawapan->status = 'Lulus Peringkat HQ';
                }
                elseif(Auth::user()->kategori->nama == "Pengarah Jabatan"){
                    $jawapan->status = 'Di sahkan Pengarah Jabatan';
                }
                elseif(Auth::user()->kategori->nama == "Super Admin"){
                    $jawapan->status = 'Lulus Oleh Super Admin';
                }
                Alert::success('Lulus '.$oneBorang->namaBorang.' Berjaya .', 'Lulus '.$oneBorang->namaBorang.' permhononan '.$jwpn->user->nama.' telah berjaya');   
            }
            elseif($stat == "Tidak Lulus"){
                if(Auth::user()->kategori->nama == "Pengurus Rancangan"){
                    $jawapan->status = 'Tidak Lulus Peringkat Rancangan';
                    $jawapan->ulasan = $request->ulasan;
                    $jawapan->pembetulan = $request->pembetulan;
                }
                elseif(Str::contains(Auth::user()->kategori->nama , "Wilayah")){
                    $jawapan->status = 'Tidak Lulus Peringkat Wilayah';
                    $jawapan->ulasan = $request->ulasan;
                    $jawapan->pembetulan = $request->pembetulan;
                }
                elseif(Str::contains(Auth::user()->kategori->nama , "HQ")){
                    $jawapan->status = 'Tidak Lulus Peringkat HQ';
                    $jawapan->ulasan = $request->ulasan;
                    $jawapan->pembetulan = $request->pembetulan;
                }
                elseif(Auth::user()->kategori->nama == "Pengarah Jabatan"){
                    $jawapan->status = 'Tidak Lulus Peringkat Pengarah Jabatan';
                    $jawapan->ulasan = $request->ulasan;
                    $jawapan->pembetulan = $request->pembetulan;
                } 
                elseif(Auth::user()->kategori->nama == "Super Admin"){
                    $jawapan->status = 'Tidak Lulus Oleh Super Admin';
                    $jawapan->ulasan = $request->ulasan;
                    $jawapan->pembetulan = $request->pembetulan;
                }
                
                Alert::success('Tidak Lulus '.$oneBorang->namaBorang.' Berjaya .', 'Borang '.$oneBorang->namaBorang.' permohonan '.$jwpn->user->nama.' tidak diluluskan');   

            }
            $jawapan->save();
        }
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        if ($stat == "Lulus") {
            $audit->action = "Meluluskan Borang ".$oneBorang->namaBorang." yang di hantar oleh ".$jwpn->user->nama;
        } 
        elseif($stat == "Tidak Lulus") {
            $audit->action = "Tidak luluskan Borang ".$oneBorang->namaBorang." yang di hantar oleh ".$jwpn->user->nama;
        }
        $audit->save();
        


        if(Auth::user()->kategori->nama == "Pengurus Rancangan"){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Sedang di proses')->get();
        }
        elseif(Str::contains(Auth::user()->kategori->nama , "Wilayah")){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Lulus Peringkat Rancangan')->get();
        }
        elseif(Str::contains(Auth::user()->kategori->nama , "HQ")){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Lulus Peringkat Wilayah')->get();
        }
        elseif(Auth::user()->kategori->nama == "Pengarah Jabatan"){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->where('status','Lulus Peringkat HQ')->get();
        }
        elseif(Auth::user()->kategori->nama == "Super Admin"){
            $borangJwpns = Jawapan::where('borang_id', $borangId)->get();
        }

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        
        return view('pengurusanBorang.userListBorang', compact('borangJwpns','oneBorang','menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function subBorang_list(Request $request)
    {
        $userId = Auth::user()->id;
        $borangJwpns = Jawapan::where('user_id', $userId)->get();
        if (!$borangJwpns->isEmpty()) {
            foreach($borangJwpns as $jwpn ){
                $kelulusanBorang = Kelulusan_borang::where('jawapan_id', $jwpn->id)->get();
            }
        }else{
            $kelulusanBorang = Kelulusan_borang::where('jawapan_id', 0)->get();
        }
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorangList', compact('kelulusanBorang','borangJwpns','menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function subBorang_view(Request $request)
    {
        $borangId = (int) $request->route('borang_id');
        $userId = Auth::user()->id;

        $borangJwpns = Jawapan::where('borang_id', $borangId)->where('user_id', $userId)->first();
        $jawapanMedans = Jawapan_medan::where('jawapan_id', $borangJwpns->id)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.viewSubBorang', compact('borangJwpns','jawapanMedans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function subBorang_edit(Request $request)
    {
        $borangId = (int) $request->route('borang_id');
        $userId = Auth::user()->id;

        $borangJwpns = Jawapan::where('borang_id', $borangId)->where('userid', $userId)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userUpdateBorang', compact('borangJwpns','menuModul', 'menuProses', 'menuBorang'));
    }

    public function subBorang_update(Request $request)
    {
        $borangId = (int) $request->route('borang_id');
        $userId = Auth::user()->id;

        $borangjwpnId = $request->borangjwpnId;
        $jwpn = $request->jwpn;
        $count = count($jwpn);

        for($x=0; $x<$count; $x++){
            $ans = Jawapan::find($borangjwpnId[$x]);
            $ans->jawapan = $request->jwpn[$x];
            $ans->pembetulan = null;
            $ans->status = "Sedang di proses";
            $ans->ulasan = null;
            $ans->save();
        }

        $borangJwpns = Jawapan::where('userid', $userId)->get();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Mengemaskini Borang ".$oneBorang->namaBorang;
        $audit->save();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorangList', compact('borangJwpns','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borang_kelulusan(Request $request)
    {
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $proseskelulusan = ProsesKelulusan::where('borang_id', $idBorang)->first();

        if($proseskelulusan == null){
            $proseskelulusan = new ProsesKelulusan;
            $proseskelulusan->borang_id = $idBorang;
            $proseskelulusan->save();
        }

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->get();

        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','users', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function tahapKelulusan_add(Request $request)
    {
        $tkelulusan = new Tahap_kelulusan;
        $tkelulusan->sequence = $request->sequence;
        $tkelulusan->user_id = $request->userid;
        $tkelulusan->proseskelulusan_id = $request->proseskelulusanId;
        $tkelulusan->save();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $proseskelulusan = ProsesKelulusan::where('borang_id', $idBorang)->first();

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->get();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','users', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function tahapKelulusan_update(Request $request)
    {
        $tkelulusan = Tahap_kelulusan::find($request->tahapKelulusanID);
        $tkelulusan->sequence = $request->sequence;
        $tkelulusan->user_id = $request->userid;
        $tkelulusan->save();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $proseskelulusan = ProsesKelulusan::where('borang_id', $idBorang)->first();

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->get();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','users', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function tahapKelulusan_delete(Request $request)
    {
        $tkelulusan = Tahap_kelulusan::find($request->tahapKelulusanID);
        $tkelulusan->delete();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $proseskelulusan = ProsesKelulusan::where('borang_id', $idBorang)->first();

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->get();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','users', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }
    
}
