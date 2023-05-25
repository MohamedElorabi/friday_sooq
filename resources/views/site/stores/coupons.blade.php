@extends('site.layout')

@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="{{ route('site.stores') }}"><small>المتاجر</small></a></li>
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
                                    <small class="disc-badge shadow-sm">{{ $coupon->coupon_rate }}%</small>
                                    <img src="{{ $coupon->image }}" class="card-img-top" alt="discount">
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
                                <p class="validity">من {{ $coupon->start_date }} - الى {{ $coupon->end_date }} </p>
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


    <!-- Modal -->
    <div class="modal modal-one disc-modal fade" id="discModal" tabindex="-1" aria-labelledby="discModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="qr-code">
                        <i class="fal fa-tags tag-icon"></i>
                        <img src="{{ asset('wb/imgs/qr-code.svg') }}" alt="qr-code">
                    </div>
                    <div class="disc-code">
                        <p class="title">رمز القسيمة</p>
                        <h3 class="code" id="codeEl" data-value="gd39e0d">gd39e0d</h3>
                        <button type="button" class="copy-btn" id="copyBtn">
                            نسخ الرمز
                            <i class="fal fa-copy copy"></i>
                            <i class="fal fa-check check"></i>
                        </button>
                    </div>
                    <button class="btn-1">حفظ رمز القسيمة</button>
                    <div class="disc-value">
                        <p class="title">قيمة القسيمة</p>
                        <h4 class="val">20 دينار</h4>
                    </div>
                    <div class="more-info">
                        <small class="expire-date mb-2"><i class="fal fa-clock"></i>تنتهى فى 20/07/2022</small>
                        <small class="notice">
                            إستخدم هذا الكود عند نشر الإعلانات أو عند الإضافة إلى السلة
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        $('.categories-carousel').owlCarousel({
            rtl: true,
            margin: 20,
            autoWidth: true,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })

        var copyBtn = document.querySelectorAll('#copyBtn');
        for (var i = 0; i < script $(copyBtn).length; i++) {
            $(copyBtn[i]).click(function() {
                $(this).addClass("copied")
                let codeEl = document.querySelector('#codeEl')
                var codeVal = codeEl.getAttribute('data-value').toUpperCase();
                var codeInput = document.createElement("input");
                codeInput.value = codeVal;
                document.querySelector("#discModal .modal-body").appendChild(codeInput);
                codeInput.select();
                try {
                    var successful = document.execCommand('copy');
                } catch (err) {}
                document.querySelector("#discModal .modal-body").removeChild(codeInput);
            })
        }
    </script>
@endpush
