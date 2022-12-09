<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Borang;
use Illuminate\Http\Request;
use Alert;


class PengurusanModulController extends Controller
{

    public function create()
    {
        return view('pengurusanModul.ciptaModul');
    }

    public function store(Request $request)
    {
        try {
            $modul = new Modul;
            $modul->nama = $request->namaModul;
            $modul->diciptaOleh = $request->userid;
            $modul->dikemaskiniOleh = Auth::user()->id;
            $modul->save();
            Alert::success('Cipta Modul berjaya.', 'Cipta modul telah berjaya.');
            // $modul= Modul::where('nama', $modul->nama)->get();
            // return view("pengurusanModul.ciptaProses", compact('modul'));
            return redirect('/pengurusanModul/senaraiModul');

        } catch (\Illuminate\Database\QueryException $e) {
            Alert::error('Ciptaan modul tidak berjaya.', 'Modul tidak dicipta');
            return back();
            //var_dump($e->errorInfo);
        }

    }

    public function senaraiModul()
    {
        $modul = Modul::orderBy("updated_at", "DESC")->get();
        $bilangan = count($modul);
        return view('pengurusanModul.senaraiModul', compact('modul', 'bilangan'));
    }

    public function deleteModul(Request $request)
    {
        $idModul = $request->modulId;
        $modul = Modul::find($idModul);
        $modul->delete();
        Alert::success('Padam Modul Berjaya.', 'Padam modul telah berjaya.');

        return redirect('/pengurusanModul/senaraiModul');
    }

    public function cariModul(Request $request)
    {
        $namaModul = $request->namaModul;
        $modul = Modul::where('nama', 'LIKE', "%{$namaModul}%")->orWhere('nama', 'LIKE', "%{$namaModul}%")->get();
        $bilangan = count(Modul::all());
        return view('pengurusanModul.senaraiModul', compact('modul', 'bilangan'));
    }

    public function editModul(Request $request)
    {
        $idModul = (int)$request->route('id');
        $modul = Modul::find($idModul);
        Alert::success('Copy Modul berjaya.', 'Copy modul telah berjaya.');
    }

    public function copyModul(Request $request)
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

    public function kemaskiniModul(Request $request)
    {
        $idModul = $request->id;
        $moduls = Modul::find($idModul);
        $moduls->nama = $request->namaModul;
        $moduls->dikemaskiniOleh = Auth::user()->id;
        $moduls->save();
        Alert::success('Kemaskini Modul berjaya.', 'Kemaskini modul telah berjaya.');
        $modul = Modul::all();
        $bilangan = count(Modul::all());

        return view('/pengurusanModul/senaraiModul', compact('modul', 'bilangan'));
    }

    public function ciptaProses(Request $request)
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

    public function senaraiProses(Request $request)
    {
        $idModul = (int)$request->route('modulId');
        $prosess = Proses::where('modul', $idModul)->orderBy("updated_at", "DESC")->get();
        $modul = Modul::find($request->modulId);
        // dd($prosess);
        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess'));
    }

    public function kemaskiniProses(Request $request)
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

    public function deleteProses(Request $request)
    {
        $prosesId = $request->prosesId;
        $proses = Proses::find($prosesId);
        $proses->delete();
        Alert::success('Padam Proses Berjaya.', 'Padam proses telah berjaya.');

        $prosess = Proses::where('modul', $request->modulID)->orderBy("updated_at", "DESC")->get();
        $modul = Modul::find($request->modulId);

        return view('pengurusanModul.senaraiProses', compact('modul', 'prosess'));
    }

    public function ciptaBorang(Request $request)
    {
        $borang = new Borang;
        $borang->namaBorang = $request->namaBorang;
        $borang->status = 1;
        $borang->proses = $request->prosesId;
        $borang->save();
        Alert::success('Cipta Borang berjaya.', 'Cipta borang telah berjaya.');

        $proses = Proses::find($request->prosesId);
        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses'));
    }

    public function senaraiBorang(Request $request)
    {
        $idProses = (int)$request->route('prosesId');
        $borangs = Borang::where('proses', $idProses)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($idProses);
        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses'));
    }

    public function kemaskiniBorang(Request $request)
    {
        $borangId = $request->borangId;
        $borang = Borang::find($borangId);
        $borang->namaBorang = $request->namaupdate;
        $borang->status = $request->statusUpdate;

        $borang->save();
        Alert::success('Kemaskini Borang berjaya.', 'Kemaskini borang telah berjaya.');


        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses'));
    }

    public function deleteBorang(Request $request)
    {
        $borangId = $request->borangId;
        $borang = Borang::find($borangId);
        $borang->delete();
        Alert::success('Padam Borang Berjaya.', 'Padam borang telah berjaya.');

        $borangs = Borang::where('proses', $request->prosesId)->orderBy("updated_at", "DESC")->get();
        $proses = Proses::find($request->prosesId);

        return view('pengurusanModul.senaraiBorang', compact('borangs', 'proses'));
    }
}
