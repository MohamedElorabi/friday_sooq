<!-- navbar -->
<nav class="navbar navbar-light">
    <div class="container">
        <div class="row">
            <div class="col-4 d-flex align-items-center justify-content-start">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mainSideNav"
                    aria-controls="mainSideNav">
                    <i class="fal fa-bars"></i>
                </button>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('wb/imgs/blue-logo.svg') }}" alt="logo">
                </a>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
                <div class="links d-flex align-items-center">

                    @if (Route::getCurrentRoute()->uri() == 'stores')
                        <a href="{{ route('cart') }}" class="link">
                            <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        </a>
                    @endif
                    <div class="link messages">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="msg-nums">
                                    <p>8</p>
                                </div>
                                <i class="demo-icon icon-message">&#xe80b;</i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="chatbox.html">
                                        <div class="sender-img">
                                            <i class="demo-icon icon-user">&#xe804;</i>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">الاسم كاملا</h5>
                                            <p class="msg-hint">موجز من الرسالة...</p>
                                        </div>
                                        <p class="date">9:45</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="chatbox.html">
                                        <div class="sender-img">
                                            <i class="demo-icon icon-user">&#xe804;</i>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">الاسم كاملا</h5>
                                            <p class="msg-hint">موجز من الرسالة...</p>
                                        </div>
                                        <p class="date">9:45</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="chatbox.html">
                                        <div class="sender-img">
                                            <i class="demo-icon icon-user">&#xe804;</i>
                                        </div>
                                        <div class="text">
                                            <h5 class="name">الاسم كاملا</h5>
                                            <p class="msg-hint">موجز من الرسالة...</p>
                                        </div>
                                        <p class="date">9:45</p>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item show-more" href="my-messages.html">
                                        عرض الكل
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="link image-cover profile" href="#" role="button" data-bs-toggle="offcanvas"
                        data-bs-target="#accountSideNav" aria-controls="accountSideNav">
                        @auth()
                            @if (auth()->user()->image)
                                <img src="{{ auth()->user()->image }}" alt="">
                            @elseif(auth()->user()->image == null)
                                <img src="{{ asset('wb/imgs/user-img.svg') }}" alt="">
                            @endif
                        @endauth
                        @guest
                            <img src="{{ asset('wb/imgs/user-img.svg') }}" alt="">
                        @endguest

                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!--Main-Side-menu-start-->
<div class="offcanvas mainsidenav offcanvas-start" tabindex="-1" id="mainSideNav" aria-labelledby="mainSideNavLabel">
    <div class="offcanvas-header">
        <img src="{{ asset('wb/imgs/blue-logo.svg') }}" alt="logo" class="logo">
        <button type="button" class="close-btn text-reset ms-auto" data-bs-dismiss="offcanvas">
            <i class="fal fa-times"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <h5 class="offcanvas-title mb-4">القائمة الرئيسية</h5>
        <div class="links">
            <a href=""><i class="fal fa-question"></i> من نحن</a>
            <a href="#"><i class="fal fa-info"></i> عن التطبيق</a>
            <a href="{{ route('contact-us') }}"><i class="fal fa-phone-alt"></i> اتصل بنا</a>
            <a href="#"><i class="fal fa-language"></i> تغيير اللغة</a>
            <a href="terms-and-conditions.html"><i class="fal fa-shield-check"></i> الشروط والاحكام</a>
        </div>
    </div>
    <div class="offcanvas-footer">
        <p>مواقع التواصل الاجتماعى</p>
        <div class="social-links">
            <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="#" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
            <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
        </div>
    </div>
</div>
<!--Main-Side-menu-end-->

<!--Account-Side-menu-start-->
@include('site.partials.account_side_nav')
<!--Account-Side-menu-end-->
