@extends('layouts.dashboard.app')

@section('title')
    تعديل مشرف
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['users.roles','global.edit'])
        @slot('url', [route('roles.index'), '#'])
        @slot('icon', ['black-tie', 'edit'])
    @endcomponent
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        {{ method_field('PUT') }}
        <div class="box">
            <div class="box-header">
                <h3>@lang('global.edit'): @lang('users.role')</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <label>@lang('global.name')</label>
                    <input type="text" class="form-control" name="name" value="{{ $role->name }}" placeholder="@lang('global.name')" required>
                </div>
                <div class="form-group">
                    <label>@lang('global.description')</label>
                    <textarea type="text" class="form-control" name="description" placeholder="@lang('global.description')">{{ $role->description }}</textarea>
                </div>
                <div class="form-group">
                    <h2>@lang('users.permissions')</h2>
                    <div class="row">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>
                                        {{ $permission->display_name }}
                                        <input class="flat-red" type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $role->hasPermission($permission->name) ? 'selected' : '' }}>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button class="btn btn-primary">@lang('global.save_changes')</button>
            </div>
        </div>
    </form>
@endsection