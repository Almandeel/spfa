@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.networks', $network->value])
        @slot('url', [route('networks.index'), route('networks.show', $network->id)])
        @slot('icon', ['files-o', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.network'): {{ $network->title }}</h3>
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
                        <td>{{ $network->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.type')</th>
                        <td>@lang('networks.' . $network->type)</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.value')</th>
                        <td>{{ $network->value }}</td>
                    </tr>
                    @if(request('delete'))
                        @permission('networks-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('networks.destroy', $network->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('networks-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('networks.edit', $network->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection