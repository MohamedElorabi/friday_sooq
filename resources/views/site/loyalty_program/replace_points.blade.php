@extends('site.layout')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous" />
@endpush
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item"><a href="loyalty-program.html"><small>برنامج الولاء</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>استبدال النقاط</h4>
                </li>
            </ol>
        </div>
    </nav>

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <section class="loyalty-program-page link-details">
        <div class="container">
            <div class="white-card">
                <div class="account-name">
                    <div class="image image-cover sameHeight">
                        <img src="{{ auth()->user()->image }}" alt="user">
                    </div>
                    <p>مرحبا! <span class="name">{{ auth()->user()->name }}</span></p>
                </div>
                <h5 class="welcome">!أهلا وسهلا بعودتك</h5>
                <div class="points-info">
                    <div class="points">
                        <i class="fal fa-star"></i>
                        <h5>النقاط 4599</h5>
                    </div>
                    <i class="fal fa-equals equal"></i>
                    <div class="price">
                        <i class="fal fa-money-bill-wave"></i>
                        <h5>د.ك 4599</h5>
                    </div>
                </div>
                <img src="{{ asset('wb/imgs/cup.svg') }}" alt="cup" class="cup">
            </div>

            <div class="redeem-policy">
                <h5 class="title">سياسة الاستبدال</h5>
                <small class="notice">
                    أنشئ قسيمة الخصم وإستخدمها عند نشر
                    الإعلانات أو الإضافة إلى السلة.
                </small>
                <p class="text">
                    رصيد نقاطك <b>{{ auth()->user()->points }}</b> بقيمة <b>5</b> دينار كم عدد النقاط
                    التي تريد إستبدالها؟
                </p>
                <form action="{{ route('replace') }}" method="post">
                    @csrf
                    <div class="qty">
                        <button type="button" class="minus-btn sameHeight">
                            <i class="fal fa-minus"></i>
                        </button>
                        <input type="number" min="1" name="points-qty" value="1" id="qtyInput" />
                        <button type="button" class="plus-btn sameHeight">
                            <i class="fal fa-plus"></i>
                        </button>
                    </div>
                    <small class="equivalent">ما يعادل <b>4</b> دينار</small>
                    <button type="submit" class="btn-1 m-auto">استبدل النقاط</button>
                </form>
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
