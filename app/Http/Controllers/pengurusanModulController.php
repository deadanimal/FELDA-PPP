<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Modul;
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
        $modul = new Modul;
        $modul->nama = $request->namaModul;
        $modul->diciptaOleh = $request->userid;
        $modul->dikemaskiniOleh = Auth::user()->id;
        $modul->save();
        Alert::success('Cipta Modul berjaya.', 'Cipta modul telah berjaya.');   
        $modul = Modul::where('nama', '=', $request->namaModul);
        $proses = Proses::where('modul', '=', $modul->id);
        // $modul= Modul::where('nama', $modul->nama)->get();
        // return view("pengurusanModul.ciptaProses", compact('modul'));

        return view('pengurusanModul.ciptaProses', compact('modul','proses'));
    }

    public function senaraiModul()
    {
        $modul = Modul::all();
        $bilangan= count($modul);
        return view('pengurusanModul.senaraiModul', compact('modul','bilangan'));
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
        $namaModul= $request->namaModul;
        $modul = Modul::where('nama', 'LIKE', "%{$namaModul}%") ->orWhere('nama', 'LIKE', "%{$namaModul}%") ->get();
        $bilangan= count(Modul::all());
        return view('pengurusanModul.senaraiModul', compact('modul','bilangan'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modul  $modul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modul $modul)
    {
        //
    }
}
