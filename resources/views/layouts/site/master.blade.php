<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="icon" href="{{ asset('images/settings/' . $setting->site_logo) }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    @stack('css')

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
<body>
    <div class="container main-content">
        <!-- scound navbar -->
        <div class="scound-navbar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="data">
                            <ul class="list-inline">
                                @guest
                                    <li><a href="{{ route('login') }}">@lang('global.login')</a></li>
                                    <li><a href="{{ route('register') }}">@lang('global.register')</a></li>
                                @else   
                                    @permission('dashboard-read')
                                        <li><a href="{{ route('dashboard.index') }}">@lang('global.dashboard')</a></li>
                                    @endpermission
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">@lang('global.logout')</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                    <li><a href="{{ route('profile') }}">@lang('global.profile')</a></li>
                                @endguest
                                @if (app()->getlocale() == 'ar')
                                    <li><a href="{{ url('lang/en') }}">English</a></li>
                                @else  
                                    <li><a href="{{ url('lang/ar') }}">العربية</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social">
                            <ul class="list-inline">
                                @foreach ($contacts->where('type', '!=', 'email')->where('type', '!=', 'phone')->where('type', '!=', 'address') as $contact)
                                    <li><a href="{{ $contact->value }}"><i class="fa fa-{{ $contact->type }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- /scound navbar -->

        
            <!-- logo -->
            <header>
                <div class="logo-image">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/settings/' . $setting->site_logo) }}" alt="logo"/></a>
                    <h1><a href="{{ url('/') }}">{{ $setting->site_name }}</a></h1>
                </div>
            </header>
            <!-- /logo -->
    
            <!-- main navbar -->
            <nav class="navbar navbar-inverse main-navbar">
                <div style="position:relative" class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                        <li {{ Request::url() === url('/') ? "class=active" : '' }} style="font-size:20px"><a href="{{ route('home') }}"><i class="fa fa-home"></i></a></li>
                        <li {{ Request::url() === url('/about') ? "class=active" : '' }}><a href="{{ route('about') }}">@lang('menu.about')</a></li>
                        <li {{ Request::url() === url('/courses') ? "class=active" : '' }}><a href="{{ route('courses') }}">@lang('menu.courses')</a></li>
                        <li {{ Request::url() === url('/blog') ? "class=active" : '' }}><a href="{{ route('blog') }}">@lang('menu.blog')</a></li>
                        <li {{ Request::url() === url('/contact') ? "class=active" : '' }}><a href="{{ route('contact') }}">@lang('menu.contact')</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!-- /main navbar -->
    
            <div id="app">
                @yield('content')
            </div>
    
            <!-- footer -->
            <footer class="text-center">
                <p>@lang('global.copy_right') &copy; <script>document.write(new Date().getFullYear())</script></p>
            </footer>
            <!-- /fotter -->
        <!-- js -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @stack('js')
    </div>
</body>
</html>