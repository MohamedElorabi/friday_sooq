
<?php $__env->startSection('content'); ?>
    <!-- my-favourites-page-start -->
    <section class="my-favourites-page">
        <div class="container">
            <div class="search-categories">
                <div class="section-title">
                    <h4 class="title"><?php echo e(__('site.Favourites')); ?></h4>
                </div>
                <div class="categories">

                    <div class="categories-carousel owl-carousel owl-theme">

                        <div class="item">
                            <a id="activate-products" class="cate active-cate" href="" class="cate">الإعلانات</a>
                        </div>
                        <div class="item">
                            <a id="archived-products" href="" class="cate">المتاجر</a>
                        </div>
                        <div class="item">
                            <a id="waiting-products" href="" class="cate">المنتجات</a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($ad->special == true): ?>
                        <div class="featured-ribbon">
                            <div class="ribbon">
                                إعلان مميز
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn active favourite <?php if($ad->Favoried == true): ?> active <?php endif; ?>"
                                data-href="<?php echo e(route('toggle_like', $ad->id)); ?>">
                                <i class="fal fa-heart"></i>
                            </button>

                            <a href="<?php echo e(route('ad.show', $ad->slug)); ?>" class="image image-cover customSmHeight">
                                <img src="<?php echo e($ad->images[0]->image); ?>" alt="ad">
                            </a>

                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate"><?php echo e($ad->name); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-area">
                        <img src="<?php echo e(asset('wb/imgs/no-favourites.svg')); ?>" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد إعلانات مفضلة حتى الان</p>
                    </div>
                <?php endif; ?>

                <?php echo e($ads->links()); ?>

            </div>



            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn active favourite <?php if($store->Favoried == true): ?> active <?php endif; ?>"
                                data-href="">
                                <i class="fal fa-heart"></i>
                            </button>

                            <a href="" class="image image-cover customSmHeight">
                                <img src="<?php echo e($store->avatar); ?>" alt="ad">
                            </a>

                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate"><?php echo e($store->name); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-area">
                        <img src="<?php echo e(asset('wb/imgs/no-favourites.svg')); ?>" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد إعلانات مفضلة حتى الان</p>
                    </div>
                <?php endif; ?>

                <?php echo e($ads->links()); ?>

            </div>


            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn active favourite <?php if($product->Favoried == true): ?> active <?php endif; ?>"
                                data-href="">
                                <i class="fal fa-heart"></i>
                            </button>

                            <a href="" class="image image-cover customSmHeight">
                                <img src="<?php echo e($product->image); ?>" alt="ad">
                            </a>

                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate"><?php echo e($product->name); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-area">
                        <img src="<?php echo e(asset('wb/imgs/no-favourites.svg')); ?>" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد إعلانات مفضلة حتى الان</p>
                    </div>
                <?php endif; ?>

                <?php echo e($ads->links()); ?>

            </div>

        </div>

    </section>
    <!-- my-favourites-page-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $('body').on('click', '.like-btn', function(e) {
            //   alert(1232);
            e.preventDefault();
            <?php if(!auth()->user()): ?>
                window.location.href = "<?php echo e(route('login')); ?>";
                return;
            <?php endif; ?>
            var thislike = $(this);
            $.ajax({
                url: thislike.data('href'),
                method: "GET",
                success: function(data) {
                    if (data['like']) {
                        var html = '<i class="fas fa-heart" style="color: var(--main-color)"></i>';
                    } else {
                        var html = '<i class="fal fa-heart"></i>';
                    }
                    thislike.html(html);
                }
            })
        });







        $('.categories-carousel').owlCarousel({
            rtl: true,
            margin: 20,
            autoWidth: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/user/myfavs.blade.php ENDPATH**/ ?>