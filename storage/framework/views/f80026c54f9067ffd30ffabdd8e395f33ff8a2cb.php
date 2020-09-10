<?php $__env->startSection('title'); ?>
<?php echo e($post->name); ?> | <?php echo e($setting->site_name); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('css'); ?>
    <style>
        .comments .title {
            margin-bottom:20px;
        }

        .comments .user-name {
            margin-bottom:10px;
            display: inline-block
        }

        .comments p.comment {
            padding: 7px 10px 20px;
        }

        .comments h4::after {
            content: '';
            width: 2%;
            height: 3px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-8">
            <div class="news-list">
                <div class="news-image">
                    <img style="width:100%" src="<?php echo e(asset('images/news/' . $post->image)); ?>" alt="news1">
                </div>
                <div class="news-description news">
                    <h2>
                        <?php echo e($post->name); ?>

                        <?php if(auth()->guard()->guest()): ?>
                            
                        <?php else: ?> 
                            <?php if($post->author_id == auth()->user()->id || auth()->user()->hasPermission('news-update')): ?>
                                <div class="pull-left">
                                    <a href="<?php echo e(route('edit.news', $post->id)); ?>" class="btn btn-warning btn-xs button"><i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('global.edit'); ?></a>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </h2>
                    <div class="news-data">
                        <span>
                            <i class="fa fa-calendar"></i> <?php echo e(\Carbon::parse($post->created_at)->formatLocalized('%Y %b %d')); ?>

                        </span>
                        <span>
                            <i class="fa fa-user"></i> <?php echo e($post->author->username); ?>

                        </span>
                    </div>
                    <p>
                        <?php echo $post->description; ?>

                    </p>
                    <hr/>
                    <p> <?php echo app('translator')->getFromJson('global.share'); ?> :
                        <?php echo Share::page(url('post/' . $post->id), $post->name)
                                ->facebook()
                                ->twitter()
                                ->whatsapp();; ?>

                    </p>
                </div>
            </div>
            <?php if(auth()->guard()->guest()): ?>
            <?php else: ?>
                <comment-component post_id="<?php echo e($post->id); ?>" user_id="<?php echo e(auth()->user()->id); ?>"></comment-component>
            <?php endif; ?>
        </div>


        <div class="col-md-4">
            <?php echo $__env->make('partials._aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/share.js')); ?>"></script>  
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.site.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel_spfa/resources/views/site/post.blade.php ENDPATH**/ ?>