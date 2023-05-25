

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('wb/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('wb/css/owl.theme.default.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('site.stores')); ?>"><small>المتاجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>جميع المنتجات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shops-banners">
        <div class="container">
            <div class="search-categories">
                <div class="search">
                    <ul class="filters">
                        <li>
                            <div class="dropdown">
                                <button class="fltr-btn sameHeight" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fal fa-sliders-h-square"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fal fa-long-arrow-up"></i>
                                            الاعلى تقييما
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fal fa-long-arrow-down"></i>
                                            الاقل تقييما
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <select class="form-control" name="search" id="search" type="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search"></select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
            </div>
            <div class="owl-carousel shop-banner-carousel owl-theme">
                <div class="item">
                    <div class="ad-card-2 customXSmHeight text-white">
                        <div class="card-content h-100">
                            <a href="product-details.html" class="stretched-link"></a>
                            <div class="image image-cover h-100">
                                <img src="<?php echo e(asset('wb/imgs/store-img.svg')); ?>" alt="store">
                            </div>
                            <div class="card-img-overlay">
                                <h5 class="ad-title text-truncate">اسم المنتج هنا</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ad-card-2 customXSmHeight text-white">
                        <div class="card-content h-100">
                            <a href="product-details.html" class="stretched-link"></a>
                            <div class="image image-cover h-100">
                                <img src="<?php echo e(asset('wb/imgs/store-img.svg')); ?>" alt="store">
                            </div>
                            <div class="card-img-overlay">
                                <h5 class="ad-title text-truncate">اسم المنتج هنا</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="common-shops">
        <div class="container">
            <div class="section-title">
                <h4 class="title">المنتجات الشائعة</h4>
                <ul class="btns">
                    <li>
                        <a href="#" class="ctrl-btn">عرض الكل</a>
                    </li>
                </ul>
            </div>

            <div class="owl-carousel common-shops-carousel owl-theme">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product->views >= 100): ?>
                        <div class="item">
                            <div class="shop-field-card shadow-sm">
                                <button class="favourite-btn">
                                    <i class="fal fa-heart"></i>
                                </button>
                                <a href="<?php echo e(route('product.details', $product->id)); ?>"
                                    class="image image-cover customSmHeight">
                                    <img src="<?php echo e($product->image); ?>" alt="ad">
                                </a>
                                <div class="card-body">
                                    <div class="text">
                                        <h6 class="name text-truncate"><?php echo e($product->name); ?></h6>
                                        <h5 class="price"><?php echo e($product->price); ?>د.ك</h5>
                                    </div>
                                    <button class="add-to-cart"><i class="fal fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <section class="all-shops-cards" id="marginForNav">
        <div class="container">
            <div class="search-categories">
                <div class="container">
                    <div class="categories">
                        <div class="categories-carousel owl-carousel owl-theme">
                            <div class="item">
                                <a href="#" class="cate active-cate">الكل</a>
                            </div>

                            <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item">
                                    <a href="<?php echo e(route('category.show', $type->id)); ?>"
                                        class="cate"><?php echo e($type->name); ?></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn">
                                <i class="fal fa-heart"></i>
                            </button>
                            <a href="<?php echo e(route('product.details', $product->id)); ?>"
                                class="image image-cover customSmHeight">
                                <img src="<?php echo e($product->image); ?>" alt="ad">
                            </a>
                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate"><?php echo e($product->name); ?></h6>
                                    <h5 class="price"><?php echo e($product->price); ?>د.ك</h5>
                                </div>
                                <a href="<?php echo e(route('add.to.cart', $product->id)); ?>" class="add-to-cart"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <p>لا يوجد منتجات</p>
                <?php endif; ?>


            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="<?php echo e(asset('wb/js/owl.carousel.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var rtlVal = $("html").attr("dir") == "rtl" ? true : false;
        $('.shop-banner-carousel').owlCarousel({
            margin: 10,
            nav: true,
            rtl: rtlVal,
            items: 1,
            autoplay: true,
            smartSpeed: 750,
            navText: ["<i class='fal fa-chevron-right'></i>", "<i class='fal fa-chevron-left'></i>"]
        })

        $('.common-shops-carousel').owlCarousel({
            margin: 25,
            nav: false,
            dots: false,
            rtl: rtlVal,
            autoplay: true,
            smartSpeed: 750,
            responsive: {
                0: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        })

        $('.categories-carousel').owlCarousel({
            rtl: rtlVal,
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

        let selectInit = $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "<?php echo e(route('search.products')); ?>",
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
            let adId = e.params.data.id,
                url = '<?php echo e(route('product.details', ':id')); ?>';

            url = url.replace(':id', adId);
            setTimeout(() => {
                $(selectInit).val(null).trigger("change");
            }, 100);
            setTimeout(() => {
                window.location.href = url;
            }, 150);
        });
    </script>





    
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/products/index.blade.php ENDPATH**/ ?>