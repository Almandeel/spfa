<?php $__env->startSection('title'); ?>
<?php echo e($setting->site_name); ?> | <?php echo app('translator')->getFromJson('menu.blog'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="news-list wow slideInUp">
                        <div class="news-image">
                            <img width="960" height="400" style="width:100%" src="<?php echo e(asset('images/news/' . $post->image)); ?>" alt="news1">
                        </div>
                        <div class="news-description">
                            <h2><a href="<?php echo e(url('post/' . $post->id)); ?>"><?php echo e($post->name); ?></a></h2>
                            <div class="news-data">
                                <span>
                                    <i class="fa fa-calendar"></i> <?php echo e(\Carbon::parse($post->created_at)->formatLocalized('%Y %b %d')); ?>

                                </span>
                                <span>
                                    <i class="fa fa-user"></i> <?php echo e($post->author->username); ?>

                                </span>
                            </div>
                            <p><?php echo str_limit($post->description, 150); ?></p>
                            <a href="<?php echo e(url('post/' . $post->id)); ?>"><?php echo app('translator')->getFromJson('global.more'); ?></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($news->links()); ?>


            </div>
            <div class="col-md-4">
                <?php echo $__env->make('partials._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel_spfa/resources/views/site/blog.blade.php ENDPATH**/ ?>