
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
                <p class="wallet-num" dir="ltr">6152 7162 7269 3307</p>
                <div class="col-md-6 m-auto">
                    <div class="card wallet-card">
                        <div class="card-body">
                            <div class="balance-country">
                                <p class="balance">الرصيد: <b>0.000 د.ك</b></p>
                                <div class="country">
                                    <div class="image image-cover sameHeight">
                                        <img src="assets/imgs/flag.svg" alt="flag">
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

    <nav class="navbar fixed-bottom navbar-light nav-bottom shops-bottom-nav">
        <div class="container">
            <ul>
                <li>
                    <a href="index.html">
                        <i class="demo-icon icon-home">&#xe807;</i>
                        <p>الرئيسية</p>
                    </a>
                </li>
                <li>
                    <a href="clients.html">
                        <i class="fas fa-user"></i>
                        <p>العملاء</p>
                    </a>
                </li>
                <li>
                    <a href="shop-details.html">
                        <i class="fas fa-store"></i>
                        <p>المتجر</p>
                    </a>
                </li>
                <li>
                    <a href="shop-orders.html">
                        <i class="fas fa-box"></i>
                        <p>الطلبات</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/frdaysq/public_html/resources/views/site/user/wallet.blade.php ENDPATH**/ ?>