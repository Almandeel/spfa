@extends('layouts.site.master')

@section('title')
{{ $post->name }} | {{ $setting->site_name }}
@endsection


@push('css')
    <style>
        .comments .title {
            margin-bottom:20px;
        }

        .comments .user-name {
            margin-bottom:10px;
            display: inline-block
        }

        .comments p.comment {
            padding: 7px 10px 20px;
        }

        .comments h4::after {
            content: '';
            width: 2%;
            height: 3px;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="news-list">
                <div class="news-image">
                    <img style="width:100%" src="{{ asset('images/news/' . $post->image) }}" alt="news1">
                </div>
                <div class="news-description news">
                    <h2>
                        {{ $post->name }}
                        @if($post->author_id == auth()->user()->id || auth()->user()->hasPermission('news-update'))
                            <div class="pull-left">
                                <a href="{{ route('edit.news', $post->id) }}" class="btn btn-warning btn-xs button"><i class="fa fa-edit"></i> @lang('global.edit')</a>
                            </div>
                        @endif
                    </h2>
                    <div class="news-data">
                        <span>
                            <i class="fa fa-calendar"></i> {{ \Carbon::parse($post->created_at)->formatLocalized('%Y %b %d') }}
                        </span>
                        <span>
                            <i class="fa fa-user"></i> {{ $post->author->username }}
                        </span>
                    </div>
                    <p>
                        {!! $post->description !!}
                    </p>
                    <hr/>
                    <p> @lang('global.share') :
                        {!! 
                            Share::page(url('post/' . $post->id), $post->name)
                                ->facebook()
                                ->twitter()
                                ->whatsapp();
                        !!}
                    </p>
                </div>
            </div>
            <comment-component post_id="{{ $post->id }}" user_id="{{ auth()->user()->id }}"></comment-component>
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
@endsection

@push('js')
    <script src="{{ asset('js/share.js') }}"></script>  
    <script src="{{ asset('js/app.js') }}"></script>
@endpush