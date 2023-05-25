<!doctype html>
<html lang="ar" dir="rtl">
<?php echo $__env->make('site.partials.auth.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body>
    <main class="login-page">
        <?php if(Session::has('success')): ?>
            <div class="position-fixed alert-toast top-0 end-0 p-3" style="z-index: 11">
                <div id="alertToast" class="toast text-white bg-success " role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-delay="2000">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="position-fixed alert-toast top-0 end-0 p-3" style="z-index: 11">
                <div id="alertToast" class="toast text-white bg-danger" role="alert" aria-live="assertive"
                    aria-atomic="true" data-bs-delay="2000">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            <?php echo e(Session::get('error')); ?>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo-slogan">
                        <a href="<?php echo e(route('index')); ?>">
                            <img src="<?php echo e(asset('wb/imgs/white-logo.svg')); ?>" alt="logo">
                        </a>
                    </div>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </main>
    <?php echo $__env->make('site.partials.auth.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/frdaysq/public_html/resources/views/site/partials/auth/layout.blade.php ENDPATH**/ ?>