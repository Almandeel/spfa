@extends('layouts.site.master')

@section('title')
{{ $setting->site_name }} | @lang('menu.contact')
@endsection

@push('css')
    <style>
        .contact-item {
            margin-top: 100px;
            font-size: 16px;
            font-weight: bold;
        }
        .contact-item a {
            color:#000 !important;
        }
        .contact-item a:hover {
            text-decoration:none;
        }
        .contact-item .p {
            margin: 0 20px;
        }
        form label {
            margin:20px 0 5px 0 ;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="col-md-8">
            @if(session('success'))
                <div style="margin-top:50px" class="alert alert-success">{{ __(session('success')) }}</div>
            @endif
            <div class="contact" style="padding-top:35px">
                <h2>@lang('menu.contact')</h2>
                <form action="{{ route('sendmail') }}" method="post" class="wow slideInUp">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">@lang('global.name')</label>
                                <input class="form-control" type="text" name="name" id="name" placeholder="@lang('global.name')" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">@lang('global.email')</label>
                                <input class="form-control" type="text" name="email" id="email" placeholder="@lang('global.email')" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">@lang('global.subject')</label>
                        <input class="form-control" type="text" name="subject" id="subject" placeholder="@lang('global.subject')">
                    </div>
                    <div class="form-group">
                        <label for="message">@lang('global.message')</label>
                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="@lang('global.message')" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success"><i class="fa fa-send"></i> @lang('global.send')</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-4">
            @include('partials._aside')
        </div>
    </div>
@endsection