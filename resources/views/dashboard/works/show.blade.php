@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.works', $work->name])
        @slot('url', [route('works.index'), route('works.show', $work->id)])
        @slot('icon', ['th-large', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.work'): {{ $work->name }}</h3>
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
                        <td>{{ $work->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/works/' . $work->image) }})"></div></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $work->name }}</td>
                    </tr>
                    @if($work->category)
                        <tr>
                            <th style="width: 200px;">@lang('global.category')</th>
                            <td>{{ $work->category->name }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $work->description }}</td>
                    </tr>
                    @if(request('delete'))
                        @permission('works-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('works.destroy', $work->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('works-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('works.edit', $work->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection