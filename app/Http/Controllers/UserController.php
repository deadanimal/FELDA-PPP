<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;

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

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Alert;

class UserController extends Controller
{
    public function dashboard()
    {
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('dashboard', compact('menuModul', 'menuProses', 'menuBorang'));

    }
    public function user_add_page()
    {
        $wilayah = Wilayah::all()->pluck('nama','id');
        $kategoriPengguna = KategoriPengguna::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanPengguna.daftarPengguna', compact('wilayah', 'kategoriPengguna', 'menuModul', 'menuProses', 'menuBorang'));

    }

    public function getRancangan($wilayahid){
        $rancangan= Rancangan::where('wilayah',$wilayahid)->pluck('nama','id');
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
        $wilayah = Wilayah::all()->pluck('nama','id');
        $rancangan = Rancangan::all();
        $kategoriPengguna = KategoriPengguna::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanPengguna.maklumatPengguna', compact('kategoriPengguna', 'wilayah', 'rancangan', 'menuModul', 'menuProses', 'menuBorang'));
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

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanPengguna.senaraiPengguna', compact('user', 'bilangan', 'menuModul', 'menuProses', 'menuBorang'));
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
        $wilayah = Wilayah::all()->pluck('nama','id');;
        $kategoriPengguna = KategoriPengguna::all();
        $user = User::find($id);

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanPengguna.kemaskini', compact('user', 'kategoriPengguna', 'wilayah', 'menuModul', 'menuProses', 'menuBorang'));
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

            $menuModul = Modul::where('status', 'Go-live')->get();
            $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
            $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanPengguna.pengurusanKategoriPengguna', compact('kategoriPenggunas', 'menuModul', 'menuProses', 'menuBorang'));
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
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('auditTrail.audit', compact('audits', 'menuModul', 'menuProses', 'menuBorang'));
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

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('auditTrail.auditFilter', compact('audits', 'menuModul', 'menuProses', 'menuBorang', 'idPengguna', 'action', 'from_date', 'to_date'));
    }
    
    public function tugasList_app(Request $request)
    {
        $user = Auth::user()->id;

        $tugasans= Senarai_tugasan::where('user_id', $user)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        return view('userView.userTugasan', compact('tugasans', 'menuModul', 'menuProses', 'menuBorang'));
         
    }

    public function tugasItem_list(Request $request)
    {
        $tugas_id = (int)$request->route('tugas_id');

        $tugasans= Senarai_tugasan::find($tugas_id);

        $tugasan_item = Perkara_Tugasan::where('tugasan_id', $tugas_id)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        return view('userView.userTugasanItem', compact('tugasan_item','tugasans', 'menuModul', 'menuProses', 'menuBorang'));
        
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

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.userTugasanProgress', compact('item_progress','tugasan_item','tugas_id', 'menuModul', 'menuProses', 'menuBorang'));
        
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
        $jawapans = Jawapan::where('user_id', Auth::user()->id)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.userProjectList', compact('jawapans', 'menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function project_view(Request $request)
    { 
        $jawapanId = (int) $request->route('jawapan_id');

        $jawapan = Jawapan::find($jawapanId);
        $jawapanMedan = Jawapan_medan::where('jawapan_id', $jawapan->id)->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.projectDetail', compact('jawapan', 'jawapanMedan','menuModul', 'menuProses', 'menuBorang'));
    }   
    
    public function viewTarik_diri(Request $request)
    {         
        ini_set('memory_limit', '2048M');

        $jawapanId = (int) $request->route('jawapan_id');
        $jawapan = Jawapan::find($jawapanId);
        $tarikDiri = TarikDiri::where('jawapan_id', $jawapanId)->first();

        $users = User::whereRelation('kategori', 'nama', '=', 'Peserta')->where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.tarikDiri', compact('jawapan', 'users','tarikDiri','menuModul', 'menuProses', 'menuBorang'));
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
        
        $jenisTernakan = jenis_ternakan::where('proses_id', $borang->proses)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.kemaskiniProjek', compact('jawapan', 'jenisTernakan','menuModul', 'menuProses', 'menuBorang'));
    }

    public function kemaskini_list(Request $request)
    { 
        $ternakanId = (int) $request->route('ternakan_id');

        $jenisTernakan = jenis_ternakan::find($ternakanId);

        $kemaskinis = JenisKemaskini::where('id_jenisTernakans', $ternakanId)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.kemaskiniList', compact('kemaskinis', 'jenisTernakan','menuModul', 'menuProses', 'menuBorang'));
    }

    public function aktiviti_list(Request $request)
    { 
        $kemaskiniId = (int) $request->route('kemaskini_id');

        $kemaskini = JenisKemaskini::find($kemaskiniId);

        $aktivitis = Aktiviti::where('id_jenisKemaskini', $kemaskiniId)->orderBy("updated_at", "DESC")->get();

        $params = new \Illuminate\Database\Eloquent\Collection();
        $jawapans = new \Illuminate\Database\Eloquent\Collection();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.kemaskiniAktivit', compact('kemaskini', 'aktivitis','params','menuModul', 'menuProses', 'menuBorang'));
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

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('userView.kemaskiniAktivit', compact('kemaskini', 'aktivitis','params','jawapans','menuModul', 'menuProses', 'menuBorang'));
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

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanBorang.tarikDiriList', compact('tarikDiris','menuModul', 'menuProses', 'menuBorang'));

    }

    public function tarik_diri_details(Request $request)
    { 
        $tarikDiri_id = (int) $request->route('tarikDiri_id');

        $tarikDiri = TarikDiri::find($tarikDiri_id)->with('jawapan')->first();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanBorang.tarikDiriDetail', compact('tarikDiri','menuModul', 'menuProses', 'menuBorang'));

    }

    public function tarik_diri_status(Request $request)
    {  
        $tarikDiriId = $request->tarikDiriId;

        $tarik = TarikDiri::find($tarikDiriId);
        $tarik->status = $request->status;
        $tarik->save();

        if($request->status == 'Sah'){
            Alert::success('Mengesahkan Permohonan Tarik Diri Berjaya.', 'Permohonan tarik diri telah disahkan.');   
        }else{
            Alert::success('Tidak Mengesahkan Permohonan Tarik Diri Berjaya.', 'Permohonan tarik diri telah disahkan.');   
        }

        return redirect('/tarik_Diri/List');
    }
    
    public function tarik_diri_view(Request $request)
    {
        $users = User::where('rancangan', Auth::user()->rancangan)->get();
        $borangs = Borang::all()->pluck('namaBorang', 'id');

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanBorang.forceTarikDiri', compact('users','borangs','menuModul', 'menuProses', 'menuBorang'));

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
    

}
