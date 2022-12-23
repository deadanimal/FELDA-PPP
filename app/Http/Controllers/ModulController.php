<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Borang;
use Illuminate\Http\Request;
use Alert;
use DataTables;


class ModulController extends Controller
{

    public function modul_add_page()
    {
        return view('pengurusanModul.ciptaModul');
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
                                <p>Anda Pasti Mahu Padam Modul '.$modul->nama.'?<p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <a href="'.$url4.'" class="btn btn-primary">Ya</a>
                            </div>
                            </div>
                        </div>
                        </div>';
            })                  
            ->rawColumns(['tindakan','dikemaskiniOleh','diciptaOleh'])                          
            ->make(true);
        }
        $bilangan = count($modul);
        return view('pengurusanModul.senaraiModul', compact('modul', 'bilangan'));
    }

    public function modul_delete(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);
        $modul->delete();
        Alert::success('Padam Modul Berjaya.', 'Padam modul telah berjaya.');

        return redirect('/moduls');
    }

    public function modul_detail(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul); 
        return view('pengurusanModul.kemaskiniModul', compact('modul'));
    }

    public function modul_copy(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);

        $modulBaru = new Modul;
        $modulBaru->nama = $modul->nama." Copy ".date("Y-m-d H:i:s");;
        $modulBaru->diciptaOleh = Auth::user()->id;
        $modulBaru->dikemaskiniOleh = Auth::user()->id;
        $modulBaru->save();

        Alert::success('Copy Modul berjaya.', 'Copy modul telah berjaya.');

        return back();
    }

    public function modul_update(Request $request)
    {
        $idModul = (int)$request->route('id');
        $moduls = Modul::find($idModul);
        $moduls->nama = $request->namaModul;
        $moduls->dikemaskiniOleh = Auth::user()->id;
        $moduls->save();
        Alert::success('Kemaskini Modul berjaya.', 'Kemaskini modul telah berjaya.');
        $modul = Modul::all();
        $bilangan = count(Modul::all());

        return view('pengurusanModul.senaraiModul', compact('modul', 'bilangan'));
    }

    public function proses_add(Request $request)
    {
        $prosess = new Proses;
        $prosess->nama = $request->namaProses;
        $prosess->status = 1;
        $prosess->modul = $request->modulId;
        $prosess->save();
        Alert::success('Cipta proses berjaya.', 'Cipta proses telah berjaya.');
        $modul = Modul::find($request->modulId);
        $prosess = Proses::where('modul', $request->modulId)->orderBy("updated_at", "DESC")->get();

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess'));
    }

    public function proses_list(Request $request)
    {
        $idModul = (int)$request->route('modul_id');
        $prosess = Proses::where('modul', $idModul)->orderBy("updated_at", "DESC")->get();
        $modul = Modul::find($idModul);
        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess'));
    }

    public function proses_update(Request $request)
    {
        $prosesId = $request->prosesId;
        $proses = Proses::find($prosesId);
        $proses->nama = $request->namaupdate;
        $proses->status = $request->statusUpdate;

        $proses->save();
        Alert::success('Kemaskini Proses berjaya.', 'Kemaskini Proses telah berjaya.');


        $prosess = Proses::where('modul', $request->modulID)->orderBy("updated_at", "DESC")->get();
        $modul = Modul::find($request->modulID);

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess'));
    }

    public function proses_delete(Request $request)
    {
        $prosesId = $request->prosesId;
        $proses = Proses::find($prosesId);
        $proses->delete();
        Alert::success('Padam Proses Berjaya.', 'Padam proses telah berjaya.');

        $prosess = Proses::where('modul', $request->modulId)->orderBy("updated_at", "DESC")->get();
        $modul = Modul::find($request->modulId);

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess'));
    }

    public function borang_add(Request $request)
    {
        $borang = new Borang;
        $borang->namaBorang = $request->namaBorang;
        $borang->status = 1;
        $borang->proses = $request->prosesId;
        $borang->save();
        Alert::success('Cipta Borang berjaya.', 'Cipta borang telah berjaya.');
        
        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses', 'modul'));
    }

    public function borang_list(Request $request)
    {
        $idProses = (int)$request->route('proses_id');
        $borangs = Borang::where('proses', $idProses)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($idProses);
        $idModul = (int)$request->route('modul_id');
        $modul = Modul::find($idModul);
        return view('pengurusanModul.senaraiBorang', compact('modul','borangs', 'proses'));
    }

    public function borang_update(Request $request)
    {
        $borangId = $request->borangId;
        $borang = Borang::find($borangId);
        $borang->namaBorang = $request->namaupdate;
        $borang->status = $request->statusUpdate;

        $borang->save();
        Alert::success('Kemaskini Borang berjaya.', 'Kemaskini borang telah berjaya.');

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses', 'modul'));
    }

    public function borang_delete(Request $request)
    {
        $borangId = $request->borangId;
        $borang = Borang::find($borangId);
        $borang->delete();
        Alert::success('Padam Borang Berjaya.', 'Padam borang telah berjaya.');

        $modul = Modul::find($request->modulId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses', 'modul'));
    }
}
