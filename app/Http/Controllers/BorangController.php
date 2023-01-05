<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Borang;
use App\Models\Modul;
use App\Models\Proses;
use App\Models\Medan;
use Illuminate\Http\Request;
use Alert;
use Artisan;

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

        $medans = Medan::where('borang_id', $borang->id);

        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul', 'medans'));
    }

    public function uploadBorang(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $borang->borangPdf =  $request->file('borangPdf')->store('felda-ppp/uploads');
        $borang->save();

        Alert::success('Muat Naik Borang berjaya.', 'Muat naik borang anda berjaya.');   

        return view('pengurusanModul.borang', compact('borang'));
    }

    public function borang_detail_add(Request $request)
    {
        $medan = new Medan;
        $medan->nama = $request->nama;
        $medan->datatype = $request->datatype;
        $medan->pilihan = $request->pilihan;
        $medan->borang_id = $request->borangId;
        $medan->save;

        $idBorang = $request->borangId;
        $borang = Borang::find($idBorang);


        $idModul = $request->modulId;
        $modul = Modul::find($idModul);

        $idProses = $request->prosesId;
        $proses = Proses::find($idProses);

        $medans = Medan::where('borang_id', $borang->id);

        return view('pengurusanModul.borang', compact('borang', 'proses', 'modul', 'medans'));
    }

    public function borang_field_update(Request $request)
    {
        $borang = Borang::find($request->borangId);
        $context_old = json_decode($borang->context);
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
        
        // $namaborang = $borang->namaBorang;
        // $contexts = json_decode($borang->context);

        // Artisan::call('make:model',['name'=>$namaborang]);
        
        
        // // dd($contexts);

        // if (Schema::hasTable($namaborang)){
        //     $text = "";
        //     foreach($contexts as $context){
        //         foreach($context_old as $context_old){
        //             if($contexts->nama != $context_old->nama){
        //                 $text .= "RENAME COLUMN ".str_replace(' ', '_', $context_old->nama)." TO ".str_replace(' ', '_', $context->nama);
        //             }
                    
        //         }
        //     }
        //     $statement = "ALTER TABLE ".$namaborang." ".$text;

        //     DB::statement($statement);
        // }
        // else{
        //     $text = "";
        //     foreach($contexts as $context){
        //         if($context->pilihan == "required"){
        //             $text .= str_replace(' ', '_', $context->nama)." varchar(255) NOT NULL, ";
        //         }
        //         else {
        //             $text .= str_replace(' ', '_', $context->nama)." varchar(255), ";
        //         }
        //     }
        //     $statement = "CREATE TABLE ".$namaborang."(id NOT NULL, ".$text." created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (ID));";

        //     DB::statement($statement);
        // }

        Alert::success('Simpan Meadan Borang berjaya.', 'Simpan medan borang telah berjaya.');   

        $modul = Modul::find($request->modulId);
        $proses = Proses::find($request->prosesId);

        return view('pengurusanModul.borang', compact('borang', 'modul', 'proses'));
    
    }

}
