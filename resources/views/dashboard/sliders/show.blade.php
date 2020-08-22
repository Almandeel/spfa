@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.sliders', $slider->title])
        @slot('url', [route('sliders.index'), route('sliders.show', $slider->id)])
        @slot('icon', ['files-o', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.slider'): {{ $slider->title }}</h3>
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
                        <td>{{ $slider->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/sliders/' . $slider->image) }})"></div></td>
                    </tr>
                    {{-- <tr>
                        <th style="width: 200px;">@lang('global.title')</th>
                        <td>{{ $slider->title }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $slider->description }}</td>
                    </tr> --}}
                    @if(request('delete'))
                        @permission('sliders-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('sliders-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('sliders.edit', $slider->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection