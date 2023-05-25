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
                    <h4>إضافة تحديث</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="shop-link">
        <div class="container">
            <div class="col-lg-6 col-md-8 m-auto">
                <div class="white-card">
                    <div class="icon sameHeight">
                        <i class="fal fa-pen-square"></i>
                    </div>
                    <h5 class="title">إضافة تحديث</h5>
                    <form action="">
                        <div class="form-group mb-4">
                            <label for="update-title" class="form-label">عنوان التحديث</label>
                            <input type="text" class="form-control input-1" name="update-title" id="update-title"
                                placeholder="اضف عنوان التحديث" required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="more-details" class="form-label">تفاصيل اكثر</label>
                            <textarea class="form-control input-1" name="more-details" id="more-details" placeholder="اضف تفاصيل اكثر"
                                rows="10" required></textarea>
                        </div>
                        <button type="submit" class="btn-1 m-auto">المتابعة</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
