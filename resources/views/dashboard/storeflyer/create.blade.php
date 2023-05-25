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
                    <h3>فليرات المتجر</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">اضافه  فلير لمتجر جديد</li>
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
                                <form action={{route('storeflyers.store')}} method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الاسم بالعربية</label>
                                        <input class="form-control" id="name_ar" type="text"   name="name_ar">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">الاسم بالانجليزيه</label>
                                        <input class="form-control" id="name_en" type="text"  name="name_en">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">المتجر </label>
                                        <select id="select"  name="store_id"  class="form-control">
                                            <option >اختر المتجر</option>
                                            @foreach($stores as $store)
                                                <option value="{{$store->id}}" >{{$store->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">النوع </label>
                                        <select id="select"  name="type"  class="form-control">
                                            <option value="daily" >يومي</option>
                                            <option  value="monthly">شهري</option>
                                            <option value="yearly" >سنوي</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">تاريخ الصلاحيه</label>
                                        <input class="form-control" id="name_en" type="date"  name="expire_date">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">الصور </label>
                                        <input class="form-control" id="image" name="image[]" type="file" multiple="multiple">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_en">عدد المشاهدات</label>
                                        <input class="form-control" id="name_en" type="number"  name="views">
                                    </div>


                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">الملف </label>
                                        <input class="form-control" id="image" name="file" type="file">
                                    </div>
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button class="btn btn-secondary">الغاء</button>
                                </form>

          @push('scripts')
                <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                 <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
          @endpush

@endsection