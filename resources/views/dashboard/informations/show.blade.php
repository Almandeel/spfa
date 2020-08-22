@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.informations', $information->title])
        @slot('url', [route('informations.index'), route('informations.show', $information->id)])
        @slot('icon', ['info-circle', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.information'): {{ $information->title }}</h3>
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
                        <td>{{ $information->id }}</td>
                    </tr>
                    {{-- <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/informations/' . $information->image) }})"></div></td>
                    </tr> --}}
                    <tr>
                        <th style="width: 200px;">@lang('global.title')</th>
                        <td>{{ $information->title }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $information->description }}</td>
                    </tr>
                    @if ($information->id != 1)
                        @if(request('delete'))
                            @permission('informations-delete')
                            <tr class="alert alert-warning">
                                <td colspan="2">
                                    <form action="{{ route('informations.destroy', $information->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <span>@lang('global.delete_confirm')</span>
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                    </form>
                                </td>
                            </tr>
                            @endpermission
                        @else
                            @permission('informations-update')
                            <tr>
                                <th>@lang('global.options')</th>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="{{ route('informations.edit', $information->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                </td>
                            </tr>
                            @endpermission
                        @endif
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection