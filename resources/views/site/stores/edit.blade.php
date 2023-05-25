@extends('site.layout')
@section('content')
            <!-- store-details-page-start -->
        <div class="store-details-page">
            <form action="">
                <div class="cover image-cover customXSmHeight upload-div" id="storeCover">
                    <div class="overlay"></div>
                    <div class="upload-input shadow-sm">
                        <i class="fal fa-edit"></i>
                        <p>{{__('site.Edit')}}</p>
                        <input type="file" name="cover" id="storeCoverUploader" class="form-control">
                    </div>
                    <img src="assets/imgs/default-store.svg" class="default-cover">
                </div>
                <section class="store-main-info shadow">
                    <div class="container">
                        <div class="image-name">
                            <div class="image image-cover sameHeight upload-div" id="storeProfile">
                                <div class="overlay"></div>
                                <div class="upload-input shadow-sm">
                                    <i class="fal fa-edit"></i>
                                    <input type="file" name="avatar" id="storeProfileUploader" class="form-control">
                                </div>
                                <img src="assets/imgs/default-store.svg" class="default-profile">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label">{{__('site.Store_name')}}</label>
                                        <input type="text" class="form-control input-1" id="name" name="name" value="{{$store->name}}"
                                            placeholder="{{__('site.Store_name')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone" class="form-label">{{__('site.Mobile')}}</label>
                                        <input type="number" class="form-control input-1" id="phone" name="phone" value="{{$store->phone}}"
                                            placeholder="{{__('site.Mobile')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="store-link" class="form-label">{{__('site.Web_Site')}}</label>
                                        <input type="url" class="form-control input-1" id="store-link" name="store-link"
                                            placeholder="رابط المتجر" value="{{$store->website}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="describtion" class="form-label">{{__('site.Description')}}</label>
                                        <textarea class="form-control input-1" id="describtion" value="{{$store->description}}" name="describtion"
                                            placeholder="اكتب الوصف" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn-1 w-50 m-auto">{{__('site.Save')}}</button>
                </section>
            </form>
        </div>
        <!-- store-details-page-end -->
@endsection