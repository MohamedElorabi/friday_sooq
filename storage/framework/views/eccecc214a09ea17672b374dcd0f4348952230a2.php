
<?php $__env->startSection('content'); ?>
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>المحفظة والمزايا</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="wallet-page pt-0" id="marginForNav">
        <div class="wallet-header">
            <div class="container">
                <i class="fad fa-wallet main-icon"></i>
                <h5 class="welcome">مرحبا بك</h5>
                <p class="wallet-num" dir="ltr"><?php echo e(auth()->user()->wallet_number); ?></p>
                <div class="col-md-6 m-auto">
                    <div class="card wallet-card">
                        <div class="card-body">
                            <div class="balance-country">
                                <p class="balance">الرصيد: <b><?php echo e(auth()->user()->balance); ?> د.ك</b></p>
                                <div class="country">
                                    <div class="image image-cover sameHeight">
                                        <img src="<?php echo e(asset('wb/imgs/flag.svg')); ?>" alt="flag">
                                    </div>
                                    <b>FridaySooq</b>
                                </div>
                            </div>
                            <a href="#" class="history-btn">عرض السجل</a>
                            <ul class="links">
                                <li>
                                    <a href="add-balance.html" class="link">
                                        <div class="icon">
                                            <i class="fas fa-box-usd"></i>
                                        </div>
                                        <p>اضافة رصيد</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="transfer-balance.html" class="link">
                                        <div class="icon">
                                            <i class="fas fa-paper-plane"></i>
                                        </div>
                                        <p>تحويل رصيد</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="pay-me.html" class="link">
                                        <div class="icon">
                                            <i class="fas fa-qrcode"></i>
                                        </div>
                                        <p>ادفع لى</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="link" data-bs-toggle="modal" data-bs-target="#downloadModal">
                                        <div class="icon scan">
                                            <i class="fas fa-qrcode"></i>
                                        </div>
                                        <p>المسح والدفع</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="upgrade">
            <div class="container">
                <h4 class="title">ترقية الحساب</h4>
                <b>استبدل هذا النص بالخدمة المقدمة</b>
                <p>استبدل هذا النص بالخدمة المقدمة</p>
                <a href="upgrade-account.html" class="btn-1">
                    <i class="fal fa-gem"></i>
                    ترقية الحساب
                </a>
            </div>
        </div>
    </section>

    <?php echo $__env->make('site.partials.menu_bottom.wallet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/user/wallet/index.blade.php ENDPATH**/ ?>