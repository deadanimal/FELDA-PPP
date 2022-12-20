<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Borang;
use App\Models\Modul;
use App\Models\Proses;
use Illuminate\Http\Request;
use Alert;

class BorangController extends Controller
{
    public function borang_detail(Request $request)
    {
        $idBorang = (int)$request->route('borang_id');
        $borang = Borang::find($idBorang);


        $idModul = (int)$request->route('modul_id');
        $modul = Modul::find($idModul);

        $idProses = (int)$request->route('proses_id');
        $proses = Proses::find($idProses);

        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul'));
    }

    public function uploadBorang(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $borang->borangPdf =  $request->file('borangPdf')->store('felda-ppp/uploads');
        $borang->save();

        Alert::success('Muat Naik Borang berjaya.', 'Muat naik borang anda berjaya.');   

        return view('pengurusanModul.borang', compact('borang'));
    }

    public function borang_field_update(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $namas = $request->nama;
        $datatypes = $request->datatype;
        $pilihans = $request->pilihan;
        
        for ($x = 0; $x < count($namas); $x++){
            $data[] = [
                'nama' => $namas[$x],
                'datatype' => $datatypes[$x],
                'pilihan' => $pilihans[$x],
            ];
        }

        $borang->context = json_encode($data);
        $borang->save();

        Alert::success('Simpan Meadan Borang berjaya.', 'Simpan medan borang telah berjaya.');   

        return view('pengurusanModul.borang', compact('borang'));
    
    }

}
