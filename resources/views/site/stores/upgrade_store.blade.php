@extends('site.layout')
@section('content')
    <section class="upgrade-to-shop">


        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        <div class="container">
            <form action="{{ route('site.stores.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="cover" id="storeCover">
                    <div class="uploader-div">
                        <div class="uploader-input">
                            <i class="fal fa-pen"></i>
                            <input type="file" name="cover" class="form-control" id="storeCoverUploader">
                        </div>
                    </div>
                    <img src="{{ asset('wb/imgs/store-img.svg') }}" class="default-cover" alt="store-cover">
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="form-label mb-4">صورة المتجر او الشركة</label>
                            <div class="img sameHeight" id="storeImg">
                                <div class="uploader-div">
                                    <div class="uploader-input">
                                        <i class="fal fa-pen"></i>
                                        <input type="file" name="avatar" class="form-control" id="storeImgUploader">
                                    </div>
                                </div>
                                <img src="{{ asset('wb/imgs/store-img.svg') }}" alt="store-img" class="default-img">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group mb-4">
                            <label for="name" class="form-label">اسم المتجر او الشركة</label>
                            <div class="input-field">
                                <i class="fal fa-store"></i>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="اسم المتجر او الشركة هنا">
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="shop-location" class="form-label">العنوان</label>
                            <div class="input-field">
                                <i class="fal fa-map-marker-alt"></i>
                                <input type="text" class="form-control" id="shop-location" name="address"
                                    placeholder="عنوان المتجر او الشركة هنا">
                            </div>

                        </div>
                        <div class="form-group mb-4">
                            <label for="service-location" class="form-label">مكان الخدمة</label>
                            <div class="input-field">
                                <i class="fal fa-map-marker-alt"></i>
                                <input type="text" class="form-control" id="service-location" name="coordinates"
                                    placeholder="مكان الخدمة هنا">
                            </div>

                        </div>
                        <div class="form-group mb-4">
                            <label for="phone" class="form-label">هاتف المتجر او الشركة</label>
                            <div class="input-field">
                                <i class="fal fa-phone-alt"></i>
                                <input type="number" class="form-control" id="phone" name="phone"
                                    placeholder="هاتف المتجر او الشركة هنا">
                            </div>

                        </div>
                        <div class="form-group mb-4">
                            <label for="describtion" class="form-label">الوصف</label>
                            <div class="textarea-field">
                                <i class="fal fa-clipboard-list"></i>
                                <textarea class="form-control" rows="5" id="description" name="description" placeholder="اكتب وصفا دقيقا هنا"></textarea>
                            </div>

                        </div>
                        <div class="form-group mb-4">
                            <label for="website-url" class="form-label">الموقع الالكترونى</label>
                            <div class="input-field">
                                <i class="fal fa-globe"></i>
                                <input type="url" class="form-control" id="website-url" name="website"
                                    placeholder="الموقع الالكترونى هنا">
                            </div>
                        </div>
                        <div class="accordion accordion-flush form-group mb-4" id="accordionFlushExample">
                            <div class="accordion-item">
                                <div class="input-field">
                                    <i class="fal fa-clock"></i>
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed form-control" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            اوقات العمل:
                                        </button>
                                    </h2>
                                </div>
                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <ul id="work-time-list">
                                            <li id="inputsLi">
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">السبت</p>
                                                        <input type="hidden" name="day[]" value="السبت">
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">الاحد</p>
                                                        <input type="hidden" name="day[]" value="الاحد">
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">الاثنين</p>
                                                        <input type="hidden" name="day[]" value="الاثنين">

                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">الثلاثاء</p>
                                                        <input type="hidden" name="day[]" value="الثلاثاء">
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">الاربعاء</p>
                                                        <input type="hidden" name="day[]" value="الاربعاء">
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">الخميس</p>
                                                        <input type="hidden" name="day[]" value="الخميس">
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2 mb-sm-0 d-flex align-items-center">
                                                        <p class="day-name">الجمعة</p>
                                                        <input type="hidden" name="day[]" value="الجمعة">
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="fromInput" name="start[]" placeholder="من"
                                                                    readonly>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-6">
                                                        <div class="form-group">
                                                            <div class="input-field">
                                                                <input type="number" class="form-control time-input"
                                                                    id="toInput" name="end[]" placeholder="الى"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-sm-2 col-12 mt-2 mt-sm-0  d-flex align-items-center justify-content-end">
                                                        <button type="button" class="edit edit-work-time-btn"><i
                                                                class="fal fa-edit edit-work-time-btn"></i></button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary submit-btn">حفظ التغييرات</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('custom-scripts')
    <script>
        let work = document.querySelector("#work-time-list");

        work.addEventListener("click", function(e) {
            if (e.target.classList.contains("edit-work-time-btn")) {
                e.target.classList.toggle("fa-save");
                let fromInput =
                    e.target.parentElement.parentElement.parentElement.getElementsByClassName(
                        "time-input"
                    )[0],
                    toInput =
                    e.target.parentElement.parentElement.parentElement.getElementsByClassName(
                        "time-input"
                    )[1];

                fromInput.toggleAttribute("readonly");
                toInput.toggleAttribute("readonly");
            }
            if (e.target.hasAttribute("readonly")) {
                e.target.setAttribute("type", "number");
            } else {
                e.target.setAttribute("type", "time");
            }
        });
    </script>
@endpush
