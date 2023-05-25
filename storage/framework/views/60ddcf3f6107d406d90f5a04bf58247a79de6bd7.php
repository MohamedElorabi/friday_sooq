<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('admin')); ?>" ><i data-feather="home"></i><span>الرئيسيه</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('admins')); ?>" ><i data-feather="home"></i><span>المديرين</span></a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('users')); ?>" ><i data-feather="home"></i><span>المستخدمين</span></a>
                    </li>
                    
                     <li class="dropdown">
                        <a class="nav-link menu-title <?php echo e(prefixActive('/builders')); ?>" href="javascript:void(0)"><i data-feather="edit-3"></i><span>الاعلانات</span></a>
                        <ul class="nav-submenu menu-content" style="display: <?php echo e(prefixBlock('/builders')); ?>;">
                            <li><a href="<?php echo e(route('ads','actived')); ?>" class="<?php echo e(routeActive('form-builder-1')); ?>">الاعلانات الفعاله</a></li>
                            <li><a href="<?php echo e(route('ads','daily-actived')); ?>" class="<?php echo e(routeActive('form-builder-1')); ?>">الاعلانات الفعاله اليوميه</a></li>
                            <li><a href="<?php echo e(route('ads','waiting')); ?>" class="<?php echo e(routeActive('form-builder-2')); ?>">الاعلانات المنتظره</a></li>
                            <li><a href="<?php echo e(route('ads','daily-waiting')); ?>" class="<?php echo e(routeActive('form-builder-2')); ?>">الاعلانات المنتظره اليوميه</a></li>
                            <li><a href="<?php echo e(route('ads','refused')); ?>" class="<?php echo e(routeActive('pagebuild')); ?>">الاعلانات المرفوضه </a></li>
                            <li><a href="<?php echo e(route('ads','daily-refused')); ?>" class="<?php echo e(routeActive('pagebuild')); ?>">الاعلانات المرفوضه اليوميه </a></li>
                            <li><a href="<?php echo e(route('ads','archived')); ?>" class="<?php echo e(routeActive('button-builder')); ?>"> الاعلانات الارشيفيه</a></li>
                            <li><a href="<?php echo e(route('ads','daily-archived')); ?>" class="<?php echo e(routeActive('button-builder')); ?>"> الاعلانات الارشيفيه اليوميه</a></li>
                            <li><a href="<?php echo e(route('ads','sold')); ?>" class="<?php echo e(routeActive('button-builder')); ?>"> الاعلانات المباعه</a></li>
                            <li><a href="<?php echo e(route('ads','daily-sold')); ?>" class="<?php echo e(routeActive('button-builder')); ?>"> الاعلانات المباعه اليوميه</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('categories')); ?>" ><i data-feather="home"></i><span>الأقسام الرئيسيه</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('subcategories')); ?>" ><i data-feather="home"></i><span>الأقسام الفرعيه</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('countries')); ?>"><i data-feather="home"></i><span>الدول</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('cities')); ?>" ><i data-feather="home"></i><span>المحافظات</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('towns')); ?>"><i data-feather="home"></i><span>المناطق</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('options')); ?>" ><i data-feather="home"></i><span>الخصائص</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('stores')); ?>" ><i data-feather="home"></i><span>المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('storecategories')); ?>" ><i data-feather="home"></i><span>أقسام المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('storeflyers')); ?>" ><i data-feather="home"></i><span>فليرات المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('storeproducts')); ?>" ><i data-feather="home"></i><span>منتجات المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('storetypes')); ?>" ><i data-feather="home"></i><span>انواع المتاجر</span></a>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('banners')); ?>" ><i data-feather="home"></i><span>البنرات </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('views')); ?>" ><i data-feather="home"></i><span>الزيارات </span></a>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('chats')); ?>" ><i data-feather="home"></i><span>المحادثات </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('notifications.create')); ?>" ><i data-feather="home"></i><span>ارسال اشعار عام </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="<?php echo e(route('adpackages')); ?>" ><i data-feather="home"></i><span>باقات تمييز الاعلان </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header><?php /**PATH /home/frdaysq/public_html/resources/views/layouts/default-layout/partials/sidebar.blade.php ENDPATH**/ ?>