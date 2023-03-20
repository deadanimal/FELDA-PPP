<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\Audit;
use App\Models\Senarai_tugasan;
use App\Models\KategoriPengguna;
use App\Models\jenis_ternakan;
use App\Models\JenisKemaskini;
use App\Models\AktivitiParameter;
use App\Models\Aktiviti;
use App\Models\Perkara_Tugasan;
use App\Models\User;

use Illuminate\Http\Request;
use Alert;
use DataTables;


class ModulController extends Controller
{

    public function modul_add_page()
    {
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.ciptaModul', compact( 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function modul_add(Request $request)
    {
        try {
            $modul = new Modul;
            $modul->nama = $request->namaModul;
            $modul->status = $request->status;
            $modul->diciptaOleh = $request->userid;
            $modul->dikemaskiniOleh = Auth::user()->id;
            $modul->save();
            // $modul= Modul::where('nama', $modul->nama)->get();
            // return view("pengurusanModul.ciptaProses", compact('modul'));

            $audit = new Audit;
            $audit->user_id = Auth::user()->id;
            $audit->action = "Cipta Modul ".$modul->nama;
            $audit->save();

            Alert::success('Cipta Modul berjaya.', 'Modul telah berjaya dicipta.');

            return redirect('/moduls');

        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ciptaan modul tidak berjaya', 'Modul tidak berjaya dicipta.');

            return back();
            //var_dump($e->errorInfo);
        }

    }

    public function modul_list(Request $request)
    {
        $modul = Modul::orderBy("updated_at", "DESC")->get();
        if($request->ajax()) {
            return DataTables::collection($modul)
            ->addIndexColumn()
            ->addColumn('diciptaOleh', function (Modul $modul) {
                if($modul->diciptaOleh) {
                    $html_ = $modul->userDiciptaOleh->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })->addColumn('dikemaskiniOleh', function (Modul $modul) {
                if($modul->dikemaskiniOleh) {
                    $html_ = $modul->userDikemaskiniOleh->nama;
                } else {
                    $html_ = '-';
                }
                return $html_;
            })       
            ->addColumn('tindakan', function (Modul $modul) {
                $url = '/moduls/'.$modul->id.'/proses';
                $url2 = '/moduls/'.$modul->id;
                $url3 = '/moduls/'.$modul->id.'/copy';
                $url4 = '/moduls/'.$modul->id.'/delete';
                return '<a href="'.$url.'" class="frame9402-rectangle828245" style="margin-left: 0px;" title="Masuk">
                            <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A; width: 32px; height: 30px;" viewBox="0 0 556 502"><path d="M88.7 223.8L0 375.8V96C0 60.7 28.7 32 64 32H181.5c17 0 33.3 6.7 45.3 18.7l26.5 26.5c12 12 28.3 18.7 45.3 18.7H416c35.3 0 64 28.7 64 64v32H144c-22.8 0-43.8 12.1-55.3 31.8zm27.6 16.1C122.1 230 132.6 224 144 224H544c11.5 0 22 6.1 27.7 16.1s5.7 22.2-.1 32.1l-112 192C453.9 474 443.4 480 432 480H32c-11.5 0-22-6.1-27.7-16.1s-5.7-22.2 .1-32.1l112-192z"/></svg>
                        </a>
                        <a href="'.$url2.'" class="frame9402-rectangle828245" title="Kemaskini">
                            <img src="/SVG/pencil.svg"/>
                        </a>
                        <a href="'.$url3.'" class="frame9402-rectangle828245" style="margin-left: 15px;" title="Salinan">
                        <svg xmlns="http://www.w3.org/2000/svg" style="fill: #CD352A; width: 32px; height: 30px;" viewBox="0 0 556 502"><path d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"/></svg>    
                        </a>
                        <button type="button" class="btn btn-primary frame9402-rectangle828246" data-toggle="modal" data-target="#exampleModal'.$modul->id.'" title="Padam"></button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$modul->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Padam Modul '.$modul->nama.'</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p style="text-align:left;">Anda Pasti Mahu Padam Modul '.$modul->nama.'?<p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                <a href="'.$url4.'" class="btn btn-danger">Ya</a>
                            </div>
                            </div>
                        </div>
                        </div>';
            })                  
            ->rawColumns(['tindakan','dikemaskiniOleh','diciptaOleh'])                          
            ->make(true);
        }
        $bilangan = count($modul);
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiModul', compact('modul', 'bilangan',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function modul_delete(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Modul ".$modul->nama;
        $audit->save();

        $modul->delete();
        Alert::success('Padam Modul Berjaya.', 'Padam modul telah berjaya.');

        return redirect('/moduls');
    }

    public function modul_detail(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul); 

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.kemaskiniModul', compact('modul',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function modul_copy(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);

        $modulBaru = new Modul;
        $modulBaru->nama = $modul->nama." Copy ".date("Y-m-d H:i:s");
        $modulBaru->diciptaOleh = Auth::user()->id;
        $modulBaru->dikemaskiniOleh = Auth::user()->id;
        $modulBaru->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat salinan modul ".$modul->nama;
        $audit->save();

        Alert::success('Salinan Modul berjaya.', 'Salinan modul telah berjaya.');

        return back();
    }

    public function modul_update(Request $request)
    {
        $idModul = (int)$request->route('id');
        $moduls = Modul::find($idModul);
        $moduls->nama = $request->namaModul;
        $moduls->status = $request->status;
        $moduls->dikemaskiniOleh = Auth::user()->id;
        $moduls->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Modul ".$moduls->nama;
        $audit->save();

        Alert::success('Kemaskini Modul berjaya.', 'Kemaskini modul telah berjaya.');
        $modul = Modul::all();
        $bilangan = count(Modul::all());

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiModul', compact('modul', 'bilangan',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function proses_add(Request $request)
    {
        $prosess = new Proses;
        $prosess->nama = $request->namaProses;
        $prosess->status = 1;
        $prosess->sequence = $request->sequence;
        $prosess->modul = $request->modulId;
        $prosess->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Proses ".$prosess->nama;
        $audit->save();

        Alert::success('Cipta proses berjaya.', 'Cipta proses telah berjaya.');
        $modul = Modul::find($request->modulId);
        $prosess = Proses::where('modul', $request->modulId)->orderBy("sequence", "ASC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function proses_list(Request $request)
    {
        $idModul = (int)$request->route('modul_id');
        $prosess = Proses::where('modul', $idModul)->orderBy("sequence", "ASC")->get();
        $modul = Modul::find($idModul);

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function proses_update(Request $request)
    {
        $prosesId = $request->prosesId;
        $proses = Proses::find($prosesId);
        $proses->nama = $request->namaupdate;
        $proses->status = $request->statusUpdate;
        $proses->sequence = $request->sequenceUpdate;
        $proses->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Proses ".$proses->nama;
        $audit->save();

        Alert::success('Kemaskini Proses berjaya.', 'Kemaskini Proses telah berjaya.');

        $prosess = Proses::where('modul', $request->modulID)->orderBy("sequence", "ASC")->get();
        $modul = Modul::find($request->modulID);

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function proses_delete(Request $request)
    {
        $prosesId = $request->prosesId;
        $proses = Proses::find($prosesId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Proses ".$proses->nama;
        $audit->save();

        $proses->delete();
        Alert::success('Padam Proses Berjaya.', 'Padam proses telah berjaya.');

        $prosess = Proses::where('modul', $request->modulId)->orderBy("sequence", "ASC")->get();
        $modul = Modul::find($request->modulId);

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess',  'menuModul', 'menuProses', 'menuBorang'));
    }

    public function borang_add(Request $request)
    {
        $idProses = $request->prosesId;
        $borang = new Borang;
        $borang->namaBorang = $request->namaBorang;
        $borang->status = 1;
        $borang->proses = $idProses;
        $borang->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Cipta Borang berjaya.', 'Cipta borang telah berjaya.');
        
        $modul = Modul::find($request->modulId);
        $proses = Proses::find($idProses);
        $borangs = Borang::where('proses', $idProses)->orderBy("updated_at", "DESC")->get();
        $tugasans = Senarai_tugasan::where('proses_id', $idProses)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $idProses)->orderBy("updated_at", "DESC")->get();
        $kategoriPengguna = KategoriPengguna::all();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiBorang', compact('users','borangs', 'proses', 'modul', 'tugasans', 'kategoriPengguna',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));
    }

    public function borang_list(Request $request)
    {
        $idProses = (int)$request->route('proses_id');
        $borangs = Borang::where('proses', $idProses)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($idProses);

        $idModul = (int)$request->route('modul_id');
        $modul = Modul::find($idModul);
        $tugasans = Senarai_tugasan::where('proses_id', $idProses)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $idProses)->orderBy("updated_at", "DESC")->get();
        $users = User::where('status', 1)->get();
        

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiBorang', compact('modul','borangs', 'proses', 'tugasans', 'users',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));
    }

    public function borang_update(Request $request)
    {
        $borangId = $request->borangId;
        $borang = Borang::find($borangId);
        $borang->namaBorang = $request->namaupdate;
        $borang->status = $request->statusUpdate;
        $borang->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Borang ".$borang->namaBorang;
        $audit->save();

        Alert::success('Kemaskini Borang berjaya.', 'Kemaskini borang telah berjaya.');

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);
        $tugasans = Senarai_tugasan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $kategoriPengguna = KategoriPengguna::all();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiBorang', compact('users','borangs', 'proses', 'modul', 'tugasans', 'kategoriPengguna',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));
    }

    public function borang_delete(Request $request)
    {
        $borangId = $request->borangId;
        $borang = Borang::find($borangId);
        
        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Borang ".$borang->namaBorang;
        $audit->save();

        $borang->delete();
        Alert::success('Padam Borang Berjaya.', 'Padam borang telah berjaya.');

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);
        $tugasans = Senarai_tugasan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $kategoriPengguna = KategoriPengguna::all();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiBorang', compact('users','borangs', 'proses', 'modul', 'tugasans', 'kategoriPengguna',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));
    }

    public function tugasan_add(Request $request){
        $tugasan = new Senarai_tugasan;
        $tugasan->nama = $request->namaTugas;
        $tugasan->due_date = $request->tarikh;
        $tugasan->user_id = $request->user;
        $tugasan->proses_id = $request->prosesId;
        $tugasan->save();


        Alert::success('Tambah Tugasan Berjaya.', 'Tambah tugasan telah berjaya.');

        $proses = Proses::find($request->prosesId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Tugasan ".$tugasan->nama." pada Proses ".$proses->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $tugasans = Senarai_tugasan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses', 'modul', 'tugasans', 'users',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));

    }

    public function tugasan_edit(Request $request){
        $idTugasan = $request->tugasanID;
        $tugasans = Senarai_tugasan::find($idTugasan);
        $proses = Proses::find($request->prosesId);

        $modul = Modul::find($request->modulId);
        $kategoriPengguna = KategoriPengguna::all();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.editTugasan', compact('tugas_ans','cb_ans','proses', 'modul', 'tugasans', 'kategoriPengguna', 'checkboxes',  'menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function jenisTernakan_add(Request $request){

        $jenisTernakan = new jenis_ternakan;
        $jenisTernakan->nama = $request->namaJenis;
        $jenisTernakan->proses_id = $request->prosesId;
        $jenisTernakan->save();

        $proses = Proses::find($request->prosesId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Jenis Ternakan/Tanaman ".$jenisTernakan->nama." pada Proses ".$proses->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $tugasans = Senarai_tugasan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Cipta Jenis Ternakan/Tanaman Berjaya.', 'Cipta Jenis Ternakan/Tanaman telah berjaya.');

        return view('pengurusanModul.senaraiBorang', compact('users','borangs', 'proses', 'modul', 'tugasans',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));

    }

    public function jenisTernakan_edit(Request $request){

        $jenisTernakan = jenis_ternakan::find($request->jenisTernakanID);

        $proses = Proses::find($request->prosesId);

        $modul = Modul::find($request->modulId);

        $kemaskini = JenisKemaskini::where('id_jenisTernakans', $request->jenisTernakanID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.editTernakan', compact('modul','proses','menuModul', 'menuProses', 'menuBorang', 'kemaskini', 'jenisTernakan'));
    }

    public function jenisTernakan_update(Request $request){

        $jenis_ternakan = jenis_ternakan::find($request->jenisTernakanID);
        $prosesId = $request->prosesId;
        $jenis_ternakan->nama = $request->namaJenis;
        $jenis_ternakan->proses_id = $prosesId;
        $jenis_ternakan->save();

        $proses = Proses::find($prosesId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Jenis Ternakan/Tanaman ".$jenis_ternakan->nama." pada Proses ".$proses->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $prosesId)->orderBy("updated_at", "DESC")->get();
        $tugasans = Senarai_tugasan::where('proses_id', $prosesId)->orderBy("updated_at", "DESC")->get();
        $kemaskini = JenisKemaskini::where('id_jenisTernakans', $request->jenisTernakanID)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::find($request->jenisTernakanID);

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Kemaskini Jenis Ternakan/Tanaman Berjaya.', 'Kemaskini Jenis Ternakan/Tanaman telah berjaya.');

        return view('pengurusanModul.editTernakan', compact('borangs', 'proses', 'modul', 'tugasans', 'menuModul', 'menuProses', 'menuBorang', 'kemaskini','jenisTernakan'));

    }

    public function jenisTernakan_delete(Request $request){
        $idJenis = $request->jenisTernakanID;
        $jenisTernakan = jenis_ternakan::find($idJenis);
        $proses = Proses::find($request->prosesId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Jenis Ternakan/Tanaman ".$jenisTernakan->nama." pada Proses ".$proses->nama;
        $audit->save();

        $jenisTernakan->delete();

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $tugasans = Senarai_tugasan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $jenisTernakan = jenis_ternakan::where('proses_id', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $users = User::where('status', 1)->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Padam Jenis Kemaskini Berjaya.', 'Padam Jenis Kemaskini telah berjaya.');

        return view('pengurusanModul.senaraiBorang', compact('proses', 'modul', 'borangs','tugasans', 'users',  'menuModul', 'menuProses', 'menuBorang', 'jenisTernakan'));

    }
    
    public function JenisKemas_add(Request $request){

        $kemaskini = new JenisKemaskini;
        $kemaskini->nama = $request->namaKemas;
        $kemaskini->id_jenisTernakans = $request->ternakanaID;
        $kemaskini->save();

        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Jenis Kemaskini ".$kemaskini->nama." pada Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $kemaskini = JenisKemaskini::where('id_jenisTernakans', $request->ternakanaID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Cipta Jenis Kemaskini Berjaya.', 'Cipta Jenis Kemaskini telah berjaya.');

        return view('pengurusanModul.editTernakan', compact('jenisTernakan', 'proses', 'modul',  'menuModul', 'menuProses', 'menuBorang', 'kemaskini'));

    }

    public function JenisKemas_copy(Request $request)
    {
        $idJenisKemas = (int)$request->route('id');
        $kemaskini = JenisKemaskini::find($idJenisKemas);

        $kemaskiniBaru = new JenisKemaskini;
        $kemaskiniBaru->nama = $kemaskini->nama." Copy ".date("Y-m-d H:i:s");
        $kemaskiniBaru->id_jenisTernakans = $kemaskini->id_jenisTernakans;
        $kemaskiniBaru->save();

        $jenisTernakan = jenis_ternakan::find($kemaskini->id_jenisTernakans);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat salinan Jenis Kemaskini ".$kemaskini->nama." pada Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        Alert::success('Salinan Jenis Kemaskini  berjaya.', 'Salinan Jenis Kemaskini  telah berjaya.');

        return back();
    }

    public function JenisKemas_edit(Request $request){

        $kemaskini = JenisKemaskini::find($request->kemaskiniID);

        $proses = Proses::find($request->prosesId);

        $modul = Modul::find($request->modulId);
        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);
        $aktivitis = Aktiviti::where('id_jenisKemaskini', $request->kemaskiniID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.editKemas', compact('jenisTernakan', 'proses', 'modul',  'menuModul', 'menuProses', 'menuBorang', 'kemaskini', 'aktivitis'));

    }

    public function JenisKemas_update(Request $request){

        $kemaskini = JenisKemaskini::find($request->kemaskiniID);
        $kemaskini->nama = $request->namaKemas;
        $kemaskini->id_jenisTernakans = $request->ternakanaID;
        $kemaskini->save();

        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);
        $kemaskini = JenisKemaskini::find($request->kemaskiniID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Jenis Kemaskini ".$kemaskini->nama." pada Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $aktivitis = Aktiviti::where('id_jenisKemaskini', $request->kemaskiniID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Kemaskini Jenis Kemaskini Berjaya.', 'Kemaskini Jenis Kemaskini telah berjaya.');

        return view('pengurusanModul.editKemas', compact('jenisTernakan', 'proses', 'modul', 'menuModul', 'menuProses', 'menuBorang', 'kemaskini', 'aktivitis'));

    }

    public function JenisKemas_delete(Request $request){
        $idKemas = $request->kemaskiniID;
        $kemas = JenisKemaskini::find($idKemas);

        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Jenis Kemaskini ".$kemas->nama." pada Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        $kemas->delete();

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $kemaskini = JenisKemaskini::where('id_jenisTernakans', $request->ternakanaID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Padam Jenis Kemaskini Berjaya.', 'Padam Jenis Kemaskini telah berjaya.');

        return view('pengurusanModul.editTernakan', compact('proses', 'modul', 'jenisTernakan', 'menuModul', 'menuProses', 'menuBorang', 'kemaskini'));

    }
    public function aktiviti_add(Request $request){

        $aktiviti = new Aktiviti;
        $aktiviti->nama = $request->namaAktiviti;
        $aktiviti->id_jenisKemaskini = $request->kemaskiniID;
        $aktiviti->save();

        $kemaskini = JenisKemaskini::find($request->kemaskiniID);
        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Aktiviti ".$aktiviti->nama." pada Jenis Kemaskini ".$kemaskini->nama. " dalam Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $aktivitis = Aktiviti::where('id_jenisKemaskini', $request->kemaskiniID)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);

        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Tambah Aktiviti Berjaya.', 'Tambah aktiviti telah berjaya.');

        return view('pengurusanModul.editKemas', compact('jenisTernakan' ,'proses', 'modul',  'menuModul', 'menuProses', 'menuBorang', 'kemaskini', 'aktivitis'));

    }

    public function aktiviti_update(Request $request){

        $aktiviti = Aktiviti::find($request->aktivId);
        $aktiviti->nama = $request->namaAktivitiUp;
        $aktiviti->id_jenisKemaskini = $request->kemaskiniID;
        $aktiviti->save();

        $kemaskini = JenisKemaskini::find($request->kemaskiniID);
        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Aktiviti ".$aktiviti->nama." pada Jenis Kemaskini ".$kemaskini->nama. " dalam Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $aktivitis = Aktiviti::where('id_jenisKemaskini', $request->kemaskiniID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Kemaskini Aktiviti Berjaya.', 'Kemaskini aktiviti telah berjaya.');

        return view('pengurusanModul.editKemas', compact('jenisTernakan','proses', 'modul',  'menuModul', 'menuProses', 'menuBorang', 'kemaskini', 'aktivitis'));

    }

    public function aktiviti_delete(Request $request){

        $aktiviti = Aktiviti::find($request->aktivId);
        $kemaskini = JenisKemaskini::find($request->kemaskiniID);
        $jenisTernakan = jenis_ternakan::find($request->ternakanaID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam aktiviti ".$aktiviti->nama." pada Jenis Kemaskini ".$kemaskini->nama. " dalam Jenis Ternakan/Tanaman ".$jenisTernakan->nama;
        $audit->save();

        $aktiviti->delete();

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $aktivitis = Aktiviti::where('id_jenisKemaskini', $request->kemaskiniID)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Padam Aktiviti Berjaya.', 'Aktiviti telah berjaya dipadam.');

        return view('pengurusanModul.editKemas', compact('jenisTernakan', 'proses', 'modul',  'menuModul', 'menuProses', 'menuBorang', 'kemaskini', 'aktivitis'));

    }

    public function Param_get(Request $request){

        $idAct = (int)$request->route('id');
        $prosesId = (int)$request->route('prosesId');
        $modulId = (int)$request->route('modulId');

        $params = AktivitiParameter::where('aktiviti', $idAct)->get();
        
        $proses = Proses::find($prosesId);
        $aktiviti = Aktiviti::find($idAct);
        $modul = Modul::find($modulId);
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('pengurusanModul.paramList', compact('proses', 'modul', 'menuModul', 'menuProses', 'menuBorang', 'aktiviti', 'params'));

    }


    public function Param_add(Request $request){

        $param = new AktivitiParameter;
        $param->nama = $request->namaParam;
        $param->unit = $request->unit;
        $param->jenisData = $request->jenisData;
        $param->cycle = $request->cycle;
        $param->sasaran_pendapatan = $request->sasaran;
        $param->category = $request->category;
        $param->aktiviti = $request->aktivitiId;
        $param->save();

        $proses = Proses::find($request->prosesId);
        $aktiviti = Aktiviti::find($request->aktivitiId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Parameter ".$param->nama." pada Aktiviti ".$aktiviti->nama;
        $audit->save();

        $modul = Modul::find($request->modulId);
        $params = AktivitiParameter::where('aktiviti', $request->aktivitiId)->orderBy("updated_at", "DESC")->get();

        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Tambah Parameter Berjaya.', 'Tambah parameter telah berjaya.');

        return view('pengurusanModul.paramList', compact('proses', 'modul', 'menuModul', 'menuProses', 'menuBorang', 'aktiviti', 'params'));

    }

    public function Param_update(Request $request){

        $param = AktivitiParameter::find($request->paramId);
        $param->nama = $request->namaParam;
        $param->unit = $request->unit;
        $param->jenisData = $request->jenisData;
        $param->cycle = $request->cycle;
        $param->sasaran_pendapatan = $request->sasaran;
        $param->category = $request->category;
        $param->aktiviti = $request->aktivitiId;
        $param->save();

        $aktiviti = Aktiviti::find($request->aktivitiId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Parameter ".$param->nama." pada Aktiviti ".$aktiviti->nama;
        $audit->save();
        
        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $params = AktivitiParameter::where('aktiviti', $request->aktivitiId)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Kemaskini Parameter Berjaya.', 'Kemaskini parameter telah berjaya.');

        return view('pengurusanModul.paramList', compact('proses', 'modul', 'menuModul', 'menuProses', 'menuBorang', 'aktiviti', 'params'));

    }

    public function Param_delete(Request $request){

        $param = AktivitiParameter::find($request->paramId);

        $aktiviti = Aktiviti::find($request->aktivitiId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Parameter ".$param->nama." pada Jenis Kemaskini ".$aktiviti->nama;
        $audit->save();

        $param->delete();

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $params = AktivitiParameter::where('aktiviti', $request->aktivitiId)->orderBy("updated_at", "DESC")->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        Alert::success('Padam Parameter Berjaya.', 'Padam Parameter telah berjaya.');

        return view('pengurusanModul.paramList', compact('proses', 'modul', 'menuModul', 'menuProses', 'menuBorang', 'aktiviti', 'params'));
    }

}
