
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('loyalty_program.index')); ?>"><small>برنامج الولاء</small></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>شراء النقاط</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="loyalty-program-page link-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-lg-auto m-0">
                    <div class="white-card h-100">
                        <div class="icon sameHeight">
                            <img src="<?php echo e(asset('wb/imgs/icons/buy-points.svg')); ?>" alt="buy-points">
                        </div>
                        <div class="total-points">
                            <h5 class="title">
                                مجموع النقاط:
                            </h5>
                            <h5 class="num">4599</h5>
                            <h5 class="price">مقابل 4.55 د.ك</h5>
                        </div>
                        <form action="">
                            <div class="form-group mb-4">
                                <label for="phone" class="form-label">إختر عدد النقاط المطلوبة شرائها:</label>
                                <div class="row">
                                    <?php $__currentLoopData = $point_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-sm-4 mb-sm-0 mb-3 d-flex align-items-center">
                                            <div class="points-radio">
                                                <input type="radio" class="btn-check" name="points"
                                                    value="<?php echo e($point->points); ?>" id="<?php echo e($point->id); ?>" autocomplete="off"
                                                    required>
                                                <label class="points-label shadow-sm" for="<?php echo e($point->id); ?>">
                                                    <div class="label-head">
                                                        <h5 class="num"><?php echo e($point->points); ?></h5>
                                                        <p class="name">نقطة</p>
                                                    </div>
                                                    <div class="label-body">
                                                        <p class="price"><?php echo e($point->price); ?> د.ك</p>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-sm-0 mb-3">
                                    <button type="submit" class="btn-1 m-auto w-100">ادفع الان</button>
                                </div>
                                <div class="col-sm-6">
                                    <button type="buttn" class="btn-2 m-auto w-100">اعادة تعيين</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/loyalty_program/buy_points.blade.php ENDPATH**/ ?>