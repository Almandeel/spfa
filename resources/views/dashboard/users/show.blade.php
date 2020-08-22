@extends('layouts.dashboard.app')

@section('title')
    @lang('global.edit')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.users','global.show'])
        @slot('url', [route('users.index'), '#'])
        @slot('icon', ['users', 'eye'])
    @endcomponent
    <div class="row">
        <div class="col-md-8">
            <div class="box">
                <div class="box-header">
                    <h3>{{ $user->username }}</h3>
                </div>
            </div>
        </div>
    </div>
<form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @csrf
        {{ method_field('DELETE') }}
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <table class="table table-borderd">
                            <tr>
                                <th>@lang('global.name')</th>
                                <td>{{ $user->fullname }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.phone')</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.graduation_date')</th>
                                <td>{{ $user->graduation_Date }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.graduation_date')</th>
                                <td>{{ $user->graduation_Date }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.university')</th>
                                <td>{{ $user->university }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.country')</th>
                                <td>{{ $user->country }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.image')</th>
                                <td>
                                    <img style="width: 100%" src="{{ asset('images/members/' . $user->image) }}" alt="">
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('users.email')</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="box-footer">
                        @if(request()->delete)
                        @permission('users-delete')
                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('global.delete')</button>
                        @endpermission
                        @else
                        @permission('users-delete')
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> @lang('global.edit')</a>
                        @endpermission
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection