@extends('layouts.dashboard.app')

@section('title')
    @lang('global.edit')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.sliders', $slider->title, 'global.edit'])
        @slot('url', [route('sliders.index'), route('sliders.show', $slider->id), '#'])
        @slot('icon', ['files-o', 'square', 'edit'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.edit') - @lang('global.slider'): {{ $slider->title }}</h3>
        </div>
        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            <div class="box-body">
                @csrf
                {{ method_field('PUT') }}
                {{-- <div class="form-group">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            @foreach(config('translatable.locales') as $locale)
                                <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#title_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                            @endforeach
                            <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.title')</label></li>
                        </ul>
                        <div class="tab-content">
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="title_tab_{{ $locale }}">
                                    <input type="text" name="title_{{ $locale }}" class="form-control" placeholder="@lang('global.title') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $slider->getTranslations('title')) ? $slider->getTranslations('title')[$locale] : '' }}">
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
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="description_tab_{{ $locale }}">
                                    <!-- <input type="text" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $slider->getTranslations('description')) ? $slider->getTranslations('description')[$locale] : '' }}"> -->
                                    <textarea name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)">{{ array_key_exists($locale, $slider->getTranslations('description')) ? $slider->getTranslations('description')[$locale] : '' }}</textarea>
                                </div><!-- /.tab-pane -->
                            @endforeach
                        </div><!-- /.tab-content -->
                    </div>
                </div> --}}

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="image">@lang('global.image')</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    {{-- <div class="form-group col-md-6">
                        <label for="viewable">@lang('global.order')</label>
                        <input type="number" class="form-control" id="viewable" name="viewable" required value="{{ $slider->viewable }}">
                    </div> --}}
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