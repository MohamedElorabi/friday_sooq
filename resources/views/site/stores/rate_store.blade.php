@extends('site.layout')
@section('content')



<nav class="breadcrumb-nav" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
            <li class="breadcrumb-item"><a href="clients.html"><small>العملاء</small></a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <h4>تقييم العميل</h4>
            </li>
        </ol>
    </div>
</nav>

<section class="rate-details-page" id="marginForNav">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="white-card">
                    <div class="client-rate-card">
                        <div class="row">
                            <div class="col-xl-2 col-lg-3 col-sm-2 col-3">
                                <div class="image image-cover sameHeight">
                                    <img src="assets/imgs/user-img.svg" alt="user">
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-6 col-sm-8 col-6 d-flex flex-column justify-content-center">
                                <h5 class="name">الاسم الكامل</h5>
                                <ul class="stars">
                                    <li>
                                        <i class="fas fa-star active"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star active"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star active"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star active"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text">خدمة ممتازة تستاهل</p>
                            </div>
                            <div
                                class="col-xl-2 col-lg-3 col-sm-2 col-3 d-flex flex-column align-items-end justify-content-between">
                                <p class="date">5 مارس</p>
                                <button type="button" class="btn-1 sm">الـــرد</button>
                            </div>
                        </div>
                    </div>
                    <div class="client-rate-card reply-card">
                        <form action="">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-sm-2 col-3">
                                    <div class="image image-cover sameHeight">
                                        <img src="assets/imgs/user-img.svg" alt="user">
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-9 col-sm-10 col-9">
                                    <h5 class="name">الاسم الكامل</h5>
                                    <textarea class="form-control input-1 mb-3" name="reply" id="reply" rows="5"
                                        placeholder="اكتب الرد هنا"></textarea>
                                    <button type="submit" class="btn-1 sm ms-auto">ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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




@endsection