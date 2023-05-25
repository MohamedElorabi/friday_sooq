
<?php $__env->startPush('styles'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('site.stores')); ?>"><small>المتاجر</small></a></li>
                <li class="breadcrumb-item"><a href="site.store.show"><small>تفاصيل المتجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الأجهزة المنزلية والإلكترونيات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-field-ads" id="marginForNav">
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
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search">
                        </select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn">
                                <i class="fal fa-heart"></i>
                            </button>
                            <a href="<?php echo e(route('product.details', $product->id)); ?>" class="image image-cover customSmHeight">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    لا يوجد منتجات
                <?php endif; ?>
            </div>

            <?php echo e($products->links()); ?>

            
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "<?php echo e(route('search.products')); ?>",
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

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/stores/category_products.blade.php ENDPATH**/ ?>