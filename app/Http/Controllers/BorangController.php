<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
use App\Models\Aduan;
use App\Models\checkbox;
use App\Models\Senarai_tugasan;
use Illuminate\Http\Request;
use Alert;
use PDF;

class BorangController extends Controller
{
    public function notification(){
        //for notification tugasan
        $date = Carbon::now();
        $tugasans_noti= Senarai_tugasan::where('user_id', Auth::user()->id)->where('due_date', '>=', $date->format('Y-m-d'))->count();
        $aduans_noti= Aduan::where('user_category', Auth::user()->kategoripengguna)->whereNot('status', 'Sah Selesai')->count();
        $noti = $tugasans_noti+$aduans_noti;

        return $noti;
    }

    public function borang_detail(Request $request)
    {
        $idBorang = (int)$request->route('borang_id');
        $borang = Borang::find($idBorang);

        $idModul = (int)$request->route('modul_id');
        $modul = Modul::find($idModul);

        $idProses = (int)$request->route('proses_id');
        $proses = Proses::find($idProses);

        $medans = Medan::where('borang_id', $idBorang)->orderBy("sequence", "ASC")->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borang', compact('noti','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function uploadBorang(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $borang->borangPdf =  $request->file('borangPdf')->store('felda-ppp/uploads');
        $borang->save();

        Alert::success('Muat Naik Borang berjaya.', 'Muat naik borang anda berjaya.');   

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borang', compact('noti','borang', 'menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.borang', compact('noti','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini medan ".$medan->nama." pada Borang ".$borang->namaBorang;
        $audit->save();

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        Alert::success('Kemaskini Medan Borang berjaya.', 'Kemaskini medan borang telah berjaya.');   

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borang', compact('noti','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.borang', compact('noti','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
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
        $checkboxes = new \Illuminate\Database\Eloquent\Collection();
        
        foreach($medans as $medan){
            $checkbox = checkbox::where("medan_id", $medan->id)->get();
            if(!$checkbox->isEmpty()){
                $checkboxes->push($checkbox);
            }
        }
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.viewBorang', compact('checkboxes','noti','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function userBorang_view(Request $request)
    {
        $idBorang = (int)$request->route('idBorang');
        $borang = Borang::find($idBorang);
        $wilayah = Wilayah::all()->pluck('nama','id');
        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();
        $checkboxes = new \Illuminate\Database\Eloquent\Collection();
        
        $checkboxes = new \Illuminate\Database\Eloquent\Collection();
        
        foreach($medans as $medan){
            $checkbox = checkbox::where("medan_id", $medan->id)->get();
            if(!$checkbox->isEmpty()){
                $checkboxes->push($checkbox);
            }
        }
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorang', compact('checkboxes','noti','wilayah','borang', 'medans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function userBorang_submit(Request $request)
    {
        $medanID = $request->medanID;
        $jawapan = $request->jawapan;
        $count = $request->countJwpn;
        $borangid = $request->borangID;

        $ans = new Jawapan;
        $ans->nama = $request->nama;
        $ans->user_id = Auth::user()->id;
        $ans->borang_id = $borangid;
        $ans->wilayah = $request->wilayah;
        $ans->rancangan = $request->rancangan;
        $ans->save();

        $jawapan_id= $ans->id;

        $checkbox_amount= 0;
        for($x=0; $x<$count; $x++){
            $medan = Medan::find($medanID[$x]);
            $jwpn_Medan = new Jawapan_medan;

            if($medan->datatype == "checkbox"){
                $jawapancheck = ("jawapancheck".$medanID[$x]);
                $checkjawapan = $request->$jawapancheck;
                $jwpn_Medan->jawapan = $checkjawapan[0];
                $checkbox_amount +=1;
            }
            else{
                $jwpn_Medan->jawapan = $jawapan[($x-$checkbox_amount)];
            }
            
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
        
        return redirect('/user/sub_borang/list');
    }

    public function user_listBorang(Request $request)
    {
        $borang = Borang::find($idBorang);

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorang', compact('noti','borang', 'medans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borangList_app(Request $request)
    {
        $borangs = Borang::where('status', 1)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.borangList', compact('noti','borangs','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borangApp_search(Request $request)
    {
        $nBorang= $request->searchBorang;
        $borangs = Borang::where('status', 1)->where('namaBorang','LIKE','%'.$nBorang.'%')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.borangList', compact('noti','borangs','menuModul', 'menuProses', 'menuBorang'));
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
                    if(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::where('borang_id', $borangId)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Pengarah Jabatan') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::where('borang_id', $borangId)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif((Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Wilayah') || Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'WILAYAH')) && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::where('borang_id', $borangId)->where('wilayah', Auth::user()->wilayah)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah)
                        ->where('rancangan',  Auth::user()->rancangan)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                }else{
                    $z = $x-1;
                    $y = $tahapKelulusan[$z]->sequence + 1;
                    if(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        ->WhereRelation('kelulusanBorang','keputusan', 'Lulus')
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')
                        ->where('borang_id', $borangId)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Pengarah Jabatan') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        ->WhereRelation('kelulusanBorang','keputusan', 'Lulus')
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Pengarah Jabatan') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')
                        ->where('borang_id', $borangId)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')
                        ->where('borang_id', $borangId)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif((Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Wilayah') || Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'WILAYAH')) && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif((Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Wilayah') || Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'WILAYAH')) && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah)
                        ->WhereRelation('kelulusanBorang','keputusan', 'Lulus')
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    
                    elseif($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah )
                        ->where('rancangan',  Auth::user()->rancangan)->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            $noLulusBorang = Kelulusan_borang::where('jawapan_id', $borangJwpns[0]->id)->get();
                        }
                    }
                    elseif($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        
                        $count_lulus = Kelulusan_borang::whereRelation('tahap_kelulusan','prosesKelulusan_id', $proseskelulusan->id)->whereRelation('tahap_kelulusan',"sequence", $tahapKelulusan[$z]->sequence)->where('keputusan', 'Lulus')->count();
                        $count_TahapLulus = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->where("sequence", $tahapKelulusan[$z]->sequence)->count();
                        
                        if($count_lulus == $count_TahapLulus){
                            $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                            ->where('wilayah', Auth::user()->wilayah )->where('rancangan',  Auth::user()->rancangan)
                            ->WhereRelation('kelulusanBorang','keputusan', 'Lulus')
                            ->WhereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->get();
                        }
                        else{
                            $borangJwpns = new \Illuminate\Database\Eloquent\Collection();
                        }
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();;
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

            //for notification tugasan
            $noti = $this->notification();

            $menuModul = Modul::where('status', 'Go-live')->get();
            $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
            $menuBorang = Borang::where('status', 1)->get();
            
            return view('pengurusanBorang.userListBorang', compact('noti','noLulusBorang','tahapKelulusan','lulusBorangs','borangJwpns','tahapLulus','oneBorang','menuModul', 'menuProses', 'menuBorang'));
        }
        else{
            Alert::error('Borang Tiada Tahap Kelulusan', 'Borang Ini Tiada Tahap Kelulusan');   
            return back();
        }
    }
    public function borangApp_view(Request $request)
    {
        $userId = (int) $request->route('user_id');
        $jawapan_id = (int) $request->route('jawapan_id');
        $tahapLulus = (int) $request->route('level_app');

        $borangJwpn = Jawapan::find($jawapan_id);
        $lulusBorangs = Kelulusan_borang::where('tahapKelulusan_id', $tahapLulus)->where('jawapan_id', $borangJwpn->id)->get();
        $jawapanMedan = Jawapan_medan::where('jawapan_id', $borangJwpn->id)->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanBorang.viewBorangApp', compact('noti','lulusBorangs','tahapLulus','jawapanMedan','borangJwpn','menuModul', 'menuProses', 'menuBorang'));
    }

    public function borangApp_pdf(Request $request)
    {
        $userId = $request->user_id;
        $jawapan_id = $request->jawapan_id;
        $tahapKelulusanID = $request->tahapKelulusanID;

        $surat = Surat::where('kelulusan_id', $tahapKelulusanID)->first();

        $borangJwpn = Jawapan::find($jawapan_id);
        $jawapanMedan = Jawapan_medan::where('jawapan_id', $jawapan_id)->get();

        $data = compact('borangJwpn', 'jawapanMedan', 'surat');
        $pdf = PDF::loadView('pengurusanBorang.borangPDF', $data)
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'Arial'])
        ->setPaper('A4', 'portrait');

        // return view('pengurusanBorang.borangPDF', compact('borangJwpn', 'jawapanMedan', 'surat'));

        
        return $pdf->download(date("Y-m-d").'_Borang_Permohonan_'.$borangJwpn->user->nama.'.pdf');
    }
    
    public function borangApp_update(Request $request)
    {
        $userId = $request->userID;
        $jawapanID = $request->jawapanID;
        $borangId = $request->borangID;
        $tahapLulusID = $request->tahapLulusID;

        $check = Kelulusan_borang::where('tahapKelulusan_id', $tahapLulusID)->where('jawapan_id', $jawapanID)->count();
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

        // check kelulusan borang that if its final go into if condition
        $final = Tahap_kelulusan::whereRelation('prosesKelulusan','borang_id', '=', $borangId)->orderBy('sequence', 'DESC')->first();

        if($tahapLulusID == $final->id){
            $jawapan = Jawapan::find($jawapanID);
            $jawapan->status = "Lulus";
            $jawapan->kod_projek =  "PJK".random_int(1000, 9999);
            $jawapan->save();
        }

        Alert::success('Lulus Borang Pemohonan Berjaya.', 'Borang telah berjaya Diluluskan.');

        return redirect('/user/borang_app/'.$borangId.'/user_list');
    }

    public function borangApp_all(Request $request)
    {
        $jawapanID = $request->LulusList;
        $borangId = $request->borangID;
        $tahapLulusID = $request->tahapLulusID;
        for($x = 0 ; $x<count($jawapanID); $x++){
            $check = Kelulusan_borang::where('tahapKelulusan_id', $tahapLulusID)->where('jawapan_id', $jawapanID[$x])->count();
            if($check == 0){
                $lulusBorang = new Kelulusan_borang;
                $lulusBorang->tahapKelulusan_id= $tahapLulusID;
                $lulusBorang->jawapan_id = $jawapanID[$x];
                $lulusBorang->keputusan = 'Lulus';
                $lulusBorang->save();
            }

            // check amount kelulusan borang that if its final go into if condition
            $final = Tahap_kelulusan::whereRelation('prosesKelulusan','borang_id', '=', $borangId)->orderBy('sequence', 'DESC')->first();

            if($tahapLulusID == $final->id){
                $jawapan = Jawapan::find($jawapanID[$x]);
                $jawapan->status = "Lulus";
                $jawapan->kod_projek =  "PJK".random_int(1000, 9999);
                $jawapan->save();
            }
        }
        Alert::success('Lulus Borang Pemohonan Berjaya.', 'Borang telah berjaya Diluluskan.');

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
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userBorangList', compact('noti','kelulusanBorang','borangJwpns','menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function subBorang_view(Request $request)
    {
        $jwpnId = (int) $request->route('borang_id');

        $borangJwpns = Jawapan::find($jwpnId);
        $jawapanMedans = Jawapan_medan::where('jawapan_id', $borangJwpns->id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.viewSubBorang', compact('noti','borangJwpns','jawapanMedans','menuModul', 'menuProses', 'menuBorang'));
    }

    public function subBorang_edit(Request $request)
    {
        $borangId = (int) $request->route('borang_id');
        $userId = Auth::user()->id;

        $borangJwpns = Jawapan::where('borang_id', $borangId)->where('userid', $userId)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('userView.userUpdateBorang', compact('noti','borangJwpns','menuModul', 'menuProses', 'menuBorang'));
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
        
        return view('userView.userBorangList', compact('noti','borangJwpns','menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        Alert::success('Tambah Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya ditambah.');

        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        Alert::success('Kemaskini Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya dikemaskini.');

        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        Alert::success('Padam Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya dipadama.');

        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
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

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.suratKelulusan', compact('noti','surat','tahapKelulusan', 'borang','modul','proses','menuModul', 'menuProses', 'menuBorang'));
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
        $surat->kelulusan_id = $tahapKelulusanID;
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

        //for notification tugasan
        $noti = $this->notification();

        $surat = Surat::find($request->suratID);

        return view('pengurusanModul.viewSurat', compact('noti','surat','tahapKelulusan'));
    }

    public function borangConsent_add(Request $request)
    {
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);
        $borang->consent = $request->consent;
        $borang->save(); 
        
        $idModul = $request->modulId;
        $idProses = $request->prosesId;

        Alert::success('Kemaskini Persetujuan Berjaya.', 'Persetujuan telah berjaya dikemaskini.');

        return redirect('/moduls/'.$idModul.'/'.$idProses.'/borang/'.$idBorang.'');
    }

    public function checkbox_list(Request $request)
    {
        $medan_id = (int)$request->route('medan_id');
        $medan = Medan::with('borang', 'borang.proses', 'borang.proses.modul', 'borang.proses.modul')->where('id',$medan_id)->first();
        // dd($medan);
        $checkboxes = checkbox::where('medan_id', $medan_id)->get();
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        
        return view('pengurusanModul.borangCheckbox', compact('checkboxes','medan','noti','menuModul', 'menuProses', 'menuBorang'));
    }

    public function checkbox_add(Request $request)
    {
        $medan_id = $request->medan_id;

        $checkboxes = new checkbox;
        $checkboxes->nama = $request->nama;
        $checkboxes->medan_id = $request->medan_id;
        $checkboxes->save();
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Pilihan Kotak Semak ".$checkboxes->nama." pada Medan ".$checkboxes->medan->nama;
        $audit->save();

        Alert::success('Cipta Pilihan Kotak Semak Berjaya.', 'Pilihan kotak semak telah berjaya dicipta.');

        return redirect('/moduls/borang/checkbox/'.$medan_id.'');
    }

    public function checkbox_edit(Request $request)
    {
        $medan_id = $request->medan_id;

        $checkboxes = checkbox::find($request->checkbox_id);
        $checkboxes->nama = $request->nama;
        $checkboxes->medan_id = $request->medan_id;
        $checkboxes->save();
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Pilihan Kotak Semak ".$checkboxes->nama." pada Medan ".$checkboxes->medan->nama;
        $audit->save();

        Alert::success('Kemaskini Pilihan Kotak Semak Berjaya.', 'Pilihan kotak semak telah berjaya dikemaskini.');

        return redirect('/moduls/borang/checkbox/'.$medan_id.'');
    }

    public function checkbox_delete(Request $request)
    {
        $medan_id = $request->medan_id;

        $checkboxes = checkbox::find($request->checkbox_id);
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Pilihan Kotak Semak ".$checkboxes->nama." pada Medan ".$checkboxes->medan->nama;
        $audit->save();

        $checkboxes->delete();

        Alert::success('Padam Pilihan Kotak Semak Berjaya.', 'Pilihan kotak semak telah berjaya dipadam.');

        return redirect('/moduls/borang/checkbox/'.$medan_id.'');
    }
    
}
