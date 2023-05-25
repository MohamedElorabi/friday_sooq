<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('admin')}}" ><i data-feather="home"></i><span>الرئيسيه</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('admins')}}" ><i data-feather="home"></i><span>المديرين</span></a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('users')}}" ><i data-feather="home"></i><span>المستخدمين</span></a>
                    </li>
                    
                     <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/builders') }}" href="javascript:void(0)"><i data-feather="edit-3"></i><span>الاعلانات</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/builders') }};">
                            <li><a href="{{route('ads','actived')}}" class="{{routeActive('form-builder-1')}}">الاعلانات الفعاله</a></li>
                            <li><a href="{{route('ads','daily-actived')}}" class="{{routeActive('form-builder-1')}}">الاعلانات الفعاله اليوميه</a></li>
                            <li><a href="{{route('ads','waiting')}}" class="{{routeActive('form-builder-2')}}">الاعلانات المنتظره</a></li>
                            <li><a href="{{route('ads','daily-waiting')}}" class="{{routeActive('form-builder-2')}}">الاعلانات المنتظره اليوميه</a></li>
                            <li><a href="{{route('ads','refused')}}" class="{{routeActive('pagebuild')}}">الاعلانات المرفوضه </a></li>
                            <li><a href="{{route('ads','daily-refused')}}" class="{{routeActive('pagebuild')}}">الاعلانات المرفوضه اليوميه </a></li>
                            <li><a href="{{route('ads','archived')}}" class="{{routeActive('button-builder')}}"> الاعلانات الارشيفيه</a></li>
                            <li><a href="{{route('ads','daily-archived')}}" class="{{routeActive('button-builder')}}"> الاعلانات الارشيفيه اليوميه</a></li>
                            <li><a href="{{route('ads','sold')}}" class="{{routeActive('button-builder')}}"> الاعلانات المباعه</a></li>
                            <li><a href="{{route('ads','daily-sold')}}" class="{{routeActive('button-builder')}}"> الاعلانات المباعه اليوميه</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('categories')}}" ><i data-feather="home"></i><span>الأقسام الرئيسيه</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('subcategories')}}" ><i data-feather="home"></i><span>الأقسام الفرعيه</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('countries')}}"><i data-feather="home"></i><span>الدول</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('cities')}}" ><i data-feather="home"></i><span>المحافظات</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('towns')}}"><i data-feather="home"></i><span>المناطق</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('options')}}" ><i data-feather="home"></i><span>الخصائص</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('stores')}}" ><i data-feather="home"></i><span>المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('storecategories')}}" ><i data-feather="home"></i><span>أقسام المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('storeflyers')}}" ><i data-feather="home"></i><span>فليرات المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('storeproducts')}}" ><i data-feather="home"></i><span>منتجات المتاجر</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('storetypes')}}" ><i data-feather="home"></i><span>انواع المتاجر</span></a>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('banners')}}" ><i data-feather="home"></i><span>البنرات </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('views')}}" ><i data-feather="home"></i><span>الزيارات </span></a>
                    </li>
                     <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('chats')}}" ><i data-feather="home"></i><span>المحادثات </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('notifications.create')}}" ><i data-feather="home"></i><span>ارسال اشعار عام </span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('adpackages')}}" ><i data-feather="home"></i><span>باقات تمييز الاعلان </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>