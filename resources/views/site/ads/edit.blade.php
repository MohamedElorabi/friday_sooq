@extends('site.layout')
@section('content')
    <nav class="breadcrumb-nav" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><small>الرئيسية</small></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <h4>تعديل اعلان</h4>
                </li>
            </ol>
        </div>
    </nav>


    <section class="create-ad">
        <div class="container">
            <form class="ad-form" action="{{ route('ad.update', $ad->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="imgs-uploader white-card">
                            <!-- <div id="uppy-container"></div> -->
                            <div class="image-uploader">
                                <div class="input-div">
                                    <div class="input">
                                        <i class="fal fa-plus"></i>
                                        <input class="form-control" type="file" id="files" name="image[]" multiple />

                                    </div>
                                </div>
                                <div class="uploaded-files">
                                    <div class="row" id="uploadedFiles">

                                    </div>
                                </div>
                                <div class="placeholder" id="placeholder">
                                    <i class="fal fa-cloud-upload"></i>
                                    <h5 class="title">قم بسحب الصور وافلاتها هنا او اضغط لاختيار الصور </h5>
                                    <p>يمكنك تحميل 4 صور بحد اقصى</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="ad-inputs white-card">
                            <div class="form-group mb-4">
                                <label for="title" class="form-label">عنوان الاعلان</label>
                                <input type="text" class="form-control input-1" value="{{ $ad->name }}"
                                    name="name" id="title" placeholder="اكتب عنوان الاعلان هنا" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>


                            <div class="form-group mb-4">
                                <select class="form-select input-1" aria-label="Default select example" name="category_id"
                                    id="category">
                                    <option selected disabled>اختر صنف الاعلان</option>
                                    @foreach ($categories as $category)
                                        <option {{ $category->id == $ad->category_id ? 'selected' : '' }}
                                            value="{{ $category->id }}">
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger text-left">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>


                            <div class="form-group mb-4">
                                <select class="form-select input-1" aria-label="Default select example" name=""
                                    id="subcategory">
                                </select>
                            </div>


                            <div class="form-group mb-4">
                                <label for="price" class="form-label">سعر المنتج</label>
                                <div class="input-div">
                                    <p>د.ك</p>
                                    <input type="number" class="form-control input-1" value="{{ $ad->price }}"
                                        name="price" id="price" placeholder="اكتب السعر هنا" required>
                                    @if ($errors->has('price'))
                                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="describtion" class="form-label">الوصف</label>
                                <textarea class="form-control input-1" name="desc" id="describtion" rows="6" placeholder="اكتب الوصف هنا">{{ $ad->desc }}</textarea>
                                @if ($errors->has('desc'))
                                    <span class="text-danger text-left">{{ $errors->first('desc') }}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="user-inputs white-card">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="other-phone" class="form-label">رقم هاتف اخر</label>
                                        <input type="number" class="form-control input-1" value="{{ $ad->mobile }}"
                                            name="mobile" id="other-phone" placeholder="اكتب رقم الهاتف هنا">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="govern" class="form-label">المحافظة</label>
                                        <select class="form-select input-1" name="city_id" id="govern"
                                            aria-label="Default select example">

                                            <option selected disabled> {{ __('site.Select_City') }}</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ $city->id == $ad->city_id ? 'selected' : '' }}>{{ $city->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        @if ($errors->has('city_id'))
                                            <span class="text-danger text-left">{{ $errors->first('city_id') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-12">

                                    <div class="form-check form-group form-switch">
                                        <input class="form-check-input" type="checkbox" value="{{ $ad->whatsapp }}"
                                            role="switch" name="whatsapp" id="whatsapp">
                                        <label class="form-check-label" for="whatsapp">السماح بالمراسلة عبر
                                            واتساب</label>
                                    </div>
                                    <div class="form-check form-group form-switch">
                                        <input class="form-check-input" type="checkbox" value="{{ $ad->map }}"
                                            role="switch" id="map-show" name="map">
                                        <label class="form-check-label" for="map-show">السماح بمشاركةالموقع</label>
                                    </div>

                                    <div class="section-div shadow-sm" id="mapDiv">

                                        <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d132328.95890918095!2d47.973146541545496!3d29.360270938884454!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fcf9c8ce8db396d%3A0x6747a130779f0bc0!2z2K3ZiNmE2YrYjCDYp9mE2YPZiNmK2KrigI4!5e0!3m2!1sar!2seg!4v1650443171125!5m2!1sar!2seg"
                                            class="w-100" id="mapFrame" style="border:0; display:none;"
                                            allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="ad-type white-card">
                            <ul>
                                <li>
                                    <div class="form-check form-group form-switch">
                                        <i class="fal fa-coins icon"></i>
                                        <input class="form-check-input" type="radio" role="switch" name="ad-type"
                                            value="free-ad" id="free-ad" checked>
                                        <label class="form-check-label" for="free-ad">مجانا</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check form-group form-switch">
                                        <i class="fal fa-rocket-launch icon"></i>
                                        <input class="form-check-input" type="radio" role="switch" name="ad-type"
                                            value="featured-ad" id="featured-ad">
                                        <label class="form-check-label" for="featured-ad">مميز</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <ul class="ad-btns">
                            <li>
                                <button type="button" class="btn-2" data-bs-toggle="modal" data-bs-target="#adView">
                                    <i class="fal fa-eye"></i>
                                    معاينة الاعلان
                                </button>
                            </li>
                            <li>
                                <button type="submit" class="btn-1">نشر الاعلان</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>




    <!-- modals -->
    <div class="modal modal-one fade" id="adView" tabindex="-1" aria-labelledby="adViewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adViewLabel">معاينة الاعلان</h5>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ad-details-page">
                        <div class="ad-details">
                            <div class="slogan-right">
                                <div class="ad-images">
                                    <div class="featured-ribbon">
                                        <div class="ribbon">
                                            اعلان مميز
                                        </div>
                                    </div>
                                    <div class="ad-img-carousel owl-carousel owl-theme" id="sameHeight">
                                        <div class="item image-cover customSmHeight">
                                            <img src="{{ asset('wb/imgs/ad-img.svg') }}" alt="ad-img">
                                        </div>
                                        <div class="item image-cover customSmHeight">
                                            <img src="{{ asset('wb/imgs/ad-img.svg') }}" alt="ad-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="details-bar">
                                    <p class="time"><i class="far fa-clock"></i>منذ 0 ايام</p>
                                    <div class="divider"></div>
                                    <p class="watches"><i class="far fa-eye"></i>0</p>
                                    <div class="divider"></div>
                                    <p class="camera"><i class="fas fa-camera"></i>0</p>
                                </div>
                                <div class="title-price">
                                    <h5>اسم الاعلان</h5>
                                    <h4>000 د.ك</h4>
                                </div>
                                <div class="description">
                                    <h5>الوصف</h5>
                                    <p>
                                        هنا نكتب وصف المنتج المعروض للبيع بشكل مفصل ،في هذا المكان نكتب وصف المنتج
                                        المعروض
                                        ...للبيع بشكل مفصل
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script>
        let mapToggler = document.querySelector("#map-show"),
            mapFrame = document.querySelector("#mapFrame");
        mapToggler.onclick = function() {
            this.classList.toggle("checked");
            if (mapToggler.classList.contains("checked")) {
                mapFrame.style.display = "block";
            } else {
                mapFrame.style.display = "none";
            }
        }
    </script>


    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#category').on('change', function(e) {
                var cat_id = e.target.value;
                $('#subcategory').empty();
                $.ajax({
                    url: "{{ route('ad.getSubCtegory') }}",
                    type: "post",
                    data: {

                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#subcategory').html(`<option value="">اختر قسم فرعى</option>`)
                        console.log(data);
                        for (const option of data) {
                            html = `
                        <option value="${option.id}">${option.title}</option>
                        `
                            $('#subcategory').append(html)
                        }

                    }
                })
            });
        });
    </script>
@endpush




{{-- @push('custom-scripts')

<script>


      $("#city").change(function (e) {
            e.preventDefault();
            var cityId = $(this).val();
            // alert(cityId);
              $.ajax({
             url: '{{url('ajax/towns')}}'+'/' + cityId,
             type:"GET",
         }).done(function(data){

             $('#area').html('');
             $('#area').append('<option>اختر المنطقه</option');    
             for( var i = data.length - 1; i >= 0; i--){
 
                  html ='<option value="'+data[i].id+'">' +data[i].title+'</option>';
    
                
      $('#area').append(html);    
             };
         });
     });
     
     
   
</script>
@endpush --}}
