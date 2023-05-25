
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('site.stores')); ?>"><small>المتاجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>طلب منتج</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="create-ad">
        <div class="container">

            <form class="ad-form" action="<?php echo e(route('product_order.store')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="imgs-uploader white-card">
                            <!-- <div id="uppy-container"></div> -->
                            <div class="image-uploader">
                                <div class="input-div">
                                    <div class="input">
                                        <i class="fal fa-plus"></i>
                                        <input class="form-control" type="file" id="files" name="image[]" multiple />
                                    </div>
                                    <?php if($errors->has('image[]')): ?>
                                        <span class="text-danger text-left"><?php echo e($errors->first('image[]')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="uploaded-files">
                                    <div class="row" id="uploadedFiles">
                                    </div>
                                </div>
                                <div class="placeholder" id="placeholder">
                                    <i class="fal fa-cloud-upload"></i>
                                    <h5 class="title">قم بسحب الصور وافلاتها هنا او اضغط لاختيار الصور </h5>
                                    <p>يمكنك تحميل 4 صور بحد اقصى</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ad-inputs white-card">
                            <div class="form-group mb-4">
                                <label for="full-name" class="form-label">الاسم الكامل</label>
                                <input type="text" class="form-control input-1" name="fullname" id="full-name"
                                    placeholder="اضف الاسم الكامل">
                                <?php if($errors->has('fullname')): ?>
                                    <span class="text-danger text-left"><?php echo e($errors->first('fullname')); ?></span>
                                <?php endif; ?>
                            </div>


                            <div class="form-group mb-4">
                                <label for="email" class="form-label">البريد الالكترونى (اختيارى)</label>
                                <input type="email" class="form-control input-1" name="email" id="email"
                                    placeholder="اضف البريد الالكترونى">
                            </div>
                            <div class="row" dir="ltr">
                                <div class="col-md-5 col-sm-6">
                                    <div class="form-group mb-4">
                                        <label for="country-code" class="form-label">كود المحافظة</label>
                                        <select class="form-select input-1" aria-label="Default select example"
                                            name="country_code" id="country-code">
                                            <option selected disabled>اختر كود المحافظة</option>
                                            <option value="1">مصر (+20)</option>
                                            <option value="2">الكويت (+000)</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-6 mb-4">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">رقم الهاتف</label>
                                        <input type="text" class="form-control input-1" name="phone" id="phone"
                                            placeholder="اضف رقم الهاتف">
                                        <?php if($errors->has('phone')): ?>
                                            <span class="text-danger text-left"><?php echo e($errors->first('phone')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group mb-4">
                                <label for="product-name" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control input-1" name="name" id="name"
                                    placeholder="اكتب اسم المنتج هنا">
                                <?php if($errors->has('name')): ?>
                                    <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>



                            <div class="form-group mb-4">
                                <label for="describtion" class="form-label">مواصفات المنتج</label>
                                <textarea class="form-control input-1" name="description" id="describtion" rows="6"
                                    placeholder="اكتب مواصفات المنتج بشكل دقيق هنا"></textarea>
                                <?php if($errors->has('description')): ?>
                                    <span class="text-danger text-left"><?php echo e($errors->first('description')); ?></span>
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn-1 w-100">ارسال الطلب</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/products/product_order.blade.php ENDPATH**/ ?>