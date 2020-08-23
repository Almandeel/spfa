<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset('css/flexslider.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
    <link rel="icon" href="<?php echo e(asset('images/settings/' . $setting->site_logo)); ?>">

    <?php if(app()->getLocale() == 'ar'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-rtl.min.css')); ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/owl.theme.default.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/normalize.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">


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
                                <?php if(auth()->guard()->guest()): ?>
                                    <li><a href="<?php echo e(route('login')); ?>"><?php echo app('translator')->getFromJson('global.login'); ?></a></li>
                                    <li><a href="<?php echo e(route('register')); ?>"><?php echo app('translator')->getFromJson('global.register'); ?></a></li>
                                <?php else: ?>   
                                    <?php if (app('laratrust')->can('dashboard-read')) : ?>
                                        <li><a href="<?php echo e(route('dashboard.index')); ?>"><?php echo app('translator')->getFromJson('global.dashboard'); ?></a></li>
                                    <?php endif; // app('laratrust')->can ?>
                                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><?php echo app('translator')->getFromJson('global.logout'); ?></a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </li>
                                    <li><a href="<?php echo e(route('profile')); ?>"><?php echo app('translator')->getFromJson('global.profile'); ?></a></li>
                                <?php endif; ?>
                                <?php if(app()->getlocale() == 'ar'): ?>
                                    <li><a href="<?php echo e(url('lang/en')); ?>">English</a></li>
                                <?php else: ?>  
                                    <li><a href="<?php echo e(url('lang/ar')); ?>">العربية</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social">
                            <ul class="list-inline">
                                <?php $__currentLoopData = $contacts->where('type', '!=', 'email')->where('type', '!=', 'phone')->where('type', '!=', 'address'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e($contact->value); ?>"><i class="fa fa-<?php echo e($contact->type); ?>"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('images/settings/' . $setting->site_logo)); ?>" alt="logo"/></a>
                    <h1><a href="<?php echo e(url('/')); ?>"><?php echo e($setting->site_name); ?></a></h1>
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
                        <li <?php echo e(Request::url() === url('/') ? "class=active" : ''); ?> style="font-size:20px"><a href="<?php echo e(route('home')); ?>"><i class="fa fa-home"></i></a></li>
                        <li <?php echo e(Request::url() === url('/about') ? "class=active" : ''); ?>><a href="<?php echo e(route('about')); ?>"><?php echo app('translator')->getFromJson('menu.about'); ?></a></li>
                        <li <?php echo e(Request::url() === url('/courses') ? "class=active" : ''); ?>><a href="<?php echo e(route('courses')); ?>"><?php echo app('translator')->getFromJson('menu.courses'); ?></a></li>
                        <li <?php echo e(Request::url() === url('/blog') ? "class=active" : ''); ?>><a href="<?php echo e(route('blog')); ?>"><?php echo app('translator')->getFromJson('menu.blog'); ?></a></li>
                        <li <?php echo e(Request::url() === url('/contact') ? "class=active" : ''); ?>><a href="<?php echo e(route('contact')); ?>"><?php echo app('translator')->getFromJson('menu.contact'); ?></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </nav>
            <!-- /main navbar -->
    
            <div id="app">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
    
            <!-- footer -->
            <footer class="text-center">
                <p><?php echo app('translator')->getFromJson('global.copy_right'); ?> &copy; <script>document.write(new Date().getFullYear())</script></p>
            </footer>
            <!-- /fotter -->
        <!-- js -->
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.flexslider.js')); ?>"></script>
        <script src="<?php echo e(asset('js/wow.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <?php echo $__env->yieldPushContent('js'); ?>
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    </div>
</body>
</html><?php /**PATH /opt/lampp/htdocs/laravel_spfa/resources/views/layouts/site/master.blade.php ENDPATH**/ ?>