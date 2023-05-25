@extends('site.layout')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>المتاجر</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shops-banners">
        <div class="container">

            <div class="search-categories">
                <div class="search">
                    <ul class="filters">
                        <li>
                            <div class="dropdown">
                                <button class="fltr-btn sameHeight" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fal fa-sliders-h-square"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fal fa-long-arrow-up"></i>
                                            الاعلى تقييما
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="fal fa-long-arrow-down"></i>
                                            الاقل تقييما
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <select class="form-control" name="search" type="search" id="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search">
                        </select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
            </div>
            <div class="owl-carousel shop-banner-carousel owl-theme">
                <div class="item">
                    <div class="ad-card-2 customXSmHeight text-white">
                        <div class="card-content h-100">
                            <a href="product-details.html" class="stretched-link"></a>
                            <div class="image image-cover h-100">
                                <img src="{{ asset('wb/imgs/store-img.svg') }}" alt="store">
                            </div>
                            <div class="card-img-overlay">
                                <h5 class="ad-title text-truncate">اسم المنتج هنا</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="ad-card-2 customXSmHeight text-white">
                        <div class="card-content h-100">
                            <a href="product-details.html" class="stretched-link"></a>
                            <div class="image image-cover h-100">
                                <img src="{{ asset('wb/imgs/store-img.svg') }}" alt="store">
                            </div>
                            <div class="card-img-overlay">
                                <h5 class="ad-title text-truncate">اسم المنتج هنا</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="common-shops">
        <div class="container">
            <div class="section-title">
                <h4 class="title">المتاجر الشائعة</h4>
                <ul class="btns">
                    <li>
                        <a href="{{ route('popular.stores') }}" class="ctrl-btn">عرض الكل</a>
                    </li>
                </ul>
            </div>

            <div class="owl-carousel common-shops-carousel owl-theme">

                @foreach ($stores as $store)
                    @if ($store->views >= 100)
                        <div class="shop-card shadow-sm">
                            <a href="{{ route('site.store.show', $store->id) }}" class="image image-cover customSmHeight">
                                <img src="{{ $store->avatar }}" alt="shop">
                            </a>
                            <div class="card-body">
                                <div class="name-type">
                                    <div class="shop-name">
                                        <h5 class="name text-truncate">{{ $store->name }}</h5>
                                        <span><i class="fas fa-check"></i></span>
                                    </div>
                                    <p class="shop-type">{{ $store->type_name }}</p>
                                </div>
                                <div class="actions">
                                    <a href="#" data-href="{{ route('change.follow.unfollow', $store->id) }}"
                                        data-id="{{ $store->user_id }}" class="follow">
                                        @if ($store->is_follow == true)
                                            <i class="fal fa-user-times"></i>
                                            {{ __('site.Un_follow') }}
                                        @else
                                            <i class="fal fa-plus"></i>
                                            {{ __('site.Follow') }}
                                        @endif
                                    </a>
                                    {{-- <a href="#" class="follow"><i class="fal fa-plus"></i>المتابعة</a> --}}
                                    <div class="ctrls">
                                        <button><i class="demo-icon icon-share">&#xe80a;</i></button>
                                        <button class="favourite @if ($store->StoreLike == true) active @endif"
                                            data-href="{{ route('store.toggle_like', $store->id) }}"><i
                                                class="demo-icon icon-heart-empty">&#xe805;</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </section>

    <section class="all-shops-cards" id="marginForNav">
        <div class="container">
            <div class="search-categories">
                <div class="container">
                    <div class="categories">
                        <div class="categories-carousel owl-carousel owl-theme">
                            <div class="item">
                                <a href="#" class="cate active-cate">الكل</a>
                            </div>
                            @foreach ($types as $type)
                                <div class="item">
                                    <a href="{{ route('site.store.type.show', $type->id) }}"
                                        class="cate">{{ $type->name }}</a>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="row">



                @forelse ($stores as $store)
                    <div class="col-lg-4 col-6 mb-4">
                        <div class="shop-card shadow-sm">
                            <a href="{{ route('site.store.show', $store->id) }}"
                                class="image image-cover customSmHeight">
                                <img src="{{ $store->avatar }}" alt="shop">
                            </a>
                            <div class="card-body">
                                <div class="name-type">
                                    <div class="shop-name">
                                        <h5 class="name text-truncate">{{ $store->name }}</h5>
                                        <span><i class="fas fa-check"></i></span>
                                    </div>
                                    <p class="shop-type">{{ $store->type_name }}</p>
                                </div>
                                <div class="actions">
                                    <a href="#" data-href="{{ route('change.follow.unfollow', $store->id) }}"
                                        data-id="{{ $store->user_id }}" class="follow">
                                        @if ($store->is_follow == true)
                                            <i class="fal fa-user-times"></i>
                                            {{ __('site.Un_follow') }}
                                        @else
                                            <i class="fal fa-plus"></i>
                                            {{ __('site.Follow') }}
                                        @endif
                                    </a>
                                    {{-- <a href="#" class="follow"><i class="fal fa-plus"></i>المتابعة</a> --}}
                                    <div class="ctrls">
                                        <button><i class="demo-icon icon-share">&#xe80a;</i></button>
                                        <button class="favourite @if ($store->StoreLike == true) active @endif"
                                            data-href="{{ route('store.toggle_like', $store->id) }}"><i
                                                class="demo-icon icon-heart-empty">&#xe805;</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            {{ $stores->links() }}
        </div>
    </section>

    <nav class="navbar fixed-bottom navbar-light nav-bottom shops-bottom-nav">
        <div class="container">
            <div class="plus-btn">
                <div class="dropdown dropup">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fal fa-plus"></i>
                    </button>
                    <ul class="dropdown-menu btn-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a href="quick-ad.html">
                                <i class="fal fa-ad"></i>
                                إضافة إعلان تجاري سريع
                            </a>
                        </li>
                        <li>
                            <a href="add-update.html">
                                <i class="fal fa-pen-square"></i>
                                إضافة تحديث
                            </a>
                        </li>
                        <li>
                            <a href="send-notifs-in-app.html">
                                <i class="fal fa-bell-plus"></i>
                                نشر إشعار عبر التطبيق
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('create.offer') }}">
                                <i class="fal fa-badge-percent"></i>
                                إضافة عرض
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('store.product.create') }}">
                                <i class="fal fa-box-open"></i>
                                إضافة منتج
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('category.create') }}">
                                <i class="fal fa-file-plus"></i>
                                إضافة قسم
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <ul>
                <li>
                    <a href="{{ route('index') }}">
                        <i class="demo-icon icon-home">&#xe807;</i>
                        <p>الرئيسية</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('store.coupons') }}">
                        <i class="fas fa-badge-percent"></i>
                        <p>تخفيضات</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('store.products') }}">
                        <i class="fas fa-boxes"></i>
                        <p>جميع المنتجات</p>
                    </a>
                </li>
                <li>
                    <a href="my-orders.html">
                        <i class="fas fa-box"></i>
                        <p>طلباتى</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product_order') }}">
                        <i class="fas fa-box-alt"></i>
                        <p>طلب منتج</p>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
@endsection
@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        var rtlVal = $("html").attr("dir") == "rtl" ? true : false;
        $('.shop-banner-carousel').owlCarousel({
            margin: 10,
            nav: true,
            rtl: rtlVal,
            items: 1,
            autoplay: true,
            smartSpeed: 750,
            navText: ["<i class='fal fa-chevron-right'></i>", "<i class='fal fa-chevron-left'></i>"]
        })

        $('.common-shops-carousel').owlCarousel({
            margin: 25,
            nav: false,
            dots: false,
            rtl: rtlVal,
            autoplay: true,
            smartSpeed: 750,
            responsive: {
                0: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        })

        $('.categories-carousel').owlCarousel({
            rtl: rtlVal,
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


        $('.categs-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            dots: false,
            autoWidth: true
        });


        // like-ad-and-unlike
        $('body').on('click', '.favourite', function(e) {
            //   alert(1232);
            e.preventDefault();
            @if (!auth()->user())
                window.location.href = "{{ route('login') }}";
                return;
            @endif
            var thislike = $(this);
            $.ajax({
                url: thislike.data('href'),
                method: "GET",
                success: function(data) {
                    console.log(data)
                    if (data.like) {
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            });
        });


        // categories

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
        });
        var swiper = new Swiper(".lgAdsSwiper", {
            direction: "vertical",
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        let selectInit = $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('search.store') }}",
                data: function(params) {
                    var query = {
                        search: params.term,
                        type: 'public'
                    }
                    return query;
                },
                processResults: function(data, params) {
                    const results = $.map(data, (item) => {
                        item.text = item.text;
                        return item
                    })
                    return {
                        results: results
                    }
                }
            }
        });

        $('#search').on('select2:select', function(e) {
            let storeId = e.params.data.id,
                url = '{{ route('site.store.show', ':id') }}';

            url = url.replace(':id', storeId);
            setTimeout(() => {
                $(selectInit).val(null).trigger("change");
            }, 100);
            setTimeout(() => {
                window.location.href = url;
            }, 150);
        });
    </script>
@endpush
