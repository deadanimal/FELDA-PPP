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
use App\Models\Tugasan;
use App\Models\checkbox;

use App\Models\Proses;
use App\Models\Borang;

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
        $menuModul = Modul::all();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('dashboard', compact('menuModul', 'menuProses', 'menuBorang'));

    }
    public function user_add_page()
    {
        $wilayah = Wilayah::all()->pluck('nama','id');
        $kategoriPengguna = KategoriPengguna::all();

        $menuModul = Modul::all();
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
        $user->nama = $request->nama;
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
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

        $menuModul = Modul::all();
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
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
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
                        <div class="modal-dialog" role="document">
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
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                <a href="'.$url2.'" class="btn btn-danger">Ya</a>
                            </div>
                            </div>
                        </div>
                        </div>';
                })                  
                ->rawColumns(['tindakan', 'rancangan', 'wilayah'])                          
                ->make(true);
            }

        $bilangan = count($user);

        $menuModul = Modul::all();
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

        $menuModul = Modul::all();
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
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
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
        $new_password = Hash::make('Saya<3FeldaPPP');
        $user->password = $new_password;
        $user->save();

        Mail::to($user->email)->send(new ResetPassword('Saya<3FeldaPPP'));
        Alert::success('Lupa Kata Laluan', 'Sila Semak E-mel Anda');   
        return back();
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
                    $url = '/user-categories/'.$kategoriPengguna->id;
                    $url1 = '/user-categories/'.$kategoriPengguna->id.'/delete';
                    return '<a href="'.$url.'" class="btn btn-xs btn-primary frame9402-rectangle828245" title="Kemaskini"></a>
                    <button type="button" class="btn btn-primary frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModal'.$kategoriPengguna->id.'" title="Padam"></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$kategoriPengguna->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
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
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                <a href="'.$url1.'" class="btn btn-danger">Ya</a>
                            </div>
                            </div>
                        </div>
                        </div>';
                })                  
                ->rawColumns(['tindakan'])                          
                ->make(true);
            }

            $menuModul = Modul::all();
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

    public function category_detail(Request $request)
    {
        $id = (int)$request->route('id');
        $kategoriPengguna = KategoriPengguna::find($id);

        $menuModul = Modul::all();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanPengguna.editKategoriPengguna', compact('kategoriPengguna', 'menuModul', 'menuProses', 'menuBorang'));
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
        
        $menuModul = Modul::all();
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

       if($idPengguna != null){
        $user = User::where('idPengguna', 'LIKE', '%'.$idPengguna.'%')->first();

        $audits = Audit::orWhere('user_id', 'LIKE', $user->id)
            ->orWhereBetween('created_at', [$from_date , $to_date])
            ->orWhere('action', 'LIKE', '%'.$action.'%')
            ->orderBy("created_at", "DESC")->get();

       }
       elseif($action != null ){
            $audits = Audit::where('action', 'LIKE', '%'.$action.'%')
            ->orWhereBetween('created_at', [$from_date , $to_date])
            ->orderBy("created_at", "DESC")->get();

       }
       elseif($from_date != null){
            $audits = Audit::whereBetween('created_at', [$from_date , $to_date])
            ->orderBy("created_at", "DESC")->get();
        }

        $menuModul = Modul::all();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('auditTrail.auditFilter', compact('audits', 'menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function tugasList_app(Request $request)
    {
        $user = Auth::user()->kategoripengguna;

        $tugasans= Tugasan::where('userKategori', $user)->get();
        if($tugasans == null){
            $menuModul = Modul::all();
            $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
            $menuBorang = Borang::where('status', 1)->get();
            return view('userView.userTugasan', compact('tugasans', 'menuModul', 'menuProses', 'menuBorang'));
        }
        else{
            foreach($tugasans as $tugasan){
                $checkboxes = checkbox::where('tugasan', $tugasan->id)->get();   
                $menuModul = Modul::all();
                $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
                $menuBorang = Borang::where('status', 1)->get();
                return view('userView.userTugasan', compact('tugasans', 'checkboxes' ,'menuModul', 'menuProses', 'menuBorang'));
        
            }
        }
        

        $menuModul = Modul::all();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();
        return view('userView.userTugasan', compact('tugasans', 'menuModul', 'menuProses', 'menuBorang'));

    }
}
