@extends('site.layout')

@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="{{ route('store') }}"><small>المتاجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>العروض</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="discounts-page">
        <div class="container">
            <div class="search-categories">
                <div class="categories">
                    <div class="categories-carousel owl-carousel owl-theme">


                        <div class="item">
                            <a href="#" class="cate active-cate">الكل</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($coupons as $coupon)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card discount-card">
                            <div class="card-head">
                                <div class="image image-cover customXLHeight">
                                    <small class="disc-badge shadow-sm">70%</small>
                                    <img src="assets/imgs/ad-img.svg" class="card-img-top" alt="discount">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-9">
                                        <a href="#" class="name" data-bs-toggle="modal" data-bs-target="#discModal">
                                            <h5 class="text-truncate">{{ $coupon->name }}</h5>
                                        </a>
                                        <p class="categ">{{ $coupon->store->name }}</p>
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <button class="favourite-btn"><i class="fal fa-heart"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="validity">من 05 ابريل - الى 16 ابريل</p>
                                <a href="#" class="show" data-bs-toggle="modal" data-bs-target="#discModal">عرض
                                    الخصم <i class="fal fa-chevron-left"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section>
@endsection
