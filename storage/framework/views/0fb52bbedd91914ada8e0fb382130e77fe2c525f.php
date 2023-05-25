
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الاقسام</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="fields-cards">
        <div class="fields-row">
            <div class="container">
                <div class="row">

                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4 col-6">
                            <a href="<?php echo e(route('category.show', $category->slug)); ?>" class="field-card">
                                <img src="<?php echo e($category->image); ?>">
                                <p><?php echo e($category->title); ?></p>
                            </a>
                            
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="carousel-row">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel ads-carousel owl-theme">
                        <div class="item">
                            <a href="#" class="ad-image">
                                <img src="<?php echo e(asset('wb/imgs/ad-image.svg')); ?>" alt="ad">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('custom-scripts'); ?>
    <script>
        $('.ads-carousel').owlCarousel({
            rtl: true,
            margin: 20,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/category/index.blade.php ENDPATH**/ ?>