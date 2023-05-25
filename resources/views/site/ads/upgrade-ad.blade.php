@extends('site.layout')
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="my-ads.html"><small>اعلاناتى</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>ضاعف عدد مشاهدات إعلانك</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="upgrade-ad-page">
        <div class="container">
            <form action="">
                <div class="row">
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package" id="featured-corner"
                                            value="featured-corner" onclick="submit()">
                                        <label class="form-check-label" for="featured-corner">
                                            <img src="{{ asset('wb/imgs/icons/featured-corner.svg') }}"
                                                alt="featured-corner">
                                            <h5>الركن المميز</h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        سيظهر اعلانك في الصفحة الرئيسية تحت (بيع وشراء) في الركن المتميز لمدة 24 ساعة.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <small class="new-badge">جديد</small>
                                    <h5 class="price">5.5 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package" id="update-your-ad"
                                            value="update-your-ad" onclick="submit()">
                                        <label class="form-check-label" for="update-your-ad">
                                            <img src="{{ asset('wb/imgs/icons/update.svg') }}" alt="update-your-ad">
                                            <h5>مدد وحدث إعلانك</h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        قم بتمديد مدة إعلانك وتحديث ترتيبه.
                                        مدة إعلانك الجديد 30 يوما.
                                        يظهر في أعلى قائمة الإعلانات كل 5 أيام.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <h5 class="price">7.5 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package"
                                            id="install-in-farwaniya" value="install-in-farwaniya" onclick="submit()">
                                        <label class="form-check-label" for="install-in-farwaniya">
                                            <img src="{{ asset('wb/imgs/icons/pin.svg') }}" alt="install-in-farwaniya') }}">
                                            <h5>
                                                ثبت إعلانك في نشتري الأثاث
                                                في الفروانية
                                            </h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        سيكون إعلانك مثبت أعلى قائمة الإعلانات
                                        في نشتري الأثاث لمدة 24 ساعة، تبدأ على
                                        الفور بعد رفع الإعلان.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <h5 class="price">3.0 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package"
                                            id="install-in-buy-furniture" value="install-in-buy-furniture"
                                            onclick="submit()">
                                        <label class="form-check-label" for="install-in-buy-furniture">
                                            <img src="{{ asset('wb/imgs/icons/pin.svg') }}" alt="install-in-buy-furniture">
                                            <h5>
                                                ثبت إعلانك في نشتري الأثاث
                                            </h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        سيكون إعلانك مثبت أعلى قائمة الإعلانات
                                        في نشتري الأثاث لمدة 24 ساعة، تبدأ على
                                        الفور بعد رفع الإعلان.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <h5 class="price">4.0 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package" id="highlight"
                                            value="highlight" onclick="submit()">
                                        <label class="form-check-label" for="highlight">
                                            <img src="{{ asset('wb/imgs/icons/highlight.svg') }}" alt="highlight">
                                            <h5>
                                                اضف الي "قائمة انتظار تسليط
                                                الضوء"
                                            </h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        نظرا للإرتفاع الطلب على تسليط الضوء،
                                        أضف إعلانك إلى قائمة الإنتظار ليتم إدراجه
                                        في قائمة الإعلانات البارزة بالتناوب في صفحة البحث الجديدة، بالإضافة لشاشة
                                        المزيد.
                                        لمدة 24 ساعة. تبدأ بمجرد وجودمكان متاح
                                        في القائمة.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <small class="new-badge">جديد</small>
                                    <h5 class="price">6.0 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package"
                                            id="wait-install-furniture" value="wait-install-furniture"
                                            onclick="submit()">
                                        <label class="form-check-label" for="wait-install-furniture">
                                            <img src="{{ asset('wb/imgs/icons/pin-1.svg') }}"
                                                alt="wait-install-furniture">
                                            <h5>
                                                انتظار التثبيت في أثاث
                                            </h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        نظرا للإرتفاع الطلب على تسليط الضوء،
                                        أضف إعلانك إلى قائمة الإنتظار ليتم إدراجه
                                        في قائمة الإعلانات البارزة بالتناوب في صفحة البحث الجديدة، بالإضافة لشاشة
                                        المزيد.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <h5 class="price">2.0 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                        <div class="card package-card shadow-sm h-100">
                            <div class="card-body">
                                <div class="check-text">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="package"
                                            id="shop-ad-buy-furniture" value="shop-ad-buy-furniture" onclick="submit()">
                                        <label class="form-check-label" for="shop-ad-buy-furniture">
                                            <img src="{{ asset('wb/imgs/icons/pin-1.svg') }}" alt="shop-ad-buy-furniture">
                                            <h5>
                                                اعلان متجرك في نشتري الأثاث
                                            </h5>
                                        </label>
                                    </div>
                                    <p class="text">
                                        شيظهر إعلانك على شكل بانر متحرك لافت
                                        للإنتباه مدته 10 ثوان أعلىكل محتوى
                                        شاشة نشتري الأثاث لجميع مستخدمنا
                                        بمجرد فتح الشاشة.
                                        لمدة 24 ساعة مرة واحدة لكل مستخدم
                                        يبدأ على الفور.
                                    </p>
                                </div>
                                <div class="new-price">
                                    <h5 class="price">3.0 د.ك</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
