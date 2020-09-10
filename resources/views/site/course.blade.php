@extends('layouts.site.master')

@section('title')
    {{ $course->name }} | {{ $setting->site_name }}
@endsection

@section('css')
    <style>
        
    </style>
@endsection

@section('content')
    <div class="container">

        <div class="col-md-8">
            <div class="news-list">
                <div class="news-image">
                    <img style="width:100%" src="{{ asset('images/courses/' . $course->intro) }}" alt="{{ $course->name }}">
                </div>
                <div class="news-description news">
                    <p style="margin-top:20px">
                       {!! $course->description !!}
                    </p>
                </div>
            </div>
        </div>

        @guest

        @else 
        <div class="col-md-4">
            <aside>
                <div class="course-details">
                    <div class="item">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="key">@lang('global.course')</p>
                            </div>
                            <div class="col-md-8">
                                <p class="value text-center">{{ $course->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="key">@lang('global.teacher')</p>
                            </div>
                            <div class="col-md-8">
                                <p class="value text-center">{{ $course->teacher->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="key">@lang('global.date')</p>
                            </div>
                            <div class="col-md-8">
                                <p dir="ltr" class="value text-center">{{ $course->from_date . ' To ' . $course->to_date }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="key">@lang('global.time')</p>
                            </div>
                            <div class="col-md-8">
                                <p dir="ltr" class="value text-center">{{ $course->time }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-md-4">
                                <p class="key">@lang('global.price')</p>
                            </div>
                            <div class="col-md-8">
                                @guest
                                    <p class="value text-center">{{ $course->price == 0 ? __('global.free') : $course->price }} @if($course->price) @lang('global.sdg') @endif</p>
                                @else
                                    @if(auth()->user()->adjective)
                                        <p class="value text-center">{{ $course->price == 0 ? __('global.free') : ($course->price - $course->discount) }} @if($course->price) @lang('global.sdg') @endif</p>
                                    @else 
                                        <p class="value text-center">{{ $course->price == 0 ? __('global.free') : $course->price }} @if($course->price) @lang('global.sdg') @endif</p>
                                    @endif 
                                @endguest
                                
                            </div>
                        </div>
                    </div>
                    <button style="margin-top:30px"  type="button" class="btn btn-success center-block" data-toggle="modal" data-target="#course">@lang('global.enroll_course')</button>
                </div>
            </aside>
        </div>

        {{-- Modal --}}
        <div class="modal fade" id="course" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ url('course/booking') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">@lang('global.data')</h4>
                        </div>
                        <div class="modal-body">
                                {{-- <div class="form-group">
                                    <label for="name">@lang('global.fullname')</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="@lang('global.fullname')"/>
                                </div>
                                <div class="form-group">
                                    <label for="gender">@lang('global.gender')</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="">@lang('global.gender')</option>
                                        <option value="male">@lang('global.male')</option>
                                        <option value="female">@lang('global.female')</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="degree">@lang('global.degree')</label>
                                    <select name="degree" id="degree" class="form-control">
                                        <option value="">@lang('global.degree')</option>
                                        <option value="undergraduate">@lang('global.undergraduate')</option>
                                        <option value="postgraduate">@lang('global.postgraduate')</option>
                                        <option value="phd">@lang('global.phd')</option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="phone">@lang('global.phone')</label>
                                    <input type="number" name="phone" id="phone" class="form-control" placeholder="@lang('global.phone')"/>
                                </div>
                                <div class="form-group">
                                    <label for="goal">@lang('global.goal')</label>
                                    <textarea style="resize: none;" name="goal" id="goal" cols="5" rows="5" class="form-control" placeholder="@lang('global.goal')"></textarea>
                                </div>
                                @guest

                                @else
                                    @if(auth()->user()->adjective)
                                        <input type="hidden" name="price" class="form-control" value="{{ $course->price == 0 ? 0 : ($course->price - $course->discount) }} "/>
                                    @else 
                                        <input type="hidden" name="price" class="form-control" value="{{ $course->price == 0 ? 0 : $course->price }} "/>
                                    @endif 
                                @endguest
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('global.close')</button>
                            <button type="submit" class="btn btn-success">@lang('global.send')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /Modal --}}
        @endguest
    </div>





@endsection

@push('js')
    <script src="{{ asset('js/countrySelect.min.js') }}"></script>
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>
    <script>
        $("#country").countrySelect();
    </script>


@if (session('success'))
<script>
    new Noty({
        type: 'success',
        layout: 'topRight',
        text: "@lang(session('success'))",
        timeout: 2000,
        killer: true
    }).show();
</script>
@endif

@if (session('error'))
<script>
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: "@lang(session('error'))",
        timeout: 2000,
        killer: true
    }).show();
</script>
@endif
@endpush