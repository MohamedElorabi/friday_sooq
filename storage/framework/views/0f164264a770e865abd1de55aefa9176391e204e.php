
<?php $__env->startPush('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4 class="title">المتاجر الشائعة</h4>
                </li>
            </ol>
        </div>
    </nav>



    <section class="all-shops-cards" id="marginForNav">
        <div class="container">

            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $popular_stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-6 mb-4">
                        <div class="shop-card shadow-sm">
                            <a href="<?php echo e(route('site.store.show', $item->id)); ?>" class="image image-cover customSmHeight">
                                <img src="<?php echo e($item->avatar); ?>" alt="shop">
                            </a>
                            <div class="card-body">
                                <div class="name-type">
                                    <div class="shop-name">
                                        <h5 class="name text-truncate"><?php echo e($item->name); ?></h5>
                                        <span><i class="fas fa-check"></i></span>
                                    </div>
                                    <p class="shop-type"><?php echo e($item->type_name); ?></p>
                                </div>
                                <div class="actions">
                                    <a href="#" data-href="<?php echo e(route('change.follow.unfollow', $item->id)); ?>"
                                        data-id="<?php echo e($item->user_id); ?>" class="follow">
                                        <?php if($item->is_follow == true): ?>
                                            <i class="fal fa-user-times"></i>
                                            <?php echo e(__('site.Un_follow')); ?>

                                        <?php else: ?>
                                            <i class="fal fa-plus"></i>
                                            <?php echo e(__('site.Follow')); ?>

                                        <?php endif; ?>
                                    </a>
                                    
                                    <div class="ctrls">
                                        <button><i class="demo-icon icon-share">&#xe80a;</i></button>
                                        <button class="favourite <?php if($item->itemLike == true): ?> active <?php endif; ?>"
                                            data-href="<?php echo e(route('store.toggle_like', $item->id)); ?>"><i
                                                class="demo-icon icon-heart-empty">&#xe805;</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
            <?php echo e($popular_stores->links()); ?>

        </div>
    </section>

    <nav class="navbar fixed-bottom navbar-light nav-bottom shops-bottom-nav">
        <div class="container">
            <div class="plus-btn">
                <div class="dropdown dropup">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fal fa-plus"></i>
                    </button>
                    <ul class="dropdown-menu btn-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a href="quick-ad.html">
                                <i class="fal fa-ad"></i>
                                إضافة إعلان تجاري سريع
                            </a>
                        </li>
                        <li>
                            <a href="add-update.html">
                                <i class="fal fa-pen-square"></i>
                                إضافة تحديث
                            </a>
                        </li>
                        <li>
                            <a href="send-notifs-in-app.html">
                                <i class="fal fa-bell-plus"></i>
                                نشر إشعار عبر التطبيق
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('create.offer')); ?>">
                                <i class="fal fa-badge-percent"></i>
                                إضافة عرض
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('store.product.create')); ?>">
                                <i class="fal fa-box-open"></i>
                                إضافة منتج
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('category.create')); ?>">
                                <i class="fal fa-file-plus"></i>
                                إضافة قسم
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul>
                <li>
                    <a href="<?php echo e(route('index')); ?>">
                        <i class="demo-icon icon-home">&#xe807;</i>
                        <p>الرئيسية</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('store.coupons')); ?>">
                        <i class="fas fa-badge-percent"></i>
                        <p>تخفيضات</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('store.products')); ?>">
                        <i class="fas fa-boxes"></i>
                        <p>جميع المنتجات</p>
                    </a>
                </li>
                <li>
                    <a href="my-orders.html">
                        <i class="fas fa-box"></i>
                        <p>طلباتى</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('product_order')); ?>">
                        <i class="fas fa-box-alt"></i>
                        <p>طلب منتج</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
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
        })


        $('.categs-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            dots: false,
            autoWidth: true
        });


        // like-ad-and-unlike
        $('body').on('click', '.favourite', function(e) {
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
                    console.log(data)
                    if (data.like) {
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            });
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

        let selectInit = $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "<?php echo e(route('search.store')); ?>",
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
            let storeId = e.params.data.id,
                url = '<?php echo e(route('site.store.show', ':id')); ?>';

            url = url.replace(':id', storeId);
            setTimeout(() => {
                $(selectInit).val(null).trigger("change");
            }, 100);
            setTimeout(() => {
                window.location.href = url;
            }, 150);
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/popular_stores.blade.php ENDPATH**/ ?>