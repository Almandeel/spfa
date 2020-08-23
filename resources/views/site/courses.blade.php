@extends('layouts.site.master')

@section('title')
{{ $setting->site_name }} | @lang('menu.courses')
@endsection

@section('content')
    <div class="container">

        <div class="col-md-8">
            <div class="courses">

                @foreach ($courses as $course)
                    <div class="wow slideInUp">
                        <div class="course" style="margin-bottom:30px;">
                            <div class="course-image" style="background-image:url(); background-size:cover">
                                <img style="width:100%; height:400px;" src="{{ asset('images/courses/' . $course->intro) }}" alt="" srcset="">    
                                {{-- <p class="price">{{ $course->price }} @lang('global.sdg')</p> --}}
                            </div>
                            <div class="course-description">
                                <h3><a href="{{ route('detiles', $course->id) }}">{{ $course->name }}</a></h3>
                                <p>
                                    {!! str_limit($course->description, 21) !!}
                                </p>
                                <hr>
                                <div class="teacher">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img style="width:100%" src="{{ asset('images/teachers/' . $course->teacher->image) }}" alt="teacher"/>
                                        </div>
                                        <div class="col-md-9">
                                            <p>@lang('global.teacher') :</p>
                                            <h4>{{ $course->teacher->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $courses->links() }}
            </div>
        </div>

        <div class="col-md-4">
            @include('partials._aside')
        </div>
    </div>
@endsection