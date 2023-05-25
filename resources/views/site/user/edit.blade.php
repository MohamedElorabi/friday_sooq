@extends('site.layout')
@section('content')
    <!-- profile-page-start -->
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>تعديل الصفحة الشخصية</h4>
                </li>
            </ol>
        </div>
    </nav>

    <section class="my-profile-page edit-profile-page">
        <div class="container">
            <div class="row">


                <div class="col-md-3">
                    <div class="slogan-right">
                        <form action="{{ route('site.profile.update', $user->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="profile-img sameHeight" id="storeImg">
                                <div class="uploader-div">
                                    <div class="uploader-input">
                                        <i class="fal fa-pen"></i>
                                        <input type="file" class="form-control" name="image" id="storeImgUploader">
                                    </div>
                                </div>
                                <img src="{{ $user->image }}" alt="profile-img" class="default-img">
                            </div>
                            <div class="main-info">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="info-card">
                                            <h5 class="number">{{ count($user->followers) }}</h5>
                                            <p class="title">متابعون لك</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="info-card">
                                            <h5 class="number">{{ count($user->following) }}</h5>
                                            <p class="title">من تتابعهم</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>


                <div class="col-md-9">
                    <div class="slogan-left">

                        <ul>
                            <li>
                                <div class="form-group mb-4">
                                    <div class="input-field">
                                        <i class="fal fa-user"></i>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user->name }}" placeholder="{{ __('site.Full_name') }}">

                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="form-group mb-4">
                                    <div class="input-field">
                                        <i class="fal fa-mobile-alt"></i>
                                        <input type="number" class="form-control" id="phone" name="mobile"
                                            value="{{ $user->mobile }}" placeholder="{{ __('site.Phone') }}">
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="form-check form-switch mb-4">
                                    <input class="form-check-input" type="checkbox" name="follow" id="followToggler"
                                        value="{{ $user->follow }}" {{ $user->follow == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="followToggler">السماح للاشخاص
                                        بمتابعتى</label>
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-primary btn-1">حفظ التغييرات</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- profile-page-end -->
@endsection
