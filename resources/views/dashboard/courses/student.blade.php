@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.courses', $course->name, $student->name])
        @slot('url', [route('courses.index'), route('courses.show', $course->id), '#'])
        @slot('icon', ['th-large', 'square', 'user'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.course'): {{ $course->name }}</h3>
        </div>
    </div>
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.gender')</th>
                        <td>{{ $student->gender }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.degree')</th>
                        <td>{{ $student->degree }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.phone')</th>
                        <td>{{ $student->phone }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.goal')</th>
                        <td>{{ $student->goal }}</td>
                    </tr>
                    {{-- @if(request('delete'))
                        @permission('courses-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('courses-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('courses.edit', $course->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                        @endpermission
                    @endif --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection