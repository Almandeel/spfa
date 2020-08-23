<?php

namespace App\Http\Controllers;

use App\News;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:news-create')->only(['create', 'store']);
        $this->middleware('permission:news-read')->only(['index', 'show']);
        $this->middleware('permission:news-update')->only(['edit', 'update']);
        $this->middleware('permission:news-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $news = News::all();
        return view('dashboard.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.news.create', compact('categories'));
    }

    /**
     * news a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('news.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, News $news)
    {
        return view('dashboard.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        return view('dashboard.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $news->update($request->except(['image']));
        if($request->image){
            if(file_exists(public_path('images/news' . DIRECTORY_SEPARATOR . $news->image)))  unlink(public_path('images/news' . DIRECTORY_SEPARATOR . $news->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/news'), $imageName);
            $news->image = $imageName;
        }

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $news_name = "name_" . $locale;
            $news->setTranslation('name', $locale, $request->$news_name);
            
            $news_description = "description_" . $locale;
            $news->setTranslation('description', $locale, $request->$news_description);
        }
        
        $news->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('news.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if(file_exists(public_path('images/news' . DIRECTORY_SEPARATOR . $news->image)))  unlink(public_path('images/news' . DIRECTORY_SEPARATOR . $news->image));
        $news->delete();

        return redirect()->route('news.index')->with('success', __('global.delete_success'));
    }
}
