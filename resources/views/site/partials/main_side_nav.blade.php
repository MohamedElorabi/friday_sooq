


<div class="offcanvas mainsidenav accountsidenav offcanvas-end" tabindex="-1" id="accountSideNav"
    aria-labelledby="accountSideNavLabel">
    <div class="offcanvas-header">
        <button type="button" class="close-btn text-reset" data-bs-dismiss="offcanvas">
            <i class="fal fa-times"></i>
        </button>
    </div>


    <div class="offcanvas-body">
        @if (auth()->user()->has_store == 0)
            <h5 class="offcanvas-title mb-4">الحساب الشخصى</h5>
            <div class="account">
                <a href="{{ route('site.user.show', ['id' => auth()->user()->id]) }}" class="image-name">
                    @if (auth()->user()->image)
                        <div class="image">
                            <img src="{{ auth()->user()->image }}" alt="profile-img">
                        </div>
                    @else
                        <div class="image">
                            <img src="{{ asset('wb/imgs/user-img.svg') }}" alt="profile-img">
                        </div>
                    @endif
                    <h5 class="name">{{ auth()->user()->name }}</h5>
                </a>
                <a href="{{ route('site.profile.edit', ['id' => auth()->user()->id]) }}" class="edit shadow-sm"><i
                        class="fal fa-pen"></i></a>
            </div>
            <a href="wallet.html" class="btn-1 mb-4">المحفظة والمزايا</a>
            <div class="account-links">
                <div class="row">
                    <div class="col-4">
                        <a href="{{ route('site.myads.show', 'all') }}"><i
                                class="fal fa-ad sameHeight"></i>اعلاناتى</a>
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
                        <a href="{{ route('site.recent-viewed') }}"><i
                                class="demo-icon icon-clock-1 sameHeight">&#xe80d;</i>شوهد
                            مؤخرا</a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('site.stores.create') }}"><i
                                class="demo-icon icon-shops sameHeight">&#xe803;</i>الترقية الى
                            المتاجر</a>
                    </div>
                    <div class="col-4">
                        <a href="{{ route('loyalty_program.index') }}"><i class="fas fa-stars sameHeight"></i>نقاط
                            النجوم</a>
                    </div>
                </div>
            </div>
        @elseif (auth()->user()->has_store == 1)

        
        @endif
        @guest
            <img src="{{ asset('wb/imgs/blue-logo.svg') }}" alt="logo" class="logo d-block w-50 m-auto mb-4">
            <h5 class="offcanvas-title text-center mb-4">قم بتسجيل الدخول لتتمكن من التحكم فى حسابك</h5>
            <a href="{{ route('login_page') }}" class="btn-1">تسجيل الدخول</a>
        @endguest
    </div>

    <div class="offcanvas-footer">
        <ul>
            @auth
                <li>
                    <a href="{{ route('site.myfavs.show') }}">
                        <i class="fal fa-heart"></i>
                        <P>المفضلة</P>
                        <i class="fal fa-chevron-left"></i>
                    </a>
                </li>
            @endauth
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
                <a href="{{ route('contact-us') }}">
                    <i class="fal fa-phone-volume"></i>
                    <P>اتصل بنا</P>
                    <i class="fal fa-chevron-left"></i>
                </a>
            </li>

            @auth
                <li>
                    <a href="{{ route('logout_web') }}">
                        <i class="fal fa-sign-out"></i>
                        <p>تسجيل الخروج</p>
                    </a>
                </li>
            @endauth

        </ul>
    </div>
</div>