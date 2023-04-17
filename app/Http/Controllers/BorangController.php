<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Borang;
use App\Models\Modul;
use App\Models\Wilayah;
use App\Models\Proses;
use App\Models\Medan;
use App\Models\Audit;
use App\Models\Surat;
use App\Models\Jawapan;
use App\Models\Jawapan_medan;
use App\Models\ProsesKelulusan;
use App\Models\User;
use App\Models\KategoriPengguna;
use App\Models\Tahap_kelulusan;
use App\Models\Kelulusan_borang;
use Illuminate\Http\Request;
use Alert;
use PDF;

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
        $medan->min = $request->min;
        $medan->max = $request->max;
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
        $medan->min = $request->min;
        $medan->max = $request->max;
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
        $wilayah = Wilayah::all()->pluck('nama','id');
        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorang', compact('wilayah','borang', 'medans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function userBorang_submit(Request $request)
    {
        $medanID = $request->medanID;
        $jawapan = $request->jawapan;
        $count = count($jawapan);

        $borangid = $request->borangID;

        $ans = new Jawapan;
        $ans->nama = $request->nama;
        $ans->user_id = Auth::user()->id;
        $ans->borang_id = $borangid;
        $ans->wilayah = $request->wilayah;
        $ans->rancangan = $request->rancangan;
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
        $proseskelulusan = ProsesKelulusan::where('borang_id', $borangId)->first();
        if($proseskelulusan != null){
            $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->orderBy("sequence", "ASC")->get();
            
            $lulusBorangs = Kelulusan_borang::with('tahap_kelulusan')->orderBy('created_at', 'DESC')->get();
            
            $noLulusBorang = [];

            //to make $borangJwpns as empty
            $borangJwpns =  new \Illuminate\Database\Eloquent\Collection();
            // dd($borangJwpns);

            $tahapLulus = 0;

            for($x=0; $x<count($tahapKelulusan); $x++){
                if($x==0){
                    if($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah)
                        ->where('rancangan',  Auth::user()->rancangan)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = [];
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                }else{
                    $z = $x-1;
                    $y = $tahapKelulusan[$z]->sequence + 1;
                    if($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah )->where('rancangan',  Auth::user()->rancangan)
                        ->whereRelation('kelulusanBorang','keputusan', 'Lulus')
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = [];
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                }
            }
            // foreach($tahapKelulusan as $tKelulusan){
            //     if($tKelulusan->user_id == Auth::user()->id){
            //         $borangJwpns = Jawapan::where('borang_id', $borangId)->get();
            //         $tahapLulus = $tKelulusan->id;
            //     }
            // }
            $menuModul = Modul::where('status', 'Go-live')->get();
            $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
            $menuBorang = Borang::where('status', 1)->get();
            
            return view('pengurusanBorang.userListBorang', compact('noLulusBorang','tahapKelulusan','lulusBorangs','borangJwpns','tahapLulus','oneBorang','menuModul', 'menuProses', 'menuBorang'));
        }
        else{
            Alert::error('Borang Tiada Tahap Kelulusan', 'Borang Ini Tiada Tahap Kelulusan');   
            return back();
        }
    }
    public function borangApp_view(Request $request)
    {
        $userId = (int) $request->route('user_id');
        $borangId = (int) $request->route('borang_id');
        $tahapLulus = (int) $request->route('level_app');

        $borangJwpn = Jawapan::where('borang_id', $borangId)->where('user_id', $userId)->first();
        $lulusBorangs = Kelulusan_borang::where('tahapKelulusan_id', $tahapLulus)->where('jawapan_id', $borangJwpn->id)->get();
        $jawapanMedan = Jawapan_medan::where('jawapan_id', $borangJwpn->id)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.viewBorangApp', compact('lulusBorangs','tahapLulus','jawapanMedan','borangJwpn','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borangApp_pdf(Request $request)
    {
        $userId = (int) $request->route('user_id');
        $borangId = (int) $request->route('borang_id');

        $borangJwpn = Jawapan::where('borang_id', $borangId)->where('user_id', $userId)->first();
        $jawapanMedan = Jawapan_medan::where('jawapan_id', $borangJwpn->id)->get();
        
        $data = compact('borangJwpn', 'jawapanMedan');
        $pdf = PDF::loadView('pengurusanBorang.borangPDF', $data);

        return $pdf->download('Borang_Permohonan.pdf');
    }
    
    public function borangApp_update(Request $request)
    {
        $userId = $request->userID;
        $jawapanID = $request->jawapanID;
        $borangId = $request->borangID;
        $tahapLulusID = $request->tahapLulusID;

        $check = count(Kelulusan_borang::where('tahapKelulusan_id', $tahapLulusID)->where('jawapan_id', $jawapanID)->get());
        if($check == 0){
            $lulusBorang = new Kelulusan_borang;
            $lulusBorang->tahapKelulusan_id= $tahapLulusID;
            $lulusBorang->jawapan_id = $jawapanID;
            $lulusBorang->keputusan = $request->status;
            if($request->status == 'Gagal'){
                $lulusBorang->ulasan = $request->ulasan;
            }
            $lulusBorang->save();
        }

        // check amount tahap lulus borang
        $count = count(Tahap_kelulusan::whereRelation('prosesKelulusan','borang_id', '=', $borangId)->get());

        // check amount kelulusan borang that if its final go into if condition
        $count2 = count(Kelulusan_borang::whereRelation('tahap_kelulusan.prosesKelulusan','borang_id', '=', $borangId)->get());

        if($count == $count2){
            $jawapan = Jawapan::find($jawapanID);
            $jawapan->status = "Lulus";
            $jawapan->save();
        }

        return redirect('/user/borang_app/'.$borangId.'/user_list');
    }
    
    public function subBorang_list(Request $request)
    {
        $userId = Auth::user()->id;
        $borangJwpns = Jawapan::where('user_id', $userId)->get();
        if (!$borangJwpns->isEmpty()) {
            foreach($borangJwpns as $jwpn ){
                $kelulusanBorang = Kelulusan_borang::with('tahap_kelulusan')->where('jawapan_id', $jwpn->id)->orderBy('created_at', 'DESC')->get();
            }
        }else{
            $kelulusanBorang = Kelulusan_borang::with('tahap_kelulusan')->where('jawapan_id', 0)->orderBy('created_at', 'DESC')->get();
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

        $category = KategoriPengguna::all();
        $surat = Surat::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function tahapKelulusan_add(Request $request)
    {
        $tkelulusan = new Tahap_kelulusan;
        $tkelulusan->sequence = $request->sequence;
        $tkelulusan->user_category = $request->userCategory;
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
        $category = KategoriPengguna::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        Alert::success('Tambah Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya ditambah.');

        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function tahapKelulusan_update(Request $request)
    {
        $tkelulusan = Tahap_kelulusan::find($request->tahapKelulusanID);
        $tkelulusan->sequence = $request->sequence;
        $tkelulusan->user_category = $request->userCategory;
        $tkelulusan->save();

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $proseskelulusan = ProsesKelulusan::where('borang_id', $idBorang)->first();

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->get();
        $category = KategoriPengguna::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        Alert::success('Kemaskini Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya dikemaskini.');

        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
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
        $category = KategoriPengguna::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        Alert::success('Padam Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya dipadama.');

        return view('pengurusanModul.prosesKelulusan', compact('tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function surat_kelulusan(Request $request)
    {
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $id_tahapKelulusan = $request->tahapKelulusanID;
        $surat = Surat::where('kelulusan_id', $id_tahapKelulusan)->first();
        $tahapKelulusan = Tahap_kelulusan::find($id_tahapKelulusan);

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.suratKelulusan', compact('surat','tahapKelulusan', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
    }

    public function suratKelulusan_add(Request $request)
    {
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $tahapKelulusanID = $request->tahapKelulusanID;
        $tahapKelulusan = Tahap_kelulusan::find($tahapKelulusanID);

        $surat = new Surat;
        $surat->address = $request->address;
        $surat->title = $request->title;
        $surat->body = $request->body;
        $surat->kelulusan_id = $id_tahapKelulusan;
        $surat->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Surat Kelulusan ".$tahapKelulusan->kategoriPengguna->nama." pada Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Cipta Surat Kelulusan Berjaya.', 'Surat kelulusan telah berjaya dicipta.');

        return back();
    }

    public function suratKelulusan_update(Request $request)
    {
        // dd($request->body);
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $tahapKelulusanID = $request->tahapKelulusanID;
        $tahapKelulusan = Tahap_kelulusan::find($tahapKelulusanID);

        $surat = Surat::find($request->suratID);
        $surat->address = $request->address;
        $surat->title = $request->title;
        $surat->body = $request->body;
        $surat->kelulusan_id = $tahapKelulusanID;
        $surat->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Surat Kelulusan ".$tahapKelulusan->kategoriPengguna->nama." pada Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Kemaskini Surat Kelulusan Berjaya.', 'Surat kelulusan telah berjaya dikemaskini.');

        return back();
    }

    public function suratKelulusan_view(Request $request)
    {
        $tahapKelulusanID = $request->tahapKelulusanID;
        $tahapKelulusan = Tahap_kelulusan::find($tahapKelulusanID);

        $surat = Surat::find($request->suratID);

        return view('pengurusanModul.viewSurat', compact('surat','tahapKelulusan'));
    }

    public function borangConsent_add(Request $request)
    {
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);
        $borang->consent = $request->consent;
        $borang->save(); 
        
        $idModul = $request->modulId;
        $idProses = $request->prosesId;

        Alert::success('Kemaskini Persetujuan Berjaya.', 'Persetujuan telah berjaya diKemaskini.');

        return redirect('/moduls/'.$idModul.'/'.$idProses.'/borang/'.$idBorang.'');
    }

}
