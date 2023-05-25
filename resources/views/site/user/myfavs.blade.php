@extends('site.layout')
@section('content')
    <!-- my-favourites-page-start -->
    <section class="my-favourites-page">
        <div class="container">
            <div class="search-categories">
                <div class="section-title">
                    <h4 class="title">{{ __('site.Favourites') }}</h4>
                </div>
                <div class="categories">

                    <div class="categories-carousel owl-carousel owl-theme">

                        <div class="item">
                            <a id="activate-products" class="cate active-cate" href="" class="cate">الإعلانات</a>
                        </div>
                        <div class="item">
                            <a id="archived-products" href="" class="cate">المتاجر</a>
                        </div>
                        <div class="item">
                            <a id="waiting-products" href="" class="cate">المنتجات</a>
                        </div>

                    </div>
                </div>

            </div>

            <div class="row">
                @forelse ($ads as $ad)
                    @if ($ad->special == true)
                        <div class="featured-ribbon">
                            <div class="ribbon">
                                إعلان مميز
                            </div>
                        </div>
                    @endif

                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn active favourite @if ($ad->Favoried == true) active @endif"
                                data-href="{{ route('toggle_like', $ad->id) }}">
                                <i class="fal fa-heart"></i>
                            </button>

                            <a href="{{ route('ad.show', $ad->slug) }}" class="image image-cover customSmHeight">
                                <img src="{{ $ad->images[0]->image }}" alt="ad">
                            </a>

                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate">{{ $ad->name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-area">
                        <img src="{{ asset('wb/imgs/no-favourites.svg') }}" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد إعلانات مفضلة حتى الان</p>
                    </div>
                @endforelse

                {{ $ads->links() }}
            </div>



            <div class="row">
                @forelse ($stores as $store)
                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn active favourite @if ($store->Favoried == true) active @endif"
                                data-href="">
                                <i class="fal fa-heart"></i>
                            </button>

                            <a href="" class="image image-cover customSmHeight">
                                <img src="{{ $store->avatar }}" alt="ad">
                            </a>

                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate">{{ $store->name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-area">
                        <img src="{{ asset('wb/imgs/no-favourites.svg') }}" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد إعلانات مفضلة حتى الان</p>
                    </div>
                @endforelse

                {{ $ads->links() }}
            </div>


            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn active favourite @if ($product->Favoried == true) active @endif"
                                data-href="">
                                <i class="fal fa-heart"></i>
                            </button>

                            <a href="" class="image image-cover customSmHeight">
                                <img src="{{ $product->image }}" alt="ad">
                            </a>

                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate">{{ $product->name }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="empty-area">
                        <img src="{{ asset('wb/imgs/no-favourites.svg') }}" alt="no-ads">
                        <p class="mb-0 h5">لا يوجد إعلانات مفضلة حتى الان</p>
                    </div>
                @endforelse

                {{ $ads->links() }}
            </div>

        </div>

    </section>
    <!-- my-favourites-page-end -->
@endsection
@push('custom-scripts')
    <script>
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
                        var html = '<i class="fas fa-heart" style="color: var(--main-color)"></i>';
                    } else {
                        var html = '<i class="fal fa-heart"></i>';
                    }
                    thislike.html(html);
                }
            })
        });







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
    </script>
@endpush
