<?php

namespace App\Http\Controllers;
use Mail;
use App\News;
use App\Page;
use App\Team;
use App\User;
use App\Work;
use App\Course;
use App\Slider;
use App\Comment;
use App\Contact;
use App\Network;
use App\Service;
use App\Setting;
use App\Category;
use App\Information;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    
    // public function __construct()
    // {
    //     app()->setLocale('en');
    // }

    public function index() {
        // dd(session()->get('locale'));
        $sliders    = Slider::limit(4)->get();
        $about      = Information::orderBy('created_at', 'DESC')->limit(3)->get();
        $courses    = Course::orderBy('created_at', 'DESC')->limit(4)->get();
        $news       = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting    = Setting::first();
        $contacts   = Network::all();
        return view('site.index', compact('sliders', 'about', 'courses','news', 'setting', 'contacts'));
    }

    public function about() {
        $first      = Information::first();
        $about      = Information::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $news       = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting    = Setting::first();
        $contacts   = Network::all();
        return view('site.about', compact('about', 'setting', 'first', 'categories', 'news', 'contacts'));
    }

    public function courses() {
        $courses    = Course::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $lastnews   = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting    = Setting::first();
        $contacts   = Network::all();
        return view('site.courses', compact('courses', 'setting', 'categories', 'lastnews', 'contacts'));
    }

    public function course($id) {
        $course    = Course::find($id);
        $setting    = Setting::first();
        $contacts   = Network::all();
        return view('site.course', compact('course', 'setting', 'contacts'));
    }

    public function blog() {
        $news       = News::orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $lastnews   = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting    = Setting::first();
        $contacts   = Network::all();
        return view('site.blog', compact('news', 'setting', 'categories', 'lastnews', 'contacts'));
    }

    public function post($id) {
        $post       = News::find($id);
        $categories = Category::all();
        $lastnews   = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting    = Setting::first();
        $contacts   = Network::all();
        $facebook = \Share::page('http://jorenvanhocht.be')->facebook();
        if($post) {
            return view('site.post', compact('post', 'facebook','setting', 'categories', 'lastnews', 'contacts'));
        }else {
            return abort(404);
        }
    }

    public function categoryPost($category) {
        $news       = News::where('category_id', $category)->orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $lastnews   = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting    = Setting::first();
        $contacts   = Network::all();
        return view('site.blog', compact('news', 'setting', 'categories', 'lastnews', 'contacts'));
    }

    public function newsCategory($category) {

    }

    public function contact() {
        $categories     = Category::all();
        $lastnews       = News::orderBy('created_at', 'DESC')->limit(4)->get();
        $setting        = Setting::first();
        $contacts       = Network::all();
        return view('site.contact', compact('categories', 'setting', 'lastnews', 'contacts'));
    }


    public function sendMail(Request $request){
       
        $all = $request->all();
        $setting        = Setting::first();

        Mail::send('site.mail', compact('all'), function ($message) use ($all, $setting) {
            $message
			->from($all['email'])
			->to($setting->site_email)
			->subject($all['subject']);
        });

        session()->flash('success', 'global.success_send');
        return back();
    }


    //Store comments

    public function comment(Request $request) {
        $comment = Comment::create([
            'comment' => $request->comment,
            'news_id' => $request->news_id,
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }


    public function profile() {
        $user           = User::find(auth()->user()->id); 
        $setting        = Setting::first();
        $contacts       = Network::all();
        return view('site.profile', compact('user', 'setting', 'contacts'));
    }

    public function maintenance() {
        $setting = Setting::first();
        $contacts       = Network::all();
        return view('site.maintenance', compact('setting', 'contacts'));
    }





    //Maneg News 

    public function createNews() {
        $setting        = Setting::first();
        $contacts       = Network::all();
        $categories       = Category::all();
        $news       = News::orderBy('created_at', 'DESC')->limit(4)->get();
        return view('site.news.create', compact('setting', 'contacts', 'categories', 'news'));
    }

    public function storeNews(Request $request) {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        $news = News::create($request->except(['image']));
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $news_name = "name_" . $locale;
            $news->setTranslation('name', $locale, $request->$news_name);
            
            $news_description = "description_" . $locale;
            $news->setTranslation('description', $locale, $request->$news_description);
        }
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/news'), $imageName);
        $news->image = $imageName;
        
        $news->save();
    }

}
