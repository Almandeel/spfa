@extends('layouts.dashboard.app')

@section('title')
    @lang('global.informations')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.informations'])
        @slot('url', [route('informations.index')])
        @slot('icon', ['info-circle'])
    @endcomponent
    @include('partials._errors')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('global.list.informations')</h3>    
            @permission('informations-create')        
            <a  href="{{ route('informations.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right" >
                <i class="fa fa-plus">@lang('global.add')</i>
            </a>
            @endpermission

        </div>
        <div class="box-body">
            <table id="informations-table" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>@lang('global.title')</th>
                        <th>@lang('global.description')</th>
                        <th>@lang('global.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($informations as $information)
                        <tr>
                            <td>{{ $information->title }}</td>
                            <td>{{ str_limit($information->description, 41) }}</td>
                            <td>
                                @permission('informations-read')
                                    <a class="btn btn-info btn-xs" href="{{ route('informations.show', $information->id) }}"><i class="fa fa-eye"></i> @lang('global.show') </a>
                                @endpermission
                                @permission('informations-update')
                                    <a class="btn btn-warning btn-xs" href="{{ route('informations.edit', $information->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                @endpermission
                                @if ($information->id != 1)
                                    @permission('informations-delete')
                                        <a href="{{ route('informations.show', $information->id) }}?delete=true" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </a>
                                    @endpermission
                                @endif
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
        $('#informations-table').DataTable({
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