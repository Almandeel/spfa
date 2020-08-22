<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

use App\Teacher;

use App\course_booking;

use App\Setting;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:courses-create')->only(['create', 'store']);
        $this->middleware('permission:courses-read')->only(['index', 'show']);
        $this->middleware('permission:courses-update')->only(['edit', 'update']);
        $this->middleware('permission:courses-delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('dashboard.courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name_' . app()->getlocale() => 'required',
            'description_' . app()->getlocale() => 'required',
            'intro' => 'required',
        ]);

        $request_data = $request->except('intro');

        $course = Course::create($request_data);
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $course_name = "name_" . $locale;
            $course->setTranslation('name', $locale, $request->$course_name);

            $course_description = "description_" . $locale;
            $course->setTranslation('description', $locale, $request->$course_description);
            
        }

        $imageName = time().'.'.$request->intro->getClientOriginalExtension();
        $request->intro->move(public_path('images/courses'), $imageName);
        $course->intro = $imageName;
        $course->save();

        if($request->next == 'back'){
            return redirect()->route('courses.create')->with('success', __('global.create_success'));
        }else{
            return redirect()->route('courses.index')->with('success', __('global.create_success'));
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('dashboard.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $teachers = Teacher::all();
        return view('dashboard.courses.edit', compact('course', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        request()->validate([
            'name_' . app()->getlocale() => 'required',
            'description_' . app()->getlocale() => 'required',
        ]);

        $request_data = $request->except('intro');

        $course->update($request_data);
        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            
            $locale = config('translatable.locales')[$i];
            $course_name = "name_" . $locale;
            $course->setTranslation('name', $locale, $request->$course_name);

            $course_description = "description_" . $locale;
            $course->setTranslation('description', $locale, $request->$course_description);
            
        }

        if($request->intro) {
            $imageName = time().'.'.$request->intro->getClientOriginalExtension();
            $request->intro->move(public_path('images/courses'), $imageName);
            $course->intro = $imageName;
        }

        $course->save();

        if($request->next == 'back'){
            return redirect()->route('courses.show', $course->id)->with('success', __('global.create_success'));
        }else{
            return redirect()->route('courses.index')->with('success', __('global.create_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);

        foreach ($course->students as $student) {
            $student->delete();
        }

        if(file_exists(public_path('images/courses' . DIRECTORY_SEPARATOR . $course->intro)))  unlink(public_path('images/courses' . DIRECTORY_SEPARATOR . $course->intro));
        
        $course->delete();
        
        return redirect()->route('courses.index')->with('success', __('global.delete_success'));
    }

    public function course($id) {
        $student = course_booking::find($id);
        if($student) {
            $course = Course::find($student->course_id);
            return view('dashboard.courses.student', compact('student', 'course'));
        }
    }


    public function studentDetiels($id) {
        $setting = Setting::first();
        $course  = Course::find($id);
        $pdf = \PDF::loadView('dashboard/courses/StudentsReport', compact('course', 'setting'));
        return $pdf->stream();
    }
}
