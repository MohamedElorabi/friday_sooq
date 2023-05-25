@extends('site.layout')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="{{ route('site.stores') }}"><small>المتاجر</small></a></li>
                <li class="breadcrumb-item"><a href="site.store.show"><small>تفاصيل المتجر</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>الأجهزة المنزلية والإلكترونيات</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-field-ads" id="marginForNav">
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
                        <select class="form-control" name="search" id="search" type="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search">
                        </select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
            </div>
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-md-4 col-6 mb-4">
                        <div class="shop-field-card shadow-sm">
                            <button class="favourite-btn">
                                <i class="fal fa-heart"></i>
                            </button>
                            <a href="{{ route('product.details', $product->id) }}" class="image image-cover customSmHeight">
                                <img src="{{ $product->image }}" alt="ad">
                            </a>
                            <div class="card-body">
                                <div class="text">
                                    <h6 class="name text-truncate">{{ $product->name }}</h6>
                                    <h5 class="price">{{ $product->price }}د.ك</h5>
                                </div>
                                <button class="add-to-cart"><i class="fal fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                @empty
                    لا يوجد منتجات
                @endforelse
            </div>

            {{ $products->links() }}
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
@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('search.products') }}",
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
@push('site.partials.search_script')
