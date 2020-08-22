@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.teachers', $teacher->name])
        @slot('url', [route('teachers.index'), route('categories.show', $teacher->id)])
        @slot('icon', ['th-large', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.teacher'): {{ $teacher->name }}</h3>
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
                        <td>{{ $teacher->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/teachers/' . $teacher->image) }})"></div></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $teacher->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $teacher->description }}</td>
                    </tr>
                    <tr>
                        <th>@lang('global.options')</th>
                        <td>
                        @if(request('delete'))
                            @permission('teachers-delete')
                            <tr class="alert alert-warning">
                                <td colspan="2">
                                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <span>@lang('global.delete_confirm')</span>
                                        <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                    </form>
                                </td>
                            </tr>
                            @endpermission
                        @else
                            @permission('teachers-update')
                            <tr>
                                <th>@lang('global.options')</th>
                                <td>
                                    <a class="btn btn-warning btn-xs" href="{{ route('teachers.edit', $teacher->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                </td>
                            </tr>
                            @endpermission
                        @endif
                            
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection