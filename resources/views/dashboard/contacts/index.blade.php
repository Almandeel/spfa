@extends('layouts.dashboard.app')

@section('title')
    @lang('global.contacts')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('dashboard/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.contacts'])
        @slot('url', [route('contacts.index')])
        @slot('icon', ['users'])
    @endcomponent
    @include('partials._errors')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">@lang('global.list.contacts')</h3>    
            @permission('contacts-create')        
            <a  href="{{ route('contacts.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right" >
                <i class="fa fa-plus">@lang('global.add')</i>
            </a>
            @endpermission

        </div>
        <div class="box-body">
            <table id="contacts-table" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>@lang('global.type')</th>
                        <th>@lang('global.value')</th>
                        <th>@lang('global.options')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>@lang('contacts.' . $contact->type)</td>
                            <td>{{ $contact->value }}</td>
                            <td>
                                @permission('contacts-read')
                                    <a class="btn btn-info btn-xs" href="{{ route('contacts.show', $contact->id) }}"><i class="fa fa-eye"></i> @lang('global.show') </a>
                                @endpermission
                                @permission('contacts-update')
                                    <a class="btn btn-warning btn-xs" href="{{ route('contacts.edit', $contact->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                    <form action="{{ route('contacts.index') }}" method="GET" style="display: inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $contact->id }}">                                        <input type="hidden" name="id" value="{{ $contact->id }}">
                                        <input type="hidden" name="to_home" value="true">                                        <input type="hidden" name="id" value="{{ $contact->id }}">
                                        <input type="hidden" name="column" value="viewable">
                                        @if($contact->viewable)
                                            <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-eye-slash"></i> @lang('global.hide_website') </button>
                                        @else
                                            <button type="submit"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('global.show_website') </button>
                                        @endif
                                    </form>
                                    <form action="{{ route('contacts.index') }}" method="GET" style="display: inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $contact->id }}">                                        <input type="hidden" name="id" value="{{ $contact->id }}">
                                        <input type="hidden" name="to_home" value="true">                                        <input type="hidden" name="id" value="{{ $contact->id }}">
                                        <input type="hidden" name="column" value="viewhome">
                                        @if($contact->viewhome)
                                            <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-eye-slash"></i> @lang('global.hide_homepage') </button>
                                        @else
                                            <button type="submit"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('global.show_homepage') </button>
                                        @endif
                                    </form>
                                @endpermission
                                @permission('contacts-delete')
                                    <a href="{{ route('contacts.show', $contact->id) }}?delete=true" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </a>
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
        $('#contacts-table').DataTable({
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