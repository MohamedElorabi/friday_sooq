@extends('site.layout')

@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="upgrade-to-shop.html"><small>الترقية الى المتاجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الباقات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-packages-page">
        <div class="container">
            <div class="row">

                @forelse ($packages as $package)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="card package-card-2 basic shadow-sm">
                            <div class="card-head">
                                <div class="name">
                                    <h3>اساسى</h3>
                                </div>
                                <p class="main-text">
                                    {{ $package->name }}
                                </p>
                            </div>
                            <div class="card-body">
                                <div class="price">
                                    <h2 class="num">{{ $package->price }}</h2>
                                    <small>KWD</small>
                                </div>
                                <ul class="features">
                                    <li>
                                        <i class="fal fa-check"></i>
                                        <p>{{ $package->period }}</p>
                                    </li>

                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn-3">شراء هذه الباقة</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section>
@endsection
