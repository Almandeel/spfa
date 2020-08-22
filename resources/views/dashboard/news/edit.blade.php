@extends('layouts.dashboard.app')

@section('title')
    @lang('global.edit')
@endsection


@push('css')
    <style href="{{ asset('dashboard/css/sample.css') }}" rel="stylesheet"></style>
    <link rel="stylesheet" href="{{ asset('dashboard/css/neo.css') }}">
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['news.titles', $news->name, 'global.edit'])
        @slot('url', [route('news.index'), route('news.show', $news->id), '#'])
        @slot('icon', ['list-alt', 'square', 'edit'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.edit') - @lang('news.name'): {{ $news->name }}</h3>
        </div>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            @foreach(config('translatable.locales') as $locale)
                                <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#name_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                            @endforeach
                            <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.name')</label></li>
                        </ul>
                        <div class="tab-content">
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="name_tab_{{ $locale }}">
                                    <textarea name="name_{{ $locale }}" class="form-control" placeholder="@lang('global.name') - @lang('global.'.$locale)">{{ array_key_exists($locale, $news->getTranslations('name')) ? $news->getTranslations('name')[$locale] : '' }}</textarea>
                                </div><!-- /.tab-pane -->
                            @endforeach
                        </div><!-- /.tab-content -->
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            @foreach(config('translatable.locales') as $locale)
                                <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#description_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                            @endforeach
                            <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.description')</label></li>
                        </ul>
                        <div class="tab-content">
                            @foreach(config('translatable.locales') as $index=>$locale)
                                <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="description_tab_{{ $locale }}">
                                    <!-- <input type="text" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $news->getTranslations('description')) ? $news->getTranslations('description')[$locale] : '' }}"> -->
                                    <textarea id="editor{{ $index }}" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)">{{ array_key_exists($locale, $news->getTranslations('description')) ? $news->getTranslations('description')[$locale] : '' }}</textarea>
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
                            <option value="1"  {{ $news->news_status == 1 ? 'selected' : '' }}>@lang('global.activate')</option>
                            <option value="0" {{ $news->news_status == 0 ? 'selected' : '' }}>@lang('global.deactivate')</option>
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
                                <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>@lang('global.comments_status')</label>
                        <select name="comments_status" class="form-control">
                            <option value="">@lang('global.comments_status')</option>
                            <option value="1" {{ $news->comments_status == 1 ? 'selected' : '' }}>@lang('global.activate')</option>
                            <option value="0" {{ $news->comments_status == 0 ? 'selected' : '' }}>@lang('global.deactivate')</option>
                        </select>
                    </div>
                </div> 
            </div>
            <div class="box-footer">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-6 col-md-3" style="padding-top: 4px;">
                        <input type="radio" name="next" value="back" checked="true">
                        <span>@lang('global.save_update')</span>
                    </label>
                    <label class="col-xs-12 col-sm-6 col-md-3" style="padding-top: 4px;">
                        <input type="radio" name="next" value="list">
                        <span>@lang('global.save_list')</span>
                    </label>
                    <span class="col-xs-12 col-sm-12 col-md-6">
                        <button type="submit" class="btn btn-primary">@lang('global.save_changes')</button>
                    </span>
                </div>
            </div>
        </form>
    </div>
@endsection


@push('js')
    <script src="{{ asset('dashboard/js/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/sample.js') }}"></script>
    <script>
       CKEDITOR.replace('editor0');
       CKEDITOR.replace('editor1');
    </script>
@endpush