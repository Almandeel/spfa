@extends('layouts.site.master')

@section('title')
{{ $setting->site_name }} | @lang('menu.blog')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach ($news as $post)
                    <div class="news-list wow slideInUp">
                        <div class="news-image">
                            <img width="960" height="400" style="width:100%" src="{{ asset('images/news/' . $post->image) }}" alt="news1">
                        </div>
                        <div class="news-description">
                            <h2><a href="{{ url('post/' . $post->id) }}">{{ $post->name }}</a></h2>
                            <div class="news-data">
                                <span>
                                    <i class="fa fa-calendar"></i> {{ \Carbon::parse($post->created_at)->formatLocalized('%Y %b %d') }}
                                </span>
                                <span>
                                    <i class="fa fa-user"></i> {{ $post->author->username }}
                                </span>
                            </div>
                            <p>{!! str_limit($post->description, 150) !!}</p>
                            <a href="{{ url('post/' . $post->id) }}">@lang('global.more')</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4">
                <aside>
                    <div class="asite-item">
                        <div class="category">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fill">
                                        <h4>@lang('global.last_post')</h4>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
    
                                </div>
                            </div>
                        </div>
                        <div class="category_list">
                            @foreach ($lastnews as $last)
                                <p><a href="{{ url('post/' . $last->id) }}"><i class="fa fa-angle-double-right"></i> {{ $last->name }}</a></p>
                            @endforeach
                        </div>
                    </div>
    
    
                    <div class="category">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fill">
                                    <h4>@lang('global.category')</h4>
                                </div>
                            </div>
    
                            <div class="col-md-6">
    
                            </div>
                        </div>
                    </div>
    
                    <div class="category_list">
                        <p><a href="{{ url('blog') }}"> <i class="fa fa-angle-double-right"></i> @lang('categories.all')</a></p>
                        @foreach ($categories as $category)
                            <p><a href="{{ url('news/category/' . $category->name ) }}"><i class="fa fa-angle-double-right"></i> {{ $category->name }}</a></p>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection