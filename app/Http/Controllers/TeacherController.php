<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:teachers-create')->only(['create', 'store']);
        $this->middleware('permission:teachers-read')->only(['index', 'show']);
        $this->middleware('permission:teachers-update')->only(['edit', 'update']);
        $this->middleware('permission:teachers-delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('dashboard.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());   
        $request->validate([
            'name_' . app()->getLocale() => 'required',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/teachers'), $imageName);
        
        $teacher = Teacher::create([
            'image' => $imageName
        ]);

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            $locale = config('translatable.locales')[$i];

            $teacher_name = "name_" . $locale;
            $teacher->setTranslation('name', $locale, $request->$teacher_name);

            $teacher_description = "description_" . $locale;
            $teacher->setTranslation('description', $locale, $request->$teacher_description);
        }


        $teacher->save();

        if($request->next == 'back'){
            return redirect()->route('teachers.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('teachers.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('dashboard.teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('dashboard.teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {

        $request->validate([
            'name_' . app()->getLocale() => 'required',
        ]);
        
        $teacher->update($request->except('image'));

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            $locale = config('translatable.locales')[$i];

            $teacher_name = "name_" . $locale;
            $teacher->setTranslation('name', $locale, $request->$teacher_name);

            $teacher_description = "description_" . $locale;
            $teacher->setTranslation('description', $locale, $request->$teacher_description);
        }

        if($request->image) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/teachers'), $imageName);
    
            $teacher->update([
                'image' => $imageName
            ]);
        }

        $teacher->save();

        if($request->next == 'back'){
            return redirect()->route('teachers.show', $teacher->id)->with('success', __('global.create_success'));
        }else{
            return redirect()->route('teachers.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
