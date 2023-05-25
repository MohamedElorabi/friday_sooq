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
                    <h4>اعلاناتى</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="my-ads-page">
        <div class="container">
            <div class="search-categories">
                <div class="search">
                    <form class="d-flex">
                        <select class="form-control" name="search.myads" id="search" type="search"
                            data-placeholder="اكتب كلمة البحث هنا" aria-label="Search">
                        </select>
                        <button class="submit-btn" type="submit"><i class="demo-icon icon-search">&#xe802;</i></button>
                    </form>
                </div>
                <div class="categories nav-tabs">

                    <div class="categories-carousel owl-carousel owl-theme">
                        <div class="item nav-item">
                            <a id="all-products" href="#" class="cate active-cate">الكل</a>
                        </div>
                        <div class="item">
                            <a id="activate-products" href="{{ route('site.myads.show','activat') }}"
                                class="cate">تفعيل</a>
                        </div>
                        <div class="item">
                            <a id="archived-products" href="{{ route('site.myads.show', 'archived') }}"
                                class="cate">ارشفة</a>
                        </div>
                        <div class="item">
                            <a id="waiting-products" href="{{ route('site.myads.show', 'waiting') }}" class="cate">انتظار
                                الموافقة</a>
                        </div>
                        <div class="item">
                            <a id="all-products" href="{{ route('site.myads.show', 'activat') }}" class="cate">محفوظات</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($ads as $ad)
                    <div class="col-lg-4 col-sm-6 tab-content">
                        <div class="card my-ad-card shadow-sm mb-4">
                            <a href="{{ route('ad.show', $ad->slug) }}" class="image image-cover customHeigh">
                                @forelse($ad->images as $image)
                                    <img src="{{ $image->image }}" alt="my-ad">
                                @break
                                @empty
                                @endforelse
                                <ul class="details-bar">
                                    <li>
                                        <small><i class="far fa-clock"></i>{{ $ad->created_at }}</small>
                                    </li>
                                    <li>
                                        <small><i class="far fa-eye"></i>{{ $ad->views }}</small>
                                    </li>
                                    <li>
                                        <small><i class="fas fa-camera"></i>{{ count($ad->images) }}</small>
                                    </li>
                                </ul>
                            </a>
                            <div class="card-body">
                                <a href="{{ route('ad.show', $ad->slug) }}" class="name">
                                    <h5 class="text-truncate">{{ $ad->name }}</h5>
                                </a>
                                <h5 class="price">{{ $ad->price }} د.ك</h5>
                                <div class="ctrls">
                                    <button class="ctrl-btn customHeight stop" data-bs-toggle="modal"
                                        data-bs-target="#adCtrlModal" id="modalLink" data-value="stop">
                                        <i class="fal fa-toggle-off"></i>
                                        <span>ايقاف</span>
                                    </button>
                                    <button class="ctrl-btn customHeight" data-bs-toggle="modal"
                                        data-bs-target="#adCtrlModal" id="modalLink" data-value="remove">
                                        <i class="fal fa-trash"></i>
                                        <span>حذف</span>
                                    </button>
                                    <a href="{{ route('updrade-ad', $ad->id) }}" class="ctrl-btn customHeight upgrade">
                                        <i class="fal fa-rocket-launch"></i>
                                        <span>تمييز</span>
                                    </a>
                                    <a href="{{ route('ad.statistics', $ad->id) }}" class="ctrl-btn customHeight">
                                        <i class="fal fa-chart-bar"></i>
                                        <span>الاحصائيات</span>
                                    </a>
                                    <button class="ctrl-btn customHeight">
                                        <i class="fal fa-share"></i>
                                        <span>مشاركة</span>
                                    </button>
                                    <button class="ctrl-btn customHeight">
                                        <i class="fal fa-comment"></i>
                                        <span>تعليق</span>
                                    </button>
                                </div>
                                <div class="options">
                                    <button class="btn-1" data-bs-toggle="modal" data-bs-target="#adCtrlModal"
                                        id="modalLink" data-value="sold"><i class="fal fa-gavel"></i>تم البيع</button>
                                    <a href="{{ route('ad.edit', $ad->id) }}" class="btn-2"><i
                                            class="fal fa-pen"></i>تعديل
                                        الاعلان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
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

    @endsection
    <!-- Modal -->
    <div class="modal modal-one ad-ctrl-modal fade" id="adCtrlModal" tabindex="-1" aria-labelledby="adCtrlModalLabel"
        aria-hidden="true">
        @foreach ($ads as $ad)
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" id="modalContent">
                    <div class="modal-header">
                        <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                    <div id="stop">
                        <form action="{{ route('change-ad-archifed', $ad->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <i class="fal fa-exclamation-circle fa-3x"></i>
                                <h5 class="title">هل تريد بالفعل ايقاف الاعلان؟</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn-1">موافق</button>
                                <button type="button" class="btn-2" data-bs-dismiss="modal">الغاء</button>
                            </div>
                        </form>
                    </div>
                    <div id="remove">
                        <form action="{{ route('ad.destroy', $ad->id) }}" method="post">
                            <input type="hidden" value="delete">
                            @csrf
                            <div class="modal-body">
                                <i class="fal fa-exclamation-circle fa-3x"></i>
                                <h5 class="title">هل تريد بالفعل حذف الاعلان؟</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn-1">موافق</button>
                                <button type="button" class="btn-2" data-bs-dismiss="modal">الغاء</button>
                            </div>
                        </form>
                    </div>
                    <div id="sold">
                        <form action="{{ route('change-ad-sold', $ad->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <i class="fal fa-exclamation-circle fa-3x"></i>
                                <h5 class="title">هل تريد بالفعل تمييز الاعلان كمباع؟</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn-1">موافق</button>
                                <button type="button" class="btn-2" data-bs-dismiss="modal">الغاء</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
            })

            $(function() {
                let modalLink = document.querySelectorAll("#modalLink"),
                    modalContent = document.querySelector("#modalContent");
                for (let i = 0; i < $(modalLink).length; i++) {
                    let link = $(modalLink[i]);
                    $(link).click(function() {
                        $(modalContent).find(`#${$(link).attr("data-value")}`).show().siblings().hide();
                    })
                }
            })

            $('#search').select2({
                minimumInputLength: 1,
                ajax: {
                    url: "{{ route('search.myads') }}",
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



        <script>
            $(document).ready(function() {
                // Fetch products for the active tab
                fetchProducts($('#all-products'));

                // Fetch products when tab is clicked
                $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                    var target = $(e.target).attr("href");
                    fetchProducts($(target));
                });

                function fetchProducts(tab) {
                    var status = tab.attr('id').replace('-', '');
                    var url = '{{ url('/products') }}' + '/' + type;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            // Clear the existing products
                            tab.find('.product-list').empty();

                            // Append the fetched products
                            $.each(response, function(index, product) {
                                var productItem = '<div class="product">' +
                                    '<h4>' + product.name + '</h4>' +
                                    '<p>' + product.description + '</p>' +
                                    '</div>';

                                tab.find('.product-list').append(productItem);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });
                }
            });
        </script>
    @endpush
