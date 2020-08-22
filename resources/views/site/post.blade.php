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
                    <h2>{{ $post->name }}</h2>
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

            <div class="comments">
                <h4 class="title">@lang('global.comments')</h4>
                <div class="comment">
                    <div class="row">
                        <div class="col-md-10">
                            <i class="fa fa-user"></i> <h4 class="user-name">Admin</h4> 
                            <p class="comment">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="sub-comments">
                        <div class="row">
                            <div class="col-md-10">
                                <i class="fa fa-user"></i> <h4 class="user-name">Admin</h4> 
                                <p class="comment">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="comment">
                    <div class="row">
                        <div class="col-md-10">
                            <i class="fa fa-user"></i> <h4 class="user-name">Admin</h4> 
                            <p class="comment">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        </div>
                    </div>
                </div>


                <form action="{{ route('comments.store') }}" method="post">
                    @csrf 
                    <textarea name="comment" cols="30" rows="7" class="form-control form-group" placeholder="@lang('global.comment')"></textarea>
                    <div class="form-group">
                        <input type="hidden" name="news_id" value="{{ $post->id }}">
                        <button class="btn btn-primary btn-sm">@lang('global.send')</button>
                    </div>
                </form>
            </div>
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
@endpush