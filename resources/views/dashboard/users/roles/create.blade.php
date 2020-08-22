@extends('layouts.dashboard.app')

@section('title')
    @lang('global.add')
@endsection


@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['users.roles', 'global.add'])
        @slot('url', [route('roles.index'), '#'])
        @slot('icon', ['black-tie', 'plus'])
    @endcomponent
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="box">
            <div class="box-header">
                @lang('global.add') @lang('users.role')
            </div>
            <div class="box-header">
                <div class="form-group">
                    <label>@lang('global.name')</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('global.name')" required>
                </div>
                <div class="form-group">
                    <label>@lang('global.description')</label>
                    <textarea class="form-control" name="description" placeholder="@lang('global.description')">{{ old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <h2>@lang('users.permissions')</h2>
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        {{ $permission->display_name }}
                                        <input class="flat-red" type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('global.save')</button>
            </div>
        </div>
    </form>
@endsection