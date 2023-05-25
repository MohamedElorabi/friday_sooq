@extends('site.partials.auth.layout')
@section('content')
    <div class="col-sm-6">
        <div class="login-slogan">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="slog-title">
                    <h5 class="welcome">مرحبا بك فى سوق الجمعة!</h5>
                    <h1 class="title h3">انشاء حساب</h1>
                    <p class="subtitle">قم باكمال معلوماتك الشخصية لتتمكن من انشاء حسابك</p>
                </div>
                <div class="form-group mb-3">
                    <label for="storeImgUploader" class="form-label text-center">صورتك الشخصية</label>
                    <div class="profile-img sameHeight" id="storeImg">
                        <div class="uploader-div">
                            <div class="uploader-input">
                                <i class="fal fa-pen"></i>
                                <input type="file" class="form-control" name="image" id="storeImgUploader">
                            </div>
                        </div>
                        <img src="{{ asset('wb/imgs/user-img.svg') }}" alt="profile-img" class="default-img">
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="name" class="form-label">اسمك الكامل</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="ادخل اسمك كاملا"
                        aria-describedby="nameHelp" required>
                </div>
                <button type="submit" class="btn btn-primary btn-1">انشاء حساب</button>
            </form>
        </div>
    </div>

    <!-- login-register-page-end -->
@endsection
