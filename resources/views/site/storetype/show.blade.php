@extends('site.layout')
@section('content')
    <!-- category-items-page-start -->
    <section class="all-shops-cards" id="marginForNav">
        <div class="container">
            <div class="search-categories">
                <div class="container">
                    <div class="categories">
                        <div class="categories-carousel owl-carousel owl-theme">
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
                    </div>
                @empty
                    لا يوجد متاجر
                @endforelse
            </div>
            {{ $stores->links() }}
        </div>
    </section>

    <!-- category-items-page-end -->
@endsection
@push('custom-scripts')
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
    </script>
@endpush
