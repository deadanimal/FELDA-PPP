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
use App\Providers\RouteServiceProvider;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Alert;

class UserController extends Controller
{
    public function user_add_page()
    {
        $wilayah = Wilayah::all()->pluck('nama','id');
        $kategoriPengguna = KategoriPengguna::all();
        return view('pengurusanPengguna.daftarPengguna', compact('wilayah', 'kategoriPengguna'));

    }

    public function getRancangan($wilayahid){
        $rancangan= Rancangan::where('wilayah',$wilayahid)->pluck('nama','id');
        return json_encode($rancangan);
    }

    public function user_add(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'unique:users'],
            'idPengguna' => ['required', 'string', 'unique:users'],
            'nama' => ['required', 'string'],
            'nokadpengenalan' => ['required', 'string', 'unique:users'],
            'password' => ['required'],
            'kategoripengguna' => ['required'],
            'wilayah' => ['required'],
            'rancangan' => ['required'],
        ]);
        $user = new User;
        $user->email = $request->email;
        $user->idPengguna = $request->idPengguna;
        $user->nama = $request->nama;
        $user->notelefon = $request->noTelefon;
        $user->nokadpengenalan = $request->nokadpengenalan;
        $user->password =  Hash::make($request->password);
        $user->kategoripengguna = $request->kategoripengguna;
        $user->wilayah = $request->wilayah;
        $user->rancangan = $request->rancangan;
        $user->status = 1;

        $user->save();
        Alert::success('Daftar pengguna berjaya.', 'Pendaftaran pengguna berjaya.');   
        
        return redirect("/users");
    }

    public function user_info()
    {
        $wilayah = Wilayah::all()->pluck('nama','id');
        $rancangan = Rancangan::all();
        $kategoriPengguna = KategoriPengguna::all();
        return view('pengurusanPengguna.maklumatPengguna', compact('kategoriPengguna', 'wilayah', 'rancangan'));
    }


    public function user_info_update(Request $request)
    {
        $user = User::find($request->id);
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

        return view('pengurusanPengguna.senaraiPengguna', compact('user', 'bilangan'));
    }

    public function user_delete(Request $request)
    {
        $id = (int)$request->route('id');
        $user = User::find($id);
        $user->status = 0; 
        $user->save();
        Alert::success('Padam pengguna berjaya.', 'Padam pengguna telah berjaya.');   

        return redirect('/users');
    
    }

    public function user_detail(Request $request)
    {
        $id = (int)$request->route('id');
        $wilayah = Wilayah::all()->pluck('nama','id');;
        $kategoriPengguna = KategoriPengguna::all();
        $user = User::find($id);
        return view('pengurusanPengguna.kemaskini', compact('user', 'kategoriPengguna', 'wilayah'));
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
        return view('pengurusanPengguna.pengurusanKategoriPengguna', compact('kategoriPenggunas'));
    }

    public function category_add(Request $request)
    {
        $kategoriPengguna = new KategoriPengguna;
        $kategoriPengguna->nama = $request->namaKategoriPengguna;
        $kategoriPengguna->save();
        Alert::success('Tambah Kategori pengguna berjaya.', 'Kategori pengguna berjaya ditambah.');   
        
        return redirect('/user-categories');
    }

    public function category_detail(Request $request)
    {
        $id = (int)$request->route('id');
        $kategoriPengguna = KategoriPengguna::find($id);
        return view('pengurusanPengguna.editKategoriPengguna', compact('kategoriPengguna'));
    }

    public function category_update(Request $request)
    {
        $id = $request->kategoriId;
        $kategoriPengguna = KategoriPengguna::find($id);
        $kategoriPengguna->nama = $request->kategoriPengguna;
        $kategoriPengguna->save();
        Alert::success('Kemaskini Kategori pengguna berjaya.', 'Kategori pengguna berjaya dikemaskini.');   
    
        return redirect('/user-categories');
    }

    public function category_delete(Request $request)
    {
        $id = (int)$request->route('id');
        $kategoriPengguna = KategoriPengguna::find($id);
        $kategoriPengguna->delete();
        Alert::success('Padam Kategori pengguna berjaya.', 'Kategori pengguna berjaya dipadam.');   
    
        return redirect('/user-categories');

    }

    public function user_audit(Request $request)
    {
        $audits = Audit::orderBy("updated_at", "DESC")->get();
        foreach ($audits as $key => $a) {
            if ($a->event == "updated") {
                $a['event'] = "Kemaskini";

                if($a->auditable_type== "App\Models\User"){
                    $var = preg_split("#/#", $a->url); 
                    if(array_key_exists('status', $a->new_values)){
                        $a['event'] = "Padam";
                        $user = User::find($var[4]);
                        $a->setAttribute('value', "Nama: ".$user->nama."<br>ID Pengguna:".$user->idPengguna);
                    }
                    elseif($var[3]=="forgot"){
                        $a->setAttribute('value', "Lupa Kata Laluan");

                    }
                    elseif($var[3]=="logout"){
                        $a->setAttribute('value', "Log Keluar");

                    }
                    elseif($var[3]=="login"){
                        $a->setAttribute('value', "Log Masuk");

                    }
                }
                elseif ($a->auditable_type== "App\Models\Modul") {
                    $var = preg_split("#/#", $a->url);
                    $modul = Modul::find($var[4]); 
                    $a->setAttribute('value', "Modul: ".$modul->nama."<br>Status:".$modul->status);
                    
                }
                elseif ($a->auditable_type== "App\Models\Proses") {
                    if (array_key_exists('nama', $a->new_values)){
                        $a->setAttribute('value', "Nama Proses: ".$a->new_values['nama']);
                    }else{
                        if($a->new_values['status'] == "1"){
                            $a->setAttribute('value', "Proses Status: Aktif");
                        }else{
                            $a->setAttribute('value', "Proses Status: Tidak Aktif");
                        }
                    }

                }
                elseif ($a->auditable_type== "App\Models\Borang") {
                    if (array_key_exists('nama', $a->new_values)){
                        $a->setAttribute('value', "Nama Borang: ".$a->new_values['Nama']);
                    }
                    else{
                        if (array_key_exists('status', $a->new_values)){
                            if($a->new_values['status'] == "1"){
                                $a->setAttribute('value', "Proses Status: Aktif");
                            }else{
                                $a->setAttribute('value', "Proses Status: Tidak Aktif");
                            }
                        }
                        else{
                            $a->setAttribute('value', "Kemaskini Isi Borang");

                        }

                    }
                }
                elseif ($a->auditable_type== "App\Models\KategoriPengguna") {
                    $a->setAttribute('value', "Kategori Pengguna: ".$a->new_values['nama']);
                }
            }
            elseif($a->event == "created"){
                $a['event'] = "Cipta";
                if($a->auditable_type== "App\Models\User"){
                    $a->setAttribute('value', "Nama: ".$a->new_values['nama']."<br>ID Pengguna:".$a->new_values['idPengguna']);
                }
                elseif ($a->auditable_type== "App\Models\Modul") {
                    $a->setAttribute('value', "Nama Modul: ".$a->new_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Proses") {
                    $a->setAttribute('value', "Nama Proses: ".$a->new_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Borang") {
                    $a->setAttribute('value', "Nama Borang: ".$a->new_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\KategoriPengguna") {
                    $a->setAttribute('value', "Nama Kategori Pengguna: ".$a->new_values['nama']);
                }
            }
            elseif($a->event == "deleted"){
                $a['event'] = "Padam";
                if ($a->auditable_type== "App\Models\Modul") {
                    $a->setAttribute('value', 'Nama Modul: '.$a->old_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Proses") {
                    $a->setAttribute('value', 'Nama Proses: '.$a->old_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Borang") {
                    $a->setAttribute('value', 'Nama Borang: '.$a->old_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\KategoriPengguna") {
                    $a->setAttribute('value', "Nama Kategori Pengguna: ".$a->old_values['nama']);
                }
            }
        }
        if($request->ajax()) {
            return DataTables::collection($audits)
            ->editColumn('created_at', function (Audit $audits) {
                return $audits->created_at; // no formatting, just returned $user->created_at; 
            })
            ->addIndexColumn()
            ->addColumn('userNama', function (Audit $audits) {
                if($audits->user) {
                    $html_ = $audits->user->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })  
            ->addColumn('userid', function (Audit $audits) {
                if($audits->user) {
                    $html_ = $audits->user->idPengguna;
                } else {
                    $html_ = '-';
                }
                return $html_;
            }) 
            ->rawColumns(['userNama', 'userid', 'value'])                                                 
            ->make(true);
        }

        return view('auditTrail.audit');
    }

    public function user_auditDate(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;

        $audits = Audit::whereBetween('created_at', [$from_date, $to_date])
           ->orderBy("created_at", "DESC")->get();
        foreach ($audits as $key => $a) {
            if ($a->event == "updated") {
                $a['event'] = "Kemaskini";

                if($a->auditable_type== "App\Models\User"){
                    $var = preg_split("#/#", $a->url); 
                    if(array_key_exists('status', $a->new_values)){
                        $a['event'] = "Padam";
                        $user = User::find($var[4]);
                        $a->setAttribute('value', "Nama: ".$user->nama."<br>ID Pengguna:".$user->idPengguna);
                    }
                    elseif($var[3]=="forgot"){
                        $a->setAttribute('value', "Lupa Kata Laluan");

                    }
                    elseif($var[3]=="logout"){
                        $a->setAttribute('value', "Log Keluar");

                    }
                    elseif($var[3]=="login"){
                        $a->setAttribute('value', "Log Masuk");

                    }
                }
                elseif ($a->auditable_type== "App\Models\Modul") {
                    $a->setAttribute('value', $a->new_values);
                }
                elseif ($a->auditable_type== "App\Models\Proses") {
                    if (array_key_exists('nama', $a->new_values)){
                        $a->setAttribute('value', "Nama Proses: ".$a->new_values['nama']);
                    }else{
                        if($a->new_values['status'] == "1"){
                            $a->setAttribute('value', "Proses Status: Aktif");
                        }else{
                            $a->setAttribute('value', "Proses Status: Tidak Aktif");
                        }
                    }

                }
                elseif ($a->auditable_type== "App\Models\Borang") {
                    if (array_key_exists('nama', $a->new_values)){
                        $a->setAttribute('value', "Nama Borang: ".$a->new_values['Nama']);
                    }else{
                        if($a->new_values['status'] == "1"){
                            $a->setAttribute('value', "Proses Status: Aktif");
                        }else{
                            $a->setAttribute('value', "Proses Status: Tidak Aktif");
                        }
                    }
                }
                elseif ($a->auditable_type== "App\Models\KategoriPengguna") {
                    $a->setAttribute('value', "Kategori Pengguna: ".$a->new_values['nama']);
                }
            }
            elseif($a->event == "created"){
                $a['event'] = "Cipta";
                if($a->auditable_type== "App\Models\User"){
                    $a->setAttribute('value', "Nama: ".$a->new_values['nama']."<br>ID Pengguna:".$a->new_values['idPengguna']);
                }
                elseif ($a->auditable_type== "App\Models\Modul") {
                    $a->setAttribute('value', "Nama Modul: ".$a->new_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Proses") {
                    $a->setAttribute('value', "Nama Proses: ".$a->new_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Borang") {
                    $a->setAttribute('value', "Nama Borang: ".$a->new_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\KategoriPengguna") {
                    $a->setAttribute('value', "Nama Kategori Pengguna: ".$a->new_values['nama']);
                }
            }
            elseif($a->event == "deleted"){
                $a['event'] = "Padam";
                if ($a->auditable_type== "App\Models\Modul") {
                    $a->setAttribute('value', 'Nama Modul: '.$a->old_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Proses") {
                    $a->setAttribute('value', 'Nama Proses: '.$a->old_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\Borang") {
                    $a->setAttribute('value', 'Nama Borang: '.$a->old_values['nama']);
                }
                elseif ($a->auditable_type== "App\Models\KategoriPengguna") {
                    $a->setAttribute('value', "Nama Kategori Pengguna: ".$a->old_values['nama']);
                }
            }
        }
        
        if($request->ajax()) {
            return DataTables::collection($audits)
            ->editColumn('created_at', function (Audit $audits) {
                return $audits->created_at; 
            })
            ->addIndexColumn()
            ->addColumn('userNama', function (Audit $audits) {
                if($audits->user) {
                    $html_ = $audits->user->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })  
            ->addColumn('userid', function (Audit $audits) {
                if($audits->user) {
                    $html_ = $audits->user->idPengguna;
                } else {
                    $html_ = '-';
                }
                return $html_;
            }) 
            ->rawColumns(['userNama', 'userid', 'value'])                                                 
            ->make(true);
        }

        return view('auditTrail.auditDate', compact('from_date', 'to_date'));
    }

    public function auditTindakan(Request $request)
    {
        $tindakan = $request->tindakan;
        if($tindakan == "cipta" || $tindakan == "Cipta"){
            $event="created";
        }elseif($tindakan == "kemaskini" || $tindakan == "Kemaskini"){
            $event="updated";
        }
        elseif($tindakan == "padam" || $tindakan == "Padam"){
            $event="deleted";
        }
        else{
            Alert::error('Tindakan Tidak Ada.', 'Sila masukkan tindakan dengan betul');   
            return redirect("/auditTrail/audit");
        }

        $audits = Audit::leftJoin('users as usr','usr.id', '=', 'user_id')
        ->select('*','audits.created_at')->where('audits.event','=',$event)->get();
        return view('auditTrail.audit', compact('audits'));
    }
}
