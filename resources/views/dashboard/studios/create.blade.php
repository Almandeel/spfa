@extends('layouts.dashboard.app')

@section('title')
    @lang('global.create')
@endsection


@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.studio', 'global.add'])
        @slot('url', [route('studios.index'), '#'])
        @slot('icon', ['files-o', 'plus'])
    @endcomponent
    <form action="{{ route('studios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">@lang('global.add'): @lang('global.image')</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-6">
                            <label class="btn btn-success btn-sm btn-block">
                                @lang('global.image')
                                <input type="file" name="image" style="display:none;">
                            </label>
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