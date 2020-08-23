@extends('layouts.site.master')

@section('title')
  {{ $setting->site_name }} | @lang('global.create')
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
                <div class="">
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">@lang('global.add'): @lang('news.post')</h3>
                                </div>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label >@lang('global.title')</label>
                                        <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs pull-right">
                                                @foreach(config('translatable.locales') as $locale)
                                                    <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#name_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                                                @endforeach
                                            </ul>
                                            <div class="tab-content">
                                                @foreach(config('translatable.locales') as $locale)
                                                    <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="name_tab_{{ $locale }}">
                                                        <input type="text" name="name_{{ $locale }}" class="form-control" placeholder="@lang('global.name') - @lang('global.'.$locale)" required>
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
                                                        <textarea required  id="editor{{ $index }}" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)"></textarea>
                                                    </div><!-- /tab-pane --> 
                                                @endforeach
                                            </div><!-- /.tab-content -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">@lang('global.image')</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="author_id" value="{{ auth()->user()->id }}">
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('global.category')</label>
                                                <select  name="category_id" class="form-control" required>
                                                    <option value="">@lang('global.categories')</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <span class="col-xs-12 col-sm-12 col-md-6">
                                            <button type="submit" class="btn btn-primary">@lang('global.add')</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="next" value="back">
                    </form>

                    
                </div>
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