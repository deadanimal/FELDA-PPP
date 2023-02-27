<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\jenis_ternakan;
use App\Models\JenisKemaskini;
use App\Models\AktivitiParameter;
use App\Models\Aktiviti;
use App\Models\Jawapan_parameter;
use DataTables;

class PelaporanController extends Controller
{
    
    public function proses_list(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);
        $proses = Proses::where('modul', $idModul)->orderBy("updated_at", "DESC")->get();
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
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pelaporan.senaraiProsesLaporan', compact('modul','proses', 'idModul','menuModul', 'menuProses', 'menuBorang'));
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
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pelaporan.senaraiTernakan', compact('proses', 'jenisTernakan', 'idProses', 'menuModul', 'menuProses', 'menuBorang'));
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
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pelaporan.senaraiKemaskini', compact('ternakan', 'jenisKemaskini', 'idTernakan', 'menuModul', 'menuProses', 'menuBorang'));
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
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pelaporan.senaraiAktiviti', compact('kemaskini', 'aktiviti', 'idKemaskini', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function user_list(Request $request)
    {
        $idAktiviti = (int)$request->route('aktiviti_id');
        $aktiviti = Aktiviti::find($idAktiviti);
        $jwpnParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti', 'users', 'users.rancangan_id', 'users.wilayah_id')->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->orderBy("updated_at", "DESC")->get();
        // dd($aktiviti);
        if($request->ajax()) {
            return DataTables::collection($jwpnParameter)
            ->addIndexColumn()
            ->addColumn('namaUser', function (Jawapan_parameter $jwpnParameter) {
                if($jwpnParameter->user_id) {
                    $html_ = $jwpnParameter->users->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })
            ->addColumn('rancangan', function (Jawapan_parameter $jwpnParameter) {
                if($jwpnParameter->user_id) {
                    $html_ = $jwpnParameter->users->rancangan_id->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })->addColumn('wilayah', function (Jawapan_parameter $jwpnParameter) {
                if($jwpnParameter->user_id) {
                    $html_ = $jwpnParameter->users->wilayah_id->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })->addColumn('tindakan', function (Jawapan_parameter $jwpnParameter) {
                $url = '/pelaporan/JawapanList/'.$jwpnParameter->users->id;
                return '<a href="'.$url.'" class="btn btn-info">
                        Lihat
                        </a>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pelaporan.senaraiUser', compact('aktiviti', 'jwpnParameter', 'idAktiviti', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function jawapan_list(Request $request)
    {
        $idAktiviti = (int)$request->route('jawapan_id');
        $aktiviti = Aktiviti::find($idAktiviti);
        $jwpnParameter = Jawapan_parameter::with('AktivitiParameter', 'AktivitiParameter.aktiviti')->whereRelation('AktivitiParameter.aktiviti','id', $idAktiviti)->orderBy("updated_at", "DESC")->get();
        // dd($aktiviti);
        if($request->ajax()) {
            return DataTables::collection($jwpnParameter)
            ->addIndexColumn()
            ->addColumn('namaUser', function (Jawapan_parameter $jwpnParameter) {
                if($jwpnParameter->user_id) {
                    $html_ = $jwpnParameter->users->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })
            ->addColumn('rancangan', function (Jawapan_parameter $jwpnParameter) {
                if($jwpnParameter->user_id) {
                    $html_ = $jwpnParameter->users->rancangan_id->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })->addColumn('wilayah', function (Jawapan_parameter $jwpnParameter) {
                if($jwpnParameter->user_id) {
                    $html_ = $jwpnParameter->users->wilayah_id->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })->addColumn('tindakan', function (Jawapan_parameter $jwpnParameter) {
                $url = '/pelaporan/JawapanList/'.$jwpnParameter->users->id;
                return '<a href="'.$url.'" class="btn btn-info">
                        Lihat
                        </a>';
            })                  
            ->rawColumns(['tindakan'])                          
            ->make(true);
        }
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pelaporan.senaraiUser', compact('aktiviti', 'jwpnParameter', 'idAktiviti', 'menuModul', 'menuProses', 'menuBorang'));
    }
    
}
