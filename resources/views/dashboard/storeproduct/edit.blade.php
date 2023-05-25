@extends('layouts.default-layout.master')

@section('title')Layout Light
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
                    <h3> منتجات المتجر</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل منتج لمتجر</li>
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
                                <form action={{route('storeproducts.update',$info->id)}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم بالعربية</label>
                                        <input class="form-control" value="{{$info->name_ar}}" id="name_ar" type="text"  name="name_ar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الاسم بالانجليزيه</label>
                                        <input class="form-control" value="{{$info->name_en}}" id="name_en" type="text"  name="name_en">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="desc_ar">الوصف بالعربيه </label>
                                        <textarea class="form-control" id="desc_ar" type="text" name="desc_ar">{{$info->desc_ar}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="desc_en">الوصف بالانجليزيه </label>
                                        <textarea class="form-control" id="desc_en" type="text" name="desc_en">{{$info->desc_en}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الكميه</label>
                                        <input class="form-control" id="name_en" type="number" value="{{$info->quantity}}"  name="quantity">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">السعر</label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->price}}"  name="price">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">السعر بعد الخصم</label>
                                        <input class="form-control" id="name_en" type="text" value="{{$info->sale_price}}"  name="sale_price">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">عدد المشاهدات</label>
                                        <input class="form-control" id="name_en" type="number" value="{{$info->views}}"  name="views">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">المتجر </label>
                                        <select id="select"  name="store_id"  class="form-control">
                                            <option >اختر المتجر</option>
                                            @foreach($stores as $store)
                                                <option value="{{$store->id}}" {{($store->id ==$info->store_id)? "selected":""}} >{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">المتجر </label>
                                        <select id="select"  name="store_category_id"  class="form-control">
                                            <option >اختر قسم لمتجر</option>
                                            @foreach($storecategories as $storecategory)
                                                <option value="{{$storecategory->id}}" {{($storecategory->id ==$info->store_category_id)? "selected":""}} >{{$storecategory->name_ar}}</option>
                                            @endforeach
                                        </select>
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
    @endpush


@endsection

