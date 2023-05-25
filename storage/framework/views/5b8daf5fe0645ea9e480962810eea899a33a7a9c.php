<?php $__env->startPush('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- category-items-page-start -->


    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الاعلانات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="ads-cards">
        <div class="container">
            <div class="search-categories">
                <div class="search">
                    <form class="d-flex" action="<?php echo e(route('search.home')); ?>">
                        <select class="form-control" name="search" id="search" type="search"
                            data-placeholder="اكتب كلمة البحث هنا">
                        </select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
                <div class="categories">
                    <div class="categories-carousel owl-carousel owl-theme">
                        <?php $__empty_1 = true; $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="item">
                                <a href="<?php echo e(route('site.subcategory.show',$sub->id)); ?>"
                                    class="cate"><?php echo e($sub->title); ?></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__empty_2 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                    <div class="col-xl-3 col-md-4 col-6 mb-4">
                        <div class="ad-card-2 sameHeight text-white">
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
                            <div class="card-content h-100">
                                <a href="<?php echo e(route('ad.show', $ad->slug)); ?>" class="stretched-link"></a>
                                <div class="image image-cover h-100">
                                    <img src="<?php echo e($ad->image); ?>" alt="ad">
                                </div>
                                <div class="card-img-overlay">
                                    <h5 class="ad-title text-truncate"><?php echo e($ad->name); ?></h5>
                                    <ul class="details-bar">
                                        <li>
                                            <small><i class="far fa-clock"></i><?php echo e($ad->active_at); ?></small>
                                        </li>
                                        <li>
                                            <small><i class="far fa-eye"></i><?php echo e($ad->views); ?></small>
                                        </li>
                                        <li>
                                            <small><i class="fas fa-camera"></i><?php echo e(count($ad->images)); ?></small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <div class="empty-area">
                        <div class="icon">
                            <img src="<?php echo e(asset('wb/imgs/no-ads.png')); ?>" alt="no-ads">
                        </div>
                        <h4 class="title">لا يوجد اعلانات</h4>
                    </div>
                <?php endif; ?>
            </div>
            <?php echo e($ads->links()); ?>


            
        </div>
    </section>

    <!-- category-items-page-end -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.categs-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            dots: false,
            autoWidth: true,
        })

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

        $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "<?php echo e(route('search.category')); ?>",
                data: function(params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }
                    // Query parameters will be ?search=[term]&page=[page]
                    return query;
                },
                templateResult: function(d) {
                    return $(d.text);
                },
                templateSelection: function(d) {
                    return $(d.text);
                },
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/category/show.blade.php ENDPATH**/ ?>