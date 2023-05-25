<?php if(auth()->guard()->guest()): ?>
    <div class="offcanvas mainsidenav accountsidenav offcanvas-end" tabindex="-1" id="accountSideNav"
        aria-labelledby="accountSideNavLabel">
        <div class="offcanvas-header">
            <button type="button" class="close-btn text-reset" data-bs-dismiss="offcanvas">
                <i class="fal fa-times"></i>
            </button>
        </div>

        <div class="offcanvas-body">
            <img src="<?php echo e(asset('wb/imgs/blue-logo.svg')); ?>" alt="logo" class="logo d-block w-50 m-auto mb-4">
            <h5 class="offcanvas-title text-center mb-4">قم بتسجيل الدخول لتتمكن من التحكم فى حسابك</h5>
            <a href="<?php echo e(route('login_page')); ?>" class="btn-1">تسجيل الدخول</a>
        </div>

        <div class="offcanvas-footer">
            <ul>
                <li>
                    <a href="#">
                        <i class="demo-icon icon-earth">&#xe810;</i>
                        <P>اللغة</P>
                        <i class="fal fa-chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="demo-icon icon-letter">&#xe811;</i>
                        <P>سياسة البائع</P>
                        <i class="fal fa-chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('contact-us')); ?>">
                        <i class="fal fa-phone-volume"></i>
                        <P>اتصل بنا</P>
                        <i class="fal fa-chevron-left"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php endif; ?>

<?php if(auth()->guard()->check()): ?>
    <?php if(auth()->user()->has_store == 0): ?>
        <div class="offcanvas mainsidenav accountsidenav offcanvas-end" tabindex="-1" id="accountSideNav"
            aria-labelledby="accountSideNavLabel">
            <div class="offcanvas-header">
                <button type="button" class="close-btn text-reset" data-bs-dismiss="offcanvas">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <h5 class="offcanvas-title mb-4">الحساب الشخصى</h5>
                <div class="account">
                    <a href="<?php echo e(route('site.user.show', ['id' => auth()->user()->id])); ?>" class="image-name">
                        <?php if(auth()->user()->image): ?>
                            <div class="image">
                                <img src="<?php echo e(auth()->user()->image); ?>" alt="profile-img">
                            </div>
                        <?php else: ?>
                            <div class="image">
                                <img src="<?php echo e(asset('wb/imgs/user-img.svg')); ?>" alt="profile-img">
                            </div>
                        <?php endif; ?>
                        <h5 class="name"><?php echo e(auth()->user()->name); ?></h5>
                    </a>
                    <a href="<?php echo e(route('site.profile.edit', ['id' => auth()->user()->id])); ?>" class="edit shadow-sm"><i
                            class="fal fa-pen"></i></a>
                </div>
                <a href="<?php echo e(route('wallet')); ?>" class="btn-1 mb-4">المحفظة والمزايا</a>
                <div class="account-links">
                    <div class="row">
                        <div class="col-4">
                            <a href="<?php echo e(route('site.myads.show', 'all')); ?>"><i class="fal fa-ad sameHeight"></i>اعلاناتى</a>
                        </div>
                        <div class="col-4">
                            <a href="statistics.html">
                                <i class="fal fa-chart-bar sameHeight"></i>الاحصائيات
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="my-payments.html"><i
                                    class="demo-icon icon-payments sameHeight">&#xe80e;</i>مدفوعاتى</a>
                        </div>
                        <div class="col-4">
                            <a href="<?php echo e(route('site.recent-viewed')); ?>"><i
                                    class="demo-icon icon-clock-1 sameHeight">&#xe80d;</i>شوهد
                                مؤخرا</a>
                        </div>
                        <div class="col-4">
                            <a href="<?php echo e(route('site.stores.create')); ?>"><i
                                    class="demo-icon icon-shops sameHeight">&#xe803;</i>الترقية الى
                                المتاجر</a>
                        </div>
                        <div class="col-4">
                            <a href="<?php echo e(route('loyalty_program.index')); ?>"><i class="fas fa-stars sameHeight"></i>نقاط
                                النجوم</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="offcanvas-footer">
                <ul>
                    <li>
                        <a href="<?php echo e(route('site.myfavs.show')); ?>">
                            <i class="fal fa-heart"></i>
                            <P>المفضلة</P>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="demo-icon icon-earth">&#xe810;</i>
                            <P>اللغة</P>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="demo-icon icon-letter">&#xe811;</i>
                            <P>سياسة البائع</P>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('contact-us')); ?>">
                            <i class="fal fa-phone-volume"></i>
                            <P>اتصل بنا</P>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('logout_web')); ?>">
                            <i class="fal fa-sign-out"></i>
                            <p>تسجيل الخروج</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    <?php elseif(auth()->user()->has_store == 1): ?>
        <div class="offcanvas mainsidenav storesidenav offcanvas-end" tabindex="-1" id="accountSideNav"
            aria-labelledby="storeSideNavLabel">
            <div class="offcanvas-header">
                <button type="button" class="close-btn text-reset" data-bs-dismiss="offcanvas">
                    <i class="fal fa-times"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <h5 class="offcanvas-title mb-1">سوق الجمعة</h5>
                <p class="desc mb-4">العنوان بالكامل</p>
                <div class="store-links">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <a class="link" href="#">
                                <i class="fal fa-boxes-alt"></i>
                                جميع المنتجات
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a class="link" href="statistics.html">
                                <i class="fal fa-tags"></i>
                                المجموعات
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a class="link" href="add-group-item.html">
                                <i class="fal fa-box-open"></i>
                                اضافة مجموعة/عنصر
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a class="link" href="total-sales.html">
                                <i class="fal fa-usd-circle"></i>
                                اجمالى المبيعات
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a class="link" href="wallet.html">
                                <i class="fal fa-wallet"></i>
                                المحفظة والمزايا
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <a class="link" href="statistics.html">
                                <i class="fal fa-file-chart-line"></i>
                                عرض التقارير
                            </a>
                        </div>
                    </div>
                </div>
                <div class="store-stats">
                    <ul class="main-stats">
                        <li>
                            <div class="stat">
                                <h5 class="name">المشاهدات</h5>
                                <h2 class="num">190K</h2>
                            </div>
                        </li>
                        <li>
                            <div class="stat">
                                <h5 class="name">المشاهدات</h5>
                                <h2 class="num">190K</h2>
                            </div>
                        </li>
                        <li>
                            <div class="stat">
                                <h5 class="name">المشاهدات</h5>
                                <h2 class="num">190K</h2>
                            </div>
                        </li>
                    </ul>
                    <div class="search-views">
                        <h5 class="name">مشاهدات البحث</h5>
                        <h5 class="num">16K</h5>
                        <h5 class="percent">(1%) -207</h5>
                    </div>
                    <h5 class="stats-days">احصائيات اخر 28 يوم</h5>
                </div>
            </div>
            <div class="offcanvas-footer">
                <div class="nav-bottom shops-bottom-nav">
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
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/frdaysq/public_html/resources/views/site/partials/account_side_nav.blade.php ENDPATH**/ ?>