@extends('layouts.dashboard.app')

@section('title')
    @lang('users.users')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush


@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.users'])
        @slot('url', ['#'])
        @slot('icon', ['users'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            @permission('users-create')
                <a  href="{{ route('users.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-success btn-sm pull-right" >
                    <i class="fa fa-user-plus">@lang('global.add')</i>
                </a>
            @endpermission

            @permission('roles-read')
                <a  href="{{ route('roles.index') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right" >
                    <i class="fa fa-list">@lang('users.list_roles')</i>
                </a>
            @endpermission

            
            <a  href="{{ route('report.members') }}" style="display:inline-block; margin-left:1%" class="btn btn-info btn-sm pull-right" >
                <i class="fa fa-print"> @lang('global.print')</i>
            </a>

        </div>
        <div class="box-body">
            <table id="users-table" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>@lang('users.username')</th>
                        <th>@lang('global.adjective')</th>
                        <th>@lang('global.status')</th>
                        <th>@lang('global.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->adjective ? __('users.member') : __('users.normal') }}</td>
                            <td>{{ $user->status ? __('global.active') : __('global.deactive') }}</td>
                            <td>
                                @permission('users-read')
                                    <a class="btn btn-info btn-xs" href="{{ route('users.show', $user->id) }}"><i class="fa fa-eye"></i> @lang('global.show') </a>
                                @endpermission

                                @permission('users-update')
                                    <form style="display:inline-block" action="{{ route('status') }}" method="post">
                                        @csrf 
                                        <input type="hidden" name="status" value="{{ $user->status ? 0 : 1 }}">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <button type="submit" class="btn btn-{{ $user->status ? 'default' : 'success'}} btn-xs"><i class="fa fa-edit"></i> {{ $user->status ?  __('global.deactive') : __('global.active')}} </button>
                                    </form>
                                    <a class="btn btn-warning btn-xs" href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                @endpermission

                                @permission('users-delete')
                                    <a class="btn btn-danger btn-xs" href="{{ route('users.show', $user->id) }}?delete=true"><i class="fa fa-trash"></i> @lang('global.delete') </a>
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
        $('#users-table').DataTable({
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