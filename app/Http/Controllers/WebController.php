<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\cards;

use App\Models\Faq;
use App\Models\Statement;
use Carbon\Carbon;
use App\Models\Calendar_event;
use App\Models\Visitor;
use App\Models\document;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Picture;
use App\Models\Page;
use App\Models\Item;
use App\Models\Doc;
use App\Models\Modul;
use App\Models\User;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\Audit;
use App\Models\dropdown;
use App\Models\Jawapan;
use App\Mail\contactUs;
use App\Models\Aduan;
use App\Models\Senarai_tugasan;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function homePage(Request $request)
    { 
        // user counter
        $ip = $request->ip();
        $visitor = Visitor::firstOrNew(['ip_address' => $ip]);
        $visitor->save();

        // menu
        $pages = Page::where('status', 'Active')->orderBy('sequence', 'ASC')->get();

        //calendar
        $event = Calendar_event::all();

        // icon
        $totalDana = Jawapan::whereRelation('kelulusanBorang', 'keputusan', '=', 'Lulus')->count();
        $totalModul = Modul::where('status', 'Go-live')->count();
        $totalPeneroka = User::whereRelation('kategori', 'nama', '=', 'Peserta')->where('status', 1)->count();
        $userCount = Visitor::count();

        return view('homepage.home', compact ('event','totalDana','totalModul', 'totalPeneroka', 'userCount','pages'));
    }

    public function page(Request $request)
    {
        ini_set('memory_limit', '2048M');

        //nav bar menu
        $pages = Page::where('status', 'Active')->orderBy('sequence', 'ASC')->get();

        $pageId = (int) $request->route('pageId');
        $pg = Page::find($pageId);

        $cardsTotalRows = cards::whereRelation('item', 'page_id', '=', $pageId)->max('rows');
        $cards = cards::whereRelation('item', 'page_id', '=', $pageId)->orderBy('rows', 'ASC')->get();
        
        $sliders = Slider::whereRelation('item', 'page_id', '=', $pageId)->get();
        $galleries = Gallery::whereRelation('item', 'page_id', '=', $pageId)->orderBy('updated_at', 'DESC')->get();
        $dropdowns = dropdown::whereRelation('item', 'page_id', '=', $pageId)->get();
        $articles = Article::whereRelation('item', 'page_id', '=', $pageId)->get();
        $docs = Item::where('page_id', $pageId)->where('category', 'Document')->get();

        $items = Item::where('page_id', $pageId)->orderBy('row')->get();

        $totalDana = Jawapan::whereRelation('kelulusanBorang', 'keputusan', '=', 'Lulus')->count();
        $totalModul = Modul::where('status', 'Go-live')->count();
        $totalPeneroka = User::whereRelation('kategori', 'nama', '=', 'Peserta')->count();
        
        return view('homepage.page', compact ('items','totalDana','totalModul', 'totalPeneroka', 'pages', 'pg', 'cardsTotalRows', 'cards', 'galleries' ,'sliders','articles', 'dropdowns', 'docs'));
    }

    public function document_page(Request $request)
    {
        //nav bar menu
        $pages = Page::where('status', 'Active')->orderBy('sequence', 'ASC')->get();
        
        $itemId = (int) $request->route('itemId');
        $item = Item::find($itemId);
        $docs = Doc::where('item_id', $itemId)->get();
       
        return view('homepage.doc', compact ('pages', 'docs', 'item'));
    }


    public function gallery_pic(Request $request)
    {
        //nav bar menu
        $pages = Page::where('status', 'Active')->orderBy('sequence', 'ASC')->get();
        
        $galleryID = (int) $request->route('galleryID');
        $gallery = Gallery::find($galleryID);

        $pictures = Picture::where('gallery_id', $galleryID)->get();
       
        return view('homepage.galleryPic', compact ('pages', 'gallery', 'pictures'));
    }

    
    public function landingPage()
    {
        $sliders = Slider::all();
        $cardsTotalRows = cards::max('rows');
        $cards = cards::orderBy('rows', 'ASC')->get();
        $faqs = Faq::orderBy('updated_at', 'DESC')->get();
        
        $totalDana = Count(Jawapan::whereRelation('kelulusanBorang', 'keputusan', '=', 'Lulus')->get());
        $totalModul = Count(Modul::where('status', 'Go-live')->get());
        $totalPeneroka = Count(User::whereRelation('kategori', 'nama', '=', 'Peserta')->get());

        return view('home', compact ('totalDana','totalModul', 'totalPeneroka', 'sliders', 'cardsTotalRows', 'cards', 'faqs'));
    }
    
    // public function statementList()
    // {
    //     $pages = Page::where('status', 'Active')->orderBy('sequence', 'ASC')->get();
    //     $stats = Statement::orderBy('updated_at', 'DESC')->get();

    //     return view('penyataan', compact ('stats', 'pages'));
    // }

    public function documentList()
    {
        $pages = Page::where('status', 'Active')->orderBy('sequence', 'ASC')->get();
        $docs = document::orderBy('updated_at', 'DESC')->get();

        return view('downloadDoc', compact ('docs', 'pages'));
    }

    public function notification(){
        //for notification tugasan
        $date = Carbon::now();
        $tugasans_noti= Senarai_tugasan::where('user_id', Auth::user()->id)->where('due_date', '>=', $date->format('Y-m-d'))->count();
        $aduans_noti= Aduan::where('user_category', Auth::user()->kategoripengguna)->whereNot('status', 'Sah Selesai')->count();
        $borangs_noti = Borang::where('status', 1)->with('jwpn')->whereRelation('jwpn','status',  '=','Terima')->doesntHave('jwpn.hantarSurat')->count();
        $noti = $tugasans_noti+$aduans_noti+$borangs_noti;

        return $noti;
    }

    public function page_list()
    {
        $pages = Page::orderBy('sequence', 'ASC')->get();
        $docs = document::orderBy('updated_at', 'DESC')->get();
        $events = Calendar_event::orderBy('updated_at', 'DESC')->get();

        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.pageList', compact ('noti','events','docs','pages', 'menuModul', 'menuProses', 'menuBorang'));
    }
    
    public function page_add(Request $request)
    {
        $page = new Page;
        $page->nama = $request->pageName;
        $page->sequence = $request->sequence;
        $page->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Tambah laman ".$page->nama.' pada tetapan laman utama';
        $audit->save();

        Alert::success('Cipta Laman Berjaya.', 'Lamant telah berjaya dicipta.');

        return redirect('/home');
    }

    public function page_update(Request $request)
    {
        $page = Page::find($request->pageId);
        $page->nama = $request->pageName;
        $page->sequence = $request->sequence;
        $page->status = $request->status;
        $page->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini laman ".$page->nama.' pada tetapan laman utama';
        $audit->save();

        Alert::success('Kemaskini Laman Berjaya.', 'Laman telah berjaya dikemaskini.');

        return redirect('/home');
    }
    
    public function page_delete(Request $request)
    {
        $page = Page::find($request->pageId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam page ".$page->nama.' pada tetapan laman utama';
        $audit->save();

        $page->delete();

        Alert::success('Padam Laman Berjaya.', 'Laman telah berjaya dipadam.');

        return redirect('/home');
    }

    public function item_list(Request $request)
    {
        $pageId = (int) $request->route('pageId');

        $page = Page::find($pageId);
        $pageItems = Item::where('page_id', $pageId)->orderBy('row', 'ASC')->get();
                
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.pageItem', compact ('noti','page','pageItems', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function item_add(Request $request)
    {
        $page = Page::find($request->pageId);

        $item = new Item;
        $item->nama = $request->namaItem;
        $item->category = $request->category;
        $item->row = $request->row;
        $item->page_id = $page->id;
        $item->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Tambah item ".$item->nama.' pada Laman '.$page->nama;
        $audit->save();

        Alert::success('Cipta Laman Berjaya.', 'Laman telah berjaya dicipta.');

        return redirect('/home/page/'.$page->id.'/item');
    }

    public function item_update(Request $request)
    {
        $page = Page::find($request->pageId);

        $item = Item::find($request->itemId);
        $item->nama = $request->namaItem;
        $item->category = $request->category;
        $item->row = $request->row;
        $item->page_id = $page->id;
        $item->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini item ".$item->nama.' pada Laman '.$page->nama;
        $audit->save();

        Alert::success('Kemaskini Laman Berjaya.', 'Laman telah berjaya dikemaskini.');

        return redirect('/home/page/'.$page->id.'/item');
    }
    
    public function item_delete(Request $request)
    {
        $page = Page::find($request->pageId);

        $item = Item::find($request->itemId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam page ".$page->nama.' pada Laman '.$page->nama;
        $audit->save();

        $item->delete();

        Alert::success('Padam item Berjaya.', 'Item telah berjaya dipadam.');

        return redirect('/home/page/'.$page->id.'/item');
    }

    public function item_category(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        switch($item->category) {
            case('Slider'):
 
                return redirect('/home/item/'.$item->id.'/slider');
  
                break;
            case('Card'):

                return redirect('/home/item/'.$item->id.'/card');
    
                break;
            case('Dropdown'):

                return redirect('/home/item/'.$item->id.'/dropdown');

                break;
            case('Article'):

                return redirect('/home/item/'.$item->id.'/article');
    
                break;
            case('Gallery'):

                return redirect('/home/item/'.$item->id.'/gallery');
    
                break;
            case('Document'):

                return redirect('/home/item/'.$item->id.'/doc');
    
                break;
        }
    }

    public function slider_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $sliders = Slider::where('item_id', $itemId)->get();
                
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.slider', compact ('noti','sliders','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function card_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $cards = cards::where('item_id', $itemId)->orderBy('rows', 'ASC')->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.card', compact ('noti','cards','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function dropdown_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $dropdowns = dropdown::where('item_id', $itemId)->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.dropdown', compact ('noti','dropdowns','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function article_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $articles = Article::where('item_id', $itemId)->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.article', compact ('noti','articles','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function gallery_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $galleries = Gallery::where('item_id', $itemId)->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.gallery', compact ('noti','galleries','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function doc_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $docs = Doc::where('item_id', $itemId)->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.docList', compact ('noti','docs','item', 'menuModul', 'menuProses', 'menuBorang'));
    }


    public function sliderAdd(Request $request)
    {
        $item = Item::find($request->itemId);

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->content = $request->content;
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $slider->picture = '/upload/' . $picture;
        }   
        $slider->item_id = $request->itemId;     
        $slider->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat slider ".$slider->title;
        $audit->save();

        Alert::success('Cipta Slider Berjaya.', 'Slider telah berjaya dicipta.');

        return redirect('/home/item/'.$item->id.'/slider');
    }

    public function sliderUpdate(Request $request)
    {
        $item = Item::find($request->itemId);

        $slider = Slider::find($request->sliderId);
        $slider->title = $request->title;
        $slider->content = $request->content;
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $slider->picture = '/upload/' . $picture;
        }
        $slider->item_id = $request->itemId;      
        $slider->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini slider ".$slider->title;
        $audit->save();

        Alert::success('Kemaskini Slider Berjaya.', 'Slider telah berjaya dikemaskini.');

        return redirect('/home/item/'.$item->id.'/slider');
    }

    public function sliderDelete(Request $request)
    {
        $item = Item::find($request->itemId);

        $IdSlider = $request->sliderId;
        $slider = Slider::find($IdSlider);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam slider ".$slider->title;
        $audit->save();

        $slider->delete();

        Alert::success('Padam Slider Berjaya.', 'Slider telah berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/slider');
    }

    public function cardAdd(Request $request)
    {
        $item = Item::find($request->itemId);

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
        $card->item_id = $request->itemId;     
        $card->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat Kad ".$card->title;
        $audit->save();

        Alert::success('Cipta Kad Berjaya.', 'Kad telah berjaya dicipta.');

        return redirect('/home/item/'.$item->id.'/card');
    }

    public function cardUpdate(Request $request)
    {
        $item = Item::find($request->itemId);

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
        $card->item_id = $request->itemId;     
        $card->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Membuat Kad ".$card->title;
        $audit->save();

        Alert::success('Kemaskini Kad Berjaya.', 'Kad telah berjaya diKemaskini.');

        return redirect('/home/item/'.$item->id.'/card');
    }

    public function cardDelete(Request $request)
    {
        $item = Item::find($request->itemId);

        $IdCard = $request->cardId;
        $card = cards::find($IdCard);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Kad ".$card->title;
        $audit->save();

        $card->delete();

        Alert::success('Padam Kad Berjaya.', 'Kad telah berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/card');
    }

    public function dropdown_add(Request $request)
    {
        $item = Item::find($request->itemId);

        $dropdown = new dropdown;
        $dropdown->title = $request->title;
        $dropdown->body = $request->body;
        $dropdown->item_id = $item->id;
        $dropdown->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Dropdown ".$dropdown->title;
        $audit->save();

        Alert::success('Cipta Dropdown Berjaya.', 'Dropdown telah berjaya dicipta.');

        return redirect('/home/item/'.$item->id.'/dropdown');
    }

    public function dropdown_update(Request $request)
    {
        $item = Item::find($request->itemId);

        $dropdown = dropdown::find($request->dropdownId);
        $dropdown->title = $request->title;
        $dropdown->body = $request->body;
        $dropdown->item_id = $item->id;
        $dropdown->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Dropdown ".$dropdown->title;
        $audit->save();

        Alert::success('Kemaskini Dropdown Berjaya.', 'Dropdown telah berjaya dikemaskini.');

        return redirect('/home/item/'.$item->id.'/dropdown');
    }

    public function dropdown_delete(Request $request)
    {
        $item = Item::find($request->itemId);

        $dropdown = dropdown::find($request->dropdownId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Dropdown ".$dropdown->title;
        $audit->save();

        $dropdown->delete();

        Alert::success('Padam Dropdown Berjaya.', 'Dropdown berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/dropdown');
    }

    public function contact(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $pesanan = $request->pesanan;

        Mail::to('daniel.anuar@pipeline-network.com')->send(new contactUs($name, $email, $subject, $pesanan));

        Alert::success('Emel Berjaya Dihantar.', 'Emel berjaya dihantar.');

        return back();
    }

    public function article_add(Request $request)
    {
        $item = Item::find($request->itemId);

        $article = new Article;
        $article->title = $request->title;
        $article->statement = $request->statement;
        $article->item_id = $item->id;
        $article->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Artikel ".$article->title;
        $audit->save();

        Alert::success('Cipta Artikel Berjaya.', 'Artikel telah berjaya dicipta.');

        return redirect('/home/item/'.$item->id.'/article');
    }

    public function article_update(Request $request)
    {
        $item = Item::find($request->itemId);

        $article = Article::find($request->articleId);
        $article->title = $request->title;
        $article->statement = $request->statement;
        $article->item_id = $item->id;
        $article->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Artikel ".$article->title;
        $audit->save();

        Alert::success('Kemaskini Artikel Berjaya.', 'Artikel telah berjaya dikemaskini.');

        return redirect('/home/item/'.$item->id.'/article');
    }

    public function article_delete(Request $request)
    {
        $item = Item::find($request->itemId);

        $article = Article::find($request->articleId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Artikel ".$article->title;
        $audit->save();

        $article->delete();

        Alert::success('Padam Artikel Berjaya.', 'Artikel telah berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/article');
    }

    public function gallery_add(Request $request)
    {
        $item = Item::find($request->itemId);

        $gallery = new Gallery;
        $gallery->title = $request->title;
        if($request->body){
            $gallery->body = $request->body;
        }
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $gallery->thumbnail = '/upload/' . $picture;
        } 
        $gallery->item_id = $item->id;
        $gallery->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Galeri ".$gallery->title;
        $audit->save();

        Alert::success('Cipta Galeri Berjaya.', 'Galeri telah berjaya dicipta.');

        return redirect('/home/item/'.$item->id.'/gallery');
    }

    public function gallery_update(Request $request)
    {
        $item = Item::find($request->itemId);

        $gallery = Gallery::find($request->galleryId);
        $gallery->title = $request->title;
        if($request->body){
            $gallery->body = $request->body;
        }
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $gallery->thumbnail = '/upload/' . $picture;
        }
        $gallery->item_id = $item->id; 
        $gallery->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini galeri ".$gallery->title;
        $audit->save();

        Alert::success('Kemaskini Galeri Berjaya.', 'Galeri telah berjaya dikemaskini.');

        return redirect('/home/item/'.$item->id.'/gallery');
    }

    public function gallery_delete(Request $request)
    {
        $item = Item::find($request->itemId);

        $gallery = Gallery::find($request->galleryId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam galeri ".$gallery->title;
        $audit->save();

        $gallery->delete();

        Alert::success('Padam Galeri Berjaya.', 'Galeri berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/gallery');
    }

    public function picture_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');
        $item = Item::find($request->itemId);

        $galleryId = (int) $request->route('galleryId');
        $gallery = Gallery::find($galleryId);

        $pictures = Picture::where('gallery_id', $galleryId)->get();
        
        //for notification tugasan
        $noti = $this->notification();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.picture', compact ('noti','pictures','gallery', 'item' ,'menuModul', 'menuProses', 'menuBorang'));
    }

    public function picture_add(Request $request)
    {
        $item = Item::find($request->itemId);

        $gallery =  Gallery::find($request->galleryId);
        
        $pic = new Picture;
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $pic->picture = '/upload/' . $picture;
        } 
        $pic->gallery_id = $gallery->id;
        $pic->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Muat naik gambar dalam galeri ".$gallery->title;
        $audit->save();

        Alert::success('Muat Naik Gambar Berjaya.', 'Gambar telah berjaya dimuat naik.');

        return redirect('/home/item/'.$item->id.'/gallery/'.$gallery->id.'/picture');
    }

    public function picture_update(Request $request)
    {
        $item = Item::find($request->itemId);

        $gallery =  Gallery::find($request->galleryId);
        
        $pic = Picture::find($request->pictureId);
        if($request->file()) {
            $picture = time().'.'.$request->picture->extension();  
            $request->picture->move(public_path('upload'), $picture);
            $pic->picture = '/upload/' . $picture;
        } 
        $pic->gallery_id = $gallery->id;
        $pic->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini dan Muat naik gambar dalam galeri ".$gallery->title;
        $audit->save();

        Alert::success('Kemaskini Gambar Berjaya.', 'Gambar telah berjaya dikemaskini.');

        return redirect('/home/item/'.$item->id.'/gallery/'.$gallery->id.'/picture');
    }

    public function picture_delete(Request $request)
    {
        $item = Item::find($request->itemId);

        $gallery =  Gallery::find($request->galleryId);
        
        $pic = Picture::find($request->pictureId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam gambar dalam galeri ".$gallery->title;
        $audit->save();

        $pic->delete();
        Alert::success('Padam Gambar Berjaya.', 'Gambar telah berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/gallery/'.$gallery->id.'/picture');
    }
    public function doc_add(Request $request)
    {
        $request->validate([
            'file' => 'max:10000',
        ]);

        $item = Item::find($request->itemId);

        $doc = new Doc;
        $doc->name = $request->name;
        if($request->file('dokumen')) {
            $files = time().'.'.$request->dokumen->extension();  
            $request->dokumen->move(public_path('dokumen'), $files);
            $doc->file = '/dokumen/' . $files;
        } 
        $doc->item_id = $item->id; 
        $doc->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Dokumen ".$doc->name;
        $audit->save();

        Alert::success('Cipta Dokumen Berjaya.', 'Dokumen telah berjaya dicipta.');

        return redirect('/home/item/'.$item->id.'/doc');
    }

    public function doc_update(Request $request)
    {
        $request->validate([
            'file' => 'max:10000',
        ]);

        $item = Item::find($request->itemId);

        $doc = Doc::find($request->docId);
        $doc->name = $request->name;
        if($request->file('dokumen')) {
            $files = time().'.'.$request->dokumen->extension();  
            $request->dokumen->move(public_path('dokumen'), $files);
            $doc->file = '/dokumen/' . $files;
        } 
        $doc->item_id = $item->id; 
        $doc->save();


        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Dokumen ".$doc->name;
        $audit->save();

        Alert::success('Kemaskini Dokumen Berjaya.', 'Dokumen telah berjaya dikemaskini.');

        return redirect('/home/item/'.$item->id.'/doc');
    }

    public function doc_delete(Request $request)
    {
        $item = Item::find($request->itemId);

        $doc = Doc::find($request->docId);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Dokumen ".$doc->name;
        $audit->save();

        $doc->delete();

        Alert::success('Padam Dokumen Berjaya.', 'Dokumen telah berjaya dipadam.');

        return redirect('/home/item/'.$item->id.'/doc');
    }

    public function documentAdd(Request $request)
    {
        $request->validate([
            'file' => 'max:10000',
        ]);

        $doc = new document;
        $doc->name = $request->name;
        if($request->file('dokumen')) {
            $files = time().'.'.$request->dokumen->extension();  
            $request->dokumen->move(public_path('dokumen'), $files);
            $doc->dokumen = '/dokumen/' . $files;
        }  
        $doc->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Dokumen ".$doc->title;
        $audit->save();

        Alert::success('Cipta Dokumen Berjaya.', 'Dokumen telah berjaya dicipta.');

        return redirect('/home');
    }

    public function documentUpdate(Request $request)
    {
        $doc = document::find($request->docId);
        $doc->name = $request->name;
        if($request->file()) {
            $files = time().'.'.$request->dokumen->extension();  
            $request->dokumen->move(public_path('dokumen'), $files);
            $doc->dokumen = '/dokumen/' . $files;
        }
        $doc->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Dokumen ".$doc->title;
        $audit->save();

        Alert::success('Kemaskini Dokumen Berjaya.', 'Dokumen telah berjaya dikemaskini.');

        return redirect('/home');
    }

    public function documentDelete(Request $request)
    {
        $IdDoc = $request->docId;
        $doc = document::find($IdDoc);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Dokumen ".$doc->title;
        $audit->save();

        $doc->delete();

        Alert::success('Padam Dokumen Berjaya.', 'Dokumen berjaya dipadam.');

        return redirect('/home');
    }

    public function event_add(Request $request)
    {
        $event = new Calendar_event;
        $event->name = $request->name;
        $event->event_date = $request->event_date;
        $event->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Cipta Event ".$event->name;
        $audit->save();

        Alert::success('Cipta Event Berjaya.', 'Evenet telah berjaya dicipta.');

        return redirect('/setting');
    }

    public function event_update(Request $request)
    {
        $event = Calendar_event::find($request->eventID);
        $event->name = $request->name;
        $event->event_date = $request->event_date;
        $event->save();

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Kemaskini Event ".$event->name;
        $audit->save();

        Alert::success('Kemaskini Event Berjaya.', 'Event telah berjaya dikemaskini.');

        return redirect('/setting');
    }

    public function event_delete(Request $request)
    {
        $event = Calendar_event::find($request->eventID);

        $audit = new Audit;
        $audit->user_id = Auth::user()->id;
        $audit->action = "Padam Event ".$event->name;
        $audit->save();

        $event->delete();

        Alert::success('Padam Event Berjaya.', 'Event berjaya dipadam.');

        return redirect('/setting');
    }
}
