<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\cards;
use App\Models\Modul;
use App\Models\User;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\Audit;
use Illuminate\Http\Request;
use Alert;

class WebController extends Controller
{
    public function landingPage()
    {
        $totalModul = Count(Modul::where('status', 'Go-live')->get());
        $totalPeneroka = Count(User::whereRelation('kategori', 'nama', '=', 'Peserta')->get());

        return view('home', compact ('totalModul', 'totalPeneroka'));
    }

    public function homeSetting()
    {
        $sliders = Slider::all();
        $cards = cards::orderBy('rows')->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.homeEdit', compact ('sliders', 'cards', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function sliderAdd(Request $request)
    {
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->content = $request->content;
        $slider->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat slider ".$slider->title;
        $audit->save();

        Alert::success('Cipta Slider Berjaya.', 'Slider telah berjaya dicipta.');

        return redirect('/home');
    }

    public function sliderUpdate(Request $request)
    {
        $slider = Slider::find($request->sliderId);
        $slider->title = $request->title;
        $slider->content = $request->content;
        $slider->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini slider ".$slider->title;
        $audit->save();

        Alert::success('Kemaskini Slider Berjaya.', 'Slider telah berjaya dikemaskini.');

        return redirect('/home');
    }

    public function sliderDelete(Request $request)
    {
        $IdSlider = $request->sliderId;
        $slider = Slider::find($IdSlider);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam slider ".$slider->title;
        $audit->save();

        $slider->delete();

        Alert::success('Padam Slider Berjaya.', 'Slider telah berjaya dipadam.');

        return redirect('/home');
    }
}
