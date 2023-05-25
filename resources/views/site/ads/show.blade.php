@extends('site.layout')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css">
@endpush
@section('content')
    <!-- ad-details-page-start -->
    <div class="ad-details-page">
        <section class="ad-details" id="marginForNav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="slogan-right white-card">
                            {{-- <h4 class="ad-title">{{$ad->name}}</h4> --}}
                            <div class="ad-images">
                                @if ($ad->special == true)
                                    <div class="featured-ribbon">
                                        <div class="ribbon">
                                            إعلان مميز
                                        </div>
                                    </div>
                                @endif
                                <div class="ad-img-carousel owl-carousel owl-theme" id="sameHeight">
                                    @forelse($ad->images as $image)
                                        <div class="item image-cover customSmHeight">
                                            <a href="{{ $image->image }}" class="image-cover customSmHeight"
                                                data-fancybox="gallery">
                                                <img src="{{ $image->image }}" alt="ad-img">
                                            </a>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>

                            <div class="details-bar">
                                <p class="time"><i class="far fa-clock"></i>{{ $ad->active_at }}</p>
                                <div class="divider"></div>
                                <p class="watches"><i class="far fa-eye"></i><span>{{ $ad->views }}
                                        {{ __('site.views') }}</span></p>
                                <div class="divider"></div>
                                <p class="camera"><i class="fas fa-camera"></i>{{ count($ad->images) }}</p>
                            </div>
                            <div class="title-price">
                                <h5>{{ $ad->name }}</h5>
                                <h4>{{ $ad->price }} {{ $ad->country_currency }}</h4>
                            </div>
                            <div class="description">
                                <h5>{{ __('site.description') }}</h5>
                                <p>
                                    {{ $ad->desc }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="slogan-left">
                            <a href="{{ route('site.user.show', ['id' => $ad->user->id]) }}" class="user white-card">
                                <div class="image">
                                    <img src="{{ $ad->user->image }}" alt="{{ $ad->user->name }}">

                                </div>
                                <p>{{ $ad->user->name }}</p>
                            </a>

                            <div class="options white-card nav-bottom" id="adOptions">

                                @if ($ad->mobile != null)
                                    <a href="https://wa.me/+965{{ $ad->mobile }}" target="_blank"
                                        data-bs-dismiss="offcanvas" id="modalLink" data-value="whatsapp" class="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        واتساب
                                    </a>
                                @else
                                    <a href="https://wa.me/+965{{ $ad->mobile }}" target="_blank"
                                        data-bs-dismiss="offcanvas" id="modalLink" data-value="whatsapp" class="whatsapp">
                                        <i class="fab fa-whatsapp"></i>
                                        واتساب
                                    </a>
                                @endif

                                <a href="tel:{{ $ad->call }}" class="call">
                                    <i class="fas fa-phone-alt"></i>
                                    اتصال
                                </a>


                                <a href="#" class="favourite @if ($ad->Favoried == true) active @endif"
                                    data-href="{{ route('toggle_like', $ad->id) }}">
                                    <i class="far fa-heart"></i>
                                    تفضيل
                                </a>
                            </div>


                            <div class="more-options white-card">
                                <ul>

                                    <li class="chat">
                                        <p>ابدا المحادثة</p> <a href="#">ارسال</a>
                                    </li>
                                    <li class="sms">
                                        <p>ارسال رسالة نصية</p> <a href="">ارسال</a>
                                    </li>
                                    <li class="report">
                                        <p>التبليغ عن الاعلان</p><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">تبليغ</a>

                                    </li>
                                </ul>
                            </div>


                            @if ($bannerOne)
                                <!-- ad-banner-start -->
                                <section class="ad-banner">
                                    <div class="container">
                                        <div class="ad-field">
                                            @if ($bannerOne->code == null)
                                                <a href="{{ $bannerOne->link }}" class="stretched-link"></a>
                                                <img src="{{ $bannerOne->image }}" alt="{{ $bannerOne->title }}">
                                            @else
                                                {!! $bannerOne->code !!}
                                            @endif
                                        </div>
                                    </div>
                                </section>
                                <!-- ad-banner-end -->
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="white-card">
                            <div class="comments section-div shadow-sm">
                                <h5 class="ad-subtitle">{{ __('site.comments') }}</h5>
                                <ul>
                                    @forelse($ad->comments as $comment)
                                        <li class="comment">
                                            <div class="image image-cover sameHeight">
                                                <img src="{{ $comment->user->image }}" alt="user">
                                            </div>
                                            <div class="text">
                                                <h6 class="name">{{ $comment->user->name }}</h6>
                                                <p class="comment-text">
                                                    {{ $comment->comment }}
                                                </p>
                                            </div>
                                            <div class="dropdown comment-options">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="far fa-ellipsis-h"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        @if (Auth::user() && Auth::user()->id == $comment->user_id)
                                                            <form method="post"
                                                                action="{{ route('ad.comment.delete', $comment->id) }}">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="dropdown-item">
                                                                    <i class="fal fa-trash-alt"></i>
                                                                    حذف التعليق
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </li>
                                                    </a>
                                                    <li>
                                                        @if (Auth::user() && Auth::user()->id != $comment->user_id)
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                                <i class="fal fa-bug"></i>
                                                                ابلاغ
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    @empty
                                        <div class="empty-area">
                                            <img src="{{ asset('wb/imgs/no-comments.svg') }}" alt="no-ads">
                                            <p class="mb-0 h5">لا يوجد تعليقات الان كن اول من يضع تعليق</p>
                                        </div>
                                    @endforelse
                                </ul>
                                @auth()
                                    <form action="{{ route('ad.comment.store') }}" method="post" class="add-comment">
                                        @csrf
                                        <input type="hidden" name="ad_id" value="{{ $ad->id }}">
                                        <h5 class="ad-subtitle">اضف تعليقك</h5>
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control input-1" id="comment" name="comment"
                                                placeholder="اكتب تعليقك">
                                        </div>
                                        <button type="submit" class="btn-1"><i class="fal fa-paper-plane"></i>
                                            ارسال</button>
                                    </form>
                                @endauth
                                @guest()
                                    <div class="login-first">
                                        <p class="text-danger">يرجى تسجيل الدخول حتى تتمكن من كتابة تعليق</p>
                                        <a href="{{ route('login') }}" class="btn-1">
                                            تسجيل الدخول
                                        </a>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- ad-details-page-end -->

    <!-- user-call-offcanvas -->
    <div class="offcanvas user-call-offcanvas offcanvas-bottom" tabindex="-1" id="userCall"
        aria-labelledby="userCallLabel">
        <div class="offcanvas-header">
            <div class="container">
                <div class="row">
                    <div class="col-8 d-flex align-items-center">
                        <h5 class="offcanvas-title" id="userCallLabel">معلومات الاتصال</h5>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-end">
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas-body">
            <div class="container">
                <ul>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#phoneModal"
                            data-bs-dismiss="offcanvas" id="modalLink" data-value="call">
                            <img src="{{ asset('wb/icons/phone-r.svg') }}" class="icon-img">
                            <p>اتصال</p>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#chatModal" data-bs-dismiss="offcanvas"
                            id="modalLink" data-value="downloadApp"><img src="{{ asset('wb/icons/message-r.svg') }}"
                                class="icon-img">
                            <p>محادثة</p>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                    <li>
                        @if ($ad->mobile != null)
                            <a href="https://wa.me/+965{{ $ad->mobile }}" target="_blank" data-bs-dismiss="offcanvas"
                                id="modalLink" data-value="whatsapp">
                                <img src="{{ asset('wb/icons/phone-r.svg') }}" class="icon-img">
                                <p>whatsapp</p>
                                <i class="fal fa-chevron-left"></i>
                            </a>
                        @else
                            <a href="https://wa.me/+965{{ $ad->user->mobile }}" target="_blank"
                                data-bs-dismiss="offcanvas" id="modalLink" data-value="whatsapp">
                                <img src="{{ asset('wb/icons/phone-r.svg') }}" class="icon-img">
                                <p>whatsapp</p>
                                <i class="fal fa-chevron-left"></i>
                            </a>
                        @endif
                    </li>
                    <li>
                        <a href="sms:123456"><img src="{{ asset('wb/icons/categories-r.svg') }}" class="icon-img">
                            <p>رسالة نصية</p>
                            <i class="fal fa-chevron-left"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal modal-one fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('site.report') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('report.store') }}" method="post">
                        @csrf

                        <input type="hidden" name="type" value="ad">

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">{{ __('site.report_text') }}:</label>
                            <textarea class="form-control" name="report" id="message-text"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn-1">{{ __('site.Save') }}</button>
                            <button type="button" class="btn-2" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modals-start -->
    <!-- main-modal -->
    {{-- <div class="modal main-modal fade" id="phoneModal" tabindex="-1" aria-labelledby="mainModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="modalContent">
                            <div id="call">
                                <h5 class="title">الاتصال</h5>
                                <p class="text">قم بنسخ رقم الهاتف والاتصال</p>
                                <div class="num-field">
                                    <a class="link" href="tel:{{$ad->mobile}}">{{$ad->mobile}}</a>
                                    <input type="text" value="{{$ad->mobile}}" id="numberInput">
                                    <button id="copyBtn" data-bs-toggle="tooltip" data-bs-placement="left"
                                        title="نسخ الرقم"><i class="fal fa-copy"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal main-modal fade" id="chatModal" tabindex="-1" aria-labelledby="mainModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="modalContent">
                            <div class="stores" id="downloadApp">
                                <h5 class="title">لاجراء محادثة مباشرة قم بتحميل تطبيق تسوق سيل</h5>
                                <p class="text">قم باختيار المتجر المتوافق مع جهازك وابدا التحميل</p>
                                <ul>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="fab fa-google-play"></i></div>
                                            <p>Google Play</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="icon"><i class="fab fa-app-store"></i></div>
                                            <p>App Store</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    <!-- modals-end -->

@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        $('.ad-img-carousel').owlCarousel({
            rtl: true,
            nav: false,
            items: 1,
            margin: 0
        })

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })

        // like-ad-and-unlike
        $('body').on('click', '.favourite', function(e) {
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
                    console.log(data)
                    if (data.like) {
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            })
        });
    </script>
@endpush
