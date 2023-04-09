<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Slider;
use App\Models\cards;
use App\Models\document;
use App\Models\Article;
use App\Models\Gallery;
use App\Models\Picture;
use App\Models\Page;
use App\Models\Item;
use App\Models\Modul;
use App\Models\User;
use App\Models\Proses;
use App\Models\Borang;
use App\Models\Audit;
use App\Models\dropdown;
use App\Models\Jawapan;
use App\Mail\contactUs;
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
        
        $totalDana = Count(Jawapan::whereRelation('kelulusanBorang', 'keputusan', '=', 'Lulus')->get());
        $totalModul = Count(Modul::where('status', 'Go-live')->get());
        $totalPeneroka = Count(User::whereRelation('kategori', 'nama', '=', 'Peserta')->get());

        return view('home', compact ('totalDana','totalModul', 'totalPeneroka', 'sliders', 'cardsTotalRows', 'cards', 'faqs'));
    }
    public function statementList()
    {
        $stats = statement::orderBy('updated_at', 'DESC')->get();

        return view('penyataan', compact ('stats'));
    }

    public function documentList()
    {
        $docs = document::orderBy('updated_at', 'DESC')->get();

        return view('downloadDoc', compact ('docs'));
    }

    public function page_list()
    {
        $pages = Page::orderBy('sequence', 'ASC')->get();
        $docs = document::orderBy('updated_at', 'DESC')->get();

        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.page', compact ('docs','pages', 'menuModul', 'menuProses', 'menuBorang'));
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
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.pageItem', compact ('page','pageItems', 'menuModul', 'menuProses', 'menuBorang'));
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
        }
    }

    public function slider_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $sliders = Slider::where('item_id', $itemId)->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.slider', compact ('sliders','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function card_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $cards = cards::where('item_id', $itemId)->orderBy('rows', 'ASC')->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.card', compact ('cards','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function dropdown_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $dropdowns = dropdown::where('item_id', $itemId)->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.dropdown', compact ('dropdowns','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function article_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $articles = article::where('item_id', $itemId)->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.article', compact ('articles','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function gallery_list(Request $request)
    {
        $itemId = (int) $request->route('itemId');

        $item = Item::find($itemId);

        $galleries = Gallery::where('item_id', $itemId)->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.gallery', compact ('galleries','item', 'menuModul', 'menuProses', 'menuBorang'));
    }

    public function homeSetting()
    {
        $sliders = Slider::all();
        $cards = cards::orderBy('rows', 'ASC')->get();
        $faqs = Faq::orderBy('updated_at', 'DESC')->get();
        $docs = document::orderBy('updated_at', 'DESC')->get();
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.homeEdit', compact ('docs','sliders', 'cards', 'faqs', 'stats' ,'menuModul', 'menuProses', 'menuBorang'));
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

        $article = new article;
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

        $article = article::find($request->articleId);
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
        
        $menuModul = Modul::where('status', 'Go-live')->get();
        $menuProses = Proses::where('status', 1)->orderBy("sequence", "ASC")->get();
        $menuBorang = Borang::where('status', 1)->get();

        return view('homepage.picture', compact ('pictures','gallery', 'item' ,'menuModul', 'menuProses', 'menuBorang'));
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
}
