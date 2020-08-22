@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.services', $service->name])
        @slot('url', [route('services.index'), route('services.show', $service->id)])
        @slot('icon', ['tasks', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.service'): {{ $service->name }}</h3>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 200px;">@lang('global.id')</th>
                        <td>{{ $service->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.icon')</th>
                        <td><i class="{{ $service->icon }}"></i></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $service->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $service->description }}</td>
                    </tr>
                    @if(request('delete'))
                        @permission('services-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('services-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('services.edit', $service->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection