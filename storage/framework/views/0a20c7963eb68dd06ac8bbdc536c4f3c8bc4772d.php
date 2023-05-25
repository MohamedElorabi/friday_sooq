<?php $__env->startSection('content'); ?>
    <!-- category-items-page-start -->
    <main class="category-items-page">
        <div class="categs-bar">
            <div class="container">
                <div class="owl-carousel categs-carousel owl-theme">
                    <?php $__empty_1 = true; $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="item">
                            <a href="<?php echo e(route('site.subcategory.show', [app()->getLocale(), $sub->slug])); ?>"
                                class="categ shadow-sm" alt="<?php echo e($sub->title); ?>"><?php echo e($sub->title); ?></a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="page-title">
            <div class="container">
                <div class="row main-row">
                    <div class="col-sm-6 d-flex align-items-center justify-content-start mb-2">
                        <h4 class="title"><?php echo e($category->title); ?></h4>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center justify-content-sm-end justify-content-start mb-2">
                        <!--<ul class="controls">-->
                        <!--    <li>-->
                        <!--        <select class="form-select input-1" aria-label="Default select example">-->
                        <!--            <option selected disabled>تصنيف حسب</option>-->
                        <!--            <option value="1">الاقل سعرا</option>-->
                        <!--            <option value="2">الاكثر سعرا</option>-->
                        <!--            <option value="3">المضاف حديثا</option>-->
                        <!--            <option value="4">الاكثر مشاهدة</option>-->
                        <!--        </select>-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </div>
        <?php if(count($subcategories) == 0): ?>
            <!--<div class="category-items-filter">-->
            <!--    <div class="container">-->
            <!--        <div class="content">-->
            <!--            <form action="">-->
            <!--                <div class="row">-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="form-group">-->
            <!--                            <label for="payment" class="form-label">طريقة الدفع</label>-->
            <!--                            <select name="payment" id="payment" class="form-select multi-select"-->
            <!--                                multiple="multiple" style="display: none;">-->
            <!--                                <option value="AL">Alabama</option>-->
            <!--                                <option value="AK">Alaska</option>-->
            <!--                                <option value="AZ">Arizona</option>-->
            <!--                                <option value="AR">Arkansas</option>-->
            <!--                                <option value="CA">California</option>-->
            <!--                            </select>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="form-group">-->
            <!--                            <label for="layers-num" class="form-label">عدد الطوابق</label>-->
            <!--                            <select name="layers-num" id="layers-num" class="form-select multi-select"-->
            <!--                                multiple="multiple" style="display: none;">-->
            <!--                                <option value="AL">Alabama</option>-->
            <!--                                <option value="AK">Alaska</option>-->
            <!--                                <option value="AZ">Arizona</option>-->
            <!--                                <option value="AR">Arkansas</option>-->
            <!--                                <option value="CA">California</option>-->
            <!--                            </select>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="form-group">-->
            <!--                            <label for="ad-status" class="form-label">حالة الاعلان</label>-->
            <!--                            <select name="ad-status" id="ad-status" class="form-select multi-select"-->
            <!--                                multiple="multiple" style="display: none;">-->
            <!--                                <option value="AL">بيع</option>-->
            <!--                                <option value="AK">ايجار</option>-->
            <!--                            </select>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <button type="submit" class="btn-1"><i class="fal fa-search"></i>بحث</button>-->
            <!--            </form>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        <?php endif; ?>

        <section class="items">
            <div class="container">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col-lg-3">
                            <div class="ad-card featured shadow-sm">
                                <a href="<?php echo e(route('ad.show', $ad->slug)); ?>" class="ad-img image-cover sameWidth">
                                    <?php if($ad->special == true): ?>
                                        <small class="featured-badge">اعلان مميز</small>
                                    <?php endif; ?>
                                    <img src="<?php echo e($ad->image); ?>">
                                </a>
                                <div class="content">
                                    <div class="card-hd">
                                        <a href="<?php echo e(route('ad.show', $ad->slug)); ?>" class="title">
                                            <h5><?php echo e($ad->name); ?></h5>
                                        </a>
                                        <div class="categs-date">
                                            <div class="categs">
                                                <p><?php echo e($ad->category_name); ?></p>
                                            </div>
                                            <small class="date"><?php echo e($ad->active_at); ?></small>
                                        </div>
                                    </div>
                                    <div class="card-ftr">
                                        <h5 class="price"><?php echo e($ad->price); ?> <?php echo e($ad->country_currency); ?></h5>
                                        <ul class="ctrls">
                                            <li>
                                                <button
                                                    class="ctrl-btn like-btn <?php if($ad->Favoried == true): ?> active <?php endif; ?>"
                                                    data-href="<?php echo e(route('toggle_like', $ad->id)); ?>">
                                                    <img src="<?php echo e(asset('wb/icons/heart-white-r.svg')); ?>" class="icon-img">
                                                </button>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('ad.show', $ad->slug)); ?>#comments" class="ctrl-btn">
                                                    <img src="<?php echo e(asset('wb/icons/comment-white-r.svg')); ?>"
                                                        class="icon-img">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="user-profile.html" class="user ctrl-btn image-cover">
                                                    <img src="<?php echo e($ad->user_image); ?>">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-area">
                            <div class="icon">
                                <img src="<?php echo e(asset('wb/imgs/no-ads.png')); ?>" alt="no-ads">
                            </div>
                            <h4 class="title">لا يوجد اعلانات</h4>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php echo e($ads->onEachSide(0)->links()); ?>

        </section>
    </main>

    <!-- category-items-page-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script src="<?php echo e(asset('wb/js/BsMultiSelect.min.js')); ?>"></script>
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
    </script>
    <script>
        // like-ad-and-unlike
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
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/ads/category.blade.php ENDPATH**/ ?>