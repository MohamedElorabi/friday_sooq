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
                @endforeach
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
@endsection


@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
