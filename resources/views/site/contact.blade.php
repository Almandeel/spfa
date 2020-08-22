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
            <aside>
                <div class="asite-item contact-item">

                    <div class="form-group">
                        @if ($contacts->where('type', 'phone'))
                            <label><i class="fa fa-phone"></i> @lang('global.phones')</label>
                            @foreach ($contacts->where('type', 'phone') as $phone)
                                <p class="p"><a href="tel:://{{ $phone->value }}">{{ $phone->value }}</a></p>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        @if ($contacts->where('type', 'email'))
                            <label><i class="fa fa-envelope"></i> @lang('global.email')</label>
                            @foreach ($contacts->where('type', 'email') as $email)
                                <p class="p"><a href="mailto:://{{ $email->value }}"> {{ $email->value }}</a></p>
                            @endforeach
                        @endif
                    </div>

                    <div class="form-group">
                        @if ($contacts->where('type', 'email'))
                            <label><i class="fa fa-map-marker"></i> @lang('global.address')</label>
                            @foreach ($contacts->where('type', 'address') as $address)
                                <p class="p"><i class="fa fa-map-marker"></i> {{ $address->value }}</p>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="asite-item">
                    <div class="category">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fill">
                                    <h4>@lang('global.last_post')</h4>
                                </div>
                            </div>

                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                    <div class="category_list">
                        @foreach ($lastnews as $last)
                            <p><a href="{{ url('post/' . $last->id) }}"><i class="fa fa-angle-double-right"></i>{{ $last->name }}</a></p>
                        @endforeach
                    </div>
                </div>

                <div class="asite-item">
                    <div class="category">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fill">
                                    <h4>@lang('global.category')</h4>
                                </div>
                            </div>

                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>

                    <div class="category_list">
                        <p><a href="{{ url('blog') }}"> <i class="fa fa-angle-double-right"></i> @lang('categories.all')</a></p>
                        @foreach ($categories as $category)
                            <p><a href="{{ url('news/category/' . $category->name ) }}"><i class="fa fa-angle-double-right"></i>{{ $category->name }}</a></p>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection