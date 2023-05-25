@extends('site.layout')
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="{{ route('loyalty_program.index') }}"><small>برنامج الولاء</small></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>تحويل النقاط</h4>
                </li>
            </ol>
        </div>
    </nav>


    <section class="loyalty-program-page link-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="white-card h-100">
                        <h4 class="title">تحويل الى صديق</h4>
                        <div class="icon sameHeight">
                            <img src="{{ asset('wb/imgs/icons/points-trans.svg') }}" alt="points-trans">
                        </div>
                        <div class="total-points">
                            <h5 class="title">
                                مجموع النقاط:
                            </h5>
                            <h5 class="num">{{ auth()->user()->points }}</h5>
                        </div>
                        <form action="{{ route('send') }}" method="post">
                            @csrf
                            <div class="row" dir="ltr">
                                <div class="col-md-5 col-sm-6">
                                    <div class="form-group mb-4">
                                        <label for="country-code" class="form-label">كود المحافظة</label>
                                        <select class="form-select input-1" aria-label="Default select example"
                                            name="country-code" id="country-code">
                                            <option selected disabled>اختر كود المحافظة</option>
                                            <option value="1">مصر (+20)</option>
                                            <option value="2">الكويت (+000)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-6 mb-4">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">رقم الهاتف المراد التحويل اليه </label>
                                        <input type="text" class="form-control input-1" name="mobile" id="phone"
                                            placeholder="اضف رقم الهاتف" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group points-qty">
                                <label for="phone" class="form-label">ادخل مجموعة النقاط التى تريد تحويلها</label>
                                <div class="qty">
                                    <button type="button" class="minus-btn sameHeight">
                                        <i class="fal fa-minus"></i>
                                    </button>
                                    <input type="number" min="1" name="points" value="1" id="qtyInput" />
                                    <button type="button" class="plus-btn sameHeight">
                                        <i class="fal fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="submit" class="btn-1 m-auto w-100"> تحويل النقاط</button>
                        </form>
                    </div>
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
    </script>
@endpush
