
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>برنامج الولاء</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="loyalty-program-page">
        <div class="container">
            <div class="white-card">
                <div class="account-name">
                    <div class="image image-cover sameHeight">
                        <img src="<?php echo e(auth()->user()->image); ?>" alt="user">
                    </div>
                    <p>مرحبا! <span class="name"><?php echo e(auth()->user()->name); ?></span></p>
                </div>
                <h5 class="welcome">!أهلا وسهلا بعودتك</h5>
                <p class="member-num">رقم العضوية: <span class="num">123456789</span></p>
                <div class="points-progress gold">
                    <img src="<?php echo e(asset('wb/imgs/member-layer.svg')); ?>" class="layer-img" alt="layer">
                    <div class="progress-details">
                        <div class="layer-name-points">
                            <h6 class="name">ذهبية</h6>
                            <h6 class="points"><?php echo e(auth()->user()->points); ?> نقطة</h6>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <small class="rest-points">اكسب 401 نقطة اخرى للوصول الى البلاتين</small>
                    </div>
                </div>
            </div>
            <div class="links">
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <a href="<?php echo e(route('send.points')); ?>" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/points-trans.svg')); ?>" class="icon" alt="points-trans">
                            <h6 class="title">حول نقاط</h6>
                        </a>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="<?php echo e(route('earn.points')); ?>" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/points-earning.svg')); ?>" class="icon" alt="points-earning">
                            <h6 class="title">أكسب نقاط</h6>
                        </a>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="<?php echo e(route('buy.points')); ?>" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/buy-points.svg')); ?>" class="icon" alt="buy-points">
                            <h6 class="title">إشتر نقاط</h6>
                        </a>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="<?php echo e(route('replace.points')); ?>" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/redeem-points.svg')); ?>" class="icon" alt="redeem-points">
                            <h6 class="title">استبدال النقاط</h6>
                        </a>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="membership-card.html" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/membership-card.svg')); ?>" class="icon"
                                alt="membership-card">
                            <h6 class="title">بطاقة عضوية</h6>
                        </a>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="donate.html" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/donate.svg')); ?>" class="icon" alt="donate">
                            <h6 class="title">تبرع</h6>
                        </a>
                    </div>
                    <div class="col-sm-3 col-6">
                        <a href="shopping.html" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/shopping.svg')); ?>" class="icon" alt="shopping">
                            <h6 class="title">تسوق</h6>
                        </a>
                    </div>

                    <div class="col-sm-3 col-6">
                        <a href="become-partner.html" class="link shadow-sm">
                            <img src="<?php echo e(asset('wb/imgs/icons/become-partner.svg')); ?>" class="icon" alt="become-partner">
                            <h6 class="title">اصبح شريك</h6>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/loyalty_program/index.blade.php ENDPATH**/ ?>