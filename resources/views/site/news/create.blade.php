@extends('layouts.site.master')

@section('title')
  {{ $setting->site_name }} | @lang('menu.about')
@endsection

@push('css')
<style>

</style>
@endpush
@section('content')
    <div class="container">
        <div class="col-md-8">
            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">@lang('global.add'): @lang('news.name')</h3>
                            </div>
                            <div class="box-body">
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
                                                    <input type="text" name="name_{{ $locale }}" class="form-control" placeholder="@lang('global.name') - @lang('global.'.$locale)">
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
                                                    <textarea  id="editor{{ $index }}" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)"></textarea>
                                                </div><!-- /.tab-pane -->
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
                                            <label>@lang('global.categories')</label>
                                            <select name="category_id" class="form-control" required>
                                                <option value="">@lang('global.categories')</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="post_status">@lang('global.post_status')</label>
                                            <select name="news_status" class="form-control">
                                                <option value="">@lang('global.post_status')</option>
                                                <option value="1">@lang('global.activate')</option>
                                                <option value="0">@lang('global.deactivate')</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="post_status">@lang('global.comment_status')</label>
                                            <select name="comment_status" class="form-control">
                                                <option value="">@lang('global.comment_status')</option>
                                                <option value="1">@lang('global.activate')</option>
                                                <option value="0">@lang('global.deactivate')</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-6 col-md-3" style="padding-top: 4px;">
                                        <input type="radio" name="next" value="back" checked="true">
                                        <span>@lang('global.save_new')</span>
                                    </label>
                                    <label class="col-xs-12 col-sm-6 col-md-3" style="padding-top: 4px;">
                                        <input type="radio" name="next" value="list">
                                        <span>@lang('global.save_list')</span>
                                    </label>
                                    <span class="col-xs-12 col-sm-12 col-md-6">
                                        <button type="submit" class="btn btn-primary">@lang('global.add')</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                        @foreach ($news as $last)
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
                        <p><a href="{{ url('news/category/' . $category->id ) }}"> <i class="fa fa-angle-double-right"></i> {{ $category->name }}</a></p>
                    @endforeach
                </div>
            </aside>
        </div>
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