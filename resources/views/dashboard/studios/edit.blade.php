@extends('layouts.dashboard.app')

@section('title')
    @lang('global.edit')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.studio', 'global.edit'])
        @slot('url', [route('studios.index'), '#'])
        @slot('icon', ['files-o', 'square', 'edit'])
    @endcomponent
    <div class="box">
        <form action="{{ route('studios.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
            <div class="box-header">
                <h3 class="box-title">@lang('global.edit'): @lang('global.image')</h3>
            </div>
            <div class="box-body">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label class="btn btn-success btn-sm btn-block">
                                @lang('global.image')
                                <input type="file" name="image" style="display:none;">
                            </label>
                        </div>
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