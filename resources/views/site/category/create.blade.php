@extends('site.layout')
@section('content')


@if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
<nav class="breadcrumb-nav" aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('index')}}"><small>الرئيسية</small></a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('site.stores')}}"><small>المتاجر</small></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <h4>إضافة قسم</h4>
            </li>
        </ol>
    </div>
</nav>

<section class="shop-link">
    <div class="container">
        <div class="col-lg-6 col-md-8 m-auto">
            <div class="white-card">
                <div class="icon sameHeight">
                    <i class="fal fa-file-plus"></i>
                </div>
                <h5 class="title">إضافة قسم</h5>
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="upload-icon mb-4">
                        <div class="icon-div image-cover sameHeight" id="storeImg">
                            <input type="file" class="uploader-div form-control" name="image" id="storeImgUploader">
                            <div class="default-img">
                                <i class="fal fa-camera-alt"></i>
                            </div>
                        </div>
                        <label>اضف ايقونة القسم</label>
                    </div>
                    <div class="form-group mb-4">
                        <label for="category-title" class="form-label">عنوان القسم باللغة العربية</label>
                        <input type="text" class="form-control input-1" name="name_ar" id="category-title"
                            placeholder="اضف عنوان القسم" required />
                    </div>

                    <div class="form-group mb-4">
                        <label for="category-title" class="form-label">عنوان القسم باللغة الانجليزية</label>
                        <input type="text" class="form-control input-1" name="name_en" id="category-title"
                            placeholder="اضف عنوان القسم" required />
                    </div>
                    <button type="submit" class="btn-1 m-auto">المتابعة</button>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection