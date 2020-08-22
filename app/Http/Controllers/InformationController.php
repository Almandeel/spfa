<?php

namespace App\Http\Controllers;

use App\Information;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:informations-create')->only(['create', 'store']);
        $this->middleware('permission:informations-read')->only(['index', 'show']);
        $this->middleware('permission:informations-update')->only(['edit', 'update']);
        $this->middleware('permission:informations-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $informations = Information::all();
        return view('dashboard.informations.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.informations.create');
    }

    /**
     * information a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        $information = Information::create($request->except(['image']));
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $information_title = "title_" . $locale;
            $information->setTranslation('title', $locale, $request->$information_title);
            
            $information_description = "description_" . $locale;
            $information->setTranslation('description', $locale, $request->$information_description);
        }
        
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images/informations'), $imageName);
        // $information->image = $imageName;
        
        $information->save();
        if($request->next == 'back'){
            return redirect()->route('informations.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('informations.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Information $information)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $information->viewhome = !$information->viewhome;
            }else{
                $information->viewable = !$information->viewable;
            }
            $information->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('informations.show', $information->id);
        }
        return view('dashboard.informations.show', compact('information'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information)
    {
        return view('dashboard.informations.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $information->update($request->except(['image']));
        if($request->image){
            if(file_exists(public_path('images/informations' . DIRECTORY_SEPARATOR . $information->image))) unlink(public_path('images/informations' . DIRECTORY_SEPARATOR . $information->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/informations'), $imageName);
            $information->image = $imageName;
        }

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $information_title = "title_" . $locale;
            $information->setTranslation('title', $locale, $request->$information_title);
            
            $information_description = "description_" . $locale;
            $information->setTranslation('description', $locale, $request->$information_description);
        }
        
        $information->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('informations.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information)
    {
        if(file_exists(public_path('images/informations' . DIRECTORY_SEPARATOR . $information->image))) unlink(public_path('images/informations' . DIRECTORY_SEPARATOR . $information->image));
        $information->delete();

        return redirect()->route('informations.index')->with('success', __('global.delete_success'));
    }
}
