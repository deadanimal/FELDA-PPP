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
use App\Models\Acceptance;
use App\Models\Projek;
use App\Models\Perkara_Pemohonan;
use App\Models\Pemohonan_Peneroka;
use App\Models\medanCategory;
use App\Models\Lampiran;
use App\Models\AppLampiran;


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
        $borangs_noti = Borang::where('status', 1)->with('jwpn')->whereRelation('jwpn','status',  '=','Terima')->doesntHave('jwpn.hantarSurat')->count();
        $noti = $tugasans_noti+$aduans_noti+$borangs_noti;

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
        $lampirans = Lampiran::where('borang_id', $idBorang)->get();
        $perkaras = Perkara_Pemohonan::where('borang_id', $idBorang)->get();
        $acceptance = Acceptance::where('borang_id', $idBorang)->orderBy("updated_at", "DESC")->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanModul.borang', compact('noti','acceptance','perkaras','lampirans','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuProjek'));
    }

    // public function uploadBorang(Request $request)
    // {
    //     $borang = Borang::find($request->borangId);
    //     $borang->borangPdf =  $request->file('borangPdf')->store('felda-ppp/uploads');
    //     $borang->save();

    //     Alert::success('Muat Naik Borang berjaya.', 'Muat naik borang anda berjaya.');   

    //     //for notification tugasan
    //     $noti = $this->notification();

    //     $menuModul = Modul::where('status', 'Go-live')->get();
    //     $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
    //     $menuProjek = Projek::where('status', "Aktif")->get();
        
    //     return view('pengurusanModul.borang', compact('noti','borang', 'menuModul', 'menuProses', 'menuProjek'));
    // }

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

        return back();
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
        
        return back();
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

        return back();
    }

    public function borang_view(Request $request)
    { 
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);

        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $perkaras = Perkara_Pemohonan::where('borang_id', $idBorang)->orderBy('created_at', "ASC")->get();
        $lampirans = Lampiran::where('borang_id', $idBorang)->get();

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
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanModul.viewBorang', compact('lampirans','perkaras','checkboxes','noti','borang', 'proses', 'modul', 'medans', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function userBorang_list(Request $request)
    {
        $idProses = (int)$request->route('proses_id');
        $proses = Proses::find($idProses);
        $borangs = Borang::where('proses_id', $idProses)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.borangList', compact('borangs','proses','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function userBorang_view(Request $request)
    {
        $idBorang = (int)$request->route('idBorang');
        $borang = Borang::find($idBorang);
        $wilayah = Wilayah::orderBy('nama', 'ASC')->pluck('nama','id');
        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();
        $perkaras = Perkara_Pemohonan::where('borang_id', $borang->id)->get();
        $lampirans = Lampiran::where('borang_id', $borang->id)->get();

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
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.userBorang', compact('lampirans','perkaras','checkboxes','noti','wilayah','borang', 'medans','menuModul', 'menuProses', 'menuProjek'));
    }

    public function userBorang_submit(Request $request)
    {
        
        $medanID = $request->medanID;
        $jawapan = $request->jawapan;
        $count = $request->countJwpn;
        $borangid = $request->borangID;
        
        $perkara = $request->perkara;
        $jumlah = $request->jumlah;
        $perkara_id = $request->perkara_id;
        $harga = $request->kos;

        //calculate permohonan dana
        $total_dana = 0;
        if ($harga != null) {
            for($x=0; $x<count($harga); $x++){
                $total_dana += (double) $harga[$x];
            }
        }
        
        $ans = new Jawapan;
        $ans->nama = $request->nama;
        $ans->user_id = Auth::user()->id;
        $ans->borang_id = $borangid;
        $ans->wilayah = $request->wilayah;
        $ans->rancangan = $request->rancangan;
        $ans->permohonan_dana = $total_dana;
        $ans->save();

        $jawapan_id= $ans->id;
        
        //insert into jawapan_medans
        $checkbox_amount= 0;
        for($x=0; $x<$count; $x++){
            $medan = Medan::find($medanID[$x]);
            $jwpn_Medan = new Jawapan_medan;
            
            if($medan->datatype == "checkbox"){
                $jawapancheck = ("jawapancheck".$medanID[$x]);
                $checkjawapan = $request->$jawapancheck;
                $jwpn_Medan->jawapan = $checkjawapan[0];
                $checkbox_amount +=1;


                if($medan->nama == "KATEGORI" || $medan->nama == "kategori"){
                    $jenis = $checkjawapan[0];
                    preg_match_all('/(?<=\s|^)\w/iu', $jenis, $matches);
                    $result = implode('', $matches[0]);
                    $projek = strtoupper($result);

                    $w = $ans->wilayahs->nama;
                    preg_match_all('/(?<=\s|^)\w/iu', $w, $matches);
                    $result2 = implode('', $matches[0]);
                    $wilayah = strtoupper($result2);

                    $kod = $projek.$wilayah;

                    $kodProjek = $this->generate_kod($kod);
                    $ans->kod_projek = $kodProjek;
                    $ans->save();
                }
            }
            else{

                if($jawapan[($x-$checkbox_amount)] == null){
                    $jwpn_Medan->jawapan = "";
                }
                else{
                    $jwpn_Medan->jawapan = $jawapan[($x-$checkbox_amount)];
                }
            }
            
            $jwpn_Medan->jawapan_id = $jawapan_id;
            $jwpn_Medan->medan_id = $medanID[$x];
            $jwpn_Medan->save();
        }
        
        //insert into app_lampirans
        if($request->lampiran){
            $lampiran = $request->lampiran;
            $lampiranId = $request->lampiranId;
            for($w=0;  $w<count($lampiranId); $w++){ 
                $lmp = new AppLampiran;
                $files = time().'.'.$lampiran[$w]->extension();  
                $lampiran[$w]->move(public_path('lampiran'), $files);
                $lmp->file = '/lampiran/' . $files;
                $lmp->lampiran_id = $lampiranId[$w];
                $lmp->jawapan_id = $jawapan_id;
                $lmp->save();
            }
        }

        //insert into pemohonan_penerokas
        if($request->countPerkara != null){
            $cp = explode(',', (string)$request->countPerkara);

            if($perkara_id != null){
                for($x=0;  $x<count($cp); $x++){  
                    for($y=0; $y < $cp[$x]; $y++){
                        if($x != 0){
                            if($cp[$x]==1){
                                $item = new Pemohonan_Peneroka;
                                $item->nama = $perkara[$cp[$x]];
                                $item->jumlah = $jumlah[$cp[$x]];
                                $item->harga = $harga[$cp[$x]];
                                $item->perkara_id = $perkara_id[$x];
                                $item->jawapan_id = $ans->id;
                                $item->save();

                            }else{
                                $cp[$x] -=1;
                                $z =  $cp[$x] + $y;
                                
                                $item = new Pemohonan_Peneroka;
                                $item->nama = $perkara[$z];
                                $item->jumlah = $jumlah[$z];
                                $item->harga = $harga[$z];
                                $item->perkara_id = $perkara_id[$x];
                                $item->jawapan_id = $ans->id;
                                $item->save();
                                
                            }
                        }else{
                            $item = new Pemohonan_Peneroka;
                            $item->nama = $perkara[$y];
                            $item->jumlah = $jumlah[$y];
                            $item->harga = $harga[$y];
                            $item->perkara_id = $perkara_id[$x];
                            $item->jawapan_id = $ans->id;
                            $item->save();
                        }
                    }
                }
            }
        }
        

        $borang = Borang::find($borangid);
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Menghantar Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Maklumat Anda Berjaya Disimpan.', 'Maklumat anda telah berjaya disimpan.');   
        
        return redirect('/user/sub_borang/list');
    }

    private function generate_kod($kod){
        $number = mt_rand(1000, 9999);
        $kod_projek = $kod.$number;
        if (Jawapan::where('kod_projek',$kod_projek)->exists()) {
            return generate_kod($kod);
        }
        return $kod_projek;
    }

    public function user_listBorang(Request $request)
    {
        $borang = Borang::find($idBorang);

        $medans = Medan::where('borang_id', $borang->id)->orderBy("sequence", "ASC")->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.userBorang', compact('noti','borang', 'medans','menuModul', 'menuProses', 'menuProjek'));
    }

    public function borangList_app(Request $request)
    {
        $borangs = Borang::with('ProsesKelulusan')->whereHas('jwpn')->whereRelation('ProsesKelulusan.TahapKelulusan', 'user_category', Auth::user()->kategoripengguna)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanBorang.borangList', compact('noti','borangs','menuModul', 'menuProses', 'menuProjek'));
    }

    public function borangApp_search(Request $request)
    {
        $nBorang= $request->searchBorang;
        $borangs = Borang::where('status', 1)->where('namaBorang','LIKE','%'.$nBorang.'%')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanBorang.borangList', compact('noti','borangs','menuModul', 'menuProses', 'menuProjek'));
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

            $tahapLulus = 0;
            for($x=0; $x<count($tahapKelulusan); $x++){
                if($x==0){
                    if(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Pengarah Jabatan') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif((Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Wilayah') || Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'WILAYAH')) && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->where('wilayah', Auth::user()->wilayah)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == 1){
                        $borangJwpns = Jawapan::with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah)
                        ->where('rancangan',  Auth::user()->rancangan)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                }else{
                    $z = $x-1;
                    $y = $tahapKelulusan[$z]->sequence + 1;
                    if(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->whereHas('kelulusanBorang', function ($q) use ($tahapKelulusan, $z) {
                            $q->where('tahapKelulusan_id', $tahapKelulusan[$z]->id)->where('keputusan', 'Lulus');
                        })
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->where('status', 'Lulus')->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'HQ') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->whereHas('kelulusanBorang', function ($q) {
                            $q->latest()->where('keputusan', 'Lulus');
                        })
                        ->where('borang_id', $borangId)->where('status', 'Lulus')->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Jawatankuasa Pelulus') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->where('status', 'Lulus')
                        ->whereHas('kelulusanBorang', function ($q) use ($tahapKelulusan, $z) {
                            $q->where('tahapKelulusan_id', $tahapKelulusan[$z]->id)->where('keputusan', 'Lulus');
                        })
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Jawatankuasa Pelulus') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->whereHas('kelulusanBorang', function ($query) {
                            $query->latest()->where('keputusan', 'Lulus');
                        })
                        ->where('borang_id', $borangId)->where('status', 'Lulus')->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->WhereRelation('$tahapKelulusan[$x]->sequence')->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Pengarah Jabatan') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)
                        ->whereHas('kelulusanBorang', function ($q) use ($tahapKelulusan, $z) {
                            $q->where('tahapKelulusan_id', $tahapKelulusan[$z]->id)->where('keputusan', 'Lulus');
                        })->where('status', 'Lulus')
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif(Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Pengarah Jabatan') && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->whereHas('kelulusanBorang', function ($query) {
                            $query->latest()->where('keputusan', 'Lulus');
                        })->where('status', 'Lulus')
                        ->where('borang_id', $borangId)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                        
                    }
                    //wilayah check same layer need to be check again
                    elseif((Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Wilayah') || Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'WILAYAH')) && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)
                        ->where('wilayah', Auth::user()->wilayah)->where('status', 'Lulus')
                        ->whereHas('kelulusanBorang', function ($query) {
                            $query->latest()->where('keputusan', 'Lulus');
                        })->orderBy('created_at', 'DESC')->get();

                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan','sequence',$tahapKelulusan[$z]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif((Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'Wilayah') || Str::contains($tahapKelulusan[$x]->kategoriPengguna->nama, 'WILAYAH')) && $tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->where('status', 'Lulus')
                        ->where('wilayah', Auth::user()->wilayah)
                        ->whereHas('kelulusanBorang', function ($q) use ($tahapKelulusan, $z) {
                            $q->where('tahapKelulusan_id', $tahapKelulusan[$z]->id)->where('keputusan', 'Lulus');
                        })
                        ->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    
                    elseif($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $tahapKelulusan[$z]->sequence){
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->where('status', 'Lulus')
                        ->whereHas('kelulusanBorang', function ($q) use ($tahapKelulusan, $y) {
                            $q->where('tahapKelulusan_id', $tahapKelulusan[$y]->id)->where('keputusan', 'Lulus');
                        })
                        ->where('wilayah', Auth::user()->wilayah )
                        ->where('rancangan',  Auth::user()->rancangan)->orderBy('created_at', 'DESC')->get();
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();
                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
                        }
                    }
                    elseif($tahapKelulusan[$x]->user_category == Auth::user()->kategoripengguna && $tahapKelulusan[$x]->sequence == $y){
                        
                        $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->with(['jawapanMedan' => function ($query) {
                            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                        }])->where('borang_id', $borangId)->where('status', 'Lulus')
                        ->where('wilayah', Auth::user()->wilayah )->where('rancangan',  Auth::user()->rancangan)
                        ->whereHas('kelulusanBorang', function ($q) use ($tahapKelulusan, $z) {
                            $q->where('tahapKelulusan_id', $tahapKelulusan[$z]->id)->where('keputusan', 'Lulus');
                        })->whereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$z]->sequence)->orderBy('created_at', 'DESC')->get();
                        // $count_lulus = Kelulusan_borang::whereRelation('tahap_kelulusan','prosesKelulusan_id', $proseskelulusan->id)->whereRelation('tahap_kelulusan',"sequence", $tahapKelulusan[$z]->sequence)->where('keputusan', 'Lulus')->count();
                        // $count_TahapLulus = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->where("sequence", $tahapKelulusan[$z]->sequence)->count();

                        // if($count_lulus == $count_TahapLulus){
                        //     $borangJwpns = Jawapan::with('kelulusanBorang', 'kelulusanBorang.tahap_kelulusan')->where('borang_id', $borangId)
                        //     ->where('wilayah', Auth::user()->wilayah )->where('rancangan',  Auth::user()->rancangan)
                        //     ->WhereRelation('kelulusanBorang','keputusan', 'Lulus')
                        //     ->WhereRelation('kelulusanBorang.tahap_kelulusan','sequence', $tahapKelulusan[$x]->sequence)->get();
                        // }
                        // else{
                        //     $borangJwpns = new \Illuminate\Database\Eloquent\Collection();
                        // }
                        $tahapLulus = $tahapKelulusan[$x]->id;
                        $noLulusBorang = new \Illuminate\Database\Eloquent\Collection();

                        if(!$borangJwpns->isEmpty()){
                            foreach($borangJwpns as $jawapan){
                                $noLulusBorang->push(Kelulusan_borang::where('jawapan_id', $jawapan->id)->whereRelation('tahap_kelulusan', 'sequence', $tahapKelulusan[$x]->sequence)->orderBy('created_at', 'DESC')->get());
                            }
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
// dd($noLulusBorang);
            //for notification tugasan
            $noti = $this->notification();

            $menuModul = Modul::where('status', 'Go-live')->get();
            $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
            $menuProjek = Projek::where('status', "Aktif")->get();
            return view('pengurusanBorang.userListBorang', compact('noti','noLulusBorang','tahapKelulusan','lulusBorangs','borangJwpns','tahapLulus','oneBorang','menuModul', 'menuProses', 'menuProjek'));
        }
        else{
            Alert::error('Ralat', 'Borang Tiada Tahap Kelulusan');   
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
        $checkboxes = checkbox::with('medan')->whereRelation('medan', 'borang_id', $borangJwpn->borang_id)->get();
        $items = Pemohonan_Peneroka::where('jawapan_id', $jawapan_id)->get();
        $lampirans = APPLampiran::where('jawapan_id', $jawapan_id)->get();
        $perkaras = Perkara_Pemohonan::where('borang_id', $borangJwpn->borangs->id)->get();

        //checking if its last layer of approval
        $tahapKelulusan = Tahap_kelulusan::whereRelation('ProsesKelulusan','borang_id', $borangJwpn->borangs->id)->orderBy("sequence", "DESC")->first();
        if($tahapKelulusan->user_category == Auth::user()->kategoripengguna){
            $surats = Surat::where('borang_id', $borangJwpn->borangs->id)->get();

        }else{
            $surats = new \Illuminate\Database\Eloquent\Collection();
        }
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanBorang.viewBorangApp', compact('perkaras','surats','lampirans','items','noti','checkboxes','lulusBorangs','tahapLulus','jawapanMedan','borangJwpn','menuModul', 'menuProses', 'menuProjek'));
    }

    public function geran_update(Request $request)
    {
        $medanID = $request->medanID;
        $jawapanMedan = Jawapan_medan::find($medanID);
        $jawapanMedan->jawapan = $request->jawapan;
        $jawapanMedan->save();
        
        Alert::success('Kemaskini Nilai Geran Borang Pemohonan Berjaya.', 'Nilai geran borang pemohonan telah berjaya dikemaskini.');

        return back();
    }
    public function borangApp_pdf(Request $request)
    {
        $jawapan_id = $request->jawapan_id;

        $borangJwpn = Jawapan::find($jawapan_id);
        $surat = Surat::where('borang_id', $borangJwpn->borangs->id)->where('jenis', 'TAWARAN')->first();

        if($surat == null){
            Alert::error('Ralat', 'Tiada Surat Tawaran.');
            return back();

        }else
        {
            $jawapan_kp = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
            $jawapan_jenis = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%JENIS PROJEK%')->first();

            $alamat = $borangJwpn->nama.", \r\n ".$borangJwpn->rancangans->nama.".";
            $surat->address = $alamat;

            $this->nama = $borangJwpn->nama;
            $this->projek = $jawapan_jenis->jawapan;
            $this->kp = $jawapan_kp->jawapan;
            $this->rancangan = $borangJwpn->rancangans->nama;
            $this->nilai_akhir = $borangJwpn->nilai_akhir;

            $text = $surat->body;
            $surat->body = preg_replace_callback('~\{(.*?)\}~',
            function($key)
            {
                $variable['nama'] = $this->nama;
                $variable['no_kp'] = $this->kp;
                $variable['projek'] = $this->projek;
                $variable['rancangan'] = $this->rancangan;
                $variable['nilai_akhir'] = $this->nilai_akhir;
                
                return $variable[$key[1]];      
            },

            $text);

            $jawapanMedan = Jawapan_medan::where('jawapan_id', $jawapan_id)->get();
            $items = Pemohonan_Peneroka::where('jawapan_id', $jawapan_id)->get();

            // $data = compact('borangJwpn', 'jawapanMedan', 'surat','items');
            // $pdf = PDF::loadView('pengurusanBorang.borangPDF', $data)
            // ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'Arial'])
            // ->setPaper('A4', 'portrait');

            return view('pengurusanBorang.suratTemplate', compact('borangJwpn','surat'));
    
            // return $pdf->download(date("Y-m-d").'_Borang_Permohonan_'.$borangJwpn->user->nama.'.pdf');
        }
    }

    public function borangApp_surat(Request $request)
    {
        $jawapan_id = $request->jawapan_id;

        $borangJwpn = Jawapan::find($jawapan_id);
        $surat = Surat::find($request->surat_id);

        if($surat == null){
            Alert::error('Ralat', 'Tiada Surat Tawaran.');
            return back();

        }else
        {
            if (Str::contains($surat->jenis, 'TAWARAN')) {
                $jawapan_kp = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
                $jawapan_jenis = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%JENIS PROJEK%')->first();
    
                $alamat = $borangJwpn->nama.", \r\n ".$borangJwpn->rancangans->nama.".";
                $surat->address = $alamat;
    
                $this->nama = $borangJwpn->nama;
                $this->projek = $jawapan_jenis->jawapan;
                $this->kp = $jawapan_kp->jawapan;
                $this->rancangan = $borangJwpn->rancangans->nama;
                $this->nilai_akhir = $borangJwpn->nilai_akhir;
    
                $text = $surat->body;
                $surat->body = preg_replace_callback('~\{(.*?)\}~',
                function($key)
                {
                    $variable['nama'] = $this->nama;
                    $variable['no_kp'] = $this->kp;
                    $variable['projek'] = $this->projek;
                    $variable['rancangan'] = $this->rancangan;
                    $variable['nilai_akhir'] = $this->nilai_akhir;
                    
                    return $variable[$key[1]];      
                },
    
                $text);            
            } elseif(Str::contains($surat->jenis, 'PENERIMAAN')) {
                $jawapan_alamat = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%alamat%')->first();
                $jawapan_kp = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
                $jawapan_jenis = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%JENIS PROJEK%')->first();
                
                if ($borangJwpn->status == "Terima") {
                    $acceptance = Acceptance::where('borang_id', $borangJwpn->borangs->id)->where('types','Terima')->first();
                    $this->status = $acceptance->name;
                } elseif($borangJwpn->status == "Menolak"){
                    $acceptance = Acceptance::where('borang_id', $borangJwpn->borangs->id)->where('types','Menolak')->first();
                    $this->status = $acceptance->name;
                }else{
                    $this->status = "";
                }

                $this->nama = $borangJwpn->nama;
                $this->kp = $jawapan_kp->jawapan;
                $this->alamat = $jawapan_alamat->jawapan;
                $this->projek = $jawapan_jenis->jawapan;

                if ($borangJwpn->signature != null) {
                    $this->signature = '<div class="c32"><img src="'.$borangJwpn->signature.'"  style="width: 40%;"></div>';
                }else{
                    $this->signature = "";
                }

                $text = $surat->body;
                $surat->body = preg_replace_callback('~\{(.*?)\}~',
                function($key)
                {
                    $variable['nama'] = $this->nama;
                    $variable['alamat'] = $this->alamat;
                    $variable['no_kp'] = $this->kp;
                    $variable['projek'] = $this->projek;
                    $variable['status'] = $this->status;
                    $variable['signature'] = $this->signature;

                    return $variable[$key[1]];      
                },
    
                $text);            
            }else {
                $jawapan_alamat = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%alamat%')->first();
                $jawapan_kp = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
    
                $this->nama = $borangJwpn->nama;
                $this->kp = $jawapan_kp->jawapan;
                $this->alamat = $jawapan_alamat->jawapan;

                if ($borangJwpn->signature != null) {
                    $this->signature = '<div class="c32"><img src="'.$borangJwpn->signature.'"  style="width: 40%;"></div>';
                }else{
                    $this->signature = "";
                }

                $text = $surat->body;
                $surat->body = preg_replace_callback('~\{(.*?)\}~',
                function($key)
                {
                    $variable['nama'] = $this->nama;
                    $variable['alamat'] = $this->alamat;
                    $variable['no_kp'] = $this->kp;
                    $variable['signature'] = $this->signature;

                    return $variable[$key[1]];      
                },
    
                $text); 
            }
            

            // $jawapanMedan = Jawapan_medan::where('jawapan_id', $jawapan_id)->get();
            // $items = Pemohonan_Peneroka::where('jawapan_id', $jawapan_id)->get();

            // $data = compact('borangJwpn', 'jawapanMedan', 'surat','items');
            // $pdf = PDF::loadView('pengurusanBorang.borangPDF', $data)
            // ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'Arial'])
            // ->setPaper('A4', 'portrait');

            return view('pengurusanBorang.suratTemplate', compact('borangJwpn','surat'));
    
            // return $pdf->download(date("Y-m-d").'_Borang_Permohonan_'.$borangJwpn->user->nama.'.pdf');
        }
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

            $jawapan = Jawapan::find($jawapanID);
            $jawapan->status = $request->status;
            $jawapan->save();
        }

        // check kelulusan borang that if its final go into if condition
        $final = Tahap_kelulusan::whereRelation('prosesKelulusan','borang_id', '=', $borangId)->orderBy('sequence', 'DESC')->first();

        if($tahapLulusID == $final->id){
            $jawapan = Jawapan::find($jawapanID);
            $jawapan->status = "Lulus";
            $jawapan->save();
        }

        if($lulusBorang->keputusan == 'Lulus'){
            Alert::success('Lulus Borang Pemohonan Berjaya.', 'Borang telah berjaya Diluluskan.');
        }else{
            Alert::success('Gagal Borang Pemohonan Berjaya.', 'Borang telah berjaya digagalkan.');
        }

        return redirect('/user/borang_app/'.$borangId.'/user_list');
    }

    public function borangApp_all(Request $request)
    {
        // dd($request->LulusList);
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

                $jawapan = Jawapan::find($jawapanID[$x]);
                $jawapan->status = "Lulus";
                $jawapan->save();
            }

            // check amount kelulusan borang that if its final go into if condition
            $final = Tahap_kelulusan::whereRelation('prosesKelulusan','borang_id', '=', $borangId)->orderBy('sequence', 'DESC')->first();

            if($tahapLulusID == $final->id){
                $jawapan = Jawapan::find($jawapanID[$x]);
                $jawapan->status = "Lulus";
                $jawapan->fasa = "PERMOHONAN";
                $jawapan->save();
            }
        }
        Alert::success('Lulus Borang Pemohonan Berjaya.', 'Borang telah berjaya Diluluskan.');

        return redirect('/user/borang_app/'.$borangId.'/user_list');
    }

    public function surat_list(Request $request)
    {
        $borang_id = (int) $request->route('borang_id');
        $borang = Borang::with('proses', 'proses.Projek')->where('id', $borang_id)->first();
        $surats = Surat::where('borang_id', $request->borang_id)->get();
        
        $noti = $this->notification();
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pegawaiKontrak.suratList', compact('noti','borang','surats','menuModul', 'menuProses', 'menuProjek'));
    }

    public function surat_one(Request $request)
    { 
        $surat_id = (int) $request->route('surat_id');
        $surat = Surat::find($surat_id);

        $borang = Borang::with('proses', 'proses.Projek')->where('id', $request->borang_id)->first();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pegawaiKontrak.surat', compact('noti','borang','surat','menuModul', 'menuProses', 'menuProjek'));
    }
    
    public function surat_add(Request $request)
    { 
        $borang_id = $request->borangId;

        $surat = new Surat;
        $surat->jenis = $request->jenis;
        $surat->borang_id = $request->borang_id;
        $surat->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Surat ".$surat->jenis." Pada Borang".$surat->borang->namaBorang;
        $audit->save();

        Alert::success('Cipta Templat Surat Berjaya.', 'Templat surat telah berjaya dicipta.');   

        return back();
    }

    public function surat_update(Request $request)
    { 
        $surat = Surat::find($request->suratID);
        $surat->letter_head = $request->head;
        $surat->title = $request->title;
        $surat->body = $request->body;

        // for signature pad
        if($request->signed)
        {
            $folder = public_path('signature/');
            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $signature = uniqid() . '.'.$image_type;
            $file = $folder . $signature;
            file_put_contents($file, $image_base64);
            $surat->signature = "/signature/".$signature;
        }

        $surat->signatory = $request->signatory;
        $surat->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Surat ".$surat->jenis." Pada Borang".$surat->borang->namaBorang;
        $audit->save();

        Alert::success('Kemaskini Templat Surat Berjaya.', 'Templat surat telah berjaya dikemaskini.');   

        return back();
    }

    public function surat_delete(Request $request)
    { 
        $surat = Surat::find($request->suratID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Surat ".$surat->jenis." Pada Borang".$surat->borang->namaBorang;
        $audit->save();

        $surat->delete();

        Alert::success('Kemaskini Templat Surat Berjaya.', 'Templat surat telah berjaya dikemaskini.');   

        return back();
    }
    
    public function surat_view(Request $request)
    {
        $borang = Borang::find($request->borangID);
        $surat = Surat::find($request->suratID);

        return view('pengurusanModul.viewSurat', compact('surat', 'borang'));
    }
    
    public function subBorang_list(Request $request)
    {
        ini_set('memory_limit', '512M');

        $userId = Auth::user()->id;
        
        $borangJwpns = Jawapan::where('user_id', $userId)
        ->where(function ($query) {
            $query->where('status', '!=', 'Terima')
                  ->orWhere('status','Menolak')
                  ->orWhere('status', NULL);
        })->get();

        if (!$borangJwpns->isEmpty()) {
            foreach($borangJwpns as $jwpn ){
                $kelulusanBorang = Kelulusan_borang::with('tahap_kelulusan')->whereRelation('jawapan','user_id', $userId)->orderBy('created_at', 'DESC')->get();
            }

        }else{
            $kelulusanBorang = Kelulusan_borang::with('tahap_kelulusan')->where('jawapan_id', 0)->orderBy('created_at', 'DESC')->get();
        }

        //for notification tugasan
        $noti = $this->notification();
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.userBorangList', compact('noti','kelulusanBorang','borangJwpns','menuModul', 'menuProses', 'menuProjek'));
    }
    
    public function subBorang_view(Request $request)
    {
        $jwpnId = (int) $request->route('jawapan_id');

        $borangJwpns = Jawapan::find($jwpnId);
        $jawapanMedans = Jawapan_medan::where('jawapan_id', $borangJwpns->id)->get();
        $checkboxes = checkbox::with('medan')->whereRelation('medan', 'borang_id', $borangJwpns->borang_id)->get();
        
        $items = Pemohonan_Peneroka::where('jawapan_id', $jwpnId)->get();
        $lampirans = AppLampiran::where('jawapan_id', $jwpnId)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.viewSubBorang', compact('lampirans','items','noti','checkboxes','borangJwpns','jawapanMedans','menuModul', 'menuProses', 'menuProjek'));
    }

    public function subBorang_tindakan(Request $request)
    {
        $jawapanId = (int) $request->route('jawapan_id');
        
        $borangJwpns = Jawapan::find($jawapanId);
        $surat = Surat::where('borang_id',$borangJwpns->borang_id)->where('jenis', 'TAWARAN')->first();

        if($surat == null){
            Alert::error('Ralat', 'Tiada Surat Tawaran.');
            return back();

        }else
        {
            $jawapan_kp = Jawapan_medan::where('jawapan_id', $jawapanId)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
            $jawapan_jenis = Jawapan_medan::where('jawapan_id', $jawapanId)->whereRelation('medan','medan.nama', 'LIKE','%JENIS PROJEK%')->first();

            $alamat = $borangJwpns->nama.", \r\n ".$borangJwpns->rancangans->nama.".";
            $surat->address = $alamat;

            $this->nama = $borangJwpns->nama;
            $this->projek = $jawapan_jenis->jawapan;
            $this->kp = $jawapan_kp->jawapan;
            $this->rancangan = $borangJwpns->rancangans->nama;
            $this->nilai_akhir = $borangJwpns->nilai_akhir;

            $text = $surat->body;
            $surat->body = preg_replace_callback('~\{(.*?)\}~',
            function($key)
            {
                $variable['nama'] = $this->nama;
                $variable['no_kp'] = $this->kp;
                $variable['projek'] = $this->projek;
                $variable['rancangan'] = $this->rancangan;
                $variable['nilai_akhir'] = $this->nilai_akhir;
                
                return $variable[$key[1]];      
            },

            $text);
        }

        $acceptance = Acceptance::where('borang_id', $borangJwpns->borang_id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.userUpdateBorang', compact('acceptance','noti','surat','borangJwpns','menuModul', 'menuProses', 'menuProjek'));
    }

    public function subBorang_update(Request $request)
    {
        $jawapanId = $request->jawapan_id;
        $tindakan = $request->tindakan;

        $borangJwpn = Jawapan::find($jawapanId);
        $borangJwpn->status = $tindakan;
        $borangJwpn->save();
        
        if($tindakan == "Terima"){        
            Alert::success('Terima Projek '.$borangJwpn->borangs->namaBorang.'', 'Menerima Projek '.$borangJwpn->borangs->namaBorang.' telah berjaya');
            return redirect('/user/sub_borang/'.$jawapanId.'/aku_janji');
        }
        else{
            Alert::success('Menolak Projek '.$borangJwpn->borangs->namaBorang.'', 'Menolak Projek '.$borangJwpn->borangs->namaBorang.' telah berjaya');
            return redirect('/user/sub_borang/list');
            
        }
    }

    public function subBorang_akuJanji(Request $request)
    {
        $jawapan_id = (int) $request->route('jawapan_id');

        $borangJwpns = Jawapan::find($jawapan_id);
        $surat_janji = Surat::where('borang_id',$borangJwpns->borang_id)->where('jenis','LIKE' ,'%janji%')->first();
        $surat_penerimaan = Surat::where('borang_id',$borangJwpns->borang_id)->where('jenis','LIKE' ,'%Penerimaan%')->first();

        if($surat_janji == null || $surat_penerimaan == null){
            Alert::error('Ralat', 'Tiada Surat.');
            return back();

        }else
        {
            $jawapan_alamat = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%alamat%')->first();
            $jawapan_kp = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();

            $this->nama = $borangJwpns->nama;
            $this->alamat = $jawapan_alamat->jawapan;
            $this->kp = $jawapan_kp->jawapan;

            if ($borangJwpn->signature != null) {
                $this->signature = '<div class="c32"><img src="'.$borangJwpn->signature.'"  style="width: 40%;"></div>';
            }else{
                $this->signature = "";
            }

            $text = $surat_janji->body;
            $surat_janji->body = preg_replace_callback('~\{(.*?)\}~',
            function($key)
            {
                $variable['nama'] = $this->nama;
                $variable['no_kp'] = $this->kp;
                $variable['alamat'] = $this->alamat;
                $variable['signature'] = $this->signature;

                return $variable[$key[1]];      
            },

            $text);

                $jawapan_jenis = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%JENIS PROJEK%')->first();
                $acceptance = Acceptance::where('borang_id', $borangJwpns->borangs->id)->where('types','Terima')->first();
                if ($acceptance != null) {
                    $this->status = $acceptance->name;

                }else{
                    $this->status = "";
                }

                $this->projek = $jawapan_jenis->jawapan;
                if ($borangJwpn->signature != null) {
                    $this->signature = '<div class="c32"><img src="'.$borangJwpn->signature.'"  style="width: 40%;"></div>';
                }else{
                    $this->signature = "";
                }
                
                $text2 = $surat_penerimaan->body;
                $surat_penerimaan->body = preg_replace_callback('~\{(.*?)\}~',
                function($key)
                {
                    $variable['nama'] = $this->nama;
                    $variable['alamat'] = $this->alamat;
                    $variable['no_kp'] = $this->kp;
                    $variable['projek'] = $this->projek;
                    $variable['status'] = $this->status;
                    $variable['signature'] = $this->signature;

                    return $variable[$key[1]];      
                },
    
                $text2); 

        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.userBorangJanji', compact('surat_penerimaan','surat_janji','borangJwpns','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function akuJanji_sign(Request $request)
    {
        $jawapan = Jawapan::find($request->jawapan_id);
       
        if($request->signed)
        {
            $folder = public_path('signature/');
            $image_parts = explode(";base64,", $request->signed);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $signature = uniqid() . '.'.$image_type;
            $file = $folder . $signature;
            file_put_contents($file, $image_base64);
            $jawapan->signature = "/signature/".$signature;
        }else{
            Alert::error('Ralat', 'Sila tandatangan semula');
            return back();
        }

        $jawapan->save();

        Alert::success('Berjaya', 'Menandatangani surat berjaya');
        return redirect('/user/project/'.$jawapan->id);
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

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->orderBy('sequence', 'ASC')->get();

        $category = KategoriPengguna::all();
        $surat = Surat::all();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuProjek'));
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

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->orderBy('sequence', 'ASC')->get();
        $category = KategoriPengguna::all();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        Alert::success('Tambah Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya ditambah.');

        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuProjek'));
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

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->orderBy('sequence', 'ASC')->get();
        $category = KategoriPengguna::all();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        Alert::success('Kemaskini Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya dikemaskini.');

        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuProjek'));
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

        $tahapKelulusan = Tahap_kelulusan::where('prosesKelulusan_id', $proseskelulusan->id)->orderBy('sequence', 'ASC')->get();
        $category = KategoriPengguna::all();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        Alert::success('Padam Tahap Kelulusan Berjaya.', 'Tahap Kelulusan telah berjaya dipadama.');

        return view('pengurusanModul.prosesKelulusan', compact('noti','tahapKelulusan','proseskelulusan','category', 'borang','modul','proses','menuModul', 'menuProses', 'menuProjek'));
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
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanModul.suratKelulusan', compact('noti','surat','tahapKelulusan', 'borang','modul','proses','menuModul', 'menuProses', 'menuProjek'));
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

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Persetujuan Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Kemaskini Persetujuan Berjaya.', 'Persetujuan telah berjaya dikemaskini.');

        return redirect('/moduls/'.$idModul.'/'.$idProses.'/borang/'.$idBorang.'');
    }

    public function borangRujukan_add(Request $request)
    {
        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);
        $borang->no_rujukan = $request->rujukan;
        $borang->save(); 

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini No. Rujukan Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Kemaskini No. Rujukan Berjaya.', 'No. Rujukan telah berjaya dikemaskini.');

        return back();
    }

    public function borangLampiran_list(Request $request)
    {
        $idBorang = (int) $request->route('borang_id');
        $borang = Borang::find($idBorang);

        $lampirans = Lampiran::where('borang_id', $idBorang)->get();

        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanModul.lampiranList', compact('lampirans','borang','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function borangLampiran_add(Request $request)
    {
        $idBorang = $request->borangId;
        
        $lampiran = new Lampiran;
        $lampiran->nama = $request->nama;
        $lampiran->borang_id = $idBorang;
        $lampiran->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Lampiran ".$lampiran->nama." Borang ".$lampiran->borang->namaBorang;
        $audit->save();
        
        return back();
    }

    public function borangLampiran_update(Request $request)
    {
        $lampiran = Lampiran::find($request->lampiranID);
        $lampiran->nama = $request->nama;
        $lampiran->save();
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Lampiran ".$lampiran->nama." Borang ".$lampiran->borang->namaBorang;
        $audit->save();

        return back();
    }

    public function borangLampiran_delete(Request $request)
    {
        $lampiran = Lampiran::find($request->lampiranID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Lampiran ".$lampiran->nama." Borang ".$lampiran->borang->namaBorang;
        $audit->save();

        $lampiran->delete();
        
        return back();
    }

    public function checkbox_list(Request $request)
    {
        $medan_id = (int)$request->route('medan_id');
        $medan = Medan::with('borang', 'borang.proses', 'borang.proses.Projek', 'borang.proses.Projek.modul')->where('id',$medan_id)->first();
        // dd($medan);
        $checkboxes = checkbox::where('medan_id', $medan_id)->get();
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanModul.borangCheckbox', compact('checkboxes','medan','noti','menuModul', 'menuProses', 'menuProjek'));
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

    public function checkbox_update(Request $request)
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

    public function acceptance_list(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);

        $acceptance = Acceptance::where('borang_id', $borang->id)->orderBy("updated_at", "DESC")->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('pengurusanModul.acceptance', compact('acceptance','borang','modul','proses','noti','menuModul', 'menuProses', 'menuProjek'));
    }
    
    public function acceptance_add(Request $request)
    {
        $borang = Borang::find($request->borangId);

        $accept = new Acceptance;
        $accept->name = $request->name;
        $accept->types = $request->datatype;
        $accept->borang_id = $request->borang_id;
        $accept->save();
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Penerimaan Tawaran ".$accept->nama." pada Borang ".$accept->borangs->namaBorang;
        $audit->save();

        Alert::success('Cipta Penerimaan Tawaran Berjaya.', 'Penerimaan Tawaran telah berjaya dicipta.');


        $borang = Borang::with('proses')->where('id',$request->borang_id)->first();

        return back();
    }

    public function acceptance_edit(Request $request)
    {
        $accept = Acceptance::find($request->accept_id);
        $accept->name = $request->name;
        $accept->types = $request->datatype;
        $accept->save();
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Penerimaan Tawaran ".$accept->nama." pada Borang ".$accept->borangs->namaBorang;
        $audit->save();

        Alert::success('Kemaskini Penerimaan Tawaran Berjaya.', 'Penerimaan Tawaran telah berjaya dikemaskini.');

        $borang = Borang::with('proses')->where('id', $request->borang_id)->first();

        return back();
    }

    public function acceptance_delete(Request $request)
    {        
        $accept = Acceptance::find($request->accept_id);
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Penerimaan Tawaran ".$accept->nama." pada Borang ".$accept->borangs->namaBorang;
        $audit->save();

        $accept->delete();

        Alert::success('Padam Penerimaan Tawaran Berjaya.', 'Penerimaan Tawaran telah berjaya dipadam.');

        $borang = Borang::with('proses')->where('id',$request->borang_id)->first();

        return back();
    }
}
