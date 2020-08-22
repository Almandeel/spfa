@extends('layouts.site.master')

@section('title')
{{ $setting->site_name }} | @lang('global.login')
@endsection


@push('css')
    <style>
        .alert {
            margin-top: 30px;
            margin-right: 50px;
            margin-left: 70px;
            margin-bottom: -20px;
        }
    </style>
@endpush


@section('content')
<div class="container">
    
        <div class="col-md-6">
            @if(session('login_field'))
                <div class="alert alert-info">
                    <h4>@lang(session('login_field'))</h4>
                </div>
            @endif
        </div>
    
    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
        @csrf
        <div class="main-login  wow slideInUp">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>@lang('global.username')</label>
                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" placeholder="@lang('global.username')">
                    @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>@lang('global.password')</label>
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="@lang('global.password')">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">@lang('global.login')</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

