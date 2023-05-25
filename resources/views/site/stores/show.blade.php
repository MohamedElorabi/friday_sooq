@extends('site.layout')
@push('styles')
    <link rel="stylesheet" href="{{ asset('wb/css/star-rating-svg.css') }}">
@endpush
@section('content')
    <section class="shop-details">
        <div class="shop-header">
            <div class="container">
                <div class="shop-cover">
                    <img src="{{ $store->cover }}" alt="cover">
                </div>
                <div class="header-info">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-img-name">
                                <div class="image">
                                    @if ($store->getAvailableAttribute())
                                        <div class="active"></div>
                                    @endif
                                    <div class="shop-image">
                                        <img src="{{ $store->avatar }}" alt="image">
                                    </div>
                                </div>
                                <div class="text">
                                    <h4 class="name">{{ $store->name }}</h4>
                                    <p class="type">{{ $store->type_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="info">
                                        <ul>
                                            <li>
                                                <i class="fal fa-calendar-alt"></i>
                                                <p>انضم {{ $store->created_at }}</p>
                                            </li>

                                            <li>
                                                <p>0.</p>
                                                <div class="stars">
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star yellow-star"></i>
                                                    <i class="fas fa-star grey-star"></i>
                                                </div>
                                                <p>(5,600)</p>
                                            </li>


                                            <li>
                                                <i class="fal fa-eye"></i>
                                                <p>{{ $store->views }} مشاهدة</p>
                                            </li>
                                            <li>

                                                @if ($store->getAvailableAttribute())
                                                    <p class="status open">مفتوح</p>
                                                @else
                                                    <p class="status close">مغلق</p>
                                                @endif
                                                {{-- <p>يفتح 8 صباحا{{ $store_work->day }}</p> --}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="likes-follows">
                                        <p class="likes">{{ count($store->likes) }}<span>معجب</span></p>
                                        <p class="follows">{{ count($store->followers) }}<span>متابع</span></p>
                                    </div>
                                    <div class="buttons">
                                        <a href="#" class="contact" data-bs-toggle="modal"
                                            data-bs-target="#contactModal">اتصل بنا</a>


                                        <a href="#" data-href="{{ route('change.follow.unfollow', $store->user_id) }}"
                                            data-id="{{ $store->user_id }}" class="follow">
                                            @if ($store->is_follow == true)
                                                <i class="fal fa-user-times"></i>
                                                {{ __('site.Un_follow') }}
                                            @else
                                                <i class="fal fa-plus"></i>
                                                {{ __('site.Follow') }}
                                            @endif
                                        </a>

                                    </div>
                                    <div class="social-links">
                                        <ul>
                                            <li>
                                                <a href="{{ $store->youtube }}" target="_blank"><i
                                                        class="fab fa-youtube"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $store->snapchat }}" target="_blank"><i
                                                        class="fab fa-snapchat-ghost"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $store->instagram }}" target="_blank"><i
                                                        class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $store->twitter }}" target="_blank"><i
                                                        class="fab fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $store->facebook }}" target="_blank"><i
                                                        class="fab fa-facebook-f"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-fields-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-fields" type="button" role="tab"
                                    aria-controls="pills-fields" aria-selected="true">الاقسام</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-ads-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-ads" type="button" role="tab" aria-controls="pills-ads"
                                    aria-selected="false">كل الاعلانات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-info" type="button" role="tab" aria-controls="pills-info"
                                    aria-selected="false">المعلومات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-rating-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-rating" type="button" role="tab"
                                    aria-controls="pills-rating" aria-selected="false">التقييم</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fields fade show active" id="pills-fields" role="tabpanel"
                        aria-labelledby="pills-fields-tab">
                        <ul>

                            @forelse ($store_categories as $store_category)
                                <li>
                                    <a href="{{ route('show-category-products', $store_category->id) }}">

                                        <img src="{{ $store_category->image }}" alt="">
                                        <p>{{ $store_category->store_category_name }}</p>
                                        <i class="fal fa-chevron-left"></i>
                                    </a>
                                </li>
                            @empty
                                <p>لا يوجد أقسام مرتبطة بهذا المتجر</p>
                            @endforelse


                        </ul>
                    </div>


                    <div class="tab-pane ads fade" id="pills-ads" role="tabpanel" aria-labelledby="pills-ads-tab">
                        <div class="row">
                            @forelse($flyers as $item)
                                <div class="col-lg-4 col-6 mb-4">
                                    <div class="shop-field-card shadow-sm">
                                        <button class="favourite-btn">
                                            <i class="fal fa-heart"></i>
                                        </button>
                                        <a href="{{ route('product.details', $store->id) }}"
                                            class="image image-cover customSmHeight">
                                            <img src="{{ $item->image }}" alt="ad">
                                        </a>
                                        <div class="card-body">
                                            <div class="text">
                                                <h6 class="name text-truncate">{{ $item->name }}</h6>
                                                <h5 class="price">{{ $item->price }}د.ك</h5>
                                            </div>
                                            <button class="add-to-cart"><a
                                                    href="{{ route('add.to.cart', $item->id) }}"></a><i
                                                    class="fal fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                لا يوجد إعلانات
                            @endforelse
                        </div>
                    </div>

                    <div class="tab-pane info fade" id="pills-info" role="tabpanel" aria-labelledby="pills-info-tab">
                        {{ $store->description }}
                    </div>
                    <div class="tab-pane rating fade" id="pills-rating" role="tabpanel"
                        aria-labelledby="pills-rating-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="{{ route('store.rate') }}" id="rateFrm" method="post">
                                    @csrf
                                    <div class="user-rate">
                                        <div class="title">
                                            <h5>التقييم</h5>
                                            <p>اضغط على النجوم للتقييم</p>
                                            <div class="your-rate">
                                                <p>تقييمك: <span class="rate-value">0.0</span></p>
                                            </div>
                                        </div>
                                        <div class="stars">
                                            <span class="star-rate"></span>
                                        </div>
                                    </div>
                                    <input type="text" id="rateValInput" name="rate" hidden>
                                </form>
                                <div class="other-rates">
                                    <div class="title">
                                        <h5>التقييم</h5>
                                        <p>متوسط التقييم`
                                            <span class="rates-val"><i class="fas fa-star"></i>
                                                5.0</span>
                                            <span class="votes-number">{{ count($store->rate) }}</span>
                                            صوت
                                        </p>
                                    </div>
                                    <div class="bars">
                                        <div class="stars-progress" id="starProgress">
                                            <h6>5 نجوم</h6>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressBar" role="progressbar"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p id="ratePercent"></p>
                                        </div>

                                        <div class="stars-progress" id="starProgress">
                                            <h6>4 نجوم</h6>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressBar" role="progressbar"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p id="ratePercent"></p>
                                        </div>

                                        <div class="stars-progress" id="starProgress">
                                            <h6>3 نجوم</h6>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressBar" role="progressbar"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p id="ratePercent"></p>
                                        </div>

                                        <div class="stars-progress" id="starProgress">
                                            <h6>نجمتين</h6>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressBar" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p id="ratePercent"></p>
                                        </div>

                                        <div class="stars-progress" id="starProgress">
                                            <h6>نجمة</h6>
                                            <div class="progress">
                                                <div class="progress-bar" id="progressBar" role="progressbar"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <p id="ratePercent"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <!-- contact-modal -->
    <div class="modal modal-one fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fal fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>
                            <!-- change-tel-number -->
                            <a href="tel:{{ $store->phone }}">
                                <div class="row">
                                    <div class="col-2 d-flex align-items-center justify-content-start">
                                        <i class="fal fa-phone-volume"></i>
                                    </div>
                                    <div class="col-8 d-flex align-items-center justify-content-center">
                                        <p>اتصال</p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center justify-content-end"><i
                                            class="fal fa-chevron-left"></i></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a id="copyNumber" data-bs-toggle="popover" data-bs-placement="top"
                                data-bs-content="تم النسخ الى الحافظة" onclick="copyNum()"
                                aria-valuenow="{{ $store->phone }}">
                                <div class="row">
                                    <div class="col-2 d-flex align-items-center justify-content-start">
                                        <i class="fal fa-copy"></i>
                                    </div>
                                    <div class="col-8 d-flex align-items-center justify-content-center">
                                        <p>انسخ الرقم</p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center justify-content-end"><i
                                            class="fal fa-chevron-left"></i></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/{{ $store->phone }}" target="_blank">
                                <div class="row">
                                    <div class="col-2 d-flex align-items-center justify-content-start">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <div class="col-8 d-flex align-items-center justify-content-center">
                                        <p>رسالة واتساب</p>
                                    </div>
                                    <div class="col-2 d-flex align-items-center justify-content-end"><i
                                            class="fal fa-chevron-left"></i></div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')
    <script src="{{ asset('wb/js/jquery.star-rating-svg.min.js') }}"></script>
    <script>
        // like-ad-and-unlike
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
                        thislike.addClass("active");

                    } else {
                        thislike.removeClass("active");

                    }
                }
            })
        });

        function followStore() {
            // var is_follow = $('.follow').data('value');
            // var id = $('.follow').data('id');
            var thislike = $('.follow');
            $.ajax({
                url: thislike.data('href'),
                type: "GET",
            }).done(function(data) {
                if (data) {
                    console.log(data)
                    $('.follow').empty();
                    $('.follow').append("<i class='fal fa-user-times'></i>{{ __('site.Un_follow') }}")
                    // 
                } else {
                    $('.follow').empty();
                    $('.follow').append("<i class='fal fa-user-plus'></i>{{ __('site.Follow') }}")
                }
            });
        }


        $('body').on('click', '.follow', function(e) {
            e.preventDefault();
            followStore()
        });

        /// rate star
        $(".star-rate").starRating({
            starSize: 30,
            useFullStars: true,
            disableAfterRate: false,
            ratedColors: ["#FFA300", "#FFA300", "#FFA300", "#FFA300", "#FFA300"],
            emptyColor: "#ECECEC",
            hoverColor: "#FFA300",
            starShape: "rounded",
            strokeColor: "transparent",
            initialRating: 0,
            callback: function(currentIndex, currentRating, $el) {
                $('.rate-value').text(currentIndex);
                $('#rateValInput').val(currentIndex);
                $("#rateFrm").submit();
            },
            onHover: function(currentIndex, currentRating, $el) {
                $('.rate-value').text(currentIndex);
            },
            onLeave: function(currentIndex, currentRating, $el) {
                $('.rate-value').text(currentRating);
            }
        });
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })

        ///  copy num
        function copyNum() {
            let link = document.querySelector("#copyNumber")
            /* value = document.querySelector("#copyNum").getAttribute("aria-valuenow"); */
            /* Copy the text inside the text field */
            navigator.clipboard.writeText(link.getAttribute("aria-valuenow"));
            setTimeout(() => {
                $("[data-bs-toggle='popover']").popover('hide');
            }, 2000);
        }
    </script>
@endpush
