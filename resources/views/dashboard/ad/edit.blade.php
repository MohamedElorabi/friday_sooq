@extends('layouts.default-layout.master')
@section('title')تعديل إعلان
{{ $title }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3> الاعلانات</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل  اعلان</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                @if (count($errors) > 0)

                                    <div class="alert alert-danger">

                                        <ul>

                                            @foreach ($errors->all() as $error)

                                                <li>{{ $error }}</li>

                                            @endforeach

                                        </ul>

                                    </div>

                                @endif

                                @if(Session::has('success'))

                                    <div class="alert alert-success">{{Session::get('success')}}</div>

                                @endif
                            </div>
                            <div class="card-body">
                                <form action={{route('ads.update',$info->id)}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم </label>
                                        <input class="form-control" value="{{$info->name}}" id="name_ar" type="text"  name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="desc_ar">الوصف  </label>
                                        <textarea class="form-control" id="desc_ar" type="text" name="desc">{{$info->desc}}</textarea>
                                    </div>

                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_hi">رقم الهاتف</label>
                                        <input class="form-control" value="{{$info->mobile}}" id="name_hi" type="text" name="mobile">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_fil">اسم المستخدم</label>
                                        <input class="form-control" value="{{$info->user_name}}" id="name_en" type="text" name="user_name">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_fil">السعر</label>
                                        <input class="form-control" value="{{$info->price}}" id="name_en" type="text" name="price">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">العميل </label>
                                        <select id="select"  name="user_id"  class="form-control">
                                            <option >اختر العميل</option>
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}" {{($user->id ==$info->user_id)? "selected":""}}>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">الدوله </label>
                                        <select id="country"  name="country_id"  class="form-control">
                                            <option >اختر الدوله</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}" {{($country->id ==$info->country_id)? "selected":""}}>{{$country->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">المحافظه </label>
                                        <select id="city"  name="city_id"  class="form-control">
                                            <option >اختر المحافظه</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}" {{($city->id ==$info->city_id)? "selected":""}}>{{$city->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">المنطقه </label>
                                        <select id="town"  name="town_id"  class="form-control">
                                            <option >اختر المنطقه</option>
                                            @foreach($towns as $town)
                                                <option value="{{$town->id}}" {{($town->id ==$info->town_id)? "selected":""}}>{{$town->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">القسم  الرئيسي</label>
                                        <select id="maincategory"  name="category_id"  class="form-control">
                                            <option >اختر القسم</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{($category->id ==$info->category_id)? "selected":""}}>{{$category->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">القسم الفرعي </label>
                                        <select id="subcategory"  name="sub_category_id"  class="form-control">
                                            <option >اختر القسم</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{$subcategory->id}}" {{($subcategory->id==$info->sub_category_id)?"selected" :""}} >{{$subcategory->name_ar}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">حاله الاعلان</label>
                                        <select id="select"  name="active"  class="form-control">
                                            <option value="actived" {{($info->active == "activated" )? "selected":""}}>مفعل</option>
                                            <option value="waiting" {{($info->active == "waiting" )? "selected":""}}>منتظر</option>
                                            <option value="refused" {{($info->active == "refused" )? "selected":""}}>مرفوض</option>
                                            <option value="archived" {{($info->active == "archived" )? "selected":""}}>مؤرشف</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">نوع الاعلان</label>
                                        <select id="select"  name="type"  class="form-control">
                                                <option value="service" {{($info->type == "service" )? "selected":""}}>خدمه</option>
                                                <option value="product" {{($info->type == "product" )? "selected":""}}>منتج</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_hi">اتصال</label>
                                         <select id="select"  name="call"  class="form-control">
                                                <option value="1" {{($info->call == 1 )? "selected":""}}>مفعل</option>
                                                <option value="0" {{($info->call == 0 )? "selected":""}}>غير مفعل</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_hi">واتساب</label>
                                        <select id="select"  name="whatsapp"  class="form-control">
                                                <option value="1" {{($info->whatsapp == 1 )? "selected":""}}>مفعل</option>
                                                <option value="0" {{($info->whatsapp == 0 )? "selected":""}}>غير مفعل</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_hi">مفعل بتاريخ</label>
                                        <input class="form-control" value="{{$info->active_at}}"  type="datetime-local" name="active_at">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_hi">مميز بتاريخ</label>
                                        <input class="form-control" value="{{$info->special_at}}"  type="datetime-local" name="special_at">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_hi">سعر خاص </label>
                                        <input class="form-control" value="{{$info->special_package}}"  type="text" name="special_package">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">الصور </label>
                                        <input class="form-control" id="image" name="image[]" type="file" multiple="multiple">
                                    </div>



                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button class="btn btn-secondary">Cancel</button>
                                </form>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>


        <script>
            $("#maincategory").change(function (e) {
                e.preventDefault();
                var categoryId = $(this).val();
                // alert(categoryId);
                $.ajax({
                    url: '{{url('admin/get-sub')}}'+'/' + categoryId,
                    type:"GET",
                }).done(function(data){
                    //  console.log(data[i].name);
                    $('#subcategory').html('');

                    $('#subcategory').append('<option value="">اختار القسم الفرعي</option>');
                    for( var i = data.length - 1; i >= 0; i--){
                        html ='<option value="'+data[i].id+'">' +data[i].name_ar+'</option>';


                        $('#subcategory').append(html);
                    };
                });
            });

        </script>

        <script>
            $("#country").change(function (e) {
                e.preventDefault();
                var countryId = $(this).val();
                // alert(countryId);
                $.ajax({
                    url: '{{url('admin/get-cities')}}'+'/' + countryId,
                    type:"GET",
                }).done(function(data){
                    //  console.log(data[i].name);
                    $('#city').html('');

                    $('#city').append('<option value="">اختار  المحافظه</option>');
                    for( var i = data.length - 1; i >= 0; i--){
                        html ='<option value="'+data[i].id+'">' +data[i].name_ar+'</option>';


                        $('#city').append(html);
                    };
                });
            });

        </script>


        <script>
            $("#city").change(function (e) {
                e.preventDefault();
                var cityId = $(this).val();
                // alert(countryId);
                $.ajax({
                    url: '{{url('admin/get-towns')}}'+'/' + cityId,
                    type:"GET",
                }).done(function(data){
                    //  console.log(data[i].name);
                    $('#town').html('');

                    $('#town').append('<option value="">اختار  المنطقه</option>');
                    for( var i = data.length - 1; i >= 0; i--){
                        html ='<option value="'+data[i].id+'">' +data[i].name_ar+'</option>';


                        $('#town').append(html);
                    };
                });
            });

        </script>
    @endpush


@endsection

