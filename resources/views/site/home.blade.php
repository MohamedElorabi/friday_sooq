@extends('site.layout')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <section class="ads-cards" id="marginForNav">
        <div class="container">
            <div class="search-categories">
                <div class="search">
                    <form action="{{ route('search.home') }}" class="d-flex">
                        <select class="form-control" id="search" name="name" type="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search">
                        </select>
                        <button class="submit-btn" type="button"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>

                <div id="product_list"></div>

                <div class="categories">
                    <div class="categories-carousel owl-carousel owl-theme">
                        <div class="item">
                            <a href="{{ route('category.index') }}" class="cate active-cate">الكل</a>
                        </div>

                        @foreach ($categories as $category)
                            <div class="item">
                                <a href="{{ route('category.show', $category->slug) }}"
                                    class="cate">{{ $category->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($ads as $ad)
                    <div class="col-lg-3 col-md-4 col-6 mb-4">
                        <div class="ad-card image-cover sameHeight">
                            <a href="{{ route('ad.show', $ad->slug) }}" class="stretched-link"></a>
                            @if ($ad->special == true)
                                <div class="featured-ribbon">
                                    <div class="ribbon">
                                        اعلان مميز
                                    </div>
                                </div>
                            @endif
                            @if ($ad->active == 'sold')
                                <small class="sold-ribbon">{{ $ad->active }}</small>
                            @endif
                            <img src="{{ $ad->image }}" alt="ad">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <div class="bottom-nav nav-bottom fixed-bottom">
        <div class="buttons-bar">
            <a href="{{ route('category.index') }}" class="fields button" id="bottomBtn"><i
                    class="demo-icon icon-fields">&#xe806;</i><span>الاقسام</span></a>
            <a href="{{ route('site.stores') }}" class="shops button" id="bottomBtn"><i
                    class="demo-icon icon-shops">&#xe803;</i><span>المتاجر</span></a>
            <div class="start-button hvr-ripple-out" id="startBtn">
                <div class="waves-circle">
                    <p>ابدأ</p>
                    <img src="{{ asset('wb/imgs/wave1.svg') }}" class="wave-1" id="wave" alt="wave">
                    <img src="{{ asset('wb/imgs/wave2.svg') }}" class="wave-2" id="wave" alt="wave">
                </div>
            </div>

            <a href="#" class="home button" id="bottomBtn"><i
                    class="demo-icon icon-home">&#xe807;</i><span>الرئيسية</span></a>
            <a href="{{ route('ad.index') }}" class="ads button" id="bottomBtn">
                <i class="fas fa-ad"></i><span>الاعلانات</span></a>
            <a href="{{ route('ad.create') }}" class="add-ad button" id="bottomBtn">
                <i class="demo-icon icon-plus">&#xe809;</i><span>اضف
                    اعلان</span></a>
        </div>

    </div>
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                var value = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        'name': value
                    },
                    beforeSend: () => {

                        $("#product_list").empty()
                    },
                    success: function(data) {
                        $("#product_list").html(data);
                        console.log(data);
                    }
                });
            });

            $(document).on('click', 'li', function() {
                var value = $(this).text();
                $("#search").val(value);
                $("#product_list").html("");
            });
        });
    </script> --}}



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
        });
        var swiper = new Swiper(".lgAdsSwiper", {
            direction: "vertical",
            spaceBetween: 10,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        var data = [{
                id: 0,
                text: '1'
            },
            {
                id: 1,
                text: '2'
            },
        ];

        let selectInit = $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('search.home') }}",
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
            let adSlug = e.params.data.slug,
                url = '{{ route('ad.show', ':slug') }}';

            url = url.replace(':slug', adSlug);
            setTimeout(() => {
                $(selectInit).val(null).trigger("change");
            }, 100);
            setTimeout(() => {
                window.location.href = url;
            }, 150);
        });
    </script>
@endpush
@push('site.partials.search_script')
