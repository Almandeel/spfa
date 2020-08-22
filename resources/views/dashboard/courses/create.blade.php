@extends('layouts.dashboard.app')

@section('title')
    @lang('global.create')
@endsection


@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.courses', 'global.add'])
        @slot('url', [route('courses.index'), '#'])
        @slot('icon', ['th-large', 'plus'])
    @endcomponent
    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">@lang('global.add'): @lang('global.course')</h3>
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
                                    @foreach(config('translatable.locales') as $locale)
                                        <div class="tab-pane {{ $locale == app()->getLocale() ? 'active' : '' }}" id="description_tab_{{ $locale }}">
                                            <!-- <input type="text" name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)"> -->
                                            <textarea name="description_{{ $locale }}" class="form-control" placeholder="@lang('global.description') - @lang('global.'.$locale)"></textarea>
                                        </div><!-- /.tab-pane -->
                                    @endforeach
                                </div><!-- /.tab-content -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="intro">@lang('courses.intro')</label>
                            <input type="file" class="form-control" id="intro" name="intro" required>
                        </div>

                        <div class="form-group">
                            <label for="teacher_id">@lang('global.teacher')</label>
                            <select name="teacher_id" class="form-control" required>
                                <option value="">@lang('global.teacher')</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="from_date">@lang('courses.from_date')</label>
                                <input type="date" class="form-control" id="from_date" name="from_date" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="to_date">@lang('courses.to_date')</label>
                                <input type="date" class="form-control" id="to_date" name="to_date" required>
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="time">@lang('courses.time')</label>
                                <input type="text" class="form-control" id="time" name="time" required>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">@lang('courses.price')</label>
                                    <input type="number" class="form-control" id="price" name="price" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="discount">@lang('courses.discount')</label>
                                    <input type="number" class="form-control" id="discount" name="discount" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="max_student">@lang('courses.max_student')</label>
                                    <input type="number" class="form-control" id="max_student" name="max_student">
                                </div>
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