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
                {{ $news->links() }}

            </div>
            <div class="col-md-4">
                @include('partials._aside')
            </div>
        </div>
    </div>
@endsection