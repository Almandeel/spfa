

<?php $__env->startSection('title'); ?>
<?php echo e($setting->site_name); ?> | <?php echo app('translator')->getFromJson('global.login'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('css'); ?>
    <style>
        .alert {
            margin-top: 30px;
            margin-right: 50px;
            margin-left: 70px;
            margin-bottom: -20px;
        }
    </style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="container">
    
        <div class="col-md-6">
            <?php if(session('login_field')): ?>
                <div class="alert alert-info">
                    <h4><?php echo app('translator')->getFromJson(session('login_field')); ?></h4>
                </div>
            <?php endif; ?>
        </div>
    
    <form method="POST" action="<?php echo e(route('login')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="main-login  wow slideInUp">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label><?php echo app('translator')->getFromJson('global.username'); ?></label>
                    <input type="text" name="username" class="form-control <?php echo e($errors->has('username') ? 'is-invalid' : ''); ?>" placeholder="<?php echo app('translator')->getFromJson('global.username'); ?>">
                    <?php if($errors->has('username')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('username')); ?></strong>
                    </span>
                <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label><?php echo app('translator')->getFromJson('global.password'); ?></label>
                    <input type="password" name="password" class="form-control <?php echo e($errors->has('password') ? 'is-invalid' : ''); ?>" placeholder="<?php echo app('translator')->getFromJson('global.password'); ?>">
                    <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success"><?php echo app('translator')->getFromJson('global.login'); ?></button>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.site.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel_spfa/resources/views/auth/login.blade.php ENDPATH**/ ?>