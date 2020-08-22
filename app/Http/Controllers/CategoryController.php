<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories-create')->only(['create', 'store']);
        $this->middleware('permission:categories-read')->only(['index', 'show']);
        $this->middleware('permission:categories-update')->only(['edit', 'update']);
        $this->middleware('permission:categories-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * category a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name_' . app()->getLocale() => 'required',
        ]);
        
        $category = Category::create($request->all());

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            $locale = config('translatable.locales')[$i];
            $category_name = "name_" . $locale;
            $category->setTranslation('name', $locale, $request->$category_name);
        }
        
        $category->save();

        if($request->next == 'back'){
            return redirect()->route('categories.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('categories.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //return view('dashboard/categories/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_' . app()->getLocale() => 'required',
        ]);

        $category->update($request->all());
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $category_name = "name_" . $locale;
            $category->setTranslation('name', $locale, $request->$category_name);
            
        }
        
        $category->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('categories.index')->with('success', __('global.update_success'));
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        foreach ($category->news as $news) {
            if(file_exists(public_path('images/news' . DIRECTORY_SEPARATOR . $news->image)))  unlink(public_path('images/news' . DIRECTORY_SEPARATOR . $news->image));
            $news->delete();
        }
        $category->delete();
        return redirect()->route('categories.index')->with('success', __('global.delete_success'));
    }
}
