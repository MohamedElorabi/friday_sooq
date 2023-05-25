@extends('site.layout')

@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="upgrade-to-shop.html"><small>الترقية الى المتاجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الباقات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-packages-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card package-card-2 basic shadow-sm">
                        <div class="card-head">
                            <div class="name">
                                <h3>اساسى</h3>
                            </div>
                            <p class="main-text">
                                Some quick example text to build on the card title and make up the bulk
                                of the card's content.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="price">
                                <h2 class="num">99</h2>
                                <small>KWD</small>
                            </div>
                            <ul class="features">
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn-3">شراء هذه الباقة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card package-card-2 normal shadow-sm">
                        <div class="card-head">
                            <div class="name">
                                <h3>عادى</h3>
                            </div>
                            <p class="main-text">
                                Some quick example text to build on the card title and make up the bulk
                                of the card's content.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="price">
                                <h2 class="num">99</h2>
                                <small>KWD</small>
                            </div>
                            <ul class="features">
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn-3">شراء هذه الباقة</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="card package-card-2 advanced shadow-sm">
                        <div class="card-head">
                            <div class="name">
                                <h3>متقدم</h3>
                            </div>
                            <p class="main-text">
                                Some quick example text to build on the card title and make up the bulk
                                of the card's content.
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="price">
                                <h2 class="num">99</h2>
                                <small>KWD</small>
                            </div>
                            <ul class="features">
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                                <li>
                                    <i class="fal fa-check"></i>
                                    <p>استبدل هذا النص بالنص المناسب</p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn-3">شراء هذه الباقة</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
