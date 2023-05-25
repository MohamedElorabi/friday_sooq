
<?php $__env->startSection('content'); ?>
    <section class="product-details-page">
        <div class="container">
            <form action="<?php echo e(route('add.to.cart', $product->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="slogan-right white-card">
                            <div class="product-images btm-border-sec">
                                <div class="owl-carousel product-img-carousel owl-theme">
                                    <?php $__empty_1 = true; $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="item image-cover customSmHeight">
                                            <img src="<?php echo e($image->image); ?>" alt="product-img">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="description">
                                <h5 class="details-title">الوصف</h5>
                                <p>
                                    <?php echo e($product->desc); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="slogan-left white-card">
                            <div class="main-details btm-border-sec">
                                <div class="name-price">
                                    <h4 class="prod-name"><?php echo e($product->name); ?></h4>
                                    <h5 class="price"><?php echo e($product->price); ?> د.ك</h5>
                                </div>
                                <button type="button" class="favourite-btn">
                                    <i class="fal fa-heart"></i>
                                </button>
                            </div>
                            <div class="options btm-border-sec">
                                <div class="row">
                                    <div class="col-sm-6 mb-sm-0 mb-4">
                                        <div class="qty">
                                            <h6 class="details-subtitle">الكمية</h6>
                                            <div class="qty-input">
                                                <button type="button" id="minus">
                                                    <i class="fal fa-minus"></i>
                                                </button>
                                                <input type="text" name="qty" value="1" />
                                                <button type="button" id="plus">
                                                    <i class="fal fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="colors">
                                            <h6 class="details-subtitle">الالوان</h6>
                                            <ul class="colors-checks">
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="red"
                                                        value="red" autocomplete="off">
                                                    <label class="color-check" for="red"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="yellow"
                                                        value="yellow" autocomplete="off">
                                                    <label class="color-check" for="yellow"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="blue"
                                                        value="blue" autocomplete="off">
                                                    <label class="color-check" for="blue"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="green"
                                                        value="green" autocomplete="off">
                                                    <label class="color-check" for="green"></label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-1"><i class="fal fa-plus"></i>اضف الى العربة</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $('.product-img-carousel').owlCarousel({
            rtl: true,
            items: 1,
            margin: 0
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/products/show.blade.php ENDPATH**/ ?>