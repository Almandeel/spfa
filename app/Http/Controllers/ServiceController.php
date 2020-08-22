<?php

namespace App\Http\Controllers;

use App\Service;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:services-create')->only(['create', 'store']);
        $this->middleware('permission:services-read')->only(['index', 'show']);
        $this->middleware('permission:services-update')->only(['edit', 'update']);
        $this->middleware('permission:services-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $services = Service::all();
        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $icons = config('app.icons');
        return view('dashboard/services/create', compact('icons'));
    }

    /**
     * service a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
        ]);
        

        $service = Service::create($request->all());
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $service_name = "name_" . $locale;
            $service->setTranslation('name', $locale, $request->$service_name);
            
            $service_description = "description_" . $locale;
            $service->setTranslation('description', $locale, $request->$service_description);
        }
        
        
        $service->save();
        if($request->next == 'back'){
            return redirect()->route('services.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('services.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Service $service)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $service->viewhome = !$service->viewhome;
            }else{
                $service->viewable = !$service->viewable;
            }
            $service->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('services.show', $service->id);
        }
        return view('dashboard/services/show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $icons = config('app.icons');
        return view('dashboard/services/edit', compact('service', 'icons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
        ]);

        $service->update($request->all());

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $service_name = "name_" . $locale;
            $service->setTranslation('name', $locale, $request->$service_name);
            
            $service_description = "description_" . $locale;
            $service->setTranslation('description', $locale, $request->$service_description);
        }
        
        $service->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('services.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', __('global.delete_success'));
    }
}
