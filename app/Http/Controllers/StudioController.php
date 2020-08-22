<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Studio;

class StudioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:studio-create')->only(['create', 'store']);
        $this->middleware('permission:studio-read')->only(['index', 'show']);
        $this->middleware('permission:studio-update')->only(['edit', 'update']);
        $this->middleware('permission:studio-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $photos = Studio::all();
        return view('dashboard.studios.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.studios.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/photos'), $imageName);
        

        Studio::create([
            'image' => $imageName
        ]);
    

        if($request->next == 'back'){
            return redirect()->route('studios.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('studios.index')->with('success', __('global.create_success'));
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Studio  $slider
     * @return \Illuminate\Http\Studio
     */
    public function edit($id)
    {
        $photo = Studio::find($id);
        return view('dashboard.studios.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $photo = Studio::find($id);

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/photos'), $imageName);
        

        $photo->update([
            'image' => $imageName
        ]);
    

        if($request->next == 'back'){
            return redirect()->route('studios.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('studios.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studio = Studio::find($id);
        if($studio) {
            if(file_exists(public_path('images/photos' . DIRECTORY_SEPARATOR . $studio->image))) unlink(public_path('images/photos' . DIRECTORY_SEPARATOR . $studio->image));
            $studio->delete();
            return redirect()->route('studios.index')->with('success', __('global.delete_success'));
        }else {
            return back();
        }
    }
}
