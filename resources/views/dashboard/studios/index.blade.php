@extends('layouts.dashboard.app')

@section('title')
    @lang('global.studio')
@endsection

@push('css')
    <style>
        .photo {
            border:1px solid #eee;
            padding:5px;
            box-shadow: 0px 2px 6px 0px #a09d9d;
            position: relative;
            height:250px;
        }
        
        .photo:hover .overlay{
            display:block;
            transition:all 3s ease-in-out;
        }

        .photo .overlay {
            position: absolute;
            top:0;
            right:0;
            width:100%;
            height:100%;
            background-color:#22222238;
            display: none;
        }

        .photo img {
            width: 100%;
            height: 100%;
        }
    </style>
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['global.studio'])
        @slot('url', [route('studios.index')])
        @slot('icon', ['files-o'])
    @endcomponent

    @include('partials._errors')

    <div class="box">
        <div class="box-header">
            {{-- <h3 class="box-title">@lang('studio.list')</h3>     --}}
            @permission('studio-create')
                <a  href="{{ route('studios.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right" >
                    <i class="fa fa-plus">@lang('global.add')</i>
                </a>
            @endpermission
        </div>
        <div class="box-body">
            @if(count($photos))
                <div class="row">
                    @foreach ($photos as $photo)
                        <div class="col-md-4">
                            <div class="photo">
                                <div class="overlay">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            @permission('studio-update')
                                                <a class="btn btn-warning" href="{{ route('studios.edit', $photo->id) }}"><i class="fa fa-edit"></i> @lang('global.edit')</a>
                                            @endpermission
                                        </div>
                                        <div class="col-xs-6 text-left">
                                            @permission('studio-delete')
                                                <form action="{{ route('studios.destroy', $photo->id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> @lang('global.edit')</button>
                                                </form>
                                            @endpermission
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ asset('images/photos/' . $photo->image) }}" alt="{{ $photo->id }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            @else 
                <div class="alert alert-info text-center">
                    <h2>@lang('global.NoPhoto')</h2>
                </div>
            @endif
        </div>
    </div>
@endsection