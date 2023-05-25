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
                    <h3>البنرات</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">الرئيسية</a></li>
                        <li class="breadcrumb-item">تعديل  بانر </li>
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
                                <form action="{{route('banners.update',$info->id)}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                     {{method_field('PUT')}}
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">العنوان </label>
                                        <input class="form-control" id="name_ar" type="text" value="{{$info->title}}"   name="title">
                                    </div>
                                     <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">اللينك </label>
                                        <input class="form-control" id="name_ar" type="text" value="{{$info->link}}"   name="link">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الصوره </label>
                                        <input class="form-control" id="name_ar" type="file"   name="image">
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="image">اختر التطبيق </label>
                                        <select id="select"  name="position"  class="form-control">
                                            <option  selected disapled>اختر التطبيق</option>
                                             <option value="top-app" {{($info->position=="top-app")? "selected":""}}> اعلى التطبيق</option>
                                             <option value="1" {{($info->position=="1")? "selected":""}}> التطبيق الاول</option>
                                              <option value="3" {{($info->position=="3")? "selected":""}}>التطبيق التاني </option>
                                             <option value="5" {{($info->position=="5")? "selected":""}}>التطبيق الثالث </option>
                                             <option value="7" {{($info->position=="7")? "selected":""}}>التطبيق الرابع </option>
                                             <option value="home-1" {{($info->position=="home-1")? "selected":""}}>الرئيسية 1 </option>
                                             <option value="home-2" {{($info->position=="home-2")? "selected":""}}>الرئيسية 2 </option>
                                             <option value="ad-1" {{($info->position=="ad-1")? "selected":""}}>صفحة الاعلان</option>n>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">الكود </label>
                                        <textarea class="form-control"    name="code">{{$info->code}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="col-form-label pt-0" for="name_ar">تاريخ الاتهاء </label>
                                        <input class="form-control" id="name_ar" type="date" value="{{$info->expire}}"   name="expire">
                                    </div>
                                    

                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                    <button class="btn btn-secondary">الغاء</button>
                                </form>

          @push('scripts')
                <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
                 <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
          @endpush
          
         

@endsection