
<?php $__env->startSection('content'); ?>
    <div class="col-sm-6">
        <div class="login-slogan">
            <form action="<?php echo e(route('complete_registerPost')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <h3 class="welcome">مرحبا بك فى سوق الجمعة!</h3>
                <h4 class="title">انشاء حساب</h4>
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                <?php elseif(Session::has('error')): ?>
                    <div class="alert alert-danger"><?php echo e(Session::get('error')); ?></div>
                <?php endif; ?>
                <div class="form-group mb-3">
                    <label for="name" class="form-label">اسمك الكامل</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ادخل اسمك كاملا"
                        aria-describedby="nameHelp" required>
                </div>
                <button type="submit" class="btn btn-primary btn-1">انشاء حساب</button>
                <div class="already-member">لديك حساب بالغعل؟ <a href="login.html">تسجيل الدخول</a></div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.partials.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/auth/complete.blade.php ENDPATH**/ ?>