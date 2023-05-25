<?php $__env->startSection('content'); ?>
    <!-- login-register-page-start -->

    <div class="col-sm-6">
        <div class="login-slogan">
            <form action="<?php echo e(route('login')); ?>" method="post" class="form" id="phoneSection">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="register" value="register">
                <div class="slog-title">
                    <h5 class="welcome">مرحبا بعودتك!</h5>
                    <h1 class="title h3">تسجيل الدخول</h1>
                    <p class="subtitle">قم بادخال رقم الهاتف لتتمكن من إنشاء حسابك</p>
                </div>
                <div class="d-flex align-items-stretch gap-3 mb-4" dir="ltr">
                    <div class="col-md-4 form-group">
                        <?php $__currentLoopData = $country_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label for="country-code" class="form-label">رمز الدولة</label>
                            <select class="form-select" id="country-code" name="country_code"
                                aria-label="Default select example">
                                <option selected disabled>اختر رمز الدولة</option>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->country_code); ?></option>
                            </select>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-md-8 form-group flex-fill">
                        <label for="phone" class="form-label">رقم الهاتف</label>
                        <input type="number" class="form-control" id="phone" name="mobile"
                            placeholder="ادخل رقم الهاتف">
                    </div>
                </div>
                <input type="submit" class="btn-1" id="sendCode" value="ارسال الرمز">
            </form>
        </div>
    </div>

    <!-- login-register-page-end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.partials.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/auth/login.blade.php ENDPATH**/ ?>