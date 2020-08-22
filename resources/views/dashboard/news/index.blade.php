@extends('layouts.dashboard.app')

@section('title')
    @lang('menu.news')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['menu.news'])
        @slot('url', [route('news.index')])
        @slot('icon', ['list-alt'])
    @endcomponent
    @include('partials._errors')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('news.list')</h3>    
            @permission('news-create')        
            <a  href="{{ route('news.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right" >
                <i class="fa fa-plus">@lang('global.add')</i>
            </a>
            @endpermission
        </div>
        <div class="box-body">
            <table id="news-table" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('global.name')</th>
                        <th>@lang('global.description')</th>
                        <th>@lang('global.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $new)
                        <tr>
                            <td><div class="table-image" style="background-image: url({{ url('images/news/' . $new->image) }})"></div></td>
                            <td>{{ $new->name }}</td>
                            <td>{!! str_limit($new->description, 40) !!}</td>
                            <td>
                                @permission('news-read')
                                    <a class="btn btn-info btn-xs" href="{{ route('news.show', $new->id) }}"><i class="fa fa-eye"></i> @lang('global.show') </a>
                                @endpermission
                                @permission('news-update')
                                    <a class="btn btn-warning btn-xs" href="{{ route('news.edit', $new->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                @endpermission
                                @permission('news-delete')
                                    <a href="{{ route('news.show', $new->id) }}?delete=true" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </a>
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
        $('#news-table').DataTable({
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