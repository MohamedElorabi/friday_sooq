
<?php $__env->startSection('content'); ?>
    <!-- category-items-page-start -->
    <section class="all-shops-cards" id="marginForNav">
        <div class="container">
            <div class="search-categories">
                <div class="container">
                    <div class="categories">
                        <div class="categories-carousel owl-carousel owl-theme">
                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <a href="<?php echo e(route('site.store.type.show', $type->id)); ?>"
                                        class="cate"><?php echo e($type->name); ?></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-6 mb-4">
                        <div class="shop-card shadow-sm">
                            <a href="<?php echo e(route('site.store.show', $store->id)); ?>" class="image image-cover customSmHeight">
                                <img src="<?php echo e($store->avatar); ?>" alt="shop">
                            </a>
                            <div class="card-body">
                                <div class="name-type">
                                    <div class="shop-name">
                                        <h5 class="name text-truncate"><?php echo e($store->name); ?></h5>
                                        <span><i class="fas fa-check"></i></span>
                                    </div>
                                    <p class="shop-type"><?php echo e($store->type_name); ?></p>
                                </div>
                                <div class="actions">
                                    <a href="#" data-href="<?php echo e(route('change.follow.unfollow', $store->id)); ?>"
                                        data-id="<?php echo e($store->user_id); ?>" class="follow">
                                        <?php if($store->is_follow == true): ?>
                                            <i class="fal fa-user-times"></i>
                                            <?php echo e(__('site.Un_follow')); ?>

                                        <?php else: ?>
                                            <i class="fal fa-plus"></i>
                                            <?php echo e(__('site.Follow')); ?>

                                        <?php endif; ?>
                                    </a>
                                    
                                    <div class="ctrls">
                                        <button><i class="demo-icon icon-share">&#xe80a;</i></button>
                                        <button class="favourite <?php if($store->StoreLike == true): ?> active <?php endif; ?>"
                                            data-href="<?php echo e(route('store.toggle_like', $store->id)); ?>"><i
                                                class="demo-icon icon-heart-empty">&#xe805;</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    لا يوجد متاجر
                <?php endif; ?>
            </div>
            <?php echo e($stores->links()); ?>

        </div>
    </section>

    <!-- category-items-page-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $('.categs-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            dots: false,
            autoWidth: true,
        })

        $(function() {

            $(".multi-select").bsMultiSelect();

        });




        // categories

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
        });
        var swiper = new Swiper(".lgAdsSwiper", {
            direction: "vertical",
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/storetype/show.blade.php ENDPATH**/ ?>