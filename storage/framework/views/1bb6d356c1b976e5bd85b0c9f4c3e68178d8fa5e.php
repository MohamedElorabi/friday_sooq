

<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="upgrade-to-shop.html"><small>الترقية الى المتاجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الباقات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-packages-page">
        <div class="container">
            <div class="row">

                <?php $__empty_1 = true; $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card package-card-2 basic shadow-sm">
                            <div class="card-head">
                                <div class="name">
                                    <h3>اساسى</h3>
                                </div>
                                <p class="main-text">
                                    <?php echo e($package->name); ?>

                                </p>
                            </div>
                            <div class="card-body">
                                <div class="price">
                                    <h2 class="num"><?php echo e($package->price); ?></h2>
                                    <small>KWD</small>
                                </div>
                                <ul class="features">
                                    <li>
                                        <i class="fal fa-check"></i>
                                        <p><?php echo e($package->period); ?></p>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn-3">شراء هذه الباقة</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/store_packages.blade.php ENDPATH**/ ?>