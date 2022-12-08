<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wilayah;
use App\Models\KategoriPengguna;
use App\Models\Rancangan;
use App\Providers\RouteServiceProvider;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Alert;

class pengurusanPenggunaController extends Controller
{
    public function create()
    {
        $wilayah = Wilayah::all()->pluck('nama','id');
        $kategoriPengguna = KategoriPengguna::all();
        return view('pengurusanPengguna.daftarPengguna', compact('wilayah', 'kategoriPengguna'));

    }

    public function getRancangan($wilayahid){
        $rancangan= Rancangan::where('wilayah',$wilayahid)->pluck('nama','id');
        return json_encode($rancangan);
    }

    public function daftarPengguna(Request $request)
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

        $user->save();
        Alert::success('Daftar pengguna berjaya.', 'Pendaftaran pengguna berjaya.');   
        
        return redirect("/pengurusanPengguna/senaraiPengguna");
    }

    public function maklumatPengguna()
    {
        $wilayah = Wilayah::all()->pluck('nama','id');;
        $kategoriPengguna = KategoriPengguna::all();
        return view('pengurusanPengguna.maklumatPengguna', compact('kategoriPengguna', 'wilayah'));
    }

    public function senaraiPengguna()
    {
        $id= Auth::user()->idPengguna;
        $user = User::where('idPengguna','!=', $id)->get();
        $bilangan= count(User::all())-1;
        return view('pengurusanPengguna.senaraiPengguna', compact('user','bilangan'));
    }

    public function cariPengguna(Request $request)
    {
        $idPengguna= $request->idPengguna;
        $user = User::where('idPengguna', 'LIKE', "%{$idPengguna}%") ->orWhere('nama', 'LIKE', "%{$idPengguna}%")->orWhere('nama', 'LIKE', "%{$idPengguna}%")  ->get();
        $bilangan= count(User::all())-1;
        return view('pengurusanPengguna.senaraiPengguna', compact('user','bilangan'));
    }

    public function deletePengguna(Request $request)
    {
        $penggunaId = $request->penggunaId;
        $user = User::find($penggunaId); 
        $user->delete();
        return redirect('/pengurusanPengguna/senaraiPengguna')->with('Padam pengguna berjaya.', 'Padam pengguna telah berjaya.');;
    
    }

    public function edit(Request $request)
    {
        $id = (int)$request->route('id');
        $wilayah = Wilayah::all()->pluck('nama','id');;
        $kategoriPengguna = KategoriPengguna::all();
        $user = User::find($id);
        return view('pengurusanPengguna.kemaskini', compact('user', 'kategoriPengguna', 'wilayah'));
    }
    public function kemaskiniProfil(Request $request)
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
        
        return view('dashboard');
    }

    public function kemaskiniPengguna(Request $request)
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
        Alert::success('Kemaskini pengguna berjaya.', 'Kemaskini pengguna telah berjaya.');   
        
        return redirect("/pengurusanPengguna/senaraiPengguna");
    }

    public function senaraiKategoriPengguna(Request $request)
    {
        $kategoriPenggunas = KategoriPengguna::all();
        
        return view('pengurusanPengguna.pengurusanKategoriPengguna', compact('kategoriPenggunas'));
    }

    public function tambahKategoriPengguna(Request $request)
    {
        $kategoriPengguna = new KategoriPengguna;
        $kategoriPengguna->nama = $request->kategoriPengguna;
        $kategoriPengguna->save();
        Alert::success('Tambah Kategori pengguna berjaya.', 'Kategori pengguna berjaya ditambah.');   
        
        return redirect('/pengurusanPengguna/senaraiKategoriPengguna');
    }

    public function editKategoriPengguna(Request $request)
    {
        $id = (int)$request->route('id');
        $kategoriPengguna = KategoriPengguna::find($id);
        return view('pengurusanPengguna.editKategoriPengguna', compact('kategoriPengguna'));
    }

    public function kemaskiniKategoriPengguna(Request $request)
    {
        $id = $request->kategoriId;
        $kategoriPengguna = KategoriPengguna::find($id);
        $kategoriPengguna->nama = $request->kategoriPengguna;
        $kategoriPengguna->save();
        Alert::success('Kemaskini Kategori pengguna berjaya.', 'Kategori pengguna berjaya dikemaskini.');   
    
        return redirect('/pengurusanPengguna/senaraiKategoriPengguna');
    }

    public function deleteKategoriPengguna(Request $request)
    {
        $id = $request->kategoriId;
        $kategoriPengguna = KategoriPengguna::find($id);
        $kategoriPengguna->delete();
        Alert::success('Padam Kategori pengguna berjaya.', 'Kategori pengguna berjaya dipadam.');   
    
        return redirect('/pengurusanPengguna/senaraiKategoriPengguna');

    }

    public function auditTrail()
    {
        $audits = Audit::orderBy("updated_at", "DESC")->get();;
        return view('auditTrail.audit', compact('audits'));
    }

    public function auditIdPengguna(Request $request)
    {
        $idpengguna = $request->idPengguna;
        $audits = Audit::leftJoin('users as usr','usr.id', '=', 'user_id')
        ->select('*','audits.created_at')->where('usr.idPengguna','=',$idpengguna)->get();
        return view('auditTrail.audit', compact('audits'));
    }

    public function auditTarikh(Request $request)
    {
        $tarikh = $request->tarikh;
        $audits = Audit::leftJoin('users as usr','usr.id', '=', 'user_id')
        ->select('*','audits.created_at')->where('audits.created_at','LIKE', "%{$tarikh}%")->get();
        return view('auditTrail.audit', compact('audits'));
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
