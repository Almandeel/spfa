@extends('layouts.site.master')

@section('title')
  {{ $setting->site_name }}
@endsection

@section('content')
    {{--  slider  --}}
    <section class="story section--slider-thingy">
        <div class="flexslider">
          <ul class="slides">
            @foreach ($sliders as $slider)
                <li class="slide-1">
                    <div class="slide-image">
                        <img src="{{ asset('images/sliders/' . $slider->image) }}">
                    </div>
                </li>
            @endforeach
          </ul>
        </div>
      </section>
    {{-- /sliber --}}

    {{-- about --}}
    <div class="wow slideInUp about text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 about-item">
                    <i class="fa fa-star "></i>
                    <h2>@lang('global.about1')</h2>
                </div>
                <div class="col-md-4 about-item">
                    <i class="fa fa-telegram"></i>
                    <h2>@lang('global.about2')</h2>
                </div>
                <div class="col-md-4 about-item">
                    <i class="fa fa-graduation-cap"></i>
                    <h2>@lang('global.about3')</h2>
                </div>
            </div>
        </div>
    </div>
    {{-- /about --}}

    <!-- courses -->
    <div class="wow slideInUp courses">
        <h2 class="text-center section-title">@lang('global.courses')</h2>
        <div class="owl-carousel  owl-theme">
            @foreach ($courses as $course)
                <div class="item" style="width:300px" >
                    <div class="course">
                        <div style="max-height:201px;overflow:hidden" class="course-image">
                            <img src="{{ asset('images/courses/' . $course->intro) }}" alt="">
                            <p class="price">{{ $course->price == 0 ? __('global.free') : $course->price }} @if($course->price) @lang('global.sdg') @endif</p>
                        </div>
                        <div class="course-description">
                            <h3><a href="{{ route('detiles', $course->id) }}">{{ $course->name }}</a></h3>
                            <p>{!! str_limit($course->description, 20) !!}</p>
                            <hr>
                            <div class="teacher">
                                <div class="row">
                                    <div class="col-md-3">
                                        {{-- {{ asset('images/users/' . $course->user->image) }} --}}
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
        </div>
    </div>
    <!-- /courses -->

    {{-- Blog --}}
    <div class="wow slideInUp blog text-center">
        <div class="container">
            <h2 class="section-title">@lang('global.last_post')</h2>
            <div class="row">
                @foreach ($news as $item)
                    <div class="col-md-4">
                        <div class="news">
                            <div class="blog-image">
                                <a href="{{ url('post/' . $item->id) }}" style="background-image: url('{{ asset('images/news/' . $item->image) }}');">
                                    <div class="date">
                                        <p>{{ \Carbon::parse($item->created_at)->formatLocalized('%Y %b %d') }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="blog-text">
                                <h3 style="margin-bottom:20px"><a href="{{ url('post/' . $item->id) }}">{{ $item->name }}</a></h3>
                                <p>{!! str_limit($item->description,25) !!}</p>
                                <a href="{{ url('post/' . $item->id) }}"><button class="btn btn-success" style="margin-top: 25px;">@lang('global.more')</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- /Blog --}}
@endsection