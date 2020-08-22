@extends('layouts.dashboard.app')

@section('title')
    @lang('global.edit')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.team', $team->name, 'global.edit'])
        @slot('url', [route('teams.index'), route('teams.show', $team->id), '#'])
        @slot('icon', ['th-large', 'square', 'edit'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.edit') : {{ $team->name }}</h3>
        </div>
        <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <input name="name_{{ $locale }}" class="form-control" placeholder="@lang('global.name') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $team->getTranslations('name')) ? $team->getTranslations('name')[$locale] : '' }}"/>
                                </div><!-- /.tab-pane -->
                            @endforeach
                        </div><!-- /.tab-content -->
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            @foreach(config('translatable.locales') as $locale)
                                <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#job_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                            @endforeach
                            <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.job')</label></li>
                        </ul>
                        <div class="tab-content">
                            @foreach(config('translatable.locales') as $locale)
                                <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="job_tab_{{ $locale }}">
                                    <input name="job_{{ $locale }}" class="form-control" placeholder="@lang('global.job') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $team->getTranslations('job')) ? $team->getTranslations('job')[$locale] : '' }}"/>
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