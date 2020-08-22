<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sliders-create')->only(['create', 'store']);
        $this->middleware('permission:sliders-read')->only(['index', 'show']);
        $this->middleware('permission:sliders-update')->only(['edit', 'update']);
        $this->middleware('permission:sliders-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $sliders = Slider::all();
        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * slider a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'title_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        

        $slider = Slider::create($request->except(['image']));

        for($i = 0; $i < count(config('translatable.locales')); $i++) {

            $locale = config('translatable.locales')[$i];
            $slider_title = "title_" . $locale;
            $slider->setTranslation('title', $locale, $request->$slider_title);
            
            $slider_description = "description_" . $locale;
            $slider->setTranslation('description', $locale, $request->$slider_description);
        }
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/sliders'), $imageName);
        $slider->image = $imageName;
        
        if(!$request->viewable) {
            $slider->update(['viewable' => $slider->id]);
        }

        $slider->save();

        if($request->next == 'back'){
            return redirect()->route('sliders.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('sliders.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Slider $slider)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $slider->viewhome = !$slider->viewhome;
            }else{
                $slider->viewable = !$slider->viewable;
            }
            $slider->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('sliders.show', $slider->id);
        }
        return view('dashboard/sliders/show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('dashboard/sliders/edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            // 'title_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $slider->update($request->except(['image']));
        if($request->image){
            if(file_exists(public_path('images/sliders' . DIRECTORY_SEPARATOR . $slider->image))) unlink(public_path('images/sliders' . DIRECTORY_SEPARATOR . $slider->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/sliders'), $imageName);
            $slider->image = $imageName;
        }

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $slider_title = "title_" . $locale;
            $slider->setTranslation('title', $locale, $request->$slider_title);
            
            $slider_description = "description_" . $locale;
            $slider->setTranslation('description', $locale, $request->$slider_description);
        }

        if(!$request->viewable) {
            $slider->update(['viewable' => $slider->id]);
        }
        
        $slider->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('sliders.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(file_exists(public_path('images/sliders' . DIRECTORY_SEPARATOR . $slider->image))) unlink(public_path('images/sliders' . DIRECTORY_SEPARATOR . $slider->image));
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', __('global.delete_success'));
    }
}
