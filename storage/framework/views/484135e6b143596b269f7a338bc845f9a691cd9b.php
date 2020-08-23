<?php $__env->startSection('title'); ?>
  <?php echo e($setting->site_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <section class="story section--slider-thingy">
        <div class="flexslider">
          <ul class="slides">
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="slide-1">
                    <div class="slide-image">
                        <img src="<?php echo e(asset('images/sliders/' . $slider->image)); ?>">
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </section>
    

    
    <div class="wow slideInUp about text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4 about-item">
                    <i class="fa fa-star "></i>
                    <h2><?php echo app('translator')->getFromJson('global.about1'); ?></h2>
                </div>
                <div class="col-md-4 about-item">
                    <i class="fa fa-telegram"></i>
                    <h2><?php echo app('translator')->getFromJson('global.about2'); ?></h2>
                </div>
                <div class="col-md-4 about-item">
                    <i class="fa fa-graduation-cap"></i>
                    <h2><?php echo app('translator')->getFromJson('global.about3'); ?></h2>
                </div>
            </div>
        </div>
    </div>
    

    <!-- courses -->
    <div class="wow slideInUp courses">
        <h2 class="text-center section-title"><?php echo app('translator')->getFromJson('global.courses'); ?></h2>
        <div class="owl-carousel  owl-theme">
            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item" style="width:300px" >
                    <div class="course">
                        <div style="max-height:201px;overflow:hidden" class="course-image">
                            <img src="<?php echo e(asset('images/courses/' . $course->intro)); ?>" alt="">
                            <p class="price"><?php echo e($course->price == 0 ? __('global.free') : $course->price); ?> <?php if($course->price): ?> <?php echo app('translator')->getFromJson('global.sdg'); ?> <?php endif; ?></p>
                        </div>
                        <div class="course-description">
                            <h3><a href="<?php echo e(route('detiles', $course->id)); ?>"><?php echo e($course->name); ?></a></h3>
                            <p><?php echo str_limit($course->description, 20); ?></p>
                            <hr>
                            <div class="teacher">
                                <div class="row">
                                    <div class="col-md-3">
                                        
                                        <img style="width:100%" src="<?php echo e(asset('images/teachers/' . $course->teacher->image)); ?>" alt="teacher"/>
                                    </div>
                                    <div class="col-md-9">
                                        <p><?php echo app('translator')->getFromJson('global.teacher'); ?> :</p>
                                        <h4><?php echo e($course->teacher->name); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <!-- /courses -->

    
    <div class="wow slideInUp blog text-center">
        <div class="container">
            <h2 class="section-title"><?php echo app('translator')->getFromJson('global.last_post'); ?></h2>
            <div class="row">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="news">
                            <div class="blog-image">
                                <a href="<?php echo e(url('post/' . $item->id)); ?>" style="background-image: url('<?php echo e(asset('images/news/' . $item->image)); ?>');">
                                    <div class="date">
                                        <p><?php echo e(\Carbon::parse($item->created_at)->formatLocalized('%Y %b %d')); ?></p>
                                    </div>
                                </a>
                            </div>
                            <div class="blog-text">
                                <h3 style="margin-bottom:20px"><a href="<?php echo e(url('post/' . $item->id)); ?>"><?php echo e($item->name); ?></a></h3>
                                <p><?php echo str_limit($item->description,25); ?></p>
                                <a href="<?php echo e(url('post/' . $item->id)); ?>"><button class="btn btn-success" style="margin-top: 25px;"><?php echo app('translator')->getFromJson('global.more'); ?></button></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel_spfa/resources/views/site/index.blade.php ENDPATH**/ ?>