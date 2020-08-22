@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.news', $news->name])
        @slot('url', [route('news.index'), route('news.show', $news->id)])
        @slot('icon', ['list-alt', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.news'): {{ $news->name }}</h3>
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
                        <td>{{ $news->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/news/' . $news->image) }})"></div></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $news->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.description')</th>
                        <td>{!! $news->description !!}</td>
                    </tr>
                    @if(request('delete'))
                        @permission('news-delete')
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                        @endpermission
                    @else
                        @permission('news-update')
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('news.edit', $news->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                        @endpermission
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection