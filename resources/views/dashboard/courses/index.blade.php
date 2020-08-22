@extends('layouts.dashboard.app')

@section('title')
    @lang('global.courses')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.courses'])
        @slot('url', [route('courses.index')])
        @slot('icon', ['th-large'])
    @endcomponent
    @include('partials._errors')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('courses.list')</h3>    
            @permission('courses-create')        
            <a  href="{{ route('courses.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right" >
                <i class="fa fa-plus">@lang('global.add')</i>
            </a>
            @endpermission

        </div>
        <div class="box-body">
            <table id="courses-table" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('global.name')</th>
                        <th>@lang('courses.teacher')</th>
                        <th>@lang('courses.from_date')</th>
                        <th>@lang('courses.to_date')</th>
                        <th>@lang('global.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <td><div class="table-image" style="background-image: url({{ url('images/courses/' . $course->intro) }})"></div></td>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->teacher->name }}</td>
                            <td>{{ $course->from_date }}</td>
                            <td>{{ $course->to_date }}</td>
                            <td>
                                @permission('courses-read')
                                    <a class="btn btn-info btn-xs" href="{{ route('courses.show', $course->id) }}"><i class="fa fa-eye"></i> @lang('global.show') </a>
                                @endpermission
                                @permission('courses-update')
                                    <a class="btn btn-warning btn-xs" href="{{ route('courses.edit', $course->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                @endpermission
                                @permission('courses-delete')
                                    <a href="{{ route('courses.show', $course->id) }}?delete=true" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </a>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('dashboard/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
    $(function () {
        $('#courses-table').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'oLanguage'    : {
                "sEmptyTable":  "@lang('table.sEmptyTable')",
                "sInfo":    "@lang('table.sInfo')",
                "sInfoEmpty":   "@lang('table.sInfoEmpty')",
                "sInfoFiltered":    "@lang('table.sInfoFiltered')",
                "sInfoPostFix": "@lang('table.sInfoPostFix')",
                "sInfoThousands":   "@lang('table.sInfoThousands')",
                "sLengthMenu":  "@lang('table.sLengthMenu')",
                "sLoadingRecords":  "@lang('table.sLoadingRecords')",
                "sProcessing":  "@lang('table.sProcessing')",
                "sSearch":  "@lang('table.sSearch')",
                "sZeroRecords": "@lang('table.sZeroRecords')",
                "oPaginate": {
                    "sFirst":   "@lang('table.sFirst')",
                    "sLast":    "@lang('table.sLast')",
                    "sNext":    "@lang('table.sNext')",
                    "sPrevious":    "@lang('table.sPrevious')"
                },
                "oAria": {
                    "sSortAscending":   "@lang('table.sSortAscending')",
                    "sSortDescending":  "@lang('table.sSortDescending')"
                }
            }
        })
    })
    </script>
@endpush