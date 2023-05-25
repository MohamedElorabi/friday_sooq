<!doctype html>
<html lang="<?php echo e(App::getLocale()); ?>" <?php if(App::getLocale() == 'ar' || App::getLocale() == 'ur'): ?> dir="rtl"<?php else: ?> dir="ltr" <?php endif; ?>>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <?php echo $__env->make('site.partials.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <title>FridaySooq</title>
</head>

<body>
    <div id="page">
        <?php echo $__env->make('site.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(Session::has('success')): ?>
            <div class="position-fixed alert-toast top-0 start-0 p-3" style="z-index: 11;">
                <div id="alertToast" class="toast text-white bg-success " role="alert" aria-live="assertive"
                    data-bs-delay="2000" aria-atomic="true">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php elseif(Session::has('error')): ?>
            <div class="position-fixed alert-toast top-0 start-0 p-3" style="z-index: 11;">
                <div id="alertToast" class="toast text-white bg-danger" role="alert" aria-live="assertive"
                    data-bs-delay="2000" aria-atomic="true">
                    <div class="d-flex align-items-center gap-3">
                        <div class="toast-body flex-fill">
                            <?php echo e(Session::get('error')); ?>

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('site.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('site.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH /home/frdaysq/public_html/resources/views/site/layout.blade.php ENDPATH**/ ?>