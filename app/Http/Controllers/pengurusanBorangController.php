<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Borang;
use Illuminate\Http\Request;
use Alert;

class pengurusanBorangController extends Controller
{
    public function isiBorang(Request $request)
    {
        $idBorang = (int)$request->route('borangId');
        $borang = Borang::find($idBorang);

        return view('pengurusanModul.borang', compact('borang'));
    
    
    }

    public function simpanMedanBorang(Request $request)
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

        return view('pengurusanModul.borang', compact('borang'));
        
        $borangs = PDF::loadview();

    
    }

}
