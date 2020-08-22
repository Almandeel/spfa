@extends('layouts.dashboard.app')

@section('title')
    الرئيسية
@endsection

@section('content')

    @component('partials._breadcrumb')
        @slot('title', [''])
        @slot('url', ['#'])
        @slot('icon', [''])
    @endcomponent
        <div class="row">
            @permission('news-read')
                <div class="col-lg-4 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                        <h3>{{ count($news) }}</h3>

                        <p>@lang('global.news')</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-newspaper-o"></i>
                        </div>
                    </div>
                </div>
            @endpermission

            @permission('courses-read')
                <div class="col-lg-4 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                        <h3>{{ count($courses) }}</h3>

                        <p>@lang('global.courses')</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-mortar-board"></i>
                        </div>
                    </div>
                </div>
            @endpermission

            @permission('users-read')
                <div class="col-lg-4 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{ count($members) }}</h3>

                        <p>@lang('global.members')</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>
            @endpermission

            @permission('users-read')
                <div class="col-lg-4 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                        <h3>{{ count($dont_members) }}</h3>

                        <p>@lang('global.dont_members')</p>
                        </div>
                        <div class="icon">
                        <i class="fa fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            @endpermission
        </div>

@endsection
