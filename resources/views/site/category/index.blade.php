@extends('site.layout')
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الاقسام</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="fields-cards">
        <div class="fields-row">
            <div class="container">
                <div class="row">

                    @foreach ($categories as $category)
                        <div class="col-sm-4 col-6">
                            <a href="{{ route('category.show', $category->slug) }}" class="field-card">
                                <img src="{{ $category->image }}">
                                <p>{{ $category->title }}</p>
                            </a>
                            {{-- <div class="owl-item active" style="width: 298.667px; margin-left: 20px;">
                                <div class="item">
                                    <a href="#" class="ad-image">
                                        <img src="{{ asset('wb/imgs/ad-image.svg') }}" alt="ad">
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="carousel-row">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel ads-carousel owl-theme">
                        <div class="item">
                            <a href="#" class="ad-image">
                                <img src="{{ asset('wb/imgs/ad-image.svg') }}" alt="ad">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('custom-scripts')
    <script>
        $('.ads-carousel').owlCarousel({
            rtl: true,
            margin: 20,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
@endpush
