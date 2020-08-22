@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.pages', $page->title])
        @slot('url', [route('pages.index'), route('pages.show', $page->id)])
        @slot('icon', ['files-o', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.page'): {{ $page->title }}</h3>
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
                        <td>{{ $page->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/pages/' . $page->image) }})"></div></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.title')</th>
                        <td>{{ $page->title }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{{ $page->description }}</td>
                    </tr>
                    @if(request('delete'))
                        @permission('pages-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('pages-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('pages.edit', $page->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                                <form action="" method="GET" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $page->id }}">
                                    <input type="hidden" name="column" value="viewable">
                                    @if($page->viewable)
                                        <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-eye-slash"></i> @lang('global.hide_website') </button>
                                    @else
                                        <button type="submit"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('global.show_website') </button>
                                    @endif
                                </form>
                                {{-- <form action="" method="GET" style="display: inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $page->id }}">
                                    <input type="hidden" name="column" value="viewhome">
                                    @if($page->viewhome)
                                        <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-eye-slash"></i> @lang('global.hide_homepage') </button>
                                    @else
                                        <button type="submit"  class="btn btn-success btn-xs"><i class="fa fa-eye"></i> @lang('global.show_homepage') </button>
                                    @endif
                                </form> --}}
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection