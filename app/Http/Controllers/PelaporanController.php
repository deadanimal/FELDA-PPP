<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Wilayah;
use App\Models\Rancangan;
use App\Models\User;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\jenis_ternakan;
use App\Models\JenisKemaskini;
use App\Models\AktivitiParameter;
use App\Models\Aktiviti;
use App\Models\Jawapan_parameter;
use App\Models\Aduan;
use App\Models\Senarai_tugasan;
use App\Models\Projek;

use DataTables;
use PDF;

class PelaporanController extends Controller
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

    public function proses_list(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);
        $projek = Projek::where('modul_id',$idModul)->first();
        $proses = Proses::where('projek_id', $projek->id)->orderBy("updated_at", "DESC")->get();
        if($request->ajax()) {
            return DataTables::collection($proses)
            ->addIndexColumn()
            ->addColumn('tindakan', function (Proses $proses) {
                $url = '/pelaporan/ternakanList/'.$proses->id;
                return '<a href="'.$url.'" class="btn btn-info">
                        Lihat
                        </a>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.senaraiProsesLaporan', compact('noti','modul','proses', 'idModul','menuModul', 'menuProses', 'menuProjek'));
    }

    public function ternakan_list(Request $request)
    {
        $idProses = (int)$request->route('proses_id');
        $proses = Proses::find($idProses);
        
        $jenisTernakan = jenis_ternakan::where('proses_id', $idProses)->orderBy("updated_at", "DESC")->get();
        if($request->ajax()) {
            return DataTables::collection($jenisTernakan)
            ->addIndexColumn()
            ->addColumn('tindakan', function (jenis_ternakan $jenisTernakan) {
                $url = '/pelaporan/kemaskiniList/'.$jenisTernakan->id;
                return '<a href="'.$url.'" class="btn btn-info">
                        Lihat
                        </a>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.senaraiTernakan', compact('noti','proses', 'jenisTernakan', 'idProses', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function kemaskini_list(Request $request)
    {
        $idTernakan = (int)$request->route('ternakan_id');
        $ternakan = jenis_ternakan::find($idTernakan);
        $jenisKemaskini = JenisKemaskini::where('id_jenisTernakans', $idTernakan)->orderBy("updated_at", "DESC")->get();
        if($request->ajax()) {
            return DataTables::collection($jenisKemaskini)
            ->addIndexColumn()
            ->addColumn('tindakan', function (JenisKemaskini $jenisKemaskini) {
                $url = '/pelaporan/aktvitiList/'.$jenisKemaskini->id;
                return '<a href="'.$url.'" class="btn btn-info">
                        Lihat
                        </a>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.senaraiKemaskini', compact('noti','ternakan', 'jenisKemaskini', 'idTernakan', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function aktiviti_list(Request $request)
    {
        $idKemaskini = (int)$request->route('kemaskini_id');
        $kemaskini = JenisKemaskini::find($idKemaskini);
        $aktiviti = Aktiviti::where('id_jenisKemaskini', $idKemaskini)->orderBy("updated_at", "DESC")->get();
        if($request->ajax()) {
            return DataTables::collection($aktiviti)
            ->addIndexColumn()
            ->addColumn('tindakan', function (Aktiviti $aktiviti) {
                $url = '/pelaporan/userList/'.$aktiviti->id;
                return '<a href="'.$url.'" class="btn btn-info">
                        Lihat
                        </a>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.senaraiAktiviti', compact('noti','kemaskini', 'aktiviti', 'idKemaskini', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function user_list(Request $request)
    {
        $idAktiviti = (int)$request->route('aktiviti_id');
        $aktiviti = Aktiviti::find($idAktiviti);
        $jwpnParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->orderBy('user_id')->get();
        // dd($jwpnParameter);
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.senaraiUser', compact('noti','aktiviti', 'jwpnParameter', 'idAktiviti', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function userSearch_list(Request $request)
    {
        $idAktiviti = (int)$request->route('aktiviti_id');
        $aktiviti = Aktiviti::find($idAktiviti);

        $name = $request->carian;
        if($name != ""){
            $rancangan = Rancangan::where('nama','like', "%".$name."%")->first(); 
            $wilayah = Wilayah::where('nama','like', "%".$name."%")->first(); 
        }
        else{
            $wilayah = [];
            $rancangan = [];
        }
        
        if(!empty($wilayah) && !empty($rancangan)){
            $jwpnParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->whereRelation('users.rancangan_id','id', $rancangan->id)->whereRelation('users.wilayah_id','id', $wilayah->id)->orderBy('user_id')->get();
        }
        elseif(!empty($rancangan)){
            $jwpnParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->whereRelation('users.rancangan_id','id', $rancangan->id)->orderBy('user_id')->get();
        }
        elseif(!empty($wilayah)){
            $jwpnParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->whereRelation('users.wilayah_id','id', $wilayah->id)->orderBy('user_id')->get();

        }
        else{
            $jwpnParameter = [];
        }

        //for notification tugasan
        $noti = $this->notification();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.senaraiUser', compact('noti','aktiviti', 'jwpnParameter', 'idAktiviti', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function user_report(Request $request)
    {
        $idAktiviti = (int)$request->route('aktiviti_id');
        $idUser = (int)$request->route('user_id');
        $user = user::find($idUser);
        $aktiviti = Aktiviti::find($idAktiviti);
        $expensesParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->where('user_id', $idUser)->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->whereRelation('AktivitiParameter', 'category', 'Perbelanjaan')->orderBy('created_at')->get();
        $incomeParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->where('user_id', $idUser)->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->whereRelation('AktivitiParameter', 'category', 'Pendapatan')->orderBy('created_at')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuProjek = Projek::where('status', "Aktif")->get();

        return view('pelaporan.reportUser', compact('noti','aktiviti', 'expensesParameter', 'incomeParameter', 'user', 'idAktiviti', 'menuModul', 'menuProses', 'menuProjek'));
    }

    public function report_print(Request $request)
    {
        $idAktiviti = (int)$request->route('aktiviti_id');
        $idUser = (int)$request->route('user_id');
        $user = user::find($idUser);
        $aktiviti = Aktiviti::find($idAktiviti);

        $expensesParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->where('user_id', $idUser)->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->whereRelation('AktivitiParameter', 'category', 'Perbelanjaan')->orderBy('created_at')->get();
        $incomeParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->where('user_id', $idUser)->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->whereRelation('AktivitiParameter', 'category', 'Pendapatan')->orderBy('created_at')->get();

        $data = compact('aktiviti', 'expensesParameter', 'incomeParameter', 'user');
        $pdf = PDF::loadView('pelaporan.pelaporanPdf', $data)->setPaper('a4', 'landscape');;

        return $pdf->download('Report_'.$aktiviti->nama.'_'.$user->nama.'.pdf');
    }
    
}
