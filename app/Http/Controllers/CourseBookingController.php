<?php

namespace App\Http\Controllers;

use App\Course;
use App\course_booking;
use Illuminate\Http\Request;

class CourseBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'phone'     => 'required | string | max:20',
            'goal'      => 'string',
            'course_id' => 'required',
        ]);

        $student_data = $request->all();
        $student_data['user_id'] = auth()->user()->id;
        $course = Course::find($request->course_id);

        $course_booking = course_booking::where('course_id', $request->course_id)->get();

        if(count($course_booking->whereIn('user_id', auth()->user()->id)) == 0) {
            if($course->max_student > count($course_booking) || $course->max_student == null ) {
                course_booking::create($student_data);
                return redirect()->back()->with('success', __('global.create_success'));
            }else {
                return redirect()->back()->with('error', __('courses.course_full'));
            }
        }else {
            return redirect()->back()->with('error', __('courses.booking_done'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\course_booking  $course_booking
     * @return \Illuminate\Http\Response
     */
    public function show(course_booking $course_booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\course_booking  $course_booking
     * @return \Illuminate\Http\Response
     */
    public function edit(course_booking $course_booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\course_booking  $course_booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course_booking $course_booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\course_booking  $course_booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(course_booking $course_booking)
    {
        //
    }
}
