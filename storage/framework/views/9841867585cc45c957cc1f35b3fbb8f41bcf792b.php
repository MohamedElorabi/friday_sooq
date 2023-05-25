

<?php $__env->startSection('title'); ?>تسجيل دخول
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="login-card">
                        <form class="theme-form login-form" action="<?php echo e(route('post-login')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <h4>تسجيل دخول</h4>
                            <h6>مرحبا بك!</h6>
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-email"></i></span>
                                    <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>كلمة المرور</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" required="" placeholder="*********" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox" />
                                    <label for="checkbox1">Remember password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">تسجيل دخول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php $__env->startPush('scripts'); ?>
    <?php $__env->stopPush(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/dashboard/auth/login.blade.php ENDPATH**/ ?>