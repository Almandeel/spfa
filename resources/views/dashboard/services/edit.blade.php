@extends('layouts.dashboard.app')
@section('title')
    @lang('global.edit')
@endsection
@push('css')
    <style type="text/css">
        .modal-dialog{
            width: 929px;
        }
        .modal_icon{
            width: 52px;
            height: 52px;
            line-height: 44px;
            background: #ddd;
            border: 2px solid #ddd;
            display: inline-block;
            text-align: center;
            position: relative;
            margin: 10px;
            padding-right: 15px;
            color: #666;
            font-size: 2em;
        }
        .modal_icon:hover{
            background: #eee;
            cursor: pointer;
            border-color: 
        }

        .modal_icon.active, .modal_icon.active:hover{
            background: transparent;
            border-color: #a4a4a4;
            cursor: default;
        }

        .modal_icon input{ display: none }
    </style>
@endpush
@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.services', $service->name, 'global.edit'])
        @slot('url', [route('services.index'), route('services.show', $service->id), '#'])
        @slot('icon', ['tasks', 'square', 'edit'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.edit') - @lang('global.service'): {{ $service->name }}</h3>
        </div>
        <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <textarea name="name_{{ $locale }}" class="form-control" placeholder="@lang('global.name') - @lang('global.'.$locale)">{{ array_key_exists($locale, $service->getTranslations('name')) ? $service->getTranslations('name')[$locale] : '' }}</textarea>
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
                                    <!-- <input type="text" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)" value="{{ array_key_exists($locale, $service->getTranslations('description')) ? $service->getTranslations('description')[$locale] : '' }}"> -->
                                    <textarea name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)">{{ array_key_exists($locale, $service->getTranslations('description')) ? $service->getTranslations('description')[$locale] : '' }}</textarea>
                                </div><!-- /.tab-pane -->
                            @endforeach
                        </div><!-- /.tab-content -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">@lang('global.icon')</label>
                    <button id="icon-btn" type="button" class="btn btn-info btn-xs btn-sm btn-sm" onclick="changeIcon()">
                        <input type="hidden" name="icon" class="icon" value="{{ $service->icon ? $service->icon : 'fa fa-star' }}" required="">
                        <i class="{{ $service->icon ? 'fa ' . $service->icon : 'fa fa-star' }}"></i>
                    </button>
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
    <div class="modal fade" id="changeIconModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-right">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">@lang('global.icons')</h4>
                </div>
                <form action="#">
                    @csrf
                    <div class="modal-body">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    var icon_btn = null; 
    var icons = {!! json_encode($icons) !!};

    function changeIcon() {
        var current_icon = $('#icon-btn input').val()
        var icons_tags = "";
        for (let i = 0; i < icons.length; i++) {
            const icon = icons[i];
            const active =  current_icon == icon ? 'active' : ''
            icons_tags += `
            <label class="modal_icon `+active+`" onclick="chooseIcon('`+icon+`')">
                <input type="radio" name="modal_icons[]" value="`+icon+`"/>
                <i class="fa `+icon+`"></i>
            </label>
            `
        }
        $('#changeIconModal .modal-body').html(icons_tags)
        $('#changeIconModal').modal('show')
    }

    function chooseIcon(icon){
        var input = $('#icon-btn input')
        var i = $('#icon-btn i')

        input.val(icon)
        i.removeClass()
        i.addClass('fa ' + icon)
        $('#changeIconModal').modal('hide')
    }
</script>
@endpush