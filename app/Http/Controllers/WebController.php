<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function landingPage()
    {
        $totalModul = Count(Modul::where('status', 'Go-live')->get());
        $totalPeneroka = Count(User::whereRelation('kategori', 'nama', '=', 'Peserta')->get());

        return view('home', compact ('totalModul', 'totalPeneroka'));
    }
}
