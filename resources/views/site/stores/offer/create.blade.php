@extends('site.layout')
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}"><small>الرئيسية</small></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('site.stores') }}"><small>المتاجر</small></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>إضافة عرض</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-link">
        <div class="container">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="white-card">
                    <div class="icon sameHeight">
                        <i class="fal fa-badge-percent"></i>
                    </div>
                    <h5 class="title">إضافة عرض</h5>
                    <form action="{{ route('store.offer') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="upload-img mb-4">
                            <div class="image-div image-cover sameHeight" id="storeImg">
                                <input type="file" class="uploader-div form-control" name="image"
                                    id="storeImgUploader">

                                <img src="{{ asset('wb/imgs/ad-img.svg') }}" alt="upload-img" class="default-img">
                            </div>
                            <label>قم بتحميل صورة العرض</label>
                            @if ($errors->has('image'))
                                <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="update-title" class="form-label">عنوان العرض</label>
                            <input type="text" class="form-control input-1" name="name" id="update-title"
                                placeholder="اضف عنوان التحديث" />
                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="describtion" class="form-label">الوصف</label>
                            <textarea class="form-control input-1" name="description" id="describtion" placeholder="اضف الوصف" rows="10"></textarea>
                            @if ($errors->has('description'))
                                <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="plus-minus-input form-group mb-4">
                            <label for="qtyInput" class="form-label text-center">حدد قيمة الخصم</label>
                            <div class="number m-auto">
                                <button type="button" class="minus-btn sameHeight"><i class="fal fa-minus"></i></button>
                                <div class="percent-input">
                                    <input type="number" min="1" max="100" name="coupon_rate" value="1"
                                        id="qtyInput" />
                                    @if ($errors->has('coupon_rate'))
                                        <span class="text-danger text-left">{{ $errors->first('coupon_rate') }}</span>
                                    @endif
                                </div>
                                <button type="button" class="plus-btn sameHeight"><i class="fal fa-plus"></i></button>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="qtyInput" class="form-label text-center">انشئ رمز QR</label>
                            <div class="disc-modal mt-5">
                                <div class="modal-body p-0">
                                    <div class="qr-code">
                                        <i class="fal fa-tags tag-icon"></i>
                                        <img src="{{ asset('wb/imgs/qr-code.svg') }}" alt="qr-code">
                                    </div>
                                    <button type="button" class="btn-1">انشاء</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-check form-switch mb-4">
                            <label class="form-check-label" for="add-time">اضافة الوقت</label>
                            <input class="form-check-input" type="checkbox" role="switch" id="add-time" name="start_date">

                        </div>
                        <div class="time-div">
                            <div class="form-group mb-4">
                                <label for="launch-date" class="form-label">تاريخ اطلاق العرض</label>
                                <input type="date" class="form-control input-1 date-input" id="launch-date"
                                    name="start_date" placeholder="ادخل تاريخ اطلاق العرض">
                                @if ($errors->has('start_date'))
                                    <span class="text-danger text-left">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-4">
                                <label for="exp-date" class="form-label">تاريخ انتهاء العرض</label>
                                <input type="date" class="form-control input-1 date-input" id="exp-date"
                                    name="end_date" placeholder="ادخل تاريخ انتهاء العرض">
                                @if ($errors->has('end_date'))
                                    <span class="text-danger text-left">{{ $errors->first('end_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn-1 m-auto">المتابعة</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('custom-scripts')
    <script>
        $(document).ready(function() {
            $('.minus-btn').click(function() {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus-btn').click(function() {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });



        function checkInputStat() {
            let addTime = $("#add-time");
            if ($(addTime).hasClass("checked")) {
                $('.time-div').show();
            } else {
                $('.time-div').hide();
            }
        }
        checkInputStat()

        $('#add-time').click(function() {
            $(this).toggleClass("checked");
            checkInputStat();
        })

        $(".date-input").flatpickr({
            dateFormat: "Y-m-d",
            position: 'auto right'
        });
    </script>
@endpush
