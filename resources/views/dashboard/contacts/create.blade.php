@extends('layouts.dashboard.app')

@section('title')
    @lang('global.create')
@endsection

@push('css')
    <style href="{{ asset('dashboard/css/sample.css') }}" rel="stylesheet"></style>
    <link rel="stylesheet" href="{{ asset('dashboard/css/neo.css') }}">
@endpush


@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.contacts', 'global.add'])
        @slot('url', [route('contacts.index'), '#'])
        @slot('icon', ['files-o', 'plus'])
    @endcomponent
    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-value">@lang('global.add'): @lang('global.contact')</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="type">@lang('global.type')</label>
                            <select name="type" id="type" class="form-control">
                                @foreach($types as $type)
                                    <option value="{{ $type }}">@lang('contacts.' . $type)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs pull-right">
                                    @foreach(config('translatable.locales') as $locale)
                                        <li class="{{ $locale == app()->getLocale() ? 'active' : '' }}"><a href="#value_tab_{{ $locale }}" data-toggle="tab" aria-expanded="false">@lang('global.'.$locale)</a></li>
                                    @endforeach
                                    <li class="pull-left header"><label class="{{ $locale == app()->getLocale() ? 'required' : '' }}">@lang('global.value')</label></li>
                                </ul>
                                <div class="tab-content">
                                    @foreach(config('translatable.locales') as $index=>$locale)
                                        <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="value_tab_{{ $locale }}">
                                            <input  id="editor{{ $index }}" type="text" name="value_{{ $locale }}" class="form-control" placeholder="@lang('global.value') - @lang('global.'.$locale)">
                                        </div><!-- /.tab-pane -->
                                    @endforeach
                                </div><!-- /.tab-content -->
                            </div>
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
@endsection

@push('js')
    <script src="{{ asset('dashboard/js/ckeditor.js') }}"></script>
    <script src="{{ asset('dashboard/js/sample.js') }}"></script>
    <script>
       CKEDITOR.replace('editor0');
       CKEDITOR.replace('editor1');
    </script>
@endpush