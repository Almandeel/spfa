<?php

namespace App\Http\Controllers;

use App\Page;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:pages-create')->only(['create', 'store']);
        $this->middleware('permission:pages-read')->only(['index', 'show']);
        $this->middleware('permission:pages-update')->only(['edit', 'update']);
        $this->middleware('permission:pages-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $pages = Page::all();
        return view('dashboard.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('dashboard/pages/create');
    }

    /**
     * page a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
        //     'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        

        // $page = Page::create($request->except(['image']));
        // for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
        //     $locale = config('translatable.locales')[$i];
        //     $page_title = "title_" . $locale;
        //     $page->setTranslation('title', $locale, $request->$page_title);
            
        //     $page_description = "description_" . $locale;
        //     $page->setTranslation('description', $locale, $request->$page_description);
        // }
        
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images/pages'), $imageName);
        // $page->image = $imageName;

        if(!$request->page_order) {
            $page->update([
                'page_order' => $page->id
            ]);
        }
        
        // $page->save();
        // if($request->next == 'back'){
        //     return redirect()->route('pages.create')->with('success', __('global.create_success'));
        // }else{
        //     return redirect()->route('pages.index')->with('success', __('global.create_success'));
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $page->viewhome = !$page->viewhome;
            }else{
                $page->viewable = !$page->viewable;
            }
            $page->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('pages.show', $page->id);
        }
        return view('dashboard/pages/show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('dashboard.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $page->update($request->except(['image']));
        if($request->image){
            if(file_exists(public_path('images/pages' . DIRECTORY_SEPARATOR . $page->image))) unlink(public_path('images/pages' . DIRECTORY_SEPARATOR . $page->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/pages'), $imageName);
            $page->image = $imageName;
        }

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $page_title = "title_" . $locale;
            $page->setTranslation('title', $locale, $request->$page_title);
            
            $page_description = "description_" . $locale;
            $page->setTranslation('description', $locale, $request->$page_description);
        }

        
        if(!$request->page_order) {
            $page->update([
                'page_order' => $page->id
            ]);
        }
        
        $page->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('pages.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        // if(file_exists(public_path('images/pages' . DIRECTORY_SEPARATOR . $page->image))) unlink(public_path('images/pages' . DIRECTORY_SEPARATOR . $page->image));
        // $page->delete();

        // return redirect()->route('pages.index')->with('success', __('global.delete_success'));
    }
}
