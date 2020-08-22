<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('global.app_name') | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    {{-- <link rel="stylesheet" href="{{ asset('css/icons.css') }}"> --}}

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/css/skins/_all-skins.min.css') }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/parsley.css')}}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/rtl.css') }}">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                direction: rtl;
            }
            .content-header>.breadcrumb{
                float: right;
                left: auto;
                right: 10px;
            }
        </style>
    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE.min.css') }}">
    @endif

    <style>
        .mr-2{
            margin-right: 5px;
        }
        label.required:after{
            content: "*";
            color: red;
        }
        .table-image{
            width: 80px;
            height: 80px;
            background-color: #ddd;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .mb-15{
            margin-bottom: 15px;
        }
    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>

    @stack('select2')
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>

    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck/all.css') }}">

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    @stack('css')

</head>
<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">

    <header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="{{ route('dashboard.index') }}" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>SPFA</b></span>
            <span class="logo-lg"><b>Dashboard</b> SPFA</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{ auth()->user()->username }}</span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img src="{{ asset('dashboard/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">

                                <p>
                                    {{ auth()->user()->username }}
                                </p>
                            </li>

                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">

                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="{{ route('logout') }}" class="btn btn-default" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">تسجيل خروج</a>
        
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <button style="margin-right:1%" type="button" class="btn btn-default" data-toggle="modal" data-target="#edit_user">
                                            الملف الشخصي
                                        </button>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    @include('layouts.dashboard._aside')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <h1></h1>
                <section class="content-header" style="position:none;">
                    @yield('breadcrumb')
                </section>
                @include('partials._errors')
                @yield('content')

                <div class="modal fade" id="edit_user">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">@lang('users.profile')</h4>
                        </div>
                        <form action="{{ route('users.profile')}}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">@lang('global.name')</label>
                                            <input type="text" class="form-control" name="name" placeholder="@lang('global.fullname')" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">@lang('global.phone')</label>
                                            <input type="text" class="form-control" name="phone" placeholder="@lang('global.phone')" value="{{ auth()->user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="graduation_Date">@lang('global.graduation_date')</label>
                                            <input type="date" class="form-control" name="graduation_Date" placeholder="@lang('global.graduation_date')" value="{{ auth()->user()->graduation_Date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="University">@lang('global.university')</label>
                                            <input type="text" class="form-control" name="university" placeholder="@lang('global.university')" value="{{ auth()->user()->university }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">@lang('global.country')</label>
                                            <input id="country" name="country" type="text" class="form-control country" placeholder="@lang('global.country')" value="{{ auth()->user()->country }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="adjective">@lang('global.adjective')</label>
                                          <input id="adjective" name="adjective" type="text" class="form-control adjective" placeholder="@lang('global.adjective')" value="{{ auth()->user()->adjective }}">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <hr>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="username">@lang('global.username')</label>
                                        <input id="username" name="username" type="text" class="form-control username" placeholder="@lang('global.username')" value="{{ auth()->user()->username }}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="password">@lang('global.password')</label>
                                        <input id="password" name="password" type="password" class="form-control password" placeholder="@lang('global.password')">
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">إغلاق</button>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </section>
        </div>
    </div>

    @include('partials._session')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <div>Almandeel<a href="https://www.flaticon.com/authors/smashicons" title="Smashicons"></div>

    </footer>
    {{-- 
     --}}

</div><!-- end of wrapper -->

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/parsley.js')}}"></script>
@include('partials._parsleyLocales')

{{--icheck--}}
<script src="{{ asset('dashboard/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('dashboard/js/fastclick.js') }}"></script>

{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('dashboard/js/adminlte.min.js') }}"></script>


<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree();

        //icheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            // radioClass   : 'iradio_flat-green'
        })

        $('.delete').click(function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "تأكيد الحذف",
                type: "warning",
                killer: true,
                buttons: [
                    Noty.button("نعم", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("لا", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete


        $('form').parsley();
    
        window.Parsley.on('form:success', function(){
            $('button[type="submit"]').attr('disabled', true)
        })
        

    })
</script>

@stack('js')

</body>
</html>
