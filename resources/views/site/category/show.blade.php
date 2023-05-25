@extends('site.layout')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <!-- category-items-page-start -->


    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الاعلانات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="ads-cards">
        <div class="container">
            <div class="search-categories">
                <div class="search">
                    <form class="d-flex" action="{{ route('search.home') }}">
                        <select class="form-control" name="search" id="search" type="search"
                            data-placeholder="اكتب كلمة البحث هنا">
                        </select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
                <div class="categories">
                    <div class="categories-carousel owl-carousel owl-theme">
                        @forelse($subcategories as $sub)
                            <div class="item">
                                <a href="{{ route('site.subcategory.show',$sub->id) }}"
                                    class="cate">{{ $sub->title }}</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($ads as $ad)
                    <div class="col-xl-3 col-md-4 col-6 mb-4">
                        <div class="ad-card-2 sameHeight text-white">
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
                            <div class="card-content h-100">
                                <a href="{{ route('ad.show', $ad->slug) }}" class="stretched-link"></a>
                                <div class="image image-cover h-100">
                                    <img src="{{ $ad->image }}" alt="ad">
                                </div>
                                <div class="card-img-overlay">
                                    <h5 class="ad-title text-truncate">{{ $ad->name }}</h5>
                                    <ul class="details-bar">
                                        <li>
                                            <small><i class="far fa-clock"></i>{{ $ad->active_at }}</small>
                                        </li>
                                        <li>
                                            <small><i class="far fa-eye"></i>{{ $ad->views }}</small>
                                        </li>
                                        <li>
                                            <small><i class="fas fa-camera"></i>{{ count($ad->images) }}</small>
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
            {{ $ads->links() }}

            {{-- <nav class="pagination-nav" aria-label="Pages">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <i class="far fa-chevron-double-right"></i>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <i class="far fa-chevron-double-left"></i>
                        </a>
                    </li>
                </ul>
            </nav> --}}
        </div>
    </section>

    <!-- category-items-page-end -->
@endsection
@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.categs-carousel').owlCarousel({
            rtl: true,
            margin: 10,
            nav: false,
            dots: false,
            autoWidth: true,
        })

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

        $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('search.category') }}",
                data: function(params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }
                    // Query parameters will be ?search=[term]&page=[page]
                    return query;
                },
                templateResult: function(d) {
                    return $(d.text);
                },
                templateSelection: function(d) {
                    return $(d.text);
                },
            }
        });
    </script>
@endpush
