@extends('layouts.dashboard.app')
@push('css')
<style>
    
</style>    
@endpush
@section('content')


<div class="box">
    <div class="box-header">
        <h3>@lang('global.edit') : {{ $setting->site_name }}</h3>
    </div>
    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
        <div class="box-body">
            @csrf

            <div class="form-group">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        @foreach(config('translatable.locales') as $locale)
                            <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#site_name_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                        @endforeach
                        <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.value')</label></li>
                    </ul>
                    <div class="tab-content">
                        @foreach(config('translatable.locales') as $locale)
                            <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="site_name_tab_{{ $locale }}">
                                <input type="text" name="site_name_{{ $locale }}" class="form-control" placeholder="@lang('global.site_name') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $setting->getTranslations('site_name')) ? $setting->getTranslations('site_name')[$locale] : '' }}">
                            </div><!-- /.tab-pane -->
                        @endforeach
                    </div><!-- /.tab-content -->
                </div>
            </div>

            <div class="form-group">
                <label for="logo" class="btn btn-info form-control">
                    @lang('global.logo')
                    <input type="file" id="logo" name="site_logo" style="display:none;">
                </label>
            </div>

            <div class="form-group">
                <label for="site_email">@lang('global.site_email')</label>
                <input type="email" name="site_email" id="site_email" class="form-control" value="{{ $setting->site_email }}">
            </div>

            <div class="form-group">
                <label for="site_email_password">@lang('global.site_email_password')</label>
                <input type="password" name="site_email_password" id="site_email_password" class="form-control">
            </div>

            <div class="form-group">
                <label for="maintenance">@lang('global.maintenance')</label>
                <select name="maintenance" id="maintenance" class="form-control">
                    <option value="0" {{ $setting->maintenance == 0 ? 'selected': '' }}>@lang('global.yes')</option>
                    <option value="1" {{ $setting->maintenance == 1 ? 'selected': '' }}>@lang('global.no')</option>
                </select>
            </div>

            <div class="form-group">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs pull-right">
                        @foreach(config('translatable.locales') as $locale)
                            <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#maintenance_message_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                        @endforeach
                        <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.maintenance_message')</label></li>
                    </ul>
                    <div class="tab-content">
                        @foreach(config('translatable.locales') as $locale)
                            <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="maintenance_message_tab_{{ $locale }}">
                                <input type="text" name="maintenance_message_{{ $locale }}" class="form-control" placeholder="@lang('global.maintenance_message') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $setting->getTranslations('maintenance_message')) ? $setting->getTranslations('maintenance_message')[$locale] : '' }}">
                            </div><!-- /.tab-pane -->
                        @endforeach
                    </div><!-- /.tab-content -->
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
    </form>
</div>

@endsection