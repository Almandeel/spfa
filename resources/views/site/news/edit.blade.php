@extends('layouts.site.master')

@section('title')
  {{ $setting->site_name }} | @lang('global.edit')
@endsection

@push('css')


<style href="{{ asset('dashboard/css/sample.css') }}" rel="stylesheet"></style>
<link rel="stylesheet" href="{{ asset('dashboard/css/neo.css') }}">


<style>
    .create-news {
        margin:4% 0 
    }

    .create-news .box-header {
        margin-bottom:2% 0 ;
    }

    .box-footer {
        margin-bottom:30%;
    }
</style>
@endpush



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 create-news">
            <form action="{{ route('news.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                <div class="box">
                    <div class="box-header">
                        <h3>@lang('global.edit') - @lang('news.name'): {{ $post->name }}</h3>
                    </div>
                        <div class="box-body">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <label class="required">@lang('global.title')</label>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs ">
                                        @foreach(config('translatable.locales') as $locale)
                                            <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#name_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach(config('translatable.locales') as $locale)
                                            <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="name_tab_{{ $locale }}">
                                                <input name="name_{{ $locale }}" class="form-control" placeholder="@lang('global.name') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $post->getTranslations('name')) ? $post->getTranslations('name')[$locale] : '' }}"/>
                                            </div><!-- /.tab-pane -->
                                        @endforeach
                                    </div><!-- /.tab-content -->
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="required">@lang('global.description')</label>
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs ">
                                        @foreach(config('translatable.locales') as $locale)
                                            <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#description_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach(config('translatable.locales') as $index=>$locale)
                                            <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="description_tab_{{ $locale }}">
                                                <!-- <input type="text" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $post->getTranslations('description')) ? $post->getTranslations('description')[$locale] : '' }}"> -->
                                                <textarea id="editor{{ $index }}" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)">{{ array_key_exists($locale, $post->getTranslations('description')) ? $post->getTranslations('description')[$locale] : '' }}</textarea>
                                            </div><!-- /.tab-pane -->
                                        @endforeach
                                    </div><!-- /.tab-content -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">@lang('global.image')</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('global.post_status')</label>
                                    <select name="news_status" class="form-control">
                                        <option value="">@lang('global.post_status')</option>
                                        <option value="1"  {{ $post->news_status == 1 ? 'selected' : '' }}>@lang('global.activate')</option>
                                        <option value="0" {{ $post->news_status == 0 ? 'selected' : '' }}>@lang('global.deactivate')</option>
                                    </select>
                                </div>
                            </div>
                            --}}
            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('global.categories')</label>
                                    <select name="category_id" class="form-control" required>
                                        <option value="">@lang('global.categories')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                
                                <span class="col-xs-12 col-sm-12 col-md-6">
                                    <button type="submit" class="btn btn-primary">@lang('global.save_changes')</button>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" name="next" value="back">
                </div>
            </form>
        </div>
    
        <div class="col-md-4">
            @include('partials._aside')
        </div>
    </div>
</div>
@endsection

@include('partials._session')

@push('js')
    <script src="{{ asset('dashboard/js/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/sample.js') }}"></script>
    <script>
       CKEDITOR.replace('editor0');
       CKEDITOR.replace('editor1');
    </script>
@endpush