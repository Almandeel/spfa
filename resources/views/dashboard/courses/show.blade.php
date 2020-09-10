@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.courses', $course->name])
        @slot('url', [route('courses.index'), route('courses.show', $course->id)])
        @slot('icon', ['th-large', 'square'])
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
                        <th style="width: 200px;">@lang('global.id')</th>
                        <td>{{ $course->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('courses.intro')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/courses/' . $course->intro) }})"></div></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $course->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('courses.teacher')</th>
                        <td>{{ $course->teacher->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $course->description }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('courses.price')</th>
                        <td>{{ $course->price }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('courses.discount')</th>
                        <td>{{ $course->discount }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('courses.max_student')</th>
                        <td>{{ $course->max_student }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('courses.count')</th>
                        <td>{{ count($course->students) }} <a style="display:inline-block;margin:0 20px" href="{{ route('studentdetiels', $course->id) }}" class="btn btn-info btn-xs"><i class="fa fa-print"></i> @lang('global.print')</a></td>
                    </tr>
                    @if(request('delete'))
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
                    @endif
                </tbody>
            </table>
            <table style="margin-top:40px;" class="table table-bordered">
                <thead>
                    <tr>
                        <th>@lang('global.name')</th>
                        <th>@lang('global.price')</th>
                        <th>@lang('global.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($course->students as $student)
                        <tr>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->price }}</td>
                            <td><a class="btn btn-info btn-sm" href="{{ route('course', $student->id) }}"><i class="fa fa-eye"></i> @lang('global.view')</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection