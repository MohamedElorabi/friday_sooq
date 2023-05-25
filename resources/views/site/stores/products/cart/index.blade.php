@extends('site.layout')

@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><small>الرئيسية</small></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="shops.html"><small>المتاجر</small></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>عربة التسوق</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shopping-cart-page itemsParent" id="marginForNav">
        <div class="empty-placeholder">
            <i class="fad fa-shopping-cart"></i>
            <h5>عربة التسوق فارغة</h5>
            <p>لم يتم اضافة منتجات لعربة التسوق حتى الان</p>
        </div>
        <div class="container">
            <form action="cart-order-verified.html">
                <div class="row">
                    <div class="col-lg-8">
                        <ul class="cart-prods-list">
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    <li id="removeableItem">
                                        <div class="card cart-card">
                                            <button class="removeBtn" id="removeBtn">
                                                <i class="fal fa-trash remove-i" id="removeBtn"></i>
                                            </button>
                                            <a href="product-details.html" class="image image-cover customHeight">
                                                <img src="{{ asset('wb/imgs/ad-img.svg') }}" alt="ad" />
                                            </a>
                                            <div class="card-body">
                                                <h5 class="name text-truncate">
                                                    product name
                                                </h5>
                                                <div class="controls-price">
                                                    <div class="number">
                                                        <button type="button" class="minus-btn sameHeight">
                                                            <i class="fal fa-minus"></i>
                                                        </button>
                                                        <input type="number" min="1" name="amount" value="1"
                                                            id="qtyInput" />
                                                        <button type="button" class="plus-btn sameHeight">
                                                            <i class="fal fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <h4 class="price">
                                                        <span id="cartItemPrice">price</span>د.ك
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="disc-code white-card" id="removeableControls">
                            <input type="text" name="discount-code" placeholder="تفعيل كود الخصم" autofocus />
                            <button type="button">تفعيل</button>
                        </div>
                        <div class="cart-ctrls white-card" id="removeableControls">
                            <div class="accordion accordion-flush ctrls" id="accordionFlushExample">
                                <div class="accordion-item mb-3">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button ctrl collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <i class="fal fa-map-marker-alt"></i>
                                            <span>عنوان الشحن</span>
                                            <i class="fal fa-plus sameHeight icon"></i>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="list mb-3">
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="address"
                                                            id="address1" value="address1" />
                                                        <label class="form-check-label" for="address1">
                                                            اسم العنوان هنا
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="address"
                                                            id="address2" value="address2" checked />
                                                        <label class="form-check-label" for="address2">
                                                            اسم العنوان هنا
                                                        </label>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a href="add-new-address.html" class="btn-2">
                                                <i class="fal fa-plus"></i>
                                                اضف عنوان جديد
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button ctrl collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            <i class="fal fa-money-bill"></i>
                                            <span>طريقة الدفع</span>
                                            <i class="fal fa-pen sameHeight icon"></i>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <ul class="list mb-3">
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment"
                                                            id="cash" value="cash" checked />
                                                        <label class="form-check-label" for="cash">
                                                            الدفع عند الاستلام
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment"
                                                            id="knit" value="knit" />
                                                        <label class="form-check-label" for="knit">
                                                            كنيت
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment"
                                                            id="visa/mastercard" value="visa/mastercard" />
                                                        <label class="form-check-label" for="visa/mastercard">
                                                            فيزا / ماستر كار
                                                        </label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="payment"
                                                            id="wallet" value="wallet" />
                                                        <label class="form-check-label" for="wallet">
                                                            المحفظة
                                                        </label>
                                                        <div class="wallet-balance">{{ auth()->user()->balance }}KWD</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cart-summary white-card" id="removeableControls">
                            <h5 class="details-title">
                                <span id="cartLength"></span> عناصر فى عربة التسوق
                            </h5>
                            <ul class="list mb-4">
                                <li>
                                    <p class="title">المجموع الفرعي</p>
                                    <p class="num"><span id="cartSubtotal"></span> د.ك</p>
                                </li>
                                <li>
                                    <p class="title">الشحن</p>
                                    <p class="num"><span id="shipping">120</span> د.ك</p>
                                </li>
                                <li>
                                    <h6 class="title">المجموع الكلي</h6>
                                    <h6 class="num"><span id="cartTotal"></span> د.ك</h6>
                                </li>
                            </ul>
                            <button type="submit" class="btn-1 w-100 justify-content-center">
                                اتمام عملية الشراء
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @include('site.partials.menu_bottom.order_nav');
@endsection
