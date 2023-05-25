<?php $__env->startSection('content'); ?>
    <div class="col-sm-6">
        <div class="login-slogan">
            <form action="<?php echo e(route('register')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="slog-title">
                    <h5 class="welcome">مرحبا بك فى سوق الجمعة!</h5>
                    <h1 class="title h3">انشاء حساب</h1>
                    <p class="subtitle">قم باكمال معلوماتك الشخصية لتتمكن من انشاء حسابك</p>
                </div>
                <div class="form-group mb-3">
                    <label for="storeImgUploader" class="form-label text-center">صورتك الشخصية</label>
                    <div class="profile-img sameHeight" id="storeImg">
                        <div class="uploader-div">
                            <div class="uploader-input">
                                <i class="fal fa-pen"></i>
                                <input type="file" class="form-control" name="image" id="storeImgUploader">
                            </div>
                        </div>
                        <img src="<?php echo e(asset('wb/imgs/user-img.svg')); ?>" alt="profile-img" class="default-img">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="name" class="form-label">اسمك الكامل</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ادخل اسمك كاملا"
                        aria-describedby="nameHelp" required>
                </div>
                <button type="submit" class="btn btn-primary btn-1">انشاء حساب</button>
            </form>
        </div>
    </div>

    <!-- login-register-page-end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.partials.auth.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/auth/register.blade.php ENDPATH**/ ?>