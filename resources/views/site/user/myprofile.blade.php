@extends('site.layout')
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>حسابى</h4>
                </li>
            </ol>
        </div>
    </nav>


    <section class="my-profile-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="slogan-right">
                        <div class="profile-img sameHeight">
                            <img src="{{ $user->image }}" alt="profile-img" class="default-img">
                        </div>
                        <h5 class="name">{{ $user->name }}</h5>
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
                        @if (auth()->user()->id == $user->id)
                            <a href="{{ route('site.profile.edit', $user->id) }}" class="edit-btn"><i
                                    class="fal fa-pen"></i>تعديل الملف الشخصى</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="slogan-left">
                        <ul>
                            <li>
                                <i class="fal fa-coins icon"></i>
                                <p>مجانا: <span>0.0د.ك</span></p>
                                <p>مميز: <span>0.0د.ك</span></p>
                                <a href="#" class="more-info"><i class="fas fa-info"></i></a>
                            </li>
                            <li>
                                <i class="fal fa-mobile-alt icon"></i>
                                <p>رقم الهاتف: <span>{{ $user->mobile }}</span></p>
                            </li>

                            <li>
                                <i class="fal fa-map-marker-alt icon"></i>
                                <p>الموقع: <span>{{ $user->country->name }}</span></p>
                            </li>
                            <li>
                                <i class="fal fa-history icon"></i>
                                <p>عضو منذ: <span>{{ $user->created_at }}</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('custom-scripts')
@endpush
