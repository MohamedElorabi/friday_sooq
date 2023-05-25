@extends('site.layout')
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <!-- category-items-page-start -->
    <section class="category-items-page">
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
            </div>

            <div class="row">
                @forelse($ads as $ad)
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
        </div>
    </section>

    <!-- category-items-page-end -->
@endsection
@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('#search').select2({
            minimumInputLength: 1,
            ajax: {
                url: "{{ route('search.home') }}",
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
