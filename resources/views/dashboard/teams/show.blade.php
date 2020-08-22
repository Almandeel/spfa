@extends('layouts.dashboard.app')

@section('title')
    @lang('global.show')
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.works', $team->name])
        @slot('url', [route('teams.index'), route('teams.show', $team->id)])
        @slot('icon', ['th-large', 'square'])
    @endcomponent
    <div class="box">
        <div class="box-header">
            <h3>@lang('global.team'): {{ $team->name }}</h3>
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
                        <td>{{ $team->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.image')</th>
                        <td><div class="table-image" style="background-image: url({{ url('images/teams/' . $team->image) }})"></div></td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.name')</th>
                        <td>{{ $team->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 200px;">@lang('global.job')</th>
                        <td>{{ $team->job }}</td>
                    </tr>
                    @if(request('delete'))
                        <tr class="alert alert-warning">
                            <td colspan="2">
                                <form action="{{ route('teams.destroy', $team->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <span>@lang('global.delete_confirm')</span>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> @lang('global.delete') </button>
                                </form>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>@lang('global.options')</th>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('teams.edit', $team->id) }}"><i class="fa fa-edit"></i> @lang('global.edit') </a>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection