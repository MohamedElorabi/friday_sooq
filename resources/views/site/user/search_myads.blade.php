@extends('site.layout')

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

            <div class="row">

                @forelse ($ads as $ad)
                    <div class="col-lg-4 col-sm-6">
                        <div class="card my-ad-card shadow-sm mb-4">
                            <a href="" class="image image-cover customHeigh">
                                @forelse($ad->images as $image)
                                    <img src="{{ $image->image }}" alt="my-ad">
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
                                <a href="" class="name">
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
                                    <a href="{{ route('ad.edit', $ad->id) }}" class="btn-2"><i class="fal fa-pen"></i>تعديل
                                        الاعلان</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse


            </div>
            {{ $ads->links() }}

        </div>
    </section>
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
@endpush
