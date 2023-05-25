
<?php $__env->startSection('content'); ?>
    <div class="col-sm-6">
        <div class="login-slogan">
            <form action="<?php echo e(route('verifyCode')); ?>" method="post" id="codeForm">
                <?php echo csrf_field(); ?>
                <div class="slog-title">
                    <h5 class="welcome">مرحبا بعودتك!</h5>
                    <h1 class="title h3">تأكيد رقم الهاتف</h1>
                    <p class="subtitle">برجاء ادخال الرمز المكون من 4 ارقام المرسل الى هاتفك</p>
                </div>
                <div class="form-group mb-3">
                    <div class="number-code" dir="ltr" id="verifyCode">
                        <input type="number" class="code-input form-control" required />
                        <input type="number" class="code-input form-control" required />
                        <input type="number" class="code-input form-control" required />
                        <input type="number" class="code-input form-control" required />
                    </div>
                    <input type="text" name="code" id="resultInput" hidden />
                </div>
                <button type="submit" class="btn btn-primary btn-1">
                    تأكيد رقم الهاتف
                </button>
                <p class="dont-sent">
                    لم تستلم رسالة ؟ <a id="resend">إعادة الارسال</a><span id="time">(02:00)</span>
                </p>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('wb/js/timer.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.partials.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/auth/confirm_code.blade.php ENDPATH**/ ?>