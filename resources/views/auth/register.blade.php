@extends('layouts.site.master')
@section('title')
    {{ $setting->site_name }} | @lang('global.register')
@endsection


@push('css')
<link rel="stylesheet" href="{{ asset('css/countrySelect.min.css') }}">
@endpush

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

    <div class="col-md-12">
        @if(session('registred'))
            <div class="alert alert-info">
                <h4>@lang(session('registred'))</h4>
            </div>
        @endif
    </div>

<form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="register wow slideInUp">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">@lang('global.name')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="@lang('global.fullname')">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">@lang('global.phone')</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="@lang('global.phone')">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="graduation_Date">@lang('global.graduation_date')</label>
                    <input type="date" class="form-control @error('graduation_Date') is-invalid @enderror" name="graduation_Date" placeholder="@lang('global.graduation_date')">
                    @error('graduation_Date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="University">@lang('global.university')</label>
                    <input type="text" class="form-control @error('university') is-invalid @enderror" name="university" placeholder="@lang('global.university')">
                    @error('university')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="country">@lang('global.country')</label>
                    <input id="country" name="country" type="text" class="form-control @error('country') is-invalid @enderror country" placeholder="@lang('global.country')">
                    @error('country')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="btn btn-success btn-block" for="image_student">
                        @lang('global.image_student')
                        <input id="image_student" style="display: none;" name="image" type="file" class="form-control @error('image_student') is-invalid @enderror" placeholder="@lang('global.image_student')">
                    </label>
                    @error('image_student')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-success next">@lang('global.next')</button>
    </div>

    <div class="login  wow slideInUp">
        <div class="row">
            <div class="col-md-6 form-group">
                <label>@lang('global.username')</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="@lang('global.username')">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 form-group">
                <label>@lang('global.password')</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('global.password')">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6">
                <button type="button" class="btn btn-success back">@lang('global.back')</button>
                <button type="submit" class="btn btn-success">@lang('global.register')</button>
            </div>
        </div>
    </div>
</form>
@endsection


@push('js')
<script src="{{ asset('js/countrySelect.min.js') }}"></script>
<script>
     $("#country").countrySelect();
</script>
@endpush



