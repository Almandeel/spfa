@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.contacts', $contact->value])
        @slot('url', [route('contacts.index'), route('contacts.show', $contact->id)])
        @slot('icon', ['files-o', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.contact'): {{ $contact->title }}</h3>
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
                        <td>{{ $contact->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.type')</th>
                        <td>@lang('contacts.' . $contact->type)</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.value')</th>
                        <td>{{ $contact->value }}</td>
                    </tr>
                    @if(request('delete'))
                        @permission('contacts-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('contacts-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('contacts.edit', $contact->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                <form action="" method="GET" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <input type="hidden" name="column" value="viewable">
                                    @if($contact->viewable)
                                        <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-eye-slash"></i> @lang('global.hide_website') </button>
                                    @else
                                        <button type="submit"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('global.show_website') </button>
                                    @endif
                                </form>
                                <form action="" method="GEPT" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                    <input type="hidden" name="column" value="viewhome">
                                    @if($contact->viewhome)
                                        <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-eye-slash"></i> @lang('global.hide_homecontact') </button>
                                    @else
                                        <button type="submit"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('global.show_homecontact') </button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection