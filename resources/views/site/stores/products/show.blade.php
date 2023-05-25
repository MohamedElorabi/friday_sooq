@extends('site.layout')
@section('content')
    <section class="product-details-page">
        <div class="container">
            <form action="{{ route('add.to.cart', $product->id) }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="slogan-right white-card">
                            <div class="product-images btm-border-sec">
                                <div class="owl-carousel product-img-carousel owl-theme">
                                    @forelse ($product->images as $image)
                                        <div class="item image-cover customSmHeight">
                                            <img src="{{ $image->image }}" alt="product-img">
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                            </div>
                            <div class="description">
                                <h5 class="details-title">الوصف</h5>
                                <p>
                                    {{ $product->desc }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="slogan-left white-card">
                            <div class="main-details btm-border-sec">
                                <div class="name-price">
                                    <h4 class="prod-name">{{ $product->name }}</h4>
                                    <h5 class="price">{{ $product->price }} د.ك</h5>
                                </div>
                                <button type="button" class="favourite-btn">
                                    <i class="fal fa-heart"></i>
                                </button>
                            </div>
                            <div class="options btm-border-sec">
                                <div class="row">
                                    <div class="col-sm-6 mb-sm-0 mb-4">
                                        <div class="qty">
                                            <h6 class="details-subtitle">الكمية</h6>
                                            <div class="qty-input">
                                                <button type="button" id="minus">
                                                    <i class="fal fa-minus"></i>
                                                </button>
                                                <input type="text" name="qty" value="1" />
                                                <button type="button" id="plus">
                                                    <i class="fal fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="colors">
                                            <h6 class="details-subtitle">الالوان</h6>
                                            <ul class="colors-checks">
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="red"
                                                        value="red" autocomplete="off">
                                                    <label class="color-check" for="red"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="yellow"
                                                        value="yellow" autocomplete="off">
                                                    <label class="color-check" for="yellow"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="blue"
                                                        value="blue" autocomplete="off">
                                                    <label class="color-check" for="blue"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" class="btn-check" name="color" id="green"
                                                        value="green" autocomplete="off">
                                                    <label class="color-check" for="green"></label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn-1"><i class="fal fa-plus"></i>اضف الى العربة</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <script>
        $('.product-img-carousel').owlCarousel({
            rtl: true,
            items: 1,
            margin: 0
        })
    </script>
@endpush
