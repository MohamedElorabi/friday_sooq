<?php $__env->startPush('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section class="ads-cards" id="marginForNav">
        <div class="container">
            <div class="search-categories">
                <div class="search">
                    <form action="<?php echo e(route('search.home')); ?>" class="d-flex">
                        <select class="form-control" id="search" name="name" type="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search">
                        </select>
                        <button class="submit-btn" type="button"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>

                <div id="product_list"></div>

                <div class="categories">
                    <div class="categories-carousel owl-carousel owl-theme">
                        <div class="item">
                            <a href="<?php echo e(route('category.index')); ?>" class="cate active-cate">الكل</a>
                        </div>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <a href="<?php echo e(route('category.show', $category->slug)); ?>"
                                    class="cate"><?php echo e($category->title); ?></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="ad-card image-cover sameHeight">
                            <a href="<?php echo e(route('ad.show', $ad->slug)); ?>" class="stretched-link"></a>
                            <?php if($ad->special == true): ?>
                                <div class="featured-ribbon">
                                    <div class="ribbon">
                                        اعلان مميز
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if($ad->active == 'sold'): ?>
                                <small class="sold-ribbon"><?php echo e($ad->active); ?></small>
                            <?php endif; ?>
                            <img src="<?php echo e($ad->image); ?>" alt="ad">
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <div class="bottom-nav nav-bottom fixed-bottom">
        <div class="buttons-bar">
            <a href="<?php echo e(route('category.index')); ?>" class="fields button" id="bottomBtn"><i
                    class="demo-icon icon-fields">&#xe806;</i><span>الاقسام</span></a>
            <a href="<?php echo e(route('site.stores')); ?>" class="shops button" id="bottomBtn"><i
                    class="demo-icon icon-shops">&#xe803;</i><span>المتاجر</span></a>
            <div class="start-button hvr-ripple-out" id="startBtn">
                <div class="waves-circle">
                    <p>ابدأ</p>
                    <img src="<?php echo e(asset('wb/imgs/wave1.svg')); ?>" class="wave-1" id="wave" alt="wave">
                    <img src="<?php echo e(asset('wb/imgs/wave2.svg')); ?>" class="wave-2" id="wave" alt="wave">
                </div>
            </div>

            <a href="#" class="home button" id="bottomBtn"><i
                    class="demo-icon icon-home">&#xe807;</i><span>الرئيسية</span></a>
            <a href="<?php echo e(route('ad.index')); ?>" class="ads button" id="bottomBtn">
                <i class="fas fa-ad"></i><span>الاعلانات</span></a>
            <a href="<?php echo e(route('ad.create')); ?>" class="add-ad button" id="bottomBtn">
                <i class="demo-icon icon-plus">&#xe809;</i><span>اضف
                    اعلان</span></a>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    



    <script>
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

        var data = [{
                id: 0,
                text: '1'
            },
            {
                id: 1,
                text: '2'
            },
        ];

        let selectInit = $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "<?php echo e(route('search.home')); ?>",
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function(data, params) {
                    const results = $.map(data, (item) => {
                        item.text = item.text;
                        return item
                    })
                    return {
                        results: results
                    }
                }
            }
        });

        $('#search').on('select2:select', function(e) {
            let adSlug = e.params.data.slug,
                url = '<?php echo e(route('ad.show', ':slug')); ?>';

            url = url.replace(':slug', adSlug);
            setTimeout(() => {
                $(selectInit).val(null).trigger("change");
            }, 100);
            setTimeout(() => {
                window.location.href = url;
            }, 150);
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('site.partials.search_script'); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/home.blade.php ENDPATH**/ ?>