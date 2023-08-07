<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use Carbon\Carbon;
use DataTables;
use App\Models\User;
use App\Models\Wilayah;
use App\Models\Modul;
use App\Models\KategoriPengguna;
use App\Models\Rancangan;
use App\Models\Audit;
use App\Models\Senarai_tugasan;
use App\Models\checkbox;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\Perkara_Tugasan;
use App\Models\PerkaraTugasan_Progress;
use App\Models\Jawapan;
use App\Models\Jawapan_medan;
use App\Models\jenis_ternakan;
use App\Models\TarikDiri;
use App\Models\JenisKemaskini;
use App\Models\AktivitiParameter;
use App\Models\Aktiviti;
use App\Models\Jawapan_parameter;
use App\Models\Aduan;
use App\Models\Respond_aduan;
use App\Models\Project;
use App\Models\Surat;
use App\Models\Hantar_Surat;
use App\Models\Tugasan;
use App\Models\TindakanTugasan;
use App\Models\Tindakan_progress;
use App\Models\MedanPO;
use App\Models\InputMedan;
use App\Models\Projek;
use App\Models\Pemohonan_Peneroka;
use App\Models\Penerimaan_bekalan;


use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Alert;
use PDF;

class UserController extends Controller
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

    public function dashboard()
    {
        $noti = $this->notification();
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();

        return view('dashboard', compact('noti','menuModul', 'menuProses', 'menuProjek'));

    }
    public function user_add_page()
    {
        $wilayah = Wilayah::orderBy('nama', 'ASC')->pluck('nama','id');
        $kategoriPengguna = KategoriPengguna::all();
 
        //for notification tugasan
        $noti = $this->notification();
 
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanPengguna.daftarPengguna', compact('noti','wilayah', 'kategoriPengguna', 'menuModul', 'menuProses', 'menuProjek'));

    }

    public function getRancangan($wilayahid){
        $rancangan= Rancangan::where('wilayah',$wilayahid)->orderBy('nama', 'ASC')->get(['id','nama']);
        return json_encode($rancangan);
    }

    public function user_add(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'unique:users'],
            'nama' => ['required', 'string'],
            'nokadpengenalan' => ['required','min:12' ,'string', 'unique:users'],
            'password' => ['required'],
            'kategoripengguna' => ['required'],
            'wilayah' => ['required'],
            'rancangan' => ['required'],
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->idPengguna = $request->idPengguna;
        $user->nama = $request->nama;
        $user->nama_asal = $request->nama_asal;
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
        $user->nokadpengenalan_asal = $request->nokadpengenalan_asal;
        $user->password =  Hash::make($request->password);
        $user->kategoripengguna = $request->kategoripengguna;
        $user->wilayah = $request->wilayah;
        $user->rancangan = $request->rancangan;
        $user->status = 1;

        $user->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta pengguna ".$user->nama;
        $audit->save();

        Alert::success('Daftar pengguna berjaya.', 'Pendaftaran pengguna berjaya.');   
        
        return redirect("/users");
    }

    public function user_info()
    {
        $wilayah = Wilayah::orderBy('nama', 'ASC')->pluck('nama','id');
        $rancangan = Rancangan::all();
        $kategoriPengguna = KategoriPengguna::all();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanPengguna.maklumatPengguna', compact('noti','kategoriPengguna', 'wilayah', 'rancangan', 'menuModul', 'menuProses', 'menuProjek'));
    }


    public function user_info_update(Request $request)
    {
        $user = User::find($request->id);
        $user->email = $request->email;
        if($request->idPengguna != ""){
            $user->idPengguna = $request->idPengguna;
        }
        $user->nama = $request->nama;
        $user->nama_asal = $request->nama_asal;
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
        $user->nokadpengenalan_asal = $request->nokadpengenalan_asal;
        if($request->password != ""){
            $user->password =  Hash::make($request->password);
        }
        $user->kategoripengguna = $request->kategoripengguna;
        $user->wilayah = $request->wilayah;
        $user->rancangan = $request->rancangan;
        $user->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Profil ".$user->nama;
        $audit->save();

        Alert::success('Kemaskini Profil berjaya.', 'Kemaskini Profil telah berjaya.');   
        
        return redirect("/users/info");
    }


    public function user_list(Request $request)
    {
        ini_set('memory_limit', '2048M');

        $id= Auth::user()->id;
        $user = User::where([
            ['id', '!=', $id],    
            ['status', '=', 1]
        ])->orderBy('updated_at', 'desc')->get();
            if($request->ajax()) {
                return DataTables::collection($user)
                ->addIndexColumn() 
                ->addColumn('wilayah', function (User $user) {
                    if($user->wilayah) {
                        $html_ = $user->wilayah_id->nama;
                    } else {
                        $html_ = '-';
                    }
                    return $html_;
                })
                ->addColumn('rancangan', function (User $user) {
                    if($user->rancangan) {
                        $html_ = $user->rancangan_id->nama;
                    } else {
                        $html_ = '-';
                    }
                    return $html_;
                })                    
                ->addColumn('tindakan', function (User $user) {
                    $url = '/users/'.$user->id;
                    $url2 = '/users/'.$user->id.'/delete';
                    return '<a href="'.$url.'" class="btn btn-xs btn-primary frame9402-rectangle828245" title="Kemaskini"></a> 
                    <button type="button" class="btn btn-primary frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModal'.$user->id.'" title="Padam"></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padam Pengguna '.$user->nama.'</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Anda Pasti Mahu Padam Pengguna? <p>
                                <p> Nama: '.$user->nama.'<p>
                                <p> ID Pengguna: '.$user->idPengguna.'<p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                                <a href="'.$url2.'" class="btn btn-danger">YA</a>
                            </div>
                            </div>
                        </div>
                        </div>';
                })                  
                ->rawColumns(['tindakan', 'rancangan', 'wilayah'])                          
                ->make(true);
            }

        $bilangan = count($user);

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanPengguna.senaraiPengguna', compact('noti','user', 'bilangan', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function user_delete(Request $request)
    {
        $id = (int)$request->route('id');
        $user = User::find($id);
        $user->status = 0; 
        $user->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam pengguna ".$user->nama;
        $audit->save();
        Alert::success('Padam pengguna berjaya.', 'Padam pengguna telah berjaya.');   

        return redirect('/users');
    
    }

    public function user_detail(Request $request)
    {
        $id = (int)$request->route('id');
        $wilayah = Wilayah::orderBy('nama', 'ASC')->pluck('nama','id');;
        $kategoriPengguna = KategoriPengguna::all();
        $user = User::find($id);

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanPengguna.kemaskini', compact('noti','user', 'kategoriPengguna', 'wilayah', 'menuModul', 'menuProses', 'menuProjek'));
    }
    public function user_update(Request $request)
    {
        $id = (int)$request->route('id');
        $user = User::find($id);
        $user->email = $request->email;
        $user->idPengguna = $request->idPengguna;
        $user->nama = $request->nama;
        $user->nama_asal = $request->nama_asal;
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
        $user->nokadpengenalan_asal = $request->nokadpengenalan_asal;
        if($request->password != ""){
            $user->password =  Hash::make($request->password);
        }
        $user->kategoripengguna = $request->kategoripengguna;
        $user->wilayah = $request->wilayah;
        $user->rancangan = $request->rancangan;
        $user->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Pengguna ".$user->nama;
        $audit->save();

        Alert::success('Kemaskini pengguna berjaya.', 'Kemaskini pengguna telah berjaya.');   
        
        return redirect("/users");
    }

    public function forgotPengguna(Request $request) {
        return view('auth.forgot');
    }

    public function forgotPenggunaClicked(Request $request) {
        $user = User::where('email',$request->email)->first();
        if($user != null){
            $new_password = Hash::make('Saya<3FeldaPPP');
            $user->password = $new_password;
            $user->save();

            Mail::to($user->email)->send(new ResetPassword('Saya<3FeldaPPP'));
            session()->flash('message','Sila Semak Emel Anda');
  
            return redirect('/login');
        }
        else{
            session()->flash('message','Emel yang anda masukkan tidak wujud di dalam sistem');
            return back();
        }
        
    }

    public function category_list(Request $request)
    {
        $kategoriPenggunas = KategoriPengguna::where([
            ['id', '!=', 1]
        ])->get();
            if($request->ajax()) {
                return DataTables::collection($kategoriPenggunas)
                ->addIndexColumn()   
                ->addColumn('tindakan', function (KategoriPengguna $kategoriPengguna) {
                    $url1 = '/user-categories/'.$kategoriPengguna->id.'/delete';
                    return '<button class="btn btn-primary frame9402-rectangle828245" title="Kemaskini" data-toggle="modal" data-target="#exampleModalUpdate'.$kategoriPengguna->id.'"></button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalUpdate'.$kategoriPengguna->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="POST" action="/user-categories/update">
                                        '.csrf_field().'                                        
                                        <input type="hidden" name="_method" value="PUT">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Kemaskini Ketegori Pengguna '.$kategoriPengguna->nama.'</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="frame9403-group71881">
                                                <span class="frame9403-text04">Nama kategori</span>
                                                <input type="text" class="frame9403-kotaknama" value="'.$kategoriPengguna->nama.'" name="kategoriPengguna">
                                            </div>
                                            <input type="hidden" value="'.$kategoriPengguna->id.'" name="kategoriId">                                    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Kemaskini</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <button type="button" class="btn btn-primary frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModal'.$kategoriPengguna->id.'" title="Padam"></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$kategoriPengguna->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Padam Ketegori Pengguna '.$kategoriPengguna->nama.'</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda Pasti Mahu Padam Ketegori Pengguna '.$kategoriPengguna->nama.'?<p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                                        <a href="'.$url1.'" class="btn btn-danger">YA</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                })                  
                ->rawColumns(['tindakan'])                          
                ->make(true);
            }


            //for notification tugasan
            $noti = $this->notification();

            $menuModul = Modul::where('status', 'Go-live')->get();
            $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
            $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanPengguna.pengurusanKategoriPengguna', compact('noti','kategoriPenggunas', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function category_add(Request $request)
    {
        $kategoriPengguna = new KategoriPengguna;
        $kategoriPengguna->nama = $request->namaKategoriPengguna;
        $kategoriPengguna->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Tambah Kategori Pengguna ".$kategoriPengguna->nama;
        $audit->save();

        Alert::success('Tambah Kategori pengguna berjaya.', 'Kategori pengguna berjaya ditambah.');   
        
        return redirect('/user-categories');
    }

    public function category_update(Request $request)
    {
        $id = $request->kategoriId;
        $kategoriPengguna = KategoriPengguna::find($id);
        $kategoriPengguna->nama = $request->kategoriPengguna;
        $kategoriPengguna->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Kategori Pengguna ".$kategoriPengguna->nama;
        $audit->save();

        Alert::success('Kemaskini Kategori pengguna berjaya.', 'Kategori pengguna berjaya dikemaskini.');   
    
        return redirect('/user-categories');
    }

    public function category_delete(Request $request)
    {
        $id = (int)$request->route('id');
        $kategoriPengguna = KategoriPengguna::find($id);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Kategori Pengguna ".$kategoriPengguna->nama;
        $audit->save();

        $kategoriPengguna->delete();

        Alert::success('Padam Kategori pengguna berjaya.', 'Kategori pengguna berjaya dipadam.');   
    
        return redirect('/user-categories');

    }

    public function user_audit(Request $request)
    {
        $audits = Audit::orderBy("updated_at", "DESC")->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('auditTrail.audit', compact('noti','audits', 'menuModul', 'menuProses', 'menuProjek'));
    }
 
    public function user_auditFilter(Request $request)
    {
        $idPengguna = $request->idPengguna;
        $action = $request->action;
        $from_date = $request->from_date;
        $to_date = $request->to_date;

       if($idPengguna != null && $action != null && $from_date !=null && $to_date !=null){

        $audits = Audit::whereRelation('users','idPengguna', 'LIKE', '%'.$idPengguna.'%')
            ->Where('action', 'LIKE', '%'.$action.'%')
            ->WhereBetween('created_at', [$from_date , $to_date])
            ->orderBy("created_at", "DESC")->get();
        }
        elseif($idPengguna != null && $action != null){

            $audits = Audit::whereRelation('users','idPengguna', 'LIKE', '%'.$idPengguna.'%')
                ->where('action', 'LIKE', '%'.$action.'%')
                ->orderBy("created_at", "DESC")->get();
        }
        elseif($action != null && $from_date !=null && $to_date !=null){
            
            $audits = Audit::where('action', 'LIKE', '%'.$action.'%')
                ->whereBetween('created_at', [$from_date , $to_date])
                ->orderBy("created_at", "DESC")->get();
        }
        elseif($idPengguna != null){
            $audits = Audit::whereRelation('users','idPengguna', 'LIKE', '%'.$idPengguna.'%')->orderBy("created_at", "DESC")->get();
        }
        elseif($action != null ){
            $audits = Audit::where('action', 'LIKE', '%'.$action.'%')->orderBy("created_at", "DESC")->get();

        }
        elseif($from_date != null){
            $audits = Audit::whereBetween('created_at', [$from_date , $to_date])->orderBy("created_at", "DESC")->get();
        }
        else{
            $audits = Audit::whereRelation('users','idPengguna', 'LIKE', '%'.$idPengguna.'%')
            ->orWhere('action', 'LIKE', '%'.$action.'%')
            ->orWhereBetween('created_at', [$from_date , $to_date])
            ->orderBy("created_at", "DESC")->get();
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('auditTrail.auditFilter', compact('noti','audits', 'menuModul', 'menuProses', 'menuProjek', 'idPengguna', 'action', 'from_date', 'to_date'));
    }
    
    public function tugasList_app(Request $request)
    {
        ini_set('memory_limit', '2048M');

        $user = Auth::user()->id;

        //aduans with usercategory check
        if(Str::contains(Auth::user()->kategori->nama, 'HQ')){
            $aduans = Aduan::where('user_category', Auth::user()->kategoripengguna)->get();
        }elseif(Str::contains(Auth::user()->kategori->nama, 'Super Admin')){
            $aduans = Aduan::where('user_category', Auth::user()->kategoripengguna)->get();
        }elseif(Str::contains(Auth::user()->kategori->nama, 'wilayah')|| Str::contains(Auth::user()->kategori->nama, 'WILAYAH')){
            $aduans = Aduan::where('user_category', Auth::user()->kategoripengguna)->where('wilayah', Auth::user()->wilayah)->get();
        }else{
            $aduans = Aduan::where('user_category', Auth::user()->kategoripengguna)->where('wilayah', Auth::user()->wilayah)->where('rancangan',Auth::user()->rancangan)->get();
        }
        
        if(Str::contains(Auth::user()->kategori->nama, 'PEGAWAI KONTRAK')){
            $borangs = Borang::with('jwpn')->where('status', 1)->whereRelation('jwpn','status', '=','Terima')->get();
            $surats = Hantar_surat::whereRaw('json_contains(carbon_copy, \'["' .Auth::user()->kategoripengguna. '"]\')')->get();
        }else{
            $borangs = new \Illuminate\Database\Eloquent\Collection();
            if(Str::contains(Auth::user()->kategori->nama, 'HQ')){
                $surats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                    $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                }])->whereRaw('json_contains(carbon_copy, \'["' .Auth::user()->kategoripengguna. '"]\')')->orderBy('created_at', "DESC")->get();
            }elseif(Str::contains(Auth::user()->kategori->nama, 'Super Admin')){
                $surats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                    $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                }])->whereRaw('json_contains(carbon_copy, \'["' .Auth::user()->kategoripengguna. '"]\')')->orderBy('created_at', "DESC")->get();
            }elseif(Str::contains(Auth::user()->kategori->nama, 'wilayah')|| Str::contains(Auth::user()->kategori->nama, 'WILAYAH')){
                $surats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                    $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                }])->whereRaw('json_contains(carbon_copy, \'["' .Auth::user()->kategoripengguna. '"]\')')->whereRelation('jawapan','wilayah', Auth::user()->wilayah)->orderBy('created_at', "DESC")->get();
            }else{
                $surats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                    $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
                }])->whereRaw('json_contains(carbon_copy, \'["' .Auth::user()->kategoripengguna. '"]\')')->whereRelation('jawapan','wilayah', Auth::user()->wilayah)->whereRelation('jawapan','rancangan', Auth::user()->rancangan)->orderBy('created_at', "DESC")->get();
            }
        }

        if(Str::contains(Auth::user()->kategori->nama, 'HQ')){
            $hantarSurats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
            }])->where('userCategory_id', Auth::user()->kategoripengguna)->orderBy('created_at', "DESC")->get();
        }elseif(Str::contains(Auth::user()->kategori->nama, 'Super Admin')){
            $hantarSurats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
            }])->where('userCategory_id', Auth::user()->kategoripengguna)->orderBy('created_at', "DESC")->get();
        }elseif(Str::contains(Auth::user()->kategori->nama, 'wilayah') || Str::contains(Auth::user()->kategori->nama, 'WILAYAH')){
            $hantarSurats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
            }])->where('userCategory_id', Auth::user()->kategoripengguna)->whereRelation('jawapan','wilayah', Auth::user()->wilayah)->orderBy('created_at', "DESC")->get();
        }else{
            $hantarSurats = Hantar_surat::with('jawapan')->with(['jawapan.jawapanMedan' => function ($query) {
                $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
            }])->where('userCategory_id', Auth::user()->kategoripengguna)->whereRelation('jawapan','wilayah', Auth::user()->wilayah)->whereRelation('jawapan','rancangan', Auth::user()->rancangan)->orderBy('created_at', "DESC")->get();
        }
        
        $jawapan_rancangan = Jawapan::where('status','Terima')->where('fasa', 'PEMBEKALAN')->where('rancangan', Auth::user()->rancangan)->get();

        $borangKelulusan = Borang::with('ProsesKelulusan')->whereHas('jwpn')->whereRelation('ProsesKelulusan.TahapKelulusan', 'user_category', Auth::user()->kategoripengguna)->get();

        $date = Carbon::now();
        $tugasans_noti= Senarai_tugasan::where('user_id', Auth::user()->id)->where('due_date', '>=', $date->format('Y-m-d'))->count();
        $aduans_noti= Aduan::where('user_category', Auth::user()->kategoripengguna)->whereNot('status', 'Sah Selesai')->count();
        $borangs_noti = Borang::where('status', 1)->with('jwpn')->whereRelation('jwpn','status',  '=','Terima')->doesntHave('jwpn.hantarSurat')->count();
        $noti = $tugasans_noti+$aduans_noti+$borangs_noti;

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.userTugasan', compact('borangKelulusan','jawapan_rancangan','noti','borangs_noti','tugasans_noti','aduans_noti','hantarSurats','borangs','aduans','surats', 'menuModul', 'menuProses', 'menuProjek'));
         
    }

    public function tugasItem_list(Request $request)
    {
        $tugas_id = (int)$request->route('tugas_id');

        $tugasans= Senarai_tugasan::find($tugas_id);

        $tugasan_item = Perkara_Tugasan::where('tugasan_id', $tugas_id)->get();

        //for notification tugasan
        $noti = $this->notification();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        return view('userView.userTugasanItem', compact('noti','tugasan_item','tugasans', 'menuModul', 'menuProses', 'menuProjek'));
        
    }

    public function tugasItem_add(Request $request)
    {
        $tugas_id = $request->tugasan_id;

        $item = new Perkara_Tugasan;
        $item->nama = $request->namaTugas;
        $item->plan_date = $request->plan_date;
        $item->tugasan_id = $tugas_id;
        $item->user_id = Auth::user()->id;
        $item->save();

        return redirect('/user/tugasan/'.$tugas_id.'/item_list');
    }

    public function tugasItemProgress_list(Request $request)
    {
        $tugas_id = (int)$request->route('tugas_id');

        $tugasItem_id = (int)$request->route('item_id');

        $tugasan_item = Perkara_Tugasan::find($tugasItem_id);
        $item_progress = PerkaraTugasan_Progress::where('perkara_tugasan', $tugasItem_id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.userTugasanProgress', compact('noti','item_progress','tugasan_item','tugas_id', 'menuModul', 'menuProses', 'menuProjek'));
        
    }

    public function tugasItemProgress_add(Request $request)
    {
        $tugas_id = $request->tugas_id;
        $tugasItem_id = $request->tugasItem_id;

        $tugas_progress = new PerkaraTugasan_Progress;
        $tugas_progress->progress = $request->progress;
        $tugas_progress->actual_date = $request->actual_date;
        $tugas_progress->perkara_tugasan = $tugasItem_id;
        $tugas_progress->save();

        return redirect('/user/tugasan/'.$tugas_id.'/tugas_item/'.$tugasItem_id.'/progress_list');
    }

    public function project_list(Request $request)
    {               
        $jawapans = Jawapan::where('user_id', Auth::user()->id)->whereNot('Status','Menolak')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.userProjectList', compact('noti','jawapans', 'menuModul', 'menuProses', 'menuProjek'));
    }
    
    public function project_view(Request $request)
    { 
        $jawapanId = (int) $request->route('jawapan_id');

        $jawapan = Jawapan::find($jawapanId);
        $jawapanMedan = Jawapan_medan::where('jawapan_id', $jawapan->id)->get();
        $surats = Surat::where('borang_id', $jawapan->borangs->id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.projectDetail', compact('surats','jawapan', 'jawapanMedan','noti','menuModul', 'menuProses', 'menuProjek'));
    }   
    
    public function viewTarik_diri(Request $request)
    {         
        ini_set('memory_limit', '2048M');

        $jawapanId = (int) $request->route('jawapan_id');
        $jawapan = Jawapan::find($jawapanId);
        $tarikDiri = TarikDiri::where('jawapan_id', $jawapanId)->first();

        $users = User::whereRelation('kategori', 'nama', '=', 'Peserta')->where('status', 1)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.tarikDiri', compact('noti','jawapan', 'users','tarikDiri','menuModul', 'menuProses', 'menuProjek'));
    } 

    public function tarik_diri(Request $request)
    {         
        $jawapanId = $request->jawapanId;

        $tarik = new TarikDiri;
        $tarik->reason = $request->reason;
        $tarik->jawapan_id = $jawapanId;
        $tarik->user_id = Auth::user()->id;
        $tarik->pengganti_id = $request->pengganti;
        $tarik->save();

        Alert::success('Simpan Permohonan Tarik Diri berjaya.', 'Permohonan Tarik diri sedang diproses.');   

        return back();
    }
    
    public function tarik_diri_update(Request $request)
    {         
        $jawapanId = $request->jawapanId;

        $tarik = TarikDiri::find($request->tarikDiriID);
        $tarik->reason = $request->reason;
        $tarik->jawapan_id = $jawapanId;
        $tarik->user_id = Auth::user()->id;
        $tarik->pengganti_id = $request->pengganti;
        $tarik->save();

        Alert::success('Kemaskini Permohonan Tarik Diri berjaya.', 'Permohonan Tarik diri sedang diproses.');   

        return back();
    } 

    public function tarik_diri_delete(Request $request)
    {  
        $jawapanId = $request->jawapanId;

        $tarik = TarikDiri::find($request->tarikDiriID);
        $tarik->delete();

        Alert::success('Batal Permohonan Tarik Diri berjaya.', 'Permohonan Tarik diri telah dibatalkan.');   

        return redirect('/tarikDiri/'.$jawapanId);
    } 

    public function kemaskini_projek(Request $request)
    { 
        $jawapanId = (int) $request->route('jawapan_id');

        $jawapan = Jawapan::find($jawapanId);
        $borang = Borang::find($jawapan->borang_id);
        
        $jenisTernakan = jenis_ternakan::where('proses_id', $borang->proses_id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.kemaskiniProjek', compact('noti','jawapan', 'jenisTernakan','menuModul', 'menuProses', 'menuProjek'));
    }

    public function kemaskini_list(Request $request)
    { 
        $ternakanId = (int) $request->route('ternakan_id');

        $jenisTernakan = jenis_ternakan::find($ternakanId);

        $kemaskinis = JenisKemaskini::where('id_jenisTernakans', $ternakanId)->orderBy("updated_at", "DESC")->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.kemaskiniList', compact('noti','kemaskinis', 'jenisTernakan','menuModul', 'menuProses', 'menuProjek'));
    }

    public function aktiviti_list(Request $request)
    { 
        $kemaskiniId = (int) $request->route('kemaskini_id');

        $kemaskini = JenisKemaskini::find($kemaskiniId);

        $aktivitis = Aktiviti::where('id_jenisKemaskini', $kemaskiniId)->orderBy("updated_at", "DESC")->get();

        $params = new \Illuminate\Database\Eloquent\Collection();
        $jawapans = new \Illuminate\Database\Eloquent\Collection();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.kemaskiniAktivit', compact('noti','kemaskini', 'aktivitis','params','menuModul', 'menuProses', 'menuProjek'));
    }

    public function Param_list(Request $request)
    { 
        ini_set('memory_limit', '2048M');

        $aktivitiId = $request->aktiviti;
        $kemaskiniId = $request->kemaskiniId;

        $kemaskini = JenisKemaskini::find($kemaskiniId);

        $aktivitis = Aktiviti::where('id_jenisKemaskini', $kemaskiniId)->orderBy("updated_at", "DESC")->get();

        $params = AktivitiParameter::where('aktiviti', $aktivitiId)->get();
        $jawapans = Jawapan_parameter::whereRelation('AktivitiParameter', 'aktiviti' ,$aktivitiId)->where('user_id', Auth::user()->id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.kemaskiniAktivit', compact('noti','kemaskini', 'aktivitis','params','jawapans','menuModul', 'menuProses', 'menuProjek'));
    }

    public function KemasParam_add(Request $request)
    { 
        $paramId = $request->paramId;
        $jwpnParam = $request->jwpnParam;
        
        for($x=0;$x<count($paramId);$x++){
            $jawapan = new Jawapan_parameter;
            $jawapan->value= $jwpnParam[$x];
            $jawapan->user_id= Auth::user()->id;
            $jawapan->aktivitiParameter_id = $paramId[$x];
            $jawapan->save();
        }

        Alert::success('Kemaskini Aktiviti berjaya.', 'Kemaskini Aktiviti telah berjaya.');   

        return back();

    }

    public function KemasParam_update(Request $request)
    { 
        $paramId = $request->paramId;
        $jwpnParam = $request->jwpnParam;
        $jawapanID = $request->jawapanID;

        for($x=0;$x<count($paramId);$x++){
            $jawapan = Jawapan_parameter::find($jawapanID[$x]);
            $jawapan->value= $jwpnParam[$x];
            $jawapan->user_id= Auth::user()->id;
            $jawapan->aktivitiParameter_id = $paramId[$x];
            $jawapan->save();
        }

        Alert::success('Kemaskini Aktiviti berjaya.', 'Kemaskini Aktiviti telah berjaya.');   

        return back();

    }

    public function tarik_diri_list(Request $request)
    { 
        $tarikDiris = TarikDiri::with('jawapan')->whereRelation('jawapan', 'rancangan', '=', Auth::user()->rancangan)->where('status', 'Sedang Di Proses')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanBorang.tarikDiriList', compact('noti','tarikDiris','menuModul', 'menuProses', 'menuProjek'));

    }

    public function tarik_diri_details(Request $request)
    { 
        $tarikDiri_id = (int) $request->route('tarikDiri_id');

        $tarikDiri = TarikDiri::find($tarikDiri_id)->with('jawapan')->first();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanBorang.tarikDiriDetail', compact('noti','tarikDiri','menuModul', 'menuProses', 'menuProjek'));

    }

    public function tarik_diri_status(Request $request)
    {  
        $tarikDiriId = $request->tarikDiriId;

        $tarik = TarikDiri::find($tarikDiriId);
        $tarik->status = $request->status;
        $tarik->save();

        if($request->status == 'Sah'){
            Alert::success('Mengesahkan Permohonan Tarik Diri Berjaya.', 'Permohonan tarik diri telah disahkan.');
            
            $jwpn = Jawapan::find($tarik->jawapan_id);
            $jwpn->user_id = $tarik->pengganti_id;
            $jwpn->save();

        }else{
            Alert::success('Tidak Mengesahkan Permohonan Tarik Diri Berjaya.', 'Permohonan tarik diri telah disahkan.');   
        }

        return redirect('/tarik_Diri/List');
    }
    
    public function tarik_diri_view(Request $request)
    {
        $users = User::where('rancangan', Auth::user()->rancangan)->get();
        $borangs = Borang::all()->pluck('namaBorang', 'id');

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusanBorang.forceTarikDiri', compact('noti','users','borangs','menuModul', 'menuProses', 'menuProjek'));

    }

    public function getPeneroka($borangid)
    {
        $jawapan= Jawapan::with('user')->where('borang_id',$borangid)->where('rancangan', Auth::user()->rancangan)->where('status', 'Lulus')->get()->pluck('user.nama', 'user_id');
        return json_encode($jawapan);
    }

    public function tarik_diri_paksa(Request $request)
    {  
        $jawapan = Jawapan::where('borang_id', $request->project)->where('user_id', $request->namaAsal)->first();
        
        $tarik = new TarikDiri;
        $tarik->reason = $request->reason;
        $tarik->jawapan_id = $jawapan->id;
        $tarik->user_id = $request->namaAsal;
        $tarik->pengganti_id = $request->pengganti;
        $tarik->save();

        Alert::success('Permohonan Tarik Diri Berjaya.', 'Permohonan tarik diri telah disimpan.');   
        
        return redirect('/tarik_Diri/List');
    } 
    
    public function aduan_list(Request $request)
    {  
        $aduans = Aduan::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        if($request->ajax()) {
            return DataTables::collection($aduans)
            // ->editColumn('nama', function(Aduan $aduans) { 
            //     return nl2br($aduans->nama);
            // })
            ->editColumn('created_at', function(Aduan $aduans){ 
                return \Carbon\Carbon::parse($aduans->created_at )->isoFormat('DD/MM/YYYY');
            })
            ->addColumn('tindakan', function (Aduan $aduans) {
                return '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal'.$aduans->id.'" title="Padam">Padam</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal'.$aduans->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Padam Aduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Anda Pasti Mahu Aduan Ini?<p>
                                    <label for="title" class="frame9402-text04">
                                        <strong>Tajuk Aduan</strong>
                                    </label>
                                    <input type="text" class="form-control frame9402-kotaknamaBorang" name="title" id="title" value="'.$aduans->title.'" readonly>
                                
                                    <label for="nama" class="frame9402-text04">
                                        <strong>Aduan</strong>
                                    </label>
                                    <textarea class="form-control frame9403-kotaknama" name="nama" id="nama" rows="4" oninput="this.value = this.value.toUpperCase()" readonly>'.str_replace('<br />', '', nl2br(e($aduans->nama))).'</textarea>
                                    <br>
                                    <label for="jenisAduan" class="frame9402-text04">
                                        <strong>Jenis Aduan</strong>
                                    </label>
                                    <input type="text" class="frame9402-kotaknamaBorang" id="jenisAduan" value="'.$aduans->jenis_aduan.'" name="jenisAduan" required oninput="this.value = this.value.toUpperCase()" disabled>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">TIDAK</button>
                                    <form action="/Aduan/delete" method="post">
                                    '.csrf_field().'  
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="aduanId" value="'.$aduans->id.'">                                      
                                    <button class="btn btn-danger">YA</button>
                                </div>
                            </div>
                        </div>
                    </div>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }

        //for notification tugasan
        $noti = $this->notification();
        $wilayah = Wilayah::orderBy('nama', 'ASC')->pluck('nama','id');

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('aduan.aduanList', compact('noti','wilayah','aduans','menuModul', 'menuProses', 'menuProjek'));
    }
    
    public function aduan_add(Request $request)
    { 
        $aduan = new Aduan;
        $aduan->title = $request->title;
        $aduan->nama = $request->nama;
        $aduan->jenis_aduan = $request->jenisAduan;
        $aduan->wilayah = $request->wilayah;
        $aduan->rancangan = $request->rancangan;
        $aduan->user_id = Auth::user()->id;
        $aduan->save();

        Alert::success('Cipta Aduan Berjaya.', 'Aduan telah berjaya dicipta.');   

        return redirect('/Aduan/List');

    }
    
    public function aduan_delete(Request $request)
    { 
        $aduan = Aduan::find($request->aduanId);

        $aduan->delete();

        Alert::success('Padam Aduan Berjaya.', 'Aduan telah berjaya dipadam.');   

        return redirect('/Aduan/List');

    }

    public function pegawaiAduan_list(Request $request)
    { 
        $aduans = Aduan::orderBy('created_at', 'DESC')->get();
        if($request->ajax()) {
            return DataTables::collection($aduans)
            ->addColumn('user', function (Aduan $aduans) {
                if($aduans->user_id) {
                    $html_ = $aduans->user->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            }) 
            // ->editColumn('nama', function(Aduan $aduans) { 
            //     return nl2br(e($aduans->nama));
            // })
            ->editColumn('created_at', function(Aduan $aduans){ 
                return \Carbon\Carbon::parse($aduans->created_at )->isoFormat('DD/MM/YYYY');
            })
            ->addColumn('tindakan', function (Aduan $aduans) {
                $url = "/Aduan/respon/$aduans->id/list";
                $options = '';
                $userCategorys = KategoriPengguna::all();
                foreach($userCategorys as $userCategory){
                    if ($aduans->user_category == $userCategory->id) {
                        $options .= '<option value="'.$userCategory->id.'" selected>'.$userCategory->nama.'</option>';
                    } else {
                        $options .= '<option value="'.$userCategory->id.'">'.$userCategory->nama.'</option>';
                    }
                }
                return '
                <a href="'.$url.'" class="btn btn-primary" style="text-transform:capitalize;">Lihat Respond</a><br><br>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal'.$aduans->id.'" title="selesai" style="width: -webkit-fill-available;">Tindakan</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal'.$aduans->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="/Aduan/Pegawai/tindakan" method="post">
                                '.csrf_field().'
                                <input type="hidden" name="_method" value="PUT"> 
                                <input type="hidden" name="aduanID" value="'.$aduans->id.'"> 
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tindakan Aduan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="respond" class="frame9402-text04">
                                        <strong>Jenis Jawapan</strong>
                                    </label>
                                    <select name="jenisRespond" class="form-control frame9402-kotaknamaBorang">
                                        <option value="'.$aduans->jenis_respond.'" selected>'.$aduans->jenis_respond.'</option>
                                        <option value="Text">Text</option>
                                        <option value="Upload">Upload</option>
                                    </select>

                                    <label for="user_category" class="frame9402-text04" >
                                        <strong>Kategori Pengguna Yang Ditugaskan</strong>
                                    </label>
                                    <select id="user_category" name="user_category" class="form-control frame9402-kotaknamaBorang">
                                        '.$options.'
                                    </select>

                                    <label for="title" class="frame9402-text04">
                                        <strong>Tajuk Aduan</strong>
                                    </label>
                                    <input type="text" class="form-control frame9402-kotaknamaBorang" name="title" value="'.$aduans->title.'" readonly>
                                

                                    <label for="nama" class="frame9402-text04">
                                        <strong>Aduan</strong>
                                    </label>
                                    <textarea class="form-control frame9403-kotaknama" name="nama" id="nama" rows="4" oninput="this.value = this.value.toUpperCase()" required disabled>'.str_replace('<br />', '', nl2br(e($aduans->nama))).'</textarea><br>
                                    
                                    <label for="jenisAduan" class="frame9402-text04">
                                        <strong>Jenis Aduan</strong>
                                    </label>
                                    <input type="text" class="frame9402-kotaknamaBorang" id="jenisAduan" value="'.$aduans->jenis_aduan.'" name="jenisAduan" readonly oninput="this.value = this.value.toUpperCase()">                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">TIDAK</button>
                                    <button type="submit" class="btn btn-primary">YA</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('aduan.pegawaiAduanList', compact('noti','aduans','menuModul', 'menuProses', 'menuProjek'));
    }

    public function pegawaiAduan_update(Request $request)
    { 
        $aduan = Aduan::find($request->aduanID);
        $aduan->jenis_respond = $request->jenisRespond;
        $aduan->user_category = $request->user_category;
        $aduan->save();

        Alert::success('Tugaskan Aduan Berjaya.', 'Aduan telah berjaya ditugaskan.');   

        return redirect('/Aduan/List/Pegawai');

    }
    public function userAduan_details(Request $request)
    { 
        $aduanID = (int) $request->route('aduan_id');

        $aduan = Aduan::find($aduanID);
        $responds = Respond_aduan::where('aduan_id', $aduanID)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('aduan.respond', compact('noti','aduan', 'responds','menuModul', 'menuProses', 'menuProjek'));

    }

    public function userAduan_add(Request $request)
    {
        $response = new Respond_aduan;
        if($request->file()) {
            $files = time().'.'.$request->respond->extension();  
            $request->respond->move(public_path('aduan'), $files);
            $response->respond = '/aduan/' . $files;
        }else{
            $response->respond = $request->respond;
        }
        $response->aduan_id = $request->aduan_id;
        $response->user_id = Auth::user()->id;
        $response->save();
        
        return redirect('/user/tugasan/aduan/'.$request->aduan_id.'/list');

    }

    public function userAduan_delete(Request $request)
    {
        $response = Respond_aduan::find($request->response_id);
        $response->delete();
        
        Alert::success('Padam Respon Berjaya.', 'Respon telah berjaya disimpan.');   

        return redirect('/user/tugasan/aduan/'.$request->aduan_id.'/list');

    }

    public function response_list(Request $request)
    { 
        $aduanID = (int) $request->route('aduan_id');

        $aduan = Aduan::find($aduanID);
        $responds = Respond_aduan::where('aduan_id', $aduanID)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('aduan.respondList', compact('noti','aduan', 'responds','menuModul', 'menuProses', 'menuProjek'));
    }

    public function response_update(Request $request)
    {
        $aduan = Aduan::find($request->aduan_id);
        $aduan->status = $request->status;
        $aduan->save();
        
        Alert::success('Kemaskini Respon Berjaya.', 'Respon telah berjaya dikemaskini.');   

        return redirect('/user/tugasan/aduan/'.$request->aduan_id.'/list');

    }

    public function kontrak_userList(Request $request)
    { 
        $borang_id = (int) $request->route('borang_id');

        $jawapans = Jawapan::where('borang_id', $borang_id)->where('status', 'Terima')->get();

        $borangs = Borang::find($borang_id);
        $kategoriPengguna = KategoriPengguna::all();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pegawaiKontrak.userList', compact('kategoriPengguna','borangs','jawapans','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function kontrak_user(Request $request)
    { 
        $jawapan_id = (int) $request->route('jawapan_id');

        $jawapans = Jawapan::with('borangs', 'borangs.proses')->where('id', $jawapan_id)->first();
        $kategoriPenggunas = KategoriPengguna::where('id', '!=', Auth::user()->kategoripengguna)->get();
        $surats = Surat::where('borang_id', $jawapans->borangs->id)->get();
        $items = Pemohonan_Peneroka::where('jawapan_id', $jawapan_id)->get();
        
        // $jenis_tugasans = Tugasan::whereRelation('Proses','projek_id', $jawapans->borangs->proses->projek_id)->whereRelation('Proses','sequence', $jawapans->borangs->proses->sequence+1)->orderBy("sequence", "ASC")->get();
        $jenis_fasas = Tugasan::whereRelation('Proses','projek_id', $jawapans->borangs->proses->projek_id)->distinct()->get(['fasa']);

        $sendSurats = Hantar_Surat::where('jawapan_id', $jawapan_id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pegawaiKontrak.oneUser', compact('sendSurats','jenis_fasas','items','surats','kategoriPenggunas','jawapans','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function tugasanUser_view(Request $request)
    { 
        $send_id = (int) $request->route('send_id');

        $sendSurats = Hantar_Surat::find($send_id);
        $users  = User::where('kategoripengguna', $sendSurats->userCategory_id)->where('status', 1)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pegawaiKontrak.tugasanUserList', compact('sendSurats','users', 'noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function progress_view(Request $request)
    { 
        $surat_id = $request->surat_id;
        $user_id = $request->user_id;

        $sendSurats = Hantar_Surat::find($surat_id);
        $tindakans = TindakanTugasan::whereNot('aktiviti', 'PO')->whereRelation('Tugasan','fasa', $sendSurats->fasa)->where('jawapan_id', $sendSurats->jawapan_id)->where('user_id', $user_id)
        ->with(['TindakanProgress' => function ($query) {
            $query->latest();
        }])
        ->orderBy('tarikh_sasaran', 'ASC')->get(); 

        $PurchaseOrders = TindakanTugasan::with('InputMedan', 'InputMedan.MedanPO')->where('aktiviti', 'PO')->where('jawapan_id', $sendSurats->jawapan_id)->where('user_id', $user_id)->orderBy('tarikh_sasaran', 'ASC')->get();
        $item_id = json_decode($sendSurats->items);
        $itemPeneroka = new \Illuminate\Database\Eloquent\Collection();

        foreach($item_id as $key=>$item_id){
            $item = Pemohonan_Peneroka::find($item_id);
            $itemPeneroka = $itemPeneroka->push($item);
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pegawaiKontrak.tugasanProgress', compact('itemPeneroka','PurchaseOrders','sendSurats','tindakans', 'noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function ccSurat_view(Request $request)
    {
        $surat_id = (int) $request->route('surat_id');
        $jawapan_id = (int) $request->route('jawapan_id');
        
        $jawapan = Jawapan::where('id', $jawapan_id)->with(['jawapanMedan' => function ($query) {
            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
        }])->first();

        $kp = Jawapan_medan::where('jawapan_id', $jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
        $surat = Surat::find($surat_id);
        $hantar_surat = Hantar_Surat::where('surat_id', $surat_id)->first();
        $carbon = new \Illuminate\Database\Eloquent\Collection();
        $items = new \Illuminate\Database\Eloquent\Collection();

        foreach (json_decode($hantar_surat->carbon_copy) as $cc){
            $carbon->push(KategoriPengguna::find($cc));
        }

        foreach (json_decode($hantar_surat->items) as $item){
            $items->push(Pemohonan_Peneroka::find($item));
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('surat.viewSurat', compact('noti','hantar_surat','items','carbon','kp','jawapan','surat','menuModul', 'menuProses', 'menuProjek'));
    }

    public function sendTugas_create(Request $request)
    {   
        $jawapan = Jawapan::where('id', $request->jawapan_id)->with(['jawapanMedan' => function ($query) {
            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
        }])->first();

        if($request->surat == "Ya"){
            if($jawapan->jawapanMedan[0]->jawapan){
                $titleSurat = "PERMOHONAN PENGURUSAN PEROLEHAN BAGI PROJEK PROGRAM PEMBANGUNAN PENEROKA (PPP) BAGI ".$jawapan->jawapanMedan[0]->jawapan." DI ".$jawapan->rancangans->nama;

            }else{
                $titleSurat = "PERMOHONAN PENGURUSAN PEROLEHAN BAGI PROJEK PROGRAM PEMBANGUNAN PENEROKA (PPP) DI ".$jawapan->rancangans->nama;
            }

            
            $surat = new Surat;
            $surat->title = $titleSurat;
            $surat->body = '<p class="ql-align-justify"><span style="background-color: transparent; color: rgb(0, 0, 0);">Susulan daripada kelulusan tersebut, Jabatan ini ingin memohon pihak tuan untuk melaksanakan proses perolehan bagi kerja-kerja pembekalan input pertanian yang terlibat dengan anggaran kos seperti dinyatakan di dalam spesifikasi dan perincian kerja. Maklumat pembekalan input pertanian yang terlibat adalah seperti di </span><strong style="background-color: transparent; color: rgb(0, 0, 0);">Lampiran 1</strong><span style="background-color: transparent; color: rgb(0, 0, 0);">. Borang Pesanan </span><em style="background-color: transparent; color: rgb(0, 0, 0);">(Purchase Order - PO)</em><span style="background-color: transparent; color: rgb(0, 0, 0);"> perlu diserahkan </span><strong style="background-color: transparent; color: rgb(0, 0, 0);">dalam masa satu (1) bulan</strong><span style="background-color: transparent; color: rgb(0, 0, 0);"> kepada pembekal yang berkelayakan, berkemampuan dan memberi tawaran harga yang terbaik untuk setiap input bekalan yang diperlukan. </span><strong style="background-color: transparent; color: rgb(0, 0, 0);">Tempoh masa pembekalan untuk setiap PO mestilah tidak lebih daripada tiga (3) bulan dari tarikh PO dikeluarkan</strong><span style="background-color: transparent; color: rgb(0, 0, 0);">.</span></p><p class="ql-align-justify"><span style="background-color: transparent; color: rgb(0, 0, 0);"><span class="ql-cursor">﻿</span></span></p><p class="ql-align-justify"><span style="background-color: transparent; color: rgb(0, 0, 0);">Besarlah harapan pihak kami agar gerak kerja ini dapat dilaksanakan mengikut perancangan yang telah dipersetujui. Segala kerjasama dan jasa baik pihak Tuan dalam memproses permohonan ini amat dihargai dan didahului dengan ucapan terima kasih.&nbsp;</span></p><p><br></p><p><span style="background-color: transparent; color: rgb(0, 0, 0);">Sekian.</span></p><p><br></p><p><span style="background-color: transparent; color: rgb(0, 0, 0);">Saya yang menjalankan amanah,</span></p><p class="ql-align-justify"><br></p><p class="ql-align-justify"><br></p><p><br></p><p><br></p>';
            $surat->jenis = "KONTRAK";
            $surat->save();

            if($surat->save()){
                $send = new Hantar_Surat;
                $send->surat_id = $surat->id;
                $send->jawapan_id = $jawapan->id;
                $send->userCategory_id = $request->category;
                $send->noti_percent = $request->noti_percent;
                $send->fasa = $request->fasa;
                $send->items = json_encode($request->perkara);
                $send->carbon_copy = json_encode($request->cc);
                $send->save();

                Alert::success('Berjaya', 'Mencipta tugasan berjaya.');  
            }else{
                Alert::error('Ralat', 'Mencipta tugasan tidak berjaya.'); 
            }
            
        }else{
            $send = new Hantar_Surat;
            $send->jawapan_id = $jawapan->id;
            $send->userCategory_id = $request->category;
            $send->noti_percent = $request->noti_percent;
            $send->fasa = $request->fasa;
            $send->items = json_encode($request->perkara);
            $send->carbon_copy = json_encode($request->cc);
            $send->save();
            if($send->save()){
                Alert::success('Berjaya', 'Mencipta tugasan berjaya.');  
            }else{
                Alert::error('Ralat', 'Mencipta tugasan tidak berjaya.'); 
            }
        }

        $jawapan->fasa = $request->fasa;
        $jawapan->save();

        // $json_decode($send->items);

        return back();  
    }
    
    public function sendTugas_update(Request $request)
    { 
        $send = Hantar_Surat::find($request->send_id);
        $send->status = "Hantar";
        $send->save();

        Alert::success('Berjaya', 'Menghantar surat serta barang permohonan telah berjaya.');  
        return back();
    }

    public function sendTugas_delete(Request $request)
    { 
        $send = Hantar_Surat::find($request->send_id);
        $send->delete();

        Alert::success('Berjaya', 'Memadam tugasan telah berjaya.');  
        return back();
    }

    public function tugasSurat_edit(Request $request)
    { 
        $send_id = (int) $request->route('send_id');
        $send = Hantar_Surat::find($send_id);

        $jawapan = Jawapan::find($send->jawapan_id);
        $surat = Surat::find($send->surat_id);

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('surat.editSurat', compact('noti','jawapan','surat','menuModul', 'menuProses', 'menuProjek'));
    }

    public function tugasSurat_view(Request $request)
    { 
        $jawapan = Jawapan::where('id', $request->jawapan_id)->with(['jawapanMedan' => function ($query) {
            $query->WhereRelation('medan', 'nama', 'like', "JENIS PROJEK");
        }])->first();

        $kp = Jawapan_medan::where('jawapan_id', $request->jawapan_id)->whereRelation('medan','medan.nama', 'LIKE','%KAD PENGENALAN%')->first();
        $surat = Surat::find($request->surat_id);
        $hantar_surat = Hantar_Surat::where('surat_id', $request->surat_id)->first();
        $carbon = new \Illuminate\Database\Eloquent\Collection();
        $items = new \Illuminate\Database\Eloquent\Collection();

        foreach (json_decode($hantar_surat->carbon_copy) as $cc){
            $carbon->push(KategoriPengguna::find($cc));
        }

        foreach (json_decode($hantar_surat->items) as $item){
            $items->push(Pemohonan_Peneroka::find($item));
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('surat.viewSurat', compact('noti','items','carbon','kp','jawapan','surat','hantar_surat','menuModul', 'menuProses', 'menuProjek'));
    }

    public function tugasSurat_update(Request $request)
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

        Alert::success('Kemaskini Templat Surat Berjaya.', 'Templat surat telah berjaya dikemaskini.');   

        return back();
    }

    public function generate_one(Request $request)
    { 
        $jawapan_id = $request->jawapan_id;
        $jawapans = Jawapan::find($jawapan_id);

        $surat = Surat::where('borang_id',$jawapans->borang_id)->first();

        $count = $request->count;
        $category = $request->category;

        for($x = 0; $x<$count; $x++){
            $send = new Hantar_Surat;
            $send->surat_id = $surat->id;
            $send->jawapan_id = $jawapan_id;
            $send->userCategory_id = $category[$x];
            $send->save();
        }

        Alert::success('Hantar Surat Berjaya.', 'Surat telah berjaya dihantar.');   

        return redirect('/user/tugasan/petiMasuk/'.$jawapans->borang_id.'/list');
    }

    public function generate_all(Request $request)
    { 
        $listJawapan = $request->jawapan_id;
        $count = $request->count;
        $category = $request->category;
        $borang_id = $request->borang_id;

        //for notification tugasan
        $noti = $this->notification();

        return redirect('/user/tugasan/petiMasuk/'.$borang_id.'/list');
    }
    
    public function TugasanProjek_list(Request $request)
    {        
        $hantar_id = (int)$request->route('hantar_id'); 
        $hantarSurat = Hantar_surat::find($hantar_id);
        $jawapan = Jawapan::with('borangs', 'borangs.proses')->where('id',$hantarSurat->jawapan_id)->first(); 

        $tugasans = Tugasan::where('proses_id',$jawapan->borangs->proses_id)->where('fasa', $hantarSurat->fasa)->get();
        $surats = Surat::where('borang_id', $jawapan->borang_id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.senaraiProjekTugasan', compact('surats','hantarSurat','jawapan','tugasans','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function Jawapan_update(Request $request)
    {        
        $jawapan_id = $request->jawapan_id;
        $harga_akhir = $request->harga_akhir;
        $perkara_id = $request->perkaraID;
        $jum_akhir = $request->jumlah_akhir;
        
        if($request->perkaraAdd){
            $perkara = $request->perkaraAdd;
            $jenis = $request->jenisAdd;
            $jumlah = $request->jumlahAdd;
            $kos = $request->kosAdd;

            for($y=0; $y<count($perkara); $y++){
                $item = new Pemohonan_Peneroka;
                $item->nama = $perkara[$y];
                $item->jumlah = $jumlah[$y];
                $item->jumlah_akhir = $jumlah[$y];
                $item->harga = $kos[$y];
                $items->harga_akhir = $harga_akhir[$x];
                $item->perkara_id = $jenis[$y];
                $item->jawapan_id = $jawapan_id;
                $item->save();
            }
        }

        if ($harga_akhir != null) {
            for($x=0; $x<count($perkara_id); $x++){
                $items = Pemohonan_Peneroka::find($perkara_id[$x]);
                $items->harga_akhir = $harga_akhir[$x];
                $items->jumlah_akhir = $jum_akhir[$x];
                $items->save();
            }
        }

        $items = Pemohonan_Peneroka::where('jawapan_id', $jawapan_id)->get();
        $ftotal = 0;

        foreach ($items as $item){
            if($item->harga_akhir == null){
                $ftotal+= (double)$item->harga; 
            }else{
                $ftotal+= (double)$item->harga_akhir; 
            }
        }

        $jawapan = Jawapan::find($jawapan_id); 
        $jawapan->nilai_akhir = $ftotal;
        $jawapan->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Perkara Pemohonan Peneroka ".$jawapan->user->nama;
        $audit->save();

        Alert::success('Kemaskini Perkara Pemohonan Peneroka Berjaya.', 'Perkara Pemohonan Peneroka telah berjaya disimpan.');   

        return back();
    }

    public function Tugasan_list(Request $request)
    {     
        $tugasan_id = (int)$request->route('tugasan_id'); 
        $hantar_id = (int)$request->route('hantar_id'); 

        $hantarSurat = Hantar_surat::find($hantar_id);
        $tugasan = Tugasan::with('Proses')->where('id',$tugasan_id)->first();

        if($hantarSurat->fasa == "PEMBINAAN"){
            $tindakans = TindakanTugasan::whereNot('aktiviti', 'PO')->where('tugasan_id', $tugasan_id)->where('jawapan_id', $hantarSurat->jawapan_id)->where('user_id', Auth::user()->id)
            ->with(['TindakanProgress' => function ($query) {
                $query->latest();
            }])->orderBy('tarikh_sasaran', 'ASC')->get();

            if ($tindakans->isEmpty()) {
                $items = json_decode($hantarSurat->items);

                foreach($items as $key => $item){
                    $itemPermohonan = Pemohonan_Peneroka::find($item);
                    $tindakan = new TindakanTugasan;
                    $tindakan->aktiviti = $itemPermohonan->nama;

                    if ($itemPermohonan->harga_kontrak != null) {
                        $tindakan->nilai_kontrak = $itemPermohonan->harga_kontrak;
                    }elseif($itemPermohonan->harga_akhir != null){
                        $tindakan->nilai_kontrak = $itemPermohonan->harga_kontrak;
                    }else{
                        $tindakan->harga = $itemPermohonan->harga;
                    }

                    $tindakan->jawapan_id = $hantarSurat->jawapan_id;
                    $tindakan->tugasan_id = $tugasan->id;
                    $tindakan->user_id = Auth::user()->id;
                    $tindakan->save();
                }
            }
        }

        $tindakans = TindakanTugasan::whereNot('aktiviti', 'PO')->where('tugasan_id', $tugasan_id)->where('jawapan_id', $hantarSurat->jawapan_id)->where('user_id', Auth::user()->id)
        ->with(['TindakanProgress' => function ($query) {
            $query->latest();
        }])
        ->orderBy('tarikh_sasaran', 'ASC')->get();
        // dd($tindakans);
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.tindakanList', compact('hantarSurat','tindakans','tugasan','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function TindakanText_add(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 
        $jawapan_id = $request->jawapan_id;

        $tindakan = new TindakanTugasan;
        $tindakan->aktiviti = $request->aktiviti;
        $tindakan->wajaran = $request->wajaran;
        $tindakan->tarikh_sasaran = $request->tarikh_sasaran;
        $tindakan->tugasan_id = $tugasan_id;
        $tindakan->jawapan_id = $jawapan_id;
        $tindakan->user_id = Auth::user()->id;
        $tindakan->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Aktiviti Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        Alert::success('Cipta Aktiviti Tugasan Berjaya.', 'Aktiviti tugasan telah berjaya dicipta.');   

        return back();
    }

    public function TindakanText_update(Request $request)
    { 
        $tindakan = TindakanTugasan::find($request->tindakanID);
        $tindakan->tarikh_sasaran = $request->tarikh_sasaran;
        $tindakan->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Traikh Sasaran Aktiviti Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        Alert::success('Kemaskini Aktiviti Tugasan Berjaya.', 'Traikh Sasaran Aktiviti Tugasan telah berjaya dikemaskini.');   

        return back();
        
    }

    public function TindakanText_delete(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 

        $tindakan = TindakanTugasan::find($request->tindakanID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Aktiviti Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        $tindakan->delete();

        Alert::success('Padam Aktiviti Tugasan Berjaya.', 'Aktiviti Tugasan telah berjaya dipadam.');   

        return back();
    }

    public function aktivitiProgress_list(Request $request)
    {
        $tindakan_id = (int)$request->route('tindakan_id'); 
        $hantar_id = (int)$request->route('hantar_id'); 
        
        $hantarSurat = Hantar_surat::find($hantar_id);
        $tindakan = TindakanTugasan::find($tindakan_id);
        $kemajuans = Tindakan_progress::where('tindakan_id', $tindakan_id)->orderBy('created_at', 'ASC')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.userTugasanItem', compact('noti','hantarSurat','kemajuans','tindakan', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function aktivitiProgress_add(Request $request)
    {
        $tindakan = TindakanTugasan::with('Tugasan')->where('id', $request->tindakan_id)->first();
        if($tindakan->Tugasan->fasa != "PEROLEHAN"){
            $tindProgress = Tindakan_progress::where('tindakan_id', $tindakan->id)->orderBy('created_at', 'DESC')->first();
            if($tindProgress != null){
                $nilai_tuntutan = (int) $tindProgress->progress + $request->progress;
            }else{
                $nilai_tuntutan = (int) $request->progress;
            }
            
            $kemajuan = new Tindakan_progress;
            $kemajuan->progress = $nilai_tuntutan;
            $kemajuan->catatan = $request->catatan;
            if($request->file()){
                $uploads = $request->upload;
                foreach($uploads as $key => $upload){
                    $extension=$upload->extension();
                    $fileName = time().'('.$key.').'.$extension;  
                    $upload->move(public_path('progress'), $fileName);
                    $files[] = '/progress/' . $fileName;
                }
                $kemajuan->bukti = json_encode($files);
            }
            $kemajuan->tindakan_id = $tindakan->id;
            $kemajuan->save();

        }else {
            $kemajuan = new Tindakan_progress;
            $kemajuan->progress = $request->progress;
            $kemajuan->catatan = $request->catatan;
            if($request->file()){
                $uploads = $request->upload;
                foreach($uploads as $key => $upload){
                    $extension=$upload->extension();
                    $fileName = time().'('.$key.').'.$extension;  
                    $upload->move(public_path('progress'), $fileName);
                    $files[] = '/progress/' . $fileName;
                }
                $kemajuan->bukti = json_encode($files);
            }
            $kemajuan->tindakan_id = $tindakan->id;
            $kemajuan->save();
        }

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Kemajuan Aktiviti ".$kemajuan->TindakanTugasan->aktiviti;
        $audit->save();

        Alert::success('Berjaya','Kemaskini Kemajuan Aktiviti Berjaya.');   

        return back();
    }

    public function aktivitiProgress_delete(Request $request)
    {
        $kemajuan = Tindakan_progress::find($request->kemajuan_id);
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Kemajuan Aktiviti ".$kemajuan->TindakanTugasan->aktiviti;
        $audit->save();

        $kemajuan->delete();

        Alert::success('Berjaya','Padam Kemajuan Aktiviti Berjaya.');   

        return back();
    }

    public function TindakanFile_add(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 
        $jawapan_id = $request->jawapan_id;

        $tindakan = new TindakanTugasan;
        if($request->file()) {
            $files = time().'.'.$request->reply->extension();  
            $request->reply->move(public_path('tugasan'), $files);
            $tindakan->file = '/tugasan/' . $files;
        }
        $tindakan->tugasan_id = $tugasan_id;
        $tindakan->jawapan_id = $jawapan_id;
        $tindakan->progress = $request->progress;
        $tindakan->user_id = Auth::user()->id;
        $tindakan->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Upload Fail Maklum Balas Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        Alert::success('Kemaskini Tugasan Berjaya.', 'Tindakan Tugasan telah berjaya disimpan.');   

        return redirect('/user/projek/tugasan/'.$tugasan_id.'/'.$jawapan_id.'/list');
    }

    public function TindakanFile_delete(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 
        $jawapan_id = $request->jawapan_id;

        $tindakan = TindakanTugasan::find($request->tindakanID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Fail Maklum Balas Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        $tindakan->delete();

        Alert::success('Padam Maklum Balas Tugasan Berjaya.', 'Maklum Balas Tugasan telah berjaya dipadam.');   

        return redirect('/user/projek/tugasan/'.$tugasan_id.'/'.$jawapan_id.'/list');
    }

    public function TindakanDate_add(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 
        $jawapan_id = $request->jawapan_id;

        $tindakan = new TindakanTugasan;
        $tindakan->tarikh_sasaran = $request->tarikh;
        $tindakan->tugasan_id = $tugasan_id;
        $tindakan->jawapan_id = $jawapan_id;
        $tindakan->user_id = Auth::user()->id;
        $tindakan->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Tarikh Sasaran Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        Alert::success('Kemaskini Tugasan Berjaya.', 'Tindakan Tugasan telah berjaya disimpan.');   

        return redirect('/user/projek/tugasan/'.$tugasan_id.'/'.$jawapan_id.'/list');
    }

    public function TindakanDate_delete(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 
        $jawapan_id = $request->jawapan_id;

        $tindakan = TindakanTugasan::find($request->tindakanID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Tarikh Sasaran Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        $tindakan->delete();

        Alert::success('Padam Tarikh Sasaran Tugasan Berjaya.', 'Tarikh Sasaran Tugasan telah berjaya dipadam.');   

        return redirect('/user/projek/tugasan/'.$tugasan_id.'/'.$jawapan_id.'/list');
    }

    public function TugasanPO_list(Request $request)
    {     
        $tugasan_id = (int)$request->route('tugasan_id');
        $jawapan_id = (int)$request->route('jawapan_id');

        $tugasan = Tugasan::with('Proses')->where('id',$tugasan_id)->first();
        $medanPO = MedanPO::where('tugasan_id', $tugasan_id)->get();

        $jawapan = Jawapan::with('Pemohonan_Peneroka')->where('id',$jawapan_id)->first();
        $tindakans = TindakanTugasan::where('aktiviti', 'PO')->where('tugasan_id', $tugasan_id)->where('jawapan_id', $jawapan_id)->where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        
        $hantar_surat = Hantar_Surat::where('jawapan_id', $jawapan_id)->where('userCategory_id', Auth::user()->kategoripengguna)->first();
        $item_id = json_decode($hantar_surat->items);
        $itemPeneroka = new \Illuminate\Database\Eloquent\Collection();

        foreach($item_id as $key=>$item_id){
            $item = Pemohonan_Peneroka::find($item_id);
            $itemPeneroka = $itemPeneroka->push($item);
        }

        foreach($tindakans as $tindakan){
            $inputMedan = InputMedan:: where('tindakanTugasan_id', $tindakan->id)->get();
            $tindakan->jawapan = $inputMedan;
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('userView.tugasanPO', compact('itemPeneroka','jawapan','tindakans','medanPO','tugasan','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function TugasanPO_add(Request $request)
    {     
        $tugasan_id = $request->tugasan_id; 
        $jawapan_id = $request->jawapan_id;

        $tindakan = new TindakanTugasan;
        $tindakan->aktiviti = "PO";
        if($request->file()) {
            $files = time().'.'.$request->PO->extension();  
            $request->PO->move(public_path('PO'), $files);
            $tindakan->file = '/PO/' . $files;
        }
        $tindakan->tugasan_id = $tugasan_id;
        $tindakan->user_id = Auth::user()->id;
        $tindakan->jawapan_id = $jawapan_id;
        $tindakan->save();

        $medanId = $request->medanId;
        $jawapan = $request->jawapan;

        for($x = 0; $x<count($medanId); $x++){
            $inputMedan = new InputMedan;
            $inputMedan->value = $jawapan[$x];
            $inputMedan->medanPO_id = $medanId[$x];
            $inputMedan->tindakanTugasan_id = $tindakan->id;
            $inputMedan->save();
        }

        $item_id = $request->item_id;
        $hargaKontrak = $request->hargaKontrak;

        foreach($item_id as $key=>$item_id){
            $item = Pemohonan_Peneroka::find($item_id);
            $item->harga_kontrak = $hargaKontrak[$key];
            $item->save();
        }

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Upload Pesanan Pembelian Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        Alert::success('Kemaskini Pesanan Pembelian Berjaya.', 'Pesanan Pembelian telah berjaya disimpan.');   

        return back();
    }

    public function TugasanPO_delete(Request $request)
    {      
        $jawapan_id = $request->jawapan_id;
        $tugasan_id = $request->tugasan_id;
        $tindakan = TindakanTugasan::find($request->tindakanID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Pesanan Pembelian Pada Tugasan ".$tindakan->Tugasan->Perkara;
        $audit->save();

        $tindakan->delete();

        Alert::success('Padam Pesanan Pembelian Berjaya.', 'Pesanan Pembelian telah berjaya dipadam.');   

        return back();
    }

    public function SuratTugasan_view(Request $request)
    {      
        $jawapanId = (int) $request->route('jawapan_id');
        
        $borangJwpn = Jawapan::with('borangs', 'borangs.Proses')->where('id', $jawapanId)->first();

        $surat = Surat::where('borang_id',$borangJwpn->borang_id)->first();
        
        $jawapan_dana = Jawapan_medan::where('jawapan_id', $jawapanId)->whereRelation('medan','medan.nama', 'LIKE','%PERMOHONAN DANA%')->first();
        $this->dana = $jawapan_dana->jawapan;
        
        $this->nama = $borangJwpn->nama;
        $this->projek = $borangJwpn->borangs->namaBorang;
        $this->rancangan = $borangJwpn->rancangans->nama;
        
        $text= $surat->body;
        $surat_body = preg_replace_callback('~\{(.*?)\}~',
        function($key)
        {
            $variable['nama'] = $this->nama;
            $variable['projek'] = $this->projek;
            $variable['rancangan'] = $this->rancangan;
            $variable['dana'] = "RM ".$this->dana;
            
            return $variable[$key[1]];      
        },

        $text);
        $jawapan_alamat = Jawapan_medan::where('jawapan_id', $jawapanId)->whereRelation('medan','medan.nama', 'LIKE','%alamat%')->first();
        $items = Pemohonan_Peneroka::where('jawapan_id', $jawapanId)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();
        
        return view('userView.suratUserView', compact('jawapan_alamat','noti','items','surat_body','surat','borangJwpn','menuModul', 'menuProses', 'menuProjek'));
    }
    public function SuratTugasan_print(Request $request)
    {      
        $jawapanId = $request->jawapan_id;
        
        $borangJwpn = Jawapan::with('borangs', 'borangs.Proses')->where('id', $jawapanId)->first();

        $surat = Surat::where('borang_id',$borangJwpn->borang_id)->first();
        
        $jawapan_dana = Jawapan_medan::where('jawapan_id', $jawapanId)->whereRelation('medan','medan.nama', 'LIKE','%PERMOHONAN DANA%')->first();
        $this->dana = $jawapan_dana->jawapan;
        
        $this->nama = $borangJwpn->nama;
        $this->projek = $borangJwpn->borangs->namaBorang;
        $this->rancangan = $borangJwpn->rancangans->nama;
        
        $text= $surat->body;
        $surat_body = preg_replace_callback('~\{(.*?)\}~',
        function($key)
        {
            $variable['nama'] = $this->nama;
            $variable['projek'] = $this->projek;
            $variable['rancangan'] = $this->rancangan;
            $variable['dana'] = "RM ".$this->dana;
            
            return $variable[$key[1]];      
        },

        $text);

        $jawapan_alamat = Jawapan_medan::where('jawapan_id', $jawapanId)->whereRelation('medan','medan.nama', 'LIKE','%alamat%')->first();
        $items = Pemohonan_Peneroka::where('jawapan_id', $jawapanId)->get();

        $data = compact('borangJwpn', 'jawapan_alamat', 'surat','surat_body','items');
        $pdf = PDF::loadView('userView.suratUserPrint', $data)
        ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true, 'defaultFont' => 'Arial'])
        ->setPaper('A4', 'portrait');

        // return view('userView.suratUserPrint', compact('borangJwpn', 'jawapan_alamat', 'surat','surat_body','items'));

        
        return $pdf->download(date("Y-m-d").'_Surat_Perolehan_Permohonan_'.$borangJwpn->user->nama.'.pdf');
    }

    public function Bekalan_List(Request $request)
    {     
        $jawapan_id = (int)$request->route('jawapan_id');

        $jawapan = Jawapan::find($jawapan_id);
        $penerimaan= Penerimaan_bekalan::with('Pemohonan_Peneroka')->whereRelation('Pemohonan_Peneroka', 'jawapan_id', $jawapan_id)->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pengurusRancangan.bekalanList', compact('penerimaan','jawapan','noti','menuModul', 'menuProses', 'menuProjek'));
    }

    public function Bekalan_update(Request $request)
    {     
        $penerimaan_id = $request->penerimaan_id;
        $jawapan_id = $request->jawapan_id;

        $penerimaan= Penerimaan_bekalan::find($penerimaan_id);
        $penerimaan->pengesahan = $request->pengesahan;
        $penerimaan->kenyataan = $request->penyataan;
        $penerimaan->save();

        return redirect('/user/pengurus/item/'.$jawapan_id.'/list');
    }
}
