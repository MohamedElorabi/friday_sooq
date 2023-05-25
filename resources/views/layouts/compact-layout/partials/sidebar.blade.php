<header class="main-nav">
    <nav>
        <div class="main-navbar">
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('admin')}}" ><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('/starter-kit') }}" href="javascript:void(0)"><i data-feather="anchor"></i><span>Starter kit</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('/starter-kit') }};">

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('admins')}}" ><i data-feather="home"></i><span>المديرين</span></a>
                    </li>

                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('users')}}" ><i data-feather="home"></i><span>المستخدمين</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title" href="{{route('ads')}}" ><i data-feather="home"></i><span>الاعلانات</span></a>
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
                </ul>
            </div>
        </div>
    </nav>
</header>