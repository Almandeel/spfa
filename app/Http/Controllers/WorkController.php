<?php

namespace App\Http\Controllers;

use App\Work;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:works-create')->only(['create', 'store']);
        $this->middleware('permission:works-read')->only(['index', 'show']);
        $this->middleware('permission:works-update')->only(['edit', 'update']);
        $this->middleware('permission:works-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $works = Work::all();
        if($request->column){
            $work = Work::find($request->id);
            if($request->column == 'viewhome'){
                $work->viewhome = !$work->viewhome;
            }else{
                $work->viewable = !$work->viewable;
            }
            $work->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('works.index');
        }

        return view('dashboard/works/index', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.works.create', compact('categories'));
    }

    /**
     * work a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required | regex:[\^{Arabic}]',
            // 'description_' . app()->getLocale() => 'regex:/^[A-Za-z-0-9]+$/',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        $work = Work::create($request->except(['image']));
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $work_name = "name_" . $locale;
            $work->setTranslation('name', $locale, $request->$work_name);
            
            $work_description = "description_" . $locale;
            $work->setTranslation('description', $locale, $request->$work_description);
        }
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/works'), $imageName);
        $work->image = $imageName;
        
        $work->save();
        if($request->next == 'back'){
            return redirect()->route('works.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('works.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Work $work)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $work->viewhome = !$work->viewhome;
            }else{
                $work->viewable = !$work->viewable;
            }
            $work->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('works.show', $work->id);
        }
        return view('dashboard/works/show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        $categories = Category::all();
        return view('dashboard.works.edit', compact('work', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $work->update($request->except(['image']));
        if($request->image){
            if(file_exists(public_path('images/works' . DIRECTORY_SEPARATOR . $work->image))) unlink(public_path('images/works' . DIRECTORY_SEPARATOR . $work->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/works'), $imageName);
            $work->image = $imageName;
        }

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $work_name = "name_" . $locale;
            $work->setTranslation('name', $locale, $request->$work_name);
            
            $work_description = "description_" . $locale;
            $work->setTranslation('description', $locale, $request->$work_description);
        }
        
        $work->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('works.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        if(file_exists(public_path('images/works' . DIRECTORY_SEPARATOR . $work->image))) unlink(public_path('images/works' . DIRECTORY_SEPARATOR . $work->image));
        $work->delete();

        return redirect()->route('works.index')->with('success', __('global.delete_success'));
    }
}
