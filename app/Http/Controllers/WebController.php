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
use App\Models\Faq;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function landingPage()
    {
        $sliders = Slider::all();
        $cardsTotalRows = cards::max('rows');
        $cards = cards::orderBy('rows', 'ASC')->get();
        $faqs = Faq::orderBy('updated_at', 'DESC')->get();

        $totalModul = Count(Modul::where('status', 'Go-live')->get());
        $totalPeneroka = Count(User::whereRelation('kategori', 'nama', '=', 'Peserta')->get());

        return view('home', compact ('totalModul', 'totalPeneroka', 'sliders', 'cardsTotalRows', 'cards', 'faqs'));
    }

    public function homeSetting()
    {
        $sliders = Slider::all();
        $cards = cards::orderBy('rows', 'ASC')->get();
        $faqs = Faq::orderBy('updated_at', 'DESC')->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.homeEdit', compact ('sliders', 'cards', 'faqs', 'menuModul', 'menuProses', 'menuBorang'));
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

    public function cardAdd(Request $request)
    {
        $card = new cards;
        $card->title = $request->title;
        if($request->content){
            $card->content = $request->content;
        }
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $card->picture = '/upload/' . $picture;
        }
        $card->rows = $request->rows;
        $card->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat Kad ".$card->title;
        $audit->save();

        Alert::success('Cipta Kad Berjaya.', 'Kad telah berjaya dicipta.');

        return redirect('/home');
    }

    public function cardUpdate(Request $request)
    {
        $IdCard = $request->cardId;
        $card = cards::find($IdCard);
        $card->title = $request->title;
        if($request->content){
            $card->content = $request->content;
        }
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $card->picture = '/upload/' . $picture;
        }
        $card->rows = $request->rows;
        $card->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat Kad ".$card->title;
        $audit->save();

        Alert::success('Kemaskini Kad Berjaya.', 'Kad telah berjaya diKemaskini.');

        return redirect('/home');
    }

    public function cardDelete(Request $request)
    {
        $IdCard = $request->cardId;
        $card = cards::find($IdCard);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Kad ".$card->title;
        $audit->save();

        $card->delete();

        Alert::success('Padam Kad Berjaya.', 'Kad telah berjaya dipadam.');

        return redirect('/home');
    }

    public function faqAdd(Request $request)
    {
        $faq = new Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Soalan Lazim ".$faq->title;
        $audit->save();

        Alert::success('Cipta Soalan Lazim Berjaya.', 'Soalan Lazim telah berjaya dicipta.');

        return redirect('/home');
    }

    public function faqUpdate(Request $request)
    {
        $faq = Faq::find($request->faqId);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Soalan Lazim ".$faq->question;
        $audit->save();

        Alert::success('Kemaskini Soalan Lazim Berjaya.', 'Soalan Lazim telah berjaya dikemaskini.');

        return redirect('/home');
    }

    public function faqDelete(Request $request)
    {
        $Idfaq = $request->faqId;
        $faq = Faq::find($Idfaq);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Soalan Lazim ".$faq->question;
        $audit->save();

        $faq->delete();

        Alert::success('Padam Soalan Lazim Berjaya.', 'Slider Soalan Lazim berjaya dipadam.');

        return redirect('/home');
    }
}
