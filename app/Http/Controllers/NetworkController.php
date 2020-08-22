<?php

namespace App\Http\Controllers;

use App\Network;
use App\Unit;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NetworkController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:networks-create')->only(['create', 'store']);
        $this->middleware('permission:networks-read')->only(['index', 'show']);
        $this->middleware('permission:networks-update')->only(['edit', 'update']);
        $this->middleware('permission:networks-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $networks = Network::all();
        if($request->column){
            $network = Network::find($request->id);
            if($request->column == 'viewhome'){
                $network->viewhome = !$network->viewhome;
            }else{
                $network->viewable = !$network->viewable;
            }
            $network->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('networks.index');
        }

        return view('dashboard/networks/index', compact('networks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Network::TYPES;
        return view('dashboard/networks/create', compact('types'));
    }

    /**
     * network a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'value_' . app()->getLocale() => 'required',
        ]);
        

        $network = Network::create($request->all());
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $network_value = "value_" . $locale;
            $network->setTranslation('value', $locale, $request->$network_value);
            
        }
        
        
        $network->save();
        if($request->next == 'back'){
            return redirect()->route('networks.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('networks.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Network $network)
    {
        if($request->column){
            if($request->column == 'viewhome'){
                $network->viewhome = !$network->viewhome;
            }else{
                $network->viewable = !$network->viewable;
            }
            $network->save();
            session()->flash('success', _('global.operation_success'));
            return redirect()->route('networks.show', $network->id);
        }
        $types = Network::TYPES;
        return view('dashboard/networks/show', compact('network', 'types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function edit(Network $network)
    {
        $types = Network::TYPES;
        return view('dashboard/networks/edit', compact('network', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Network $network)
    {
        $request->validate([
            'value_' . app()->getLocale() => 'required',
        ]);

        $network->update($request->all());

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $network_value = "value_" . $locale;
            $network->setTranslation('value', $locale, $request->$network_value);
            
        }
        
        $network->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('networks.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Network  $network
     * @return \Illuminate\Http\Response
     */
    public function destroy(Network $network)
    {
        $network->delete();

        return redirect()->route('networks.index')->with('success', __('global.delete_success'));
    }
}
