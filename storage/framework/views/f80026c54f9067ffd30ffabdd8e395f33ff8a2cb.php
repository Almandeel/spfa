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

                        <?php if($post->author_id == auth()->user()->id || auth()->user()->hasPermission('news-update')): ?>
                            <div class="pull-left">
                                <a href="<?php echo e(route('edit.news', $post->id)); ?>" class="btn btn-warning btn-xs button"><i class="fa fa-edit"></i> <?php echo app('translator')->getFromJson('global.edit'); ?></a>
                            </div>
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
            <comment-component post_id="<?php echo e($post->id); ?>" user_id="<?php echo e(auth()->user()->id); ?>"></comment-component>
        </div>


        <div class="col-md-4">
            <aside>
                <div class="asite-item">
                    <div class="category">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fill">
                                    <h4><?php echo app('translator')->getFromJson('global.last_post'); ?></h4>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="category_list">
                        <?php $__currentLoopData = $lastnews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $last): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p><a href="<?php echo e(url('post/' . $last->id)); ?>"><i class="fa fa-angle-double-right"></i> <?php echo e($last->name); ?></a></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
                <div class="category">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="fill">
                                <h4><?php echo app('translator')->getFromJson('global.category'); ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
                <div class="category_list">
                    <p><a href="<?php echo e(url('blog')); ?>"> <i class="fa fa-angle-double-right"></i> <?php echo app('translator')->getFromJson('categories.all'); ?></a></p>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><a href="<?php echo e(url('news/category/' . $category->name )); ?>"><i class="fa fa-angle-double-right"></i> <?php echo e($category->name); ?></a></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </aside>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/share.js')); ?>"></script>  
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.site.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel_spfa/resources/views/site/post.blade.php ENDPATH**/ ?>