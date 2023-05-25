@extends('site.layout')
@section('content')
    <!-- category-items-page-start -->
    <main class="category-items-page">
        <div class="categs-bar">
            <div class="container">
                <div class="owl-carousel categs-carousel owl-theme">
                    @forelse($subcategories as $sub)
                        <div class="item">
                            <a href="{{ route('site.subcategory.show', [app()->getLocale(), $sub->slug]) }}"
                                class="categ shadow-sm" alt="{{ $sub->title }}">{{ $sub->title }}</a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

        <div class="page-title">
            <div class="container">
                <div class="row main-row">
                    <div class="col-sm-6 d-flex align-items-center justify-content-start mb-2">
                        <h4 class="title">{{ $category->title }}</h4>
                    </div>
                    <div class="col-sm-6 d-flex align-items-center justify-content-sm-end justify-content-start mb-2">
                        <!--<ul class="controls">-->
                        <!--    <li>-->
                        <!--        <select class="form-select input-1" aria-label="Default select example">-->
                        <!--            <option selected disabled>تصنيف حسب</option>-->
                        <!--            <option value="1">الاقل سعرا</option>-->
                        <!--            <option value="2">الاكثر سعرا</option>-->
                        <!--            <option value="3">المضاف حديثا</option>-->
                        <!--            <option value="4">الاكثر مشاهدة</option>-->
                        <!--        </select>-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                </div>
            </div>
        </div>
        @if (count($subcategories) == 0)
            <!--<div class="category-items-filter">-->
            <!--    <div class="container">-->
            <!--        <div class="content">-->
            <!--            <form action="">-->
            <!--                <div class="row">-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="form-group">-->
            <!--                            <label for="payment" class="form-label">طريقة الدفع</label>-->
            <!--                            <select name="payment" id="payment" class="form-select multi-select"-->
            <!--                                multiple="multiple" style="display: none;">-->
            <!--                                <option value="AL">Alabama</option>-->
            <!--                                <option value="AK">Alaska</option>-->
            <!--                                <option value="AZ">Arizona</option>-->
            <!--                                <option value="AR">Arkansas</option>-->
            <!--                                <option value="CA">California</option>-->
            <!--                            </select>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="form-group">-->
            <!--                            <label for="layers-num" class="form-label">عدد الطوابق</label>-->
            <!--                            <select name="layers-num" id="layers-num" class="form-select multi-select"-->
            <!--                                multiple="multiple" style="display: none;">-->
            <!--                                <option value="AL">Alabama</option>-->
            <!--                                <option value="AK">Alaska</option>-->
            <!--                                <option value="AZ">Arizona</option>-->
            <!--                                <option value="AR">Arkansas</option>-->
            <!--                                <option value="CA">California</option>-->
            <!--                            </select>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="col-md-4 mb-3">-->
            <!--                        <div class="form-group">-->
            <!--                            <label for="ad-status" class="form-label">حالة الاعلان</label>-->
            <!--                            <select name="ad-status" id="ad-status" class="form-select multi-select"-->
            <!--                                multiple="multiple" style="display: none;">-->
            <!--                                <option value="AL">بيع</option>-->
            <!--                                <option value="AK">ايجار</option>-->
            <!--                            </select>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <button type="submit" class="btn-1"><i class="fal fa-search"></i>بحث</button>-->
            <!--            </form>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
        @endif

        <section class="items">
            <div class="container">
                <div class="row">
                    @forelse($ads as $ad)
                        <div class="col-lg-3">
                            <div class="ad-card featured shadow-sm">
                                <a href="{{ route('ad.show', $ad->slug) }}" class="ad-img image-cover sameWidth">
                                    @if ($ad->special == true)
                                        <small class="featured-badge">اعلان مميز</small>
                                    @endif
                                    <img src="{{ $ad->image }}">
                                </a>
                                <div class="content">
                                    <div class="card-hd">
                                        <a href="{{ route('ad.show', $ad->slug) }}" class="title">
                                            <h5>{{ $ad->name }}</h5>
                                        </a>
                                        <div class="categs-date">
                                            <div class="categs">
                                                <p>{{ $ad->category_name }}</p>
                                            </div>
                                            <small class="date">{{ $ad->active_at }}</small>
                                        </div>
                                    </div>
                                    <div class="card-ftr">
                                        <h5 class="price">{{ $ad->price }} {{ $ad->country_currency }}</h5>
                                        <ul class="ctrls">
                                            <li>
                                                <button
                                                    class="ctrl-btn like-btn @if ($ad->Favoried == true) active @endif"
                                                    data-href="{{ route('toggle_like', $ad->id) }}">
                                                    <img src="{{ asset('wb/icons/heart-white-r.svg') }}" class="icon-img">
                                                </button>
                                            </li>
                                            <li>
                                                <a href="{{ route('ad.show', $ad->slug) }}#comments" class="ctrl-btn">
                                                    <img src="{{ asset('wb/icons/comment-white-r.svg') }}"
                                                        class="icon-img">
                                                </a>
                                            </li>
                                            <li>
                                                <a href="user-profile.html" class="user ctrl-btn image-cover">
                                                    <img src="{{ $ad->user_image }}">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="empty-area">
                            <div class="icon">
                                <img src="{{ asset('wb/imgs/no-ads.png') }}" alt="no-ads">
                            </div>
                            <h4 class="title">لا يوجد اعلانات</h4>
                        </div>
                    @endforelse
                </div>
            </div>
            {{ $ads->onEachSide(0)->links() }}
        </section>
    </main>

    <!-- category-items-page-end -->
@endsection
@push('custom-scripts')
    <script src="{{ asset('wb/js/BsMultiSelect.min.js') }}"></script>
    <script>
        $('.categs-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            dots: false,
            autoWidth: true,
        })

        $(function() {
            $(".multi-select").bsMultiSelect();
        });
    </script>
    <script>
        // like-ad-and-unlike
        $('body').on('click', '.like-btn', function(e) {
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
                    if (data['like']) {
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            })
        });
    </script>
@endpush
