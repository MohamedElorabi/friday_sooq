
<?php $__env->startPush('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>شوهد مؤخرا</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="ads-cards">
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
                    <form class="d-flex" action="<?php echo e(route('search.home')); ?>">
                        <select class="form-control" name="search" id="search" type="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search"></select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
            </div>

            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-xl-3 col-md-4 col-6 mb-4">
                        <div class="ad-card-2 sameHeight text-white">
                            <?php if($ad->special == true): ?>
                                <div class="featured-ribbon">
                                    <div class="ribbon">
                                        اعلان مميز
                                    </div>
                                </div>
                            <?php endif; ?>
                            <small class="sold-ribbon"><?php echo e($ad->active); ?></small>
                            <div class="card-content h-100">
                                <a href="<?php echo e(route('ad.show', $ad->slug)); ?>" class="stretched-link"></a>
                                <div class="image image-cover h-100">
                                    <img src="<?php echo e($ad->image); ?>" alt="ad">
                                </div>
                                <div class="card-img-overlay">
                                    <h5 class="ad-title text-truncate"><?php echo e($ad->name); ?></h5>
                                    <ul class="details-bar">
                                        <li>
                                            <small><i class="far fa-clock"></i><?php echo e($ad->created_at); ?></small>
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="empty-area">
                        <img src="<?php echo e(asset('wb/imgs/no-ads.svg')); ?>" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد اعلانات تمت مشاهدتها حتى الان</p>
                    </div>
                <?php endif; ?>
            </div>


            <?php echo e($ads->links()); ?>



            
        </div>
    </section>
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

        $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "<?php echo e(route('search.home')); ?>",
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
<?php $__env->startPush('site.partials.search_script'); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/ads/recent-viewed.blade.php ENDPATH**/ ?>