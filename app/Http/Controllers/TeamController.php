<?php

namespace App\Http\Controllers;

use App\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     **/
    public function index(Request $request)
    {
        $teams = Team::all();
        return view('dashboard.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teams.create');
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
        

        $team = Team::create($request->except(['image']));
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $team_name = "name_" . $locale;
            $team->setTranslation('name', $locale, $request->$team_name);
            
            $team_job = "job_" . $locale;
            $team->setTranslation('job', $locale, $request->$team_job);
        }
        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/teams'), $imageName);
        $team->image = $imageName;
        
        $team->save();
        if($request->next == 'back'){
            return redirect()->route('teams.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('teams.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Work  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Team $team)
    {
        return view('dashboard.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Work  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('dashboard.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Work  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            // 'name_' . app()->getLocale() => 'required|regex:/^[\p{L} ]+$/u',
            // 'description_' . app()->getLocale() => 'regex:/^[\p{L} ]+$/u',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $team->update($request->except(['image']));
        if($request->image){
            if(file_exists(public_path('images/teams' . DIRECTORY_SEPARATOR . $team->image))) unlink(public_path('images/teams' . DIRECTORY_SEPARATOR . $team->image));
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/teams'), $imageName);
            $team->image = $imageName;
        }

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $team_name = "name_" . $locale;
            $team->setTranslation('name', $locale, $request->$team_name);
            
            $team_job = "job_" . $locale;
            $team->setTranslation('job', $locale, $request->$team_job);
        }
        
        $team->save();

        if($request->next == 'back'){
            return back()->with('success', __('global.update_success'));
        }else{
            return redirect()->route('teams.index')->with('success', __('global.update_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if(file_exists(public_path('images/teams' . DIRECTORY_SEPARATOR . $team->image))) unlink(public_path('images/teams' . DIRECTORY_SEPARATOR . $team->image));
        $team->delete();

        return redirect()->route('teams.index')->with('success', __('global.delete_success'));
    }
}
